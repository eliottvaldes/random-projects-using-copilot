<?php

#verify the method is GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    # return a 405
    header('HTTP/1.1 405 Method Not Allowed');
    # stop the script
    exit;
    # die the process
    die('Method Not Allowed');
}

# create a temporal variable to store the messages
$messages = [];

#insert test data on the array
$messages = array(
    "welcome" => "Welcome to Random Coding Challenge",
    "information" => "Here you can see some information of all the projects developed using Copilot",
    "collaborators" => array(
        0 => array(
            "name" => "Eliot Valdes",
            "email" => "eliottvaldes@hotmail.com",
            "phone" => "xxxx-xxxx-xxxx",
            "country" => "MX",
            "position" => "Web Developer",
            "website" => "eliottvaldes.live",
            "linkedin" => "...",
            "twitter" => "@Valdes_05",
            "facebook" => "Eliot Valdés Luis",
            "instagram" => "@eliotvaldes_",
            "github" => "@eliottvaldes",
        ),
        1 => array(
            "name" => "...",
            "email" => "",
            "phone" => "",
            "country" => "",
            "position" => "",
            "website" => "",
            "linkedin" => "",
            "twitter" => "",
            "facebook" => "",
            "instagram" => "",
            "github" => "",
        ),
    )

);


# return the messages
echo json_encode($messages);

die();

?>