<?php

namespace view;

class EvenementView
{
    public function showdata(array $data)
    {
        header('Content-Type: application/json');
        try {
            if (isset($data['evenement'])) {
                $evenement = $data['evenement'];
                echo json_encode(['id' => $evenement->getId(), 'naam' => $evenement->getNaam(), 'beginDatum' => $evenement->getBeginDatum(), 'eindDatum' => $evenement->getEindDatum(),
                    'klantnummer' => $evenement->getKlantnummer(), 'bezetting' => $evenement->getBezetting(), 'kost' => $evenement->getKost(), 'materialen' => $evenement->getMaterialen()], JSON_PRETTY_PRINT);
            } else {
                echo json_encode(["Fout" => "error in showdata"], JSON_PRETTY_PRINT);
            }
        }
        catch(\Exception $ex)
        {
            echo "Error in EvenementView";
        }
    }
}
