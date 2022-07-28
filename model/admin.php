<?php
 class admin
 {
    public function __contrust()
    {
   
    }
    public function selectadmin($tk,$mk)
    {
       $select="SELECT * FROM `admin` WHERE admin='$tk' and pass='$mk'";
       $db = new connect();
       $rel = $db->getList($select);
       return $rel;
    }
    public function selectadmin1($tk,$mk)
    {
       $select="SELECT * FROM `admin` WHERE admin='$tk' and pass='$mk'";
       $db = new connect();
       $rel = $db->getInstance($select);
       return $rel;
    }
    public function updatemk($id,$mk)
    {
      $query="UPDATE `admin` SET`pass`='$mk' WHERE admin='$id'";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function updateND($id,$title,$diem)
    {
      $query="UPDATE `bangdg` SET `Title`='$title',`thangdiem`='$diem' WHERE mdg='$id'";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function updateTC($id,$title,$diem)
    {
      $query="UPDATE `tieuchi` SET `chitiet`='$title',`diem`='$diem' WHERE id='$id'";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function selectTitledg()
    {
        $select="SELECT * FROM `bangdg`";
        $db = new connect();
        $results = $db->getList($select);
        return $results;
    }
    public function selecttitle1($id)
    {
        $select="SELECT * FROM `bangdg` where mdg='$id'";
        $db = new connect();
        $results = $db->getInstance($select);
        return $results;
    }

    public function selectTC($id)
    {
        $select="SELECT `id`, `mdg`, `chitiet`, `diem` FROM `tieuchi` WHERE mdg='$id'";
        $db = new connect();
        $results = $db->getList($select);
        return $results;
    }
    public function selectTC1($id)
    {
        $select="SELECT * FROM `bangdg` WHERE mdg='$id'";
        $db = new connect();
        $results = $db->getInstance($select);
        return $results;
    }
    public function selectTC2($id,$mdg)
    {
        $select="SELECT `id`, `mdg`, `chitiet`, `diem` FROM `tieuchi` WHERE mdg='$mdg'and id='$id'";
        $db = new connect();
        $results = $db->getInstance($select);
        return $results;
    }
    public function selectSV()
    {
        $select="SELECT * FROM `sinhvien` ";
        $db = new connect();
        $results = $db->getList($select);
        return $results;
    }
    public function selectSV1($lop)
    {
        $select="SELECT * FROM `sinhvien` where lop='$lop' ";
        $db = new connect();
        $results = $db->getList($select);
        return $results;
    }
    public function selectSV2($ms)
    {
        $select="SELECT * FROM `sinhvien` where mssv like '%$ms%' ";
        $db = new connect();
        $results = $db->getList($select);
        return $results;
    }
    public function selectlop()
    {
        $select="SELECT * FROM `lop` ";
        $db = new connect();
        $results = $db->getList($select);
        return $results;
    }
    public function selectmakhoa()
    {
        $select="SELECT * FROM `khoa` ";
        $db = new connect();
        $results = $db->getList($select);
        return $results;
    }
    public function selectgv()
    {
        $select="SELECT * FROM `giangvien` ";
        $db = new connect();
        $results = $db->getList($select);
        return $results;
    }
    public function selectmakhoahoc()
    {
        $select="SELECT * FROM `makhoc` ";
        $db = new connect();
        $results = $db->getList($select);
        return $results;
    }
    public function selectnam()
    {
        $select="SELECT * FROM `ctnam`  ";
        $db = new connect();
        $results = $db->getList($select);
        return $results;
    }

    public function selecthk()
    {
        $select="SELECT * FROM `cthk`  ";
        $db = new connect();
        $results = $db->getList($select);
        return $results;
    }
    public function selectten($id)
    {
        $select="SELECT * FROM `sinhvien` WHERE mssv='$id'";
        $db = new connect();
        $results = $db->getInstance($select);
        return $results;
    }
    public function selectlopid($id)
    {
        $select="SELECT * FROM `lop` WHERE Malop='$id'";
        $db = new connect();
        $results = $db->getInstance($select);
        return $results;
    }
    public function selecthkcid($id)
    {
        $select="SELECT * FROM `cthk` WHERE id='$id'";
        $db = new connect();
        $results = $db->getInstance($select);
        return $results;
    }
    public function selecthkcid1($id)
    {
        $select="SELECT * FROM `cthk` WHERE mhk='$id'";
        $db = new connect();
        $results = $db->getList($select);
        return $results;
    }
    public function selectnamcid($id)
    {
        $select="SELECT * FROM `ctnam` WHERE man='$id'";
        $db = new connect();
        $results = $db->getInstance($select);
        return $results;
    }
    public function selectgvid($id)
    {
        $select="SELECT * FROM `giangvien` WHERE mgv='$id'";
        $db = new connect();
        $results = $db->getInstance($select);
        return $results;
    }
    public function selectkhoaid($id)
    {
        $select="SELECT * FROM `khoa` WHERE makhoa='$id'";
        $db = new connect();
        $results = $db->getInstance($select);
        return $results;
    }
    public function selectkhoahocid($id)
    {
        $select="SELECT * FROM `makhoc` WHERE makhoc='$id'";
        $db = new connect();
        $results = $db->getInstance($select);
        return $results;
    }
    public function selectlop1($id)
    {
        $select="SELECT * FROM `lop` WHERE malop='$id'";
        $db = new connect();
        $results = $db->getInstance($select);
        return $results;
    }
    public function insertSV($id,$ten,$ns,$ns1,$lop,$email)
    {
      $date = new DateTime($ns);
      $ngay=$date->format("Y-m-d");
      $query="INSERT INTO `sinhvien`(`id`, `MSSV`, `ten_sv`, `ngaysinh`, `noisinh`, `Lop`, `email`) 
      VALUES ('','$id','$ten','$ngay','$ns1','$lop','$email')";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function insertND($id,$ten,$ns)
    {
      $query="INSERT INTO `ketquadg`(`MSSV`, `md`, `mnd`)
       VALUES ('$id','$ten','$ns')";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function insertnam($id,$manh,$ten,$mahk)
    {
      $query="INSERT INTO `ctnam`(`man`, `manh`, `tennam`, `mhk`) 
      VALUES ('$id','$manh','$ten','$mahk')";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function inserthk($id)
    {
      $query="INSERT INTO `cthk`(`id`, `mhk`, `hk`) 
      VALUES ('','$id','hk1')";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function inserthk1($id,$id1)
    {
      $query="INSERT INTO `cthk`(`id`, `mhk`, `hk`) 
      VALUES ('','$id1','$id')";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function updateSV($mssv,$ten,$ngaysinh,$noisinh,$lop,$email)
    {
      $query="UPDATE `sinhvien` SET `ten_sv`='$ten',`ngaysinh`='$ngaysinh',`noisinh`='$noisinh',
      `Lop`='$lop',`email`='$email' WHERE mssv='$mssv'";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function selectmd($md)
    {
      $select="SELECT * FROM `ketquadg` WHERE md='$md'";
      $db = new connect();
      $results = $db->getInstance($select);
      return $results;
    }
    public function selectmnd($md)
    {
      $select="SELECT * FROM `ketquadg` WHERE mnd='$md'";
      $db = new connect();
      $results = $db->getInstance($select);
      return $results;
    }
    public function selectsiso($lop)
    {
      $select="SELECT COUNT(id) FROM `sinhvien` WHERE Lop='$lop'";
      $db = new connect();
      $results = $db->getInstance($select);
      return $results;
    }
    public function insertTK($ms)
    {
      $query="INSERT INTO `uesr`(`id`, `MSSV`, `MK`)
       VALUES ('','$ms','123')";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function insertLop($id,$ten,$khoa,$khoc,$gv)
    {
      $query="INSERT INTO `lop`(`Malop`, `TenLop`, `SiSo`, `makhoa`, `makhoc`, `mgv`) 
      VALUES ('$id','$ten','0','$khoa','$khoc','$gv')";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function insertKh($id,$ten,$manh)
    {
      $query="INSERT INTO `makhoc`(`makhoc`, `tenKhoc`, `bacdt`, `mnh`) VALUES
       ('$id','$ten','Cao Đăng','$manh')";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function insertKhoa($id,$ten)
    {
      $query="INSERT INTO `khoa`(`makhoa`, `tenKhoa`) 
      VALUES ('$id','$ten')";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function insertGV($id,$ten,$email,$makhoa)
    {
      $query="INSERT INTO `giangvien`(`mgv`, `Ten`, `email`, `makhoa`) 
      VALUES ('$id','$ten','$email','$makhoa')";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function updateGV($id,$ten,$email)
    {
      $query="UPDATE `giangvien` SET `Ten`='$ten',
      `email`='$email' WHERE mgv='$id'";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function insertGVpass($id,$email)
    {
      $query="INSERT INTO `gv`(`mgv`, `email`, `pass`) VALUES 
      ('$id','$email','123')";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function updateGVpass($id,$email)
    {
      $query="UPDATE `gv` SET `email`='$email' WHERE mgv='$id'";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function updateKhoa($id,$ten)
    {
      $query="UPDATE `khoa` SET `tenKhoa`='$ten' WHERE makhoa='$id'";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function insertnd11($id,$ten,$diem)
    {
      $query="INSERT INTO `bangdg`(`mdg`, `Title`, `thangdiem`) 
      VALUES ('$id','$ten','$diem')";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function inserttc($id,$ten,$diem)
    {
      $query="INSERT INTO `tieuchi`(`mdg`, `chitiet`, `diem`) 
      VALUES ('$id','$ten','$diem')";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function deletend($id)
    {
      $query="DELETE FROM `bangdg` WHERE mdg='$id'";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function deletetc($id)
    {
      $query="DELETE FROM `tieuchi` WHERE mdg='$id'";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function deletetc1($id)
    {
      $query="DELETE FROM `tieuchi` WHERE id='$id'";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function updateKh($id,$ten)
    {
      $query="UPDATE `makhoc` SET 
      `tenKhoc`='$ten' WHERE makhoc='$id'";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function updateN($id,$ten)
    {
      $query="UPDATE `ctnam` SET 
      `tennam`='$ten' WHERE man='$id'";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function updateHK($id,$ten)
    {
      $query="UPDATE `cthk` SET `hk`='$ten' WHERE id='$id'";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function updateLop($id,$ten)
    {
      $query="UPDATE `lop` SET `TenLop`='$ten' WHERE Malop='$id'";
      $db = new connect();
      $stm=$db->exec($query);
    }
    public function updatesiso($so,$lop)
    {
      $query="UPDATE `lop` SET  `SiSo`='[value-3]'' WHERE Malop='$lop'";
      $db = new connect();
      $stm=$db->exec($query);
    }
   }
?>