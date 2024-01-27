<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class ShopController extends Controller
{

    public function index()
    {
        try {
            // Configuring Etsy API credentials
            $client = new Client([
                'base_uri' => env('ETSY_BASE_URI'),
                'headers' => [
                    'Authorization' => 'Bearer ' . config('services.etsy.client_id'),
                    'Content-Type' => 'application/json'
                ]
            ]);
    
            // Fetch shop lists using the appropriate API endpoint
            $response = $client->get('shops');
    
            // Validate response status code
            if ($response->getStatusCode() !== 200) {
                throw new Exception('Failed to fetch Etsy shop lists: ' . $response->getBody()->getContents());
            }
    
            // Parse JSON response
            $shops = json_decode($response->getBody());

            // Access the 'results' property of the $shops object
            $shopResults = $shops->results;
    
            // Pass shop data to the view
            // return view('admin.shops.shop-list', ['shops' => $shops['results']]);
            return view('admin.shops.shop-list', ['shops' => $shopResults]);

        } catch (Exception $e) {
            // Handle errors gracefully
            return view('error', ['message' => $e->getMessage()]);
        }
    }

    public function show($shopId)
{
    try {
        // Configuring Etsy API credentials 
        $client = new Client([
            'base_uri' => env('ETSY_BASE_URI'),
            'headers' => [
                'Authorization' => 'Bearer' . config('services.etsy.client_id'),
                'Content-Type' => 'application/json'
            ]
        ]);

        // Fetching shop details using the shop ID
        $response = $client->get("shops/{$shopId}");
        
        

        // Validate response status code
        if ($response->getStatusCode() !== 200) {
            throw new Exception('Shop not found or API error: ' . $response->getBody()->getContents());
        }



        // Parse JSON response
        $shopData = json_decode($response->getBody());

        // Shop matching
        $matchedShop = null;
        foreach ($shopData->results as $shop) {
            if ($shop->shop_id == $shopId) {
                $matchedShop = $shop;
                break;
            }
        }

        if (!$matchedShop) {
            throw new Exception('Shop with ID ' . $shopId . ' not found.');
        }


        
        // Pass shop data to the view
        return view('admin.shops.shop-show', ['shop' => $matchedShop]);
    } catch (Exception $e) {
        // Handle errors gracefully
        return view('error', ['message' => $e->getMessage()]);
    }
}



    // public function paymentList()
    // {
    //           // Fetch all shops from the database
    //     $payments = Payment::all();
    //     return view('admin.shops.payment-list', ['payments' => $payments]);

       
    // }



public function paymentList($shopId)
{
    try {
        // Configuring Etsy API credentials
        $client = new Client([
            'base_uri' => env('ETSY_BASE_URI'),
            'headers' => [
                'Authorization' => 'Bearer ' . config('services.etsy.client_id'),
                'Content-Type' => 'application/json'
            ]
        ]);

        // $shopId = '1'; // Replace with your actual shop ID

        // Fetch payment lists for a specific shop using the appropriate API endpoint
       
        $response = $client->get("shops/{$shopId}/payments");

        // Validate response status code
        if ($response->getStatusCode() !== 200) {
            throw new Exception('Failed to fetch payment list: ' . $response->getBody()->getContents());
        }

        // Parse JSON response
        $payments = json_decode($response->getBody());

        // dd($payments);
        // Access the data you need from the $payments object
        // Assuming the data you need is in a property named 'results'
        $paymentResults = $payments->results;
        // dd($paymentResults);

        // Return the view with the payments data
        return view('admin.shops.payment-list', ['payments' => $paymentResults]);

    } catch (Exception $e) {
        // Handle errors gracefully
        return view('error', ['message' => $e->getMessage()]);
    }
}






public function receiptList($shopId)
{
    try {
        // Configuring Etsy API credentials
        $client = new Client([
            'base_uri' => env('ETSY_BASE_URI'),
            'headers' => [
                'Authorization' => 'Bearer ' . config('services.etsy.client_id'),
                'Content-Type' => 'application/json'
            ]
        ]);

        // $shopId = '1'; // Replace with your actual shop ID

        // Fetch payment lists for a specific shop using the appropriate API endpoint
       
        $response = $client->get("shops/{$shopId}/receipts");

        // Validate response status code
        if ($response->getStatusCode() !== 200) {
            throw new Exception('Failed to fetch payment list: ' . $response->getBody()->getContents());
        }

        // Parse JSON response
        $receipts = json_decode($response->getBody());

        // dd($receipts);
        // Access the data you need from the $receipts object
        // Assuming the data you need is in a property named 'results'
        $receiptResults = $receipts->results;
        // transactions->product_data->property_name
        // dd($receiptProduct);

        // Return the view with the receipts data
        return view('admin.shops.receipt-list', ['receipts' => $receiptResults]);

    } catch (Exception $e) {
        // Handle errors gracefully
        return view('error', ['message' => $e->getMessage()]);
    }
}

public function productList()
{
    try {
        // Configuring Etsy API credentials
        $client = new Client([
            'base_uri' => env('ETSY_BASE_URI'),
            'headers' => [
                'Authorization' => 'Bearer ' . config('services.etsy.client_id'),
                'Content-Type' => 'application/json'
            ]
        ]);

        // Fetch shop lists using the appropriate API endpoint
        $response = $client->get('listings/active');

        // Validate response status code
        if ($response->getStatusCode() !== 200) {
            throw new Exception('Failed to fetch Etsy shop lists: ' . $response->getBody()->getContents());
        }

        // Parse JSON response
        $products = json_decode($response->getBody());

        // Access the 'results' property of the $shops object
        $productResults = $products->results;
        // dd($listResults);

        // Pass shop data to the view
        // return view('admin.shops.shop-list', ['shops' => $shops['results']]);
        return view('admin.products.product-list', ['products' => $productResults]);

    } catch (Exception $e) {
        // Handle errors gracefully
        return view('error', ['message' => $e->getMessage()]);
    }
}


public function productDetails($listId)
{
    try {
        // Configuring Etsy API credentials 
        $client = new Client([
            'base_uri' => env('ETSY_BASE_URI'),
            'headers' => [
                'Authorization' => 'Bearer' . config('services.etsy.client_id'),
                'Content-Type' => 'application/json'
            ]
        ]);

        // Fetching product details using the list ID
        $response = $client->get("listings/{$listId}");
        
        

        // Validate response status code
        if ($response->getStatusCode() !== 200) {
            throw new Exception('Shop not found or API error: ' . $response->getBody()->getContents());
        }



        // Parse JSON response
        $productData = json_decode($response->getBody());



        // dd($productData);


        
        // Pass shop data to the view
        return view('admin.products.product-show', ['product' => $productData]);
    } catch (Exception $e) {
        // Handle errors gracefully
        return view('error', ['message' => $e->getMessage()]);
    }
}




    
    // public function index()
    // {
    //     // Fetch all shops from the database
    //     $shops = Shop::all();

    //     // Pass the shops data to the view
    //     return view('admin.shops.shop-list', ['shops' => $shops]);
    // }

    // public function show($id)
    // {
    //     // Fetch a specific shop by ID from the database
    //     $shop = Shop::findOrFail($id);

    //     // Pass the shop data to the view
    //     return view('admin.shops.shop-show', ['shop' => $shop]);
    // }
}
