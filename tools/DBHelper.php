<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBHelper - classe do banco de dados
 *
 * @author luciana
 */
class DBHelper {

    private $conn;

    /**
     * 
     * @return boolean - conecta no banco, retorna true se funcionar
     * se não retorna mensagem de erro com falha da conexão
     */
    private function Connect() {
        $server = 'localhost';
        $db = 'banco_sva2';
        $user = 'root';
        $pass = '';

        try {
            $this->conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
            $this->conn->exec("SET NAMES 'utf-8'");
            $this->conn->exec("SET character_set_connection='utf-8'");
            $this->conn->exec("SET character_set_client='utf-8'");
            $this->conn->exec("SET character_set_results='utf-8'");
            return TRUE;
        } catch (PDOException $exc) {
            echo 'Falha na conexão: ' . $exc->getMessage();
        }
    }

    /**
     * 
     * @param type $sql
     * @return boolean - executa se a conexão (metodo acima) retornar true no if
     * caso a conexão não retorne true, o catch do metodo abaixo retorna false
     * executa no banco
     */
    public function Execute($sql) {
        try {
            if ($this->Connect()) {
                $this->conn->exec($sql);
                return TRUE;
            }
        } catch (PDOException $exc) {
            return FALSE;
        }
    }

    /**
     * 
     * @param type $sql
     * @return boolean - busca no banco se a conexão (metodo acima) retornar
     * true no if caso a conexão não retorne true, o catch do metodo
     * abaixo retorna false
     */
    public function Search($sql) {
        try {
            if ($this->Connect()) {
                return $this->conn->query($sql,PDO::FETCH_ASSOC);
            }
        } catch (PDOException $exc) {
            return FALSE;
        }
    }
    
    /**
     * 
     * @return type - retorna o ultimo registro
     */
    public function LastId() {
        return $this->conn->lastInsertId();
    }
    
    /**
     * Destroi o objeto, desconecta no banco
     * conn (conexão - primeiro método) fica com valor null
     */
    public function Disconnect() {
        $this->conn=null;
    }

}

?>
