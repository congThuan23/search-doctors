@extends('admin_layout')
@section('admin_content')

    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-9">
                <h5 style="background-color: #005792;border-radius: 5px 5px 0 0; margin: 0; padding: 8px 20px;" class="ng-bindin text-white">CẬP NHẬT TÀI KHOẢN NGƯỜI DÙNG</h5>
            </div>
        </div>
        <div class="row tm-edit-product-row">
            <div class="col-xl-9 col-lg-9 col-md-12">
                @foreach($edit_customer as $key => $edit_value)
                    <form action="{{URL::to('/update-customer/'.$edit_value->UserID)}}" class="tm-edit-product-form" method="post">
                        {{ csrf_field() }}
                        <div class="form-group mb-3">
                            <label for="name">Tên</label>
                            <input
                                    id="customer_name"
                                    name="customer_name"
                                    type="text"
                                    class="form-control validate"
                                    value="{{$edit_value->FullName}}"
                                    oninvalid="this.setCustomValidity('Họ tên không được để trống!')"
                                    oninput="this.setCustomValidity('')"
                                    required/>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Ngày sinh</label>
                            <input
                                id="customer_dob"
                                name="customer_dob"
                                type="date"
                                class="form-control validate"
                                value="{{$edit_value->DateOfBirth}}"
                                required/>
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Email</label>
                            <input
                                    id="customer_email"
                                    name="customer_email"
                                    type="email"
                                    class="form-control validate"
                                    value="{{$edit_value->Email}}"
                                    oninvalid="this.setCustomValidity('Email không được để trống!')"
                                    oninput="this.setCustomValidity('')"
                                    required />
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Mật khẩu</label>
                            <input
                                    id="customer_password"
                                    name="customer_password"
                                    type="password"
                                    class="form-control validate"
                                    value="{{$edit_value->Password}}"
                                    oninvalid="this.setCustomValidity('Mật khẩu không được để trống!')"
                                    oninput="this.setCustomValidity('')"
                                    required />
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Số điện thoại</label>
                            <input
                                    id="customer_phone"
                                    name="customer_phone"
                                    type="text"
                                    class="form-control validate"
                                    value="{{$edit_value->PhoneNumber}}"
                                    />
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Địa chỉ</label>
                            <input
                                id="customer_address"
                                name="customer_address"
                                type="text"
                                class="form-control validate"
                                value="{{$edit_value->Address}}"
                                />
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-info btn-block text-uppercase" name="add_category" style="margin-bottom: 25px;">Lưu thay đổi</button>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>

@endsection
