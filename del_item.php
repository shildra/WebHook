<<<<<<< HEAD
<?php
include "my_connection.php";

if(isset($_POST['sel'])) {

    include "my_connection.php";

    $sel = $_POST['sel'];
    if($sel == 1){
        $sql = "DELETE from tbl_csv where sel=1";
    }else{
        $sql = "TRUNCATE TABLE tbl_csv;";
    }
    mysqli_query($con,$sql);
    mysqli_close($con);
    echo  json_encode('success');
}

=======
<?php
include "my_connection.php";

if(isset($_POST['sel'])) {

    include "my_connection.php";

    $sel = $_POST['sel'];
    if($sel == 1){
        $sql = "DELETE from tbl_csv where sel=1";
    }else{
        $sql = "TRUNCATE TABLE tbl_csv;";
    }
    mysqli_query($con,$sql);
    mysqli_close($con);
    echo  json_encode('success');
}

>>>>>>> ff099208e932b5ae689a46b4f4a23971b9b0ceb3
?>