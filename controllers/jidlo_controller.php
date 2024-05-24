<?php

namespace controllers;

require "../models/jidlo_model.php";
class jidlo_controller
{
    private $jidlo_model;

    public function __construct()
    {
        $this->jidlo_model = new \models\jidlo_model();
    }

    public function pridat_jidlo()
    {
        $this->jidlo_model->pridat_jidlo();
    }



}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new jidlo_controller();
    $action = $_POST['action'];

    if ($action === 'pridatjidlo') {
        $controller->pridat_jidlo();
    }
}