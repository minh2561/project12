<?php
    include './index/header.php';
?>
    <div class="back">
        <div class="tieude">
            <div class="dangki">
                <h2>TRANG ĐĂNG KÝ HỌC TẬP SINH VIÊN</h2>
            </div>
            <div class="dangki">
                <h2>TRƯỜNG ĐẠI HỌC BÁCH KHOA HÀ NỘI</h2><br>
                <h6>Đăng nhập vào hệ thống đăng ký</h6>
            </div>
        </div>
        <div class="ground">
            <div class="sign">
                <div class="in">     
                    <form action="" method="POST">          
                    <div class="sign_in form-floating mb-3">
                        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="sign_in form-floating">
                        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="link">             
                        <a href="./index/index_admin.php"><p>Bạn là quản trị viên</p></a>
                        <a href="./index/index_gv.php"><p>Bạn là giảng viên</p></a>
                        <input type="submit" name="submit">
                    </div>
                    </form>
                </div>
            </div>
            
        </div>      
                <?php 
                if(isset($_SESSION['login-sv']))
                {
                    echo $_SESSION['login-sv'];
                    unset($_SESSION['login-sv']);
                }
                ?>
    </div>


<?php 
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $sql = "SELECT * FROM sinh_vien WHERE sv_email='$email' AND sv_password='$password'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if($count==1)
        {   
            $row = mysqli_fetch_assoc($res);
            $id =  $row['sv_id'];
            $_SESSION['sinh_vien'] = $id;
            header('location:'.SITEURL.'sinhvien/index.php');
        }else{
            $_SESSION['login-sv'] = "<div class='error text-center'>Username or Password did not match.</div>";
        }
}
?>

<?php
    include './index/footer.php';
?>
