<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2><a href="index.php?action=home&act=qlnamhoc">Lớp</a>
                <a href="index.php?action=home&act=qlnamhoc&khoahoc">Khóa Học</a>
                <a href="index.php?action=home&act=qlnamhoc&khao">Khoa</a>
                <a href="index.php?action=home&act=qlnamhoc&giaovien">Giáo Viên</a>
            </h2>
            <?php
            if(!isset($_GET['giaovien'])):
            if(!isset($_GET['khao'])):
            if(!isset($_GET['khoahoc'])):
            ?>
            <!-- lơp học -->
            <h1 style="text-align:center;color:red;">Danh Sách Lớp Học</h1>
            <?php
            if(!isset($_GET['sua'])):
            if(!isset($_GET['them'])):
            ?>
            <h2 style="float:right;"><a href="index.php?action=home&act=qlnamhoc&them">Thêm Lớp</a></h2>
            <table>
                <tr>
                    <th>Ma Lop:</th>
                    <th>Tên Lớp</th>
                    <th>SiSo</th>
                    <th>Ma Khao</th>
                    <th>Ma khóa học</th>
                    <th>MGV</th>
                    <th></th>
                </tr>
                <?php
                $db = new admin();
                $rel=$db->selectlop();
                while($set=$rel->fetch()):
                ?>
                <tr>
                    <td><?php echo $set[0]?></td>
                    <td><?php echo $set[1]?></td>
                    <td><?php echo $set[2]?></td>
                    <td><?php echo $set[3]?></td>
                    <td><?php echo $set[4]?></td>
                    <td><?php echo $set[5]?></td>
                    <td><a href="index.php?action=home&act=qlnamhoc&sua=<?php echo $set[0]?>"><button
                                class="btn btn-warning">Sữa</button></a></td>
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
            <!-- endlopw -->
            <!-- form lơp -->
            <?php
            else:
            ?>
            <center>
                <h2 style="float:right;"><a href="index.php?action=home&act=qlnamhoc">Quay Lại</a></h2>
                <form action="index.php?action=home&act=fromlop" method="post">
                <table id="tabletk">
                    <tr>
                        <td>Ma Lớp:</td>
                        <td><input type="text" name="malop"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Tên Lớp</td>
                        <td><input type="text" name="ten"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Ma khoa</td>
                        <td><select name="makhoa">
                                <?php
                        $db = new admin();
                        $rel=$db->selectmakhoa();
                        while($set=$rel->fetch()):
                        ?>
                                <option value="<?php echo$set[0] ?>"><?php echo $set[0]?>
                                </option>
                                <?php
                        endwhile;
                        ?>
                            </select></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>ma khoa hoc</td>
                        <td><select name="khoahoc">
                                <?php
                        $db = new admin();
                        $rel=$db->selectmakhoahoc();
                        while($set=$rel->fetch()):
                        ?>
                                <option value="<?php echo$set[0] ?>"><?php echo $set[0]?>
                                </option>
                                <?php
                        endwhile;
                        ?>
                            </select></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>ma Gv</td>
                        <td><select name="gv">
                                <?php
                        $db = new admin();
                        $rel=$db->selectgv();
                        while($set=$rel->fetch()):
                        ?>
                                <option value="<?php echo$set[0] ?>"><?php echo $set[0]?>
                                </option>
                                <?php
                        endwhile;
                        ?>
                            </select></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="btn btn-success">Thêm</button></td>
                        <td></td>
                    </tr>
                </table>
                </form>
            </center>
            <!-- end formlop -->
            <?php
            endif;
             else:
            ?>
            <!-- form sua lop -->
            <center>
                <h2 style="float:right;"><a href="index.php?action=home&act=qlnamhoc">Quay Lại</a></h2>

                <table id="tabletk">
                    <?php
                 $db = new admin();
                 $rel=$db->selectlopid($_GET['sua']);
                ?>
                <form action="index.php?action=home&act=fromlopsua" method="post">
                    <tr>
                        <td>Malop</td>
                        <td><input type="text" disabled value="<?php echo $rel[0]?>"></td>
                        <input type="hidden" name="malop" value="<?php echo $rel[0]?>">
                    </tr>
                    <tr>
                        <td>Ten Lơp</td>
                        <td><input type="text" name="ten" value="<?php echo $rel[1]?>"></td>
                    </tr>
                    <tr>
                        <td>SiSo</td>
                        <td><input type="text" disabled value="<?php echo $rel[2]?>"></td>
                        <input type="hidden" name="siso" value="<?php echo $rel[2]?>">
                    </tr>
                    <tr>
                        <td>MA khoa</td>
                        <td><input type="text" disabled value="<?php echo $rel[3]?>"></td>
                        <input type="hidden" name="khoa" value="<?php echo $rel[3]?>">
                    </tr>
                    <tr>
                        <td>Ma khoa hoc</td>
                        <td><input type="text" disabled value="<?php echo $rel[4]?>"></td>
                        <input type="hidden" name="khoahoc" value="<?php echo $rel[4]?>">
                    </tr>
                    <tr>
                        <td>Mgv</td>
                        <td><input type="text" disabled value="<?php echo $rel[5]?>"></td>
                        <input type="hidden" name="mgv" value="<?php echo $rel[5]?>">
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="btn btn-success">Sửa</button></td>
                        <td></td>
                    </tr>
                    </form>
                </table>
            </center>
            <!-- end form sua lop -->
            <?php
        endif;
            else:
            ?>
            <!-- khoahoc -->
            <h1 style="text-align:center;color:red;">Danh Sách Khóa Học</h1>
            <?php
            if(!isset($_GET['xem'])):
            if(!isset($_GET['sua1'])):
            if(!isset($_GET['them1'])):
            ?>
            <h2 style="float:right;"><a href="index.php?action=home&act=qlnamhoc&khoahoc&them1">Thêm khoa học</a></h2>

            <table>
                <tr>
                    <th>ma khóa học</th>
                    <th>Tên khóa học</th>
                    <th>bậc Đào tạo</th>
                    <th>mnh</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                    $db = new admin();
                    $rel=$db->selectmakhoahoc();
                    while($set=$rel->fetch()):
                    ?>
                <tr>
                    <td><?php echo $set[0]?></td>
                    <td><?php echo $set[1]?></td>
                    <td><?php echo $set[2]?></td>
                    <td><?php echo $set[3]?></td>
                    <td><a href="index.php?action=home&act=qlnamhoc&khoahoc&xem=<?php echo $set[3]?>">
                            <button class="btn btn-secondary">Xem chi tiêt</button></a></td>
                    <td><a href="index.php?action=home&act=qlnamhoc&khoahoc&sua1=<?php echo $set[0]?>">
                            <button class="btn btn-warning">Sữa</button></a></td>
                </tr>
                <?php
                    endwhile;
                    ?>
                <tr>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                </tr>
            </table>
            <!-- end khoahoc -->
            <!-- formkhoahoc -->
            <?php
            else:
            ?>
            <center>
                <h2 style="float:right;"><a href="index.php?action=home&act=qlnamhoc&khoahoc">Quay Lại</a></h2>
                <table id="tabletk">
                    <form action="index.php?action=home&act=formkhoahoc" method="post">
                        <tr>
                            <td>ma khoa hoc:</td>
                            <td><input type="text" name="makhoa"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Tên khoa học</td>
                            <td><input type="text" name="ten"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Ma năm học</td>
                            <td><input type="text" name="manh"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="btn btn-success">Thêm </button></td>
                            <td></td>
                        </tr>
                    </form>
                </table>
                <!-- end form khoahoc -->
                <?php
            endif;
        else:
            ?>
                <!-- form sua -->
                <h2 style="float:right;"><a href="index.php?action=home&act=qlnamhoc&khoahoc">Quay Lại</a></h2>

                <table id="tabletk">
                    <?php
     $db = new admin();
     $rel=$db->selectkhoahocid($_GET['sua1']);
    ?>
    <form action="index.php?action=home&act=formsaukhoahoc" method="post">
                    <tr>
                        <td>makhoa hoc</td>
                        <td><input type="text" disabled value="<?php echo $rel[0]?>"></td>
                        <input type="hidden" name="makhoahoc" value="<?php echo $rel[0]?>">
                    </tr>
                    <tr>
                        <td>Ten khoa hoc</td>
                        <td><input type="text" name="ten" value="<?php echo $rel[1]?>"></td>
                    </tr>
                    <tr>
                        <td>bật đào tạo</td>
                        <td><input type="text" disabled value="<?php echo $rel[2]?>"></td>
                        <input type="hidden" name="bac" value="<?php echo $rel[2]?>">
                    </tr>
                    <tr>
                        <td>mnh</td>
                        <td><input type="text" disabled value="<?php echo $rel[3]?>"></td>
                        <input type="hidden" name="mnh" value="<?php echo $rel[3]?>">
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="btn btn-success">Sửa</button></td>
                        <td></td>
                    </tr>
                    </form>
                </table>
            </center>
            <!-- ena from sua -->
            <?php
            endif;
        else:
            ?>
            <!-- form xem nam hoc -->
            <?php
            if(!isset($_GET['them10'])):
            if(!isset($_GET['xem10'])):
            if(!isset($_GET['sua10'])):
            ?>
            <h2> xem Năm</h2>
            <h2 style="float:right;">
            <a href="index.php?action=home&act=qlnamhoc&khoahoc">Quay Lại</a></h2>
            <table>
                <tr>
                    <th>ma ct nam</th>
                    <th>ma năm học</th>
                    <th>tên năm học</th>
                    <th>mã học kỳ</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                    $db = new admin();
                    $rel=$db->selectnam();
                    while($set=$rel->fetch()):
                    ?>
                <tr>
                    <td><?php echo $set[0]?></td>
                    <td><?php echo $set[1]?></td>
                    <td><?php echo $set[2]?></td>
                    <td><?php echo $set[3]?></td>
                    <td><a href="index.php?action=home&act=qlnamhoc&khoahoc&xem=<?php echo $set[1]?>&xem10=<?php echo $set[3]?>">
                            <button class="btn btn-secondary">Xem Chi Tiết</button></a></td>
                    <td><a href="index.php?action=home&act=qlnamhoc&khoahoc&xem=<?php echo $set[1]?>&sua10=<?php echo $set[0]?>">
                            <button class="btn btn-warning">Sữa</button></a></td>
                            <td><a href="index.php?action=home&act=qlnamhoc&khoahoc&xem=<?php echo $_GET['xem']?>&them10&man=<?php echo $set[1]?>">
                            <button class="btn btn-info">Thêm năm</button></a></td>
                    <?php
                    endwhile;
                    ?>
                <tr>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                </tr>
            </table>
            <!-- end form xem nam hoc -->
            <?php
            else:?>
            <!-- xem form sua nam hoc -->
            <h2 style="float:right;"><a
                    href="index.php?action=home&act=qlnamhoc&khoahoc&xem=<?php echo $_GET['xem']?>">Quay Lại</a></h2>

            <table id="tabletk">
                <?php
                $db = new admin();
                 $rel=$db->selectnamcid($_GET['sua10']);
                ?>
                <form action="index.php?action=home&act=fromsaunam" method="post">
                <tr>
                    <td>ma ct nam</td>
                    <td><input type="text" disabled value="<?php echo $rel[0]?>"></td>
                    <input type="hidden" name="mactn" value="<?php echo $rel[0]?>">
                </tr>
                <tr>
                    <td>ma năm</td>
                    <td><input type="text" disabled value="<?php echo $rel[1]?>"></td>
                    <input type="hidden" name="man" value="<?php echo $rel[0]?>">
                </tr>
                <tr>
                    <td>tên năm </td>
                    <td><input type="text" name="ten" value="<?php echo $rel[2]?>"></td>
                </tr>
                <tr>
                    <td>hk</td>
                    <td><input type="text" disabled value="<?php echo $rel[3]?>"></td>
                    <input type="hidden" name="mhk" value="<?php echo $rel[3]?>">
                </tr>
                <tr>
                    <td></td>
                    <td><button class="btn btn-success">Sửa</button></td>
                    <td></td>
                </tr>
                </form>
            </table>
            </center>
            <!-- end sua nam hoc -->
            <?php
            endif;
        else:
            ?>
            <!-- xedm hk -->
            <?php if(!isset($_GET['them20'])):
            if(!isset($_GET['sua20'])):?>
            <h2> xem HK</h2>
            <h2 style="float:right;"><a href="index.php?action=home&act=qlnamhoc&khoahoc&xem=<?php echo $_GET['xem']?>">Quay Lại</a></h2>
            <table>
                <tr>
                    <th>ma hk</th>
                    <th>ten hk</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                    $db = new admin();
                    $rel=$db->selecthk();
                    while($set=$rel->fetch()):
                    ?>
                <tr>
                    <td><?php echo $set[1]?></td>
                    <td><?php echo $set[2]?></td>
                    <td><a href="index.php?action=home&act=qlnamhoc&khoahoc&xem=<?php echo $_GET['xem']?>&xem10=<?php echo $_GET['xem10']?>&sua20=<?php echo $set[0]?>">
                            <button class="btn btn-warning">Sữa</button></a></td>
                            <td><a href="index.php?action=home&act=qlnamhoc&khoahoc&xem=<?php echo $_GET['xem']?>&xem10=<?php echo $_GET['xem10']?>&them20=<?php echo $set[1]?>">
                            <button class="btn btn-info">Thêm hk</button></a></td>
                    <?php
                    endwhile;
                    ?>
                <tr>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                </tr>
            </table>
            <!-- end xem hk -->
            <?php
            else:
                ?>
                <!-- sua hk -->
                <h2 style="float:right;"><a
                    href="index.php?action=home&act=qlnamhoc&khoahoc&xem=<?php echo $_GET['xem']?>&xem10=<?php echo $_GET['xem10']?>">Quay Lại</a></h2>

            <table id="tabletk">
                <?php
                $db = new admin();
                 $rel=$db->selecthkcid($_GET['sua20']);
                ?>
                <form action="index.php?action=home&act=formsuahk" method="post">
                <tr>
                    <td></td>
                    <input type="hidden" name="id" value="<?php echo $rel[0]?>">
                </tr>
                <tr>
                    <td>mahk</td>
                    <td><input type="text" disabled value="<?php echo $rel[1]?>"></td>
                    <input type="hidden" name="mahk" value="<?php echo $rel[0]?>">
                </tr>
                <tr>
                    <td>tên hk </td>
                    <td><input type="text" name="ten" value="<?php echo $rel[2]?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button class="btn btn-success">Sửa</button></td>
                    <td></td>
                </tr>
                </form>
            </table>
            </center>
                <!-- end sua hk -->
                <?php
            endif;
            else:?>
                <h2>Thêm hk</h2>
                <h2 style="float:right;"><a
                    href="index.php?action=home&act=qlnamhoc&khoahoc&xem=<?php echo $_GET['xem']?>&xem10=<?php echo $_GET['xem10']?>>">Quay Lại</a></h2>
                    <table id="tabletk" >
                        <form action="index.php?action=home&act=formhk" method="post">
                        <tr>
                            <td>Tên hk</td>
                            <td><input type="text" name="ten"></td>
                            <input type="hidden" name="mahk" value="<?php echo $_GET['them20']?>">
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="btn btn-warning ">Thêm</button></td>
                        </tr>
                        </form>
                    </table>
            <?php
            endif;
            endif;
            else:
            ?>
            <!-- form them nam -->
            <center>
            <h2 style="float:right;"><a href="index.php?action=home&act=qlnamhoc&khoahoc&xem=<?php echo $_GET['xem']?>">Quay Lại</a></h2>
                
                <table id="tabletk">
                    <form action="index.php?action=home&act=formnam" method="post">
                        <tr>
                            <td>ma CTnam:</td>
                            <td><input type="text" name="mactn"></td>
                            <input type="hidden" name="man" value="<?php echo $_GET['man']?>">
                            <td></td>
                        </tr>
                        <tr>
                            <td>Tên năm</td>
                            <td><input type="text" name="ten"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Ma hk</td>
                            <td><input type="text" name="mahk"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="btn btn-success">Thêm </button></td>
                            <td></td>
                        </tr>
                    </form>
                </table>
        </center>
            <!-- end form them nam -->
            <?php
            endif;
            endif;
            endif;
             else:
            ?>
            <!-- khoa -->
            <h1 style="text-align:center;color:red;">Danh Sách Khoa</h1>
            <?php if(!isset($_GET['sua2'])):?>
            <?php if(!isset($_GET['them2'])):?>
            <h2 style="float:right;"><a href="index.php?action=home&act=qlnamhoc&khao&them2">Thêm khoa </a></h2>

            <table>
                <tr>
                    <th>ma khoa</th>
                    <th>Tên khoa</th>
                    <th></th>
                </tr>
                <?php
                    $db = new admin();
                    $rel=$db->selectmakhoa();
                    while($set=$rel->fetch()):
                    ?>
                <tr>
                    <td><?php echo $set[0]?></td>
                    <td><?php echo $set[1]?></td>
                    <td><a href="index.php?action=home&act=qlnamhoc&khao&sua2=<?php echo $set[0] ?>">
                            <button class="btn btn-warning">Sữa</button></a></td>

                </tr>
                <?php
                    endwhile;
                    ?>
                <tr>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                </tr>
            </table>
            <!-- endkhoa -->
            <!-- formkhoa -->
            <?php
            else:
            ?>
            <h2 style="float:right;"><a href="index.php?action=home&act=qlnamhoc&khao">Quay Lại</a></h2>
            <center>
                <table id="tabletk">
                    <form action="index.php?action=home&act=formkhoa" method="post">
                        <tr>
                            <td>ma khoa hoc:</td>
                            <td><input type="text" name="makhoa"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Tên khoa học</td>
                            <td><input type="text" name="ten"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="btn btn-success">Thêm </button></td>
                            <td></td>
                        </tr>
                    </form>
                </table>
            </center>
            <!-- endformkhoa -->
            <?php
            endif;
        else:?>
            <!-- form sua khoa -->
            <h2 style="float:right;"><a href="index.php?action=home&act=qlnamhoc&khoa">Quay Lại</a></h2>

            <table id="tabletk">
                <?php
     $db = new admin();
     $rel=$db->selectkhoaid($_GET['sua2']);
    ?>  
    <form action="index.php?action=home&act=formsuakhoa" method="post">
                <tr>
                    <td>makhoa </td>
                    <td><input type="text" disabled value="<?php echo $rel[0]?>"></td>
                    <input type="hidden" name="makhoa" value="<?php echo $rel[0]?>">
                </tr>
                <tr>
                    <td>Ten khoa </td>
                    <td><input type="text" name="ten" value="<?php echo $rel[1]?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button class="btn btn-success">Sửa</button></td>
                    <td></td>
                </tr>
                </form>
            </table>
            </center>
            <!-- end from sua khoa -->
            <?php
            endif;
            endif;
            else:
            ?>
            <!-- giavien -->
            <h1 style="text-align:center;color:red;">Danh Sách Giáo Viên</h1>
            <?php if(!isset($_GET['sua3'])):?>
            <?php if(!isset($_GET['them3'])):?>
            <h2 style="float:right;"><a href="index.php?action=home&act=qlnamhoc&giaovien&them3">Thêm Giao viên </a>
            </h2>
            <table>
                <tr>
                    <th>ma GV</th>
                    <th>Tên GV</th>
                    <th>email</th>
                    <th>makhoa</th>
                    <th></th>
                </tr>
                <?php
                    $db = new admin();
                    $rel=$db->selectgv();
                    while($set=$rel->fetch()):
                    ?>
                <tr>
                    <td><?php echo $set[0]?></td>
                    <td><?php echo $set[1]?></td>
                    <td><?php echo $set[2]?></td>
                    <td><?php echo $set[3]?></td>
                    <td><a href="index.php?action=home&act=qlnamhoc&giaovien&sua3=<?php echo $set[0]?>"><button
                                class="btn btn-warning">Sữa</button></a></td>

                </tr>
                <?php
                    endwhile;
                    ?>
                <tr>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                </tr>
            </table>
            <!-- end giao viên -->
            <!-- form gv -->
            <?php
                else:
                ?>
            <center>
                <table id="tabletk">
                    <form action="index.php?action=home&act=formGV" method="post">
                        <tr>
                            <td>maGV:</td>
                            <td><input type="text" name="magv"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Tên </td>
                            <td><input type="text" name="ten"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>email </td>
                            <td><input type="email" name="email"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>makhoa </td>
                            <td><select name="makhoa" id="">
                                    <?php
                                $db = new admin();
                                $rel=$db->selectmakhoa();
                                while($set=$rel->fetch()):
                                ?>
                                    <option value="<?php echo$set[0] ?>"><?php echo $set[0]?>
                                    </option>
                                    <?php
                        endwhile;
                        ?>
                                </select></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="btn btn-success">Thêm </button></td>
                            <td></td>
                        </tr>
                    </form>
                </table>
            </center>
            <!-- end form gv -->
            <?php
            endif;
            else:
            ?>
            <!-- form sau gv -->
            <center>
                <h2 style="float:right;"><a href="index.php?action=home&act=qlnamhoc&giaovien">Quay Lại</a></h2>

                <table id="tabletk">
                    <?php
     $db = new admin();
     $rel=$db->selectgvid($_GET['sua3']);
    ?>
                    <form action="index.php?action=home&act=fromsaugv" method="post">
                    <tr>
                        <td>maGV</td>
                        <td><input type="text" disabled value="<?php echo $rel[0]?>"></td>
                        <input type="hidden" name="magv" value="<?php echo $rel[0]?>">
                    </tr>
                    <tr>
                        <td>Ten GV</td>
                        <td><input type="text" name="ten" value="<?php echo $rel[1]?>"></td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td><input type="email" name="email" value="<?php echo $rel[2]?>"></td>
                    </tr>
                    <tr>
                        <td>makhoa</td>
                        <td><input type="text" disabled value="<?php echo $rel[3]?>"></td>
                        <input type="hidden" name="makhoa" value="<?php echo $rel[3]?>">
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="btn btn-success">Sửa</button></td>
                        <td></td>
                    </tr>
                    </form>
                </table>
            </center>
            <!-- end form sua -->
            <?php
            endif;
            endif;
            ?>
        </div>
    </div>
</div>