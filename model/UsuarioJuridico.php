<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioJuridico
 *
 * @author Luciana
 */
include_once '../tools/DBHelper.php';
include_once './Usuario.php';

class UsuarioJuridico extends Usuario {

    private $cnpj;
    private $nome_fantasia;
    private $razao_social;

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

        $sql = "INSERT INTO usuario (cnpj, email, pais, estado, cidade,
                telefone, bairro, endereco, endereco_numero, nome_fantasia, 
                razao_social, senha, cep, tipo) VALUES ('$this->cnpj', '$this->email', 
                '$this->pais', '$this->estado', '$this->cidade', '$this->telefone', 
                '$this->bairro', '$this->endereco', '$this->endereco_n', '$this->nome_fantasia', 
                    '$this->razao_social', '$this->senha', '$this->cep', '$this->tipo');";

        return $db->Search($sql);
    }

    public function Insert2() {
        $db = new DBHelper();

        $sql = "INSERT INTO usuario (cnpj, email
                telefone, nome_fantasia, 
                razao_social, senha, cep) VALUES ('$this->cnpj', '$this->email', 
                '$this->telefone', '$this->nome_fantasia', 
                    '$this->razao_social', '$this->senha', '$this->cep');";

        return $db->Search($sql);
    }

    public function Update() {
        $db = new DBHelper();

        $sql = "UPDATE usuario SET cnpj='$this->cnpj', email='$this->email', pais='$this->pais',
                estado='$this->estado', cidade='$this->cidade', telefone='$this->telefone', 
                bairro='$this->bairro', endereco='$this->endereco', endereco_numero='$this->endereco_n', 
                nome_fantasia='$this->nome_fantasia', razao_social='$this->razao_social',
                cep='$this->cep' WHERE id_usuario= $this->id_usuario;";

        
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

    public function listOneUser($id) {
        $db = new DBHelper();

        $sql = "select  * from usuario
                where 
                id_usuario = $id";


        $res = $db->Search($sql);
        if (count($res) === 1) {
            return $res;
        } else {
            return 0;
        }
    }

    public function alteraImagem($id_usuario) {
        $db = new DBHelper();

        $sql = "UPDATE usuario SET foto='$this->foto' WHERE id_usuario= $id_usuario;";

        return $db->Search($sql);
    }

    public function selecionaFoto($id_usuario) {
        $db = new DBHelper();

        $sql = "SELECT foto FROM usuario WHERE id_usuario=$id_usuario;";

        return $db->Search($sql);
    }

}
