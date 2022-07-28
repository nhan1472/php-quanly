<form action="index.php?action=home&act=resetpass" method="post">
<?php if(isset($_SESSION['ten'])||isset($_SESSION['tengv'])):?>
<div class="col-md-6"><center>
<h1 id="form-title">Đổi Mật Khẩu</h1>
<?php else:?>
<h1 id="form-title">Lấy Lại Pass</h1>
<?php endif;?>
        <table class="form-login">
            <tr>
                <td>
                    <div class="form-group">
                        <label for=""><img src="img/key.jpg" class="img-form" alt=""></label>
                </td>
                <td>
                    <input type="password" size="50" class="form-text" name="txtmk" placeholder="Mã Khẩu Mới">
                </td>
            </tr>
</div>
<tr>
    <div class="form-group">
        <td>
            <label for=""><img src="img/key.jpg" class="img-form" alt=""></label>
        </td>
        <td>
            <input type="password" size="50" class="form-text" name="txtmkl" placeholder="Nhập Lại Mật Khẩu">
        </td>
<tr>
<tr>
    <td colspan="2" class="login">
        <!-- restepass -->
        <input type="submit" class="btn-danger" value="Cập Nhập">

</tr>
</div>
</table>
<?php
if(isset($_SESSION['ten'])):
?>
</div>

<?php
endif;
?>
</center>
</form>