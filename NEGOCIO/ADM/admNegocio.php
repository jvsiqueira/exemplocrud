<?php

date_default_timezone_set('America/Recife');

require_once $_SERVER['DOCUMENT_ROOT'] . '/EXEMPLO/VO/AdmVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/EXEMPLO/DAO/AdmDAO.php';
class AdmNegocio
{
    static function salvaAdm($dados)
    {
        //print_r($dados);
        $adm = new AdmVO();
        $adm->setLogin($dados->login);
        $adm->setSenha(md5($dados->senha));

        return AdmDAO::salvar($adm);
    }

    static function listAdm()
    {
        $adm = AdmDAO::getListAll();

        foreach ($adm as  $value) {
            echo '<tr>
            <th scope="row">' . $value->getId() . '</th>
            <td><a href="edtAdm.php?id=' . $value->getId() . '">Editar</a></td>
            <td>' . $value->getLogin() . '</td>
            
        </tr>';
        }
    }
    static function retornAdm($id)
    {
        return AdmDAO::getById($id);
    }

    static function atualizaAdm($dados)
    {
        $adm = new AdmVO();
        $adm->setId($dados->id);
        $adm->setLogin($dados->login);
        $adm->setSenha($dados->senha);

        return AdmDAO::update($adm);
    }
}
