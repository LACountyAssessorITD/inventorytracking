<html>
<head>
<meta charset="utf-8" />
<title>Tables from MySQL Database</title>
 
<style type="text/css">
table.db-table          { border-right:1px solid #ccc; border-bottom:1px solid #ccc; }
table.db-table th       { background:#eee; padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
table.db-table td       { padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
</style>
 
</head>
<body>

<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "LACounty_TEST";

    // $connection = mysql_connect($servername,$username, $password);
    // mysql_select_db($LACounty_TEST,$connection);

    $connection = new mysqli($servername, $username, $password, $dbname);

    $sql=" SELECT * FROM ASSET ";
    $result = $connection->query($sql);


    if ($result->num_rows > 0) {
         echo '<table class="db-table" cellpadding="0" cellspacing="0"><thead><tr><th>ASSET_ID</th><th>ASSETTAG</th><th>SERIALNBR</th><th>OTHER_ID</th><th>CATEGORY_ID</th><th>CATEGORYDESC</th><th>ECAPSCODE</th><th>MAKE</th>
                <th>MODEL</th><th>DECR</th><th>CPUTYPE</th><th>MEMORYTYPE</th><th>HARDDISKTYPE</th><th>CUSTODIANID</th><th>CUSTODIANNAME</th><th>ORIGVAL</th>
                <th>ASSET_ID</th><th>ASSETTAG</th><th>SERIALNBR</th><th>OTHER_ID</th><th>CATEGORY_ID</th><th>CATEGORYDESC</th><th>ECAPSCODE</th><th>MAKE</th>
                <th>LIFE</th><th>BOOKVAL</th><th>WARRENTYEXPDATE</th><th>PO_ID</th><th>PURCHASEORDERNBR</th><th>LOCATION_ID</th><th>LOCATIONNAME</th><th>STATUS_ID</th>
                 <th>STATUSDESC</th><th>STATUSDATE</th><th>IMPORTED</th><th>CREATEDATE</th><th>CREATEUSER_ID</th><th>UPDATEDATE</th><th>UPDATEUSER_ID</th><th>DELETEUSER_ID</th>
                <th>SYSUPDATEUSER</th>

                </tr></thead><tbody>';
        while($row = $result->fetch_array(MYSQLI_NUM)) {
                echo '<tr>';

                for($x=0; $x<count($row); $x++){
                 echo '<td>',$row[$x],'</td>';

         }
                 echo '</tr>';

        }        echo '</tbody></table><br>';

    } else {
      echo "0 results";
  }




while($tableName = mysql_fetch_row($result)) {
 
        $table = $tableName[0];
       
        echo '<h3>',$table,'</h3>';
        $result2 = mysql_query('SHOW COLUMNS FROM '.$table) or die('cannot show columns from '.$table);
        if(mysql_num_rows($result2)) {
                echo '<table class="db-table" cellpadding="0" cellspacing="0"><thead><tr><th>ASSET_ID</th><th>ASSETTAG</th><th>SERIALNBR</th><th>OTHER_ID</th><th>CATEGORY_ID</th><th>CATEGORYDESC</th><th>ECAPSCODE</th><th>MAKE</th>
                <th>MODEL</th><th>DECR</th><th>CPUTYPE</th><th>MEMORYTYPE</th><th>HARDDISKTYPE</th><th>CUSTODIANID</th><th>CUSTODIANNAME</th><th>ORIGVAL</th>
                <th>ASSET_ID</th><th>ASSETTAG</th><th>SERIALNBR</th><th>OTHER_ID</th><th>CATEGORY_ID</th><th>CATEGORYDESC</th><th>ECAPSCODE</th><th>MAKE</th>
                <th>LIFE</th><th>BOOKVAL</th><th>WARRENTYEXPDATE</th><th>PO_ID</th><th>PURCHASEORDERNBR</th><th>LOCATION_ID</th><th>LOCATIONNAME</th><th>STATUS_ID</th>
                 <th>STATUSDESC</th><th>STATUSDATE</th><th>IMPORTED</th><th>CREATEDATE</th><th>CREATEUSER_ID</th><th>UPDATEDATE</th><th>UPDATEUSER_ID</th><th>DELETEUSER_ID</th>
                <th>SYSUPDATEUSER</th>

                </tr></thead><tbody>';
                
                while($row2 = fetch_array($result2)) {
                        echo '<tr>';
                        foreach($row2 as $key=>$value) {
                                echo '<td>',$value,'</td>';
                        }
                        echo '</tr>';
                }
                echo '</tbody></table><br>';
        }

}
?>



 
</body>
</html>