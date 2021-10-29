<?php
    include '../index/header.php';
?>
    <div class="img_back">
        <div class="tieu_de">Thông tin môn học</div>
        <div class="row cot0">
            <div class="col-sm-2 cot cot1">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">                           
                                <div class="container_swap">
                                    <div class="div_left">Môn học </div>
                                    <div class="div_right"><a href="./subject/add_subject.php"><i class="bi bi-clipboard-plus"></i></a></div>
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
                           <th scope="row"><button type="button" class="btn btn-outline-secondary" onclick="handleDetails('<?php echo $row['mh_id'] ?>')"><?php echo $row['mh_ten_mon'] ?></button>
                           <div class="div_right"><a href="#"><i class="fas fa-pencil-alt"></i></a></div>
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
                <tr>
                    <th>STT </th>
                    <th>Lớp học phần </th>
                    <th>Lớp tên học phần</th>
                    <th>Lớp trạng thái</th>
                    <th>Lớp(max)</th>
                    <th>Lớp(đã đăng ký)</th>
                    <th>Tên phòng học</th>
                    <th>Tuần học</th>
                    <th>Thời gian học</th>
                    <th>Trạng thái đăng ký</th>
                    <th>Xóa</th>
                </tr>
                </table>            
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
        // $("#tableSubject > tbody:last-child").remove();
        await $.ajax({
            url:`getSubject.php?mh_id=${mh_id}`,
            type:"get",
            success:function(response){
                data = JSON.parse(response); 
            }
        })
        
        $.each(data.users,function(i,data){
            
        $("#tableSubject > tbody:last-child").append(`
    <tr>
        <td>${++i}</td>
        <td>${data.lop_hoc_phan} </td>
        <td>${data.lop_ten_hoc_phan	} </td>
        <td>${data.lop_trang_thai	} </td>
        <td>${data.lop_max_sv} </td>
        <td>${data.lop_current_sv} </td>
        <td>${data.lop_ten_phong} </td>
        <td>${data.lop_tuan_hoc} </td>
        <td>${data.lop_gio_hoc	} </td>
        <td>${data.lop_trang_thai_dang_ki} </td>
    </tr>
    `)
    })

    }
</script>
