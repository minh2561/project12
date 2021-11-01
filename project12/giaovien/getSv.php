




<?php
include '../index/header.php';
include 'check_login_gv.php';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-danger">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php"><i class="far fa-calendar-alt me-1"></i>Môn học</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../index/logout.php"><i class="fas fa-sign-out-alt me-1"></i>Đăng xuất</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<div class="main-content bg-light" style="min-height: 500px;">
    <div class="container">
   
     <h3 class="text-center py-4">Danh sách sinh viên</h3>
    
    <table class="table">
        <thead class="bg-primary"> 
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Email</th>
            <th scope="col">Ten sinh viên</th>
            <th scope="col">Lop</th> 
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
    <button class="bg-primary"><a href="index.php" class="">Quay lai</a></button>

</div>
</div>
<div class="end"></div>
<?php
include '../index/footer.php'
?>

