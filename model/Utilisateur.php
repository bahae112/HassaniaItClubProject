<?php

class Utilisateur {
    private int $id;
    private $nom;
    private $prenom;
    private $role;
    private $telephone;
    private $datePriseDeFonction;
    private $email;
    private $motDePasse;

    public function __construct($nom, $prenom, $role, $telephone, $datePriseDeFonction, $email, $motDePasse) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->role = $role;
        $this->telephone = $telephone;
        $this->datePriseDeFonction = $datePriseDeFonction;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
    }

    // Getters

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getRole() {
        return $this->role;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function getDatePriseDeFonction() {
        return $this->datePriseDeFonction;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMotDePasse() {
        return $this->motDePasse;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function setDatePriseDeFonction($datePriseDeFonction) {
        $this->datePriseDeFonction = $datePriseDeFonction;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setMotDePasse($motDePasse) {
        $this->motDePasse = $motDePasse;
    }
}
