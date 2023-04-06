
<div class="left-sidebar">
    <h2>Thương hiệu</h2>
    <div class="brands-name" ><!--category-productsr-->
            <ul class="nav nav-pills nav-stacked">
                @foreach($category_product as $key => $cate)
                <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$cate['category_id'])}}"> {{$cate['category_name']}}</a></li>
                @endforeach
            </ul>
    </div><!--/category-products-->

    <div class="brands_products"><!--brands_products-->
        <h2>Size</h2>
        <div class="brands-name">
            
            <ul class="filter_size_s">
            @foreach($filter_size as $key => $filter_size)
                <li class="filter_size"><input name="filter_size" type="checkbox" hidden=""><a href="{{URL::to('/size/'.$filter_size['id_size'])}}" style="color: black">{{$filter_size['size_name']}}</a> </li>
            @endforeach
            </ul>
        </div>
    </div><!--/brands_products-->
    
    <!--price-range-->
    {{-- <div class="price-range">
        <h2>Khoảng giá</h2>
        <div class="well text-center">
             <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="20000" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
             <b class="pull-left">0 đ</b> <b class="pull-right">20.000.000 đ</b>
        </div>
    </div> --}}
    <!--/price-range-->
    
    <!--shipping-->
    <div class="shipping text-center">
        <img src="{{URL::to('frontend/images/slider1.png')}}" alt="" />
    </div> 
    <!--/shipping-->

</div>