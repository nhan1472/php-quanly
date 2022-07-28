<?php
class menu{

    public function selectMenu()
    {
        $select="SELECT * FROM `menu`";
        $db = new connect();
        $results = $db->getList($select);
        return $results;
    }
    public function selectMenu1()
    {
        $select="SELECT * FROM `menu1`";
        $db = new connect();
        $results = $db->getList($select);
        return $results;
    }
    public function selectMenu3()
    {
        $select="SELECT * FROM `menu3`";
        $db = new connect();
        $results = $db->getList($select);
        return $results;
    }
    public function selectMenu2()
    {
        $select="SELECT * FROM `menu2`";
        $db = new connect();
        $results = $db->getList($select);
        return $results;
    }
    public function selectMenucon()
    {
        $select="SELECT * FROM `menucon`";
        $db = new connect();
        $results = $db->getList($select);
        return $results;
    }
}
?>