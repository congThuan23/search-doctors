<!DOCTYPE html>
<html lang="en">
<?php

 $message = Session::get('message');
                if (isset($message)){ ?>
                <div class="alert alert-danger" style="color: red; margin-top: 10px; margin-bottom: 10px;">
                    <strong>Thông báo! </strong> <?php echo $message;
                    Session::put('message', null); // chỉ cho hiển thị một lần ?>
                </div>
                <?php } ?>
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet"  href="{{ asset('public/frontend/capnhatthongtin.css') }}" />
  <title>Document</title>
  <!-- CSS only -->
  <link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
  crossorigin="anonymous"
  />
  <script
  src="https://kit.fontawesome.com/ece145a5a4.js"
  crossorigin="anonymous"
  ></script>
  <link
  rel="stylesheet"
  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
  />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php
use Illuminate\Support\Facades\Session;
$name = Session::get('username');
$id = Session::get('userid');

?>
  <section>
    <div class="container">
        <div class="row">
            <div class="col-md-3 img">
                <img
                    src="{{ asset('public/frontend/img/284659317_700972667824995_6151864105056043416_n.png') }}"
                    alt=""
                    class="img-fuild"
                />
            </div>
            <div
                class="col-md-6 d-flex align-items-center justify-content-center"
            >
                <div class="text-center halaa">
                    <h3 class="three" style="color: #00204a">HỆ THỐNG TÌM KIẾM THÔNG TIN BÁC SĨ</h3>
                    <h4 class="four" style="color: #00204a">
                        BỆNH VIỆN ĐÀ NẴNG - DANANG HOSPITAL
                    </h4>
                    <h4 class="four" style="color: #00204a">124 Hải Phòng,Thành Phố Đà Nẵng</h4>
                </div>
            </div>
            <div
                class="col-md-3 d-flex align-items-center justify-content-center"
            >
                <form>
                    <div class="input-group ">
                        <input
                            type="text"
                            class="form-control search"
                            placeholder="Tìm kiếm"
                        />
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div style="margin-left:10px ;">
                    <img src="./img/fa_youtube-square.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"
                    >Trang chủ</a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#"
                    >Giới thiệu chung</a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Bác sĩ yêu thích</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Dịch vụ y khoa</a>
                </li>

            </ul>
            <li class="nav-item dropdown ms-auto" style="list-style:none; margin-right: 120px">
                <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="navbarDropdownMenuLink"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    style="color: #def7ff; padding: 0 !important; ;"
                >
                    <?php
                    $name = Session::get('username');
                    if(isset($name)){
                        echo "Xin chào, " .$name; }
                    else{
                        echo 'Bạn chưa có tài khoản? Đăng ký ngay.';
                    }
                  
                    ?>
                </a>
                <ul
                    class="dropdown-menu"
                    aria-labelledby="navbarDropdownMenuLink"
                >
                    <li><a class="dropdown-item" href="{{URL::to('/edituser')}}">Thông tin cá nhân</a></li>
                    <li><a class="dropdown-item" href="#">Lich trình làm việc</a></li>
                    <li>
                        <a class="dropdown-item" href="{{URL::to('/trinhdo')}}">Trình độ năng lực</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Đăng xuất</a>
                    </li>
                </ul>
            </li>
        </div>
    </div>
</nav>
<div class="container-full rong" style="padding: 40px 40px 0 40px">
  <div class="row">
    <div class="col-md-9">

      <div class="find-a-doctoc__doctor-list-wrapper">
        <div class="find-a-doctor__result">
          <div class="row">
            <div class="col-md-12">
              <h5 class="ng-bindin text-white"> LỊCH TRÌNH LÀM VIỆC</h5>
            </div>
          </div>
        </div>
        <div class="find-a-doctoc__doctor-list">
          <div class="row huma">
            <div class="col-md-4 me">
             <img
             src="https://www.fvhospital.com/wp-content/uploads/2021/11/Dr-Nguyen-Anh-Hoang.jpg"
             width="400"
             height="400"
             alt=""
             class="people img-fuild"
             />             
           </div>
                <div class="col-md-8" >
       <div class="row" style="display:flex ;">
        <table class="table table-striped" id="table1">
          <thead>
            <tr>
              <th>Ngày</th>
              <th>Thời Gian</th>
              <th>Địa điểm</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
           @foreach ($dbWorkTime as $key => $item)
           <tr>
            <td>{{ $item->Date }}</td>
            <td>{{ $item->Start }} - {{ $item->Finish }}</td>
            <td>{{ $item->Location }}</td>
            <td>
              <a href="{{URL::to('/worktime/update/'.$item->WorkTimeID)}}"
              class="btn btn-success rounded-pill">Sửa</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>


    <div class="row">
      <div class="col-md-12">
        <div class="brder"></div>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col md-12 text-center">
        <a href="{{URL::to('/worktime/add')}}" class="btn btn-info rounded-pill">Thêm mới</a>
{{--                                <button href="" class="btn btn-info">Thêm mới</button>--}}
      </div>
    </div>
  </div>

</div>
</div>
</div>
</div>
<div class="col-md-3">
  <div class="row">
    <div class="col-md-12">
      <div class="widget__news">
        <h6 class="title--blue-banner text-center text-white">
          TIN TỨC
        </h6>
        <ul class="widget__news__listing">
          <li>
            <a href=""
            >Bệnh viện Đà Nẵng chúc mừng thư ký thế giới năm 2022</a
            >
          </li>
          <li>
            <a href="">
              Sự kiện tồn vinh nhiên viên xét nghiệm y khoa 2022 tại
              bệnh viện Đà Nẵng</a
              >
            </li>
            <li>
              <a href="">
                Bậc thầy ghép giác mạc thế giới trở lại Bệnh viện FV, mang
                đến cơ hội sáng mắt cho nhiều bệnh nhân Việt Nam</a
                >
              </li>
              <li>
                <a href=""
                >Bệnh Viện FV Triển Khai Tầm Soát Bệnh Lý Bàn Chân Bẹt
                Miễn Phí Dành Cho Trẻ Em</a
                >
              </li>
              <li>
                <a href=""
                >Bệnh Viện FV Chúc Mừng Ngày Điều Dưỡng Thế Giới 2022
                Trong Không Khí Ngập Tràn Niềm Vui</a
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<header>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="text-center">
          <li>
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-telegram"></i>
          </li>
        </ul>
        <div class="tittle">
          <p class="text-center text-white font-weight-bold h5">
            Coppy 2022. Da Nang Gerane Hospital
          </p>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- JavaScript Bundle with Popper -->
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
crossorigin="anonymous"
></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
  .create( document.querySelector( '#mota' ) )
  .then( editor => {
    console.log( editor );
  } )
  .catch( error => {
    console.error( error );
  } );    
</script>
<script>
  ClassicEditor
  .create( document.querySelector( '#kinhnghiem' ) )
  .then( editor => {
    console.log( editor );
  } )
  .catch( error => {
    console.error( error );
  } );    
</script>
<script>
  ClassicEditor
  .create( document.querySelector( '#ctnc' ) )
  .then( editor => {
    console.log( editor );
  } )
  .catch( error => {
    console.error( error );
  } );    
</script>
</body>
</html>