<!DOCTYPE html>
<html lang="es">
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
/* connect to the db */
$connection = mysql_connect('localhost','user','password');
mysql_select_db('database',$connection);
 
/* show tables */
$result = mysql_query('SHOW TABLES',$connection) or die('cannot show tables');
while($tableName = mysql_fetch_row($result)) {
 
        $table = $tableName[0];
       
        echo '<h3>',$table,'</h3>';
        $result2 = mysql_query('SHOW COLUMNS FROM '.$table) or die('cannot show columns from '.$table);
        if(mysql_num_rows($result2)) {
                echo '<table class="db-table" cellpadding="0" cellspacing="0"><thead><tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr></thead><tbody>';
                while($row2 = mysql_fetch_row($result2)) {
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