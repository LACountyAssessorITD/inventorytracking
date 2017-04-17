<?php
include_once "constants.php";

	function updateCustodian($conn, $dbcolumns, $dbcolumnsType, $ASSET_ID, $CUSTODIAN_ID, $CUSTODIAN_NAME) {
		update($conn, $dbcolumns, $dbcolumnsType, array($ASSET_ID, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $CUSTODIAN_ID, $CUSTODIAN_NAME));
	}

	function approvePending($val) {
		$servername = SQL_SERVER_NAME;
		$username = SQL_SERVER_USERNAME;
		$password = SQL_SERVER_PASSWORD;
		$dbname = SQL_SERVER_DATABASE;

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
		echo $lol[1];


		update($conn, $dbcolumns, $dbcolumnsType, $lol);


		$sql = "DELETE FROM PenddingRequest WHERE ASSETTAG =";
		$sql .= "\"";
		$sql .= $val;
		$sql .= "\"";
		if ($conn->query($sql) === TRUE) {
			echo "DELETE SUCCESSFULLY\n";
		} else {
	    	echo "Error:" . $conn->error . "\n";
		}


	}

	function update($conn, $dbcolumns, $dbcolumnsType, $val) {
		$sql = updateParser($dbcolumns, $dbcolumnsType, $val);
		if ($conn->query($sql) === TRUE) {
			echo "UPDATE SUCCESSFULLY\n";
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

		for ($x = 1; $x < count($val); $x++) {
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
				if ($x != count($val) - 1) {
					$sql .= ", ";
				}
			}
		}

		$sql .= " WHERE ASSETTAG=";
		$sql .= "\"";

		$sql .= $val[1];
		$sql .= "\"";


		print($sql."\n");
		return $sql;
	}

	function insert($val) {

		$servername = SQL_SERVER_NAME;
		$username = SQL_SERVER_USERNAME;
		$password = SQL_SERVER_PASSWORD;
		$dbname = SQL_SERVER_DATABASE;

		$dbcolumns = array("ASSET_ID", "ASSETTAG", "SERIALNBR", "OTHER_ID", "CATEGORY_ID",
			"CATEGORYDESC", "ECAPSCODE", "MAKE", "MODEL", "DESCR",
			"CPUTYPE", "MEMORYTYPE", "HARDDISKTYPE", "CUSTODIAN_ID", "CUSTODIANNAME",
			"ORIGVAL", "LIFE", "BOOKVAL", "WARRANTYEXPDATE", "PO_ID",
			"PURCHASEORDERNBR", "LOCATION_ID", "LOCATIONNAME", "STATUS_ID", "STATUSDESC",
			"STATUSDATE", "IMPORTED", "CREATEDATE", "CREATEUSER_ID", "UPDATEDATE",
			"UPDATEUSER_ID", "DELETEUSER_ID", "SYSUPDATEUSER");

		$dbcolumnsType = array(FALSE, TRUE, TRUE, FALSE, FALSE,
			TRUE, TRUE, TRUE, TRUE, TRUE,
			TRUE, TRUE, TRUE, FALSE, TRUE,
			FALSE, FALSE, FALSE, FALSE, FALSE,
			TRUE, FALSE, TRUE, FALSE, TRUE,
			FALSE, FALSE, FALSE, FALSE, FALSE,
			FALSE, FALSE, TRUE);

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection Failed: " . $conn->connect_error);
		}

		echo "Connect Successfully\n";

		$sql = insertParser($dbcolumns, $dbcolumnsType, $val);
		if ($conn -> query($sql) === TRUE) {
			echo "INSERT SUCCESSFULLY\n";
			$conn->close();
			return TRUE;
		} else {
	    	echo "Error:" . $conn->error . "\n";
			$conn->close();
			return FALSE;
		}
	}

	function insertParser($dbcolumns, $dbcolumnsType, $val) {
		$sql = "INSERT INTO all_assets (";

		for ($x = 0; $x < count($val); $x++) {
			//if ($val[$x]) {
				// print("!!!". $x. "\n");
				$sql .= $dbcolumns[$x];
				if ($x != count($val) - 1) {
					$sql .= ", ";
				}
			//}
		}

		$sql .= ")\nVALUES (";

		for ($x = 0; $x < count($val); $x++) {
			//if ($val[$x]) {
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
			//}
		}

		$sql .= ")";
		// print($sql . "\n");

		return $sql;
	}

	function search($val) {
		$servername = SQL_SERVER_NAME;
		$username = SQL_SERVER_USERNAME;
		$password = SQL_SERVER_PASSWORD;
		$dbname = SQL_SERVER_DATABASE;

		$dbcolumns = array("ASSETTAG", "SERIALNBR", "CATEGORYDESC", "MODEL", "LOCATIONNAME");

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection Failed: " . $conn->connect_error);
		}

		//echo "Connect Successfully\n";

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
		$servername = SQL_SERVER_NAME;
		$username = SQL_SERVER_USERNAME;
		$password = SQL_SERVER_PASSWORD;
		$dbname = SQL_SERVER_DATABASE;
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection Failed: " . $conn->connect_error);
		}

		//echo "Connect Successfully\n";

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
			$sql .= "'";
		}
		return $sql;
	}

	function scansearch($val){
		$servername = SQL_SERVER_NAME;
		$username = SQL_SERVER_USERNAME;
		$password = SQL_SERVER_PASSWORD;
		$dbname = SQL_SERVER_DATABASE;

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
		$servername = SQL_SERVER_NAME;
		$username = SQL_SERVER_USERNAME;
		$password = SQL_SERVER_PASSWORD;
		$dbname = SQL_SERVER_DATABASE;

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
		$servername = SQL_SERVER_NAME;
		$username = SQL_SERVER_USERNAME;
		$password = SQL_SERVER_PASSWORD;
		$dbname = SQL_SERVER_DATABASE;

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
		$servername = SQL_SERVER_NAME;
		$username = SQL_SERVER_USERNAME;
		$password = SQL_SERVER_PASSWORD;
		$dbname = SQL_SERVER_DATABASE;


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
			echo "change SUCCESSFULLY\n";
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


		$sql = insertParser_Pending($dbcolumns, $dbcolumnsType, $row);

		if ($conn -> query($sql) === TRUE) {
			echo "INSERT SUCCESSFULLY\n";
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
			echo "INSERT SUCCESSFULLY\n";
		} else {
	    	echo "Error:" . $conn->error . "\n";
		}
		$conn->close();
		

	}

	function insertParser_Pending($dbcolumns, $dbcolumnsType, $val) {
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
				
			
			if ($x != count($val) - 1) {
					$sql .= ", ";
				}
		}

		$sql .= ")";
		echo($sql . "\n");

		return $sql;
	}

	function authenticateUser($username, $password) {
		$server = LDAP_SERVER_NAME;
		
		$ldap = ldap_connect($server);
		
		if ($ldap) {	
			ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
			ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
		
			$bind = ldap_bind($ldap, $username, $password);
		
			if ($bind) {
				$msg = "Authentication successful";
				echo $msg;
				
				ldap_close($ldap);
				
				return TRUE;
			} else {
				$msg = "Invalid email address / password";
				echo $msg;
				
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
		
	function validateUser($val) {
		$servername = SQL_SERVER_NAME;
		$username = SQL_SERVER_USERNAME;
		$password = SQL_SERVER_PASSWORD;
		$dbname = SQL_SERVER_DATABASE;
	
		$dbcolumns = array("USERNAME");
	
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection Failed: " . $conn->connect_error);
		}
	
		echo "Connect Successfully\n";
	
		$sql = validateUserParser($dbcolumns, $val);
		if ($result = $conn->query($sql)) {
			echo "SELECT SUCCESSFULLY\n";
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
			//if ($x != count($val) - 1) {
			//	$sql .= " AND ";
			//}
		}
		
		// print($sql . "\n");
		
		return $sql;
	}
	
	function createUser($val) {
		$servername = SQL_SERVER_NAME;
		$username = SQL_SERVER_USERNAME;
		$password = SQL_SERVER_PASSWORD;
		$dbname = SQL_SERVER_DATABASE;


		$dbcolumns = array("USERNAME", "PASSWORD");

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection Failed: " . $conn->connect_error);
		}

		echo "Connect Successfully\n";

		$sql = createUserParser($dbcolumns, $val);
		$result = $conn->query($sql);
		
		if ($result) {
			echo "INSERT SUCCESSFULLY\n";
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
			if ($x == 1) {
				$sql .= password_hash($val[$x], PASSWORD_DEFAULT);			
			} else {
				$sql .= $val[$x];
			}
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