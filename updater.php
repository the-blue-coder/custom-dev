<?php

namespace CustomDev;

class Updater
{
    protected $file;
    protected $plugin;
    protected $basename;
    protected $active;

    private $username;
    private $repository;
    private $authorizeToken;
    private $githubResponse;



    public function __construct($file)
    {
        $this->file           = $file;
        $this->username       = GITHUB_USERNAME;
        $this->repository     = GITHUB_REPOSITORY;
        $this->authorizeToken = GITHUB_ACCESS_TOKEN;

        $this->setPluginProperties();
        $this->initialize();

        return $this;
    }



    public function setPluginProperties()
    {
        add_action('admin_init', function () {
            $this->plugin   = get_plugin_data($this->file);
            $this->basename = plugin_basename($this->file);
            $this->active   = is_plugin_active($this->basename);
        });
    }



    public function setUsername($username)
    {
        $this->username = $username;
    }



    public function setRepository($repository)
    {
        $this->repository = $repository;
    }



    public function authorize($token)
    {
        $this->authorizeToken = $token;
    }



    private function getRepositoryInfos()
    {
        if (is_null($this->githubResponse)) {
            $requestUri = sprintf('https://api.github.com/repos/%s/%s/releases', $this->username, $this->repository);

            if ($this->authorizeToken) {
                $requestUri = add_query_arg('access_token', $this->authorizeToken, $requestUri);
            }        

            $response = json_decode(wp_remote_retrieve_body(wp_remote_get($requestUri)), true);

            if (is_array($response)) {
                $response = current($response);
            }
            
            if ($this->authorizeToken) {
                $response['zipball_url'] = add_query_arg('access_token', $this->authorizeToken, $response['zipball_url']);
            }

            $this->githubResponse = $response;
        }
    }



    public function initialize() {
        add_filter('pre_set_site_transient_update_plugins', [$this, 'modifyTransient'], 10, 1);
        add_filter('plugins_api', [$this, 'pluginPopup'], 10, 3);
        add_filter('upgrader_post_install', [$this, 'afterInstall'], 10, 3);
    }



    public function modifyTransient($transient)
    {
        if (property_exists($transient, 'checked') && $transient->checked) {
            $this->getRepositoryInfos(); 

            $outOfDate = version_compare($this->githubResponse['tag_name'], $transient->checked[$this->basename], 'gt');

            if ($outOfDate) {
                $newFiles = $this->githubResponse['zipball_url'];
                $slug     = current(explode('/', $this->basename ));
                $plugin   = [
                    'url'         => $this->plugin['PluginURI'],
                    'slug'        => $slug,
                    'package'     => $newFiles,
                    'new_version' => $this->githubResponse['tag_name']
                ];

                $transient->response[$this->basename] = (object) $plugin;
            }
        }

        return $transient;
    }



    public function pluginPopup($result, $action, $args)
    {
        if (!empty($args->slug) && $args->slug === current(explode( '/' , $this->basename))) {
            $this->getRepositoryInfos();
            
            $plugin = [
                'name'              => $this->plugin['Name'],
                'slug'              => $this->basename,
                'version'           => $this->githubResponse['tag_name'],
                'author'            => $this->plugin['AuthorName'],
                'author_profile'    => $this->plugin['AuthorURI'],
                'last_updated'      => $this->githubResponse['published_at'],
                'homepage'          => $this->plugin['PluginURI'],
                'short_description' => $this->plugin['Description'],
                'download_link'     => $this->githubResponse['zipball_url'],
                'sections' => [
                    'Description' => $this->plugin['Description'],
                    'Updates'     => $this->githubResponse['body'],
                ],
            ];

            return (object) $plugin;
        }   

        return $result;
    }



    public function afterInstall($response, $hookExtra, $result)
    {
        global $wp_filesystem;
      
        $installDirectory = plugin_dir_path($this->file);

        $wp_filesystem->move($result['destination'], $installDirectory);
        $result['destination'] = $installDirectory;
      
        if ($this->active) {
            activate_plugin($this->basename);
        }

        return $result;
    }
}
