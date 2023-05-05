<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart home page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
   
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12">
            <div class="dropdown">
                <button type="button" class="btn btn-primary" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </button>
 
                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                        </div>
                    </div>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="{{ asset('ImgURLs') }}/{{ $details['ImgURL'] }}" width="100" height="100" class="img-responsive"/>
                                    {{-- <img src="img/Doraemon1.jpg" /> --}}
                                    {{-- <img src="{{ asset('img/') }}/{{ $details['photo'] }}" /> --}}
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>{{ $details['name'] }}</p>
                                    <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
<br/>

<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://pendecor.vn/uploads/files/2022/05/03/cach-thiet-ke-shop-quan-ao-nam-anh-1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
      </div>
    </div>
  </div>

  <h1 class="display-1">Hãy mua quần áo đẹp ngay tại đây</h1>

  <div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
      <div class="card">
        <img src="https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/457803/item/vngoods_62_457803.jpg?width=750" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Áo Chui Đầu Oxford Kẻ Sọc Ngắn Tay</h5>
          <p class="card-text">Crisp fabric with a premium feel. A relaxed, pullover shirt for an on-trend style.</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">499.000VND</small>
          </div>
          <a href="#" class="btn btn-primary stretched-link">Xem chi tiết</a>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img src="https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/455803/item/vngoods_00_455803.jpg?width=750" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Playstation UT Áo Thun Ngắn Tay</h5>
          <p class="card-text">UT với đường nét nguyên bản mô tả máy chơi game mang tính biểu tượng của PlayStation!</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">299.000VND</small>
          </div>
          <a href="#" class="btn btn-primary stretched-link">Xem chi tiết</a>
      </div>
    </div>
    <div class="col">
    <div class="card">
        <img src="https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/455966/item/vngoods_56_455966.jpg?width=750" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">Áo Sơ Mi Linen Cotton Cổ Trụ Dài Tay</h5>
        <p class="card-text">Vải mang đến cảm giác tươi mới. Mềm mại, mát mẻ, và thoải mái khi mặc.</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">499.000VND</small>
        </div>
        <a href="#" class="btn btn-primary stretched-link">Xem chi tiết</a>
    </div>
    </div>
    <div class="col">
    <div class="card">
        <img src="https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/460289/item/goods_00_460289.jpg?width=320" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">Spy X Family UT Áo Thun Ngắn Tay</h5>
        <p class="card-text">The second collection from "SPY x FAMILY" the hottest anime of 2022, is now available!</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">399.000VND</small>
        </div>
        <a href="#" class="btn btn-primary stretched-link">Xem chi tiết</a>
    </div>
    </div>
</div>



@yield('scripts')
</body>
</html>
