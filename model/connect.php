<?php
class connect
{
	var $db=null;
	public function __construct() 
	{
		$dsn='mysql:host=b9wlmftkdhskventr8m2-mysql.services.clever-cloud.com;dbname=b9wlmftkdhskventr8m2';
		$user='unuutlb6spzxgtas';
		$pass='ASBdUBiH4rq4oT1L0329';
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