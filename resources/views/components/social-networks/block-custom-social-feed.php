<?php

$wrapperClass = '';

if (is_array($socialPosts) && !empty($socialPosts)) {
    echo '<div class="wpb_text_column wpb_content_element txt_soc"><div class="wpb_wrapper">';

    foreach ($socialPosts as $socialPost) {
        $type        = get_field('type', $socialPost->ID);
        $description = get_field('description', $socialPost->ID);
        $description = truncateText($description, CUSTOM_SOCIAL_FEED_TEXT_LENGTH);
        $description = wrapHashtag($description, 'strong');

        switch ($type) {
            case 'facebook':
            case 'linkedin':
                $wrapperClass = 'face';
                break;

            case 'twitter':
                $wrapperClass = 'twit';
                break;
        }

        echo '<div class="' . $wrapperClass . '">' . $description . ' <strong>(...)</strong></div>';
    }

    loadView('components.social-networks.block-follow-us');

    echo '</div></div>';
}

?>