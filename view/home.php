<div class="container">
    <!-- form đăng nhập -->
    <div class="row">

        <div class="col-md-6">
            <?php
             if(isset($_GET['reset'])):
                switch($_GET['reset'])
                {
                    case'reset':
                    include "reset.php";
                    break;
                    case'resetmxn':
                    include "resetmxn.php";
                    break;
                    case'resetpass':
                    include "resetpass.php";
                    break;
                }
             else:
                include "login.php";
                // setTimeout( 3000);
            ?>
        </div>
        <!-- tin tức -->
        <div class="col-md-6">
            <div id="tintuc">
                <h1 id="tintuc-header">
                    <center>Thông Báo Mới Nhất </center>
                </h1>
                <table>
                <?php
                include "view/new.php";
                ?>
                    <tr>
                        <td >
                            <center><button class="bg-info text-white"><a style="color:#fff"
                                        href="index.php?action=home&act=news&news=new&page=1">Xem
                                        Thêm<a></button></center>
                        </td>
                    </tr>

                </table>
            </div>

        </div>
    </div>
    <?php endif;?>
</div>
</div>