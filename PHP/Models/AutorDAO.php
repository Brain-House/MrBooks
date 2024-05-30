<?php

class AutorDAO extends Conexao{
    public function __construct(){
        parent:: __construct();
    }

    public function inserir($autor){
		$sql = "INSERT INTO autores (aut_nome) VALUES (?)";
		$stm = $this->db->prepare($sql);
		$stm->bindValue(1, $autor->getNome());
		$stm->execute();
		$this->db = null;
	}

    public function buscar_todos()
    {
        $sql = "SELECT * FROM autores";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        $this->db = null;
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function alterar_status_autores($autor)
    {
        $sql = "UPDATE autores SET aut_status = ? WHERE aut_id = ?";
        
		$stm = $this->db->prepare($sql);
		
		$stm -> bindValue(1, $autor -> getAut_status());
		$stm -> bindValue(2, $autor -> getAut_id());
        
		$stm -> execute();
        
		$this -> db = null;
    }
}
?>