@extends('admin.admin_layout')
@section('admin_content')
@include('admin.partials.cthd',['name'=>'Chào mừng bạn đến với Admin'])
<div class="col-md-12 m-auto">
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">   
                <h3>{{$category}}</h3>
                <p>Danh mục</p>
              </div>
              <div class="icon">
                <i class="ion ion-document"></i>
              </div>
              <a href="{{url('dashboard/category') }}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$Product}}</h3>
                <p>Sản phẩm</p>
              </div>
              <div class="icon">
                <i class="ion ion-camera"></i>
              </div>
              <a href="{{url('dashboard/product') }}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$Order}}</h3>
                <p>Hóa đơn</p>
              </div>
              <div class="icon">
                <i class="ion ion-document-text"></i>
              </div>
              <a href="{{url('dashboard/order') }}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$User}}<sup style="font-size: 20px"></sup></h3>

                <p>Tài khoản</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="{{url('dashboard/user')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$Admin}}</h3>

                <p>Admin</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{url('dashboard/admin')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$Customer}}</h3>

                <p>Khách hàng</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-hand"></i>
              </div>
              <a href="{{url('dashboard/customer')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$Order}}</h3>

                <p>Biểu đồ</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{url('dashboard/chart')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        </div>
       
</div>
@endsection