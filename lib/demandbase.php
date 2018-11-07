<?php
namespace QuickMobile\Demandbase;

use WP_Query;

define('DEMANDBASE_KEY', '93a94bee701e61a781c480ae1bedcbc9');
define('DEMANDBASE_DEFAULT_AUDIENCE', 'Default Audience');

// function get_demandbase_audiences_from_acf_objects($audienceObjects) {
//     $audiences = array();

//     if ($audienceObjects):
//         foreach ($audienceObjects as $item):
//             $audiences[] = $item->post_title;
//         endforeach;
//     endif;

//     return $audiences;
// }

function get_demandbase_industry() {
    return get_demandbase_field('industry');
}

function get_demandbase_audience_post_id() {
    $industry = get_demandbase_industry();

    if ($industry):
        $audiencePost = get_page_by_title($industry, OBJECT, DEMANDBASE_AUDIENCE_POST);

        if ($audiencePost):
            return $audiencePost->ID;
        endif;
    endif;

    return '';
}

function is_2k_user() {
    $audience = get_demandbase_user_audience();

    if ($audience) {
        return (array_key_exists('watch_list', $audience) && array_key_exists('account_type', $audience['watch_list']) && $audience['watch_list']['account_type'] == 'Prospect');
    }

    return false;
}

function get_demandbase_field($fieldName) {
    $audience = '';

    if (!array_key_exists('reset', $_GET) && $_SESSION && array_key_exists('AUDIENCE', $_SESSION)):
        $audience = $_SESSION['AUDIENCE'];
    else:
        $audience = get_demandbase_user_audience();
    endif;

    if ($audience && array_key_exists($fieldName, $audience)):
        return $audience[$fieldName];
    endif;

    return '';
}

function get_demandbase_user_audience() {
    $audience = '';

    if (!array_key_exists('reset', $_GET) && array_key_exists('AUDIENCE', $_SESSION)):
        $audience = $_SESSION['AUDIENCE'];
    else:
        $data = array("key" => DEMANDBASE_KEY, "query" => get_users_ip(), "page" => get_permalink(), "page_title" => get_the_title());

        // Open connection
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'http://api.demandbase.com/api/v2/ip.json?' . http_build_query($data));
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);

        $result_arr = json_decode($result, true);

        //var_dump($result_arr);

        $audience = '';

        //If the result icnldues an industry value, then we found a valid user in Demandbase.
        if ($result_arr && array_key_exists('industry', $result_arr)):
            $audience = $result_arr;
            $_SESSION['AUDIENCE'] = $result_arr;
        endif;
    endif;

    return $audience;
}

function get_users_ip() {
    $ip = '';

    if (array_key_exists('ip', $_GET)) {
        $ip = $_GET['ip'];
    } elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip=$_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}

// // Outputs ACF repeater content based on the repeater items 'audience' field. See the Homepage Slide field group for an example.
// function output_demandbase_acf_content($data, $formatterFunction, $formatterArgs = null) {
//     $defaultAudienceContent = '';
//     $userAudience = get_demandbase_user_audience();
//     $audienceFound = false;

//     foreach ($data as $item):
//         $content = $formatterFunction($item, $formatterArgs);

//         $audiences =  get_demandbase_audiences_from_acf_objects($item['audience']);

//         //If the content sets audience matches the users audience we'll then output the content. If it doesn't match we'll check to see
//         //if this content matches the default audience.
//         if (in_array($userAudience, $audiences)):
//             echo $content;
//             $audienceFound = true;
//         elseif (empty($defaultAudienceContent) && in_array(DEMANDBASE_DEFAULT_AUDIENCE, $audiences)):
//             $defaultAudienceContent = $content;
//         endif;
//     endforeach;

//     if (!$audienceFound):
//         echo $defaultAudienceContent;
//     endif;
// }

?>
