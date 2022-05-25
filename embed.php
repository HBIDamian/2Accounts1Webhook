<?php
session_start();
if ((!isset($_SESSION['choMsg'])) && (!isset($_SESSION['username']))) {
    die("<h1 style=\"text-align: center;\">This isn't the page you are looking for! </h1><img style=\"display: block; margin-left: auto; margin-right: auto;\" height=\"40%\" src=\"https://memegenerator.net/img/images/12123074.jpg\">");
}

$debugMode = false;
$choMsg = $_SESSION['choMsg'];
$username = $_SESSION['username'];

// The following variables can also be used within the if statement below to customise the webhook.
$webhookUrl = "https://discord.com/api/webhooks/XXXXX/XXXXX";
$date = date("d/m/Y");
$color = substr(md5(rand()), 0, 6);

if ($username == "Connor") {
    $username = "Connor - Cyberlfe";
    $avatar = "https://66.media.tumblr.com/edef3dd9eca317ad99f941ed3bb3854b/tumblr_p9pitpXYVo1uqmnquo1_400.gif";
}
if ($username == "HarryHill") {
    $username = "Dr Harry Hill";
    $avatar = "https://www.primeperformersagency.co.uk/uploads/images/crop/350/350/speakers/harry-hill-440.jpeg";
}

// Replace the URL with your own webhook url
$hookObject = json_encode([
    /*
     * The general "message" shown above your embeds
     */
    // "content" => "A message will go here",
    /*
     * The username shown in the message
     */
    "username" => "$username",
    /*
     * The image location for the senders image
     */
    "avatar_url" => "$avatar",
    /*
     * Whether or not to read the message in Text-to-speech
     */
    "tts" => false,
    /*
     * File contents to send to upload a file
     */
    "file" => "$attachment",
    /*
     * An array of Embeds
     */
    "embeds" => [
        /*
         * Our first embed
         */
        [

            // The type of your embed, will ALWAYS be "rich"
            "type" => "rich",

            // A description for your embed
            "description" => "",

            /* A timestamp to be displayed below the embed, IE for when an an article was posted
             * This must be formatted as ISO8601
             */
            // "timestamp" => "$date",

            // The integer color to be used on the left side of the embed
            "color" => hexdec("$color"),

            // Footer object
            "footer" => [
                "text" => "$username  -  $date",
                "icon_url" => "$avatar"
            ],

            // Thumbnail object
            "thumbnail" => [
                "url" => "$avatar"
            ],

            // Author object
            "author" => [
                "name" => "$username"
                // "url" => ""
            ],

            "fields" => [
                [
                    "name" => "Message: ",
                    "value" => "$choMsg",
                    "inline" => false
                ]
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

$ch = curl_init($webhookUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $hookObject);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);
// If you need to debug, or find out why you can't send message uncomment line below, and execute script.
//
// echo $response;

curl_close($ch);


if($debugMode != true) {
echo "<script> location.href='./loggedIn.php'; </script>";
}

?>