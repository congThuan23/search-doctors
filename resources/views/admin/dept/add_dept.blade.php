@extends('admin_layout')
@section('admin_content')
    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-9">
                <h5 style="background-color: #005792;border-radius: 5px 5px 0 0; margin: 0; padding: 8px 20px;" class="ng-bindin text-white">THÊM MỚI CHUYÊN KHOA</h5>
            </div>
        </div>
        <div class="row tm-edit-product-row">
            <div class="col-xl-9 col-lg-9 col-md-12">
                    <form action="{{URL::to('/save-dept')}}" class="tm-edit-product-form" method="post">
                        {{ csrf_field() }}
                        <div class="form-group mb-3">
                            <label for="name">Tên chuyên khoa</label>
                            <input
                                id="dept_name"
                                name="dept_name"
                                type="text"
                                class="form-control validate"
                                oninvalid="this.setCustomValidity('Tên chuyên khoa không được để trống!')"
                                oninput="this.setCustomValidity('')"
                                required/>
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Chuyên khoa cha</label>
                            <select name="dept_sub" class="form-control">
                                <option value="1">Chuyên khoa trị liệu thần kinh cột sống ACC</option>
                                <option value="2">Dịch vụ COVID-19</option>
                                <option value="3">Các chuyên khoa nội</option>
                                <option value="4">Các dịch vụ hỗ trợ</option>
                                <option value="5">Các chuyên khoa ngoại</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Mô Tả</label>
                                <textarea name="ten" id="mota"></textarea>
                                <script>CKEDITOR.replace('mota');</script>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-info btn-block text-uppercase" name="add_category">Thêm Mới Chuyên Khoa</button>
                        </div>
                    </form>
            </div>
        </div>
@endsection
