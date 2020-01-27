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
                <form action="order.php" method="post">
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

                        $price[] = @($_POST['p']);
                        $name[] = @($_POST['n']);
                        $quantity = @($_POST['qty']);
                        $newPrice = @($_POST['newPrice']);

                        if(empty($name[0])){
                            $x = 0;
                        }else{
                         $x = count($name[0]);
                        }

                        for($i=0;$i<$x;$i++) {
                            echo "<tr>";
                            echo "<td>". ($i+1) ."</td>";
                            echo "<td>". $name[0][$i] ."</td>";
                            echo "<td >". $price[0][$i] ."</td>";
                            echo "<td><input type='number' name='qty[$i]' value='$quantity[$i]' min='1' max='50' readonly ></td>";
                            echo "</tr>";
                        }

                        ?>
                        </tbody>

                    </table>

                    <table class="table">
                        <tbody>
                        <?php
                        echo "<tr>";
//                        echo "<td></td>";
//                        echo "<td></td>";
                        echo "<td >Total</td>";
                        echo  "<td>". $newPrice ."</td>";
                        echo "</tr>";
                        ?>
                        </tbody>
                    </table>

                    <input type='submit' value='Order Now' name='order' style="float: right">
                </form>
            </div>
        </div>
    </div>
</div>



<?php
    if(isset($_POST['order'])){
        include("config.php");
        $now = new DateTime();
        $date = $now->format('Y-m-d H:i:s');

        $takeTheUser = "SELECT cid FROM customers where cname='".$_SESSION['cname']."' ";
        $result = mysqli_query($conn,$takeTheUser);

        if (!$row = mysqli_fetch_assoc($result)){
            echo "Something went wrong";

        }else{
            $userId = $row['cid'];
        }

        $insertTheOrder = "INSERT INTO orders (total_price,order_date,c_id) VALUES ('$newPrice','$date','$userId') ";

        $conn->query($insertTheOrder);
        header('Location:profile.php') ;
    }

?>


