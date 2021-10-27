<?php
include '../sinhvien/header-sinhvien.php';
include 'menu.php';
?>
<div class="main-content">
<div class="wrapper">
    <h1>Môn học</h1>
    
    <table class="table">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Lớp học phần</th>
            <th scope="col">Tên học phần</th>
            <th scope="col">Tổng sinh viên</th>
            <th scope="col">Số sinh viên</th>
            <th scope="col">Tên phòng</th>
            <th scope="col">Tuần học</th>
            <th scope="col">Giờ học</th>
            <th scope="col">Chỉnh sửa</th>   
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
                echo '<td>'.$row['lop_max_sv'].'</td>';
                echo '<td>'.$row['lop_current_sv'].'</td>';
                echo '<td>'.$row['lop_ten_phong'].'</td>';
                echo '<td>'.$row['lop_tuan_hoc'].'</td>'; 
                echo '<td>'.$row['lop_gio_hoc'].'</td>';
                echo '<td><a href ="edit.php?id='.$row['lop_id'].'" ><i class="fas fa-edit"></i></a></td>'; 
                
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
