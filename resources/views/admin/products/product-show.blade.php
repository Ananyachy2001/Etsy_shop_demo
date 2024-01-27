@extends('layouts.app') <!-- Use your layout file as needed -->

@section('title', 'product Details - Progmedia')

@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="pt-3 mb-0"><span class="text-muted fw-light">Progmedia /</span> product Details</h4>

    <div class="card g-3 mt-5">
      <div class="card-body row g-3">
        <div class="col-lg-12">
          <div class="d-flex justify-content-between align-items-center flex-wrap mb-2 gap-1">
            <div class="me-1">
              <h3 class="mb-1">Listing ID: {{ $product->listing_id }}</h3>
              <p class="mb-1">Product Title{{ $product->title }}</p>
            </div>
            <div class="d-flex align-items-center">
              <span class="badge bg-label-danger">product</span>
              <i class="bx bx-share-alt bx-sm mx-4"></i>
              <i class="bx bx-bookmarks bx-sm"></i>
            </div>
          </div>
          <div class="card academy-content shadow-none border">
            <div class="p-2">
              <div class="cursor-pointer">
                <img src="{{ $product->images }}" class="img-fluid mb-3 w-100" alt="product Image">
              </div>
            </div>
            <div class="card-body">
              <h5 class="mb-2">About this product</h5>
              <p class="mb-0 pt-1">
                {{ $product->description }}
              </p>
              <hr class="my-4" />
              <h5>By the numbers</h5>
              <div class="d-flex flex-wrap">
                <div class="me-5">
                  <p class="text-wrap">
                    <i class="bx bx-check-double bx-sm me-2"></i><strong>User ID:</strong> {{ $product->user_id }}
                  </p>
                  <p class="text-wrap"><i class="bx bx-user bx-sm me-2"></i><strong>Create Date:</strong> {{ $product->creation_timestamp }}</p>
                  <p class="text-wrap"><i class="bx bxs-flag-alt bx-sm me-2"></i><strong>Created Timestamp:</strong> {{ $product->created_timestamp }}</p>
                  <p class="text-wrap"><i class="bx bx-file bx-sm me-2"></i><strong>Price:</strong> {{ $product->price->amount }}</p>
                  <p class="text-wrap"><i class="bx bx-file bx-sm me-2"></i><strong>Currency Code:</strong> {{ $product->price->currency_code }}</p>
                </div>
                <div>
                  <p class="text-wrap"><i class="bx bx-pencil bx-sm me-2"></i><strong>Shipping Profile Id:</strong> {{ $product->shipping_profile_id  }}</p>
                  <p class="text-wrap"><i class="bx bx-pencil bx-sm me-2"></i><strong>Return Policy Id:</strong> {{ $product->return_policy_id  }}</p>
                  <p class="text-wrap"><i class="bx bx-pencil bx-sm me-2"></i><strong>Quantity:</strong> {{ $product->quantity  }}</p>
                  <p class="text-wrap"><i class="bx bxs-watch bx-sm me-2"></i><strong>Shop Section ID:</strong> {{ $product->shop_section_id }}</p>
                  <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Product URL:</strong> {{ $product->url }}</p>
                  <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Product Views:</strong> {{ $product->views }}</p>
                    
                </div>
              </div>

              {{-- ------------------------------------------- --}}
              <hr class="my-4" />
              {{-- <h5>Instructor</h5>
              <div class="d-flex justify-content-start align-items-center user-name">
                <div class="avatar-wrapper">
                  <div class="avatar avatar-sm me-2">
                    <img src="../../assets/img/avatars/11.png" alt="Avatar" class="rounded-circle" />
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <span class="fw-medium">Devonne Wallbridge</span>
                  <small class="text-muted">Web Developer, Designer, and Teacher</small>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
