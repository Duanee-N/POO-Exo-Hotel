<?php 

class Client{
    private $nom;
    private array $reservations;

    public function __construct($nom)
    {
        $this->nom=$nom;
        $this->reservations=[];
    }
    
    public function ajouterReservation(Reservation $reservation)
    {
        $this->reservations[] = $reservation;
    }

    public function prixTotal()
    {
        $prixTotal=0;
        foreach($this->reservations as $reservation){
            $prixTotal+=$reservation->getChambre()->getPrix()*$reservation->tempsReservation();
        }
        return $prixTotal;
    }
    
    public function infoReservationClient()
    {
        echo "<span style='font-size:22px ; color:black'>Réservation de $this->nom </span><br>";
        if (0==count($this->reservations)){
            echo "<span style='font-size:19px ; font-weight:normal ;color:#808080'>Aucune réservation.</span><br>";
        } else {
            foreach($this->reservations as $reservation){
                echo "<span style='font-size:19px ; font-weight:bold ; color:black'>".$reservation->getChambre()->getHotel()."</span><span style='font-size:19px ; font-weight:normal ;color:#808080'> / ".$reservation->getChambre().
                " : (".$reservation->getChambre()->getLit()." - ".$reservation->getChambre()->getPrix()."€ - Wifi : ".$reservation->getChambre()->getWifi().") $reservation<br>";
            }
        }
        if (0<count($this->reservations)){
            echo "Total : ". $this->prixTotal()." € </span><br>";
        } 
    }
    
    public function __toString()
    {
        return $this->nom;
    }

}

?>