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

class Doacao {

    private $id_doacao;
    private $id_animal_doador;
    private $id_animal_receptor;
    private $data_doacao;

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

        $sql = "INSERT INTO doacao(data_doacao, id_animal_doador, id_animal_receptor) 
                VALUES ('$this->data_doacao', $this->id_animal_doador, $this->id_animal_receptor)";

        var_dump($sql);
        return $db->Search($sql);
    }

//    public function Update() {
//        $db = new DBHelper();
//
//        $sql = "";
//
//        return $db->Search($sql);
//    }

    public function Delete($id_doacao) {
        $db = new DBHelper();

        $sql = "DELETE FROM doacao WHERE id_doacao= $id_doacao";

        return $db->Search($sql);
    }

    public function ToList() {
        $db = new DBHelper();
        $sql = "";

        return $db->Search($sql);
    }

    public function SelectById($id_doacao) {
        $db = new DBHelper();

        $sql = "";

        return $db->Search($sql);
    }

    public function insertRandomDoacao($random, $data_expira, $id_animal_doador, $id_animal_receptor) {

        $db = new DBHelper();
        $sql = "INSERT INTO link_randomico(random, tipo, data_expira, id_animal_doador, id_animal_receptor, marcador)
                VALUES ('$random','D','$data_expira',$id_animal_doador,$id_animal_receptor,0)";

        return $db->Search($sql);
    }

    public function insertRandomAvaliacao($random, $data_expira, $id_animal_doador, $id_animal_receptor) {

        $db = new DBHelper();
        $sql = "INSERT INTO link_randomico(random, tipo, data_expira, id_animal_doador, id_animal_receptor, marcador)
                VALUES ('$random','A','$data_expira',$id_animal_doador,$id_animal_receptor,0)";

        echo "<br><br>";
        echo $sql;

        return $db->Search($sql);
    }

    public function updateRandomDoacao($random) {
        $db = new DBHelper();
        $sql = "UPDATE link_randomico SET marcador = 1 where random='$random'";
        return $db->Search($sql);
    }

    public function selectRandomDoacao($random) {
        $db = new DBHelper();
        $sql = "select * from link_randomico where random='$random'";
        return $db->Search($sql);
    }

    public function SelectByIdDoador($id_animal) {
        $db = new DBHelper();

        $sql = "select 
                data_doacao,
                animal.nome as nome_doador
                from 
                doacao,
                animal
                WHERE
                doacao.id_animal_receptor = animal.id_animal and 
                doacao.id_animal_doador = $id_animal;";

        return $db->Search($sql);
    }

    public function SelectByIdReceptor($id_animal) {
        $db = new DBHelper();

        $sql = "select 
                data_doacao,
                animal.nome as nome_receptor
                from 
                doacao,
                animal
                WHERE
                doacao.id_animal_doador = animal.id_animal and 
                doacao.id_animal_receptor = $id_animal;";

        return $db->Search($sql);
    }

}
