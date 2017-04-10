<?php
//Add a comment to this line
include 'Conn.php';


function searchForAsset() {

   $serialNum = $_POST["query"];

   $type=$_POST["type"];
   if ($type=="device"){


   $result = scansearch($serialNum);}
   else{
       $result = scansearch_location($serialNum);

   }

  //      if ($result->num_rows > 0) {


  //       while ($row = $result->fetch_array(MYSQLI_NUM)) {
  //  			 $val = $row[1];
  //  			 array_push($mylist, $val);

		// 	} 
		// }else {
  //    	 echo "0 results";
		// }

  //   $_SESSION["other"] = $mylist;

   return $result;
 }




 /**
 * 
 */



?>