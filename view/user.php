<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
            
                <h1>Đánh Giá Điểm Rèn Luyện
            
                <?php
                if(!isset($_GET['mssv'])){
                $db1 =new user();
                $rel2=$db1->selectNam($_SESSION['mssv']);
                ?>
                <form action="index.php?action=home&act=diem" method="post">
                    <select name="hk">
                        <?php
                        $rel3=$db1->selecthk($_SESSION['mssv'],'2020-2021');
                        while($set=$rel3->fetch()):?>
                        <option value="<?php echo $set[0];?>"><?php echo $set[0];?></option>
                        <?php endwhile;?>
                    </select>
                    Năm
                    <select name="nam">
                    <?php while($set1=$rel2->fetch()):?>
                        <option value="<?php echo $set1[0];?>"><?php echo $set1[0];?></option>
                        <?php endwhile;?>
                    </select>
                
                </h1>
                
                <?php
                }else{
                    $db3 = new user();
                    $rel3=$db3->selctKq($_GET['mssv']);
                    $md=$rel3['md'];
                    $mnd=$rel3['mnd'];
                   
                    ?>
                     <form action="index.php?action=home&act=chodiem1" method="post">
                    <a href="index.php?action=home&act=thongtin1&tt=tt" >Quay lại</a>

                    <?php
                    }
                ?>
                <h5>
                <table class="tableuser">
                        <tr>
                            <th>Nội Dung Đánh Giá </th>
                            <th>Điểm tối đa </th>
                            <th>Sinh Viên Tự Đánh Giá</th>
                            <th>Giáo Viên Đánh Giá</th>
                        </tr>
                        <?php
                 $db = new chitietdg();
                 $rel1=$db->selectDg();
                 $i=1;
                 $j=1;
                 while($set=$rel1->fetch()):
                ?>
                        <tr>
                            <td><b><?php echo $set['Title'];?></b></td>
                            <td><b><?php echo $set['thangdiem'];?></b></td>
                            
                            <td></td>
                            <td></td>
                        </tr>

                        <?php $rel=$db->selectCt($set['mdg']);
                 while($set1=$rel->fetch()):
                ?>
                        
                        <tr>
                            <td><?php echo $set1[1];?></td>
                            <td><?php echo $set1[2];?></td>
                            <input type="hidden" name="idtc<?php echo $i?>" value="<?php echo $set1[0];?>">
                            <input type="hidden" name="thd<?php echo $i ?>" value="<?php echo $set1[2];?>">
                            <?php                           
                            if(!isset($_GET['mssv'])){
                            ?>
                            <td><input type="number"  id="diem<?php echo $i;?>" name="diem<?php echo $i;?>" min=0 max=<?php echo $set1[2];?> value="0" onclick="ttien()"id=""></td>
                            <td><input type="number" min=0 disabled  value=0></td>
                            <?php
                            }else{
                            ?>
                                <td><input type="number"  disabled  value=<?php
                                $dnd=$db3->selectnd($mnd,$set1[0],$_GET['hk']);
                                echo $dnd[3];
                                ?>></td>
                                <input type="hidden" name="hk" value="<?php echo $_GET['hk']?>">
                                <input type="hidden" name="mnd" value="<?php echo $mnd?>">
                                <input type="hidden" name="md" value="<?php echo $md?>">
                                <td><input type="number"  id="diem<?php echo $i;?>" name="diem<?php echo $i;?>" min=0 max=<?php echo $set1[2];?> value="0" onclick="ttien()"id=""></td>
                                <?php
                            }
                            ?>
                        </tr>

                        <?php
                        $i++;
                 endwhile;
                ?>
                    
                        <?php
                endwhile;
                 ?>
                        <tr>
                            <td>          <?php
                            if(isset($_GET['mssv'])):
                            ?>
                            Đánh giá của GV: <br>
                            <textarea name="nhanxet" id="" cols="40" rows="3"></textarea>
                            <?php
                            endif;
                            ?></td>
                            <td></td>
                            <td>Tổng Điểm:  <input type="number" name="tongdiem"  value=0  min=0 onclick="ttien()"  max=100 id="tongdiem"><br>
                            Xếp Loại:<input type="text" name="xeploai" value=""   id="xeploai"> </input> </td>
                            <!-- <td>Xếp loại: </td> -->
                            <td>

                                <input class="btn btn-danger" name="submit" type="submit" value="Đánh Giá">

                            </td>
                        </tr>
                    </form>
                </table>
                </h5>
            </center>
        </div>
    </div>
</div>