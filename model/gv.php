<?php class gv{
    public function selectlop($id)
    {

        $select="SELECT * FROM `lop` WHERE mgv='$id'";
        $db = new connect();
        $rel = $db->getList($select);
        return $rel;
    }
    public function selectgv($id)
    {

        $select="SELECT * FROM `sinhvien` WHERE lop='$id'";
        $db = new connect();
        $rel = $db->getList($select);
        return $rel;
    }
}
?>