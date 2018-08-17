<?php
    require "Facebook/autoload.php";
    session_start();
    $fb = new \Facebook\Facebook([
            'app_id'            =>'412508542574689',
            'app_secret'        =>'edc353a12952786b13da926450f9645d',
            'default_graph_version' =>'v3.1',
        ]);
?>