<?php abstract class Model {
    protected $db;
    protected $table;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    public function getAll() {
        return $this->db->select("SELECT * FROM $this->table");
    }
    
    public function getById($id) {
        return $this->db->selectOne("SELECT * FROM $this->table WHERE id = :id", ['id' => $id]);
    }
    
    public function create($data) {
        return $this->db->insert($this->table, $data);
    }
    
    public function update($id, $data) {
        return $this->db->update($this->table, $data, "id = :id", ['id' => $id]);
    }
    
    public function delete($id) {
        return $this->db->delete($this->table, "id = :id", ['id' => $id]);
    }
} 

?>
