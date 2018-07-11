			<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#formModal">
				 <i class="fa fa-plus"></i> Add Maid </button><br><br>

		<!-- Modal -->
		<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true"> 
		  <div class="modal-dialog" role="document" style="max-height:80%;  margin-top: 55px; margin-bottom:50px; width: 60%;">	
		  <div class="modal-header"> 
		  				<h1></h1><br>
		  				<h2></h2><br><br>
		                <h3 class="modal-title">ASDFASDFASDFASDF</h3> 
		            </div>   
			    <div class="modal-content">
				    <form style="padding: 5px" method="POST" action="maids.php">
						  <div class="form-row">
						  	  <div class="form-group col-md-6">
						      	<label for="nameInput">Name</label>
						      	<input type="name" class="form-control" name="nameInput" placeholder="Full Name" required="required">
						      </div>
							    <div class="form-group col-md-6">
							      <label for="inputEmail">Email</label>
							      <input type="email" class="form-control" name="inputEmail" placeholder="Email" required="required">
							    </div>  
						  </div>
						   <div class="form-row">
							    <div class="form-group col-md-6">
							      <label for="inputAge">Age</label>
							      <input type="Number" MIN=18 class="form-control" name="inputAge" placeholder="Age" required="required">
							    </div>  
							    <div class="form-group col-md-6">
							      <label for="inputGender">Gender</label>
							      <select name="inputGender" class="form-control" required="required">
							        <option selected>Female</option>
							        <option>Male</option>
						      	  </select>
							    </div>  
						  </div>
					     <div class="form-row">
							    <div class="form-group col-md-6">
							      <label for="inputsalary">Salary Estimate</label>
							      <input type="Number" MIN=200 class="form-control" name="salary" placeholder="$ 0.0" required="required">
							    </div>  
							    <div class="form-group col-md-6">
							      <label for="inputType">Type of Work</label>
							      <select name="inputType" class="form-control" required="required">
							        <option selected>Permanent</option>
							        <option>Contract</option>
						      	  </select>
							    </div>  
						  </div>		 
						  <div class="form-row">
							    <div class="form-group col-md-6">
							      <label for="inputSkill">Skills</label>
							      <textarea type="text" class="form-control" name="inputskill" rows="2" cols="20" required="required"></textarea> 
							    </div>
							    <div class="form-group col-md-6">
							      <label for="inputExp">Experience</label>
							      <select name="inputExp" class="form-control" required="required">
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
						        <input type="submit"  class="btn btn-success"> 
						        </div>
						        <div class="col-sm-6 text-right">
						        <button type="submit" class="btn btn-secondary"  data-dismiss="modal"> <i class="fa fa-times"></i> Cancel</button>
						        </div>
						      </div>
					      </div>
						</form>
			    </div>
		  </div>
		</div>
	
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
				               <td><a href="samefile.php?action=update&id=$row['id']" class="a-btn-slide-text d-inline-block">
							        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							        Edit </a>
							        <a href="samefile.php?action=delete&id=$row['booking_id']" class="btn btn-danger a-btn-slide-text d-inline-block">
							       <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							        Delete</a>
							    </td>
				     </tr>
				   <?php
				         }

				         ?>

		    </table>
		        </div>
</div>