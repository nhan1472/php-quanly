<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 style="text-align:center;color:red;">Danh Sách Sinh Viên</h1>
            <?php
            if(!isset($_GET['mssv'])):
            ?>
            <h2 style="float:right;"><a href="index.php?action=home&act=themsv">Thêm Sinh Viên</a></h2>

            <form action="index.php?action=home&act=qlsinhvien1" method="post">
                <input type="text" name="tim" placeholder="tìm theo mã số sinh viên"> <button
                    class="btn btn-primary">Tìm</button>
            </form>
            Lọc Sinh Viên theo lớp
            <select name="lop" onchange="location = this.value;">
                <option value="#">Chọn Lớp</option>
                <?php
                $db = new admin();
                $rel=$db->selectlop();
                while($set=$rel->fetch()):
                ?>
                <option value="index.php?action=home&act=qlsinhvien&lop=<?php echo$set[0] ?>"><?php echo $set[0]?>
                </option>
                <?php
                endwhile;
                ?>
            </select>
            <table>
                <tr>
                    <th>MSSV:</th>
                    <th>Tên:</th>
                    <th>Ngay Sinh</th>
                    <th>Nơi Sinh</th>
                    <th>Lớp</th>
                    <th>Email</th>
                    <th></th>
                </tr>

                <?php
                $db = new admin();
                if(isset($_GET['lop']))
                {
                    $rel=$db->selectSV1($_GET['lop']);
                }
                else if(isset($_GET['ms']))
                {
                    $rel=$db->selectSV2($_GET['ms']);
                }
                else
                {
                $rel=$db->selectSV();
                }
                while($set=$rel->fetch()):
                ?>

                <tr>
                    <h3>
                        <td><?php echo $set[1]?></td>
                        <td><?php echo $set[2]?></td>
                        <td><?php echo $set[3]?></td>
                        <td><?php echo $set[4]?></td>
                        <td><?php echo $set[5]?></td>
                        <td><?php echo $set[6]?></td>
                        <td><a href="index.php?action=home&act=qlsinhvien&mssv=<?php echo $set[1]?>"><button
                                    class="btn btn-warning">Sữa</button></a></td>
                    </h3>
                </tr>

                <?php
                endwhile;
                ?>

                <tr>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                </tr>
            </table> 
            <?php
        else:
            ?>
                        <h2 style="float:right;"><a href="index.php?action=home&act=qlsinhvien">Quay Lại</a></h2>
            <center>
                <h2>Form Sửa Sinh Viên</h2>
                <form action="index.php?action=home&act=suasv" method="post">
                    <table id="tabletk">
                        <?php
                        $db = new admin();
                        $set=$db->selectten($_GET['mssv']);
                        ?>
                        <tr>
                            <td>MSSV:</td>
                            <td><input type="text" disabled value="<?php echo $set[1]?>"></td>
                            <input type="hidden" name="mssv" value="<?php echo $set[1]?>">
                        </tr>
                        <tr>
                            <td>Tên:</td>
                            <td><input type="text" name="ten" value="<?php echo $set[2]?>"></td>
                        </tr>
                        <tr>
                            <td>Ngày Sinh</td>
                            <td><input type="text" name="ns" value="<?php echo $set[3]?>"></td>
                        </tr>
                        <tr>
                            <td>Nơi Sinh</td>
                            <td><input type="text" name="ns1" value="<?php echo $set[4]?>"></td>
                        </tr>
                        <tr>
                            <td>Lớp</td>
                            <td>
                                <input type="text" name='lop' value="<?php echo $set[5]?>">
                            </td>
                        </tr>
                        <tr>
                            <td>email</td>
                            <td><input type="email" name="email" value="<?php echo $set[6]?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="btn btn-success">Sửa</button></td>
                        </tr>
                    </table>
            </center>
            </form>
<?php
endif;
?>
        </div>
    </div>
</div>