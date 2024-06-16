<?php

    class Telefone{
        public function __construct(
            private int $tel_id = 0,
            private string $tel_num = "",
            private string $tel_ddd = ""
        ){}

        //Getter's

        public function getTel_id()
        {
            return $this->tel_id;
        }
    
        public function getTel_num()
        {
            return $this->tel_num;
        }

        public function getTel_ddd()
        {
            return $this->tel_ddd;
        }

        //Setter's

        public function setTel_id($tel_id)
        {
            $this->tel_id = $tel_id;

            return $this;
        }

        public function setTel_num($tel_num)
        {
            $this->tel_num = $tel_num;

            return $this;
        }

        public function setTel_ddd($tel_ddd)
        {
            $this->tel_ddd = $tel_ddd;

            return $this;
        }
    }

?>