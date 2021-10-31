<?php
   
    include '../index/header.php';
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
    <span>học kì : <?php echo $trang_thai ?></span>
    <button class="btn" ><a href="trangThai.php?trang_thai=<?php echo $trang_thai ?>">Thay đổi</a></button>
            </div>
            <!-- toggle switch  -->
        <div class="tieu_de">Thông tin môn học</div>
        <div class="row cot0">
            <div class="col-sm-2 cot cot1">
                <a href="../index/logout.php">Log out</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Môn học</th>
                        </tr>
                        <tr>
                            <th scope="col"><a href="./subject/addSubject.php">Add Môn học</a></th>
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
                           <th scope="row"><button onclick="handleDetails('<?php echo $row['mh_id'] ?>')"><?php echo $row['mh_ten_mon'] ?></button>
                           <th scope="row"><a href="subject/updateSubject.php?mh_id=<?php echo $row['mh_id'] ?>">Sua</a></th>
                           <th scope="row"><a href="subject/deleteSubject.php?mh_id=<?php echo $row['mh_id'] ?>">Xoa</a></th>
                       </tr>
                    <?php }
                }
            ?>  
                    </tbody>
                </table>
            </div>        
        
            
            <div class="col-sm-10 cot cot2">
                <div class="cot2_1">Lớp học phần<hr></div>    
                <table id="tableSubject" >
                    <thead>
                <tr>
                    <th>stt</th>
                    <th>ten_hoc_phan</th>
                    <th>trang_thai</th>
                    <th>max_sv</th>
                    <th>current_sv</th>
                    <th>ten_phong</th>
                    <th>tuan_hoc</th>
                    <th>gio_hoc</th>
                    <th>trang_thai_dang_ki</th>
                    <th> Giao vien </th>
                </tr>
                <thead>
                <tbody>
            </tbody>
                </table>    
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

        $("#addClass").append(`<a href="class/addClass.php?mh_id=${mh_id}">them lop moi</a>`)

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
        <td><a href="class/updateClass.php?lop_id=${data.lop_id}&mh_id=${mh_id}">Sua </a></td>
        <td><a href="class/deleteClass.php?lop_id=${data.lop_id}">Xoa</a></td>
    </tr>
    `)  
    })        
    }};

    // function test(gv_id){
    //     alert("aaaaaa")
    //     var data ;
    //     await $.ajax({
    //         url:`getGv.php?gv_id=${gv_id}`,
    //         type:"get",
    //         success:function(response){
    //             console.log(response)
    //             data = response; 
    //         }
    //     })
    //     console.log(data)
    //     return data;
    // }

</script>
