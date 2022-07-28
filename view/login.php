<form action="index.php?action=home&act=login" method="post">
        <h1 id="form-title">Đăng nhập</h1>
        <table class="form-login">
            <tr>
                <td>
                    <div class="form-group">
                        <label for=""><img src="img/user.png" class="img-form" alt=""></label>
                </td>
                <td>
                    <input type="text" size="50" class="form-text" name="txtusername" placeholder="Mã Só Đăng Nhập">
                </td>
            </tr>
</div>
<tr>
    <div class="form-group">
        <td>
            <label for=""><img src="img/key.jpg" class="img-form" alt=""></label>
        </td>
        <td>
            <input type="password" size="50" class="form-text" name="txtpassword" placeholder="Mật khẩu">
        </td>
<tr>
<tr>
            <td colspan="2" >
            <center>
            <select name="check" id="" style="margin-botom:20px;width:150px;height:30px;font-size:24px">
            <option value="user">Sinh Viên</option>
            <option value="admin">Giáo Viên</option>
            <option value="admin1">admin</option>
            </select>
            </center>
            </td>
            </tr>
<tr>
    <td colspan="2" class="login">
        <!-- restepass -->
        <a href="index.php?action=home&reset=reset">Quên Mật Khẩu</a>
        <input type="submit" class="btn-danger" value="Đăng nhập">
    </td>
</tr>
</div>
</table>
</form>