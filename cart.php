<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
	<title> Order - Pizza </title>
	<link href="style.css" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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


	<div id="main">
	    <div class="wrapper">
            <div class="row">
                <div class="col-12">
                    <form action="<?php echo isset($_POST['update']) ? 'order.php' : 'cart.php'?> " method="post">
                        <table class="table">
                            <thead class="thead-light" style="text-align: center!important;">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                            </tr>
                            </thead>
                                <tbody>
                                    <?php
                                    if(isset($_POST["update"])){

                                        $price[] = @($_POST['p']);
                                        $name[] = @($_POST['n']);
                                        $quantity = @($_POST['qty']);

                                        $newPrice=0;
                                        if(empty($name[0])){
                                            $x = 0;
                                        }else{
                                            $x = count($name[0]);
                                        }

                                        for($i=0;$i<$x;$i++) {
                                            $newPrice += $price[0][$i]*$quantity[$i];
                                            echo "<tr>";
                                            echo "<td>". ($i+1) ."</td>";
                                            echo "<td><input type='hidden' name='n[]' value='".$name[0][$i]."'>". $name[0][$i] ."</td>";
                                            echo "<td><input type='hidden' name='p[]' value='".($price[0][$i]*$quantity[$i])."'>". $price[0][$i]*$quantity[$i] ."</td>";
                                            echo "<td><input type='number' name='qty[$i]' value='$quantity[$i]' min='1' max='50' readonly ></td>";
                                            echo "</tr>";
                                        }?>
                                    <table class="table">
                                        <tbody>
                                        <?php
                                        echo "<tr>";
                                        //                        echo "<td></td>";
                                        //                        echo "<td></td>";
                                        echo "<td >Total</td>";
                                        echo  "<td><input type='hidden' name='newPrice' value='$newPrice'>". $newPrice ."</td>";
                                        echo "</tr>";
                                        ?>
                                        </tbody>
                                    </table>

                                   <?php }else{

                                            $pizzas = $_POST["pizza"];
                                            foreach ($pizzas as $p){
                                                $pizza[] = explode(',', $p);
                                            }
                                            for ($y=0;$y<count($pizza);$y++){
                                                $name[] = $pizza[$y][0];
                                                $price[] = $pizza[$y][1];
                                            }
                                            $x = count($name);
                                            for($i=0;$i<$x;$i++) {
                                                echo "<tr>";
                                                echo "<td>". ($i+1) ."</td>";
                                                echo "<td><input type='hidden' name='n[]' value='$name[$i]'>". $name[$i] ."</td>";
                                                echo "<td ><input type='hidden' name='p[]' value='$price[$i]'>". $price[$i] ."</td>";
                                                echo "<td><input type='number' name='qty[$i]' value='1' min='1' max='50' style='border-width: 1px; border-style: solid; '></td>";
                                                echo "</tr>";
                                            }
                                        }
                                   ?>

                                </tbody>

                        </table>
                        <?php if(isset($_POST['update'])){
                          echo  "<input type='submit' value='Order Now' name='order' style='float:right'>";
                        }else {
                            echo  "<input type='submit' value='Update' name='update' style='float:right'>";
                        }
                        ?>

                    </form>
                </div>
            </div>
        </div>
	</div>



    <?php












    //echo $pizza['Margarita'] * $qty;
    /*echo "<br>";
    print_r($qty);*/
//    echo "<br>";
//    print_r($pizza);
//    die();







    //echo array_sum($price);
//    $c = array_map(function ($pizza,$qty) {
//        return $pizza* $qty;
//    }, $pizza, $qty);
//
//    print_r($c);
//    die();
    ?>

