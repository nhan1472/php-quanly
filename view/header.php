<header style="background:red;">
    <img src="img/banner.jpg" style="border-radius: 45px;" alt="" height="110px">
    <h2 style="display: inline-block;color:#fff;margin:0 300px">Trường Đại Học XXX<br>Địa Chỉ: XXX XXX XXX</h2>
    <div id="menu">
        <ul>
    <?php
    // menu gv
            if(isset($_SESSION['tengv'])):
                $m = new menu();
               $rel1 = $m->selectMenu1();
               while($set1=$rel1->fetch()):?>
            <li class="<?php echo $set1[3]?>"><a href="<?php echo $set1[2]?>"><?php echo $set1[1];?></a>
            <div class="dropdown-content" style="color:red;"> Tên : <?php echo $_SESSION['tengv'];?><br>
            <?php
            $m = new menu();
            $rel2 = $m->selectMenucon();
            while($set2=$rel2->fetch()):?>
                    <a href="<?php echo $set2[3]?>" style="color:black"><?php echo $set2[2]?></a>
            <?php
            endwhile;
            ?>
                </div>
            </li>
            <?php
          endwhile;
            ?>
              
            <!-- menusv -->
            <?php
    elseif(isset($_SESSION['mssv'])&&isset($_SESSION['ten'])):?>
            <?php
            $m = new menu();
            $rel3 = $m->selectMenu2();
            while($set3=$rel3->fetch()):?>
             <li class="<?php echo $set3[3]?>"><a href="<?php echo $set3[2]?>"><?php echo $set3[1];?></a>
             <div class="dropdown-content" style="color:red;"> Tên : <?php echo $_SESSION['ten'];?><br>
             <?php
             $m = new menu();
            $rel4 = $m->selectMenucon();
            while($set4=$rel4->fetch()):?>
                    <a href="<?php echo $set4[3]?>" style="color:black"><?php echo $set4[2]?></a>
            <?php
            endwhile;
            ?>
            </div>
             <?php
          endwhile;
            ?>




            <!-- menu admin -->
            <?php elseif(isset($_SESSION['admin'])):
             $m = new menu();
             $rel=$m->selectMenu3();
             while($set3=$rel->fetch()):?>
             <li class="<?php echo $set3[3]?>"><a href="<?php echo $set3[2]?>"><?php echo $set3[1];?></a>
             <div class="dropdown-content" style="color:red;"> Tên : <?php echo $_SESSION['admin'];?><br>
             <?php
             $m = new menu();
            $rel4 = $m->selectMenucon();
            while($set4=$rel4->fetch()):?>
                    <a href="<?php echo $set4[3]?>" style="color:black"><?php echo $set4[2]?></a>
            <?php
            endwhile;
            ?>
            </div>
             <?php
          endwhile;
            ?>






            <!-- menu mac dinh -->
            <?php else:
             $m = new menu();
          $rel=$m->selectMenu();
          while($set=$rel->fetch()):?>
            <li><a href="index.php?<?php echo $set[2]?>"><?php echo $set[1]; ?></a></li>
            <?php
          endwhile;
    endif;?>
        </ul>
    </div>
</header>