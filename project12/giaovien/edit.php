<?php
include '../sinhvien/header-sinhvien.php';
include 'menu.php';
include '../config.php';
$id = $_GET['id'];
$sql = "SELECT * FROM dang_ki_tin_chi WHERE lop_id = '$id'";
$result = mysqli_query($conn, $sql);
if($result==true){
    $count = mysqli_num_rows($result);
    if ($count == 1){
        $row = mysqli_fetch_assoc($result);
    }
}
?>
<div class="main-content">
    <div class="wrapper">
        <h2>Sửa thông tin môn học</h2>
    
    <form action="process-edit.php" method="POST">
  <div class="mb-3">
    <label for="subject" class="form-label">Lớp học phần</label>
    <input type="text" class="form-control" id="subject" name="txtSubject">
  </div>
  <div class="mb-3">
    <label for="subjectName" class="form-label">Tên học phần</label>
    <input type="text" class="form-control" id="subjectName" name="txtSubjectName">
  </div>
  <div class="mb-3">
    <label for="classSum" class="form-label">Tổng sinh viên</label>
    <input type="text" class="form-control" id="classSum" name="txtSum">
  </div>
  <div class="mb-3">
    <label for="txtClassName" class="form-label">Tên phòng</label>
    <input type="text" class="form-control" id="className" name="txtClassName">
  </div>
  <div class="mb-3">
    <label for="date" class="form-label">Tuần học</label>
    <input type="text" class="form-control" id="date" name="txtDate">
  </div>
  <div class="mb-3">
    <label for="time" class="form-label">Giờ học</label>
    <input type="text" class="form-control" id="time" name="txtTime">
  </div>
  <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Cập nhật " class="btn btn-success">
            </td>
  
  
</form>
    </div>
</div>