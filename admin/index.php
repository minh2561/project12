<?php 
    include './header.php';
    include './check_login_admin.php';
    $trang_thai = '';
    $sql = "SELECT * FROM admin";
    $result = mysqli_query($conn, $sql); 
    if(mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_assoc($result);
        if($row['trang_thai'] == 'Đóng'){
            $trang_thai = 'Đóng';
        }else{
            $trang_thai = 'Mở';
        }
    }
?>

    <div class="img_back">
    <?php
             if(isset($_SESSION['add']))
             {
                 echo $_SESSION['add']; //Displaying Session Message
                 unset($_SESSION['add']); //REmoving Session Message
             } 
             if(isset($_SESSION['delete']))
             {
                 echo $_SESSION['delete']; //Displaying Session Message
                 unset($_SESSION['delete']); //REmoving Session Message
             } 
             if(isset($_SESSION['update']))
             {
                 echo $_SESSION['update']; //Displaying Session Message
                 unset($_SESSION['update']); //REmoving Session Message
             } 

            ?>

            <!-- toggle switch  -->
<div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    
    <button class="navbar-toggler btn btn-danger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item bt-group">
        <span><button class="btn btn-danger disabled" >Học kì: <?php echo $trang_thai ?></button></span>
        <button class="btn btn-outline-danger" ><a href="trangThai.php?trang_thai=<?php echo $trang_thai ?>">Đóng/Mở</a></button>
        </li>
      </ul>
      <form class="d-flex navbar-nav mb-7 mb-lg-0">
        <button class="btn btn-danger" type="button"><a href="../index/logout.php">Đăng xuất</a></button>
      </form>
    </div>
  </div>
</nav>



            </div>
        <div class="tieu_de">Thông tin môn học</div>
        <div class="row cot0">
            <div class="col-sm-2 cot cot1">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">                           
                                <div class="container_swap">
                                    <div class="div_left">Môn học </div>
                                    <div class="div_right"><a href="./subject/addSubject.php"><i class="bi bi-clipboard-plus"></i></a></div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
            <?php
                $sql = "SELECT * FROM mon_hoc";
                $result = mysqli_query($conn, $sql); 
                if(mysqli_num_rows($result)>0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                           <th scope="row"><button type="button" class="btn btn-danger" onclick="handleDetails('<?php echo $row['mh_id'] ?>')"><?php echo $row['mh_ten_mon'] ?></button>
                           <div class="div_right"><a href="subject/updateSubject.php?mh_id=<?php echo $row['mh_id'] ?>"><i class="fas fa-pencil-alt"></i></a></div>
                           <div class="div_right"><a href="subject/deleteSubject.php?mh_id=<?php echo $row['mh_id'] ?>"><i class="fas fa-eraser"></i></a></div>
                       </tr>
                    <?php }
                }
            ?>  
                    </tbody>
                </table>
            </div>        
        
            
            <div class="col-sm-10 cot cot2">
                <div class="cot2_1">Lớp học phần<hr></div>    
                <div class="bang_monhoc">
                <table id="tableSubject" >
                    <thead class="bg-primary_sv">
                    <tr>
                    <th>STT</th>
                    <th>Tên học phần</th>
                    <th>Trạng thái</th>
                    <th>Max-SV</th>
                    <th>Số lượng ĐK</th>
                    <th>Tên phòng</th>
                    <th>Tuần học</th>
                    <th>Thời gian bắt đầu(h)</th>
                    <th>Trạng thái đăng ký</th>
                    <th>Giáo viên</th>
                </tr>
                <thead>
                <tbody>
            </tbody>
                </table>  
                </div>  
                <div id="addClass"></div>        
            </div>
            
        </div>
    </div>
    <div class="end"></div>

    
<?php
    include '../index/footer.php';
?>

<script>    
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
                console.log(data)
            }
        })

         // nut them lop moi 

        $("#addClass").append(`<a href="class/addClass.php?mh_id=${mh_id}">Thêm lớp mới</a>`)

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
        <td>${data.lop_trang_thai_dang_ki} </td>
        <td >${data.gv_ten}</td>        
        <td><a href="class/updateClass.php?lop_id=${data.lop_id}&mh_id=${mh_id}">Sửa</a></td>
        <td><a href="class/deleteClass.php?lop_id=${data.lop_id}">Xóa</a></td>
    </tr>
    `)  
    })        
    }};

</script>