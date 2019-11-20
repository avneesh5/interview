<?php 
if(isset($_REQUEST['nid']))
{
	include("connect.php");
	$id=$_REQUEST['nid'];
	$res=mysqli_query($con,"select *from students where id=$id");
    mysqli_error($con);
	if(mysqli_num_rows($res)==1)
	{
		$row=mysqli_fetch_assoc($res);
		//print_r($row);
	?>
	<html>
	<head>
		<title>Edit Student Record</title>
			<!--2nd step-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

		<style></style>
	</head>
	     <body>
	         <div class="container">
	             <div class="card">
	                 <div class="card-header bg-primary text-center">
	
	                	<h1>Edit Student Record</h1>
		             </div>
		                 <div class="card-body">
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
			                 $name=(isset($_POST['name']))?$_POST['name']:"";
			                 $mail=(isset($_POST['email']))?$_POST['email']:"";
			                 $mob=(isset($_POST['mobile']))?$_POST['mobile']:"";
			                 $gender=(isset($_POST['gender']))?$_POST['gender']:"";
			                 $course=(isset($_POST['course']))?$_POST['course']:"";
			                 $sem=(isset($_POST['sem']))?$_POST['sem']:"";
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
			            	 $filename=$row['image'];
			                 }
			
			                 mysqli_query($con,"update students set name='$name',
			                 email='$mail',
			                 mobile='$mob',
                             gender='$gender',
			                 image='$filename',
			                 course='$course',
			                 semester='$sem'
			                 where id=$id");
			                 echo mysqli_error($con);
			                 if(mysqli_affected_rows($con)==1)
			                 {
				             setcookie("success","Student Record UPdated successfully",time()+2);
				             header("Location:edit_student.php?nid=$id");
			                 }
			                 else
			                 {
				
				             echo "<p>Sorry Unable to update the Records, try again</p>";
			                 }
		                     }
	                         ?>

		<form enctype="multipart/form-data" method="POST" action="" onsubmit="return formValidate()">
			<table>
			<div class="row">
                             <div class="col-3">
                                 <label>Name:</label>
                             </div>
                             <div class="col-3">
                                 <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control" value="<?php echo $row['name']; ?>">

                              </div>
                              <div class="col-3">
                                    <label>Email:</label>
                                </div>
                                <div class="col-3">
                                    <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control" value="<?php echo $row['email']; ?>">
   
                                 </div>
                     </div>
                     <div class="row">
                            <div class="col-3">
                                <label>Mobile:</label>
                            </div>
                            <div class="col-3">
                                <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile Number" class="form-control" value="<?php echo $row['mobile']; ?>">

                             </div>
					<div class="col-3">	 
                       <label>Gender</label>
					</div>   
					<div class="col-3">
					<input type="gender" name="gender" id="gender" class="form-control" value="<?php echo $row['gender']; ?>" >
					</div>
				</div>
				<div class="row">
                            <div class="col-3">
                                <label for="course">Courses<span style="color:red">  *</span> </label>
                            </div>
                            <div class="col-3">
                                <select name="course"  class="form-control" >
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
					     <label>Image</label>
					 </div>	 
					<div class="col-3">
					     <input type="file" name="file" id="file">
					      <?php 
					     if($row['image']!="")
					     {
						 ?>
						 <img src='banners/<?php echo $row['image'];?>' height="50" width="50">
						 <?php
					     }
					
					     ?>
					
					</div>
				</div>
				
					<input type="submit" name="submit" value="Update Student">
				
			</table>
		</form>
		</div>
		<div class="card-footer text-white bg-dark text-center">
		<h4>This is footer </h4>
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
	<?php
	}
	else
	{
		echo "<p>UNabe to find the record</p>";
	}
}
else
{
	echo "<p>Sorry!,Unable to process</p>";
}
?>

