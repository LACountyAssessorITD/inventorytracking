<?php
//Add a comment to this line
include 'Conn.php';
changePosition();
function changePosition() {
   $position = $_POST["position"];
	$id = $_POST["assetid"];

	switchPosition($id, $position); 
	// echo '<script language="javascript">';
 //    echo 'alert("Transaction Successful");';
 //    echo '</script>';


echo "<script>
window.location.href='/www/mobilescan.php';
alert('Change Location Successfully');
</script>";
  // return $result;
 }




?>