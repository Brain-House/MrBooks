<?php

class Autor extends Pessoa {
    public function __construct(	private int		$aut_id 	= 0,
									private string	$aut_status = "",
													$nome 		= null)
    {
        parent::__construct($nome); // Chamando o construtor da classe pai "Pessoa"
    }

    // Getter's

    public function getAut_status() {
        return $this->aut_status;
    }

    // Setter's

    public function setAut_status($aut_status) {
        $this->aut_status = $aut_status;

        return $this;
    }

        /**
         * Get the value of aut_id
         */ 
        public function getAut_id()
        {
                return $this->aut_id;
        }

        /**
         * Set the value of aut_id
         *
         * @return  self
         */ 
        public function setAut_id($aut_id)
        {
                $this->aut_id = $aut_id;

                return $this;
        }
}

?>
