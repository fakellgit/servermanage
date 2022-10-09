<?php


    echo "Welcome to Server Manager";
    $serverList = [
        "NOMBANA FAHENDRENA" => "https://trustsbotsadmin.herokuapp.com/",
        "TOKY" => "https://trustbots3.herokuapp.com/",
        "OTHER USERS" => "https://trustbot2.herokuapp.com/"
    ];

    echo "<h1>Voici les listes des SERVEUR</h1>";
    foreach ($serverList as $key => $value) {
        echo "<a href='$value'>$key ($value)</a><br>";
    }