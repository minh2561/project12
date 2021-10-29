<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="../css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Hello, world!</title>
    <style>
        .main-content {
           height: 80vh;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-danger">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item ">
                        <a class="nav-link" href="#"><i class="fas fa-home me-1"></i>Trang chủ</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#"><i class="fas fa-pencil-alt me-1"></i>Đăng kí học</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#"><i class="far fa-calendar-alt me-1"></i>Các môn đăng kí học</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt me-1"></i>Đăng xuất</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <div class="main-content bg-light">
        <div class="container">
            <h3 class="text-center py-4">Đăng kí học</h3>
            <form class="d-flex px-5 mb-4">
                <input class="form-control me-2 " type="search" placeholder="Nhập môn học muốn đăng kí">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            <table class="table">
                <thead class ="bg-primary">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Lớp học phần</th>
                        <th scope="col">Tên học phần</th>
                        <th scope="col">Tổng sinh viên</th>
                        <th scope="col">Số sinh viên</th>z
                        <th scope="col">Tên phòng</th>
                        <th scope="col">Tuần học</th>
                        <th scope="col">Gio học</th>
                        <th scope="col">Trạng thái đăng kí</th>
                        <th scope="col">Đăng kí</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>cntt</td>
                        <td>Công nghệ thông tin</td>

                        <td>70</td>
                        <td>50</td>
                        <td>230-A3</td>
                        <td>8</td>
                        <td>10</td>
                        <td>còn</td>
                        <td><a href="" class=""><i class="fas fa-check-circle text-success"></i></a></td>
                    </tr>
                    <tr>
                        <th>1</th>
                        <td>cntt</td>
                        <td>Công nghệ thông tin</td>
                        <td>chưa học</td>
                        <td>70</td>
                        <td>50</td>
                        <td>230-A3</td>
                        <td>8</td>
                        <td>còn</td>

                        <td><a href="" class=""><i class="fas fa-check-circle text-success"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <div class="end"></div>
    <?php
    include '../index/footer.php';
    ?>