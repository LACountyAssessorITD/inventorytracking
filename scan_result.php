<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CSCI 401</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<?php
include "php/session.php";
include "php/search.php";

  session_start();
 // checkForActiveSession();

echo '
   
    <div id="wrapper">
          <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">';

               // echo getName(); 

               echo' </a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">  <a href="php/process_logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav> 
           <!-- /. NAV TOP  -->
              <!-- /. NAV TOP  -->
                 <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                    </li>
                
                    
                    <li>
                        <a  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li  >
                        <a   href="form.php"><i class="fa fa-edit fa-3x"></i> Create </a>
                    </li>   

                     <li>
                        <a href="search.php" ><i class="fa fa-sitemap fa-3x"></i> Search</a>
                      </li> 
                       <li  >
                                 <a  href="table.php" ><i class="fa fa-table fa-3x"></i> All Assets</a>
                        </li>

                           <li >
                             <a  href="mobilescan.php"  class="active-menu"><i class="fa fa-mobile fa-3x" style="padding-left: 10px; padding-right: 10px"></i> mobile scan</a>
                          </li>
                          

                    
                </ul>
               
            </div>
            
        </nav> 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
						<h2>Scan Asset</h2>
                        
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row" >
                   <div class="col-md-12">

                    <input onclick="startscan()" type="button" value="Scan Location" class="btn btn-default btn-lg" /> 




                  <div>

                  <h3>Result from Location Barcode</h3>
                  <hr>

                 <form action="./php/changeposition.php" method="POST">
                    <label> Asset</label>
                    <input class="form-control" type="text" name="assetid" id = "inputassetID">
                    <br>
                    <label> Location </label>
                    <input class="form-control" type="text" name="position" id="barcodefield2"/>
                    <br>
                    <input type="submit" value="Change Position" class="btn btn-default" />
                </form>



 


              </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">Search Results</div>
							<div class="panel-body">
								<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
										<tr>
											<th>ASSETTAG</th>
											<th>SERIALNBR</th>
											<th>CATEGORYDESC</th>
											<th>MAKE</th>
											<th>MODEL</th>
											<th>CUSTODIANNAME</th>
											<th>LOCATIONNAME</th>
											<th>SYSUPDATEUSER</th>
										</tr>
									</thead>
									<tbody>';



	$result = searchForAsset();	
   $mylist[]= array();

    if ($result->num_rows > 0) {
		echo '<tr>';



        while ($row = $result->fetch_array(MYSQLI_NUM)) {
 $val = $row[1];
          array_push($mylist, $val);

            for ($x = 0; $x < count($row); $x++) {

                if ($x === 1 ) {  echo '<td id ="the_one" onclick="setTheone()">', $row[$x], '</td>';

}
                else if ($x === 2  || $x === 5  || $x === 7 ||
					$x === 8 || $x === 14 || $x === 22 || $x === 32) {
					echo '<td>', $row[$x], '</td>';
				}
			}
			echo '</tr>';
        }
		echo '</tbody></table><br>';

    } else {
      echo "0 results";
	}
    global $other;

  $_SESSION['other'] = $mylist;

?>

										</div>
									</div>
								</div>
							</div>
						</div>
                    <!--End Advanced Tables -->
               <div class="row" >
                   <div class="col-md-12">
                 <form action="./php/changeowner.php" method="POST">

                    <input class="form-control"  type="text" name="nameInput" /> 
                    <br>
                    <input class="btn btn-default" type="submit" value="Assign all to another person" />
                </form>





                  


                  <!-- <input id="barcodefield2" /><br />
                  <input onclick="load_from_url_callback('#barcodefield2')" type="button" value="Get Device ID">
 -->


              </div>
                </div>


            <!--  end  Context Classes  -->
			</div>
		</div>
    <!-- /. ROW  -->
	</div>
	</div>
    <!-- /. PAGE INNER  -->
	</div>
	<!-- /. PAGE WRAPPER  -->
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
     <script type="text/javascript">

        // load_from_url_callback()；
        setTheone();

        load_from_url_callback();
        function startscan() {
              window.location = "mochabarcode://CALLBACK=http://192.168.0.8:41062/www/scan_result.php?SHOW=" + asset;     
                alert(asset);  
         }


        function load_from_url_callback() {
          var myParam = location.search.split('BARCODE=')[1];
          if (myParam)
            document.querySelector("#barcodefield2").value = myParam;



   
             var showmyParam = location.search.split('SHOW=')[1];
            if (showmyParam) { 
                 showmyParam2 = showmyParam.split('&')[0]; 

                 document.querySelector("#inputassetID").value=showmyParam2;
            }
            
                      }

        var asset;
        function setTheone(){
            asset= document.querySelector("#the_one").innerHTML;
            document.querySelector("#inputassetID").value=asset;
            console.log(asset);
        }

</script>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>