<?php

namespace model;

class PDOEvenementRepository implements EvenementRepository
{
    private $connection = null;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findEventById($id )
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM Evenementen WHERE id = ?");
            $statement->bindParam(1, $id, \PDO::PARAM_INT);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                return new EvenementModel($results[0]['id'], $results[0]['naam'], $results[0]['begindatum'], $results[0]['einddatum'], $results[0]['klantnummer'],
                    $results[0]['bezetting'], $results[0]['kost'], $results[0]['materialen']);
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function findEvents()
    {
        try {
            $statement = $this->connection->prepare('SELECT * FROM Evenementen');
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            $arrayResults = array();

            if (count($results) > 0) {
                foreach ($results as $event) {
                    array_push($arrayResults, new EvenementModel($event['id'], $event['naam'], $event['begindatum'], $event['einddatum'], $event['klantnummer'],
                        $event['bezetting'], $event['kost'], $event['materialen']));
                }
                return $arrayResults;
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function findEventByCustomer($customerId)
    {
        try {
            $statement = $this->connection->prepare('SELECT * FROM Evenementen WHERE klantnummer = ?');
            $statement->bindParam(1, $customerId, \PDO::PARAM_INT);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            $arrayResults = array();

            if (count($results) > 0) {
                foreach ($results as $event) {
                    array_push($arrayResults, new EvenementModel($event['id'], $event['naam'], $event['begindatum'], $event['einddatum'], $event['klantnummer'],
                        $event['bezetting'], $event['kost'], $event['materialen']));
                }
                return $arrayResults;
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function findEventByDate($startDate, $endDate)
    {
        try {
            $statement = $this->connection->prepare('SELECT * FROM Evenementen WHERE begindatum = ? AND einddatum = ?');
            $statement->bindParam(1, $startDate, \PDO::PARAM_STR);
            $statement->bindParam(2, $endDate, \PDO::PARAM_STR);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            $arrayResults = array();

            if (count($results) > 0) {
                foreach ($results as $event) {
                    array_push($arrayResults, new EvenementModel($event['id'], $event['naam'], $event['begindatum'], $event['einddatum'], $event['klantnummer'],
                        $event['bezetting'], $event['kost'], $event['materialen']));
                }
                return $arrayResults;
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function findEventByCustomerAndDate($customerId, $startDate, $endDate)
    {
        try {
            $statement = $this->connection->prepare('SELECT * FROM Evenementen WHERE begindatum = ? AND einddatum = ? AND id = ?');
            $statement->bindParam(1, $startDate, \PDO::PARAM_STR);
            $statement->bindParam(2, $endDate, \PDO::PARAM_STR);
            $statement->bindParam(3, $customerId, \PDO::PARAM_INT);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            $arrayResults = array();

            if (count($results) > 0) {
                foreach ($results as $event) {
                    array_push($arrayResults, new EvenementModel($event['id'], $event['naam'], $event['begindatum'], $event['einddatum'], $event['klantnummer'],
                        $event['bezetting'], $event['kost'], $event['materialen']));
                }
                return $arrayResults;
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function addEvent($event)
    {
        $event->setNaam(str_replace('%20', ' ', $event->getNaam()));
        $event->setBeginDatum(str_replace('%20', ' ', $event->getBeginDatum()));
        $event->setEindDatum(str_replace('%20', ' ', $event->getEindDatum()));
        $event->setKlantNummer(str_replace('%20', ' ', $event->getKlantNummer()));
        $event->setBezetting(str_replace('%20', ' ', $event->getBezetting()));
        $event->setKost(str_replace('%20', ' ', $event->getKost()));
        $event->setMaterialen(str_replace('%20', ' ', $event->getMaterialen()));

        try {
            $statement = $this->connection->prepare('INSERT INTO Evenementen (naam, begindatum, einddatum, klantnummer, bezetting, kost, materialen) VALUES (?, ?, ?, ?, ?, ?, ?)');
            $statement->bindParam(1, $event->getNaam(), \PDO::PARAM_STR);
            $statement->bindParam(2, $event->getBeginDatum(), \PDO::PARAM_STR);
            $statement->bindParam(3, $event->getEindDatum(), \PDO::PARAM_STR);
            $statement->bindParam(4, $event->getKlantNummer(), \PDO::PARAM_INT);
            $statement->bindParam(5, $event->getBezetting(), \PDO::PARAM_STR);
            $statement->bindParam(6, $event->getKost(), \PDO::PARAM_STR);
            $statement->bindParam(7, $event->getMaterialen(), \PDO::PARAM_STR);
            $statement->execute();

            return 'done!';
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function updateEvent($event)
    {
        $event->setId(str_replace('%20', ' ', $event->getId()));
        $event->setNaam(str_replace('%20', ' ', $event->getNaam()));
        $event->setBeginDatum(str_replace('%20', ' ', $event->getBeginDatum()));
        $event->setEindDatum(str_replace('%20', ' ', $event->getEindDatum()));
        $event->setKlantNummer(str_replace('%20', ' ', $event->getKlantNummer()));
        $event->setBezetting(str_replace('%20', ' ', $event->getBezetting()));
        $event->setKost(str_replace('%20', ' ', $event->getKost()));
        $event->setMaterialen(str_replace('%20', ' ', $event->getMaterialen()));

        try {
            $statement = $this->connection->prepare('UPDATE Evenementen SET naam = ?, begindatum = ?, einddatum = ?, klantnummer = ?, bezetting = ?, kost = ?, materialen = ? WHERE id = ?');
            $statement->bindParam(1, $event->getNaam(), \PDO::PARAM_STR);
            $statement->bindParam(2, $event->getBeginDatum(), \PDO::PARAM_STR);
            $statement->bindParam(3, $event->getEindDatum(), \PDO::PARAM_STR);
            $statement->bindParam(4, $event->getKlantNummer(), \PDO::PARAM_INT);
            $statement->bindParam(5, $event->getBezetting(), \PDO::PARAM_STR);
            $statement->bindParam(6, $event->getKost(), \PDO::PARAM_STR);
            $statement->bindParam(7, $event->getMaterialen(), \PDO::PARAM_STR);
            $statement->bindParam(8, $event->getId(), \PDO::PARAM_INT);
            $statement->execute();

            return 'done!';
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

    }

    public function deleteEvent($id)
    {
        try {
            $statement = $this->connection->prepare('DELETE FROM Evenementen WHERE id = ?');
            $statement->bindParam(1, $id, \PDO::PARAM_INT);
            $statement->execute();
            return 'done!';
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
