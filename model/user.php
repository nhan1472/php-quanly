<?php
 class User{
    public function __contrust()
    {
   
    }
   //  hiển thị sanh sách tinh túc
    public function login($tk,$mk)
    {
        $select ="select *from uesr where MSSV='$tk' and MK='$mk'";
        $db = new connect();
        $rel = $db->getList($select);
        $set = $rel->fetch();
        return $set;
    }
    public function logingv($tk,$mk)
    {
        $select ="select *from gv where email='$tk' and pass='$mk'";
        $db = new connect();
        $rel = $db->getList($select);
        $set = $rel->fetch();
        return $set;
    }
    public function selectgv($tk)
    {
        $select="SELECT a.Ten,a.email,b.mgv FROM giangvien a,gv b 
        WHERE a.email='$tk' and a.email=b.email";
        $db = new connect();
        $stm=$db->getInstance($select);
        return $stm;
    }
    public function ktemail($ms,$email)
    {
        $select ="select * from `sinhvien` WHERE mssv='$ms' and email='$email'";
        $db = new connect();
        $rel = $db->getList($select);
        $set = $rel->fetch();
        return $set;
    }
    public function updatemk($mk,$ms)
    {   
        $query="update uesr set mk='$mk' WHERE mssv='$ms'";
        $db = new connect();
        $stm=$db->exec($query);
    }
    public function updatemkgv($id,$mk)
    {   
        $query="UPDATE `gv` SET`pass`='$mk' WHERE mgv='$id'";
        $db = new connect();
        $stm=$db->exec($query);
    }
    public function selecttt($mssv)
    {
        $select="SELECT a.MSSV,a.ten_sv,a.ngaysinh,a.noisinh,a.Lop,c.tenKhoc,c.bacdt 
        FROM sinhvien a,lop b,makhoc c WHERE a.mssv='$mssv' and a.Lop = b.Malop  and b.makhoc=c.makhoc";
        $db = new connect();
        $stm=$db->getInstance($select);
        return $stm;
    }
    public function selectKq($mssv)
    {
        $select="SELECT a.mssv,b.diem,b.xeploai,b.ngaydg,b.nam,b.hk  FROM ketquadg a,diem b  WHERE a.mssv='$mssv' and a.md=b.md";
        $db = new connect();
        $stm=$db->getList($select);
        return $stm;
    }
    public function selectNam($mssv)
    {
        $select="select d.tennam from sinhvien a,lop b,makhoc c,ctnam d where a.mssv='$mssv' and
        a.lop=b.malop and b.makhoc=c.makhoc and c.mnh = d.manh ";
        $db = new connect();
        $stm=$db->getList($select);
        return $stm;
    }
    public function selectNam1($malop)
    {
        $select="select d.tennam from lop b,makhoc c,ctnam d where
         b.malop='$malop'  and b.makhoc=c.makhoc and c.mnh = d.manh";
        $db = new connect();
        $stm=$db->getList($select);
        return $stm;
    }
    public function selecthk($mssv,$nam)
    {
        $select="select e.hk from sinhvien a,lop b,makhoc c,ctnam d,cthk e where a.mssv='$mssv' 
        and a.lop=b.malop and
        b.makhoc=c.makhoc and c.mnh = d.manh and d.mhk=e.mhk and d.tennam='$nam' LIMIT 0, 25";
        $db = new connect();
        $stm=$db->getList($select);
        return $stm;
    }
    public function selecthk1($malop,$nam)
    {
        $select="select e.hk from lop b,makhoc c,ctnam d,cthk e where b.malop='$malop' and
        b.makhoc=c.makhoc and c.mnh = d.manh and d.mhk=e.mhk and d.tennam='$nam' LIMIT 0, 25";
        $db = new connect();
        $stm=$db->getList($select);
        return $stm;
    }
    public function selectktdiem($mssv,$nam,$hk)
    {
        $select="SELECT * FROM diem a,ketquadg b WHERE b.mssv='$mssv'
        and b.md=a.md and a.nam='$nam' and a.hk='$hk'";
        $db = new connect();
        $stm=$db->getList($select);
        return $stm->fetch();
    }
    public function selctKq($mssv)
    {
        $select="SELECT * FROM `ketquadg` WHERE mssv='$mssv'";
        $db = new connect();
        $stm=$db->getInstance($select);
        return $stm;
    }
    public function insertKq($md,$mnd,$tongdiem,$xeploai,$nam,$hk)
    {
        $date = new DateTime('now');
        $ngay=$date->format("Y-m-d");
        $query="INSERT INTO `diem`(`id`, `md`,`mnd`, `diemsv`,`diemgv`, `ngaydg`,`xeploai`, `nam`, `hk`) 
        VALUES ('','$md','$mnd','$tongdiem','0','$ngay','$xeploai','$nam','$hk')";
        $db = new connect();
        $stm=$db->exec($query);
    }
    public function insertnd($mnd,$id,$td,$svdg,$hk)
    {
       $query= "INSERT INTO `noidungdg`(`mnd`, `idtieuchi`, `thandiem`, `svdanhgia`, `gvdanhgia`,`hk`) 
        VALUES ('$mnd','$id',$td,'$svdg','0','$hk')";
        $db = new connect();
        $stm=$db->exec($query);
    }
    public function selectdiem($md,$hk,$nam)
    {
        $select="SELECT `id`, `md`, `mnd`, `diemsv`,`diemgv`, `ngaydg`, `xeploai`, `nam`, `hk`,`nhanxet` FROM `diem` WHERE md='$md' and hk='$hk' and nam='$nam'";
        $db = new connect();
        $stm=$db->getList($select);
        return $stm->fetch();
    }
    public function selectnd($mnd,$id,$hk)
    {
        $select="SELECT `mnd`, `idtieuchi`, `thandiem`, `svdanhgia`, `gvdanhgia` from noidungdg  WHERE mnd='$mnd'and idtieuchi='$id'and hk='$hk'";
        $db = new connect();
        $stm=$db->getList($select);
        return $stm->fetch();
    }
    public function insertdiemgv($mnd,$id,$diem,$hk)
    {
        $query="UPDATE `noidungdg` SET `gvdanhgia`='$diem' WHERE mnd='$mnd' and idtieuchi='$id' and hk='$hk'";
        $db = new connect();
        $stm=$db->exec($query);
    }
    public function updatediem($md,$nam,$hk,$diem,$nx)
    {
        $date = new DateTime('now');
        $ngay=$date->format("Y-m-d");
        $query="UPDATE `diem` SET `diemgv`='$diem',`ngaydg`='2021-11-18',`nhanxet`='$nx' WHERE md='$md' and hk='$hk' and nam='$nam'";
        $db = new connect();
        $stm=$db->exec($query);
    }
 }
?>