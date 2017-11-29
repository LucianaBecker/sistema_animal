<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioFisico
 *
 * @author Luciana
 */
include_once '../tools/DBHelper.php';
include_once './Usuario.php';

class UsuarioFisico {

    private $sexo;
    private $cpf;
    private $sobrenome;
    private $nome;

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

        $sql = "INSERT INTO usuario (cpf, email, pais, estado, cidade,
                telefone, bairro, endereco, endereco_numero, sexo, sobrenome, nome, senha,
                cep, tipo) VALUES ($this->cpf, '$this->email', '$this->pais', '$this->estado', 
                '$this->cidade', '$this->telefone', '$this->bairro', '$this->endereco', '$this->endereco_n',
                '$this->sexo', '$this->sobrenome', '$this->nome ', '$this->senha', $this->cep, '$this->tipo');";

//        var_dump($sql);
//        exit;
        return $db->Search($sql);
    }

    public function Update() {
        echo "Chegou aqui!!! UPDATE!!";
        $db = new DBHelper();

        $sql = "UPDATE usuario SET
        email = '$this->email',
        pais = '$this->pais', 
        estado = '$this->estado',
        cidade = '$this->cidade', 
        cep = '$this->cep', 
        telefone = '$this->telefone', 
        bairro = '$this->bairro', 
        endereco = '$this->endereco', 
        endereco_numero = '$this->endereco_n', 
        sexo = '$this->sexo',
        sobrenome = '$this->sobrenome', 
        nome = '$this->nome', 
        cpf = $this->cpf
        WHERE 
        id_usuario = $this->id_usuario;";

        echo "<br><br> Chegou aqui 2!!!::::: SQL: $sql";

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

        $sql = "select * from usuario
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
        echo "ENTROU AQUI!!!";
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
