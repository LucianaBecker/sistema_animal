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

class Usuario {

    private $id_usuario;
    private $pais;
    private $estado;
    private $cidade;
    private $cep;
    private $bairro;
    private $endereco;
    private $endereco_n;
    private $latitude;
    private $longitude;
    private $telefone;
    private $email;
    private $foto;
    private $senha;
    private $tipo;

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

    public function ToList() {
        $db = new DBHelper();
        $sql = "";

        return $db->Search($sql);
    }

    public function SelectById($id_usuario) {
        $db = new DBHelper();

        $sql = "select * from usuario where id_usuario = $id_usuario";

        return $db->Search($sql);
    }

    public function AutenticaUser($email, $senha) {
        $db = new DBHelper();

        $sql = "SELECT id_usuario from usuario
                WHERE email= '$email' AND senha= '$senha'";

//        var_dump($sql);
//        exit;
        
        $res = $db->Search($sql);

        if (count($res) === 1) {
            return $res;
        } else {
            return 0;
        }
    }

}
