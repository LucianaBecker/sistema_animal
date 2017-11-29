<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Animal
 *
 * @author 0194166
 */
include_once '../tools/DBHelper.php';

class HistoricoExamesVacinas {

    private $id_vacinas;
    private $id_animal;
    private $descricao;
    private $data;
    
    public function __construct() {
        
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function Insert() {
        $db = new DBHelper();

        $sql = "";

        return $db->Search($sql);
    }

    public function Update() {
        $db = new DBHelper();

        $sql = "";

        return $db->Search($sql);
    }

    public function Delete() {
        $db = new DBHelper();

        $sql = "";

        return $db->Search($sql);
    }

    public function ToListByAnimal($id_animal) {
        $db = new DBHelper();
        $sql = "select * from vacinas where id_animal = $id_animal";
        return $db->Search($sql);
    }

    public function SelectById($id_ev) {
        $db = new DBHelper();

        $sql = "";

        return $db->Search($sql);
    }

}
