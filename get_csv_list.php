<?php
    $files = array();
    $files = [];
    foreach (glob("upload/*.csv") as $file) {
        $files[] = $file;
    }
    echo json_encode($files);
?>