<?php

class Autor extends Pessoa{
    public function __construct(
        private int $aut_id = "",
        private string $aut_status = ""
    ){
        parent:: __construct($nome);    //Construção da classe filha "Pessoa"
    }

    //Getter's

    public function getAut_status()
    {
        return $this->aut_status;
    }

    public function getNome()
    {
        return $this->nome;
    }

    //Setter's

    public function setAut_status($aut_status)
    {
        $this->aut_status = $aut_status;

        return $this;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }
}
?>