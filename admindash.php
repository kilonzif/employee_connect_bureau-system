
<?php
include_once "includes/init.php";
include_once "maids.php";
include_once "includes/functions.php"

?>

<?php
// include_once "db.php"
// include "functions.php";
// include_once "login.php";
// include_once "login.inc.php";
?>

<head>
	   	<meta charset="UTF-8">
	<title>Registration</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="assets/css/style.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="assets/js/jquery-1.10.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
       <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="js/admindash.js"></script>


        <style type="text/css">
        	  table.table {
			    clear: both;
			    margin-bottom: 6px !important;
			    max-width: none !important;
			    table-layout: fixed;
			    word-break: break-all;
			   }

			   #leftmenu{
			   	margin-top: -10px;
			   	background-color: #0099ff;
			   	margin-right: 0px;
			   }

				#leftmenu a{
				text-decoration: none;
				color: #000000;
				font-size: 16px;
				display: block;
				padding: 10px 16px;
			}

				#smallleft{
					margin-left: 30px;
					float: left;
					width: 75%;
					display: flex;
				}

				#smallright{
					float: right;
					width: 20%;
					/*margin-right: 10px;*/
					display: flex;
				}
				.dot {
					    height: 12px;
					    width: 12px;
					    background-color: #33ff99;
					    border-radius: 50%;
					    display: inline-block;
				}
			
        </style>
</head>
<body style="width: 100%;">
	<header class="row">
		<div id="smallleft">
			<p style="font-size:24px; font-style:italic;"><img src="./images/utunzi.png" width="40px" height="40px" align="left">T U N Z I</p>
		</div>
		<div id="smallright">
			<p></p><br><br>
			<p id="userpos" style="color: grey;font-size: 18px"><?php echo "" .date("l  Y/m/d") . "	"?><a href="logout.php">LOG OUT</a></p>
		</div>
	</header>
<div class="row">
	<div class="col-md-2" id="leftmenu" style="margin-top: 18px">

		 <div class="navbar-collapse navbar-ex1-collapse" style="margin-top: 22px;">
			<div style="margin-top: -10px;">
					<H1><i class="fa fa-user" ariah="aria-hidden"></i><?php if(logged_in()) {
				echo  get_name($_SESSION['email']); }else{
					echo " Admin ";
				}?><span class="dot"></span></H1>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="javascript:void(0)"><i class="fa fa-home"></i>Utunzi Home</a></li>
				<li class="active"><a class="open-tab" href="javascript:void(0)" data-tab='a'>All Maids</a></li>
				<li ><a class="open-tab" href="javascript:void(0)" data-tab='b'>Matched Maids</a></li>
				<li ><a class="open-tab" href="javascript:void(0)" data-tab='c'>UnMatched Maids</a></li>
				<li ><a class="open-tab" href="javascript:void(0)" data-tab='d'>Requests</a></li>
				<li><a href="logout.php">Log out</a></li>
			</ul>
		</div>
	</div>
	<div class="col-md-10" id="right">
		<!-- all maids tab -->


		<div class='tab' data-tab='a'>
			<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#formModal">
				 <i class="fa fa-plus"></i> Add Maid </button><br><br>


		<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->

			<?php 
				 $conn = new mysqli("localhost", 'root', '', 'member');
			        if ($conn->connect_error) {
					    die("Connection failed: " . $conn->connect_error);
					} else{
						$query = mysqli_query($conn,"SELECT * FROM maids"); 
					}

			 ?>
		    <table id="allmaids" class="table table-bordered table-hover table-striped" style="table-layout: fixed">
		        <thead>

		        <tr>
		        	<th>Name</th>
		        	<th>Email</th>
		        	<th>Age</th>
		        	<th>Gender</th>
		        	<th>Salary</th>
		        	<th>Work Type</th>
		        	<th>Skills</th>
		        	<th>Experience</th>
		        	<th>Status</th>  
		        	<th>Action</th>
		        </tr>
		        </thead>
			                    <?php $counter = 1;
			               while ($row = mysqli_fetch_array($query)) { $id = $row['id'];
			?>
					<tr>
						 
					               <td><?php echo $row['name'];?></td>
					               <td><?php echo $row['email']; ?></td>
					               <td><?php echo $row['age']; ?></td>
					               <td><?php echo $row['gender']; ?></td>
					               <td><?php echo $row['salary']; ?></td>
					               <td><?php echo $row['worktype']; ?></td>
					               <td><?php echo $row['skills']; ?></td>
					               <td><?php echo $row['experience']; ?></td>
					               <td><?php echo $row['status']; ?></td>
					               <td><a href="javascript:void(0)" onclick="<?php echo ('update(\''.$row['id'].'\',\''.$row['name'].'\', \''.$row['email'].'\',\''.$row['age'].'\',\''.$row['gender'].'\',\''.$row['salary'].'\',\''.$row['worktype'].'\',\''.$row['skills'].'\',\''.$row['experience'].'\' )');?>"  data-toggle="modal" data-target="#editformModal" class="btn btn-primary btn-lg">
								        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
								        Edit </a>
								        <a id="del" onclick="deleteMaid('<?php echo $id; ?>')" class="btn btn-danger a-btn-slide-text d-inline-block">
								       <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								        Delete</a>
								    </td>
					     </tr>

					   <?php
					   $counter = $counter+1;
					         }

					         ?>

			    </table>
		        </div>
		</div>


		<?php


 
		?>

		<!-- matched maids -->
		<div class='tab' data-tab='b' style='display: none'>
			<P>MATCHED MAIDS GO HERE</P>
				<?php 
				 $conn = new mysqli("localhost", 'root', '', 'member');
			        if ($conn->connect_error) {
					    die("Connection failed: " . $conn->connect_error);
					} else{

						$query = mysqli_query($conn,"SELECT * FROM maids where status='inactive'"); 
					}

			 ?>
			<div class="table-responsive">
			    <table id="allmaids" class="table table-bordered table-hover table-striped" style="table-layout: fixed">
			        <thead>

			        <tr>
			        	<!-- name, email, age, gender, salary, worktype, skills, experience, status -->

			            <th>Name</th>
			            <th>Email</th>
			            <th>Age</th>
			            <th>Gender</th>
			            <th>Expected Salary</th>
			            <th>Work Type</th>
			            <th>Skills</th>
			            <th>Experience</th>
			            <th>Status</th>            
			        </tr>
			        </thead>
				                    <?php
				               while ($row = mysqli_fetch_array($query)) {
				?>
						<tr>
						               <td><?php echo $row['name']; ?></td>
						               <td><?php echo $row['email']; ?></td>
						               <td><?php echo $row['age']; ?></td>
						               <td><?php echo $row['gender']; ?></td>
						               <td><?php echo $row['salary']; ?></td>
						               <td><?php echo $row['worktype']; ?></td>
						               <td><?php echo $row['skills']; ?></td>
						               <td><?php echo $row['experience']; ?></td>
						               <td><?php echo $row['status']; ?></td>
						     </tr>
						   <?php
						         }

						         ?>

				    </table>
		        </div>
			
		</div>
			<!-- UNmatched maids -->
		<div class='tab' data-tab='c' style='display: none'>
			<P>UNMATCHED MAIDS GO HERE</P>
					<?php 
					 $conn = new mysqli("localhost", 'root', '', 'member');
				        if ($conn->connect_error) {
						    die("Connection failed: " . $conn->connect_error);
						} else{
							
							$query = mysqli_query($conn,"SELECT * FROM maids where status='active'"); 
						}

				 ?>
				<div class="table-responsive">
				    <table id="allmaids" class="table table-bordered table-hover table-striped" style="table-layout: fixed">
				        <thead>

				        <tr>
				        	<!-- name, email, age, gender, salary, worktype, skills, experience, status -->

				            <th>Name</th>
				            <th>Email</th>
				            <th>Age</th>
				            <th>Gender</th>
				            <th>Expected Salary</th>
				            <th>Work Type</th>
				            <th>Skills</th>
				            <th>Experience</th>
				            <th>Status</th>            
				          
				        </tr>
				        </thead>
					                    <?php
					               while ($row = mysqli_fetch_array($query)) {
					?>
							<tr>
							               <td><?php echo $row['name']; ?></td>
							               <td><?php echo $row['email']; ?></td>
							               <td><?php echo $row['age']; ?></td>
							               <td><?php echo $row['gender']; ?></td>
							               <td><?php echo $row['salary']; ?></td>
							               <td><?php echo $row['worktype']; ?></td>
							               <td><?php echo $row['skills']; ?></td>
							               <td><?php echo $row['experience']; ?></td>
							               <td><?php echo $row['status']; ?></td>
							               
							     </tr>
							   <?php
							         }

							         ?>

					    </table>
			        </div>
			
		</div>
			<!-- Requested Matches -->
		<div class='tab' data-tab='d' style='display: none'>
			<P>Requests MAIDS GO HERE</P>
					<?php 
					 $conn = new mysqli("localhost", 'root', '', 'member');
				        if ($conn->connect_error) {
						    die("Connection failed: " . $conn->connect_error);
						} else{

							$query = mysqli_query($conn,"SELECT * FROM maids where status='pending'"); 
						}

				 ?>
				<div class="table-responsive">
				    <table id="allmaids" class="table table-bordered table-hover table-striped" style="table-layout: fixed">
				        <thead>

				        <tr>
				        	<!-- name, email, age, gender, salary, worktype, skills, experience, status -->

				            <th>Name</th>
				            <th>Email</th>
				            <th>Age</th>
				            <th>Gender</th>
				            <th>Expected Salary</th>
				            <th>Work Type</th>
				            <th>Skills</th>
				            <th>Experience</th>
				            <th>Status</th>            
				            <th>Action</th>
				        </tr>
				        </thead>
					                    <?php
					               while ($row = mysqli_fetch_array($query)) {
					?>
							<tr>
							               <td><?php echo $row['name']; ?></td>
							               <td><?php echo $row['email']; ?></td>
							               <td><?php echo $row['age']; ?></td>
							               <td><?php echo $row['gender']; ?></td>
							               <td><?php echo $row['salary']; ?></td>
							               <td><?php echo $row['worktype']; ?></td>
							               <td><?php echo $row['skills']; ?></td>
							               <td><?php echo $row['experience']; ?></td>
							               <td><?php echo $row['status']; ?></td>
							               <td><button type="button" class="btn btn-default btn-sm" onclick="approve(('<?php echo $id; ?>'))">
         										 <span class="glyphicon glyphicon-ok"></span> Approve
        									</button>
										    </td>
							     </tr>
							   <?php
							         }

							         ?>

					    </table>
			        </div>
			
		</div>
	</div>
</div> 




		<!--add Modal -->
		<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true"> 
		  <div class="modal-dialog" role="document" style="max-height:80%;  margin-top: 55px; margin-bottom:50px; width: 60%;">	
		  <div class="modal-header"> 
		  				<h1></h1><br>
		  				<h2></h2><br><br>
		                <h3 class="modal-title">ASDFASDFASDFASDF</h3> 
		            </div>   
			    <div class="modal-content">
				    <form style="padding: 5px" method="POST" action="admindash.php">
						  <div class="form-row">
						  	  <div class="form-group col-md-6">
						      	<label for="nameInput">Name</label>
						      	<input type="name" class="form-control" name="nameInput" id='nm' placeholder="Full Name" required="required">
						      </div>
							    <div class="form-group col-md-6">
							      <label for="inputEmail">Email</label>
							      <input type="email" class="form-control" name="inputEmail" id="em" placeholder="Email" required="required">
							    </div>  
						  </div>
						   <div class="form-row">
							    <div class="form-group col-md-6">
							      <label for="inputAge">Age</label>
							      <input type="Number" MIN=18 class="form-control" id="ag" name="inputAge" placeholder="Age" required="required">
							    </div>  
							    <div class="form-group col-md-6">
							      <label for="inputGender">Gender</label>
							      <select name="inputGender" class="form-control" id="gn" required="required">
							        <option selected>Female</option>
							        <option>Male</option>
						      	  </select>
							    </div>  
						  </div>
					     <div class="form-row">
							    <div class="form-group col-md-6">
							      <label for="inputsalary">Salary Estimate</label>
							      <input type="Number" MIN=200 class="form-control" id="sl" name="salary" placeholder="$ 0.0" required="required">
							    </div>  
							    <div class="form-group col-md-6">
							      <label for="inputType">Type of Work</label>
							      <select name="inputType" class="form-control"  id="work" required="required">
							        <option selected>Permanent</option>
							        <option>Contract</option>
						      	  </select>
							    </div>  
						  </div>		 
						  <div class="form-row">
							    <div class="form-group col-md-6">
							      <label for="inputSkill">Skills</label>
							      <input type="text" class="form-control"  id="sk" name="inputskill" cols="40" rows="5"  required="required"> 
							    </div>
							    <div class="form-group col-md-6">
							      <label for="inputExp">Experience</label>
							      <select name="inputExp" class="form-control" required="required" id="exp">
							        <option selected>Entry Level ( < 1 yr)</option>
							        <option>1-3 yrs</option>
							        <option>More than 3 yrs</option>
							      </select> <br><br>
							    </div>
							</div>
						  <div class="form-row"></div>
						  <div class="modal-footer">
						      <div class="row">
						        <div class="col-sm-6 text-left">
						        <input type="submit"  name="submit" class="btn btn-success"> 
						        </div>
						        <div class="col-sm-6 text-right">
						        <button type="button" class="btn btn-secondary"  data-dismiss="modal"> <i class="fa fa-times"></i> Cancel</button>
						        </div>
						      </div>
					      </div>
						</form>
			    </div>
		  </div>
		</div>


		<!--edit Modal -->
		<div class="modal fade" id="editformModal" tabindex="-1" role="dialog" aria-labelledby="editformModal" aria-hidden="true"> 
		  <div class="modal-dialog" role="document" style="max-height:80%;  margin-top: 55px; margin-bottom:50px; width: 60%;">	
		  <div class="modal-header"> 
		  				<h1></h1><br>
		  				<h2></h2><br><br>
		                <h3 class="modal-title">ASDFASDFASDFASDF</h3> 
		            </div>   
			    <div class="modal-content">
				    <form style="padding: 5px" method="POST" action="admindash.php">
						  <div class="form-row">
						  	 <input type="hidden" id="hidden" name="hidden" value="">
						  	  <div class="form-group col-md-6">
						      	<label for="nameInput">Name</label>
						      	<input type="name" class="form-control" name="nameInput" id='name' placeholder="Full Name" required="required">
						      </div>
							    <div class="form-group col-md-6">
							      <label for="inputEmail">Email</label>
							      <input type="email" class="form-control" name="inputEmail" id="email" placeholder="Email" required="required">
							    </div>  
						  </div>
						   <div class="form-row">
							    <div class="form-group col-md-6">
							      <label for="inputAge">Age</label>
							      <input type="Number" MIN=18 class="form-control" id="age" name="inputAge" placeholder="Age" required="required">
							    </div>  
							    <div class="form-group col-md-6">
							      <label for="inputGender">Gender</label>
							      <select name="inputGender" class="form-control" id="gender" required="required">
							        <option selected>Female</option>
							        <option>Male</option>
						      	  </select>
							    </div>  
						  </div>
					     <div class="form-row">
							    <div class="form-group col-md-6">
							      <label for="inputsalary">Salary Estimate</label>
							      <input type="Number" MIN=200 class="form-control" id="salary" name="salary" placeholder="$ 0.0" required="required">
							    </div>  
							    <div class="form-group col-md-6">
							      <label for="inputType">Type of Work</label>
							      <select name="inputType" class="form-control"  id='worktype' required="required">
							        <option selected>Permanent</option>
							        <option>Contract</option>
						      	  </select>
							    </div>  
						  </div>		 
						  <div class="form-row">
							    <div class="form-group col-md-6">
							      <label for="inputSkill">Skills</label>
							      <input type="text" class="form-control"  id="skills" name="inputskill" cols="40" rows="5"  required="required"> 
							    </div>
							    <div class="form-group col-md-6">
							      <label for="inputExp">Experience</label>
							      <select name="inputExp" class="form-control" required="required" id="experience">
							        <option selected>Entry Level ( < 1 yr)</option>
							        <option>1-3 yrs</option>
							        <option>More than 3 yrs</option>
							      </select> <br><br>
							    </div>
							</div>
						  <div class="form-row"></div>
						  <div class="modal-footer">
						      <div class="row">
						        <div class="col-sm-6 text-left">
						        	<!-- <input type="submit" name="update" value="update" class="btn-success">  -->
						        	<button type="submit" name="passed" id="passed" class="btn btn-success btn-flat"><i class="fa fa-check">Save Changes</i></button>
						        </div>
						        <div class="col-sm-6 text-right">
						        <button type="button" class="btn btn-secondary"  data-dismiss="modal"> <i class="fa fa-times"></i> Cancel</button>
						        </div>
						      </div>
					      </div>
						</form>
			    </div>
		  </div>
		</div>

	

    <script type="text/javascript">
    
    </script>
    <script type="text/javascript" src="js/admindash.js"></script>



</body>

<footer class="footer" style="background-color: #778899 ; color: black; font-size: 20px;position: fixed;  bottom:0;   width:100%;">
	<center>
		&copy; <?php echo date("Y"); ?> Copyright.
		<p></p>
	</center>
</footer>
