<<<<<<< HEAD
<?php

    include "my_connection.php";
    $query = "SELECT * FROM tbl_csv";

    $result = mysqli_query($con, $query);

    $num_column = mysqli_num_fields($result);

    while($row = mysqli_fetch_row($result)) {
        upload_image($row[12]);
        upload_image($row[13]);
        upload_image($row[14]);
        upload_image($row[15]);
        upload_image($row[16]);
        upload_image($row[17]);
        upload_image($row[18]);
        upload_image($row[21]);
        upload_image($row[31]);
    }

    function upload_image($url)
    {
        $file = file_get_contents($url);
        if (!empty($url) && !empty($file)) {
            $filename = basename($url) . PHP_EOL;
            $filename ="images/".$filename;
            if (!file_exists($filename)) {
                $myfile = fopen($filename, "w") or die("Unable to open file!");
                fwrite($myfile, $file);
                fclose($myfile);

            }
        }
        return true;
    }
    echo json_encode("success_download");
    exit;
=======
<?php

    include "my_connection.php";
    $query = "SELECT * FROM tbl_csv";

    $result = mysqli_query($con, $query);

    $num_column = mysqli_num_fields($result);

    while($row = mysqli_fetch_row($result)) {
        upload_image($row[12]);
        upload_image($row[13]);
        upload_image($row[14]);
        upload_image($row[15]);
        upload_image($row[16]);
        upload_image($row[17]);
        upload_image($row[18]);
        upload_image($row[21]);
        upload_image($row[31]);
    }

    function upload_image($url)
    {
        $file = file_get_contents($url);
        if (!empty($url) && !empty($file)) {
            $filename = basename($url) . PHP_EOL;
            $filename ="images/".$filename;
            if (!file_exists($filename)) {
                $myfile = fopen($filename, "w") or die("Unable to open file!");
                fwrite($myfile, $file);
                fclose($myfile);

            }
        }
        return true;
    }
    echo json_encode("success_download");
    exit;
>>>>>>> ff099208e932b5ae689a46b4f4a23971b9b0ceb3
?>