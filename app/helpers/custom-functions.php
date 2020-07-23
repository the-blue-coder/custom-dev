<?php

use CustomDev\App\ThirdParties\DateTimeFrench;

/**
 * Debug without interruption
 */
function dt($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}



/**
 * Debug with interruption
 */
function dd($var)
{
    dt($var);
    exit;
}



/**
 * Load template part
 */
function loadTemplatePart($path, $data = [], $getHtml = false)
{
    $path = str_replace('.', '/', $path);

    foreach ($data as $key => $value) {
        set_query_var($key, $value);
    }

    ob_start();
        get_template_part($path);
    $htmlBlock = ob_get_clean();

    foreach ($data as $key => $value) {
        set_query_var($key, false);
    }

    if ($getHtml) {
        return $htmlBlock;
    }

    echo $htmlBlock;
}



/**
 * Load view component
 */
function loadView($path, $data = [], $getHtml = false)
{
    $path = str_replace('.', '/', $path);

    if (is_array($data)) {
        extract($data);
    }

    ob_start();
        include(CUSTOM_DEV_PLUGIN_DIR . '/resources/views/' . $path . '.php');
    $htmlBlock = ob_get_clean();

    if ($getHtml) {
        return $htmlBlock;
    }

    echo $htmlBlock;
}



/**
 * Get array first key
 */
function getArrayFirstKey($array)
{
    foreach ($array as $key => $value) {
        return $key;
    }
}



/**
 * Transform underscores to hyphen in a string
 */
function underscoresToHyphen($string)
{
    return str_replace('_', '-', $string);
}



/**
 * Transform hyphen to underscores in a string
 */
function hyphenToUnderscores($string)
{
    return str_replace('-', '_', $string);
}



/**
 * Get CSS property value from string
 */
function getCSSPropertyValueFromString($CSSString, $propertyKeyToSearch, $unitToRemove = '')
{
    $styleArray = explode(';', $CSSString);

    $matches = array_values(array_filter($styleArray, function ($var) use ($propertyKeyToSearch) { 
        return preg_match("/\b$propertyKeyToSearch\b/i", $var); 
    }));

    $propertyString   = $matches[0];
    $propertyArray    = explode(':', $propertyString);
    $propertyWithUnit = trim($propertyArray[1]);
    $propertyValue    = str_replace($unitToRemove, '', $propertyWithUnit);
    
    return $propertyValue;
}



/**
 * Get rotate value from transform string
 */
function getRotateValueFromTransformString($transform)
{
    $tmpArray    = explode('(', $transform);
    $rotateValue = str_replace('deg)', '', $tmpArray[1]);

    return (int) $rotateValue;
}



/**
 * Special characters url value
 */
function specialCharactersToUrlValue($string)
{
    $string = str_replace('@', '%40', $string);
    $string = str_replace('`', '%60', $string);
    $string = str_replace('¢', '%A2', $string);
    $string = str_replace('£', '%A3', $string);
    $string = str_replace('¥', '%A5', $string);
    $string = str_replace('|', '%A6', $string);
    $string = str_replace('«', '%AB', $string);
    $string = str_replace('¬', '%AC', $string);
    $string = str_replace('¯', '%AD', $string);
    $string = str_replace('º', '%B0', $string);
    $string = str_replace('±', '%B1', $string);
    $string = str_replace('ª', '%B2', $string);
    $string = str_replace('µ', '%B5', $string);
    $string = str_replace('»', '%BB', $string);
    $string = str_replace('¼', '%BC', $string);
    $string = str_replace('½', '%BD', $string);
    $string = str_replace('¿', '%BF', $string);
    $string = str_replace('À', '%C0', $string);
    $string = str_replace('Á', '%C1', $string);
    $string = str_replace('Â', '%C2', $string);
    $string = str_replace('Ã', '%C3', $string);
    $string = str_replace('Ä', '%C4', $string);
    $string = str_replace('Å', '%C5', $string);
    $string = str_replace('Æ', '%C6', $string);
    $string = str_replace('Ç', '%C7', $string);
    $string = str_replace('È', '%C8', $string);
    $string = str_replace('É', '%C9', $string);
    $string = str_replace('Ê', '%CA', $string);
    $string = str_replace('Ë', '%CB', $string);
    $string = str_replace('Ì', '%CC', $string);
    $string = str_replace('Í', '%CD', $string);
    $string = str_replace('Î', '%CE', $string);
    $string = str_replace('Ï', '%CF', $string);
    $string = str_replace('Ð', '%D0', $string);
    $string = str_replace('Ñ', '%D1', $string);
    $string = str_replace('Ò', '%D2', $string);
    $string = str_replace('Ó', '%D3', $string);
    $string = str_replace('Ô', '%D4', $string);
    $string = str_replace('Õ', '%D5', $string);
    $string = str_replace('Ö', '%D6', $string);
    $string = str_replace('Ø', '%D8', $string);
    $string = str_replace('Ù', '%D9', $string);
    $string = str_replace('Ú', '%DA', $string);
    $string = str_replace('Û', '%DB', $string);
    $string = str_replace('Ü', '%DC', $string);
    $string = str_replace('Ý', '%DD', $string);
    $string = str_replace('Þ', '%DE', $string);
    $string = str_replace('ß', '%DF', $string);
    $string = str_replace('à', '%E0', $string);
    $string = str_replace('á', '%E1', $string);
    $string = str_replace('â', '%E2', $string);
    $string = str_replace('ã', '%E3', $string);
    $string = str_replace('ä', '%E4', $string);
    $string = str_replace('å', '%E5', $string);
    $string = str_replace('æ', '%E6', $string);
    $string = str_replace('ç', '%E7', $string);
    $string = str_replace('è', '%E8', $string);
    $string = str_replace('é', '%E9', $string);
    $string = str_replace('ê', '%EA', $string);
    $string = str_replace('ë', '%EB', $string);
    $string = str_replace('ì', '%EC', $string);
    $string = str_replace('í', '%ED', $string);
    $string = str_replace('î', '%EE', $string);
    $string = str_replace('ï', '%EF', $string);
    $string = str_replace('ð', '%F0', $string);
    $string = str_replace('ñ', '%F1', $string);
    $string = str_replace('ò', '%F2', $string);
    $string = str_replace('ó', '%F3', $string);
    $string = str_replace('ô', '%F4', $string);
    $string = str_replace('õ', '%F5', $string);
    $string = str_replace('ö', '%F6', $string);
    $string = str_replace('÷', '%F7', $string);
    $string = str_replace('ø', '%F8', $string);
    $string = str_replace('ù', '%F9', $string);
    $string = str_replace('ú', '%FA', $string);
    $string = str_replace('û', '%FB', $string);
    $string = str_replace('ü', '%FC', $string);
    $string = str_replace('ý', '%FD', $string);
    $string = str_replace('þ', '%FE', $string);
    $string = str_replace('ÿ', '%FF', $string);
    
    return $string;
}



/**
 * Generate post featured image from image path
 */
function generatePostFeaturedImageFromImagePath($imagePath, $postID)
{
    $uploadDir = wp_upload_dir();
    $imageData = file_get_contents($imagePath);
    $filename  = basename($imagePath);

    if (wp_mkdir_p($uploadDir['path'])) {
        $file = $uploadDir['path'] . '/' . $filename;
    } else {
        $file = $uploadDir['basedir'] . '/' . $filename;
    }

    file_put_contents($file, $imageData);

    $WPFiletype = wp_check_filetype($filename, null );

    $attachment = [
        'post_mime_type' => $WPFiletype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    ];

    $attachID = wp_insert_attachment($attachment, $file, $postID);

    require_once(ABSPATH . 'wp-admin/includes/image.php');

    $attachData = wp_generate_attachment_metadata($attachID, $file);
    
    wp_update_attachment_metadata($attachID, $attachData);
    set_post_thumbnail($postID, $attachID);
}



/**
 * Get date from timestamp
 */
function getDateFromTimestamp($timestamp, $languageCode)
{
    $date = '';

    switch ($languageCode) {
        case 'fr':
            $date = new DateTimeFrench();
            break;

        case 'en':
            $date = new DateTime();
            break;
    }

    $date->setTimestamp($timestamp);

    return $date;
}



/**
 * Truncate word
 */
function truncateText($text, $length)
{
    return substr($text, 0, strrpos(substr($text, 0, $length), ' '));
}



/**
 * Wrap hashtag with Html tag
 */
function wrapHashtag($string, $htmlTag)
{
    return preg_replace('/#([A-Za-z0-9áéíóúüÁÉÍÓÚÜ_]+)/', '<' . $htmlTag . '>#$1</' . $htmlTag . '>', $string);
}
