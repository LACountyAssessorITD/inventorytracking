<?php
include 'Conn.php';




$id = $_POST["idInput"];


$tag = $_POST["tagInput"];
$serial = $_POST["serialInput"];
$otherID= $_POST["otherIDInput"];
$categoryID = $_POST["categoryIDInput"];
$catagory = $_POST["catagoryInput"];

$ecapscode = $_POST["ecapscodeInput"];
$make = $_POST["makeInput"];
$model = $_POST["modelInput"];
$description = $_POST["descriptionInput"];

$cputype = $_POST["cputypeInput"];
$memorytype =$_POST["memorytypeInput"];
$harddisktype = $_POST["harddisktypeInput"];
$custodianID = $_POST["CustodianInput"];
$custodianName = $_POST["custodianNameInput"];

$originvalue = $_POST["valueInput"];
$life = $_POST["lifeInput"];
$bookvalue=$_POST["bookvalueInput"];
$expiration = $_POST["expirationInput"];
$poID=$_POST["poIDInput"];

$purchaseordernumber=$_POST["purchaseordernumberInput"];
$locationID= $_POST["locationIDInput"];
$location = $_POST["locationInput"];
$status = $_POST["statusInput"];
$statusdesc = NULL;
$statusdate = $_POST["statusdateInput"];



$importatnt = $_POST["importantInput"];
$createdate = $_POST["createdateInput"];
$createuserID = $_POST["createuserIDInput"];
$updatetime = $_POST["updatetimeInput"];

$updateUserID = $_POST["updateUserIDInput"];
$deleteuserID = -1;
$sysupdateuser = $_POST["sysupdateuserInput"];

$tag = check($tag);
$serial =check($serial);
$otherID=check($otherID);
$categoryID=check($categoryID);
$catagory=check($catagory);
$ecapscode=check($ecapscode);
$make=check($make);
$model=check($model);
$description=check($description);
$cputype=check($cputype);
$memorytype=check($memorytype);
$harddisktype=check($harddisktype);
$custodianID=check($custodianID);
$custodianName=check($custodianName);
$originvalue=check($originvalue);
$life=check($life);
$bookvalue=check($bookvalue);
$expiration=check($expiration);
$poID=check($poID);
$purchaseordernumber=check($purchaseordernumber);
$locationID=check($locationID);
$location=check($location);
$status=check($status);
$statusdesc=check($statusdesc);
$tatusdate=check($statusdate);
$importatnt=check($importatnt);
$createdate=check($createdate);
$createuserID=check($createuserID);
$updatetime=check($updatetime);
$updateUserID=check($updateUserID);
$deleteuserID=check($deleteuserID);
$sysupdateuser=check($sysupdateuser);

$val = array($id, $tag, $serial, $otherID , $categoryID, 
	$catagory,$ecapscode, $make, $model, $description, 
	$cputype, $memorytype, $harddisktype, $custodianID, $custodianName, 
	$originvalue, $life, $bookvalue, $expiration, $poID, 
	$purchaseordernumber, $locationID, $location, $status, $statusdesc,
	 $statusdate, $importatnt,$createdate,$createuserID, 
	 $updatetime, $updateUserID, $deleteuserID, $sysupdateuser);

insert($val);


function check($value){
		if ($value == "")
		{
			$value = "NULL";
		}
		return $value;
	}

?>


