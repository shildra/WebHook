<?php

/*

CREATE TABLE tbl_csv (
    sel int DEFAULT 0,
    id int NOT NULL AUTO_INCREMENT,
	item1 varchar(255),item2 varchar(255),item3 varchar(255),item4 varchar(255),item5 varchar(255),item6 varchar(255),item7 varchar(255),item8 varchar(255),item9 varchar(255),item10 varchar(255),
    item11 varchar(255),item12 varchar(255),item13 varchar(255),item14 varchar(255),item15 varchar(255),item16 varchar(255),item17 varchar(255),item18 varchar(255),item19 varchar(255),item20 varchar(255),
	item21 varchar(255),item22 varchar(255),item23 varchar(255),item24 varchar(255),item25 varchar(255),item26 varchar(255),item27 varchar(255),item28 varchar(255),item29 varchar(255),item30 varchar(255),
	item31 varchar(255),item32 varchar(255),item33 varchar(255),item34 varchar(255),item35 varchar(255),item36 varchar(255),item37 varchar(255),
	PRIMARY KEY (id)
);

*/
    ini_set('max_execution_time', 0); // to get unlimited php script execution time

    $import_url = $_POST['import_file'];
    $handle="";
    $handle = fopen($import_url, "r");
    if($handle != "") {
        $sql_list = "";

        include "my_connection.php";

        $total_num_csv = 0;
        while (($data = fgetcsv($handle, 1200, ";")) !== FALSE) {
            $total_num_csv++;
        }
    }
    header('Content-type: application/json');
    $response_array['status'] = 'success';
    $response_array['totalNum'] = $total_num_csv;
    echo json_encode($response_array);
    exit();
?>