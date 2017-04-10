var watchlist = document.getElementById('table-content');
var tableHeaders = ["ASSET_ID", "ASSETTAG", "SERIALNBR", "OTHER_ID", "CATEGORY_ID",
"CATEGORYDESC", "ECAPSCODE", "MAKE", "MODEL", "DECR",
"CPUTYPE", "MEMORYTYPE", "HARDDISKTYPE", "CUSTODIANID", "CUSTODIANNAME",
"ORIGVAL", "LIFE", "BOOKVAL", "WARRENTYEXPDATE", "PO_ID",
"PURCHASEORDERNBR", "LOCATION_ID", "LOCATIONNAME", "STATUS_ID", "STATUSDESC",
"STATUSDATE", "IMPORTED", "CREATEDATE", "CREATEUSER_ID", "UPDATEDATE",
"UPDATEUSER_ID", "DELETEUSER_ID", "SYSUPDATEUSER"
];
	


function reloadAddToTable(){
	//Send request to database
	var request = new XMLHttpRequest();
  	var url = "../php/Conn.php";
  	request.open("GET", url, true);
	request.setRequestHeader("Content-Type", "text/html");
	request.addEventListener("readystatechange", handleUserStockResult, false);
	request.send();

}
