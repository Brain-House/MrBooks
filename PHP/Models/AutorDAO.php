<?php

class AutorDAO extends Conexao{
    public function __construct(){
        parent:: __construct();
    }

    public function inserir($autor){
		$sql = "INSERT INTO autores (aut_nome, status) VALUES(?,?)";
		$stm = $this->db->prepare($sql);
		$stm->bindValue(1, $autor->getNome());
        $stm->bindValue(2, $autor->getAut_status());
		$stm->execute();
		$this->db = null;
	}

    public function buscar_todos()
    {
        $sql = "SELECT aut_id, aut_nome, status FROM autores";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        $this->db = null;
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
}
?>