<?php

namespace view;

class KlantView
{
    public function showdata(array $data)
    {
        header('Content-Type: application/json');
        try {
            if (isset($data['klant'])) {
                $person = $data['klant'];
                echo json_encode(['id' => $person->getId(), 'naam' => $person->getNaam(), 'voornaam' => $person->getVoornaam(), 'postcode' => $person->getPostcode(),
                    'gemeente' => $person->getGemeente(), 'straat' => $person->getStraat(), 'huisnummer' => $person->getHuisnummer(), 'telefoonnummer' => $person->getTelefoonnummer(),
                    'mail' => $person->getMail()]);
            } else {
                echo json_encode(["Fout" => "error in showdata"], JSON_PRETTY_PRINT);
            }
        }
        catch(\Exception $ex)
        {
        echo "Error in KlantView";
        }
}
}
