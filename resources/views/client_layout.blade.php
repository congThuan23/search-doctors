<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/frontend/trinhdonangluc.css') }}" />
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
                    <li><a class="dropdown-item" href="{{URL::to('/worktime')}}">Lich trình làm việc</a></li>
                    <li>
                        <a class="dropdown-item" href="{{route('trinhdo')}}">Trình độ năng lực</a>
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
            @yield('client_content')
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


<script type="text/javascript">
    $('#doctor_search').keyup(function (){
        const query = $(this).val();
        if(query != ''){
            const _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url:"{{url('/autocomplete-ajax')}}",
                method: "POST",
                data: {query:query, _token:_token},
                success:function (data){
                    $('#search_ajax').fadeIn();
                    $('#search_ajax').html(data);
                }
            });
        }else {
            $('#search_ajax').fadeOut();
        }
    });
    $(document).on('click','.li_search_ajax',function (){
       $('#doctor_search').val($(this).text());
       $('#search_ajax').fadeOut();
    });
</script>

</body>
</html>
