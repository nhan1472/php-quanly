<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
                <?php if(!isset($_GET['tt'])):?>
                <table id="tabletk">
                    <tr>
                        <form action="index.php?acitom=home&act=thongtin" method="post">
                            <td>Mã Số Sinh Viên :</td>
                            <td><input type="text" name="mssv" id="tìm kiêm"
                                    value="<?php if(isset($_POST['submit'])){echo $_POST['mssv'];}?>"></td>
                            <td><input type="submit" class="btn btn-success" name="submit" value="Xêm Thông Tin"></td>
                        </form>
                    </tr>
                </table>

                <?php
                $mssv='';
                endif;
                if(isset($_POST['submit'])||isset($_GET['tt']))
                {
                    $mssv=isset($_POST['submit'])?$_POST['mssv']:(isset($_GET['mssv'])?$_GET['mssv']:$_SESSION['mssv']);
                    $db= new user();
                    $rel = $db->selecttt($mssv);
                    if(!$rel )
                    {
                         echo '<script>alert("Mã Số Sinh Viên không tồn tại");</script>';                 
                    }
                ?>

                <table id="tablett" border=1>
                    <tr>
                        <th colspan="4">
                        <?php
                        if(isset($_POST['submit'])):

                        ?>
                         Tra Cứu Thông Tin
                        <?php
                        else:
                        ?>
                           Thông Tin Của Bạn
                           <?php
                           endif;
                           ?>
                        </th>
                    </tr>
                    <tr>
                        <td>MSSV:</td>
                        <td><?php echo $rel[0]; ?></td>
                        <td>Lớp Học:</td>
                        <td><?php echo $rel[4]; ?></td>
                    </tr>
                    <tr>
                        <td>Họ tên SV:</td>
                        <td><?php echo $rel[1]; ?></td>
                        <td>Ngày sinh:</td>
                        <td><?php $date = new DateTime($rel[2]); echo $date->format("d-m-Y") ?></td>
                    </tr>
                    <tr>
                        <td>Nơi sinh:</td>
                        <td><?php echo $rel[3]; ?></td>
                        <td>Bậc đào tạo:</td>
                        <td><?php echo $rel[6]; ?></td>
                    </tr>
                    <tr>
                        <td>Ngành đào tạo:</td>
                        <td><?php echo $rel[5];?></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                <?php 
                } 
                else
                    {?>
                <table id="tablett" border=1>
                    <tr>
                        <th colspan="4">
                            Tra Cứu Thông Tin
                        </th>
                    </tr>
                    <tr>
                        <td>Mã Số Sinh Viên :</td>
                        <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                        <td>Lớp Học:</td>
                        <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    </tr>
                    <tr>
                        <td>Họ tên SV:</td>
                        <td></td>
                        <td>Ngày sinh:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nơi sinh:</td>
                        <td></td>
                        <td>Bậc đào tạo:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Chuyên ngành:</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                <?php
                }
                
                ?>
                
                <?php
                    $db1 =new user();
                    $rel2=$db1->selectNam($mssv);?>
                <h2>chọn năm học
                <form action="index.php?action=home&act=diem1" method="post">
                    <select name="namhoc" onchange="location = this.value;">
                    <option >Chọn năm</option>
                        <?php
                    while($set1=$rel2->fetch()):?>
                        <option value="index.php?action=home&act=thongtin&tt=tt&namhk=<?php echo $set1[0]?>&mssv=<?php echo $mssv?>"><?php echo $set1[0]?></option>
                        <?php endwhile;?>
                    </select>
                        Học kỳ
                    <select     name="hocky" onchange="location = this.value;">
                    <option >Chọn HK</option>
                        <?php
                        $nam=isset($_GET['namhk'])?$_GET['namhk']:'';
                        $rel3=$db1->selecthk( $mssv, $nam);
                        while($set=$rel3->fetch()):?>
                        <option value="index.php?action=home&act=thongtin&tt=tt&namhk=<?php echo $_GET['namhk']?>&hk=<?php echo $set[0]?>&mssv=<?php echo $mssv?>"><?php echo $set[0];?></option>
                        <?php endwhile;?>
                    </select>
                    </form>

                </h2>

                <h1 style="color:red">Bảng Điểm</h1>
                <h3>
                <table border="1">
                    <tr>
                        <th>Điểm SV/GV</th>
                        <th>Xếp Loại</th>
                        <th>Ngày Đánh Giá</th>
                        <th>Năm học / Học Kỳ</th>
                        <th>Nhận Xét Của Giáo Viên</th>
                    </tr>
                    <?php                
                if(isset($_GET['namhk'])&&isset($_GET['hk'])):
                ?>  
                    <?php
                    $nam=isset($_GET['namhk'])?$_GET['namhk']:'';
                    $hk=isset($_GET['hk'])?$_GET['hk']:'';
                    $rel4 = $db1->selectktdiem( $mssv,$nam,$hk);
                    ?>
                    <tr>
                    <td><?php echo $rel4[4].'/'.$rel4[3]?></td>
                    <td><?php echo $rel4[6]?></td>
                    <td><?php echo $rel4[5]?></td>
                    <td><?php echo $nam.'/'.$hk?></td>
                    <td><?php echo $rel4[9]?></td>
                    </tr>
                    <?php
                    endif;
                    ?>
                    <tr>
                        <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                        <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                        <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                        <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    </tr>
                </table>
                </h3>
            </center>
        </div>
    </div>
</div>
