<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 style="text-align:center;color:red;">Danh Sách nộp Dung rèn luyện</h1>
            
            <?php
            if(isset($_GET['mdg2']))
            {
                $db =new admin();
                $db->deletend($_GET['mdg2']);
                $db->deletetc($_GET['mdg2']);
            }
            if(isset($_GET['mxoa']))
            {
                $db =new admin();
                $db->deletetc1($_GET['mxoa']);
            }
            if(!isset($_GET['mdg1'])&&!isset($_GET['msua'])):
            ?>
        
            

            <table>
            <?php if(!isset($_GET['mdg'])):?>
                <h2>Các Nội Dung<a href="index.php?action=home&act=formnd" style="float:right;">Thêm Nội Dung</a></h2>
                <tr>
                    <th>Tiêu ĐỀ</th>
                    <th>Thang Điểm</th>
                    <th></th>
                    <th></th>
                </tr>

                <?php
                
              $db = new admin();
              $rel=$db->selectTitledg();
              while($set=$rel->fetch()):
              ?>
                <tr>
                    <td><?php echo $set[1]?></td>
                    <td><?php echo $set[2]?></td>
                    <td><a href="index.php?action=home&act=admin&mdg=<?php echo $set[0]?>"><button
                                class="btn btn-secondary">xem chi tiết</button></a></td>
                    <td><a href="index.php?action=home&act=admin&mdg1=<?php echo $set[0]?>"><button
                                class="btn btn-warning">Sửa</button></td>
                    <td><a href="index.php?action=home&act=admin&mdg2=<?php echo $set[0]?>"><button
                     class="btn btn-info">Xóa</button></td>
                </tr>
                <?php
               
              endwhile;
               else: ?>
                <h3><a href="index.php?action=home&act=admin" style="float:right;">Quay lại</a></h3>
                <?php
                $db = new admin();
                $rel1=$db->selecttitle1($_GET['mdg']);
                ?><h3><?php echo $rel1[1]?> Điểm: <?php echo $rel1[2]?> </h3>
                <tr>
                <h2>Các Nội Dung<a href="index.php?action=home&act=formnd&tieuchi=<?php echo $_GET['mdg']?>" style="float:right;">Thêm Tiêu chí</a></h2>
                    <th></th>
                    <th>Tiêu ĐỀ</th>
                    <th>Thang Điểm</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                $db = new admin();
                $rel2=$db->selectTC($_GET['mdg']);
                while($set1=$rel2->fetch()):
                ?>
                <tr>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td><?php echo $set1[2]?></td>
                    <td><?php echo $set1[3]?></td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td><a
                            href="index.php?action=home&act=admin&mdg=<?php echo $_GET['mdg']?>&msua=<?php echo $set1[0] ?>">
                            <button class="btn btn-warning">Sửa</button></a></td>
                        <td><a href="index.php?action=home&act=admin&mdg=<?php echo $_GET['mdg']?>&mxoa=<?php echo $set1[0] ?>"><button class="btn btn-danger">Xóa</button></a></td> 
                    <?php
                    if(isset($_GET['mxoa']))
                    ?> -->
                </tr>
                <?php
                endwhile;
                endif;
           
              ?>

            </table>
            <?php
            else:
            ?>
            <center>
                <h3>Form sửa<a href="index.php?action=home&act=admin" style="float:right;">Quay lại</a></h3>
                
                    <table id="tabletk">
                        <?php
                $db = new admin();
                if(!isset($_GET['msua'])):
                $rel3=$db->selectTC1($_GET['mdg1']);
                ?>
                <form action="index.php?acton=home&act=suamdg" method="post">
                        <tr>
                            <td>mdg:</td>
                            <td><input type="text" disabled value="<?php echo $rel3[0]?>">
                                <input name="mdg" type="hidden" value="<?php echo $rel3[0]?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td><input type="text" name="title" value="<?php echo $rel3[1]?>"></td>
                        </tr>
                        <tr>
                            <td>Điểm</td>
                            <td><input type="number" name="diem" min=0 value="<?php echo $rel3[2]?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="btn btn-success">Sữa</button></td>
                        </tr></table>
                        <?php
                else:
                    $rel3=$db->selectTC2($_GET['msua'],$_GET['mdg']);
                ?>
                <form action="index.php?acton=home&act=suatc" method="post">
                        <tr>
                            <td>id:</td>
                            <td><input type="text" disabled value="<?php echo $rel3[0]?>">
                                <input name="id" type="hidden" value="<?php echo $rel3[0]?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td><input type="text" name="title" value="<?php echo $rel3[2]?>"></td>
                        </tr>
                        <tr>
                            <td>Điểm</td>
                            <td><input type="number" name="diem" min=0 value="<?php echo $rel3[3]?>"></td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td><button class="btn btn-success">Sữa</button></td>
                        </tr></table>
                <?php
                endif;
                ?>
                </form>
            </center>
            <?php
            endif;
            ?>

        </div>
    </div>
</div>