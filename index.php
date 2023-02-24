<meta charset="UTF-8">

<script src="https://kit.fontawesome.com/2ce970fdf5.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<h1>Exercice Hotel</h1>

<p>Réaliser l'application en POO permettant la gestion de réservations de chambres par des clients dans différents hôtels.</p>

<h2>Résultat</h2>

<?php

spl_autoload_register(function ($class_name) {
    require_once $class_name.'.php';
});

$hilton=new Hotel("Hilton Lyon Eurexpo ****", "160 Cr du 3e Millénaire", "69800", "Saint-Priest");
$hiltonC1=new Chambre($hilton, "Chambre 1", "2 lits", false, 150);
$hiltonC2=new Chambre($hilton, "Chambre 2", "2 lits", false, 150);
$hiltonC3=new Chambre($hilton, "Chambre 3", "2 lits", true, 200);
$hiltonC4=new Chambre($hilton, "Chambre 4", "2 lits", true, 200);
$hiltonC5=new Chambre($hilton, "Chambre 5", "2 lits", true, 200);
$hiltonC6=new Chambre($hilton, "Chambre 6", "3 lits", false, 500);
$hiltonC7=new Chambre($hilton, "Chambre 7", "3 lits", false, 500);
$hiltonC8=new Chambre($hilton, "Chambre 8", "3 lits", true, 700);
$hiltonC9=new Chambre($hilton, "Chambre 9", "3 lits", true, 700);
$hiltonC10=new Chambre($hilton, "Chambre 10", "3 lits", true, 700);

$ibis=new Hotel("Ibis Hotel ***", "1 rue de Sebastopol", "67000", "Strasbourg");
$ibisC1=new Chambre($ibis, "Chambre 1", "2 lits", false, 150);
$ibisC2=new Chambre($ibis, "Chambre 2", "2 lits", false, 150);
$ibisC3=new Chambre($ibis, "Chambre 3", "2 lits", true, 200);
$ibisC4=new Chambre($ibis, "Chambre 4", "2 lits", true, 200);
$ibisC5=new Chambre($ibis, "Chambre 5", "2 lits", true, 200);
$ibisC6=new Chambre($ibis, "Chambre 6", "3 lits", false, 250);
$ibisC7=new Chambre($ibis, "Chambre 7", "3 lits", false, 250);
$ibisC8=new Chambre($ibis, "Chambre 8", "3 lits", true, 300);
$ibisC9=new Chambre($ibis, "Chambre 9", "3 lits", true, 300);
$ibisC10=new Chambre($ibis, "Chambre 10", "3 lits", true, 300);

$vanessa=new Client("Vanessa EVANS");
$jenny=new Client("Jenny MILLER");
$roger=new Client("Roger BARRETT");
$eric=new Client("Eric STING");

$reservation1Hilton=new Reservation($roger, $hiltonC8, "20-06-2023", "25-06-2023");
$reservation2Hilton=new Reservation($roger, $hiltonC9, "20-06-2023", "25-06-2023");
$reservation3Hilton=new Reservation($eric, $hiltonC10, "01-08-2023", "20-08-2023");
$reservation1Ibis=new Reservation($vanessa, $ibisC1, "13-04-2023", "16-04-2023");

$hilton->infosHotel();

$hilton->infosReservation();

$roger->infoReservationClient();
echo "<br>";

$eric->infoReservationClient();
echo "<br>";

$hilton->infoTableau();
echo "<br>";

$ibis->infosHotel();

$vanessa->infoReservationClient();
echo "<br>";

$ibis->infoTableau();
echo "<br>";

$jenny->infoReservationClient();
echo "<br>";


?>