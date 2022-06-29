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
                                    ng-change="searchDoctors()">
                                    <option
                                        disabled
                                        style="font-size: 14px"
                                        selected = "selected"
                                    >--- Tất cả chuyên khoa ---
                                    </option>
                                    @foreach($all_dept as $dept)
                                        <option
                                            style="font-size: 14px"
                                            value="{{$dept->DeptID}}"
                                        >{{$dept->Name}}
                                        </option>
                                    @endforeach
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
                                autocomplete="off"
                                class="form-control ng-pristine ng-untouched ng-valid ng-empty"
                                placeholder="Tên bác sĩ"
                                ng-model="search.name"
                            />
                            <div id="search_ajax"></div>
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
                            @foreach($get_languageID as $item)
                                @if($doctor->UserID == $item->UserID)
                                    @foreach($all_language as $language)
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
                            @foreach($all_dept as $dept)
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
{{--    <span>{{ $all_doctor->appends(['sort' => 'UserID'])->links() }}</span>--}}
@endsection
