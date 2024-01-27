@extends('layouts.app')
@section('title', 'Shops - Progmedia')
@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">eCommerce /</span> Order Receipt History</h4>


  <p class="text-muted mb-0">Total {{count($receipts)}} {{(count($receipts) > 1) ? 'Orders' : 'Order';   }} </p>

<!-- Order List Widget -->

<div class="card mb-4">
  <div class="card-widget-separator-wrapper">
    <div class="card-body card-widget-separator">
      <div class="row gy-4 gy-sm-1">
        <div class="col-sm-6 col-lg-3">
          <div
            class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
            <div>
              <h3 class="mb-2">56</h3>
              <p class="mb-0">Pending Payment</p>
            </div>
            <div class="avatar me-sm-4">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class="bx bx-calendar bx-sm"></i>
              </span>
            </div>
          </div>
          <hr class="d-none d-sm-block d-lg-none me-4" />
        </div>
        <div class="col-sm-6 col-lg-3">
          <div
            class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
            <div>
              <h3 class="mb-2">12,689</h3>
              <p class="mb-0">Completed</p>
            </div>
            <div class="avatar me-lg-4">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class="bx bx-check-double bx-sm"></i>
              </span>
            </div>
          </div>
          <hr class="d-none d-sm-block d-lg-none" />
        </div>
        <div class="col-sm-6 col-lg-3">
          <div
            class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
            <div>
              <h3 class="mb-2">124</h3>
              <p class="mb-0">Refunded</p>
            </div>
            <div class="avatar me-sm-4">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class="bx bx-wallet bx-sm"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h3 class="mb-2">32</h3>
              <p class="mb-0">Failed</p>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class="bx bx-error-alt bx-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <!-- Order List Table -->
    <div class="card">
      <div class="card-datatable table-responsive">
        <table class="datatables-order table border-top">
          <thead>
            <tr>
                <th>Receipt Id</th>
                <th>Customer name</th>
                <th>Product Name</th>
                <th>Order Timeline</th>
                <th>Total Amount</th>
                <th>Status</th>
                
                
                <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($receipts as $receipt)
              <tr>
                <td>{{ $receipt->receipt_id }}</td>
                <td>{{ $receipt->name }}</td>
                <td>{{ $receipt->transactions[0]->product_data[0]->property_name }}</td>  
                <td>{{ $receipt->created_timestamp }}</td>
                <td>{{ $receipt->grandtotal->amount }}</td>
                <td>{{ $receipt->status }}</td>
                <td>
                  <button class="btn btn-primary btn-sm">Edit</button>
                  <button class="btn btn-danger btn-sm">Delete</button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection






