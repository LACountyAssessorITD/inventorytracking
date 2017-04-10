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

	session_start();
	checkForActiveSession();
?>
     <div id="wrapper">
          <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                <?php echo getName(); ?>

                </a> 
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
                        <a href="search.php"  class="active-menu" ><i class="fa fa-sitemap fa-3x"></i> Search</a>
                      </li> 
                       <li  >
                                 <a  href="table.php" ><i class="fa fa-table fa-3x"></i> All Assets</a>
                        </li>

                           <li >
                             <a  href="mobilescan.php" ><i class="fa fa-mobile fa-3x" style="padding-left: 10px; padding-right: 10px"></i> mobile scan</a>
                          </li>
                          

                    
                </ul>
               
            </div>
            
        </nav> 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
						<h2>Asset History</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr/>
                <div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">History</div>
							<div class="panel-body">
								<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
										<tr>
											<th>ASSET_TAG</th>
											<th>UPDATE_TIME</th>
											<th>DESCRIPTION</th>
											<th>UPDATED_BY</th>
										</tr>
									</thead>
									<tbody>

<?php
include "php/search_html.php";
	$tag = $_GET['assettag'];
	$result = assetHistory($tag);	


	if ($result->num_rows > 0) {
		while($row = $result->fetch_array(MYSQLI_NUM)){
			for ($x = 0; $x < count($row); $x++) {
        		echo '<td>', $row[$x], '</td>';
        	}
        	echo '</tr>';
		}
        echo '</tbody></table>';

    } else {
      echo "0 results";
	}
?>
    <button style="float: right;" onclick="goBack()">Back</button></tr>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

	
</html>