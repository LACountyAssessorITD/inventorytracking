<?php
//Add a comment to this line
include 'Conn.php';
	  session_start();


   $owner = $_POST["nameInput"];
   $mylist[]= array(); 
   $mylist[]= $_SESSION['other'];
 // echo $_SESSION['logged_in'];
	$i=1;
while ( $i< count($_SESSION['other'])){

	switchOwner( $_SESSION['other'][$i], $owner); 
	//echo $_SESSION['other'][$i];
	$i++;
}

echo "<script>
window.location.href='/www/mobilescan.php';
alert('Change Owner Successfully');
</script>";
  // return $result;
 



?>