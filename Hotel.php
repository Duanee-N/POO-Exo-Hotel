<?php 

class Hotel{
    private $nom;
    private $adresse;
    private $codePostal;
    private $ville;
    private array $chambres;
    private array $reservations;

    public function __construct($nom, $adresse, $codePostal, $ville)
    {
        $this->nom=$nom;
        $this->adresse=$adresse;
        $this->codePostal=$codePostal;
        $this->ville=$ville;
        $this->chambres=[];
        $this->reservations=[];
    }

    public function getChambres()
    {
        return $this->chambres;
    }

    public function ajouterChambre(Chambre $chambre)
    {
        $this->chambres[] = $chambre;
    }

    public function ajouterReservation(Reservation $reservation)
    {
        $this->reservations[] = $reservation;
    }

    public function chambresDisp()
    {
        $chambresDispo=0;
        foreach($this->chambres as $chambre){
            if($chambre->getDispo() == true){
               $chambresDispo++;
            }
        }
        return "Nombre de chambres disponibles : ".$chambresDispo;
    }

    public function chambresReservees()
    {
        $chambresReservees=0;
        foreach($this->chambres as $chambre){
            if($chambre->getDispo()==false){
                $chambresReservees++;
            }
        }
        return "Nombre de chambres réservées : ".$chambresReservees;
    }

    public function infosHotel()
    {
        echo "<span style='font-size:30px; color:black'>$this</span><br>
        <span style='font-size:19px; color:black'>$this->adresse $this->codePostal ".mb_strtoupper($this->ville)."</span><br>
        <span style='font-size:19px ; color:#808080'>Nombre de chambres : ".count($this->chambres)."<br>".$this->chambresDisp()."<br>".$this->chambresReservees()."</span><br><br>";
    }

    public function infosReservation()
    {
        echo "<span style='font-size:22px; color:black'>Réservations de l'hôtel $this</span><br>";
        $nbReservations=0;
        foreach($this->chambres as $chambre){
            if($chambre->getDispo()==false){
                $nbReservations++;
            }
        }
        if($nbReservations>0){
            echo "<span style='text-align:center; margin: 0'><p style='color:#FFF; font-size:15px; background-color:#00A300; width: 120px; margin: 5px 0 5px 0; padding:5px'>".$nbReservations.mb_strtoupper(" Réservations </p></span>");
        } else{
            echo "<span style='text-align:center; margin: 0'><p style='color:#FFF; font-size:15px; background-color:red; width: 120px; margin: 5px 0 5px 0; padding:5px'>".mb_strtoupper("Aucune réservation </p></span>");
        }
        foreach($this->reservations as $reservation){
            echo "<span style='font-size:19px ; color:#808080'>".$reservation->getClient()." - ".$reservation->getChambre()." - ".$reservation."<br>";
        }
        echo "</span><br>";
    }

    public function infoTableau()
    {    
        echo "<span style='font-size:22px ; color:black'>Statut des chambres de <b> $this </b> :</span><br><br>";
        echo "<style type=text/css>
        table tbody tr:nth-child(even) { background-color: #EFEFEF; }
        </style>
        <table style='border-collapse:collapse; text-align:center; width:800px'>
        <tr style='color:#C0C0C0'>
        <th>CHAMBRE</th>
        <th>PRIX</th>
        <th>WIFI</th>
        <th>ETAT</th>
        </tr>";
        foreach($this->chambres as $chambre){
            echo "<tr>
            <td style='color:#808080'>".$chambre->getNum()."</td>
            <td style='color:#808080'>".$chambre->getPrix()."€ </td>
            <td style='color:#808080'>";
            if($chambre->getWifi()==true){
                echo "<i class='fa-solid fa-wifi'></i>";
            }
            echo "</td>";
            if ($chambre->getDispo()==false){
                echo "<td style='display:flex; justify-content:center'><p style='color:#FFF; font-size:15px; background-color:red; width: 90px; margin:5px; padding:5px'>".mb_strtoupper("Réservée")."</p></td>";
            } else{
                echo "<td style='display:flex; justify-content:center'><p style='color:#FFF; font-size:15px; background-color:#00A300; width: 90px; margin:5px; padding:5px'>".mb_strtoupper("Disponible")."</p></td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table>";
    }

    public function __toString()
    {
        return "$this->nom $this->ville";
    }
}

?>