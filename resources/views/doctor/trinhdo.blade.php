@extends('client_layout')
@section('client_content')
    <div class="find-a-doctoc__doctor-list-wrapper">
        <div class="find-a-doctor__result">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="ng-bindin text-white"> TRÌNH ĐỘ NĂNG LỰC</h5>
                </div>
            </div>
        </div>
        <div class="find-a-doctoc__doctor-list">
            <div class="row">
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="row huma">
                <div class="col-md-4 me">
                    <img
                        src="{{asset('public/frontend/images/11.png')}}"
                        width="400"
                        height="400"
                        alt=""
                        class="people img-fuild"
                    />

                </div>
                <div class="col-md-8">

                    <form action="{{route('trinhdo.store', session()->get('userid'))}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row" style="display:flex ;">
                            <div class="col-md-6">
                                <label for=""><strong>Học hàm</strong></label>
                                <div class="btn-group" style="width: 100%">
                                    <select
                                        name="hocham"
                                        id="speciality"
                                        class="form-control ng-pristine ng-untouched ng-valid ng-not-empty">
                                        <option
                                            style="font-size: 14px"
                                            value="Phó Giáo Sư"
                                            selected="selected">
                                            &nbsp;&nbsp; Phó Giáo Sư
                                        </option>

                                        <option style="font-size: 14px" value="Giáo Sư">
                                            &nbsp;&nbsp;Giáo Sư
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for=""><strong>Học vị</strong></label>
                                <div class="btn-group" style="width: 100%">
                                    <select
                                        name="hocvi"
                                        id="speciality"
                                        class="form-control ng-pristine ng-untouched ng-valid ng-not-empty">
                                        <option
                                            style="font-size: 14px"
                                            value="Tiến Sĩ"
                                            selected="selected"
                                        >
                                            &nbsp;&nbsp; Tiến Sĩ
                                        </option>

                                        <option style="font-size: 14px" value="Thạc sĩ">
                                            &nbsp;&nbsp; Thạc sĩ
                                        </option>

                                        <option style="font-size: 14px" value="Bác sĩ">
                                            &nbsp;&nbsp; Bác sĩ
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row  ">
                            <div class="col-md-12">
                                <label for=""><strong>Chứng nhận</strong></label>
                                <textarea name="chungnhan" id="mota">{{$info->Certificate ?? ""}}</textarea>

                            </div>
                            <div class="col-md-12 d-flex  align-items-center flex-wrap" style="gap: 0 10px;">
                                <label for=""><strong>Minh chứng</strong></label>
                                <div>
                                    <input type="file" name="chungnhanmc" class="form-control-file">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="brder"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""><strong>Kinh nghiệm</strong></label>
                                <textarea name="kinhnghiem" id="kinhnghiem">{{$info->Experience ?? ""}}</textarea>
                            </div>
                            <div class="col-md-12 d-flex  align-items-center flex-wrap" style="gap: 0 10px;">
                                <label for=""><strong>Minh chứng</strong></label>
                                <div class="form-group mt-3 ">
                                    <input type="file" name="kinhnghiemmc" class="form-control-file">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="brder"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="gap: 0 10px; display:flex;">
                                <label for=""><strong>Ngôn ngữ</strong></label>
                                <div class="btn-group " style="width:auto">
                                    <select
                                        multiple="multiple" name="langs[]"
                                        id="speciality"
                                        class="form-control ng-pristine ng-untouched ng-valid ng-not-empty">
                                        @foreach($languages as $lang)
                                            <option value="{{$lang->LanguageID}}">{{$lang->Language}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex  align-items-center flex-wrap" style="gap: 0 10px;">
                                <label for=""><strong>Minh chứng</strong></label>
                                <div class="form-group mt-3 ">
                                    <input type="file" name="ngonngumc" class="form-control-file">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="brder"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""><strong>Công trình nghiên cứu</strong></label>
                                <textarea name="ctnc"  id="ctnc">{{$info->ResearchWork ?? ""}}</textarea>

                            </div>
                            <div class="col-md-12 d-flex  align-items-center flex-wrap" style="gap: 0 10px;">
                                <label for=""><strong>Minh chứng</strong></label>
                                <div class="form-group mt-3 ">

                                    <input type="file" name="ctncmc" class="form-control-file">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="brder"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""><strong>Lĩnh vực lâm sàn</strong></label>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-group" style="width: 100%">
                                    <select
                                        name="linhvuc"
                                        id="speciality"
                                        class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" >                                   >
                                        <option
                                            style="font-size: 14px"
                                            value="Chăm sóc tim mạch"
                                            selected="selected">
                                            &nbsp;&nbsp; Chăm sóc tim mạch
                                        </option>

                                        <option style="font-size: 14px" value="Hồi sức tích cực">
                                            &nbsp;&nbsp; Hồi sức tích cực
                                        </option>
                                        <option style="font-size: 14px" value="Gây mê hồi sức">
                                            &nbsp;&nbsp; Gây mê hồi sức
                                        </option>
                                        <option style="font-size: 14px" value="Hô hấp">
                                            &nbsp;&nbsp; Hô hấp
                                        </option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="brder"></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col md-12 text-center">
                                <button type="submit" class="btn btn-primary">Cập nhập</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#mota'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#kinhnghiem'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#ctnc'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
