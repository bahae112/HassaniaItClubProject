<?php
class Sponsor {
    private $id, $nom, $logo, $evenementnom, $siteweb, $description;

    public function __construct($nom, $logo, $evenementnom, $siteweb = null, $description = null) {
        $this->nom = $nom;
        $this->logo = $logo;
        $this->evenementnom = $evenementnom;
        $this->siteweb = $siteweb;
        $this->description = $description;
    }

    // Getters
    public function getNom() { return $this->nom; }
    public function getLogo() { return $this->logo; }
    public function getEvenementNom() { return $this->evenementnom; }
    public function getSiteWeb() { return $this->siteweb; }
    public function getDescription() { return $this->description; }

    // Setters if needed...
}
