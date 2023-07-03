<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/EXEMPLO/VO/AlunoVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/EXEMPLO/CONEXAO/conexao.php';

class AlunoDAO
{

    static function salvar($aluno)
    {
        global $con;
        $stmt = $con->prepare("INSERT INTO aluno( idAdm,nome,matricula) VALUES(?,?,?)");

        $idAdm = $aluno->getIdAdm()->getId();
        $nome = $aluno->getNome();
        $matricula = $aluno->getMatricula();
        //print_r($adm);
        $stmt->bindParam(1, $idAdm);
        $stmt->bindParam(2, $nome);
        $stmt->bindParam(3, $matricula);

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
        $stmt = $con->prepare("SELECT * FROM aluno where id=:id;");
        $stmt->execute($dados);
        $aluno = new AlunoVO();
        $resultado = $stmt->fetch(PDO::FETCH_OBJ);
        //print_r($stmt->errorInfo());
        if (isset($resultado->id)) {


            $aluno->setId($resultado->id);
            $aluno->setNome($resultado->nome);
            $aluno->setIdAdm($resultado->idAdm);
            $aluno->setMatricula($resultado->matricula);
        }
        return $aluno;
    }

    static function getListAll()
    {
        global $con;
        $stmt = $con->prepare("SELECT * FROM aluno;");
        $stmt->execute();
        $lista = array();

        while ($resultado = $stmt->fetch(PDO::FETCH_OBJ)) {
            $aluno = new AlunoVO();

            $aluno->setId($resultado->id);
            $aluno->setNome($resultado->nome);
            $aluno->setIdAdm($resultado->idAdm);
            $aluno->setMatricula($resultado->matricula);

            $lista[] = $aluno;
        }

        return $lista;
    }

    static function delete($id)
    {
        global $con;
        $stmt = $con->prepare("DELETE FROM aluno WHERE id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $id;
    }

    static function update($aluno)
    {
        global $con;
        $stmt = $con->prepare("UPDATE aluno SET nome=? ,matricula=?  where id=?");

        $id = $aluno->getId();
        $nome = $aluno->getNome();
        $matricula = $aluno->getMatricula();

        //print_r($adm);

        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $matricula);
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
}
