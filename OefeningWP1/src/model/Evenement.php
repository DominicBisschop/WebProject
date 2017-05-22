<?php

namespace model;

class Evenement
{
    private $id;
    private $naam;
    private $begindatum;
    private $einddatum;
    private $klantnummer;
    private $bezetting;
    private $kost;
    private $materialen;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->naam;
    }

    /**
     * @param mixed $naam
     */
    public function setName($naam)
    {
        $this->naam = $naam;
    }

    /**
     * @return mixed
     */
    public function getBegindatum()
    {
        return $this->begindatum;
    }

    /**
     * @param mixed $begindatum
     */
    public function setBegindatum($begindatum)
    {
        $this->begindatum = $begindatum;
    }

    /**
     * @return mixed
     */
    public function getEinddatum()
    {
        return $this->einddatum;
    }

    /**
     * @param mixed $einddatum
     */
    public function setEinddatum($einddatum)
    {
        $this->einddatum = $einddatum;
    }

    /**
     * @return mixed
     */
    public function getKlantnummer()
    {
        return $this->klantnummer;
    }

    /**
     * @param mixed $klantnummer
     */
    public function setKlantnummer($klantnummer)
    {
        $this->klantnummer = $klantnummer;
    }

    /**
     * @return mixed
     */
    public function getBezetting()
    {
        return $this->bezetting;
    }

    /**
     * @param mixed $bezetting
     */
    public function setBezetting($bezetting)
    {
        $this->bezetting = $bezetting;
    }

    /**
     * @return mixed
     */
    public function getKost()
    {
        return $this->kost;
    }

    /**
     * @param mixed $kost
     */
    public function setKost($kost)
    {
        $this->kost = $kost;
    }

    /**
     * @return mixed
     */
    public function getMaterialen()
    {
        return $this->materialen;
    }

    /**
     * @param mixed $materialen
     */
    public function setMaterialen($materialen)
    {
        $this->materialen = $materialen;
    }

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }
}
