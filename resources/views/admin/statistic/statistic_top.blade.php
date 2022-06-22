@extends('admin_layout')
@section('admin_content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Thống kê số lược truy cập của bác sỹ</h1>
        <p class="mb-4">Vui lòng chọn Top bác sỹ muốn thống kê &emsp;
            <select name="top" id="top_id">
                <option value=1000>-- Tất cả ---</option>
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
            </select></p>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-8 col-lg-7">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Danh sách thống kê số lượt tìm kiếm của bác sỹ</h6>
                    </div>
                    <div class="card-body text">
                        <div style="text-align: right; margin-bottom: 10px"><a style="background: #4e73df" href="{{URL::to('/statistic/print-report')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-download fa-sm text-white-50"></i> Xuất báo cáo</a></div>
                        </hr>
                        <div class="chart-area">
                            <table class="table table-hover tm-table-small tm-product-table" style="color: black;">
                                <thead>
                                <tr style="background: rgb(8, 27, 133); color: white;">
                                    <th scope="col">STT</th>
                                    <th scope="col">Bác sỹ</th>
                                    <th scope="col">Chuyên khoa</th>
                                    <th scope="col">Số lược tìm kiếm</th>
                                </tr>
                                </thead>
                                <tbody id="list_statistic">
                                @foreach($statistic as $key => $sta)
                                    <tr>
                                        <td class="tm-product-name">{{ ++$i }}</td>
                                        <td>{{ $sta->FullName }}</td>
                                        <td>{{ $sta->Name }}</td>
                                        <td>{{ $sta->Count }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
{{--                        <span>{{ $statistic->links() }}</span>--}}
                    </div>
                </div>
            </div>

            <!-- Donut Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 text-center">
                        <h6 class="m-0 font-weight-bold text-primary">Tình Trạng Tài Khoản Khách Hàng</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body text-center">
                        <div class="chart-pie pt-4">
                            <canvas width =800 height=800 id="PMChart" data-num1= "{{$customer_block}}" data-num2 ="{{$customer_activate}}" ></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
