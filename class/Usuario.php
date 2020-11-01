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

        //echo json_encode($resultado);
        if (count($resultado) > 0){

            $row = $resultado[0];

            $this->setIdusuario($row["idusuario"]);
            $this->setDeslogin($row["deslogin"]);
            $this->setDessenha($row["dessenha"]);
            $this->setDtcadastro(new DateTime($row["dtcadastro"]));
            
            //echo "teste if";
        }
        else {
            //echo "nao funfou";
        }
        //echo "funfou";

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