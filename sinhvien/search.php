<?php include('../index_sv/header.php');
include('check_login_sv.php');
$sv_id = $_SESSION['sinh_vien'];
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
                <a href="index.php" title="Logo">
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
                <form class="form-inline md-form mb-0">
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


    <div class="back_sv">
        <div class="table-responsive container ">
            <button class="btn btn-danger"><a href="index.php">Quay lai </a></button>
            <table class="table">
                <tr>
                    <th>Học phần</th>
                    <th>Tên học phần</th>
                    <th>Trạng thái</th>
                    <th>SV tối đa</th>
                    <th>Số sinh viên đã ĐK</th>
                    <th>Tên phòng</th>
                    <th>Tuần học</th>
                    <th>Giờ học</th>
                    <th>Trạng thái đăng ký</th>
                </tr>
                <?php
                $sv_id = $_SESSION['sinh_vien'];
                $search = $_GET['q'];
                $sql = "SELECT DISTINCT  * FROM dang_ki_tin_chi WHERE lop_ten_hoc_phan LIKE '%$search%' ";
                $res = mysqli_query($conn, $sql);
                if ($res == TRUE) {
                    $count = mysqli_num_rows($res);
                    if ($count > 0) {
                        while ($rows = mysqli_fetch_assoc($res)) {
                            $lop_id = $rows['lop_id'];

                            $lop_ten_hoc_phan = $rows['lop_ten_hoc_phan'];
                            $lop_trang_thai = $rows['lop_trang_thai'];
                            $lop_max_sv    = $rows['lop_max_sv'];
                            $lop_current_sv = $rows['lop_current_sv'];
                            $lop_ten_phong    = $rows['lop_ten_phong'];
                            $lop_tuan_hoc    = $rows['lop_tuan_hoc'];
                            $lop_gio_hoc    = $rows['lop_gio_hoc'];
                            $lop_trang_thai_dang_ki    = $rows['lop_trang_thai_dang_ki'];

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
                    } else {
                        echo "<h1>Tên học phần không chính xác</h1>";
                    }
                }
                ?>
            </table>
        </div>
    </div>
 <?php include('../index_sv/footer.php') ?>
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
   
