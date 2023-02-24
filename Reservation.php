<?php 

class Reservation{
    private Chambre $chambre;
    private Client $client;
    private $dateArr;
    private $dateDep;
    

    public function __construct($client, $chambre, $Arr, $Dep)
    {
        $this->chambre = $chambre; 
        if($this->chambre->getDispo()==false){
            echo "Chambre réservée.";
        } else{
            $this->client = $client; 
            $this->dateArr = new DateTime($Arr);  
            $this->dateDep = new DateTime($Dep);  
            $this->client->ajouterReservation($this);
            $this->chambre->ajouterReservation($this);
            $this->chambre->getHotel()->ajouterReservation($this);
            $this->chambre->setDispo(false);
        }
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getChambre()
    {
        return $this->chambre;
    }

    public function getDateArr()
    {
        return $this->dateArr;
    }

    public function getDateDep()
    {
        return $this->dateDep;
    }

    public function tempsReservation()
    {
        $tempsReservation = date_diff($this->dateDep, $this->dateArr);
        return $tempsReservation->d;
    }

    public function __toString()
    {
        return "du ".$this->dateArr->format('d-m-Y')." au ".$this->dateDep->format('d-m-Y');
    }

}

?>