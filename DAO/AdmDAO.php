<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/EXEMPLO/VO/AdmVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/EXEMPLO/CONEXAO/conexao.php';

class AdmDAO
{

    static function salvar($adm)
    {
        global $con;
        $stmt = $con->prepare("INSERT INTO adm( login,senha) VALUES(?,?)");

        $senha = $adm->getSenha();
        $login = $adm->getLogin();
        //print_r($adm);
        $senha = md5($senha);
        $stmt->bindParam(1, $login);
        $stmt->bindParam(2, $senha);

        try {
            $stmt->execute();
            return 1;
        } catch (Exception $e) {
            //($stmt->errorInfo());
            return $e->getMessage();
        }
    }

    static function getById($id)
    {
        global $con;
        $dados = array(':id' => $id);
        $stmt = $con->prepare("SELECT * FROM adm where id=:id;");
        $stmt->execute($dados);
        $adm = new AdmVO();
        $resultado = $stmt->fetch(PDO::FETCH_OBJ);
        //print_r($stmt->errorInfo());
        if (isset($resultado->id)) {
            $adm->setId($resultado->id);
            $adm->setSenha($resultado->senha);
            $adm->setLogin($resultado->login);
        }
        return $adm;
    }

    static function getListAll()
    {
        global $con;
        $stmt = $con->prepare("SELECT * FROM adm;");
        $stmt->execute();
        $lista = array();

        while ($resultado = $stmt->fetch(PDO::FETCH_OBJ)) {
            $adm = new AdmVO();

            $adm->setId($resultado->id);
            $adm->setLogin($resultado->login);
            $adm->setSenha($resultado->senha);

            $lista[] = $adm;
        }

        return $lista;
    }
    static function login($dados)
    {
        global $con;
        try {
            $consulta = $con->prepare("SELECT * FROM adm WHERE login = ? AND senha = ?");
            $consulta->bindParam(1, $dados->login);
            $consulta->bindParam(2, $dados->senha);
            $adm = new AdmVO();
            if ($consulta->execute()) {
                if ($consulta->rowCount() > 0) {
                    while ($row = $consulta->fetch(PDO::FETCH_OBJ)) {
                        $adm->setId($row->id);
                        $adm->setLogin($row->login);
                        $adm->setSenha($row->senha);
                    }
                    return $adm;
                } else {
                    return 0;
                }
            }
        } catch (PDOException $exception) {
            echo 'ERROR: ' . $exception->getMessage();
        }
    }
    static function delete($id)
    {
        global $con;
        $stmt = $con->prepare("DELETE FROM adm WHERE id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $id;
    }

    static function update($adm)
    {
        global $con;
        $stmt = $con->prepare("UPDATE adm SET login=? ,senha=?  where id=?");

        $id = $adm->getId();
        $senha = $adm->getSenha();
        $login = $adm->getLogin();

        //print_r($adm);

        $stmt->bindParam(1, $login);
        $stmt->bindParam(2, $senha);
        $stmt->bindParam(3, $id);

        try {
            $stmt->execute();
            return 1;
        } catch (Exception $e) {
            //($stmt->errorInfo());
            return $e->getMessage();
        }
        //print_r($stmt->errorInfo());
    }

    static function getListL($SQL, $array)
    {
        global $con;
        $stmt = $con->prepare("SELECT * FROM adm where " . $SQL);
        $stmt->execute($array);
        $lista = array();

        while ($resultado = $stmt->fetch(PDO::FETCH_OBJ)) {
            $adm = new AdmVO();

            $adm->setId($resultado->id);
            $adm->setSenha($resultado->senha);
            $adm->setLogin($resultado->login);

            $lista[] = $adm;
        }
        return $lista;
    }
    static function getList($SQL)
    {
        global $con;
        $stmt = $con->prepare("SELECT * FROM adm  " . $SQL);
        $stmt->execute();
        $lista = array();

        while ($resultado = $stmt->fetch(PDO::FETCH_OBJ)) {
            $adm = new AdmVO();

            $adm->setId($resultado->id);
            $adm->setSenha($resultado->senha);
            $adm->setLogin($resultado->login);

            $lista[] = $adm;
        }
        return $lista;
    }
}
