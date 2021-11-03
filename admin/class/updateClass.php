<?php include('./header.php') ?>


<?php 
   $lop_id = $_GET['lop_id'];
    if(isset($_POST['submit']))
    {   
        $mh_id=$_GET['mh_id'];
        $lop_ten_hoc_phan = $_POST['lop_ten_hoc_phan'];
        $lop_trang_thai = $_POST['lop_trang_thai'];
        $lop_max_sv = $_POST['lop_max_sv'];
        // $lop_current_sv = $_POST['lop_current_sv'];
        $lop_ten_phong = $_POST['lop_ten_phong'];
        $lop_tuan_hoc = $_POST['lop_tuan_hoc'];
        $lop_gio_hoc = $_POST['lop_gio_hoc'];
        $lop_trang_thai_dang_ki = $_POST['lop_trang_thai_dang_ki'];
        $gv_id = $_POST['gv_id'];
        $sql = "UPDATE dang_ki_tin_chi SET lop_id='$lop_id',lop_ten_hoc_phan='$lop_ten_hoc_phan',`lop_trang_thai`='$lop_trang_thai',`lop_max_sv`='$lop_max_sv',
        `lop_current_sv`='$lop_current_sv',`lop_ten_phong`='$lop_ten_phong',`lop_tuan_hoc`='$lop_tuan_hoc',`lop_gio_hoc`='$lop_gio_hoc',`lop_trang_thai_dang_ki`='$lop_trang_thai_dang_ki',`mh_id`='$mh_id',`gv_id`='$gv_id' WHERE 
        lop_id='$lop_id'
        ";
        $res = mysqli_query($conn, $sql) or die(mysqli_error());
        if($res==true)
        {
            $_SESSION['update'] = "<div class='success'> update Successfully.</div>";
            header('location:'.SITEURL.'admin/index.php');
        }
        else{
            $_SESSION['update'] = "<div class='error'>Cannot update Subject . Please update class first </div>";
            header('location:'.SITEURL.'admin/index.php');
        }
        

    }
    
?>


<?php
 $sql = "SELECT * FROM dang_ki_tin_chi WHERE lop_id = '$lop_id'";
 $res = mysqli_query($conn,$sql);
 $count = mysqli_num_rows($res);
    if($count > 0){
        while($row = mysqli_fetch_assoc($res)){
            $lop_ten_hoc_phan = $row['lop_ten_hoc_phan'];
            $lop_trang_thai = $row['lop_trang_thai'];
            $lop_max_sv = $row['lop_max_sv'];
            $lop_current_sv = $row['lop_current_sv'];
            $lop_ten_phong = $row['lop_ten_phong'];
            $lop_tuan_hoc = $row['lop_tuan_hoc'];
            $lop_gio_hoc = $row['lop_gio_hoc'];
            $lop_trang_thai_dang_ki = $row['lop_trang_thai_dang_ki'];
        }
    }else{
        echo "<h1>ID sai roi</h1>";
    }
    
?>
<div class="back_sv">
<form action="" method="POST" class="container header_addClass">
    <div class="form-group">
        <label for="lop_ten_phong">Lớp tên học phần</label>
        <input value="<?php echo $lop_ten_hoc_phan ?>" type="text" class="form-control" name="lop_ten_hoc_phan" id="lop_ten_hoc_phan"
            placeholder="VD: Toán 1">
    </div>
    <h5>Lớp trạng thái</h5>
    <div class="custom-control custom-radio">
        <input type="radio" id="lop_trang_thai" name="lop_trang_thai" checked="<?php if($lop_trang_thai == "da hoc") echo "checked "
    ?>" class="custom-control-input" value="da hoc"
            required>
        <label class="custom-control-label" for="lop_trang_thai">Đã học</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" id="lop_trang_thai" name="lop_trang_thai" checked="<?php if($lop_trang_thai == "chua hoc") echo "checked"
    ?>" class="custom-control-input" value="Chưa học">
        <label class="custom-control-label" for="lop_trang_thai">Chưa học</label>
    </div>
    <div class="form-group">
        <label for="lop_max_sv">Lớp (max SV)</label>
        <input type="text" value="<?php echo $lop_max_sv ?>" class="form-control" name="lop_max_sv" id="lop_max_sv" placeholder="VD: 50">
    </div>
    <!-- <div class="form-group">
        <label for="lop_current_sv">Lớp (current SV)</label>
        <input type="text" value="<?php echo $lop_current_sv ?>" class="form-control" name="lop_current_sv" id="lop_current_sv" placeholder="VD: 30">
    </div> -->
    <div class="form-group">
        <label for="lop_ten_phong">Lớp tên phòng</label>
        <input type="text" value="<?php echo $lop_ten_phong ?>" class="form-control" name="lop_ten_phong" id="lop_ten_phong" placeholder="VD: 1">
    </div>
    <div class="form-group">
        <label for="lop_tuan_hoc">Lớp tuần học</label>
        <input type="date" value="<?php echo $lop_tuan_hoc ?>" class="form-control tuan" name="lop_tuan_hoc" id="lop_tuan_hoc" placeholder="Lớp tuần học">
    </div>
    <div class="form-group">
        <label for="lop_gio_hoc">Thời gian bắt đầu(h)</label>
        <input type="text" value="<?php echo $lop_gio_hoc	 ?>" class="form-control" name="lop_gio_hoc" id="lop_gio_hoc" placeholder="Thời gian bắt đầu(h)">
    </div>
    <h5>Lớp trạng thái đăng ký</h5>
    <div class="custom-control custom-radio">
        <input type="radio" checked="<?php if($lop_trang_thai_dang_ki == "open") echo "checked"
    ?>" id="open" name="lop_trang_thai_dang_ki" class="custom-control-input" value="Mở" required>
        <label class="custom-control-label" for="open">Mở</label>
    </div>
    <div class="custom-control custom-radio">
        <input checked="<?php if($lop_trang_thai_dang_ki == "close") echo "checked"
    ?>" type="radio" id="close" name="lop_trang_thai_dang_ki" value="Đóng" class="custom-control-input">
        <label class="custom-control-label" for="close">Đóng</label>
    </div>
    <h5>Choose Teacher</h5>
    <div class="form-group input-group mb-3">
        <select name="gv_id" id="gv_id" class="form-select">
            <?php 


    $sql = "SELECT * FROM giao_vien ";
    $res = mysqli_query($conn, $sql);
    if($res==TRUE)
    {
        $count = mysqli_num_rows($res); // Function to get all the rows in database
        if($count>0)
        {
            while($rows=mysqli_fetch_assoc($res))
            {
                $gv_id=$rows['gv_id'];
                $gv_ten = $rows['gv_ten']
                ?>
            <option value="<?php echo $gv_id ?>">
                <?php echo $gv_ten ?>
            </option>
            <?php

            }
        }
    }
?>       
        </select>
    </div>
    <div class="btn-group">
    <div class="custom-control custom-radio ">
        <input type="submit" name="submit" value="Update Class" class="btn btn-danger them">
    </div>
    <div>
    <button type="button" class="btn btn-outline-danger them"> <a href="<?php echo SITEURL ?>admin">Quay lại</a></button>
    </div>
    </div>
</form>
</div>


<?php include('../../index/footer.php')?>
