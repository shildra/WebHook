<<<<<<< HEAD
<?php
include "my_connection.php";

if(isset($_POST['id']) && isset($_POST['newValue'])) {

    include "my_connection.php";

    $value = $_POST['newValue'];
    $id = $_POST['id'];
    echo json_encode("Posted ID=".$id);
    if($id==-1){
        $sql = "UPDATE tbl_csv SET sel=" . $value;
        echo json_encode("ID=All");
    }else {
        echo json_encode("ID=".$id);
        $sql = "UPDATE tbl_csv SET sel='" . $value . "' where id=" . $id;
    }

    mysqli_query($con,$sql);
    mysqli_close($con);
    echo  json_encode('success');
}

=======
<?php
include "my_connection.php";

if(isset($_POST['id']) && isset($_POST['newValue'])) {

    include "my_connection.php";

    $value = $_POST['newValue'];
    $id = $_POST['id'];
    echo json_encode("Posted ID=".$id);
    if($id==-1){
        $sql = "UPDATE tbl_csv SET sel=" . $value;
        echo json_encode("ID=All");
    }else {
        echo json_encode("ID=".$id);
        $sql = "UPDATE tbl_csv SET sel='" . $value . "' where id=" . $id;
    }

    mysqli_query($con,$sql);
    mysqli_close($con);
    echo  json_encode('success');
}

>>>>>>> ff099208e932b5ae689a46b4f4a23971b9b0ceb3
?>