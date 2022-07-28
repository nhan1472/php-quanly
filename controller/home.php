<?php
$action='home';
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch($action)
{
    // trang home
    case 'home':
    include 'view/home.php';
    break;
    case 'fromlopsua':
        $ml=$_POST['malop'];
        $ten=$_POST['ten'];
        $db = new admin();
        $db->updateLop($ml,$ten);
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=qlnamhoc">';
        break;
    case 'fromlop':
        $ml=$_POST['malop'];
        $ten=$_POST['ten'];
        $khoa=$_POST['makhoa'];
        $khoahoc=$_POST['khoahoc'];
        $gv=$_POST['gv'];
        $db = new admin();
        $db->insertLop($ml,$ten,$khoa,$khoahoc,$gv);
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=qlnamhoc">';
        break;
    case 'formhk':
        $ma='';
        $ma=$_POST['ten'];
        $ma1=$_POST['mahk'];
        if($ma=='')
        {
            echo '<script>alert("Khổn được bỏ trống");</script>';
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=qlnamhoc&khoahoc&xem=20-24&xem10=hk1>&them20=hk1">';
        }
        else
        {
            $db = new admin();
            $db->inserthk1($ma,$ma1);
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=qlnamhoc&khoahoc&xem=20-24&xem10=hk1">';

        }
        break;
    case 'formnam':
        $mct='';
        $ten='';
        $hk='';

        $mct=$_POST['mactn'];
        $ten=$_POST['ten'];
        $hk=$_POST['mahk'];
        $man=$_POST['man'];
        $db = new admin();
        $err=$db->selectnamcid($mct);
        $err1=$db->selecthkcid1($mct);
        if($mct==''&&$ten==''&&$hk=='')
        {
            echo '<script>alert("Khổn được bỏ trống");</script>';
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=qlnamhoc&khoahoc&xem=20-24&them10">';
        }
        else
        {
        if(!$err)
        {
            $db =new admin();
            $db->insertnam($mct,$man,$ten,$hk);
            $db->inserthk($hk);
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=qlnamhoc&khoahoc&xem=20-24">';
            // echo $man;
        }else
        {
            echo '<script>alert("MÃ năm đã tồn tại");</script>';
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=qlnamhoc&khoahoc&xem=20-24&them10">';
        }
        }
    break;
    case 'fromsaunam':
        $mkh=$_POST['mactn'];
        $ten=$_POST['ten'];
        $db = new admin();
        $db->updateN($mkh,$ten);
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=qlnamhoc&khoahoc&xem=20-24">';
    break;
    case 'themtc':
        $mdg=$_POST['mdg'];
        $ten=$_POST['title'];
        $diem=$_POST['diem'];
        $db = new admin();
        $db->inserttc($mdg,$ten,$diem);
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=admin&mdg='.$mdg.'">';
    break;
    case 'themnddg':
        $mdg=$_POST['madg'];
        $ten=$_POST['title'];
        $diem=$_POST['diem'];
        $db = new admin();
        $db->insertnd11($mdg,$ten,$diem);
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=admin">';
    break;
    case 'formnd':
        include 'view/themnd.php';
    break;
    case 'formsuahk':
        $mkh=$_POST['id'];
        $ten=$_POST['ten'];
        $db = new admin();
        echo $mkh,$ten;
        $db->updateHK($mkh,$ten);
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=qlnamhoc&khoahoc&xem=20-24&xem10=hk1">';
    break;
    case 'formsaukhoahoc':
        $mkh=$_POST['makhoahoc'];
        $ten=$_POST['ten'];
        $db = new admin();
        $db->updateKh($mkh,$ten);
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=qlnamhoc&khoahoc">';
    break;
    case 'formkhoahoc':
        $mkh=$_POST['makhoa'];
        $ten=$_POST['ten'];
        $manh=$_POST['manh'];
        $db = new admin();
        $db->insertKh($mkh,$ten,$manh);
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=qlnamhoc&khoahoc">';
    break;
    case 'formkhoa':
        $mkh=$_POST['makhoa'];
        $ten=$_POST['ten'];
        $db = new admin();
        $db->insertKhoa($mkh,$ten);
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=qlnamhoc&khao">';
    break;
    case 'formGV':
        $magv=$_POST['magv'];
        $ten=$_POST['ten'];
        $email=$_POST['email'];
        $makhoa=$_POST['makhoa'];
        $db = new admin();
        $db->insertGV($magv,$ten,$email,$makhoa);
        $db->insertGVpass($magv,$email);
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=qlnamhoc&giaovien">';
    break;
    case 'fromsaugv':
        $magv=$_POST['magv'];
        $ten=$_POST['ten'];
        $email=$_POST['email'];
        $db = new admin();
        $db->updateGV($magv,$ten,$email);
        $db->updateGVpass($magv,$email);
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=qlnamhoc&giaovien">';
    break;
    case 'formsuakhoa':
        $mkh=$_POST['makhoa'];
        $ten=$_POST['ten'];
        $db = new admin();
        $db->updateKhoa($mkh,$ten);
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=qlnamhoc&khao">';
    break;
    case 'themsv':
        include 'view/themsv.php';
        break;
        case 'qlnamhoc':
            include 'view/qlnamhoc.php';
            break;
    case 'suasv':
        $mssv=$_POST['mssv'];
        $ten=$_POST['ten'];
        $ngaysinh=$_POST['ns'];
        $noisinh=$_POST['ns1'];
        $lop=$_POST['lop'];
        $email=$_POST['email'];
        $db = new admin();
        $db->updateSV($mssv,$ten,$ngaysinh,$noisinh,$lop,$email);
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=qlsinhvien">';
        break;
    case 'qlsinhvien':
        include 'view/qlsinhvien.php';
        break;
        case 'qlsinhvien1':
            $tim = $_POST['tim'];
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=qlsinhvien&ms='.$tim.'">';
            break;
    case 'suamdg':
        $mag=$_POST['mdg'];
        $title=$_POST['title'];
        $diem=$_POST['diem'];
         $db= new admin();
         $db->updateND($mag,$title,$diem);
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=admin">';
        break;

        case 'suatc':
            $id=$_POST['id'];
            $title=$_POST['title'];
            $diem=$_POST['diem'];
            $db= new admin();
         $db->updateTC($id,$title,$diem);
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=admin">';
            break;

    case 'admin':
        include 'view/admin.php';
        break;
    case 'chodiem':
        include 'view/user.php';
        break;
        case 'chodiem1':
            $db = new user();
            $db1= new chitietdg();
            $sltc=$db1->selectslTc();
            $db->updatediem($_POST['md'],'2020-2021',$_POST['hk'],$_POST['tongdiem'],$_POST['nhanxet']);
            // echo $_POST['hk'];
            for($i=1;$i<=$sltc[0];$i++)
            {
                    // echo $_POST['idtc'.$i];  
                    // echo $_POST['diem'.$i];  
                $db->insertdiemgv($_POST['mnd'],$_POST['idtc'.$i],$_POST['diem'.$i],$_POST['hk']);
            }
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=thongtin1&tt=tt">';
        break;
    case 'lop':
        $_SESSION['lopid']=$_POST['idlop'];
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=thongtin1&tt=tt">';
        break;
    case 'thongtin':
    include 'view/thongtin.php';
    break;
    case 'thongtin1':
        include 'view/thongtin1.php';
        break;
    case 'diem':
        if(isset($_POST['submit']))
        {
            $mssv=$_SESSION['mssv'];
            $nam=$_POST['nam'];
            $hk=$_POST['hk'];
            $db =new user();
            $db1= new chitietdg();
            $sltc=$db1->selectslTc();
            $tongdiem=$_POST['tongdiem'];
            $xeploai=$_POST['xeploai'];
            $rel = $db->selectktdiem($mssv,$nam,$hk);
            // $set = $rel->fetch()?$rel->fetch():[];
            //     count($set)."\n";
            if($rel)
            {
                echo '<script>alert("bạn đã có điểm ren luyện hk này rồi");</script>';
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=danhgia">';
            }
            else
            {
                $rel1=$db->selctKq($mssv);
                $md=$rel1['md'];
                $mnd=$rel1['mnd'];
                $db->insertKq($md,$mnd,$tongdiem,$xeploai,$nam,$hk);
                for($i=1;$i<=$sltc[0];$i++)
                {
                    // echo $_POST['idtc'.$i];  
                    // echo $_POST['thd'.$i];  
                    // echo $_POST['diem'.$i];  
                    $db->insertnd($mnd,$_POST['idtc'.$i],$_POST['thd'.$i],$_POST['diem'.$i],$hk);
                }
                
                echo '<script>alert("bạn đá đánh giá điểm rèn luyện thành công");</script>';
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=thongtin&tt=tt">';
            }
        }
    break;
    // sử lý đăng nhập
    case 'login':
    if(isset($_POST['check'])&&$_POST['check']=='user')
    {
    $tk=$_POST['txtusername'];
    $mk=$_POST['txtpassword'];
    $db = new User();
    $rel=$db->login($tk,$mk);
    if(!$rel)
    {
         echo '<script>alert("đăng nhập sai tài khoản hoặc mật khẩu");</script>';
         echo '<meta http-equiv="refresh" content="0;url=index.php?action=home">';
    
    }
    else
    {
        $rels=$db->selecttt($tk);
        $_SESSION['mssv']=$rels[0];
        $_SESSION['ten']=$rels[1];
        echo '<script>alert("bạn đã đăng nhập thành công");</script>';
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=thongtin&tt=tt">';
    }
    }
    else if(isset($_POST['check'])&&$_POST['check']=='admin')
    {
        $tk=$_POST['txtusername'];
        $mk=$_POST['txtpassword'];
        $db = new User();
        $rel=$db->logingv($tk,$mk);
        if(!$rel)
        {
             echo '<script>alert("đăng nhập sai tài khoản hoặc mật khẩu");</script>';
             echo '<meta http-equiv="refresh" content="0;url=index.php?action=home">';
        
        }
        else
        {
            $rels=$db->selectgv($tk);
            $_SESSION['tengv']=$rels[0];
            $_SESSION['mgv']=$rels[2];
            echo '<script>alert("bạn đã đăng nhập thành công");</script>';
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=thongtin1&tt=tt">';
        }
       
    }
    else if(isset($_POST['check'])&&$_POST['check']=='admin1')
    {
        $db = new admin();
        $tk=$_POST['txtusername'];
        $mk=$_POST['txtpassword'];
        $rel=$db->selectadmin($tk,$mk);
        if(!$rel)
        {
             echo '<script>alert("đăng nhập sai tài khoản hoặc mật khẩu");</script>';
             echo '<meta http-equiv="refresh" content="0;url=index.php?action=home">';
        
        }
        else
        {
            $rel1=$db->selectadmin1($tk,$mk);
            $_SESSION['admin']=$rel1[1];
            echo '<script>alert("bạn đã đăng nhập thành công");</script>';
            if(isset($_SESSION['admin']))
            {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=admin">';
            }
        }
    }
    else
    {
        echo '<script>alert("bạn chưa chọn quyền hạn")</script>';
        include 'view/home.php';
    }
    break;
    case "logout":
        unset($_SESSION['mssv']);
        unset($_SESSION['ten']);
        unset($_SESSION['tengv']);
        unset($_SESSION['mgv']);
        unset($_SESSION['admin']);
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home">';
        // include 'view/home.php';
    break;
    // sử lý reset pass
    case 'resetpass':
    if(isset($_POST['txtms'])&&isset($_POST['txtemail']))
    {
        $ms=$_POST['txtms'];
        $_SESSION['mssv']=$ms;
        $email=$_POST['txtemail'];
        $title="Ma Xac Nhan Cua Ban";
        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $_SESSION['mxn']=substr(str_shuffle($permitted_chars), 0, 6);
        $header="From:admin@gmail.com\r\n";
        $message="MÃ xác nhận của bạn là: ".$_SESSION['mxn']." <br>Mã có hiệu lực trong 15 phút bạn vui long không chia sẽ mã này vói ai";
        $db = new User();
        $rel=$db->ktemail($ms,$email);
        if(!$rel)
        {
             echo '<script>alert("email không phải email đăng ký");</script>';
             echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&reset=reset">';
        
        }
        else
        {
            include "PHPMailer/cauhinh.php";
            $mail->setFrom('admin@example.com', 'TRuong Dai Hoc XXX XXX XXXX');
            $mail->addAddress($email);
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $title;
            $mail->Body    = $message;
            $mail->send();
            echo '<script>alert("mã xác nhận đã gửi tới email của bạn vui lòng kiểm tra.");</script>';
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&reset=resetmxn">';
        }
    }
    else if(isset($_POST['resetmxn']))
    {
        
        if($_POST['resetmxn']== $_SESSION['mxn'])
        {
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&reset=resetpass">';
        }
        else{
            echo '<script>alert("mã xác nhận sai");</script>';
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&reset=resetmxn">';
        }
    }
    else
    {
        if($_POST['txtmk']==$_POST['txtmkl']&&$_POST['txtmk']!=''&&$_POST['txtmk']!=null)
        {
            if(isset($_SESSION['ten']))
            {
            $mk=$_POST['txtmk'];
            $mssv=$_SESSION['mssv'];
            $db = new User();
            $db->updatemk($mk,$mssv);
            echo '<script>alert("cập nhật lại mật khẩu thành công");</script>';
            unset($_SESSION['mssv'],$_SESSION['mxn'],$_SESSION['ten']);
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=home">';
            }
            else if(isset($_SESSION['tengv']))
            {
                $mk=$_POST['txtmk'];
                $id=$_SESSION['mgv'];
                $db = new User();
                $db->updatemkgv($id,$mk);
                echo '<script>alert("cập nhật lại mật khẩu thành công");</script>';
                unset($_SESSION['tengv'],$_SESSION['mgv']);
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=home">';
            }
            else
            {
                $mk=$_POST['txtmk'];
                $id=$_SESSION['admin'];
                $db = new admin();
                $db->updatemk($id,$mk);
                echo '<script>alert("cập nhật lại mật khẩu thành công");</script>';
                unset($_SESSION['admin']);
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=home">';
            }
            
        }
        else
        {
            echo '<script>alert("mật khẩu nhập lại không chính xác");</script>';
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&reset=resetpass">';
        }
    }
    break;
    // trang news all
    case 'resetpass1':
    include 'view/resetpass.php';
    break;
    case "news":
    include 'view/News.php';
    break;
    case "newone":
    include 'view/newone.php';
    break;
    case "diem1":
       $_SESSION['namhoc']= $_POST['namhoc'];
       $_SESSION['hocky']= $_POST['hocky'];
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=thongtin&tt=tt">';
    break;
    case "danhgia":
        include 'view/user.php';
        break;
}
?>