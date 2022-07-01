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
$projects = [];

$path = 'https://copilot-projects.herokuapp.com/PROJECTS/';
$path_media = 'https://copilot-projects.herokuapp.com/PROJECTS/assets/';

# create temporal array of projects
$projects = array(
    0 => array(
        "ID" => "1",
        "language" => "Python",
        "language_icon" => "Python",
        "name" => "Pyscript example",
        "description" => "Example of a Python script inside of HTML",
        "url" => $path . "Small/PYTHON/Frankenstein/pyscript.html",
        "creator" => "Eliot Valdes",
        "gallery" => array(
            0 => "https://copilot.io/assets/images/copilot-logo.png",
            1 => "https://copilot.io/assets/images/copilot-logo.png",
        )
    ),
    1 => array(
        "ID" => "1",
        "language" => "JS",
        "language_icon" => "js",
        "name" => "Simple CLock",
        "description" => "Basic clock example",
        "url" => $path . "Small/JS/clock/clock.php",
        "creator" => "Eliot Valdes",
        "gallery" => array(
            0 => "https://copilot.io/assets/images/copilot-logo.png",
            1 => "https://copilot.io/assets/images/copilot-logo.png",
        )
    ),
    2 => array(
        "ID" => "1",
        "language" => "Python",
        "language_icon" => "python",
        "name" => "Fibonacci Series",
        "description" => "series of fibonachi using recursion and dynamic programming",
        "url" => $path . "Small/PYTHON/fibonacci/fibonacci.php",
        "creator" => "Eliot Valdes",
        "gallery" => array(
            0 => "https://copilot.io/assets/images/copilot-logo.png",
            1 => "https://copilot.io/assets/images/copilot-logo.png",
        )
    ),
);


# return the projects
echo json_encode($projects);

die();
