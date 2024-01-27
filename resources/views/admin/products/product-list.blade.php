@extends('layouts.app')
@section('title', 'Shops - Progmedia')
@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">eCommerce /</span>Active Shops Product List</h4>


  <p class="text-muted mb-0">Total {{count($products)}} {{(count($products) > 1) ? 'Products' : 'Product';   }} </p>


    <!-- Order List Table -->
    <div class="card">
      <div class="card-datatable table-responsive">
        <table class=" table border-top">
          <thead>
            <tr>
                <th>Shop  List Id </th>
                <th>Shop Id</th>
                <th>Product Title</th>
                <th>Product Description</th>
                <th>Quantity</th>
                <th>Product URL</th>
                <th>Product Price</th>
                <th>Customer Views</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
              <tr>
                <td><a href="{{ route('shops.productDetails', ['id' => $product->listing_id]) }}"> {{ $product->listing_id }} </a></td>
                <td>{{ $product->shop_id }}</td>
                <td>{{ implode(' ', array_slice(explode(' ', $product->title), 0, 15)) }}...</td>
                <td>{{ implode(' ', array_slice(explode(' ', $product->description), 0, 20)) }}...</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->listing_id }}</td>
                <td>{{ $product->price->amount }}</td>
                <td>{{ $product->views }}</td>

              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection






