<?php

    class Pessoa{
        public function __construct(private string $nome){}

        //Get
        public function getNome()
        {
            return $this->nome;
        }
        
        //Set
        public function setNome($nome)
        {
            $this->nome = $nome;

            return $this;
        }
    }

?>