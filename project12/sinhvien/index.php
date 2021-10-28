<?php
 include('../index/header.php');
include('menu.php');
include('check_login_sv.php');
?>
<div class="main-content">
<div class="wrapper">
    <?php 
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add']; //Displaying Session Message
            unset($_SESSION['add']); //REmoving Session Message
        }
    ?>
    <h1>Đăng kí học</h1>
    <div>
        <input type="text" placeholder="Nhập tên môn học" onchange="handleGetName(this.value)">
        <button class="btn btn-primary" id="btnSearch"><a id="hrefSearch">Tìm kiếm</a></button>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Lớp học phần</th>
            <th scope="col">Tên học phần</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Tổng sinh viên</th>
            <th scope="col">Số sinh viên</th>
            <th scope="col">Tên phòng</th>
            <th scope="col">Tuần học</th>
            <th scope="col">Gio học</th>
            <th scope="col">Trạng thái đăng kí</th>
            <th scope="col">Đăng kí</th>   
        </tr>
        </thead>
        <?php
        $id = $_SESSION['sinh_vien'];
        $sql = "SELECT * FROM `dang_ki_tin_chi` JOIN relation_sv_mh , sinh_vien WHERE sinh_vien.sv_id = relation_sv_mh.sv_id AND relation_sv_mh.lop_id = dang_ki_tin_chi.lop_id AND sinh_vien.sv_id = '$id'";
        $res = mysqli_query($conn,$sql);
        $count =  mysqli_num_rows($res);
        if($count > 0){
            $i = 1;
            while($row=mysqli_fetch_assoc($res)){
                echo '<tbody>';
                echo '<tr>';
                echo '<td>'.$i++.'</td>';
                echo '<td>'.$row['lop_hoc_phan'].'</td>';
                echo '<td>'.$row['lop_ten_hoc_phan'].'</td>';
                echo '<td>'.$row['lop_trang_thai'].'</td>';
                echo '<td>'.$row['lop_max_sv'].'</td>';
                echo '<td>'.$row['lop_current_sv'].'</td>';
                echo '<td>'.$row['lop_ten_phong'].'</td>';
                echo '<td>'.$row['lop_tuan_hoc'].'</td>'; 
                echo '<td>'.$row['lop_gio_hoc'].'</td>';
                echo '<td>'.$row['lop_trang_thai_dang_ki'].'</td>'; 
                echo '<td><i class="fas fa-check-circle text-success"></i></td>'; 
                echo '<td><a href="cancelSubject.php?lop_id='.$row['lop_id'].'&sv_id='.$id.'">Huy</a></td>'; 
                
                echo '</tr>';
                echo '</tbody>';
              
            }
        }else{
            echo "<h1>Ban chua dang ki mon hoc nao ca</h1>";
        }
        ?>


        
    </table>
    
</div>
</div>
<?php
include('../index/footer.php');
?>
<script>
    var search ;
function handleGetName(value){
    search = value;
}

$(document).ready(async function(){
    $("#btnSearch").click(function(){
        $("#hrefSearch").attr("href",`search.php?q=${search}`)
    })
})

</script>

