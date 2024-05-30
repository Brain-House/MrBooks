<?php

class EditoraDAO extends Conexao{
    public function __construct(){
        parent:: __construct();
    }

    public function inserir($editora){
		$sql = "INSERT INTO editoras (edi_nome, status) VALUES(?,?)";
		$stm = $this->db->prepare($sql);
		$stm->bindValue(1, $editora->getEdi_nome());
        $stm->bindValue(2, $editora->getEdi_status());
		$stm->execute();
		$this->db = null;
	}

    public function buscar_todos()
    {
        $sql = "SELECT edi_id, edi_nome, edi_status FROM editoras";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        $this->db = null;
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function alterar_status_editora($editora)
    {
        $sql = "UPDATE autores SET aut_status = ? WHERE aut_id = ?";
        
		$stm = $this->db->prepare($sql);
		
		$stm -> bindValue(1, $editora -> getEdi_status());
		$stm -> bindValue(2, $editora -> getEdi_id());
        
		$stm -> execute();
        
		$this -> db = null;
    }
}
?>