<?php
date_default_timezone_set('America/Recife');

require_once $_SERVER['DOCUMENT_ROOT'] . '/EXEMPLO/DAO/AlunoDAO.php';

class AlunoNegocio
{
    static function salvar($dados)
    {
        $aluno = new AlunoVO();
        $aluno->setNome($dados->nome);
        $aluno->setMatricula($dados->matricula);
        session_start();
        $aluno->setIdAdm(json_decode($_SESSION["loginUsuario"])->id);

        return AlunoDAO::salvar($aluno);
    }

    static function listaTodos()
    {
        $alunos = AlunoDAO::getListAll();
        if (is_array($alunos)) {
            foreach ($alunos as $value) {
                echo '<tr>               
            <td>' . $value->getId() . '</td>
            <td><a href="editarAluno.php?id=' . $value->getId() . '">Editar</a>
            <a href="#" onclick="alertDelet(' . $value->getId() . ')">Excluir</a></td>
            <td>' . $value->getNome() . '</td>
            <td>' . $value->getMatricula() . '</td>
            <td>' . $value->getIdAdm()->getLogin() . '</td>
            </tr>';
            }
        }
    }

    static function retornaAluno($id)
    {
        $aluno = AlunoDAO::getById($id);
        if (is_object($aluno)) {
            return $aluno;
        }
    }
    static function atualizaAluno($dados)
    {
        $aluno = new AlunoVO();
        $aluno->setNome($dados->nome);
        $aluno->setMatricula($dados->matricula);
        $aluno->setId($dados->id);

        return AlunoDAO::update($aluno);
    }
    static function removeA($id)
    {
        return AlunoDAO::delete($id);
    }
}
