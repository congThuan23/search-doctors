@extends('admin_layout')
@section('admin_content')
    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-9">
                <h5 style="background-color: #005792;border-radius: 5px 5px 0 0; margin: 0; padding: 8px 20px;" class="ng-bindin text-white">CẬP NHẬT CHUYÊN KHOA</h5>
            </div>
        </div>
        <div class="row tm-edit-product-row">
            <div class="col-xl-9 col-lg-9 col-md-12">
                @foreach($edit_dept as $key => $edit_value)
                    <form action="{{URL::to('/update-dept/'.$edit_value->DeptID)}}" class="tm-edit-product-form" method="post">
                        {{ csrf_field() }}
                        <div class="form-group mb-3">
                            <label for="name">Tên chuyên khoa</label>
                            <input
                                id="dept_name"
                                name="dept_name"
                                type="text"
                                class="form-control validate"
                                value="{{$edit_value->Name}}"
                                oninvalid="this.setCustomValidity('Tên chuyên khoa không được trống!')"
                                oninput="this.setCustomValidity('')"
                                required/>
                        </div>

                        <div class="form-group mb-3">
                            <label for="category">Chuyên khoa cha</label>
                            <select class="custom-select tm-select-accounts"
                                    id="dept_sub"
                                    name="dept_sub">
{{--                                @if($edit_value->ParentID == 1)--}}
{{--                                    <option selected value="1">{{$edit_value->ParentID}} | Chuyên khoa trị liệu thần kinh cột sống ACC</option>--}}
{{--                                @elseif($edit_value->ParentID == 2)--}}
{{--                                    <option selected value="2">{{$edit_value->ParentID}} | Dịch vụ COVID-19</option>--}}
{{--                                @elseif($edit_value->ParentID == 3)--}}
{{--                                    <option selected value="3">{{$edit_value->ParentID}} | Các chuyên khoa nội</option>--}}
{{--                                @elseif($edit_value->ParentID == 4)--}}
{{--                                    <option selected value="4">{{$edit_value->ParentID}} | Các dịch vụ hỗ trợ</option>--}}
{{--                                @else--}}
{{--                                    <option selected value="5">{{$edit_value->ParentID}} | Các chuyên khoa ngoại</option>--}}
{{--                                @endif--}}
                                    <option selected value="1">1 | Chuyên khoa trị liệu thần kinh cột sống ACC</option>
                                    <option selected value="2">2 | Dịch vụ COVID-19</option>
                                    <option selected value="3">3 | Các chuyên khoa nội</option>
                                    <option selected value="4">4 | Các dịch vụ hỗ trợ</option>
                                    <option selected value="5">5 | Các chuyên khoa ngoại</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Mô Tả</label>
                            <textarea name="ten" id="mota">{{$edit_value->Desc}}</textarea>
                            <script>CKEDITOR.replace('mota');</script>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-info btn-block text-uppercase" name="add_category" style="margin-bottom: 25px;">Lưu thay đổi</button>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
@endsection
