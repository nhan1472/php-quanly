<?php
        $tt = new News();
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
        }
        $rel=$tt->selectNewsone($id);
        ?>
<div class="container">
    <div class="row"  id="tintuc">
        <div class="col-md-6" style="border-right-style:solid;">
            <center>
                <h1 id="tintuc-header"><?php echo $rel[1]?></h1></center>
                <span><?php echo $rel[2]?></span>

        </div>
        <div  class="col-md-6">
        <h1 style="color:red;">Các tinh tức liên quan</h1>
        <table>
        <?php
    include "view/new.php";
    echo '</table>';
    ?>
        </div>
    </div>
</div>