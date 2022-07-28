<div class="container">
    <div class="row">
        <div id="tintuc" class="col-md-12">
            <h1 id="tintuc-header">
                <center>Các Thông Báo Mới Nhất </center>
            </h1>

            <ul>
                <?php
    $tt = new News();             
    $limit =9;
    $start=isset($_GET['page'])?$_GET['page']:1;
    // số lươnh bài viết
    $sl=$tt->countid();
    // số trang hiển thị
    $count_pace=ceil($sl[0]/$limit);
    if(isset($_GET['page']))
    {
    $rel=$tt->selectNewsall($_GET['page'],$limit);
    }
    echo '<h2 id="trang"style="color: #006e00;">TRANG : '.$start.'</h2><div class="row"> ';
    while($set=$rel->fetch()):
    ?>
                <div class="col-md-4" style="margin: 0 0 40px  0;">
                    <div class="card" style="">
                        <img src="img/<?php echo $set[4] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="index.php?action=home&act=newone&id= <?php  echo $set['id'];?>&loai=<?php  echo $set['loai'];?>">
                                <h6><?php echo $set[1] ?></h6>
                            </a>
                        </div>
                        <h5 class="card-text" style="color:red;"><?php echo $set[3] ?></h5>
                    </div>
                </div>
                <?php
    endwhile;

    ?>
        </div>
        <br>

        <ul class="pagination ">

            <?php
                if($_GET['page']>1&&$count_pace>1) 
                {?>
            <li class="btn btn-danger"><a
                    href="index.php?action=home&act=news&page=<?php echo ($_GET['page']-1);?>">Lui</a></li>
            <?php
                }
                for($i=1;$i<=$count_pace;$i++):?>
            <li class="btn btn-danger"><a href="index.php?action=home&act=news&page=<?php echo $i?>"><?php echo $i?></a>
            </li>
            <?php endfor; 
                if($_GET['page']<$count_pace) 
                {?>
            <li class="btn btn-danger"><a
                    href="index.php?action=home&act=news&page=<?php echo ($_GET['page']+1);?>">Tiến</a></li>
            <?php
                 }
                ?>
        </ul>
    </div>
</div>
</div>