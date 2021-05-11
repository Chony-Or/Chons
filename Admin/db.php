<?php 

Class Db{

	protected $server = "localhost";
	protected $username = "root";
	protected $password = "";
	protected $DB = "lhoyzki_ordering";


	public function __construct()
	{

		
	}

	public function connection()
	{
		$connection = new mysqli($this->server,$this->username,$this->password,$this->DB);

		return $connection;
	}
}

 ?>