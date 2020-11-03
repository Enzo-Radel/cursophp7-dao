<?php

require_once ("config.php");

/*$user = new Usuario();

$user->loadById(4);

echo $user;*/

/*$lista = Usuario::listar();
echo json_encode ($lista);*/

/*$teste = Usuario::search("o");

echo json_encode ($teste);*/

/*$acesso = new Usuario();

$acesso->logar("reginaldo","qwerty");

echo $acesso;*/

/*$aluno = new Usuario("aluno3","OlaMundo");

$aluno->insert();

echo $aluno;*/

$aluno = new Usuario();

$aluno->loadById(6);

$aluno->update("professor","s3nh4");

echo $aluno;
?>