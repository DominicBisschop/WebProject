<?php

namespace model;

class EvenementRepository implements EvenementRepositoryInterface
{
    private $connection = null;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findEvenementById($id )
    {
        try {
            $statement = $this->connection->prepare('SELECT * FROM person WHERE id=?');
            $statement->bindParam(1, $id, \PDO::PARAM_INT);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                return new Evenement($results[0]['id'], $results[0]['naam'], $results[0]['begindatum'], $results[0]['einddatum'], $results[0]['klantnummer'], $results[0]['bezetting'], $results[0]['kost'], $results[0]['materialen']);
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return null;
        }
    }
}
