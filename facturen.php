<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

$select_user = mysqli_query($conn, "SELECT * FROM `users` where id='$user_id'") or die('query failed');
$user=mysqli_fetch_assoc($select_user);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="css/style.css">


</head>
<body class="facturen">

<h1>Facturen</h1>
<h3><?php echo $user['name']; ?></h3>
<h3><?php echo $user['adres']; ?></h3>
<h3><?php echo $user['postcode'].' '; ?>  <?php echo $user['woonplaats']; ?></h3>

<table>
<tr>
    <th>Product</th>
    <th>Prijs</th>
    <th>Datum</th>
    <th>Betaal status</th>
</tr>

<?php

$select_facturen = mysqli_query($conn, "SELECT * FROM `orders` where user_id='$user_id'") or die('query failed');
if (mysqli_num_rows($select_facturen) > 0) {
    while ($fetch_facturen = mysqli_fetch_assoc($select_facturen)) {
?>


     <tr>
         <td><?php echo $fetch_facturen['total_products']; ?></td>
         <td><?php echo $fetch_facturen['total_price']; ?></td>
         <td><?php echo $fetch_facturen['placed_on']; ?></td>
         <td><?php echo $fetch_facturen['payment_status']; ?></td>
     </tr>


<?php
  }}
?>
</table>
<a href="home.php" class="option-btn">ga terug</a>
</body>
</html>
