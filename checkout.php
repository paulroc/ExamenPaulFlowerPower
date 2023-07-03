<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

$select_user = mysqli_query($conn, "SELECT * FROM `users` where id='$user_id'") or die('query failed');
$user=mysqli_fetch_assoc($select_user);

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['order'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn, $_POST['adres'].', '. $_POST['postcode'].', '. $_POST['woonplaats'].', '. $_POST['land']);
    $placed_on = date('d-M-Y');

    $cart_total = 0;
    $cart_products[] = '';

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if(mysqli_num_rows($cart_query) > 0){
        while($cart_item = mysqli_fetch_assoc($cart_query)){
            $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
        }
    }

    $total_products = implode(', ',$cart_products);

    $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

    if($cart_total == 0){
        $message[] = 'je winkelwagen is leeg!';
    }elseif(mysqli_num_rows($order_query) > 0){
        $message[] = 'bestelling al geplaatst!';
    }else{
        mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        $message[] = 'bestelling succesvol geplaatst!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Afrekenen</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>kassa bestelling</h3>
    <p> <a href="home.php">home</a> / checkout </p>
</section>

<section class="display-order">
    <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
    ?>    
    <p> <?php echo $fetch_cart['name'] ?> <span>(<?php echo '$'.$fetch_cart['price'].'/-'.' x '.$fetch_cart['quantity']  ?>)</span> </p>
    <?php
        }
        }else{
            echo '<p class="empty">je winkelwagen is leeg</p>';
        }
    ?>
    <div class="grand-total">eindtotaal : <span>$<?php echo $grand_total; ?>/-</span></div>
</section>

<section class="checkout">

    <form action="" method="POST">

        <h3> plaats je bestelling</h3>

        <div class="flex">
            <div class="inputBox">
                <span>uw naam :</span>
                <input value="<?php echo $user['name']; ?>" type="text" name="name" placeholder="Vul uw naam in">
            </div>
            <div class="inputBox">
                <span>uw nummer :</span>
                <input value="<?php echo $user['name']; ?>"  type="number" name="number" min="0" placeholder="voer uw nummer in">
            </div>
            <div class="inputBox">
                <span>uw e-mail :</span>
                <input value="<?php echo $user['email']; ?>"  type="email" name="email" placeholder="voer uw e-mailadres in">
            </div>
            <div class="inputBox">
                <span>betalingsmiddel :</span>
                <select name="method">
                    <option value="cash on delivery">contant bij aflevering</option>
                    <option value="credit card">kredietkaart</option>
                    <option value="paypal">paypal</option>
                    <option value="paytm">paytm</option>
                </select>
            </div>
            <div class="inputBox">
                <span>adres :</span>
                <input  value="<?php echo $user['adres']; ?>"  type="text" name="adres" placeholder="e.g. adres">
            </div>
            <div class="inputBox">
                <span>postcode :</span>
                <input value="<?php echo $user['postcode']; ?>"  type="text" name="postcode" placeholder="e.g.  postcode">
            </div>
            <div class="inputBox">
                <span>woonplaats :</span>
                <input value="<?php echo $user['woonplaats']; ?>"  type="text" name="woonplaats" placeholder="e.g. almere">
            </div>
            <div class="inputBox">
                <span>provincie :</span>
                <input type="text" name="provincie" placeholder="e.g. flevoland">
            </div>
            <div class="inputBox">
                <span>land :</span>
                <input type="text" name="land" placeholder="e.g. nederland">
            </div>
            <!--
            <div class="inputBox">
                <span>pin code :</span>
                <input type="number" min="0" name="pin_code" placeholder="e.g. 123456">
            </div>
            -->
        </div>

        <input type="submit" name="order" value="bestel nu" class="btn">

    </form>

</section>






<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>