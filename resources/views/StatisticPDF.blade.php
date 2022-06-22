<style type="text/css">
    table td, table th {
        border: 1px solid black;
    }
    .container{
        width: 80%;
        margin: 0 auto;
    }
    .title{
        text-align: center;
    }
    a{
        float: right;
    }
    .datetime{
        text-align: right;
    }
    table{
        width: 100%;
        text-align: center;
    }
</style>
<div class="container">
    <br/>
    <a href="{{route('generate-pdf',['download'=>'pdf']) }}">Download the report.</a>
    </br>
    <div class="title">
        <h2>DANH SACH THONG KE SO LUOT TIM KIEM BAC SY</h2>
        <h3>BENH VIEN DANANG - DANANG HOSPITAL</h3>
    </div>
    <div class="datetime">
        <h4 id="hvn"></h4>
        <script>
            var today = new Date();
            var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            var dateTime = 'Ngày: '  + date+' || '+ 'Giờ: ' +time;

            document.getElementById("hvn").innerHTML = dateTime;
        </script>
    </div>
    <table>
        <tr>
            <th>STT</th>
            <th>Bac sy</th>
            <th>Chuyen khoa</th>
            <th>So luoc tim kiem</th>
        </tr>
        <?php $i = 1?>
        @foreach($statistic as $key => $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $item->FullName }}</td>
                <td>{{ $item->Name }}</td>
                <td>{{ $item->Count }}</td>
            </tr>
        @endforeach
    </table>
</div>
