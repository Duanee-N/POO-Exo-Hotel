<?php 

class Chambre{
    private Hotel $hotel;
    private $num;
    private $lit;
    private bool $wifi;
    private int $prix;
    private array $reservations;
    private bool $etat;

    public function __construct(Hotel $hotel, $num, $lit, $wifi, $prix)
    {
        $this->hotel = $hotel;
        $this->num = $num;
        $this->lit = $lit;
        $this->wifi = $wifi;
        $this->prix = $prix;
        $this->hotel->ajouterChambre($this);
        $this->reservations=[];
        $this->etat= true;
    }

    public function setDispo(bool $etat)
    {
        return $this->etat=$etat;
    }

    public function getDispo()
    {
        return $this->etat;
    }

    public function getHotel()
    {
        return $this->hotel;
    }
    
    public function getLit()
    {
        return $this->lit;
    }

    public function getWifi()
    {
        return $this->wifi;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function getNum()
    {
        return $this->num;
    }

    public function ajouterReservation(Reservation $reservation)
    {
        $this->reservations[] = $reservation;
    }

    public function __toString()
    {
        return "$this->num";
    }
}

?>