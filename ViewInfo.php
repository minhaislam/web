<?php


  /* $name='data.txt';
	$read = fopen($name, 'r');
	
		$fetch = fread($read, filesize($name));
	fclose($read);
	$lines=explode("\n", $fetch);*/

		if(isset($_POST['Add'])){
		$uname = $_POST['uname'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$cpass = $_POST['cpass'];
		$utype =$_POST["utype"];
		
		
		if(empty($uname)==true || empty($email)==true || empty($pass) == true ||empty($cpass) == true ||empty($utype) == true){
			echo "fill all!";
		}
		elseif ($pass!=$cpass) {
		echo "password doesn't match";	
		}
		else{
            //$_POST['name'] = $name;
			$user = fopen('data.txt', 'a+');
			$data=fwrite($user, "$uname"."|"."$email"."|"."$pass"."|"."$cpass"."|"."$utype"."\n");
			
	fclose($user);
		header('location: ViewInfo.php');
	
			}
		}
?>


<!DOCTYPE html>
<html>
<head>
	<title>
		Info table
	</title>
</head>
<body>
	<table border="1">
		<thead>
		<tr>
			<th>User Name</th>
			<th>Email</th>
			<th>Password</th>			
			<th>User Type</th>
		</tr>	
          </thead>
          <tbody><?php
          $name='data.txt';
	$read = fopen($name, 'r');
	
		$fetch = fread($read, filesize($name));
	fclose($read);
	$lines=explode("\n", $fetch);
          	foreach ($lines as $line) {

		$user = explode("|", $line);

			?>
		<tr>

          		<td><?php echo $user[0];?></td>
          		<td><?php echo $user[1];?></td>
          		<td><?php echo $user[2];?></td>
          		<td><?php echo $user[4];?></td>
          	</tr>

          	<?php
		}
		?>

          </tbody>		


	</table>

	<form method="POST" action="">
		<fieldset>	
			<legend><b>Edit Info</b></legend>
			<table cellpadding="5px">
			<tr>
				<td>
			Username:<br><input type="text" name="uname" value="">
			</td>
			
			
				<td>
			Email:<br><input type="email" name="email" value="">
			</td>
			
			
				<td>
			Password <br><input type="password" name="pass" value="">
			</td>
			
			
				<td>
			Confirm Password<br><input type="password" name="cpass" value="">
			</td>
			

			
			<td>
			<input type="radio" name="utype" value="User"/>User <br>
			<input type="radio" name="utype" value="Admin"/>Admin
			
			</td>
			
			
			
			<tr>
			<td style="border-top:1px solid #888;">
			<input type="submit" name="Add" value="Add"/>
			<input type="submit" name="Update" value="Update"/>
			<input type="submit" name="Delete" value="Delete"/>
			</td>
			</tr>
			
			</table>

		</fieldset>	


	</form>
</body>
</html>