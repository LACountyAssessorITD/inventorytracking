<?php

	function updateCustodian($conn, $dbcolumns, $dbcolumnsType, $ASSET_ID, $CUSTODIAN_ID, $CUSTODIAN_NAME) {
		update($conn, $dbcolumns, $dbcolumnsType, array($ASSET_ID, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $CUSTODIAN_ID, $CUSTODIAN_NAME));
	}

	function approvePending($val) {
		session_start();

		$servername = "localhost:3306";
		$username = "root";
		$password = "";
		$dbname = "LACounty_TEST";

		$dbcolumns = array("ASSET_ID", "ASSETTAG", "SERIALNBR", "OTHER_ID", "CATEGORY_ID",
			"CATEGORYDESC", "ECAPSCODE", "MAKE", "MODEL", "DESCR",
			"CPUTYPE", "MEMORYTYPE", "HARDDISKTYPE", "CUSTODIAN_ID", "CUSTODIANNAME",
			"ORIGVAL", "LIFE", "BOOKVAL", "WARRANTYEXPDATE", "PO_ID",
			"PURCHASEORDERNBR", "LOCATION_ID", "LOCATIONNAME", "STATUS_ID", "STATUSDESC",
			"STATUSDATE", "IMPORTED", "CREATEDATE", "CREATEUSER_ID", "UPDATEDATE",
			"UPDATEUSER_ID", "DELETEUSER_ID", "SYSUPDATEUSER");

		$dbcolumnsType = array(FALSE, TRUE, TRUE, TRUE, FALSE,
			TRUE, TRUE, TRUE, TRUE, TRUE,
			TRUE, TRUE, TRUE, FALSE, TRUE,
			FALSE, FALSE, FALSE, TRUE, FALSE,
			TRUE, FALSE, TRUE, FALSE, TRUE,
			TRUE, TRUE, TRUE, FALSE, TRUE,
			FALSE, FALSE, TRUE);



		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection Failed: " . $conn->connect_error);
		}
		$all=search_pending($val);

		$lol= $all->fetch_array(MYSQLI_NUM);
		// echo $lol[1];


		$new_table = update($conn, $dbcolumns, $dbcolumnsType, $lol);


		$sql = "DELETE FROM PenddingRequest WHERE ASSETTAG =";
		$sql .= "\"";
		$sql .= $val;
		$sql .= "\"";
		if ($conn->query($sql) === TRUE) {
			//echo "DELETE SUCCESSFULLY\n";
		} else {
	    	echo "Error:" . $conn->error . "\n";
		}


		$sql = "INSERT INTO `history` (`ASSETTAG`, `UPDATE_TIME`, `DESCRIPTION`, `UPDATE_BY_USER`) VALUES";
		$sql .= "('";
		$sql .= $lol[1];
		$sql .= "', '";
		// $sql .= date_create()->format('Y-m-d H:i:s');
		date_default_timezone_set('America/Los_Angeles');

		$sql .=date('Y-m-d H:i:s');

// date_default_timezone_set('America/Los Angeles');
// echo date('d-m-Y H:i');


		$sql .="', '";
		$sql .="approve transaction: change ";
		if ( $lol[33] =="owner"){

			$sql .=$lol[33];
			$sql .=" to ";
			$sql .=$lol[32];
		}
		else {

			$sql .="location to ";
			$sql .=$lol[22];

		}
		$sql .="', '";
		$sql .= $_SESSION['username'];
		$sql .="');";

		// echo $sql;

		if ($conn->query($sql) === TRUE) {
			echo "Approve Pending Successfully\n";
		} else {
	    	echo "Error:" . $conn->error . "\n";
		}



	}


	function denyPending($val){
		session_start();

		$servername = "localhost:3306";
		$username = "root";
		$password = "";
		$dbname = "LACounty_TEST";

		$dbcolumns = array("ASSET_ID", "ASSETTAG", "SERIALNBR", "OTHER_ID", "CATEGORY_ID",
			"CATEGORYDESC", "ECAPSCODE", "MAKE", "MODEL", "DESCR",
			"CPUTYPE", "MEMORYTYPE", "HARDDISKTYPE", "CUSTODIAN_ID", "CUSTODIANNAME",
			"ORIGVAL", "LIFE", "BOOKVAL", "WARRANTYEXPDATE", "PO_ID",
			"PURCHASEORDERNBR", "LOCATION_ID", "LOCATIONNAME", "STATUS_ID", "STATUSDESC",
			"STATUSDATE", "IMPORTED", "CREATEDATE", "CREATEUSER_ID", "UPDATEDATE",
			"UPDATEUSER_ID", "DELETEUSER_ID", "SYSUPDATEUSER");

		$dbcolumnsType = array(FALSE, TRUE, TRUE, TRUE, FALSE,
			TRUE, TRUE, TRUE, TRUE, TRUE,
			TRUE, TRUE, TRUE, FALSE, TRUE,
			FALSE, FALSE, FALSE, TRUE, FALSE,
			TRUE, FALSE, TRUE, FALSE, TRUE,
			TRUE, TRUE, TRUE, FALSE, TRUE,
			FALSE, FALSE, TRUE);



		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection Failed: " . $conn->connect_error);
		}
		$all=search_pending($val);
		$lol= $all->fetch_array(MYSQLI_NUM);

		$sql = "DELETE FROM PenddingRequest WHERE ASSETTAG =";
		$sql .= "\"";
		$sql .= $val;
		$sql .= "\"";
		if ($conn->query($sql) === TRUE) {
			//echo "DELETE SUCCESSFULLY\n";
		} else {
	    	echo "Error:" . $conn->error . "\n";
		}

		


		$sql = "INSERT INTO `history` (`ASSETTAG`, `UPDATE_TIME`, `DESCRIPTION`, `UPDATE_BY_USER`) VALUES";
		$sql .= "('";
		$sql .= $val;
		$sql .= "', '";
		$sql .= date_create()->format('Y-m-d H:i:s');
		$sql .="', '";
		$sql .="deny transaction : change ";
		if ( $lol[33] =="owner"){
			$sql .=$lol[33];
			$sql .=" to ";
			$sql .=$lol[32];
		}
		else {
			$sql .="location to ";
			$sql .=$lol[22];

		}
		$sql .="', '";
		$sql .= $_SESSION['username'];
		$sql .="');";

		//echo $sql;

		if ($conn->query($sql) === TRUE) {
			echo "Deny Pending SUCCESSFULLY\n";
		} else {
	    	echo "Error:" . $conn->error . "\n";
		}

	}

	function update($conn, $dbcolumns, $dbcolumnsType, $val) {
		$sql = updateParser($dbcolumns, $dbcolumnsType, $val);
		if ($conn->query($sql) === TRUE) {
			//echo "UPDATE SUCCESSFULLY\n";
		} else {
	    	echo "Error:" . $conn->error . "\n";
		}
	}

	function updateParser($dbcolumns, $dbcolumnsType, $val){
		if (count($val) < 2) {
			echo "NOT ENOUGH ARGS\n";
			return;
		}

		// $sql = "UPDATE ASSET SET CUSTODIANID='3520', CUSTODIANNAME='SUE' WHERE ASSET_ID=7";
		$sql = "UPDATE all_assets SET ";

		for ($x = 1; $x < count($val)-1; $x++) {
			if ($val[$x]) {
				$sql .= $dbcolumns[$x];
				$sql .= "=";
				if ($dbcolumnsType[$x]) {
					$sql .= "'";
				}
				$sql .= $val[$x];
				if ($dbcolumnsType[$x]) {
					$sql .= "'";
				}
				if ($x != count($val) - 2) {
					$sql .= ", ";
				}
			}
		}

		$sql .= " WHERE ASSETTAG=";
		$sql .= "\"";

		$sql .= $val[1];
		$sql .= "\"";


		//print($sql."\n");
		return $sql;
	}

	function insert($val) {

		$servername = "localhost:3306";
		$username = "root";
		$password = "";
		$dbname = "LACounty_TEST";

		$dbcolumns = array("ASSET_ID", "ASSETTAG", "SERIALNBR", "OTHER_ID", "CATEGORY_ID",
			"CATEGORYDESC", "ECAPSCODE", "MAKE", "MODEL", "DESCR",
			"CPUTYPE", "MEMORYTYPE", "HARDDISKTYPE", "CUSTODIAN_ID", "CUSTODIANNAME",
			"ORIGVAL", "LIFE", "BOOKVAL", "WARRANTYEXPDATE", "PO_ID",
			"PURCHASEORDERNBR", "LOCATION_ID", "LOCATIONNAME", "STATUS_ID", "STATUSDESC",
			"STATUSDATE", "IMPORTED", "CREATEDATE", "CREATEUSER_ID", "UPDATEDATE",
			"UPDATEUSER_ID", "DELETEUSER_ID", "SYSUPDATEUSER");

		$dbcolumnsType = array(TRUE, TRUE, TRUE, TRUE, TRUE,
			TRUE, TRUE, TRUE, TRUE, TRUE,
			TRUE, TRUE, TRUE, TRUE, TRUE,
			TRUE, TRUE, TRUE, TRUE, TRUE,
			TRUE, TRUE, TRUE, TRUE, TRUE,
			TRUE, TRUE, TRUE, TRUE, TRUE,
			TRUE, TRUE, TRUE);

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection Failed: " . $conn->connect_error);
		}


		$sql = insertParser($dbcolumns, $dbcolumnsType, $val);
		if ($conn -> query($sql) === TRUE) {
			// echo "INSERT SUCCESSFULLY\n";
			echo "<script>
window.location.href='/www/form.php';
alert('Insert Successfully');
</script>";

		} else {
	    	echo "Error:" . $conn->error . "\n";

	    	

		}
	//	echo $sql;

		$conn->close();
	}

	function insertParser($dbcolumns, $dbcolumnsType, $val) {
		$sql = "INSERT INTO all_assets (";

		for ($x = 0; $x < count($val); $x++) {
			if ($val[$x]) {
				// print("!!!". $x. "\n");
				$sql .= $dbcolumns[$x];
				if ($x != count($val) - 1) {
					$sql .= ", ";
				}
			}
		}

		$sql .= ")\nVALUES (";

		for ($x = 0; $x < count($val); $x++) {
			if ($val[$x]) {
				// print("!!!". $x. "\n");
				if ($dbcolumnsType[$x]) {
					$sql .= "'";
				}
				$sql .= $val[$x];
				if ($dbcolumnsType[$x]) {
					$sql .= "'";
				}
				if ($x != count($val) - 1) {
					$sql .= ", ";
				}
			}
		}

		$sql .= ")";
		// print($sql . "\n");

		return $sql;
	}

	function search($val) {
		$servername = "localhost:3306";
		$username = "root";
		$password = "";
		$dbname = "LACounty_TEST";

		$dbcolumns = array("ASSETTAG", "SERIALNBR", "CATEGORYDESC", "MODEL", "LOCATIONNAME");

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection Failed: " . $conn->connect_error);
		}

		// echo "Connect Successfully\n";

		$sql = searchParser($dbcolumns, $val);
		if ($result = $conn->query($sql)) {
			//echo "SELECT SUCCESSFULLY\n";
		} else {
	    	echo "Error:" . $conn->error . "\n";
		}

		$conn->close();
		
		return $result;
	}

	function searchParser($dbcolumns, $val) {
		$sql = "SELECT * FROM all_assets";
		
		if (count($val) > 0) {
			$sql .= " WHERE ";
			
			$numCriteria = 0;
			for ($x = 0; $x < count($val); $x++) {
				if ($val[$x]) {
					$numCriteria++;
				}
			}
			
			for ($x = 0, $y = 0; $x < count($val); $x++) {
				if ($val[$x]) {
					// print("!!!". $x. "\n");
					$y++;
					$sql .= $dbcolumns[$x];
					$sql .= " LIKE ";
					$sql .= "\"%";
					$sql .= $val[$x];
					$sql .= "%\"";
					if ($y != $numCriteria) {
						$sql .= " AND ";
					}
				}
			}
		}
		return $sql;
	}

	function searchHistory($val){
		$servername = "localhost:3306";
		$username = "root";
		$password = "";
		$dbname = "LACounty_TEST";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection Failed: " . $conn->connect_error);
		}

		// echo "Connect Successfully\n";

		$sql = searchHistoryParser($val);

		if ($result = $conn->query($sql)) {
			// echo "SELECT SUCCESSFULLY\n";
		} else {
	    	echo "Error:" . $conn->error . "\n";
		}

		$conn->close();
		
		return $result;
	}

	function searchHistoryParser($val) {
		if (count($val) > 0) {
			$sql = "SELECT * FROM `history` WHERE `ASSETTAG` LIKE '";
			$sql .= $val[0];

			$sql .= "' ORDER BY `history`.`UPDATE_TIME` DESC";

		}
		return $sql;
	}

	function scansearch($val){
		$servername = "localhost:3306";
		$username = "root";
		$password = "";
		$dbname = "LACounty_TEST";

		//$dbcolumns = array("ASSETTAG");

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection Failed: " . $conn->connect_error);
		}

		//echo "Connect Successfully\n";

		$sql = searchParser_s( $val);
		if ($result = $conn->query($sql)) {
			//echo "SELECT SUCCESSFULLY\n";
		} else {
	    	echo "Error:" . $conn->error . "\n";
		}

		$conn->close();
		
		return $result;
	}

	function scansearch_location($val){
		$servername = "localhost:3306";
		$username = "root";
		$password = "";
		$dbname = "LACounty_TEST";

		//$dbcolumns = array("ASSETTAG");

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection Failed: " . $conn->connect_error);
		}

		//echo "Connect Successfully\n";

		$sql = searchParser_ss( $val);
		if ($result = $conn->query($sql)) {
			//echo "SELECT SUCCESSFULLY\n";
		} else {
	    	echo "Error:" . $conn->error . "\n";
		}

		$conn->close();
		
		return $result;
	}

	function searchParser_ss($val){
		$sql = "SELECT * FROM all_assets";
		if (count($val) > 0) {
			$sql .= " WHERE ";
			$sql .= " LOCATIONNAME ";
			$sql .= " LIKE ";
			$sql .= "\"";
			$sql .= $val;
			$sql .= "\"";


		}
		return $sql;

	}
	function searchParser_s($val){
		$sql = "SELECT * FROM all_assets";
		if (count($val) > 0) {
			$sql .= " WHERE ";
			$sql .= " ASSETTAG ";
			$sql .= " LIKE ";
			$sql .= "\"";
			$sql .= $val;
			$sql .= "\"";


		}
		return $sql;

	}

function search_pending($val){
		$servername = "localhost:3306";
		$username = "root";
		$password = "";
		$dbname = "LACounty_TEST";

		//$dbcolumns = array("ASSETTAG");

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection Failed: " . $conn->connect_error);
		}

		//echo "Connect Successfully\n";

		$sql = search_pending_Parser( $val);
		if ($result = $conn->query($sql)) {
			//echo "SELECT SUCCESSFULLY\n";
		} else {
	    	echo "Error:" . $conn->error . "\n";
		}

		$conn->close();
		
		return $result;
	}

	function search_pending_Parser($val){
		$sql = "SELECT * FROM PenddingRequest";
		if (count($val) > 0) {
			$sql .= " WHERE ";
			$sql .= " ASSETTAG ";
			$sql .= " LIKE ";
			$sql .= "\"";
			$sql .= $val;
			$sql .= "\"";


		}
		return $sql;

	}

	function switchPosition($id, $position){
		$servername = "localhost:3306";
		$username = "root";
		$password = "";
		$dbname = "LACounty_TEST";


		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection Failed: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM all_assets";
		if (count($id) > 0) {
			$sql .= " WHERE ";
			$sql .= " ASSETTAG ";
			$sql .= " LIKE ";
			$sql .= "\"";
			$sql .= $id;
			$sql .= "\"";
		}		
	
		if ($result = $conn->query($sql)) {
			// echo "change SUCCESSFULLY\n";
		} else {
	    	echo "Error:" . $conn->error . "\n";
		}


		$row = $result->fetch_array(MYSQLI_NUM);
		// echo ($row);

		

		$dbcolumns = array("ASSET_ID", "ASSETTAG", "SERIALNBR", "OTHER_ID", "CATEGORY_ID",
			"CATEGORYDESC", "ECAPSCODE", "MAKE", "MODEL", "DECR",
			"CPUTYPE", "MEMORYTYPE", "HARDDISKTYPE", "CUSTODIANID", "CUSTODIANNAME",
			"ORIGVAL", "LIFE", "BOOKVAL", "WARRENTYEXPDATE", "PO_ID",
			"PURCHASEORDERNBR", "LOCATION_ID", "LOCATIONNAME", "STATUS_ID", "STATUSDESC",
			"STATUSDATE", "IMPORTED", "CREATEDATE", "CREATEUSER_ID", "UPDATEDATE",
			"UPDATEUSER_ID", "DELETEUSER_ID", "SYSUPDATEUSER");

		$dbcolumnsType = array(FALSE, TRUE, TRUE, TRUE, FALSE,
			TRUE, TRUE, TRUE, TRUE, TRUE,
			TRUE, TRUE, TRUE, FALSE, TRUE,
			FALSE, FALSE, FALSE, TRUE, FALSE,
			TRUE, FALSE, TRUE, FALSE, TRUE,
			TRUE, TRUE, TRUE, FALSE, TRUE,
			FALSE, FALSE, TRUE);


		$sql = insertParser_Pending($dbcolumns, $dbcolumnsType, $row, "location");

		if ($conn -> query($sql) === TRUE) {
			// echo "INSERT SUCCESSFULLY\n";
		} else {
	    	echo "Error:" . $conn->error . "\n";
		}

		$sql = "UPDATE PenddingRequest";
		$sql.=" SET LOCATIONNAME = ";
					$sql .= "\"";

		$sql.=$position;
					$sql .= "\"";

		$sql.= " WHERE ASSETTAG = ";
		$sql .= "\"";

		$sql.=$id;
		$sql .= "\"";

		if ($conn -> query($sql) === TRUE) {
			//echo "INSERT SUCCESSFULLY\n";
		} else {
	    	echo "Error:" . $conn->error . "\n";
		}
		$conn->close();
		

	}


	function switchOwner($id, $owner){
	$servername = "localhost:3306";
		$username = "root";
		$password = "";
		$dbname = "LACounty_TEST";


		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection Failed: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM all_assets";
		if (count($id) > 0) {
			$sql .= " WHERE ";
			$sql .= " ASSETTAG ";
			$sql .= " LIKE ";
			$sql .= "\"";
			$sql .= $id;
			$sql .= "\"";
		}		
	
		if ($result = $conn->query($sql)) {
			// echo "change SUCCESSFULLY\n";
		} else {
	    	echo "Error:" . $conn->error . "\n";
		}


		$row = $result->fetch_array(MYSQLI_NUM);
		// echo ($row);

		

		$dbcolumns = array("ASSET_ID", "ASSETTAG", "SERIALNBR", "OTHER_ID", "CATEGORY_ID",
			"CATEGORYDESC", "ECAPSCODE", "MAKE", "MODEL", "DECR",
			"CPUTYPE", "MEMORYTYPE", "HARDDISKTYPE", "CUSTODIANID", "CUSTODIANNAME",
			"ORIGVAL", "LIFE", "BOOKVAL", "WARRENTYEXPDATE", "PO_ID",
			"PURCHASEORDERNBR", "LOCATION_ID", "LOCATIONNAME", "STATUS_ID", "STATUSDESC",
			"STATUSDATE", "IMPORTED", "CREATEDATE", "CREATEUSER_ID", "UPDATEDATE",
			"UPDATEUSER_ID", "DELETEUSER_ID", "SYSUPDATEUSER", "SWITCH");

		$dbcolumnsType = array(FALSE, TRUE, TRUE, TRUE, FALSE,
			TRUE, TRUE, TRUE, TRUE, TRUE,
			TRUE, TRUE, TRUE, FALSE, TRUE,
			FALSE, FALSE, FALSE, TRUE, FALSE,
			TRUE, FALSE, TRUE, FALSE, TRUE,
			TRUE, TRUE, TRUE, FALSE, TRUE,
			FALSE, FALSE, TRUE, TRUE);

		$sql = insertParser_Pending($dbcolumns, $dbcolumnsType, $row,"owner");
		if ($conn -> query($sql) === TRUE) {
			// echo "INSERT SUCCESSFULLY\n";
		} else {
	    	echo "Error:" . $conn->error . "\n";
		}

		$sql = "UPDATE PenddingRequest";
		$sql.=" SET SYSUPDATEUSER = ";
		$sql .= "\"";

		$sql.=$owner;
					$sql .= "\"";

		$sql.= " WHERE ASSETTAG = ";
		$sql .= "\"";

		$sql.=$id;
		$sql .= "\"";

		if ($conn -> query($sql) === TRUE) {
			// echo "INSERT SUCCESSFULLY\n";
		} else {
	    	echo "Error:" . $conn->error . "\n";
		}
		$conn->close();

	}


	function insertParser_Pending($dbcolumns, $dbcolumnsType, $val,$type) {
		$sql = "INSERT INTO PenddingRequest ";
		$sql .= " VALUES (";

		for ($x = 0; $x < count($val); $x++) {
				// echo("!!!". $x. "\n");
				if ($dbcolumnsType[$x]) {
					$sql .= "'";
				}
				$sql .= $val[$x];
				if ($dbcolumnsType[$x]) {
					$sql .= "'";
				}
				
			
			//if ($x != count($val) - 1) {
					$sql .= ", ";
				
		}
		$sql.="'";
		$sql.=$type;
		$sql.="'";


		$sql .= ")";
		// echo($sql . "\n");

		return $sql;
	}



		
	function validateUser($val) {
		$servername = "localhost:3306";
		$username = "root";
		$password = "";
		$dbname = "LACounty_TEST";

		$dbcolumns = array("USERNAME", "PASSWORD");

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection Failed: " . $conn->connect_error);
		}

		echo "Connect Successfully\n";

		$sql = validateUserParser($dbcolumns, $val);
		if ($result = $conn->query($sql)) {
			// echo "SELECT SUCCESSFULLY\n";
		} else {
	    	echo "Error:" . $conn->error . "\n";
		}

		$conn->close();
		
		return $result;
	}

	function validateUserParser($dbcolumns, $val) {
		$sql = "SELECT * FROM users WHERE ";
					
		for ($x = 0; $x < count($val); $x++) {
			// print("!!!". $x. "\n");
			$sql .= $dbcolumns[$x];
			$sql .= "=\"";
			$sql .= $val[$x];
			$sql .= "\"";
			if ($x != count($val) - 1) {
				$sql .= " AND ";
			}
		}
		
		// print($sql . "\n");
		
		return $sql;
	}
	
	function createUser($val) {
	$servername = "localhost:3306";
		$username = "root";
		$password = "";
		$dbname = "LACounty_TEST";


		$dbcolumns = array("USERNAME", "PASSWORD");

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection Failed: " . $conn->connect_error);
		}

		echo "Connect Successfully\n";

		$sql = createUserParser($dbcolumns, $val);
		$result = $conn->query($sql);
		
		if ($result) {
			// echo "INSERT SUCCESSFULLY\n";
		} else {
	    	echo "Error:" . $conn->error . "\n";
		}

		$conn->close();
		
		return $result;
	}

	function createUserParser($dbcolumns, $val) {
		$sql = "INSERT INTO users (";

		for ($x = 0; $x < count($val); $x++) {
			// print("!!!". $x. "\n");
			$sql .= $dbcolumns[$x];
			if ($x != count($val) - 1) {
				$sql .= ", ";
			}
		}

		$sql .= ") VALUES (";

		for ($x = 0; $x < count($val); $x++) {
			// print("!!!". $x. "\n");
			$sql .= "'";
			$sql .= $val[$x];
			$sql .= "'";
			if ($x != count($val) - 1) {
				$sql .= ", ";
			}
		}

		$sql .= ")";
		// print($sql . "\n");

		return $sql;
	}

	function createDB($conn) {
		$sql = "CREATE TABLE asset (
			ASSET_ID INT(10) UNSIGNED PRIMARY KEY,
			ASSETTAG VARCHAR(8) NOT NULL,
			SERIALNBR VARCHAR(45) NOT NULL,
			OTHER_ID INT(10),
			CATEGORY_ID INT(5) NOT NULL,
			CATEGORYDESC VARCHAR(45) NOT NULL,
			ECAPSCODE VARCHAR(5),
			MAKE VARCHAR(15),
			MODEL VARCHAR(20),
			DECR VARCHAR(100),
			CPUTYPE VARCHAR(20),
			MEMORYTYPE VARCHAR(10),
			HARDDISKTYPE VARCHAR(10),
			CUSTODIANID INT(10) NOT NULL,
			CUSTODIANNAME VARCHAR(30) NOT NULL,
			ORIGVAL DOUBLE NOT NULL,
			LIFE INT(10),
			BOOKVAL INT(10),
			WARRENTYEXPDATE DATETIME,
			PO_ID INT(10),
			PURCHASEORDERNBR VARCHAR(20),
			LOCATION_ID INT(5),
			LOCATIONNAME VARCHAR(30),
			STATUS_ID INT(1),
			STATUSDESC VARCHAR(10),
			STATUSDATE DATETIME,
			IMPORTED VARCHAR(10),
			CREATEDATE DATETIME,
			CREATEUSER_ID INT(10),
			UPDATEDATE DATETIME,
			UPDATEUSER_ID INT(10),
			DELETEUSER_ID INT(10),
			SYSUPDATEUSER VARCHAR(20)
			)";

		if ($conn -> query($sql) === TRUE) {
			echo "Table created successfully\n";
		} else {
	    	echo "Error creating table: " . $conn->error . "\n";
		}
	}
?>