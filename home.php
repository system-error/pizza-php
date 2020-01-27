<!DOCTYPE html>
<html>
<head>
	<title> Home - Pizza </title>
	<link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body>

<header>
	<div class="wrapper">
		<div id="logo">
			<img src="logo.png">
		</div>
		<div id="login">
			<form method="post" action="home.php">
				<table>
					<tr> 
						<td> <input type="text" placeholder="email" name="semail"> </td>
						<td> <input type="password" placeholder="password"  name="spassword" > </td>
						<td> <input type="submit" value="Login" name="login"> </td>
					</tr>
					
				<tr><td colspan="3">
			
				<?php 
				session_start();
				if (isset($_POST["login"])) {

					include("config.php");

					$semail = $_POST["semail"];
					$spassword = $_POST["spassword"];

					$sql = "SELECT * FROM customers where email='$semail' AND password='$spassword' ";

					$result = mysqli_query($conn,$sql);

					if (!$row= mysqli_fetch_assoc($result)){
						echo "wrong email or password";
					}
					else {
						$_SESSION['cname'] = $row['cname'];
						 header('Location:profile.php') ;
					}

				}

				?>
			</td> </tr>
			</table>
			</form>
			
		</div>
	</div>
</header>
<main class="wrapper">
	<section>
		<img src="pizza.jpg"/>
	</section>
	<div id="eggrafi">
		<form action="signup.php" method="post">
			<table >
				<tr> <th colspan="2"> SIGN UP </th> </tr>
				<tr> 
					<td> <input type="text" placeholder="Your name" name="cname" > </td>
					<td> <input type="text" placeholder="Your lastname" name="clastname" ></td>
				</tr>
				<tr> <td colspan="2"> <input type="text"  placeholder="Your email" name="email"></td> </tr>
				<tr> <td colspan="2"> <input type="password"  placeholder="Your password" name="password" ></td> </tr>
				<tr> <td colspan="2"> <input type="password"  placeholder="Confirm password" name="password1" ></td> </tr>
				
				<tr> <td colspan="2"> <input type="text"   placeholder="Street" name="street"></td> </tr>
				<tr> <td> <input type="text"   placeholder="City" name="city"></td> 
				<td> <input type="text"   placeholder="House Number" name="house_number"></td> </tr>
				<tr> <td colspan="2"> <input type="submit" value="Sign Up" ></td> </tr>
			</table>
		</form>
		
		
	</div>
</main>

</body>
</html>
