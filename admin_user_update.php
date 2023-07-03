<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];
$update_id = $_GET['update'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_POST['update_user'])) {

    $useradres = mysqli_real_escape_string($conn, $_POST['useradres']);
    $userpostcode = mysqli_real_escape_string($conn, $_POST['userpostcode']);
    $userwoonplaats = mysqli_real_escape_string($conn, $_POST['userwoonplaats']);
    $usergeboortedatum = mysqli_real_escape_string($conn, $_POST['usergeboortedatum']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $useremail = mysqli_real_escape_string($conn, $_POST['useremail']);
    $usertype = mysqli_real_escape_string($conn, $_POST['user_type']);
    if ($usergeboortedatum != null) {
        mysqli_query($conn, "UPDATE `users` SET user_type='$usertype', name='$username', email='$useremail', adres='$useradres', postcode='$userpostcode', woonplaats='$userwoonplaats', geboortedatum='$usergeboortedatum'  WHERE id='$update_id'") or die('query failed');
    }
    else {
          mysqli_query($conn, "UPDATE `users` SET user_type='$usertype', name='$username', email='$useremail', adres='$useradres', postcode='$userpostcode', woonplaats='$userwoonplaats' WHERE id='$update_id'") or die('query failed');
    }
}

if(isset($_GET['update'])) {


    $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$update_id'") or die('query failed');
    if (mysqli_num_rows($select_user) > 0) {
        $fetch_user = mysqli_fetch_assoc($select_user);
        //header('location:admin_users.php');
    }
    unset($_GET['update']);
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

</head>
<body>
   
<?php @include 'admin_header.php'; ?>

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
        <label for="user_type">Gebruikerstype:</label><br>

        <select class="box" id="user_type" name="user_type" >
            <option value="admin">admin</option>
            <option value="user">user</option>
        </select>

        <script>
            var user_type ="<?php echo $fetch_user["user_type"]; ?>";
            if (user_type === "admin") {
                document.getElementById("user_type").selectedIndex="0";
            }
            else {
                document.getElementById("user_type").selectedIndex="1";
            }

        </script>

        <input type="submit" value="update gebruiker gegevens" name="update_user" class="btn">
        <a href="admin_users.php" class="option-btn">ga terug</a>

    </form>
</section>

<script src="js/admin_script.js"></script>

</body>
</html>