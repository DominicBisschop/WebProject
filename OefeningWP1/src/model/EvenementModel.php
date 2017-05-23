<?php

namespace model;

class EvenementModel implements \JsonSerializable
{
    private $id;
    private $naam;
    private $beginDatum;
    private $eindDatum;
    private $klantnummer;
    private $bezetting;
    private $kost;
    private $materialen;

    public function __construct($id, $naam, $beginDatum, $eindDatum, $klantnummer, $bezetting, $kost, $materialen)
    {
        $this->setId($id);
        $this->setNaam($naam);
        $this->setBeginDatum($beginDatum);
        $this->setEindDatum($eindDatum);
        $this->setKlantnummer($klantnummer);
        $this->setBezetting($bezetting);
        $this->setKost($kost);
        $this->setMaterialen($materialen);
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
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

    public function getBeginDatum()
    {
        return $this->beginDatum;
    }

    public function setBeginDatum($beginDatum)
    {
        $this->beginDatum = $beginDatum;
    }

    public function getEindDatum()
    {
        return $this->eindDatum;
    }

    public function setEindDatum($eindDatum)
    {
        $this->eindDatum = $eindDatum;
    }

    public function getKlantnummer()
    {
        return $this->klantnummer;
    }

    public function setKlantnummer($klantnummer)
    {
        $this->klantnummer = $klantnummer;
    }

    public function getBezetting()
    {
        return $this->bezetting;
    }

    public function setBezetting($bezetting)
    {
        $this->bezetting = $bezetting;
    }

    public function getKost()
    {
        return $this->kost;
    }

    public function setKost($kost)
    {
        $this->kost = $kost;
    }

    public function getMaterialen()
    {
        return $this->materialen;
    }

    public function setMaterialen($materialen)
    {
        $this->materialen = $materialen;
    }
}