<?php
include('../index/header.php');
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
                <li class="nav-item ">
                    <a class="nav-link" href="dangki.php"><i class="far fa-calendar-alt me-1"></i>Các môn đăng kí học</a>
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
        <h3 class="text-center py-4">Các môn đã đăng kí</h3>
     
       

        <table class="table">
            <thead class="bg-primary">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên học phần</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Tổng sinh viên</th>
                    <th scope="col">Số sinh viên</th>
                    <th scope="col">Tên phòng</th>
                    <th scope="col">Tuần học</th>
                    <th scope="col">Gio học</th>
                    <th scope="col">Trạng thái đăng kí</th>
                    <th scope="col">Đăng kí</th>
                    <th scope="col">Hủy đăng kí</th>
                </tr>
            </thead>
            <?php
            $id = $_SESSION['sinh_vien'];
            $sql = "SELECT DISTINCT * FROM `dang_ki_tin_chi` JOIN relation_sv_mh , sinh_vien WHERE sinh_vien.sv_id = relation_sv_mh.sv_id AND relation_sv_mh.lop_id = dang_ki_tin_chi.lop_id AND sinh_vien.sv_id = '$id'";
            $res = mysqli_query($conn, $sql);
            $count =  mysqli_num_rows($res);
            if ($count > 0) {
                $i = 1;
                while ($row = mysqli_fetch_assoc($res)) {
                    echo '<tbody>';
                    echo '<tr>';
                    echo '<td>' . $i++ . '</td>';
                    echo '<td>' . $row['lop_ten_hoc_phan'] . '</td>';
                    echo '<td>' . $row['lop_trang_thai'] . '</td>';
                    echo '<td>' . $row['lop_max_sv'] . '</td>';
                    echo '<td>' . $row['lop_current_sv'] . '</td>';
                    echo '<td>' . $row['lop_ten_phong'] . '</td>';
                    echo '<td>' . $row['lop_tuan_hoc'] . '</td>';
                    echo '<td>' . $row['lop_gio_hoc'] . '</td>';
                    echo '<td>' . $row['lop_trang_thai_dang_ki'] . '</td>';
                    echo '<td><i class="fas fa-check-circle text-success"></i></td>';
                    echo '<td><a href="cancelSubject.php?lop_id=' . $row['lop_id'] . '&sv_id=' . $id . '" class ="text-danger">Hủy</a></td>';

                    echo '</tr>';
                    echo '</tbody>';
                }
            } else {
                echo "<h6>Bạn chưa đăng kí môn học nào cả</h6>";
            }
            ?>



        </table>

    </div>
</div>
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
</table>
</div>

</div>
<div class="end"></div>


