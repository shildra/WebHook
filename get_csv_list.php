<<<<<<< HEAD
<?php
    $files = array();
    $files = [];
    foreach (glob("upload/*.csv") as $file) {
        $files[] = $file;
    }
    echo json_encode($files);
=======
<?php
    $files = array();
    $files = [];
    foreach (glob("upload/*.csv") as $file) {
        $files[] = $file;
    }
    echo json_encode($files);
>>>>>>> ff099208e932b5ae689a46b4f4a23971b9b0ceb3
?>