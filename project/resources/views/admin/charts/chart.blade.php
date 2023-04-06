@extends('admin.admin_layout')
@section('admin_content')
@include('admin.partials.cthd',['name'=>'Thống kê doanh số đơn hàng','key'=>'list'])
<div class="row" >
    {{-- {{dd($tootal)}} --}}
            {{-- <form autocomplete="off" style="display: flex">
                @csrf
                <div class="col-md-4">
                    <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
                    <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
                </div>

                <div class="col-md-4">
                    <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
                </div>

                <div class="col-md-12">
                    <p>Lọc theo: <br>
                        <select>
                            <option>-- Chọn --</option>
                            <option value="7ngay">7 ngày qua</option>
                            <option value="thangtruoc">tháng trước</option>
                            <option value="thangnay">tháng này</option>
                            <option value="365ngayqua">365 ngày qua</option>
                        </select>
                    </p>
                </div>
            </form> --}}
            <div class="col-md-12" style="margin-top:50px; ">
                <canvas id="myChart" height="100px"></canvas>
            </div>
</div>


@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  
  var sampleChartClass;
  (function($){
        $(document).ready(function(){
            var ctx = document.getElementById('myChart').getContext('2d');
            var label = @json($label);
            var elections = @json($elections);
            
            var labels = Object.keys(label);
            var data = Object.values(elections);
            console.log(data);
            sampleChartClass.ChartData(ctx, labels, data);
        });
        sampleChartClass = {
        ChartData:function(ctx, labels, data){
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Doanh thu',
                        data: data ,
                        borderWidth: 1
                    }]
                },
                options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
                }
            });
            
        }
}
  })(jQuery);

</script>

@endpush
@endsection