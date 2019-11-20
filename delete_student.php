<?php
if(isset($_REQUEST['did']))
{
	include("connect.php");
	$id=$_REQUEST['did'];
	
	$res=mysqli_query($con,"select image from students where id=$id");
	
	if(mysqli_num_rows($res)==1)
	{
		$row=mysqli_fetch_assoc($res);
		unlink("banners/".$row['image']);
		mysqli_error($con);
		mysqli_query($con,"delete from students where id=$id");
		if(mysqli_affected_rows($con)==1)
		{
			setcookie("success","Record Deleted successfully",time()+2);
			header("Location:view_student.php");
		}
		else
		{
			setcookie("error","Unable to delete the reocrd",time()+2);
			header("Location:view_student.php");
		}
	}
	else
	{
		echo "<p>Unable to Process</p>";
	}
	
	
	
}
else
{
	echo "<p>Sorry!Unable to process</p>";
}
?>