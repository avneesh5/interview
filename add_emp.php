<?php
if(isset($_POST['submit']))
{
    $name=(isset($_POST['name']))?$_POST['name']:"";
$email=(isset($_POST['email']))?$_POST['email']:"";
$pass=(isset($_POST['pwd']))?$_POST['pwd']:"";
    //echo $name,$email,$pass;
    include('connect.php');
$data=mysqli_query($con,"insert into employee(id,name,email,password) values('','$name','$email','$pass')");
}
else
{
    echo "unable to connect";
}

?>
<html>
<head>
    <title>Add Employee Pge</title>
    </head>
    <body>
    <h1>Add employee</h1>
        <form action="" method="POST" onsubmit="return formValidate() ">
        <table>
            <tr>
            <td>Name</td>
                <td><input type="text" name="uname" id="uname"></td>
            </tr>
            
            <tr>
            <td>Email</td>
                <td><input type="text" name="email" id="email"></td>
            </tr>
            
            <tr>
            <td>Password</td>
                <td><input type="password" name="pwd" id="pwd"></td>
            </tr>
            
            <tr>
            <td>Confirm Password</td>
                <td><input type="password" name="cpwd" id="cpwd"></td>
            </tr>
            
            <tr>
            <td></td>
                <td><input type="submit" name="submit" id="submit" value="Add Employee"></td>
            </tr>
            </table>
        </form>
        <script>
		function formValidate()
		{
			if(document.getElementById("uname").value=="")
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