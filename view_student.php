<?php include("connect.php")?>
<html>
	<head>
		<title>View Student Records</title>
			<!--2nd step-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

		<style></style>
	</head>
	<body>
	<div class="container">
	   <div class="card">
	   <div class="card-header text-center bg-primary text-white">
		<h1>View Student Records</h1>
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
		
		if(isset($_COOKIE['error']))
		{
			echo "<p>".$_COOKIE['error']."</p>";
		}
		
		
		
		$result=mysqli_query($con,"select *from students");
		if(mysqli_num_rows($result)>0)
		{
			?>
			<table border=1 >
			<tr style="text-align:center">
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Gender</th>
				<th>Image</th>
				<th>course</th>
				<th>Semester</th>
				<th>DOB</th>
				<th>State</th>
				
				<th>Time</th>
                <th>Action</th>
			</tr>
			<?php 
			while($row=mysqli_fetch_assoc($result))
			{
				?>
			<tr style="text-align:center">
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['name'];?></td>
				
				<td><?php echo $row['email'];?></td>
                <td><?php echo $row['mobile'];?></td>
                <td><?php echo $row['gender'];?></td>
				<td>
					<?php 
					if($row['image']!="")
					{
						?>
						<img src='banners/<?php echo $row['image'];?>' height="50" width="50">
						<?php
					}
					else
					{
						?>
						<img src='' height="50" width="50">
						<?php
					}
					?>
				</td>
				<td><?php echo $row['course'];?></td>
				
				<td><?php echo $row['semester'];?></td>
                <td><?php echo $row['DOB'];?></td>
                <td><?php echo $row['state'];?></td>
				<td><?php echo $row['time'];?></td>
                
                <td>
					<a href='edit_student.php?nid=<?php echo $row['id'];?>'>Edit</a>
					<a href='javascript:void(0)' onclick='deleteRecord(<?php echo $row['id'];?>)'>Delete</a>
				</td>

			</tr>
				<?php
			}
			?>
		</table>
		</div>
		<div class="card-footer text-white bg-dark text-center">
		<h4>This is Footer</h4>
		</div>
		</div>
		</div>
			<?php
		}
		else
		{
			echo "<p>Sorry! No records FOund</p>";
		}
		?>
		
		<script>
		function deleteRecord(id)
		{
			var c=confirm("Do you want to delete?");
			if(c==true)
			{
				window.location="delete_student.php?did="+id ; 	
			}
		}
		</script>
	</body>
</html>