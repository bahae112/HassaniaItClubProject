<?php

class Message {
    private $id; // Ajout de l'ID (si vous utilisez une base de données)
    private $nom;
    private $email;
    private $objet;
    private $message;
    private $dateEnvoie;

    public function __construct($nom, $email, $objet, $message, $dateEnvoie) {
        $this->nom = $nom;
        $this->email = $email;
        $this->objet = $objet;
        $this->message = $message;
        $this->dateEnvoie = $dateEnvoie;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getObjet() {
        return $this->objet;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getDateEnvoie() {
        return $this->dateEnvoie;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setObjet($objet) {
        $this->objet = $objet;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function setDateEnvoie($dateEnvoie) {
        $this->dateEnvoie = $dateEnvoie;
    }
}
