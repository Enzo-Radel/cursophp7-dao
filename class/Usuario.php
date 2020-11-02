<?php

class Usuario {

    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function setIdusuario($idusuario){
        $this->idusuario = $idusuario;
    }

    public function getIdusuario(){
        return $this->idusuario;
    }

    public function setDeslogin($deslogin){
        $this->deslogin = $deslogin;
    }

    public function getDeslogin(){
        return $this->deslogin;
    }

    public function setDessenha($dessenha){
        $this->dessenha = $dessenha;
    }

    public function getDessenha(){
        return $this->dessenha;
    }

    public function setDtcadastro($dtcadastro){
        $this->dtcadastro = $dtcadastro;
    }

    public function getDtcadastro(){
        return $this->dtcadastro;
    }

    public function loadById($id){

        $sql = new Sql();

        $resultado = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>$id) );

        if (count($resultado) > 0){

            $row = $resultado[0];

            $this->setIdusuario($row["idusuario"]);
            $this->setDeslogin($row["deslogin"]);
            $this->setDessenha($row["dessenha"]);
            $this->setDtcadastro(new DateTime($row["dtcadastro"]));
            
        }

    }

    public static function listar(){
        $sql = new Sql();
        
        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
    }

    public static function search($login){
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
            ':SEARCH'=>"%".$login."%"
        ));
    }

    public function logar($login, $senha){

        $sql = new Sql();

        $informacoes = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :SENHA", array(
            ":LOGIN"=>$login,
            ":SENHA"=>$senha) );

        if (count($informacoes)>0){

            $row = $informacoes[0];

            $this->setIdusuario($row["idusuario"]);
            $this->setDeslogin($row["deslogin"]);
            $this->setDessenha($row["dessenha"]);
            $this->setDtcadastro(new DateTime($row["dtcadastro"]));
               
        }
        else {
            echo "login e/ou senha inválidos";
        }

    }

    public function __toString(){
        //return "funcionando";
        return json_encode(array(
            "idusuario"=>$this->getIdusuario(),
            "deslogin"=>$this->getDeslogin(),
            "dessenha"=>$this->getDessenha(),
            "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
        ));
    }
}

?>