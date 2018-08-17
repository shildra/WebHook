<?php
define('HOSTNAME','h2613153.stratoserver.net');
define('DB_USERNAME','dbo00091585');
define('DB_PASSWORD','!!defscript18!!');
define('DB_NAME', 'db00091585');

Class dbObj{

	var $conn;
	function getConnstring() {
		$con = mysqli_connect(HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Connection failed: " . mysqli_connect_error());
//        $con = mysqli_connect("localhost", "root", "dhgidsus", "test") or die("Connection failed: " . mysqli_connect_error());
		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		} else {
			$this->conn = $con;
		}
		return $this->conn;
	}
}

?>