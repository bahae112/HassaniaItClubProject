<?php

class Evenement {
    private int $id;
    private string $titre;
    private string $description;
    private string $typeEvenement;
    private string $date;
    private string $heureDebut;
    private string $heureFin;
    private string $lieu;
    private string $clubOrganisateur;
    private string $ecoleOrganisatrice;
    private string $statut;
    private string $imageUrl;

    public function __construct(
        string $titre,
        string $description,
        string $typeEvenement,
        string $date,
        string $heureDebut,
        string $heureFin,
        string $lieu,
        string $clubOrganisateur,
        string $ecoleOrganisatrice,
        string $statut = "Prévu",
        string $imageUrl = ""
    ) {
        $this->titre = $titre;
        $this->description = $description;
        $this->typeEvenement = $typeEvenement;
        $this->date = $date;
        $this->heureDebut = $heureDebut;
        $this->heureFin = $heureFin;
        $this->lieu = $lieu;
        $this->clubOrganisateur = $clubOrganisateur;
        $this->ecoleOrganisatrice = $ecoleOrganisatrice;
        $this->statut = $statut;
        $this->imageUrl = $imageUrl;
    }

    // Getters
    public function getId(): int {
        return $this->id;
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getTypeEvenement(): string {
        return $this->typeEvenement;
    }

    public function getDate(): string {
        return $this->date;
    }

    public function getHeureDebut(): string {
        return $this->heureDebut;
    }

    public function getHeureFin(): string {
        return $this->heureFin;
    }

    public function getLieu(): string {
        return $this->lieu;
    }

    public function getClubOrganisateur(): string {
        return $this->clubOrganisateur;
    }

    public function getEcoleOrganisatrice(): string {
        return $this->ecoleOrganisatrice;
    }

    public function getStatut(): string {
        return $this->statut;
    }

    public function getImageUrl(): string {
        return $this->imageUrl;
    }

    // Setters
    public function setTitre(string $titre): void {
        $this->titre = $titre;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function setTypeEvenement(string $typeEvenement): void {
        $this->typeEvenement = $typeEvenement;
    }

    public function setDate(string $date): void {
        $this->date = $date;
    }

    public function setHeureDebut(string $heureDebut): void {
        $this->heureDebut = $heureDebut;
    }

    public function setHeureFin(string $heureFin): void {
        $this->heureFin = $heureFin;
    }

    public function setLieu(string $lieu): void {
        $this->lieu = $lieu;
    }

    public function setClubOrganisateur(string $clubOrganisateur): void {
        $this->clubOrganisateur = $clubOrganisateur;
    }

    public function setEcoleOrganisatrice(string $ecoleOrganisatrice): void {
        $this->ecoleOrganisatrice = $ecoleOrganisatrice;
    }

    public function setStatut(string $statut): void {
        $this->statut = $statut;
    }

    public function setImageUrl(string $imageUrl): void {
        $this->imageUrl = $imageUrl;
    }
}

?>
