<?php

/**
 * bronvermelding: Project Andy Leenders Web Advanced Jaar 2015-2016
 * stackoverflow.com*/

defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Registratiescherm</title>
    <script type="text/javascript"></script>
    <style>
        table, td {
            border: 1px solid black;
            background-color: lightblue;
        }

        th {
            text: bold;
            border: 1px solid black;
            background-color: cornflowerblue;
        }
    </style>
</head>
<body>
<div>
    <h1>Maak een evenement aan!</h1>
    <?php echo form_open('Evenement_controller'); ?>
    <label>Eventnaam</label>
    <?php
    $attributes = array('name' => 'deventnaam', 'id' => 'deventnaam', 'placeholder' => 'Evenement naam');
    echo form_input($attributes);
    ?></br>
    <label>Eventplaats</label>
    <?php
    $attributes = array('name' => 'deventplaats', 'id' => 'deventplaats', 'placeholder' => 'Evenement plaats');
    echo form_input($attributes);
    ?></br>
    <label>Omschrijving</label>
    <?php
    $attributes = array('name' => 'domschrijving', 'id' => 'domschrijving', 'placeholder' => 'Vul een omschrijving in:');
    echo form_input($attributes);
    ?></br>
    <label>Datum</label>
    <?php
    $attributes = array('name' => 'ddatum', 'id' => 'ddatum', 'placeholder' => 'jjjj/mm/dd');
    echo form_input($attributes);
    ?></br>
    <label>Extra's</label>
    <?php
    $attributes = array('name' => 'dextra', 'id' => 'dextra', 'placeholder' => 'Hier kan u extra notities invullen');
    echo form_input($attributes)
    ?></br>
    <?php
    $attributes = array('value' => 'Registreer het evenement', 'name' => 'submit', 'id' => 'submit');
    echo form_submit($attributes);?>
    <?php echo form_close(); ?><br/>
    <h1>Overzicht van de evenementen:</h1>
    <table>
        <tbody>
        <tr class="titles">
            <th>Event_ID</th>
            <th>Evenement Naam</th>
            <th>Plaats</th>
            <th>Omschrijving</th>
            <th>Datum</th>
            <th>Extra's</th>
        </tr>
        <?php foreach ($this->data as $row) {
            ?>
            <tr>
                <td><?= htmlentities($row->Event_id, ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlentities($row->Eventnaam, ENT_QUOTES, 'UTF-8') ?> </td>
                <td><?= htmlentities($row->Eventplaats, ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlentities($row->Omschrijving, ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlentities($row->Datum, ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlentities($row->Extras, ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
            <?php
        } ?>

        <?php echo form_close(); ?><br>
        </tbody>
    </table>
</div>

</body>
</html>