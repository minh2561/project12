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
                                    <div class="div_right"><a href="#"><i class="bi bi-clipboard-plus"></i></a></div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
            <?php
                include './config.php';
                $sql = "SELECT * FROM mon_hoc";
                $result = mysqli_query($conn, $sql); 
                if(mysqli_num_rows($result)>0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                            echo '<th scope="row">';
                                echo '<div class="container_swap">';
                                    echo '<div class="div_left"><a href="#">'.$row['mh_ten_mon'].'</div>';
                                    echo '<div class="div_right"><a href="#"><i class="fas fa-pencil-alt"></i></a></div>';
                                echo '</div>';
                            echo '</th>';
                        echo '</tr>';
                    }
                }
            ?>  
                    </tbody>
                </table>
            </div>        
        
    
        
        
            
            
            
            
            <div class="col-sm-10 cot cot2">
                <div class="cot2_1">Lớp học phần<hr></div>                
            </div>
        </div>
    </div>
    <div class="end"></div>
        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    



    
    <!-- <h1 class="minh">
	    <span data-z data-z-fade="true" data-z-layers="10" data-z-depth=".25em">🔥</span>
    </h1> -->
    <script src="https://bennettfeely.com/ztext/js/ztext.min.js"></script>

<?php
    include '../index/footer.php';
?>
