<?php

namespace model;

class KlantModel
{
    private $id;
    private $naam;
    private $voornaam;
    private $postcode;
    private $gemeente;
    private $straat;
    private $huisnummer;
    private $telefoonnummer;
    private $mail;

    public function __construct($id, $naam, $voornaam, $postcode, $gemeente, $straat, $huisnummer, $telefoonnummer, $mail)
    {
        $this->id = $id;
        $this->naam = $naam;
        $this->voornaam = $voornaam;
        $this->postcode = $postcode;
        $this->gemeente = $gemeente;
        $this->straat = $straat;
        $this->huisnummer = $huisnummer;
        $this->telefoonnummer = $telefoonnummer;
        $this->mail = $mail;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNaam()
    {
        return $this->naam;
    }

    public function setNaam($naam)
    {
        $this->naam = $naam;
    }

    public function getVoornaam()
    {
        return $this->voornaam;
    }

    public function setVoornaam($voornaam)
    {
        $this->voornaam = $voornaam;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }

    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    public function getGemeente()
    {
        return $this->gemeente;
    }

    public function setGemeente($gemeente)
    {
        $this->gemeente = $gemeente;
    }

    public function getStraat()
    {
        return $this->straat;
    }

    public function setStraat($straat)
    {
        $this->straat = $straat;
    }

    public function getHuisnummer()
    {
        return $this->huisnummer;
    }

    public function setHuisnummer($huisnummer)
    {
        $this->huisnummer = $huisnummer;
    }

    public function getTelefoonnummer()
    {
        return $this->telefoonnummer;
    }

    public function setTelefoonnummer($telefoonnummer)
    {
        $this->telefoonnummer = $telefoonnummer;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }
}
