<?php include('../../index/header.php')?>

    <form action="" method="POST">
  
<div class="form-group">
    <label for="mh_id">mh_id</label>
    <input type="text" class="form-control" id="mh_id" name="mh_id" placeholder="Enter license_no" required>
  </div>
  <div class="form-group">
    <label for="model">mh_ten_mon	</label>
    <input  type="text" class="form-control" id="mh_ten_mon" name="mh_ten_mon" placeholder="Enter mh_ten_mon" required>
  </div>
  <div class="form-group">
    <label for="model">mh_thoi_gian_hoc	</label>
    <input type="text" class="form-control" id="mh_thoi_gian_hoc" name="mh_thoi_gian_hoc" placeholder="Enter mh_thoi_gian_hoc" required>
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">ADD</button>
</form>

    <div>
        <a href="<?php echo SITEURL ?>admin"> Quay lai</a>
</div>

<?php 
    if(isset($_POST['submit'])){
        $mh_id = $_POST['mh_id'];
        $mh_ten_mon = $_POST['mh_ten_mon'];
        $mh_thoi_gian_hoc = $_POST['mh_thoi_gian_hoc'];

        $sql="INSERT INTO `mon_hoc`(`mh_id`, `mh_ten_mon`, `mh_thoi_gian_hoc`) 
        VALUES ('$mh_id','$mh_ten_mon','$mh_thoi_gian_hoc')";
        $res = mysqli_query($conn,$sql);
        if($res==TRUE)
        {
            $_SESSION['add'] = "<div class='success'> Added Subject Successfully.</div>";
           header('location:'.SITEURL.'admin/index.php');
        }
        else
        {
            $_SESSION['add'] = "<div class='error'>Failed to Add Subject.</div>";
            header('location:'.SITEURL.'admin/index.php');
        }

    }
    include('../../index/footer.php')
?>
