
<?php
//include connection file
include_once("connection.php");

$db = new dbObj();
$connString =  $db->getConnstring();

$params = $_REQUEST;

$action = isset($params['action']) != '' ? $params['action'] : '';
$empCls = new Employee($connString);

switch($action) {
    case 'add':
        $empCls->insertEmployee($params);
        break;
    case 'edit':
        $empCls->updateEmployee($params);
        break;
    case 'delete':
        $empCls->deleteEmployee($params);
        break;
    default:
        $empCls->getEmployees($params);
        return;
}

class Employee {
    protected $conn;
    protected $data = array();
    function __construct($connString) {
        $this->conn = $connString;
    }

    public function getEmployees($params) {

        $this->data = $this->getRecords($params);

        echo json_encode($this->data);
    }
    function insertEmployee($params) {
        $data = array();;
        $sql = "INSERT INTO `employee` (employee_name, employee_salary, employee_age) VALUES('" . $params["name"] . "', '" . $params["salary"] . "','" . $params["age"] . "');  ";

        echo $result = mysqli_query($this->conn, $sql) or die("error to insert employee data");

    }

    function getRecords($params) {
        $data = array();
        $rp = isset($params['rowCount']) ? $params['rowCount'] : 3;

        if (isset($params['current'])) { $page  = $params['current']; } else { $page=1; };
        $start_from = ($page-1) * $rp;

        $sql = $sqlRec = $sqlTot = $where = '';

        if( !empty($params['searchPhrase']) ) {
            $where .=" WHERE ";
            $where .=" ( id LIKE '".$params['searchPhrase']."%' ";

            for($ii=1; $ii<=37; $ii++){
                $where .=" OR item".$ii." LIKE '".$params['searchPhrase']."%' ";
            }

            $where .=")";
        }

        if( !empty($params['sort']) ) {
            $where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";
        }
        // getting total number records without any search
        $sql = "SELECT * FROM `tbl_csv` ";
        $sqlTot .= $sql;
        $sqlRec .= $sql;

        //concatenate search sql if value exist
        if(isset($where) && $where != '') {

            $sqlTot .= $where;
            $sqlRec .= $where;
        }
        if ($rp!=-1)
            $sqlRec .= " LIMIT ". $start_from .",".$rp;

        $qtot = mysqli_query($this->conn, $sqlTot) or die("error to fetch tot employees data");
        $queryRecords = mysqli_query($this->conn, $sqlRec) or die("error to fetch employees data");

        while( $row = mysqli_fetch_assoc($queryRecords) ) {
            if($row['sel'] == 1) {
                $row['sel'] = "<input type='checkbox' id='sel" . $row['id'] . "' onclick='SelectItem(this,". $row['id'].")' checked >";
            }else{
                $row['sel'] = "<input type='checkbox' id='sel" . $row['id'] . "' onclick='SelectItem(this,". $row['id'].")' >";
            }
            $row['item11'] = "<img class='img-responsive photo' src='".$row['item11']."'>";
            $row['item12'] = "<img class='img-responsive photo' src='".$row['item12']."'>";
            $row['item13'] = "<img class='img-responsive photo' src='".$row['item13']."'>";
            $row['item14'] = "<img class='img-responsive photo' src='".$row['item14']."'>";
            $row['item15'] = "<img class='img-responsive photo' src='".$row['item15']."'>";
            $row['item16'] = "<img class='img-responsive photo' src='".$row['item16']."'>";
            $row['item17'] = "<img class='img-responsive photo' src='".$row['item17']."'>";
            $row['item20'] = "<img class='img-responsive photo' src='".$row['item20']."'>";
            $row['item30'] = "<img class='img-responsive photo' src='".$row['item30']."'>";

            $data[] = $row;
        }

        $json_data = array(
            "current"            => intval($params['current']),
            "rowCount"            => 10,
            "total"    => intval($qtot->num_rows),
            "rows"            => $data   // total data array
        );

        return $json_data;
    }
    function updateEmployee($params) {
        $data = array();
        //print_R($_POST);die;
        $sql = "Update `tbl_csv` set ";

        $sql = $sql." item1='".$params["item1"];
        for($i = 2; $i <= 37; $i++){
            if(($i<11 || $i>17) && $i != 20 && $i !=30 ) {
                $sql = $sql . "', item" . $i . "='" . $params["item" . $i];
            }
        }
        $sql = $sql."' WHERE id='".$params["edit_id"]."'";
        echo $result = mysqli_query($this->conn, $sql) or die("error to update employee data");
    }

    function deleteEmployee($params) {
        $data = array();
        //print_R($_POST);die;
        $sql = "delete from `employee` WHERE id='".$params["id"]."'";

        echo $result = mysqli_query($this->conn, $sql) or die("error to delete employee data");
    }
}
?>
	