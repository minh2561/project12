




<?php
include '../index/header.php';
include 'check_login_gv.php';
?>
<div class="main-content">
<div class="wrapper">
    <h1>Môn học</h1>
    
    <table class="table">
        <thead>
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
    <a href="index.php">Quay lai</a>

</div>
</div>

<?php
include '../index/footer.php'
?>

