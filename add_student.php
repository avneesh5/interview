<!doctype html>
<html>
	<head>
		<title>Add Student Record</title>
		<!--2nd step-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

		<style></style>
	</head>
	<body>
	<div class="container">
	<div class="card">
	<div class="card-header bg-primary text-center">
		<h1>Add Student Record</h1>
		</div>
		<ul>
			<li><a href="add_student.php">Add Student</a></li>
			<li><a href="view_student.php">View Student</a></li>
		</ul>
        <?php
        if(isset($_COOKIE['success']))
		{
			echo "<p>".$_COOKIE['success']."</p>";
		} 

		 if(isset($_POST['submit']))
         {
             //collect the form data
             $name=(isset($_POST['name']))?$_POST['name']:"";
			$mail=(isset($_POST['email']))?$_POST['email']:"";
			$mob=(isset($_POST['mobile']))?$_POST['mobile']:"";
			$gender=(isset($_POST['gender']))?$_POST['gender']:"";
			$pass=(isset($_POST['pwd']))?$_POST['pwd']:"";
			$pass=password_hash($pass,PASSWORD_DEFAULT);
			$course=(isset($_POST['course']))?$_POST['course']:"";
			$sem=(isset($_POST['sem']))?$_POST['sem']:"";
			$dob=(isset($_POST['dob']))?$_POST['dob']:"";
			$state=(isset($_POST['state']))?$_POST['state']:"";
			//$ip=$_SERVER('REMOTE_ADDR');
			//$gender=(isset($_POST['gender']))?$_POST['gender']:"";
			//$gender=(isset($_POST['gender']))?$_POST['gender']:"";
			//$gender=(isset($_POST['gender']))?$_POST['gender']:"";
			//$gender=(isset($_POST['gender']))?$_POST['gender']:"";
			//$gender=(isset($_POST['gender']))?$_POST['gender']:"";
			echo $pass,$course,$sem,$dob,$state;
             if(is_uploaded_file($_FILES['file']['tmp_name']))
			{
				$filename=$_FILES['file']['name'];
				$type=$_FILES['file']['type'];
				$tname=$_FILES['file']['tmp_name'];
				
				$arr=array("image/jpeg","image/png","image/gif","image/jpg");
					
				$str=str_shuffle("abcdefghijklmnopqerstuwxyz");
				$s=substr($str,5,15);
				$newname=$s.$filename;
				
				if(in_array($type,$arr))
				{
					move_uploaded_file($tname,"banners/$newname");
					$filename=$newname;
				}
				else
				{
					echo "<p>Please select a valid image to upload</p>";
				}

			}
			else
			{
				$filename="";
			}
			
        
		//connect to db
             
             include('connect.php');
                 $res=mysqli_query($con,"insert into students value('','$name','$mail','$mob','$gender','$filename','$pass','$course','$sem','$dob','$state',now())");
             mysqli_error($con);
             
        
             if(mysqli_affected_rows($con)==1)
			{
				setcookie("success","Student record added successfully",time()+2);
				header("Location:add_student.php");
			}
			else
			{
				if($filename)
				{
					unlink("banners/$newname");
				}
				echo "<p>Sorry Unable to add student record, try again</p>";
			}
			
		
             
         }
             ?>
			 <div class="card-body">
		<form enctype="multipart/form-data" method="POST" action="" onsubmit="return formValidate()">
		<div class="row">
                             <div class="col-3">
                                 <label>Name:</label>
                             </div>
                             <div class="col-3">
                                 <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control">

                              </div>
                              <div class="col-3">
                                    <label>Email:</label>
                                </div>
                                <div class="col-3">
                                    <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control">
   
                                 </div>
                     </div>
                     <div class="row">
                            <div class="col-3">
                                <label>Mobile:</label>
                            </div>
                            <div class="col-3">
                                <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile Number" class="form-control">

                             </div>
                             <div class="col-3">
                                   <label>Password:</label>
                               </div>
                               <div class="col-3">
                                   <input type="password" name="pwd" id="pwd" placeholder="Enter Password" class="form-control">
  
                                </div>
                    </div>
                    <div class="row">
                            <div class="col-3">
                                <label>Confirm Password:</label>
                            </div>
                            <div class="col-3">
                                <input type="password" name="cpwd" id="cpwd" placeholder="Enter Confirm Password" class="form-control">

                             </div>
                             <div class="col-3">
                                   <label>Gender:</label>
                               </div>
                               <div class="col-3">
                                   <input type="radio" name="gender" value="male"  >Male<input type="radio" name="gender" value="female" >Female
  
                                </div>
                    </div>
                    <div class="row">
                            <div class="col-3">
                                <label for="course">Courses<span style="color:red">  *</span> </label>
                            </div>
                            <div class="col-3">
                                <select name="course"  class="form-control">
                                    <option value="">Select course</option>
                                    <option value="BCA"> BCA</option>
                                    <option value="BA"> BA</option>  
                                    <option value="BBA"> BBA</option>
                                    <option value="bcom">Bcom</option>
                                    <option value="bsc">BSC</option>
                                    <option value="btech">BTech</option> 
                                </select>
                            </div>
                           
                            <div class="col-3">
                                    <label for="semester">Semester<span style="color:red">  *</span> </label>
                            </div>
                            <div class="col-3">
                                <select name="sem"  class="form-control">
                                    <option value="">Select Semester</option>
                                        <option value="1st">1st Sem</option>
                                        <option value="2nd">2nd Sem</option>  
                                        <option value="3rd"> 3rd Sem</option>
                                        <option value="4th">4th Sem</option>
                                        <option value="5th">5th Sem</option>
                                        <option value="6th">6th Sem</option>
                                        <option value="7th">7th Sem</option>
                                        <option value="8th">8th Sem</option> 
                                </select>
                            </div>
                        </div>    
                 <div class="row">
                     <div class="col-3">
                         <label>DOB</label>
                     </div>
                     <div class="col-3">
                       <input type="date" name="dob" id="dob" value="date" placeholder="Y-M-D" class="form-control">
                     </div>
                        <div class="col-3">
                         <label for="semester">States<span style="color:red">  *</span> </label>
                    </div>
                    <div class="col-3">
                                <select name="state"  class="form-control">
                                    <option value="">Select State</option>
                                        <option value="U.P">U.P</option>
                                        <option value="M.P">M.P</option>  
                                        <option value="Bihar"> Bihar</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="A.P">A.P</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Udisha">Udisha</option>
                                        <option value="Goa">Goa</option> 
                                </select>
                            </div>
                   
                 </div>
	            <div class="row">
				     <div class="col-3">
					     <label>Image:</label>
					 </div>
					<div class="col-3">
					     <input type="file" name="file" id="file">
					</div>
				</div>
					<input type="submit" name="submit" value="Add Student">
				
			</table>
		</form>
</div>
<div class="card-footer text-center bg-dark text-white">
<h4>This is Header</h4>
</div>

</div>
		</div>
		<script>
		function formValidate()
		{
			if(document.getElementById("name").value=="")
			{
				alert("Enter Name");
				return false;
			}
			if(document.getElementById("email").value=="")
			{
				alert("Please eneter  Email");
				return false;
			}
		}
		</script>
       
	</body>
</html>