<?php

class Livro{
    public __construct(
        private int $liv_id,
        private int $liv_numpag,
        private String $liv_titulo,
        private string $liv_isbn,
        private string $liv_idioma,
        private string $liv_formato,
        private string $liv_genero,
        private string $liv_resumo,
        private string $liv_edi_id
    )

    

        /**
         * Get the value of liv_id
         */ 
        public function getLiv_id()
        {
                return $this->liv_id;
        }

        /**
         * Get the value of liv_numpag
         */ 
        public function getLiv_numpag()
        {
                return $this->liv_numpag;
        }

        /**
         * Get the value of liv_titulo
         */ 
        public function getLiv_titulo()
        {
                return $this->liv_titulo;
        }

        /**
         * Get the value of liv_isbn
         */ 
        public function getLiv_isbn()
        {
                return $this->liv_isbn;
        }

        /**
         * Get the value of liv_idioma
         */ 
        public function getLiv_idioma()
        {
                return $this->liv_idioma;
        }

        /**
         * Get the value of liv_formato
         */ 
        public function getLiv_formato()
        {
                return $this->liv_formato;
        }

        /**
         * Get the value of liv_genero
         */ 
        public function getLiv_genero()
        {
                return $this->liv_genero;
        }

        /**
         * Get the value of liv_resumo
         */ 
        public function getLiv_resumo()
        {
                return $this->liv_resumo;
        }

        /**
         * Get the value of liv_edi_id
         */ 
        public function getLiv_edi_id()
        {
                return $this->liv_edi_id;
        }

        /**
         * Set the value of liv_id
         *
         * @return  self
         */ 
        public function setLiv_id($liv_id)
        {
                $this->liv_id = $liv_id;

                return $this;
        }

        /**
         * Set the value of liv_numpag
         *
         * @return  self
         */ 
        public function setLiv_numpag($liv_numpag)
        {
                $this->liv_numpag = $liv_numpag;

                return $this;
        }

        /**
         * Set the value of liv_titulo
         *
         * @return  self
         */ 
        public function setLiv_titulo($liv_titulo)
        {
                $this->liv_titulo = $liv_titulo;

                return $this;
        }

        /**
         * Set the value of liv_isbn
         *
         * @return  self
         */ 
        public function setLiv_isbn($liv_isbn)
        {
                $this->liv_isbn = $liv_isbn;

                return $this;
        }

        /**
         * Set the value of liv_idioma
         *
         * @return  self
         */ 
        public function setLiv_idioma($liv_idioma)
        {
                $this->liv_idioma = $liv_idioma;

                return $this;
        }

        /**
         * Set the value of liv_formato
         *
         * @return  self
         */ 
        public function setLiv_formato($liv_formato)
        {
                $this->liv_formato = $liv_formato;

                return $this;
        }

        /**
         * Set the value of liv_genero
         *
         * @return  self
         */ 
        public function setLiv_genero($liv_genero)
        {
                $this->liv_genero = $liv_genero;

                return $this;
        }

        /**
         * Set the value of liv_resumo
         *
         * @return  self
         */ 
        public function setLiv_resumo($liv_resumo)
        {
                $this->liv_resumo = $liv_resumo;

                return $this;
        }

        /**
         * Set the value of liv_edi_id
         *
         * @return  self
         */ 
        public function setLiv_edi_id($liv_edi_id)
        {
                $this->liv_edi_id = $liv_edi_id;

                return $this;
        }
}

?>