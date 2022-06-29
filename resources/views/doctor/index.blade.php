
@extends('client_layout')
@section('client_content')
    <div class="row">
        <div class="col-md-12">
            <div class="find-a-doctor__quick-search">
                <div>
                    <h3 style="color: #00204a">Tìm kiếm nhanh</h3>
                    <form class="ng-pristine ng-valid" method="get" action="{{URL::to('/home')}}" class="navbar-form navbar-left" role="search">
                        <div
                            class="form-group form__medical-speciality"
                            style="margin-top: 20px"
                        >
                            <h5 style="color: #00204a">Chuyên khoa</h5>
                            <div class="btn-group" style="width: 100%">
                                <select
                                    id="dept_search"
                                    name="dept_search"
                                    class="form-control ng-pristine ng-untouched ng-valid ng-not-empty"
                                    ng-init="selectedSpeciality='0'"
                                    ng-model="selectedSpeciality"
                                    ng-change="searchDoctors()"
                                >
                                    <option
                                        style="font-size: 14px"
                                        value="0"
                                        selected="selected"
                                    >
                                        Tất Cả Chuyên Khoa
                                    </option>
                                    <option
                                        disabled=""
                                        style="font-size: 14px"
                                        value="669"
                                    >
                                        Chuyên khoa trị liệu thần kinh cột sống ACC
                                    </option>
                                    <option
                                        disabled=""
                                        style="font-size: 14px"
                                        value="665"
                                    >
                                        Dịch vụ COVID-19
                                    </option>
                                    <option style="font-size: 14px" value="666">
                                        &nbsp;&nbsp;Khoa điều trị COVID-19
                                    </option>
                                    <option disabled="" style="font-size: 14px" value="5">
                                        Các Chuyên Khoa Nội
                                    </option>
                                    <option style="font-size: 14px" value="6">
                                        &nbsp;&nbsp;Khoa Cấp Cứu
                                    </option>
                                    <option style="font-size: 14px" value="14">
                                        &nbsp;&nbsp;Khoa Gây Mê Hồi Sức
                                    </option>
                                    <option style="font-size: 14px" value="10">
                                        &nbsp;&nbsp;Chuyên Khoa Tim
                                    </option>
                                    <option style="font-size: 14px" value="16">
                                        &nbsp;&nbsp;Khoa Tâm lý Lâm Sàng
                                    </option>
                                    <option style="font-size: 14px" value="11">
                                        &nbsp;&nbsp;Khoa Da Liễu
                                    </option>
                                    <option style="font-size: 14px" value="32">
                                        &nbsp;&nbsp;Khoa Dinh Dưỡng
                                    </option>
                                    <option style="font-size: 14px" value="585">
                                        &nbsp;&nbsp;Trung tâm Điều trị &amp; Chăm sóc Da
                                        bằng Laser FV
                                    </option>
                                    <option style="font-size: 14px" value="12">
                                        &nbsp;&nbsp;Chuyên Khoa Tiêu Hóa &amp; Gan Mật
                                    </option>
                                    <option style="font-size: 14px" value="7">
                                        &nbsp;&nbsp;Khoa Nội Đa Khoa
                                    </option>
                                    <option style="font-size: 14px" value="13">
                                        &nbsp;&nbsp;Trung Tâm Điều Trị Ung Thư Hy Vọng
                                    </option>
                                    <option style="font-size: 14px" value="9">
                                        &nbsp;&nbsp;Khoa Nội
                                    </option>
                                    <option style="font-size: 14px" value="8">
                                        &nbsp;&nbsp;Khoa Nhi và Nhi sơ sinh
                                    </option>
                                    <option style="font-size: 14px" value="15">
                                        &nbsp;&nbsp;Trung tâm Điều trị Đau
                                    </option>
                                    <option style="font-size: 14px" value="663">
                                        &nbsp;&nbsp;Khoa Y Học Cổ Truyền
                                    </option>
                                    <option
                                        disabled=""
                                        style="font-size: 14px"
                                        value="28"
                                    >
                                        Các Dịch Vụ Hỗ Trợ
                                    </option>
                                    <option style="font-size: 14px" value="29">
                                        &nbsp;&nbsp;Khoa Chẩn Đoán Hình Ảnh
                                    </option>
                                    <option style="font-size: 14px" value="31">
                                        &nbsp;&nbsp;Khoa Xét Nghiệm &amp; Ngân Hàng Máu
                                    </option>
                                    <option style="font-size: 14px" value="30">
                                        &nbsp;&nbsp;Khoa Y Học Hạt Nhân
                                    </option>
                                    <option style="font-size: 14px" value="33">
                                        &nbsp;&nbsp;Khoa Vật Lý Trị Liệu Và Phục Hồi Chức
                                        Năng
                                    </option>
                                    <option
                                        disabled=""
                                        style="font-size: 14px"
                                        value="17"
                                    >
                                        Các chuyên Khoa Ngoại
                                    </option>
                                    <option style="font-size: 14px" value="19">
                                        &nbsp;&nbsp;Khoa Chấn Thương Chỉnh Hình
                                    </option>
                                    <option style="font-size: 14px" value="26">
                                        &nbsp;&nbsp;Viện Thẩm mỹ FV Lifestyle
                                    </option>
                                    <option style="font-size: 14px" value="18">
                                        &nbsp;&nbsp;Khoa Ngoại Tổng Quát
                                    </option>
                                    <option style="font-size: 14px" value="24">
                                        &nbsp;&nbsp;Khoa Nha &amp; Phẫu Thuật Hàm Mặt
                                    </option>
                                    <option style="font-size: 14px" value="27">
                                        &nbsp;&nbsp;Ngoại Thần Kinh Và Can Thiệp Nội Mạch
                                        Thần Kinh
                                    </option>
                                    <option style="font-size: 14px" value="21">
                                        &nbsp;&nbsp;Khoa Sản Phụ khoa Trung tâm điều trị
                                        bệnh lý tuyến vú
                                    </option>
                                    <option style="font-size: 14px" value="25">
                                        &nbsp;&nbsp;Khoa Mắt và Phẫu thuật khúc xạ
                                    </option>
                                    <option style="font-size: 14px" value="23">
                                        &nbsp;&nbsp;Khoa Tai Mũi Họng
                                    </option>
                                    <option style="font-size: 14px" value="22">
                                        &nbsp;&nbsp;Khoa Tiết Niệu &amp; Nam Khoa
                                    </option>
                                    <option style="font-size: 14px" value="20">
                                        &nbsp;&nbsp;Khoa Phẫu Thuật Mạch Máu
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div
                            class="form-group form__medical-speciality"
                            style="margin-top: 10px"
                        >
                            <h5 style="color: #00204a">Tên bác sĩ</h5>
                            <input
                                name="doctor_search"
                                id="doctor_search"
                                class="form-control ng-pristine ng-untouched ng-valid ng-empty"
                                placeholder="Tên bác sĩ"
                                ng-model="search.name"
                            />
                        </div>
                        <div
                            class="form-group form__submit closee"
                            style="margin-top: 20px"
                        >
                            <button
                                class="btn btn-success"
                                ng-click="searchDoctors()"
                                style="margin-right: 10px"
                            >
                                Tìm kiếm
                            </button>
                            <a ng-click="reloadRoute()" class="btn btn-danger"
                            >Hủy Bỏ</a
                            >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="find-a-doctor__result" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <h5 class="ng-bindin text-white">Tất cả các bác sĩ</h5>
            </div>
        </div>
    </div>
    @foreach($all_doctor as $doctor)
    <div class="find-a-doctoc__doctor-list-wrapper">
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
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4 hui fix-tren ">
                            <label><strong>Họ Tên:</strong></label>
                        </div>
                        <div class="col-md-8 fix">
                            <h5 style="color: #00204a">{{$doctor->doctor_name}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 hui fix-tren ">
                            <label><strong>Học vị:</strong></label>
                        </div>
                        <div class="col-md-8 fix">
                            <p>{{$doctor->doctor_degree}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 hui fix-tren">
                            <label><strong>Học hàm:</strong></label>
                        </div>
                        <div class="col-md-8 fix">
                            <p>{{$doctor->doctor_academicRank}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 hui fix-tren">
                            <label><strong>Ngôn ngữ :</strong></label>
                        </div>
                        <div class="col-md-8 fix">
                            @foreach(DB::table('language_of_doctor')->get() as $item)
                                @if($doctor->UserID == $item->DoctorID)
                                    @foreach(DB::table('language')->get() as $language)
                                        @if($language->LanguageID == $item->LanguageID)
                                            <p style="display: inline-flex">{{$language->Language}},</p>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 hui fix-tren">
                            <label><strong>Chuyên khoa :</strong></label>
                        </div>
                        <div class="col-md-8 fix">
                            @foreach(DB::table('dept')->get() as $dept)
                                @if($doctor->DeptID == $dept->DeptID)
                                    <p>{{$dept->Name}}</p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="row hidden-xs">
                        <div class="col-md-4 hui fix-tren">
                            <label><strong>Chứng nhận:</strong></label>
                        </div>
                        <div class="col-md-8 ng-binding">
                            <p><strong>Trường Y</strong></p>
                            <ul>
                                <li>
                                    {{$doctor->doctor_certificate}}
                                </li>
                            </ul>
                            <p><strong>Đào tạo nâng cao</strong></p>
                            <ul>
                                <li>
                                    Điện tâm đồ, Đại học Y Khoa Phạm Ngọc Thạch, Thành phố
                                    Hồ Chí Minh, Việt Nam, 2018
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row hidden-xs">
                        <div class="col-md-4 hui fix-tren">
                            <label><strong>Kinh nghiệm:</strong></label>
                        </div>
                        <div class="col-md-8 ng-binding">
                            <p>
                                {{$doctor->doctor_experience}}
                            </p>
                        </div>
                    </div>
                    <div class="row hidden-xs">
                        <div class="col-md-4 hui fix-tren">
                            <label><strong>Công trình nghiên cứu:</strong></label>
                        </div>
                        <div class="col-md-8 ng-binding">
                            {{$doctor->doctor_researchWork}}
                        </div>
                    </div>
                    <div class="row hidden-xs">
                        <div class="col-md-4 hui fix-tren  ">
                            <label><strong>Lĩnh vực lâm sàn :</strong></label>
                        </div>
                        <div class="col-md-8 ng-binding">
                            {{$doctor->doctor_clinicalFields}}
                        </div>
                    </div>
                    <div class="tble">
                        <table class="table table-bordered text-center table-hover">
                            <thead
                                class="thead-primary"
                                style="background: #00bbf066"
                            >
                            <tr>
                                <th width="100">Ngày</th>
                                <th width="145">Thời gian</th>
                                <th>Địa điểm</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- ngRepeat: work_hour in doctor.working_hours -->
                            <tr
                                ng-repeat="work_hour in doctor.working_hours"
                                class="ng-scope"
                            >
                                <td class="center-content ng-binding">Thứ Hai</td>
                                <td class="center-content ng-binding">
                                    08:00 - 12:00
                                </td>
                                <td
                                    ng-bind-html="work_hour.location"
                                    class="ng-binding"
                                >
                                    <span>Bệnh viện FV - Tầng 2, tòa nhà F</span>
                                </td>
                            </tr>
                            <!-- end ngRepeat: work_hour in doctor.working_hours -->
                            <tr
                                ng-repeat="work_hour in doctor.working_hours"
                                class="ng-scope"
                            >
                                <td class="center-content ng-binding">Thứ Hai</td>
                                <td class="center-content ng-binding">
                                    13:00 - 17:00
                                </td>
                                <td
                                    ng-bind-html="work_hour.location"
                                    class="ng-binding"
                                >
                                    <span>Bệnh viện FV - Tầng 2, tòa nhà F</span>
                                </td>
                            </tr>
                            <!-- end ngRepeat: work_hour in doctor.working_hours -->
                            <tr
                                ng-repeat="work_hour in doctor.working_hours"
                                class="ng-scope"
                            >
                                <td class="center-content ng-binding">Thứ Ba</td>
                                <td class="center-content ng-binding">
                                    08:00 - 12:00
                                </td>
                                <td
                                    ng-bind-html="work_hour.location"
                                    class="ng-binding"
                                >
                                    <span>Bệnh viện FV - Tầng 2, tòa nhà F</span>
                                </td>
                            </tr>
                            <!-- end ngRepeat: work_hour in doctor.working_hours -->
                            <tr
                                ng-repeat="work_hour in doctor.working_hours"
                                class="ng-scope"
                            >
                                <td class="center-content ng-binding">Thứ Bảy</td>
                                <td class="center-content ng-binding">
                                    08:00 - 12:00
                                </td>
                                <td
                                    ng-bind-html="work_hour.location"
                                    class="ng-binding"
                                >
                                    <span>Bệnh viện FV - Tầng 2, tòa nhà F</span>
                                </td>
                            </tr>
                            <!-- end ngRepeat: work_hour in doctor.working_hours -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hr" style="height: 3px; background: #d5d5d5"></div>
    @endforeach
@endsection
