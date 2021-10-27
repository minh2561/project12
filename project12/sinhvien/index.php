<?php
include 'header-sinhvien.php';
include 'menu.php';
?>
<div class="main-content">
<div class="wrapper">
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
        include '../config.php';
        $sql = "SELECT * FROM dang_ki_tin_chi";
        $res = mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0){
           
            while($row=mysqli_fetch_assoc($res)){
                echo '<tbody>';
                echo '<tr>';
                echo '<td>'.$row['lop_id'].'</td>';
                echo '<td>'.$row['lop_hoc_phan'].'</td>';
                echo '<td>'.$row['lop_ten_hoc_phan'].'</td>';
                echo '<td>'.$row['lop_trang_thai'].'</td>';
                echo '<td>'.$row['lop_max_sv'].'</td>';
                echo '<td>'.$row['lop_current_sv'].'</td>';
                echo '<td>'.$row['lop_ten_phong'].'</td>';
                echo '<td>'.$row['lop_tuan_hoc'].'</td>'; 
                echo '<td>'.$row['lop_gio_hoc'].'</td>';
                echo '<td>'.$row['lop_trang_thai_dang_ki'].'</td>'; 
                echo '<td><a href ="result.php?id='.$row['lop_id'].'" ><i class="fas fa-check-circle text-success"></i></a></td>'; 
                
                echo '</tr>';
                echo '</tbody>';
              
            }
        }
        ?>


        
    </table>
    
</div>
</div>

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
<?php
include '../index/footer.php'
?>
