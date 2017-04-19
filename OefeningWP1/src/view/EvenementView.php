<?php

namespace view;

class EvenementView implements View
{
    public function show(array $data)
    {
        header('Content-Type: application/json');

        if (isset($data['evenement'])) {
            $evenement = $data['evenement'];
            echo json_encode(['id' => $evenement->getId(), 'name' => $evenement->getName()]);
        } else {
            echo '{}';
        }
    }
}
