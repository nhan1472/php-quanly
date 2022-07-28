<?php
class chitietdg{
    public function __contrust()
    {}
    public function selectCt($mdg)
    {
        $select="SELECT b.id,b.chitiet,b.diem from bangdg a,tieuchi b  WHERE a.mdg='$mdg' AND a.mdg=b.mdg";
        $db = new connect();
        $rel = $db->getList($select);
        return $rel;
    }
    public function selectDg()
    {
        $select="SELECT * from bangdg  ";
        $db = new connect();
        $rel = $db->getList($select);
        return $rel;
    }
    public function selectslTc()
    {
        $select="SELECT COUNT(id) FROM `tieuchi`";
        $db = new connect();
        $rel = $db->getInstance($select);
        return $rel;
    }
}
?>