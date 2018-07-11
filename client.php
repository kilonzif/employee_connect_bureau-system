<?php 
	include_once "includes/functions.php"
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- datatables -->
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
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="client.php"><img src="images/utunzi.png" alt="Utunzi" height="38" width="42"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">My Requests </a></li>
        <li><a href="#">Feedback</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php if(logged_in()) {
				echo  get_name($_SESSION['email']); }else{ echo"AccountName"; } ?></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<!-- <div class="container"> -->
		<div class='tab' data-tab='searchempl' >
			<center><P style="font-size: 20px;font-family: monospace;color: grey">Search for Maid and Request Match</P></center>
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
			        	<th>Name</th>
			            <th>Email</th>
			            <th>Age</th>
			            <th>Gender</th>
			            <th>Expected Salary</th>
			            <th>Work Type</th>
			            <th>Skills</th>
			            <th>Experience</th>
			            <!-- <th>Status</th>             -->
			            <th>Interest</th>
			        </tr>
			        </thead>
				                    <?php
				               while ($row = mysqli_fetch_array($query)) {
				               	$id = $row['id'];
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
						               <td>
						               		<button type="button" class="btn btn-default btn-sm" onclick="sendInterest(('<?php echo $id; ?>'))">
         										 <span class="glyphicon glyphicon-ok"></span> Interested
        									</button>
									    </td>
						     </tr>
						   <?php
						         }

						         ?>

				    </table>
		        </div>
			
		</div>

	<script type="text/javascript">
		function sendInterest(id){
			 if (confirm('Interested with this employee?')) {
		        $.ajax({
		            url: "client.php?interest=true&id="+id, 
		            success: function(result){
		            alert("Match Requested");
		        }});
    	}

		}






	</script>

</body>
</html>
