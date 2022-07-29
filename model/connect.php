<?php
class connect
{
	var $db=null;
	public function __construct() 
	{
		$servername='sql6.freemysqlhosting.net';
		$data='sql6509574';
		$user='sql6509574';
		$pass='UPdgVNil8d';
		// $servername='localhost';
		// $data='quanly';
		// $user='root';
		// $pass='';
		$this->db = new PDO("mysql:host=$servername;dbname=$data", $user, $pass);
		$this->db->exec("set names utf8mb4");

	}
	//	lấy đúng 1 ID nên lấy fetch vô luôn
	public function getInstance($select)
	{
		$results=$this->db->query($select);
		// echo $select;
		$result=$results->fetch();
		return $result;
	}
    // trả về mảng giá trị
    public function getList($select)
	{
		$results=$this->db->query($select);
		//query chuyen select
		// echo $results;
		return($results);
	}
    //
    public function getListP($select)
    {
        $results=$this->db->prepare($select);
        // echo $results;
        return($results);
    }
	public function exec($query)
	{
		$results=$this->db->exec($query);
		return($results);
	}
}
?>