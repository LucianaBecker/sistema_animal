<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gato
 *
 * @author Luciana
 */
include './Animal.php';
include_once '../tools/DBHelper.php';

class Gato extends Animal {

    private $fiv;
    private $felv;
    private $micoplasma;

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

        $sql = $sql = "INSERT INTO animal(id_tipo_animal, id_usuario, transfusao, castracao, cio, prenhe, data_nascimento, tipo_sanguineo, sexo, peso, nome, doador) 
                           VALUES (2,$this->id_usuario,'$this->transfusao','$this->castracao','$this->cio','$this->prenhe','$this->data_nascimento','$this->tipo_sanguineo','$this->sexo',$this->peso,'$this->nome','$this->doador')";

        $db->Search($sql);
        $ultimoidAnimal = (int) $db->LastId();

        $sql = "INSERT INTO exames(fiv, felv, micoplasma) 
                VALUES ('$this->fiv','$this->felv', '$this->micoplasma')";

        $db->Search($sql);
        $ultimaidExames = (int) $db->LastId();

        $sql = "INSERT INTO exames_has_tipo_animal(id_exames, id_tipo_animal) VALUES ($ultimaidExames,$ultimoidAnimal)";

        return $db->Search($sql);
    }

    public function InsertImg() {
        $db = new DBHelper();

        $sql = $sql = "INSERT INTO animal(id_tipo_animal, id_usuario, transfusao, castracao, cio, prenhe, data_nascimento, tipo_sanguineo, foto, sexo, peso, nome, doador) 
                           VALUES (2,$this->id_usuario,'$this->transfusao','$this->castracao','$this->cio','$this->prenhe','$this->data_nascimento','$this->tipo_sanguineo','$this->foto','$this->sexo',$this->peso,'$this->nome','$this->doador')";

        $db->Search($sql);
        $ultimoidAnimal = (int) $db->LastId();

        $sql1 = "INSERT INTO exames(fiv, felv, micoplasma) 
                VALUES ('$this->fiv','$this->felv', '$this->micoplasma')";

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
