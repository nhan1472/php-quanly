<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h2>Các Lớp Giáo vien Quản Lý</h2>
            <h3>chọn lơp
            <form action="index.php?action=home&act=lop" method="post">
            <select name="idlop" id="">
            <option value="">Chọn Lớp</option>
                <?php
             $db = new gv();
             $rel = $db->selectlop($_SESSION['mgv']);
             while($set=$rel->fetch()):
          ?> 
                    <option value="<?php echo $set[0]; ?>"><?php echo $set[0]; ?></option>
               
            <?php
             endwhile;
             $lop = isset($_SESSION['lopid'])?$_SESSION['lopid']:'';
        ?>
       
        </form>
        <input type="submit" class=" btn btn-info" value="chọn">
         </select></h3>
            <h3>Danh Sách Sinh Viên Trong Lớp
            <select name="namhoc" onchange="location = this.value;">
                    <option >Chọn năm</option>
                        <?php
                        $db1 =new user();
                        $rel2=$db1->selectNam1($lop);
                        while($set1=$rel2->fetch()):?>
                        <option value="index.php?action=home&act=thongtin1&tt=tt&namhk=<?php echo $set1[0]?>">
                        <?php echo $set1[0]?>
                      </option>
                        <?php endwhile;?>
                    </select>
                        Học kỳ
                    <select name="hocky" onchange="location = this.value;">
                    <option >Chọn HK</option>
                        <?php
                        $nam=isset($_GET['namhk'])?$_GET['namhk']:'';
                        $rel3=$db1->selecthk1( $lop, $nam);
                        while($set=$rel3->fetch()):?>
                        <option value="index.php?action=home&act=thongtin1&tt=tt&namhk=<?php echo $nam?>&hk=<?php echo $set[0]?>"><?php echo $set[0];?></option>
                        <?php endwhile;?>
                    </select>
            </h3>
            
            <table>
            <tr>
                <th>MSSV</th>
                <th>Tên</th>
                <th>LỚP</th>
                <th>Email</th>
                <th>Điểm SV</th>
                <th>Điểm GV</th>
                <th>Nhận Xét</th>
            </tr>
            <h1>
            <?php
             $db = new gv();
          
             $rel1 = $db->selectgv( $lop);
             $db1 = new user();
             while($set1=$rel1->fetch()):
          ?> 
          <tr>
          <td><?php echo $set1[1] ?></td>
          <td><?php 
            $rel2=$db1->selctKq($set1[1]);
            $md=$rel2['md'];
            $mnd=$rel2['mnd'];
            $hk=isset($_GET['hk'])?$_GET['hk']:'';
            $nam=isset($_GET['namhk'])?$_GET['namhk']:'';
            $diem = $db1->selectdiem($md,$hk,$nam);
            if($diem==null||$diem=='')
            {
                $diem="chưa đánh giá";
            }
           echo $set1[2] ?></td>
          <td><?php echo $set1[5] ?></td>
          <td><?php echo $set1[6] ?></td>
          <td><?php echo $diem[3]?></td>
          <td><?php if($diem[4]>0) :
            echo $diem[4];?>  
          <?php
          elseif($diem[3]>0):   
          ?>
           <a href="index.php?action=home&act=chodiem&mssv=<?php echo $set1[1]?>&hk=<?php echo $hk?>"><input type="button" value="cho điêm" class="btn btn-primary">
          <?php
          else:
            ?>
             SV Chưa đánh giá
            <?php
          endif;
          ?></td></a>
          <td><?php echo $diem[9]?></td>
          </tr>
          <?php endwhile;?>
          </h1>
            <tr>
            <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
            <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
            <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
            <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
            <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
            <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
            </tr>
            </table>
        </div>
    </div>
</div>