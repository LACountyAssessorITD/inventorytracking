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
                        <a href="search.php" class="active-menu" ><i class="fa fa-sitemap fa-3x"></i> Search</a>
                      </li> 
                       <li  >
                                 <a  href="table.php"><i class="fa fa-table fa-3x"></i> All Assets</a>
                        </li>

                           <li >
                             <a  href="mobilescan.php"><i class="fa fa-mobile fa-3x" style="padding-left: 10px; padding-right: 10px"></i> mobile scan</a>
                          </li>
                          

                    
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
						<h2>Search Asset </h2>   
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr/>
				<div class="row">
					<div class="col-md-12">
						<!-- Form Elements -->
						<div class="panel panel-default">
							<div class="panel-heading">Search for Asset</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<h3>Asset Criteria</h3>
										<form role="form" action="search_results.php" method="post">
											<div class="form-group">
												<label>Asset Number</label>
												<input class="form-control" placeholder="Please Enter Asset Number" name ="assetNumInput"/>
											</div>
											<div class="form-group">
												<label>Serial Number</label>
												<input class="form-control" placeholder="Please Enter Serial Number" name ="serialNumInput" />
											</div>
											<div class="form-group">
												<label>Category</label>
												<select class="form-control" name="categoryInput">
													<option></option>
													<option>AIR FILTRATION SYSTEM</option>
													<option>APPLE IPAD</option>
													<option>AUDIO RECORDER</option>
													<option>AUDIO/VIDEO EQUIPMENT</option>
													<option>BARCODE SCANNER</option>
													<option>CALCULATOR</option>
													<option>CAMERA</option>
													<option>CASH REGISTER</option>
													<option>CATALYST</option>
													<option>CELL PHONE</option>
													<option>DATE/TIME STAMP</option>
													<option>DIGITAL PHOTO CAMERA</option>
													<option>DISK DUPLICATOR </option>
													<option>DISPLAY BOARD</option>
													<option>ELECTRIC ERASER</option>
													<option>ENVELOPE OPENERS-ELECTRIC</option>
													<option>IT EQUIPMENT (OTHER)</option>
													<option>MAILING MACHINE</option>
													<option>MFP/PRINTER/COPIER</option>
													<option>MICROFICHE MACHINE</option>
													<option>MONITOR</option>
													<option>PC-DESKTOP</option>
													<option>PC-LAPTOP</option>
													<option>REFRIGERATOR</option>
												</select>
											</div>
											<div class="form-group">
												<label>Model</label>
												<input class="form-control" placeholder="Please Enter Model" name="modelInput"/>
											</div>
											<div class="form-group">
												<label>Location</label>
												<input class="form-control" placeholder="Please Enter Location" name ="locationInput" />
											</div>
											<button type="submit" class="form-button" id="submit-btn">Submit</button>
											<button type="reset" class="form-button" id="clear-btn">Reset</button>
										</form>
									<!-- End Form Elements -->
									</div>
								</div>      
							</div>
						<!-- /. PAGE INNER  -->
						</div>
					<!-- /. PAGE WRAPPER  -->
					</div>
				<!-- /. WRAPPER  -->
	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
	<script src="assets/js/jquery-1.10.2.js"></script>
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="assets/js/jquery.metisMenu.js"></script>
	<!-- CUSTOM SCRIPTS -->
	<script src="assets/js/custom.js"></script>
</body>
</html>
