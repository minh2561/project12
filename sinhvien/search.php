<?php include('../index_sv/header.php') ?>
<div class="back_sv">
<div class="table-responsive container ">
<button class="btn btn-danger"><a href="index.php" >Quay lai </a></button>
    <table class="table">
        <tr>
            <th>Học phần</th>
            <th>Tên học phần</th>
            <th>Trạng thái</th>
            <th>SV tối đa</th>
            <th>SV hiện tại</th>
            <th>Tên phòng</th>
            <th>Tuần học</th>
            <th>Giờ học</th>
            <th>Trạng thái đăng ký</th>
        </tr>
    <?php 
    $sv_id = $_SESSION['sinh_vien'];
     $search = $_GET['q'];
     $sql = "SELECT DISTINCT  * FROM dang_ki_tin_chi WHERE lop_ten_hoc_phan LIKE '%$search%' ";
     $res = mysqli_query($conn,$sql);
     if($res == TRUE){
            $count = mysqli_num_rows($res);
            if($count >0){
                while($rows=mysqli_fetch_assoc($res)){
                        $lop_id = $rows['lop_id'];
                      
                        $lop_ten_hoc_phan=$rows['lop_ten_hoc_phan'];
                        $lop_trang_thai=$rows['lop_trang_thai'];
                        $lop_max_sv	=$rows['lop_max_sv'];
                        $lop_current_sv=$rows['lop_current_sv'];
                        $lop_ten_phong	=$rows['lop_ten_phong'];
                        $lop_tuan_hoc	=$rows['lop_tuan_hoc'];
                        $lop_gio_hoc	=$rows['lop_gio_hoc'];
                        $lop_trang_thai_dang_ki	=$rows['lop_trang_thai_dang_ki'];

                        ?> 
        <tr>
       
            <td>
                <?php echo $lop_ten_hoc_phan; ?>
            </td>
            <td>
                <?php echo $lop_trang_thai; ?>
            </td>
            <td>
                <?php echo $lop_max_sv; ?>
            </td>
            <td>
                <?php echo $lop_current_sv; ?>
            </td>
            <td>
                <?php echo $lop_ten_phong; ?>
            </td>
            <td>
                <?php echo $lop_tuan_hoc; ?>
            </td>
            <td>
                <?php echo $lop_gio_hoc; ?>
            </td>
            <td>
                <?php echo $lop_trang_thai_dang_ki; ?>
            </td>
            <td>
                <a href="addSubject.php?lop_id=<?php echo $lop_id ?>&sv_id=<?php echo $sv_id ?>" class="btn btn-danger">Đăng kí</a>
            </td>
            
        </tr>
        <?php
                }
            }else{
                echo "<h1>Tên học phần không chính xác</h1>";
            }
     }
     ?>
    </table>
    </div>
    </div>
<?php include('../index_sv/footer.php') ?>
