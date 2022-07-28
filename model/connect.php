<?php
class connect
{
	var $db=null;
	public function __construct() 
	{
		$dsn='mysql:host=localhost;dbname=quanlysinhvien';
		$user='root';
		$pass='';
		$this->db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
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