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

class Avaliacao {

    private $id_avaliacao;
    private $id_avaliador;
    private $id_avaliado;
    private $nota;

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

        $sql = "INSERT INTO avaliacao(id_avaliador, id_avaliado, nota)
                VALUES ($this->id_avaliador,$this->id_avaliado,$this->nota)";

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

    public function ToList() {
        $db = new DBHelper();
        $sql = "";

        return $db->Search($sql);
    }

    public function SelectByIdAvaliado($id_avaliado) {
        $db = new DBHelper();

        $sql = "";

        return $db->Search($sql);
    }

    public function selectRandomAvaliacao($random) {
        $db = new DBHelper();
        $sql = "select * from link_randomico where random='$random'";
        return $db->Search($sql);
    }

}
