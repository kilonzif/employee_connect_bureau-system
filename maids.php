     <?php
	        

     	if (isset($_POST['submit'])){
	        $conn = new mysqli("localhost", 'root', '', 'member');
	        if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} else{
					$name=$_POST["nameInput"];
					$email=$_POST["inputEmail"];
					$gender=$_POST["inputGender"];
					$worktype=$_POST["inputType"];
					$age=$_POST["inputAge"];
					$salary=$_POST["salary"];
					$experience=$_POST["inputExp"];
					$skills=$_POST["inputskill"];

				$insertQry="INSERT INTO maids(name, email, age, gender, salary, worktype, skills, experience, status) VALUES ('$name','$email','$age','$gender', '$salary','$worktype','$skills','$experience','Active') ";


				if ($conn->query($insertQry) === TRUE) {
				    echo "New record created successfully";
				    redirect('admindash.php');
				} else {
				    echo "Error: " . $insertQry . "<br>" . $conn->error;
				}
								



			}
			unset($_POST['submit']);

		}

	
		if(isset($_POST['passed'])){

		    echo "ayeye";
		    $conn = new mysqli("localhost", 'root', '', 'member');
			        if ($conn->connect_error) {
					    die("Connection failed: " . $conn->connect_error);
					} else{	$id=$_POST['hidden'];
							$name=$_POST["nameInput"];
							$email=$_POST["inputEmail"];
							$gender=$_POST["inputGender"];
							$worktype=$_POST["inputType"];
							$age=$_POST["inputAge"];
							$salary=$_POST["salary"];
							$experience=$_POST["inputExp"];
							$skills=$_POST["inputskill"];

							$sql = "UPDATE maids set name='$name', email='$email', age='$age', gender='$gender', salary='$salary', worktype='$worktype', skills='$skills', experience='$experience' where id='$id'";


						if ($conn->query($sql) === TRUE) {
						    echo "Update created successfully";
						    redirect('admindash.php');
						} else {
						    echo "Error: " . $sql . "<br>" . $conn->error;
						}
								
}}




// }



 /**    	if (isset($_POST['update'])){
	        $conn = new mysqli("localhost", 'root', '', 'member');
	        if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} else{
					$name=$_POST["nameInput"];
					$email=$_POST["inputEmail"];
					$gender=$_POST["inputGender"];
					$worktype=$_POST["inputType"];
					$age=$_POST["inputAge"];
					$salary=$_POST["salary"];
					$experience=$_POST["inputExp"];
					$skills=$_POST["inputskill"];

					$sql = "UPDATE maids set name='$name', email='$email', age='$age', gender='$gender', salary='$salary', worktype='$worktype', skills='$skills', experience='$experience' where id='$id'";


				if ($conn->query($sql) === TRUE) {
				    echo "Update created successfully";
				    redirect('admindash.php');
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
								



			}
			unset($_POST['submit']);

		} */

 		?>