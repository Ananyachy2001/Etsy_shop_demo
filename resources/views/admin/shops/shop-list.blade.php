@extends('layouts.app')
@section('title', 'Shops - Progmedia')
@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Progmedia /</span> My Shops</h4>
    <div class="app-academy">
      <div class="card mb-4">
          <div class="card-header d-flex flex-wrap justify-content-between gap-3">
              <div class="card-title mb-0 me-1">
                  <h5 class="mb-1">My Shops</h5>
                  <p class="text-muted mb-0">Total {{ count($shops) }} shops</p>
              </div>
          </div>
          <div class="card-body">
              <div class="row gy-4 mb-4">
                  @foreach($shops as $shop)
                  <div class="col-sm-6 col-lg-4">
                    <div class="card p-2 h-100 shadow-none border">
                        <div class="rounded-2 text-center mb-3">
                            <a href="{{ route('shops.show', ['id' => $shop->shop_id]) }}">
                                <img class="img-fluid" src="{{ $shop->icon_url_fullxfull }}" alt="Shop Image">
                            </a>
                        </div>
                        <div class="card-body p-3 pt-2">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge bg-label-primary">{{ \Carbon\Carbon::parse($shop->created_timestamp)->diffForHumans() }}</span>
                                <h6 class="d-flex align-items-center justify-content-center gap-1 mb-0">
                                    {{ $shop->review_average }} <span class="text-warning"><i class="bx bxs-star me-1"></i></span>
                                    <span class="text-muted">({{ $shop->review_count >= 1000 ? number_format($shop->review_count / 1000, 1) . 'k' : $shop->review_count }})</span>
                                </h6>
                            </div>
                            <a href="{{ route('shops.show', ['id' => $shop->shop_id]) }}" class="h5">{{ $shop->shop_name }}</a>
                            <p class="mt-2">{{ Illuminate\Support\Str::limit($shop->announcement, 70) }}</p>
                            <p class="d-flex align-items-center"><i title="Listings" class="bx bx-pin me-2"></i>{{ $shop->listing_active_count }}</p>
                            
                            <div class="d-flex flex-column flex-md-row gap-2 text-nowrap pe-xl-3 pe-xxl-0">
                                <div class="app-academy-md-50">
                                    <a class="btn btn-label-primary d-flex align-items-center" href="{{ route('shops.show', ['id' => $shop->shop_id]) }}">
                                        <span class="me-2">View Shop</span><i class="bx bx-chevron-right lh-1 scaleX-n1-rtl"></i>
                                    </a>
                                </div>
                                <div class="app-academy-md-50 ms-auto">
                                    <a class="btn btn-label-primary d-flex align-items-center" href="{{ route('shops.paymentList', ['id' => $shop->shop_id]) }}">
                                        <span class="me-2"> Payments</span><i class="bx bx-chevron-right lh-1 scaleX-n1-rtl"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex flex-column flex-md-row gap-4 text-nowrap pe-xl-4 pe-xxl-0 justify-content-center">
                                 <div class="">
                                    <a class="btn btn-label-primary d-flex align-items-center"href="{{ route('shops.receiptList', ['id' => $shop->shop_id]) }}" >
                                    <span class="me-2">Orders</span>
                                    <i class="bx bx-chevron-right lh-1 scaleX-n1-rtl"></i> </a> 
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
                
                  @endforeach
              </div>
          </div>
      </div>
  </div>
</div>
<!-- / Content -->
@endsection
