<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Client;


class EtsyController extends Controller
{

    public function disconnect()
    {
        // Remove the Etsy access token from the session
        session()->forget('etsy_access_token');


        // Redirect the user to the dashboard or any other page
        return redirect()->route('admin.dashboard')->with('error', 'Etsy has been disconnected.');
    }

    public function connect()
    {
        $codeChallenge = $this->generateCodeVerifierAndChallenge();

        $url = "https://www.etsy.com/oauth/connect?" . http_build_query([
            'response_type' => 'code',
            'client_id' => env('ETSY_CLIENT_ID'),
            'redirect_uri' => env('ETSY_REDIRECT_URI'),
            'scope' => 'email_r shops_r listings_r transactions_r', // Add other scopes as needed
            'state' => Str::random(32), // Generate a random state
            'code_challenge' => $codeChallenge,
            'code_challenge_method' => 'S256',
        ]);

        return redirect()->away($url);
    }

    private function generateCodeVerifierAndChallenge()
    {
        $codeVerifier = Str::random(80); // Adjust length as needed
        $codeChallenge = strtr(rtrim(base64_encode(hash('sha256', $codeVerifier, true)), '='), '+/', '-_');
        
        // Store the code_verifier in the session for later use in the token request
        session(['code_verifier' => $codeVerifier]);
        
        return $codeChallenge;
    }






    public function oauthRedirect(Request $request)
    {
        $authCode = $request->input('code');
        $codeVerifier = session('code_verifier');
        
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('https://api.etsy.com/v3/public/oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => env('ETSY_CLIENT_ID'),
            'redirect_uri' => env('ETSY_REDIRECT_URI'),
            'code' => $authCode,
            'code_verifier' => $codeVerifier,
        ]);
        
        if ($response->ok()) {
            $data = $response->json();
            $accessToken = $data['access_token'];
            session(['etsy_access_token' => $accessToken]);
            return redirect()->route('welcome');
        } else {
            return "Error during authentication: " . $response->body();
        }
    }


    

    public function welcome()
    {
        $accessToken = session('etsy_access_token');
        $userId = explode('.', $accessToken)[0];

        // Fetch user data to get the shop ID
        $response = Http::withHeaders([
            'x-api-key' => env('ETSY_CLIENT_ID'),
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get("https://9b581c67-c682-41e2-86e7-1056d44549b5.mock.pstmn.io/v3/application/users/{$userId}");

        if (!$response->successful()) {
            $alertMessage = "Error fetching user data: " . $response->body();
            return view('admin.pages.dashboard', ['alertMessage' => $alertMessage]);
        }

        $meResponse = Http::withHeaders([
            'x-api-key' => env('ETSY_CLIENT_ID'),
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get("https://9b581c67-c682-41e2-86e7-1056d44549b5.mock.pstmn.io/v3/application/users/me");

        $userData = $response->json();
        $meUserData = $meResponse->json();
        
        // dd($meUserData);
        if (array_key_exists('shop_id', $meUserData)) {
            $shopId = $meUserData['shop_id'];
        } else {
            // Handle the case where 'shop_id' doesn't exist in $meUserData
            $shopId = null; // or any other suitable default value or error handling.
        }
        // dd($shopId);
        

        // Fetch shop details
        $shopResponse = Http::withHeaders([
            'x-api-key' => env('ETSY_CLIENT_ID'),
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get("https://9b581c67-c682-41e2-86e7-1056d44549b5.mock.pstmn.io/v3/application/shops/{$shopId}");

        if ($shopResponse->successful()) {
            $shopData = $shopResponse->json();

            // Fetch shop listings
            $listingsResponse = Http::withHeaders([
                'x-api-key' => env('ETSY_CLIENT_ID'),
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get("https://9b581c67-c682-41e2-86e7-1056d44549b5.mock.pstmn.io/v3/application/shops/{$shopId}/listings");

            if ($listingsResponse->successful()) {
                $listings = $listingsResponse->json()['results'];

                return view('admin.pages.dashboard', [
                    'first_name' => $userData['first_name'],
                    'shop_name' => $shopData['shop_name'], // Add other shop details as needed
                    'listing_count' => $shopData['digital_listing_count'],
                    'listings' => $listings, // Pass the fetched listings to the view
                ]);
            } else {
                $alertMessage = "Error fetching shop listings: " . $listingsResponse->body();
                return view('admin.pages.dashboard', ['alertMessage' => $alertMessage]);
            }
        } else {
            $alertMessage = "Error fetching shop data: " . $shopResponse->body();
            return view('admin.pages.dashboard', ['alertMessage' => $alertMessage]);
        }
  
        
    }




    public function showPayments()
{
    $accessToken = session('etsy_access_token');
    $userId = explode('.', $accessToken)[0];

    // Fetch user data to get the shop ID
    $response = Http::withHeaders([
        'x-api-key' => env('ETSY_CLIENT_ID'),
        'Authorization' => 'Bearer ' . $accessToken,
    ])->get("https://9b581c67-c682-41e2-86e7-1056d44549b5.mock.pstmn.io/v3/application/users/{$userId}");

    if (!$response->successful()) {
        $alertMessage = "Error fetching user data: " . $response->body();
        return view('admin.pages.dashboard', ['alertMessage' => $alertMessage]);
    }

    $userData = $response->json();

    if (!array_key_exists('shop_id', $userData)) {
        return view('admin.pages.dashboard', ['alertMessage' => 'Shop ID not found.']);
    }

    $shopId = $userData['shop_id'];

    // Fetch payment details
    $paymentResponse = Http::withHeaders([
        'x-api-key' => env('ETSY_CLIENT_ID'),
        'Authorization' => 'Bearer ' . $accessToken,
    ])->get("https://9b581c67-c682-41e2-86e7-1056d44549b5.mock.pstmn.io/v3/application/shops/{$shopId}/payments");

    if ($paymentResponse->successful()) {
        $payments = $paymentResponse->json();

        return view('admin.pages.payments', [
            'payments' => $payments, // Pass the fetched payments to the view
        ]);
    } else {
        $alertMessage = "Error fetching payment data: " . $paymentResponse->body();
        return view('admin.pages.dashboard', ['alertMessage' => $alertMessage]);
    }
}


    
    

}
