<?php

$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/../lib/Database.php';
include_once $filepath . '/../helpers/Format.php';
?>
<?php

class SendNotification
{

    public function sendMessage($title, $desc, $link, $imageUrl, $api_id, $api_key)
    {

        var_dump($title, $desc, $link, $imageUrl, $api_id, $api_key);

        $content = array(
            "en" => $desc, // description
        );
        $hashes_array = array();
        array_push($hashes_array, array(
            "id"   => "like-button",
            "text" => $title, // title
            "icon" => $imageUrl,
            "url"  => $link,
        ));
        array_push($hashes_array, array(
            "id"   => "like-button-2",
            "text" => "Like2",
            "icon" => "http://i.imgur.com/N8SN8ZS.png",
            "url"  => "https://yoursite.com",
        ));
        $fields = array(
            'app_id'            => $api_id,
            'included_segments' => array(
                'Subscribed Users',
            ),
            'data'              => array(
                "foo" => "bar",
            ),
            'contents'          => $content,
            'web_buttons'       => $hashes_array,
        );

        $fields = json_encode($fields);
        // print("\nJSON sent:\n");
        // print($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            "Authorization: Basic $api_key",
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

}
