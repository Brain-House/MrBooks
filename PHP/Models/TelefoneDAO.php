<?php

    class TelefoneDAO extends Conexao{
        public function __construct(){
            parent:: __construct();
        }

        public function inserir($telefone){
            $sql = "INSERT INTO telefones (tel_id, tel_num, tel_ddd, tel_usu_id) VALUES(?,?,?,?)";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $telefone->getTel_id());
            $stm->bindValue(2, $telefone->getTel_num());
            $stm->bindValue(3, $telefone->getTel_ddd());
            $stm->bindValue(4, $telefone->getUsu_id());
            $stm->execute();
            $this->db = null;
        }

        public function buscar_todos()
        {
            $sql = "SELECT * FROM telefones";
            $stm = $this->db->prepare($sql);
            $stm->execute();
            $this->db = null;
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        
    }
?>