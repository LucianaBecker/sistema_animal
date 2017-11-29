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

class Conteudo {

    private $id_conteudo;
    private $id_usuario;
    private $titulo;
    private $descricao;
    private $imagem;
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

        $sql = "INSERT INTO conteudo(id_usuario, titulo, descricao, tipo)
                VALUES ($this->id_usuario,'$this->titulo','$this->descricao','$this->tipo')";

        return $db->Search($sql);
    }

    public function InsertImg() {
        $db = new DBHelper();

        $sql = "INSERT INTO conteudo(id_usuario, titulo, descricao, tipo, imagem)
                VALUES ($this->id_usuario,'$this->titulo','$this->descricao','$this->tipo', '$this->imagem')";

        return $db->Search($sql);
    }

    public function Update() {
        $db = new DBHelper();

        $sql = "";

        return $db->Search($sql);
    }

    public function Delete() {
        $db = new DBHelper();

        $sql = "DELETE FROM conteudo WHERE id_conteudo=$this->id_conteudo and id_usuario=$this->id_usuario";
       
        return $db->Search($sql);
    }

    public function ToList() {
        $db = new DBHelper();
        $sql = "";

        return $db->Search($sql);
    }

    public function SelectById($id_conteudo) {
        $db = new DBHelper();

        $sql = "SELECT
            c.id_conteudo,
            c.titulo,
            c.descricao,
            c.imagem,
            c.tipo,
            c.id_juridico
            FROM conteudo c
            WHERE c.id_conteudo = $id_conteudo
            ORDER BY
            c.tipo";

        return $db->Search($sql);
    }

    public function SelectByTipo($tipo, $id_conteudo) {
        $db = new DBHelper();

        $sql = "SELECT
            c.id_conteudo,
            c.titulo,
            c.descricao,
            c.imagem,
            c.tipo
            FROM conteudo c
            WHERE c.tipo = '$tipo'
            and c.id_conteudo=$id_conteudo";

        return $db->Search($sql);
    }

    public function SelectByInformativo() {
        $db = new DBHelper();

        $sql = "SELECT c.id_conteudo, c.titulo, c.descricao, c.imagem, c.tipo FROM conteudo c WHERE c.tipo = 'Informativo'";

        return $db->Search($sql);
    }

    public function SelectByAnuncio() {
        $db = new DBHelper();

        $sql = "SELECT 
            c.id_conteudo, 
            c.titulo, 
            c.descricao, 
            c.imagem, 
            c.tipo 
            FROM 
            conteudo c 
            WHERE 
            c.tipo = 'Anuncio'
            ORDER BY
            c.id_conteudo DESC";

        return $db->Search($sql);
    }

    public function ListConteudoByUser($id_usuario) {
        $db = new DBHelper();

        $sql = "SELECT 
            c.id_conteudo, 
            c.titulo, 
            c.descricao, 
            c.imagem, 
            c.tipo,
            c.id_usuario
            FROM 
            conteudo c 
            WHERE 
            id_usuario = $id_usuario";

        return $db->Search($sql);
    }

    public function alteraImagem($id_conteudo) {
        $db = new DBHelper();

        $sql = "UPDATE conteudo SET foto='$this->foto' WHERE id_conteudo= $id_conteudo;";

        return $db->Search($sql);
    }

    public function selecionaFoto($id_conteudo) {
        $db = new DBHelper();

        $sql = "SELECT foto FROM conteudo WHERE id_conteudo=$id_conteudo;";

        return $db->Search($sql);
    }

}
