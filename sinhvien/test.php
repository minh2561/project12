<?php
include('../index/header.php');
include('check_login_sv.php');

$checkTrangThai = '';
$sql7 = "SELECT DISTINCT * FROM admin";
$result7 = mysqli_query($conn, $sql7);
if (mysqli_num_rows($result7) > 0) {
    $row = mysqli_fetch_assoc($result7);
    $checkTrangThai = $row['trang_thai'];
}

?>
<nav class="navbar navbar-expand-lg navbar-light bg-danger">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php"><i class="fas fa-pencil-alt me-1"></i>Đăng kí học</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dangki.php"><i class="far fa-calendar-alt me-1"></i>Các môn đăng kí học</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index/logout.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
                </li>
            </ul>
            
                <form class="d-flex">
                    <input <?php if ($checkTrangThai == 'Đóng') {
                                echo 'disabled';
                            }; ?> class=" me-2 " type="search" placeholder="Nhập môn học" onchange="handleGetName(this.value)" aria-label="Search">
                    <button <?php if ($checkTrangThai == 'Đóng') {
                                echo 'disabled';
                            } ?> class="btn btn-primary" id="btnSearch"><a id="hrefSearch">Tìm kiếm</a></button>

                </form>
            
        </div>
    </div>
</nav>
<div class="main-content bg-light" style="min-height: 500px;">
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
        <div class="col-sm-2  ">
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
                            echo '<tr>';
                            echo '<td><a href ="" class ="text-primary ms-2">' . $row['mh_ten_mon'] . '</a></td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-10 ">
            <h5 class="text-center my-3">Lớp học phần</h5>
            <div class="container">
                <table class="table table-hover">
                    <thead class="bg-primary">
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
<div class="end"></div>
<?php
include('../index/footer.php');


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
</script>
