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

        a:link, a:visited {
            background-color: #f44336;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        a:hover, a:active {
            background-color: red;
        }
    </style>
</head>
<body>
<div>
    <h1>Maak een personeelslid aan!</h1>
    <?php echo form_open('Personeel_controller'); ?>
    <label>Achternaam</label>
    <?php
    $attributes = array('name' => 'dlast_name', 'id' => 'dlast_name', 'placeholder' => 'Achternaam');
    echo form_input($attributes);
    ?></br>
    <label>Voornaam</label>
    <?php
    $attributes = array('name' => 'dfirst_name', 'id' => 'dfirst_name', 'placeholder' => 'Voornaam');
    echo form_input($attributes);
    ?></br>
    <label>E-mailadres</label>
    <?php
    $attributes = array('name' => 'demail', 'id' => 'demail', 'placeholder' => 'Voorbeeld@email.com');
    echo form_input($attributes);
    ?>
    <label id="label_email">&nbsp</label></br>
    <label>Wachtwoord</label>
    <?php
    $attributes = array('name' => 'dpassword', 'id' => 'dpassword', 'placeholder' => '**********');
    echo form_password($attributes);
    ?>
    <label id="label_password1"></label><br/>
    <?php
    $attributes = array('value' => 'Registreer personeelslid', 'name' => 'submit', 'id' => 'submit');
    echo form_submit($attributes); ?>
    <?php echo form_close(); ?><br/>


    <h1>Overzicht personeelsleden:</h1>
</div>
<table>
    <tbody>
    <tr class="titles">
        <th>Account ID</th>
        <th>Naam</th>
        <th>E-mail</th>
        <th>Wachtwoord</th>
    </tr>
    <?php foreach ($this->data as $row) {
        ?>
        <tr>
            <td><?= htmlentities($row->ACCOUNT_ID, ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlentities($row->FIRST_NAME, ENT_QUOTES, 'UTF-8') ?> <?= htmlentities($row->LAST_NAME, ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlentities($row->EMAIL, ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlentities($row->PASSWORD, ENT_QUOTES, 'UTF-8') ?></td>
        </tr>
        <?php
    } ?>
    <?php echo form_close(); ?><br>
    </tbody>
</table>
<br>
<a href="<?php echo site_url('Evenement_controller/index') ?>">Evenement aanmaken</a>
</body>
</html>