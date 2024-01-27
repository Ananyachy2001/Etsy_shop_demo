@extends('layouts.app') <!-- Use your layout file as needed -->

@section('title', 'Shop Details - Progmedia')

@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="pt-3 mb-0"><span class="text-muted fw-light">Progmedia /</span> Shop Details</h4>

    <div class="card g-3 mt-5">
      <div class="card-body row g-3">
        <div class="col-lg-12">
          <div class="d-flex justify-content-between align-items-center flex-wrap mb-2 gap-1">
            <div class="me-1">
              <h3 class="mb-1">{{ $shop->shop_name }}</h3>
              <p class="mb-1">{{ $shop->created_timestamp }}</p>
            </div>
            <div class="d-flex align-items-center">
              <span class="badge bg-label-danger">Shop</span>
              <i class="bx bx-share-alt bx-sm mx-4"></i>
              <i class="bx bx-bookmarks bx-sm"></i>
            </div>
          </div>
          <div class="card academy-content shadow-none border">
            <div class="p-2">
              <div class="cursor-pointer">
                <img src="{{ $shop->icon_url_fullxfull }}" class="img-fluid mb-3 w-100" alt="Shop Image">
              </div>
            </div>
            <div class="card-body">
              <h5 class="mb-2">About this shop</h5>
              <p class="mb-0 pt-1">
                {{ $shop->announcement }}
              </p>
              <hr class="my-4" />
              <h5>By the numbers</h5>
              <div class="d-flex flex-wrap">
                <div class="me-5">
                  <p class="text-wrap">
                    <i class="bx bx-check-double bx-sm me-2"></i><strong>User ID:</strong> {{ $shop->user_id }}
                  </p>
                  <p class="text-wrap"><i class="bx bx-user bx-sm me-2"></i><strong>Create Date:</strong> {{ $shop->create_date }}</p>
                  <p class="text-wrap"><i class="bx bxs-flag-alt bx-sm me-2"></i><strong>Created Timestamp:</strong> {{ $shop->created_timestamp }}</p>
                  <p class="text-wrap"><i class="bx bx-file bx-sm me-2"></i><strong>Currency Code:</strong> {{ $shop->currency_code }}</p>
                </div>
                <div>
                  <p class="text-wrap"><i class="bx bx-pencil bx-sm me-2"></i><strong>Is Vacation:</strong> {{ $shop->is_vacation ? 'Yes' : 'No' }}</p>
                  <p class="text-wrap"><i class="bx bxs-watch bx-sm me-2"></i><strong>Vacation Message:</strong> {{ $shop->vacation_message }}</p>
                  <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Sale Message:</strong> {{ $shop->sale_message }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Digital Sale Message:</strong> {{ $shop->digital_sale_message }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Update Date:</strong> {{ $shop->update_date }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Updated Timestamp:</strong> {{ $shop->updated_timestamp }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Listing Active Count:</strong> {{ $shop->listing_active_count }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Digital Listing Count:</strong> {{ $shop->digital_listing_count }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Login Name:</strong> {{ $shop->login_name }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Accepts Custom Requests:</strong> {{ $shop->accepts_custom_requests ? 'Yes' : 'No' }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Policy Welcome:</strong> {{ $shop->policy_welcome }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Policy Payment:</strong> {{ $shop->policy_payment }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Policy Shipping:</strong> {{ $shop->policy_shipping }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Policy Refunds:</strong> {{ $shop->policy_refunds }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Policy Additional:</strong> {{ $shop->policy_additional }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Policy Seller Info:</strong> {{ $shop->policy_seller_info }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Policy Update Date:</strong> {{ $shop->policy_update_date }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Policy Has Private Receipt Info:</strong> {{ $shop->policy_has_private_receipt_info ? 'Yes' : 'No' }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Has Unstructured Policies:</strong> {{ $shop->has_unstructured_policies ? 'Yes' : 'No' }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Policy Privacy:</strong> {{ $shop->policy_privacy }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Vacation Autoreply:</strong> {{ $shop->vacation_autoreply }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>URL:</strong> {{ $shop->url }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Num Favorers:</strong> {{ $shop->num_favorers }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Languages:</strong> {{ json_encode($shop->languages) }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Icon URL Fullxfull:</strong> {{ $shop->icon_url_fullxfull }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Is Using Structured Policies:</strong> {{ $shop->is_using_structured_policies ? 'Yes' : 'No' }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Has Onboarded Structured Policies:</strong> {{ $shop->has_onboarded_structured_policies ? 'Yes' : 'No' }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Include Dispute Form Link:</strong> {{ $shop->include_dispute_form_link ? 'Yes' : 'No' }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Is Direct Checkout Onboarded:</strong> {{ $shop->is_direct_checkout_onboarded ? 'Yes' : 'No' }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Is Etsy Payments Onboarded:</strong> {{ $shop->is_etsy_payments_onboarded ? 'Yes' : 'No' }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Is Calculated Eligible:</strong> {{ $shop->is_calculated_eligible ? 'Yes' : 'No' }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Is Opted In To Buyer Promise:</strong> {{ $shop->is_opted_in_to_buyer_promise ? 'Yes' : 'No' }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Is Shop US Based:</strong> {{ $shop->is_shop_us_based ? 'Yes' : 'No' }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Transaction Sold Count:</strong> {{ $shop->transaction_sold_count }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Shipping From Country ISO:</strong> {{ $shop->shipping_from_country_iso }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Shop Location Country ISO:</strong> {{ $shop->shop_location_country_iso }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Review Count:</strong> {{ $shop->review_count }}</p>
                    <p class="text-wrap"><i class="bx bx-check-double bx-sm me-2"></i><strong>Review Average:</strong> {{ $shop->review_average }}</p>
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
