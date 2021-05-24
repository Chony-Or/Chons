<?php 
include "db.php";
Class Crud extends Db{
	
	protected $table;
	protected $primary_key;
	public function __construct($table,$primary_key)
	{
		parent::__construct();	
		$this->con = $this->connection();	
		$this->table = $table;	
		$this->primary_key = $primary_key;	
		
	}

	public function Insert($value =NULL)
	{
		$fields = implode(",",array_keys($value));
		$field_value = "'".implode("','",$value)."'";
		$sql  = "Insert into {$this->table}($fields) values({$field_value})";

		$this->con->query($sql);
		return $this->con->insert_id;
	}

	public function update($primary_key = NULL,$pk_val = NULL,$value =NULL)
	{
		$set = array();

		foreach ($value as $key => $result) 
		{
			$set[] = "{$key} = '$result'";
		}

		$fields_update = implode(',', $set);

		$sql  = "Update {$this->table} Set {$fields_update} where {$primary_key} = '{$pk_val}'";

		$this->con->query($sql);
		return $this->con->affected_rows;
	}


	public function delete($primary_key = NULL,$pk_val = NULL)
	{
		$sql  = "Delete from {$this->table} where {$primary_key} = '{$pk_val}'";

		$this->con->query($sql);
		return $this->con->affected_rows;
	}

	public function get($where = NULL,$field = "*")
	{

		if ($where != NULL) 
			$where = "where {$where}";

		$sql  = "Select {$field} from {$this->table} {$where}";

		$result = $this->con->query($sql);
		$result = $result->fetch_all(MYSQLI_ASSOC);
		return $result;
	}


	
}

?>