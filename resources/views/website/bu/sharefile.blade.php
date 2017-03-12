@if(count($bu) > 0)
      @foreach($bu as $key => $b)
      @if($key % 3 == 0 && $key != 0)
        <div class="clearfix"></div>
      @endif
        <div class="col-md-4">
            <div class="product-item">
              <div class="pi-img-wrapper">
                <img src="http://keenthemes.com/assets/bootsnipp/k3.jpg" class="img-responsive" alt="Berry Lace Dress">
                <div>
                  <a href="#" class="btn">Zoom</a>
                  <a href="#" class="btn">View</a>
                </div>
              </div>
              <h3><a href="shop-item.html">{{$b->bu_name}}</a></h3>
              <p>{{str_limit($b->bu_small_dis, 60)}}</p>
              <div class="pi-price">{{$b->bu_price}}</div>
              <a href="javascript:;" class="btn add2cart">Add to cart</a>
            </div>
        </div>
  @endforeach

@else
 There is no data at All
@endif
