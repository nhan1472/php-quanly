<div class="container">
    <div class="row">
        <div class="col-md-12">
        <?php
        if(!isset($_GET['tieuchi'])):
        ?>
        <h2 style="float:right;"><a href="index.php?action=home&act=admin">Quay lại</a></h2>
        <center>
        <h1>Thêm Nội Dung</h1>
        <form action="index.php?action=home&act=themnddg" method="post">
        <table id="tabletk">
        <tr>
            <td>MDG:</td>
            <td><input type="text" name="madg"></td>
        </tr>
        <tr>
            <td>Title</td>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <td>Điểm</td>
            <td><input type="number" name="diem" ></td>
        </tr>
        <tr>
            <td></td>
            <td><button class="btn btn-warning">Thêm</button></td>
        </tr>
        </form>
        </table>
        </center>
        <?php
        else:
        ?>
        <h2 style="float:right;"><a href="index.php?action=home&act=admin&mdg=<?php echo $_GET['tieuchi'] ?>">Quay lại</a></h2>

        <h1>Thêm tieu chi</h1>
        <form action="index.php?action=home&act=themtc" method="post">
        <table id="tabletk">
        <tr>
            <td>Title</td>
            <td><input type="text" name="title"></td>
            <input type="hidden" name="mdg" value="<?php echo $_GET['tieuchi'] ?>">
        </tr>
        <tr>
            <td>Điểm</td>
            <td><input type="number" name="diem" ></td>
        </tr>
        <tr>
            <td></td>
            <td><button class="btn btn-warning">Thêm</button></td>
        </tr>
        </form>
        </table>
        </center>
        <?php
        endif;
        ?>
        </div>
    </div>
</div>