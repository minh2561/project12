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
   
     <h3 class="text-center py-4">Danh sách sinh viên</h3>
    
    <table class="table">
        <thead class="bg-primary"> 
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Email</th>
            <th scope="col">Tên sinh viên</th>
            <th scope="col">Lớp</th> 
        </tr>
        </thead>
        <?php
        $lop_id = $_GET['lop_id'];
        $sql = "SELECT DISTINCT * FROM sinh_vien INNER JOIN relation_sv_mh ON sinh_vien.sv_id = relation_sv_mh.sv_id WHERE relation_sv_mh.lop_id = '$lop_id'";
                $res = mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0){
           $i = 1;
            while($row=mysqli_fetch_assoc($res)){
                echo '<tbody>';
                echo '<tr>';
                echo '<td>'.$i++.'</td>';
                echo '<td>'.$row['sv_email'].'</td>';
                echo '<td>'.$row['sv_full_name'].'</td>';
                echo '<td>'.$row['sv_lop'].'</td>';
                
                echo '</tr>';
                echo '</tbody>';
              
            }
        }
        ?>


        
    </table>
    <button class="btn btn-danger"><a href="index.php" class="">Quay lại</a></button>
    </div>
</div>
</div>
<!-- <div class="end"></div> -->
<?php
include '../index/footer.php'
?>

