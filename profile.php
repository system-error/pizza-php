<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
	<title> Order - Pizza </title>
	<link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
	<header>
		<div class="wrapper">
			<div id="logo">
				<a href="home.php"><img src="logo.png"></a>
			</div>
			<div id="login">
			<table> <tr> <td>
				<?php
				
					if(isset($_SESSION["cname"])) {
						echo "Hello " .$_SESSION['cname'];
					}
					else {
						echo "You are not logged in";
					}			
				?>
				</td>
				<td>
				<form action="logout.php">
					<input type="submit" value="Log Out" />
				</form>
				</td> </tr> </table>
			</div>
		</div>
	</header>
	<div id="main" >
	<div class="wrapper">
	<form method="POST" action="cart.php">
		<table >
			<tr>
				<td>
					<img src="pizzas/margarita.jpg"> 
					<h4> MARGARITA </h4>
					<hr/>
					<p> 100% Mozzarella, tomato sauce, extra mozzarella, emmental cheese   </p>
                    <span>5.90</span>
                    <label class="container">
                         <input type="checkbox" name="pizza[]" value="Margarita,5.90">
<!--                        thes edw sos, pare ton pinaka ayton kai me explode meta spase tis dyo times !!-->
                        <span class="checkmark"></span>
                        <span id="choose"> Choose </span>
                    </label>
				</td>
				<td>
					<img src="pizzas/margarita.jpg"> 
					<h4> 4 CHEESE </h4>
					<hr/>
					<p> Tomato sauce, mozzarella, cheddar, emmental cheese, Parmesan </p> 
<!--					<p> <input type="number"  value="8.90"  readonly name="price[]"></p>-->
                    <span>8.90</span>
<!--                    <input type="number" name="qty[4 Cheese]" value="1" min="1" max="100" id="">-->
                        <label class="container">
                            <input type="checkbox" name="pizza[]" value="4 Cheese,8.90">
					        <span class="checkmark"></span>
                            <span id="choose"> Choose </span>
                        </label>
				</td>
				<td>
					<img src="pizzas/margarita.jpg">
					<h4> KESARIAS </h4>
					<hr/>
					<p> 100% Mozzarella, tomato sauce, Greek soft cheese, cured beef </p>
<!--					<p> <input type="number"  value="6.90" readonly name="price"></p>-->
                    <span>6.90</span>
					<label class="container">
                        <input type="checkbox" name="pizza[]" value="Kesarias,6.90">
					    <span class="checkmark"></span>
                        <span id="choose"> Choose </span>
                    </label>
				</td>
				<td>
					<img src="pizzas/margarita.jpg"> 
					<h4> AMERICAN </h4>
					<hr/>
					<p> Tomato Sauce, 100% Mozzarella, Pepperoni, Spicy Beef, Mushrooms</p>
                    <span>8.00</span>
					<label class="container"><input type="checkbox" name="pizza[]" value="American,8.00">
					<span class="checkmark"></span> <span id="choose"> Choose </span></label>
				</td>
			</tr>
			<tr>
				<td>
					<img src="pizzas/margarita.jpg"> 
					<h4> BARBECUE </h4>
					<hr/>
					<p> 100% Mozzarella, tomato sauce, extra mozzarella, emmental cheese   </p>
                    <span>7.50</span>
					<label class="container"><input type="checkbox" name="pizza[]" value="Barbeque,5.50">
					<span class="checkmark"></span> <span id="choose"> Choose </span></label>
				</td>
				<td>
					<img src="pizzas/margarita.jpg"> 
					<h4> PEPPERONI</h4>
					<hr/>
					<p> Tomato sauce, mozzarella, cheddar, emmental cheese, Parmesan </p>
                    <span>7.80</span>
					<label class="container"><input type="checkbox" name="pizza[]" value="Peperoni,7.80">
					<span class="checkmark"></span> <span id="choose"> Choose </span></label>
				</td>
				<td>
					<img src="pizzas/margarita.jpg"> 
					<h4> DELUXE </h4>
					<hr/>
					<p> 100% Mozzarella, tomato sauce, Greek soft cheese, cured beef </p>
                    <span>10.00</span>
					<label class="container"><input type="checkbox" name="pizza[]" value="Deluxe,10.00">
					<span class="checkmark"></span> <span id="choose"> Choose </span></label>
				</td>
				<td>
					<img src="pizzas/margarita.jpg"> 
					<h4> FLAMBEE </h4>
					<hr/>
					<p> Tomato Sauce, 100% Mozzarella, Pepperoni, Spicy Beef, Mushrooms</p>
                    <span>9.50</span>
					<label class="container"><input type="checkbox" name="pizza[]" value="Flambee,9.50">
					<span class="checkmark"></span> <span id="choose"> Choose </span></label>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<input type="submit" value="ORDER NOW">
				</td>
			
		</table>
		</form>
		</div>
	</div>
	
</body>
</html>