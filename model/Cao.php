<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cao
 *
 * @author Luciana
 */
include './Animal.php';
include_once '../tools/DBHelper.php';

class Cao extends Animal {

    private $hemoparasitose;
    private $controle_carrapatos;

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

        $sql = $sql = "INSERT INTO animal(id_tipo_animal, id_usuario, castracao, cio, prenhe, data_nascimento, tipo_sanguineo, sexo, peso, nome, doador) 
                           VALUES (1,$this->id_usuario,'$this->castracao','$this->cio','$this->prenhe','$this->data_nascimento','$this->tipo_sanguineo','$this->sexo',$this->peso,'$this->nome','$this->doador')";
        
        $db->Search($sql);
        $ultimoidAnimal = (int) $db->LastId();

        $sql = "INSERT INTO exames(hemoparasitose, controle_carrapatos) 
                VALUES ('$this->hemoparasitose','$this->controle_carrapatos')";

        $db->Search($sql);
        $ultimaidExames = (int) $db->LastId();

        $sql = "INSERT INTO exames_has_tipo_animal(id_exames, id_tipo_animal) VALUES ($ultimaidExames,$ultimoidAnimal)";

        return $db->Search($sql);
    }

    public function InsertImg() {
        $db = new DBHelper();

        $sql = $sql = "INSERT INTO animal(id_tipo_animal, id_usuario, transfusao, castracao, cio, prenhe, data_nascimento, tipo_sanguineo, foto, sexo, peso, nome, doador) 
                           VALUES (1,$this->id_usuario,'$this->castracao','$this->castracao','$this->cio','$this->prenhe','$this->data_nascimento','$this->tipo_sanguineo','$this->foto','$this->sexo',$this->peso,'$this->nome','$this->doador')";

        $db->Search($sql);
        $ultimoidAnimal = (int) $db->LastId();

        $sql1 = "INSERT INTO exames(hemoparasitose, controle_carrapatos) 
                VALUES ('$this->hemoparasitose','$this->controle_carrapatos')";

        $db->Search($sql1);
        $ultimaidExames = (int) $db->LastId();

        $sql2 = "INSERT INTO exames_has_tipo_animal(id_exames, id_tipo_animal) VALUES ($ultimaidExames,$ultimoidAnimal)";

        
        return $db->Search($sql2);
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

    public function ToListByIdAnimal($id_usuario) {
        $db = new DBHelper();
        $sql = "";

        return $db->Search($sql);
    }

    public function SelectById($id_animal) {
        $db = new DBHelper();

        $sql = "";

        return $db->Search($sql);
    }

}
