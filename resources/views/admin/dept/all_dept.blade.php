@extends('admin_layout')
@section('admin_content')

    <h4 style="color: red; font-weight: bold; font-family: Tahoma; margin-bottom: 20px;"><i class="fas fa-users"></i>&ensp;Quản Lý Chuyên Khoa</h4>

    <?php $message = Session::get('message');
    if (isset($message)){ ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Thành Công! </strong> <?php echo $message;
        Session::put('message', null); // chỉ cho hiển thị một lần ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php } ?>

    {{--
        <form action="{{URL::to('/search-customer')}}" method="get" class="navbar-form navbar-left" role="search">
    --}}
    <div class="form-group" style="width:500px; float: left;">
        <input type="text" name="dept_search" id = "search_dept" class="form-control" placeholder="Nhập tên khoa cần tìm kiếm ...">
    </div>
    {{--
        </form>
    --}}

    <div class="tm-bg-primary-dark tm-block tm-block-products">
        <div class="tm-product-table-container">
            <table class="table table-hover tm-table-small tm-product-table" style="color: black;">
                <thead>
                <tr style="background: rgb(8, 27, 133); color: white;">
                    <th scope="col">STT</th>
                    <th scope="col">Khoa</th>
                    <th scope="col">Khoa Cha</th>
                    <th scope="col">Thao Tác</th>
                </tr>
                </thead>
                <tbody id="list_dept">
                @foreach($all_dept as $key => $dept)
                    <tr>
                        <td class="tm-product-name">{{ ++$i }}</td>
                        <td>{{ $dept->Name }}</td>
                        <td>
                            @if ($dept->ParentID == 1) Dịch vụ COVID-19
                            @elseif ($dept->ParentID == 2) Các chuyên khoa nội
                            @elseif ($dept->ParentID == 3) Các dịch vụ hỗ trợ
                            @else Các chuyên khoa ngoại
                            @endif
                        </td>
                        <td>
                            <a href="{{URL::to('/edit-dept/'.$dept->DeptID)}}" class="tm-product-delete-link">
                                <i class="far fa-edit"></i>
                            </a> &ensp;|&ensp;
                            <a onclick="return confirm('Bạn có chắc là muốn xóa chuyên khoa này ko?')" href="{{URL::to('/delete-dept/'.$dept->DeptID)}}" class="tm-product-delete-link">
                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- table container -->
        <span>  {{$all_dept->links()}} </span>
    </div>
@endsection
