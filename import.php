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
    $import_url = $_POST['import_file'];
    $from_num = $_POST['from_num'];
    $to_num = $_POST['to_num'];
    $total_num = $_POST['total_num'];

    if($to_num > $total_num) $to_num = $total_num;
    sleep(1);
    $handle = fopen($import_url, "r");
//        setcookie("importUrl", $_FILES['csv_data']['tmp_name']);

    $sql_list = "";

    include "my_connection.php";

    $first = false;
    if($from_num == 0) $first = true;

    $max_query = 100;

    $total_query = '';
    $add_num = 0;

    $update_query = '';
    $update_num = 0;

    $now_row = 0;

    $run_num = 0;

    while (($data = fgetcsv($handle, 1200, ";")) !== FALSE) {

        if($first || $now_row < $from_num || $now_row > $to_num){
            $first = false;
        }
        else{
            $run_num = $now_row;
            $sql = "SELECT id,item21,item22,item36 FROM tbl_csv ";
            $con_str = "WHERE item23='".$data[22]."' "; // EAN
            $con_str .= "AND item18='".$data[17]."' ";  //Gender
            $con_str .= "AND item35='".$data[34]."'";  // Parent

            $sql .=$con_str;

            $res = 0;
            $result = mysqli_query($con, $sql );
            $res = mysqli_num_rows($result);

            if($res > 0) {

                $row = mysqli_fetch_row($result);

                $update_str = "UPDATE tbl_csv SET";
                $will_update = "";
                if($row[1] != $data[20])
                    $will_update .= " item21='".$data[20]."',";
                if($row[2] != $data[21])
                    $will_update .= " item22='".$data[21]."',";
                if($row[3] != $data[35])
                    $will_update .= " item36='".$data[35]."',";

                if($will_update != ""){
                    $con_str = " WHERE id=".$row[0];
                    $will_update= rtrim($will_update, ", ");
                    $update_str .= $will_update.$con_str;
                    $update_query .= $update_str.";";
                    $update_num++;
                }
/*                $update_str = "UPDATE tbl_csv SET item36='" . $data[35] . "' ";    // product id
                $update_str .= " item21='" . $data[20] . "' ";    // availability
                $update_str .= " item22='" . $data[21] . "' ";    // stock
                $update_str .= $con_str;
                $update_query .= $update_str.";";
*/
//                mysqli_query($con, $update_str);
            }
            else {

//                $sql .= $update_str . " ELSE ";
                $add_num++;
                $item_val = $data[0];
                $str_val = "'".$item_val."'";

                for ($i = 1; $i < 37; $i++) {
                    $item_val = $data[$i];
                    $str_val = $str_val . ",'" . $item_val . "'";
                }

                $insert_query = "(".$str_val.")";

                $total_query .= $insert_query.",";
                //mysqli_query($con, $insert_query);
/*
                if($rowNo % $max_query == 0){
                    $run_num ++;

                    $total_query .= $insert_query;

                    $str_name = "item1";
                    for($i = 2; $i <= 37; $i++)
                        $str_name .= ",item".$i;

                    $insert_query = "INSERT into tbl_csv(" . $str_name . ") values ".$total_query;
                    mysqli_query($con, $insert_query);

                    $total_query = '';

                }else{
                    $total_query .= $insert_query.",";
                }
*/
            }
        }
        $now_row++;
    }

    if($update_query != '')    {
        mysqli_multi_query($con, $update_query);
    }

    if($total_query != '') {
        $total_query = rtrim($total_query, ", ");
        $str_name = "item1";
        for ($i = 2; $i <= 37; $i++)
            $str_name .= ",item" . $i;

        $insert_query = "INSERT into tbl_csv(" . $str_name . ") values " . $total_query;
        mysqli_query($con, $insert_query);
    }

    fclose($handle);
    mysqli_close($con);

    $response_array['complete'] = "no";
    if($run_num >= $total_num-1) {
        rename($import_url, $import_url . ".old");
        $response_array['complete'] = "yes";
    }



    header('Content-type: application/json');
    $response_array['0status'] = 'success';
//    $response_array['log'] = $total_query;
    $response_array['run_num'] = $run_num;
    $response_array['add_num'] = $add_num;
    $response_array['update_num'] = $update_num;
    $response_array['from']=$from_num;
    $response_array['to']=$to_num;

    echo json_encode($response_array);

    exit();
?>