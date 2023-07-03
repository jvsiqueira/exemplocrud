<?php

class AlunoVO
{

    public $id;
    public $idAdm;
    public $nome;
    public $matricula;

    function getId()
    {
        return $this->id;
    }
    function getIdAdm()
    {
        return $this->idAdm;
    }
    function getNome()
    {
        return $this->nome;
    }

    function getMatricula()
    {
        return $this->matricula;
    }


    function setId($id)
    {
        $this->id = $id;
    }
    function setIdAdm($idAdm)
    {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/EXEMPLO/DAO/AdmDAO.php';
        $this->idAdm = AdmDAO::getById($idAdm);
    }
    function setNome($nome)
    {
        $this->nome = $nome;
    }

    function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }
}
