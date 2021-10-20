<?php
    include './header.php';
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
                    <div class="sign_in form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="sign_in form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="link">             
                        <a href="../index.php"><p>Bạn là sinh viên</p></a>
                        <a href="./index_admin.php"><p>Bạn là quản trị viên</p></a>
                        <button type="submit" class="button btn btn-outline-primary">Đăng nhập</button>
                    </div>
                </div>
            </div>
        </div>     
    </div>
<?php
    include './footer.php';
?>
