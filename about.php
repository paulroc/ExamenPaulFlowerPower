<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>about us</h3>
    <p> <a href="home.php">home</a> / about </p>
</section>

<section class="about">

    <div class="flex">

        <div class="image">
            <img src="images/about-img-1.png" alt="">
        </div>

        <div class="content">
            <h3>Waarom zou je ons willen kiezen?</h3>
            <p>Onze website werkt samen met bloemenwinkels over het hele land.
                Als u een product koopt dan zorgen wij ervoor dat u het product zo snel mogelijk bij u aankomt.</p>
            <a href="shop.php" class="btn">Winkel nu</a>
        </div>

    </div>

    <div class="flex">

        <div class="content">
            <h3>Wat kunnen wij u aan bieden?</h3>
            <p>Snelle service, diverse producten en goede communicatie tussen onze klanten en cliënten.</p>
            <a href="contact.php" class="btn">neem contact met ons op</a>
        </div>

        <div class="image">
            <img src="images/about-img-2.jpg" alt="">
        </div>

    </div>

    <div class="flex">

        <div class="image">
            <img src="images/about-img-3.jpg" alt="">
        </div>

        <div class="content">
            <h3>Wie zijn wij?</h3>
            <p>FlowerPower is een website dat zich specialiseert in het promoten van
                producten van andere bloemenwinkels. </p>
            <a href="#reviews" class="btn">Recensies van klanten</a>
        </div>

    </div>

</section>

<section class="reviews" id="reviews">

    <h1 class="title">Recensies van klanten</h1>

    <div class="box-container">

        <div class="box">
            <img src="images/pic-1.png" alt="">
            <p>Mijn naam is David Garcia en ik ben een tevreden klant van FlowerPower.
                De website heeft me echt betoverd met zijn prachtige ontwerp en gebruiksvriendelijkheid.
                Het was eenvoudig om me te registreren en in te loggen, en ik kon moeiteloos mijn bestelling plaatsen.
                De mogelijkheid om mijn gegevens te wijzigen en een factuur uit te draaien was ook handig.
                Hoewel de website geweldig is, geef ik een beoordeling van 4.5 van de 5 omdat ik af en toe wat vertraging heb ervaren bij het laden van pagina's.
                Maar over het algemeen ben ik zeer tevreden!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>David Garcia</h3>
        </div>

        <div class="box">
            <img src="images/pic-2.png" alt="">
            <p>Hallo, ik ben Anna Thompson en ik was aangenaam verrast door de FlowerPower-website.
                Het ontwerp was elegant en de foto's van de boeketten waren prachtig.
                Het registratieproces verliep soepel en ik kon gemakkelijk inloggen om mijn bestelling te plaatsen.
                Wat me echt beviel, was het gebruiksgemak en de mogelijkheid om mijn gegevens te wijzigen.
                Ik geef de website een beoordeling van 4.5 van de 5 omdat ik soms moeite had om specifieke informatie te vinden, zoals de openingstijden van de winkel.
                Maar over het algemeen was mijn ervaring positief!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Anna Thompson</h3>
        </div>

        <div class="box">
            <img src="images/pic-3.png" alt="">
            <p>Mijn naam is David Garcia en ik ben een tevreden klant van FlowerPower.
                De website heeft me echt betoverd met zijn prachtige ontwerp en gebruiksvriendelijkheid.
                Het was eenvoudig om me te registreren en in te loggen, en ik kon moeiteloos mijn bestelling plaatsen.
                De mogelijkheid om mijn gegevens te wijzigen en een factuur uit te draaien was ook handig.
                Hoewel de website geweldig is, geef ik een beoordeling van 4.5 van de 5 omdat ik af en toe wat vertraging heb ervaren bij het laden van pagina's.
                Maar over het algemeen ben ik zeer tevreden!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Daniel Johnson</h3>
        </div>

        <div class="box">
            <img src="images/pic-4.png" alt="">
            <p>Ik ben Sophie Martin en ik geef de bloemenwinkel website van FlowerPower een hoge score.
                De website is esthetisch aantrekkelijk en gemakkelijk te navigeren.
                Het registratieproces was eenvoudig en ik kon zonder problemen mijn bestelling plaatsen.
                Ik waardeerde ook de mogelijkheid om mijn gegevens te wijzigen en de factuur te downloaden.
                Het enige kleine minpuntje was dat ik soms wat moeite had met het vinden van specifieke informatie, zoals de contactgegevens van de winkel.
                Maar al met al ben ik erg tevreden en geef ik het een beoordeling van 4.5 van de 5!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Sophie Martin</h3>
        </div>

        <div class="box">
            <img src="images/pic-5.png" alt="">
            <p>Hallo, mijn naam is Oliver Thompson en ik geef de bloemenwinkel website van FlowerPower een hoge score.
                De website was visueel aantrekkelijk en ik hield van de mooie foto's van de bloemen.
                Het registratieproces was eenvoudig en ik had geen problemen bij het plaatsen van mijn bestelling.
                Ik waardeerde ook het gebruiksgemak bij het uitloggen en het wijzigen van mijn gegevens.
                Mijn enige suggestie zou zijn om meer variatie in het assortiment aan te bieden en misschien wat meer interactieve functies toe te voegen.
                Over het algemeen ben ik echter erg tevreden met de website!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Oliver Thompson</h3>
        </div>

        <div class="box">
            <img src="images/pic-6.png" alt="">
            <p>Hallo, ik ben Emily Anderson en ik geef de FlowerPower-website een hoge beoordeling.
                Het was eenvoudig om me te registreren en in te loggen, en het plaatsen van mijn bestelling verliep soepel.
                Ik vond het vooral leuk dat ik mijn gegevens kon wijzigen en een factuur kon genereren.
                De website was ook goed gestructureerd en informatief.
                Maar al met al ben ik erg tevreden en geef ik het een beoordeling van 4.5 van de 5!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Emily Anderson</h3>
        </div>

    </div>

</section>











<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>