<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h2 style="float:right;"><a href="index.php?action=home&act=qlsinhvien">Quay Lại</a></h2>
        <?php
        $err1='';
        $err2='';
        $err3='';
        $err4='';
        $err5='';
        $err6='';
        $err7='';
        $mssv='';
        $ten='';
        $ngaysinh='';
        $noisinh='';
        $email='';
        $md='';
        $mnd='';
            if(isset($_POST['submit']))
            {

                $mssv=$_POST['mssv'];
                $ten=$_POST['ten'];
                $ngaysinh=$_POST['ns'];
                $noisinh=$_POST['ns1'];
                $lop=$_POST['lop'];
                $email=$_POST['email'];
                $md=$_POST['md'];
                $mnd=$_POST['mnd'];
                // echo $mssv.'<br>';
                // echo $ten.'<br>';
                // echo $ngaysinh.'<br>';
                // echo $noisinh.'<br>';
                // echo $lop.'<br>';
                // echo $email.'<br>';
                // echo $md.'<br>';
                // echo $mnd.'<br>';
                if(empty($mssv))
                {
                    $err1='khôn được bỏ tróng ';
                }
                else if(preg_match('/[^\d]$/',$mssv))
                {
                    $err1='mssv là sô';
                }
                else if(!preg_match('/^\d{9,12}$/',$mssv))
                {
                    $err1='mssv là dãy số từ 9-12 số';
                }
                if(empty($ten))
                {
                    $err2='khôn được bỏ tróng ';
                }
                else if(preg_match('/[^a-z-A-Z]$/',$ten)){
                    
                    $err2="name là ký tự";
                    
                }
                if(empty($ngaysinh))
                {
                    $err3='khôn được bỏ tróng';
                }
                if(empty($noisinh))
                {
                    $err4='khôn được bỏ tróng';
                }
                if(empty($email))
                {
                    $err5='khôn được bỏ tróng';
                }
                else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
                {
                    $err5="email khong dung dinh dang";
                }
                if(empty($md))
                {
                    $err6='khôn được bỏ tróng';
                }
                else if((!preg_match('/^d\d{1,2}$/',$md)))
                {
                    $err6='bắt đàu d và số vd d1';
                }
                if(empty($mnd))
                {
                    $err7='khôn được bỏ tróng';
                }
                else if((!preg_match('/^nd\d{1,2}$/',$mnd)))
                {
                    $err7='bắt đàu nd và số vd nd1';
                }
                if($err1==''&&$err2==''&&$err3==''&&$err4==''&&$err5==''&&$err6==''&&$err7=='')
                {
                $db = new admin();
                $errr=0;
                $rel=$db->selectten($mssv);
                $rel1=$db->selectmd($md);
                $rel2=$db->selectmnd($mnd);
                if(!$rel)
                {
                    $errr=1;
                }else
                {
                    echo '<script>alert("MÃ số đã tồn tại ");</script>';
                     $errr=0;
                }
                if(!$rel1)
                {
                    $errr=1;
                }else
                {
                    echo '<script>alert("MÃ điẻm đã ");</script>';
                    $errr=0;
                }
                if(!$rel2)
                {
                    $errr=1;
                }else
                {
                    echo '<script>alert("MÃ nộ dung dã tồn tại ");</script>';
                    $errr=0;
                }
                if($errr==1)
                {
                    $db = new admin();
                    $db->insertND($mssv,$md,$mnd);
                    $db->insertSV($mssv,$ten,$ngaysinh,$noisinh,$lop,$email);
                    $db->insertTK($mssv);
                    $siso=$db->selectsiso($lop);
                    $db->updatesiso($siso[0],$lop);
                    echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=qlsinhvien">';
                }
            }
            }
        ?>
            <center>
                <h2>Form Them Sinh Viên</h2>
                <form action="index.php?action=home&act=themsv" method="post">
                    <table id="tabletk">
                        <tr>
                            <td>MSSV:</td>
                            <td><input type="text" name="mssv" value="<?php echo $mssv?>"></td>
                            <td><span style='color:red;'><?php echo $err1 ?></span></td>
                        </tr>
                        <tr>
                            <td>Tên:</td>
                            <td><input type="text" name="ten" value="<?php echo $ten?>"></td>
                            <td><span style='color:red;' ><?php echo $err2 ?></span></td>
                        </tr>
                        <tr>
                            <td>Ngày Sinh</td>
                            <td><input type="text" name="ns" value="<?php echo $ngaysinh?>"></td>
                            <td><span style='color:red;'><?php echo $err3 ?></span></td>
                        </tr>
                        <tr>
                            <td>Nơi Sinh</td>
                            <td><input type="text" name="ns1"value="<?php echo $noisinh?>"></td>
                            <td><span style='color:red;'><?php echo $err4 ?></span></td>
                        </tr>
                        <tr>
                            <td>Lớp</td>
                            <td>
                                <select name="lop">
                                    <?php
                $db = new admin();
                $rel=$db->selectlop();
                while($set=$rel->fetch()):
                ?>
                                    <option value="<?php echo$set[0] ?>"><?php echo $set[0]?></option>
                                    <?php
                endwhile;
                ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>email</td>
                            <td><input type="email" name="email" value="<?php echo $email?>"></td>
                            <td><span style='color:red;'><?php echo $err5 ?></span></td>
                        </tr>
                        <tr>
                            <td>mã điểm</td>
                            <td><input type="text" name="md"value="<?php echo $md?>"></td>
                            <td><span style='color:red;'><?php echo $err6 ?></span></td>
                        </tr>
                        <tr>
                            <td>mã nội dung</td>
                            <td><input type="text" name="mnd" value="<?php echo $mnd?>"></td>
                            <td><span style='color:red;'><?php echo $err7  ?></span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button name='submit' class="btn btn-success">Thêm Sinh Viên</button></td>
                        </tr>
                    </table>
            </center>
            </form>
        </div>
    </div>
</div>