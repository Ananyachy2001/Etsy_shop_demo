<?php

namespace App\Http\Controllers\Pages;

use App\Models\User;
use App\Models\Collection;
use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Http;
class PagesController extends Controller
{

    public function showAccountConnection(){
        return view('admin.pages.account.connections');
    }
    public function showDashboard()
    {
        return view('admin.pages.dashboard');
    }

    // Testing phase routes
    public function orderList()
    {
        return view('admin.orders.order-list');
    }

    // public function paymentList()
    // {
    //           // Fetch all shops from the database
    //     $payments = Payment::all();
    //     return view('admin.orders.payment-list', ['payments' => $payments]);

       
    // }
    public function paymentList()
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

        $shopId = '2'; // Replace with your actual shop ID

        // Fetch payment lists for a specific shop using the appropriate API endpoint
        
        $response = $client->get("shops/{$shopId}/payments");

        // Validate response status code
        if ($response->getStatusCode() !== 200) {
            throw new Exception('Failed to fetch payment list: ' . $response->getBody()->getContents());
        }

        // Parse JSON response
        $payments = json_decode($response->getBody());

        // Access the data you need from the $payments object
        // Assuming the data you need is in a property named 'results'
        $paymentResults = $payments->results;
        dd($paymentResults);

        // Return the view with the payments data
        return view('admin.orders.payment-list', ['payments' => $paymentResults]);

    } catch (Exception $e) {
        // Handle errors gracefully
        return view('error', ['message' => $e->getMessage()]);
    }
}

    public function orderDetails()
    {
        return view('admin.orders.order-details');
    }

    public function customerList()
    {
        return view('admin.customers.customer-list');
    }

    public function customerDetails()
    {
        return view('admin.customers.customer-details');
    }


    // Jsonify the User data for datatables with a different GET route
    public function userList()
    {
        $users = User::all(); // Fetch all users from the database

        // Check if the request wants JSON data
        if (request()->wantsJson()) {
            return response()->json(['data' => $users]);
        }
    
        // Default behavior for non-JSON requests (e.g., HTML view)
        return view('admin.users.user-list', compact('users'));
    }


    

    public function roles()
    {
        return view('admin.access.roles');
    }

    public function permissions()
    {
        return view('admin.access.permissions');
    }

    public function fileList()
    {
        return view('admin.files.file-list');
    }

    public function fileSets()
    {
        return view('admin.files.sets');
    }

    public function collections()
    {
        $collections = Collection::all();

        // Loop through the collections and truncate the description to a certain number of characters
        foreach ($collections as $collection) {
            $collection->collection_description = Str::limit($collection->collection_description, 120); // Limit to 120 characters
        }
    
        return view('admin.files.collections', compact('collections'));
    }

    public function showCustomerDashboard()
    {
        return view('customer.pages.dashboard');
    }

    public function shopList(){
        return view('admin.shops.shop-list');
    }
}
