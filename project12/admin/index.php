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
                            <th scope="col">Môn học</th>
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
                    <th>stt</th>
                    <th>lop_hoc_phan</th>
                    <th>lop_ten_hoc_phan</th>
                    <th>lop_trang_thai</th>
                    <th>lop_max_sv</th>
                    <th>lop_current_sv</th>
                    <th>lop_ten_phong</th>
                    <th>lop_tuan_hoc</th>
                    <th>lop_gio_hoc</th>
                    <th>lop_trang_thai_dang_ki</th>
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