<?php
/**
 * 
 */
class Model{
	
	public $db;

	public function __construct(){
		$this->db = new PDO(DB_HOST,DB_USER,DB_PASS);
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db-> exec("SET CHARACTER SET utf8");
	}

	public function fetchColumn($query, array $params = []){
		print_r($params);
		$sth = $this->db->prepare($query);
        $sth->execute($params);
        var_dump($sth->fetch(PDO::FETCH_COLUMN));
        return $sth->fetch(PDO::FETCH_COLUMN);
	}

    public function fetch($query, array $params = []){
    	print_r($params);
        $sth = $this->db->prepare($query);
        $sth->execute($params);
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll($query, array $params = []){
        $sth = $this->db->prepare($query);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function query($query, array $params = []){
        $sth = $this->db->prepare($query);
        $response = $sth->execute($params);
        return $response;
    }
}
?>