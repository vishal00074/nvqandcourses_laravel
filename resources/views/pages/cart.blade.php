@extends('index')
@section('content')

<!-- ============================================================== -->
<!-- Start NVQ Breatcome Area -->
<!-- ============================================================== -->
<div class="breatcome_area d-flex align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breatcome_title">
          <div class="breatcome_title_inner pb-2">
            <h2>Course Cart</h2>
          </div>
          <div class="breatcome_content">
            <ul>
              <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i> <span>Cart</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ============================================================== -->
<!-- End NVQ Breatcome Area -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- End NVQ Cart Area -->
<!-- ============================================================== -->

<div class="page-content py-5">
  @if($is_exited)
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="table-responsive">
            <table class="cart-table table text-center">
              <thead>
                <tr class="border-bottom">
                  <th scope="col">Courses</th>
                  <th scope="col">Price</th>
                  <!-- <th scope="col">Quantity</th> -->
                  <!-- <th scope="col">Total</th> -->
                  <th scope="col">Remove</th>
                </tr>
              </thead>
              <tbody>
                @foreach($courses as $course)
                <tr>
                  <td>
                    <div class="d-lg-flex align-items-center text-start">
                      <div class="flex-shrink-0 product">
                        <a href="#">
                          <img class="img-fluid" src="{{ $course->image }}" width="100%" alt="">
                        </a>
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <div class="product-title mb-2"><a class="link-title" href="#">{{ $course->name }}</a>
                        </div>
                      </div>
                    </div>

                  <td> <span class="product-price text-dark font-w-6">£{{ $course->total_price }}</span>
                  </td>
                  <td><a href="{{ url('delete_cart/'.$course->id ) }}" class="btn btn-primary btn-sm dlt"><i class="fa fa-remove"></i>
                    </a>
                  </td>
                </tr>
                @endforeach

              </tbody>

            </table>

          </div>
          <!-- <div class="coupan mt-5">
        
            <label class="text-dark h4" for="coupon">Coupon</label>
            <p>Enter your coupon code if you have one.</p>
            <div class="row form-row">
              <div class="col-sm-8 d-md-flex justify-content-between">
                <input class="form-control" id="coupon" placeholder="Coupon Code" type="text">
				<button class="btn btn-dark btn-animated aply">Apply Coupon</button> 
              </div>
             

              <div class="col-sm-4 text-right">
               
                 <button class="btn btn-primary btn-animated mt-md-0 up-cart">Update Cart</button>
              </div>
            </div>
			
 </div> -->
        </div>
        <div class="col-lg-4 ps-lg-5 mt-8 mt-lg-0 cart-head">
          <div class="shadow rounded p-4">
            <h4 class="text-dark text-center mb-2">Cart Totals</h4>
            <!-- <div class="d-flex justify-content-between align-items-center border-bottom py-3"> <span class="text-muted">Subtotal</span>  <span class="text-dark">£{{ $sub_total }}</span> 
          </div>
          <div class="d-flex justify-content-between align-items-center border-bottom py-3"> <span class="text-muted">Discount</span>  <span class="text-dark">0</span> 
          </div> -->
            <div class="d-flex justify-content-between align-items-center pt-3 mb-5 p-ttl"> <span class="text-dark h5">Total</span> <span class="text-dark font-w-7 h5">£{{ $sub_total }}</span>

            </div> <a class="btn btn-primary btn-animated btn-block dtbtn cr-pay" href="{{ url('stripe') }}">Card Payment</a>
            <a class="btn btn-primary btn-animated btn-block dtbtn paypal" href="{{ url('get_user_paypal') }}">Paypal Payment</a>
          </div>

        </div>
      </div>
    </div>
</div>
</section>
@else
<div class="container">
  <div class="row">

    <div class="col-md-12">

     <div class="card-body cart">
          <div class="col-sm-12 empty-cart-cls text-center">
            <img src="../frontend/assets/images/empty-cart.webp"  class="img-fluid mb-4 mr-3">
            <h3>Your Cart is Empty</h3>
            <p>Look like you have not added anything to you cart</p>
			<!--<div class="button two text-center">-->
			<!--					<a href="https://nvq.sbwares.com/courses">Book Now</a>-->
			<!--				</div>-->
          </div>
        </div>
    


    </div>

  </div>

</div>
@endif



<script>
  var input = document.querySelector('#qty');
  var btnminus = document.querySelector('.qtyminus');
  var btnplus = document.querySelector('.qtyplus');

  if (input !== undefined && btnminus !== undefined && btnplus !== undefined && input !== null && btnminus !== null && btnplus !== null) {

    var min = Number(input.getAttribute('min'));
    var max = Number(input.getAttribute('max'));
    var step = Number(input.getAttribute('step'));

    function qtyminus(e) {
      var current = Number(input.value);
      var newval = (current - step);
      if (newval < min) {
        newval = min;
      } else if (newval > max) {
        newval = max;
      }
      input.value = Number(newval);
      e.preventDefault();
    }

    function qtyplus(e) {
      var current = Number(input.value);
      var newval = (current + step);
      if (newval > max) newval = max;
      input.value = Number(newval);
      e.preventDefault();
    }

    btnminus.addEventListener('click', qtyminus);
    btnplus.addEventListener('click', qtyplus);

  } // End if test
</script>
</div>

<!-- ============================================================== -->
<!-- End NVQ Cart Area -->
<!-- ============================================================== -->

@endsection