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

class Animal {

    private $id_animal;
    private $id_usuario;
    private $nome;
    private $foto;
    private $peso;
    private $data_nascimento;
    private $tipo_sanguineo;
    private $vacinas;
    private $transfusao;
    private $castracao;
    private $prenhe;
    private $cio;
    private $doador;

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

    public function ToListByIdAnimal($id_usuario) {
        $db = new DBHelper();
        $sql = "";

        return $db->Search($sql);
    }

    public function SelectById($id_animal) {
        $db = new DBHelper();

        $sql = "select * from animal where id_animal = $id_animal";

        return $db->Search($sql);
    }

    public function SelectExamesByIdGato($id_animal) {
        $db = new DBHelper();

        $sql = "SELECT 
                e.fiv, 
                e.felv, 
                e.micoplasma
                from exames e
                inner join exames_has_tipo_animal ea 
                on e.id_exames = ea.id_exames
                INNER join animal a
                on ea.id_tipo_animal = a.id_animal
                where a.id_animal = $id_animal";

        return $db->Search($sql);
    }

    public function SelectExamesByIdCao($id_animal) {
        $db = new DBHelper();

        $sql = "SELECT 
                e.hemoparasitose, 
                e.controle_carrapatos 
                from exames e
                inner join exames_has_tipo_animal ea 
                on e.id_exames = ea.id_exames
                INNER join animal a
                on ea.id_tipo_animal = a.id_animal
                where a.id_animal = $id_animal";

        return $db->Search($sql);
    }

    public function ListAnimalsByUser($id_usuario) {
        $db = new DBHelper();

        $sql = "select * from animal where id_usuario = $id_usuario";

        return $db->Search($sql);
    }

    public function ToListVacinasByAnimal($id_animal) {
        $db = new DBHelper();
        $sql = "select * from vacinas where id_animal = $id_animal";
        return $db->Search($sql);
    }

    public function SelectDoador($tipo, $id_usuario) {
        $db = new DBHelper();
        $sql = "select 
                a.id_animal,
                a.nome,
                a.tipo_sanguineo,
                a.foto, 
                e.fiv, 
                e.felv, 
                e.micoplasma, 
                e.hemoparasitose,
                e.controle_carrapatos,
                u.id_usuario,
                u.nome as nome_user, 
                u.sobrenome,
		u.nome_fantasia,
                u.tipo as tipo_user,
                u.pais, 
                u.estado, 
                u.cidade, 
                u.bairro, 
				u.cep, 
                u.endereco
                from 
                animal a INNER JOIN exames_has_tipo_animal ea on a.id_animal = ea.id_tipo_animal 
                INNER join exames e on e.id_exames = ea.id_exames 
                inner join usuario u on u.id_usuario = a.id_usuario 
                WHERE (a.doador = 1 AND a.id_tipo_animal= $tipo) AND (u.id_usuario <> $id_usuario);";
        return $db->Search($sql);
    }

}
