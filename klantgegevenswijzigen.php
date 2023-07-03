<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];


if(isset($_POST['update_user'])) {

    $useradres = mysqli_real_escape_string($conn, $_POST['useradres']);
    $userpostcode = mysqli_real_escape_string($conn, $_POST['userpostcode']);
    $userwoonplaats = mysqli_real_escape_string($conn, $_POST['userwoonplaats']);
    $usergeboortedatum = mysqli_real_escape_string($conn, $_POST['usergeboortedatum']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $useremail = mysqli_real_escape_string($conn, $_POST['useremail']);

    if ($usergeboortedatum != null) {
        mysqli_query($conn, "UPDATE `users` SET name='$username', email='$useremail', adres='$useradres', postcode='$userpostcode', woonplaats='$userwoonplaats', geboortedatum='$usergeboortedatum'  WHERE id='$user_id'") or die('query failed');
    }
    else {
        mysqli_query($conn, "UPDATE `users` SET name='$username', email='$useremail', adres='$useradres', postcode='$userpostcode', woonplaats='$userwoonplaats' WHERE id='$user_id'") or die('query failed');
    }
 }

if(isset($_SESSION['user_id'])) {


    $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
    if (mysqli_num_rows($select_user) > 0) {
        $fetch_user = mysqli_fetch_assoc($select_user);
        //header('location:admin_users.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="add-products">

   <h1 class="title">Toevoegen of wijzigigen gebruiker gegevens:</h1>


    <form action="" method="post" enctype="multipart/form-data">
        <label for="username">Naam:</label><br>
        <input value="<?php echo $fetch_user['name']; ?>" class="box" type="text" id="username" name="username"><br><br>
        <label for="useradres">Adres:</label><br>
        <input value="<?php echo $fetch_user['adres']; ?>" class="box" type="text" id="useradres" name="useradres"><br><br>
        <label for="userpostcode">Postcode:</label><br>
        <input value="<?php echo $fetch_user['postcode']; ?>" class="box" type="text" id="userpostcode" name="userpostcode"><br><br>
        <label for="userwoonplaats">Woonplaats:</label><br>
        <input value="<?php echo $fetch_user['woonplaats']; ?>" class="box" type="text" id="userwoonplaats" name="userwoonplaats"><br><br>
        <label for="usergeboortedatum">Geboortedatum:</label><br>
        <input value="<?php echo $fetch_user['geboortedatum']; ?>" class="box" type="date" id="usergeboortedatum" name="usergeboortedatum" ><br><br>
        <label for="useremail">Email:</label><br>
        <input value="<?php echo $fetch_user['email']; ?>" class="box" type="text" id="useremail" name="useremail"><br><br>


        <input type="submit" value="update gebruiker gegevens" name="update_user" class="btn">
        <a href="home.php" class="option-btn">go back</a>

    </form>
</section>

<script src="js/admin_script.js"></script>

</body>
</html>