<?php

namespace CustomDev\Utils;

trait PostTypesUtils
{
    public function setWithMetas($queryPosts, $single = false)
    {
        $newArray = [];
        $i        = 0;

        if ($single) {
            $posts[] = $queryPosts;
        } else {
            $posts = $queryPosts;
        }

        if (!empty($posts) && is_array($posts)) {
            foreach ($posts as $post) {
                $newArray[$i]['post']  = $post;
                $newArray[$i]['metas'] = function_exists('get_fields') ? get_fields($post->ID) : get_post_meta($post->ID);
                $i++;
            }
        }

        if ($single) {
            return (object) $newArray[0];
        }

        return (object) $newArray;
    }
}
