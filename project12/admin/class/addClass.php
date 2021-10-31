<?php include('../../index/header.php') ?>
<?php 
   
    if(isset($_POST['submit']))
    {   
        $mh_id=$_GET['mh_id'];
        $lop_ten_hoc_phan = $_POST['lop_ten_hoc_phan'];
        $lop_trang_thai = $_POST['lop_trang_thai'];
        $lop_max_sv = $_POST['lop_max_sv'];
        $lop_current_sv = $_POST['lop_current_sv'];
        $lop_ten_phong = $_POST['lop_ten_phong'];
        $lop_tuan_hoc = $_POST['lop_tuan_hoc'];
        $lop_gio_hoc = $_POST['lop_gio_hoc'];
        $lop_trang_thai_dang_ki = $_POST['lop_trang_thai_dang_ki'];
        $gv_id = $_POST['gv_id'];
        $sql = "INSERT INTO dang_ki_tin_chi (`lop_id`, `lop_ten_hoc_phan`, `lop_trang_thai`, `lop_max_sv`, `lop_current_sv`, `lop_ten_phong`, `lop_tuan_hoc`, `lop_gio_hoc`, `lop_trang_thai_dang_ki`, `mh_id`, `gv_id`)
         VALUES ('','$lop_ten_hoc_phan','$lop_trang_thai','$lop_max_sv','$lop_current_sv','$lop_ten_phong','$lop_tuan_hoc','$lop_gio_hoc','$lop_trang_thai_dang_ki','$mh_id','$gv_id')
        ";
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if($res==TRUE)
        {
            $_SESSION['add'] = "<div class='success'> Added Class Successfully.</div>";
            header('location:'.SITEURL.'admin/index.php');
        }
        else
        {
            $_SESSION['add'] = "<div class='error'>Failed to Add Class.</div>";
            header('location:'.SITEURL.'admin/index.php');
        }

    }
    
?>


<form action="" method="POST">
    <div class="form-group">
        <label for="lop_ten_phong">lop_ten_hoc_phan</label>
        <input type="text" class="form-control" name="lop_ten_hoc_phan" id="lop_ten_hoc_phan"
            placeholder="lop_ten_hoc_phan">
    </div>
    <h5>lop_trang_thai </h5>
    <div class="custom-control custom-radio">
        <input type="radio" id="lop_trang_thai" name="lop_trang_thai" value="da hoc" class="custom-control-input"
            required>
        <label class="custom-control-label" for="lop_trang_thai">da hoc</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" id="lop_trang_thai" name="lop_trang_thai" value="chua hoc" class="custom-control-input">
        <label class="custom-control-label" for="lop_trang_thai">chua hoc</label>
    </div>
    <div class="form-group">
        <label for="lop_max_sv">lop_max_sv</label>
        <input type="text" class="form-control" name="lop_max_sv" id="lop_max_sv" placeholder="lop_max_sv">
    </div>
    <div class="form-group">
        <label for="lop_current_sv">lop_current_sv </label>
        <input type="text" class="form-control" name="lop_current_sv" id="lop_current_sv" placeholder="lop_current_sv">
    </div>
    <div class="form-group">
        <label for="lop_ten_phong">lop_ten_phong </label>
        <input type="text" class="form-control" name="lop_ten_phong" id="lop_ten_phong" placeholder="lop_ten_phong">
    </div>
    <div class="form-group">
        <label for="lop_tuan_hoc">lop_tuan_hoc </label>
        <input type="date" class="form-control" name="lop_tuan_hoc" id="lop_tuan_hoc" placeholder="lop_tuan_hoc">
    </div>
    <div class="form-group">
        <label for="lop_gio_hoc">lop_gio_hoc </label>
        <input type="text" class="form-control" name="lop_gio_hoc" id="lop_gio_hoc" placeholder="lop_gio_hoc">
    </div>
    <h5>lop_trang_thai_dang_ki</h5>
    <div class="custom-control custom-radio">
        <input type="radio" id="open" name="lop_trang_thai_dang_ki" class="custom-control-input" value="open" required>
        <label class="custom-control-label" for="open">open</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" id="close" name="lop_trang_thai_dang_ki" value="close" class="custom-control-input">
        <label class="custom-control-label" for="close">close</label>
    </div>
    <h5>choose teacher</h5>
    <div class="form-group">
        <select name="gv_id" id="gv_id">
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


            ?>
        </select>
    </div>
    <div class="custom-control custom-radio">
        <input type="submit" name="submit" value="Add Class" class="btn-secondary">
    </div>
   
    <div>
        <a href="<?php echo SITEURL ?>admin"> Quay lai</a>
</div>
</form>



<?php include('../../index/footer.php')?>
