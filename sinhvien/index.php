<?php
include('../index_sv/header.php');
include('check_login_sv.php');
$sv_id=$_SESSION['sinh_vien'];
$checkTrangThai = '';
$sql7 = "SELECT DISTINCT * FROM admin";
$result7 = mysqli_query($conn, $sql7);
if (mysqli_num_rows($result7) > 0) {
    $row = mysqli_fetch_assoc($result7);
    $checkTrangThai = $row['trang_thai'];
}

?>
<div class="back_sv">
<div class="tuychon">
<nav class="mb-4 px-5 navbar navbar-expand-lg navbar-light pink lighten-4">
        <div class="logo">
                <a href="#" title="Logo">
                    <img src="../images/log.png" alt="Restaurant Logo" class="img-responsive">
                </a>
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" style="margin:0 auto">
            <li class="nav-item ms-5">
                <a class="nav-link font-bold" href="index.php"><i class="fas fa-home me-1"></i>Trang chủ</a>
            </li>
            <li class="nav-item ms-5">
                <a class="nav-link font-bold" href="dangki.php"><i class="far fa-calendar-alt me-1"></i>Các môn đăng kí học</a>
            </li>
            <li class="nav-item ms-5">
                <a class="nav-link font-bold" href="../index/logout.php"><i class="fas fa-sign-out-alt" style="margin-right:10px"></i>Đăng xuất</a>
            </li>
        </ul>
        <form class="form-inline md-form mb-0" >
        <!-- <i class="fas fa-search"></i> -->
            <input <?php if ($checkTrangThai == 'Đóng') {
                        echo 'disabled';
                    }; ?> class="form-control font-bold " type="text" placeholder="Search" aria-label="Search" onchange="handleGetName(this.value)" aria-label="Search">
                <button <?php if ($checkTrangThai == 'Đóng') {
                            echo 'disabled';
                        } ?> class="btn btn-danger" id="btnSearch"><a id="hrefSearch">Tìm Kiếm</a></button>
                
    </form>
    </div>
</nav>
</div> 
   






<div class="main-content bg-light table_sv">
    <div class="container">
        <?php
        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //Displaying Session Message
            unset($_SESSION['add']); //REmoving Session Message
        }
        ?>

        <?php if ($checkTrangThai == 'Đóng') {
            echo '<h6>Trạng thái đăng kí học đã hết hạn</h6>';
        } ?>
    </div>
    <div class="d-flex main-content">
        <div class="col-sm-2 bg-primary_sv ">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Môn học</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM mon_hoc";
                    $res = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                            <tr>
                            <th scope="row"><a type="button" class="btn btn-danger" onclick="handleDetails('<?php echo $row['mh_id'] ?>')"><?php echo $row['mh_ten_mon'] ?></a>
                            </tr>  
                       <?php }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-10 ">
            <h5 class="text-center my-3">Lớp học phần</h5>
            <!-- <div class="container"> -->
            <div class="bang_monhoc">
                <table class="table table-hover" id="tableSubject">
                    <thead class="bg-primary_sv ">
                        <tr>
                            <th scope="col">Tên học phần</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Tổng sinh viên</th>
                            <th scope="col">Số sinh viên</th>
                            <th scope="col">Tên phòng</th>
                            <th scope="col">Tuần học</th>
                            <th scope="col">Giờ học</th>
                            <th scope="col">Đăng kí</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>
<!-- <div class="end_sv"></div> -->
<?php
    include('../index_sv/footer.php');
?>
<script>
    var search;

    function handleGetName(value) {
        search = value;
    }

    $(document).ready(async function() {
        $("#btnSearch").click(function() {
            $("#hrefSearch").attr("href", `search.php?q=${search}`)
        })
    })

    var data ;
    async function handleDetails(mh_id){
         $("#tableSubject > tbody >tr").remove();   
         $("#addClass > a:first-child").remove();
         // call api lay du lieu class 
        await $.ajax({
            url:`getClass.php?mh_id=${mh_id}`,
            type:"get",
            success:function(response){
                data = JSON.parse(response); 
            }
        })

         // nut them lop moi 


        // neu co du lieu tu lop hien thi len table
        if(data.users.length !== 0){
        $.each(data.users,function(i,data){
        $("#tableSubject > tbody").append(`
    <tr>
        <td>${++i}</td>
        <td>${data.lop_ten_hoc_phan	} </td>
        <td>${data.lop_trang_thai	} </td>
        <td>${data.lop_max_sv} </td>
        <td>${data.lop_current_sv} </td>
        <td>${data.lop_ten_phong} </td>
        <td>${data.lop_tuan_hoc} </td>
        <td>${data.lop_gio_hoc	} </td>
        <td ><a style="color:red" href="addSubject.php?lop_id=${data.lop_id}&sv_id=<?php echo $sv_id ?>">Đăng kí</a></td>
    </tr>
    `)  
    })        
    }};
</script>