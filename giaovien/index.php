<?php
include '../index_sv/header.php';

include 'check_login_gv.php';
?>
<div class="back_sv">
<div class="wrapper-nav">
        <nav class="mb-4 px-5 navbar navbar-expand-lg navbar-light pink lighten-4 header-nav">
            <div class="logo">
                <a href="index.php" title="Logo">
                    <img src="../images/log.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse logout-link" id="navbarSupportedContent">
                <a class="nav-link font-bold" href="../index/logout.php"><i class="fas fa-sign-out-alt" style="margin-right:10px"></i>Đăng xuất</a>
            </div>

        </nav>
    </div>
<div class="main-content bg-light">
    <div class="container">
    <h3 class="text-center py-4">Môn được phân công</h3>
    <div class="bang_monhoc">
    <table class="table">
        <thead class = "bg-primary">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên học phần</th>
            <th scope="col">Tổng sinh viên</th>
            <th scope="col">Số sinh viên</th>
            <th scope="col">Tên phòng</th>
            <th scope="col">Tuần học</th>
            <th scope="col">Giờ học</th>
            <th scope="col">Danh sách SV</th>   
        </tr>
        </thead>
        <?php
        $gv_id = $_SESSION['giao_vien'];
        $sql = "SELECT * FROM dang_ki_tin_chi WHERE gv_id='$gv_id'";
        $res = mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0){
           $i = 1;
            while($row=mysqli_fetch_assoc($res)){
                echo '<tbody>';
                echo '<tr>';
                echo '<td>'.$i++.'</td>';
                
                echo '<td>'.$row['lop_ten_hoc_phan'].'</td>';
                echo '<td>'.$row['lop_max_sv'].'</td>';
                echo '<td>'.$row['lop_current_sv'].'</td>';
                echo '<td>'.$row['lop_ten_phong'].'</td>';
                echo '<td>'.$row['lop_tuan_hoc'].'</td>'; 
                echo '<td>'.$row['lop_gio_hoc'].'</td>';
                echo '<td><a href ="getSv.php?lop_id='.$row['lop_id'].'" class = "text-primary"><i class="fas fa-list"></i></a></td>'; 
                
                echo '</tr>';
                echo '</tbody>';
              
            }
        }
        ?>


        
    </table>
    </div>
</div>
</div>


<?php
include '../index_sv/footer.php';
?>
</div>
<!-- <div class="end"></div> -->
