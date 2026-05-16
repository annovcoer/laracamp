<?php

namespace App\Http\Controllers\User;

// use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Models\Camp;
use App\Http\Requests\User\Checkout\Store;
use Auth;
use Mail;
// use App\Http\Checkout\AfterCheckout;
use App\Mail\Checkout\AfterCheckout;
// use App\Mail\User\AfterCheckout;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Camp $camp, Request $request)
    {

        if ($camp->isRegistered){
        $request->session()->flash('error',"You already registered on {$camp->title} camp.");
        return redirect(route('user.dashboard'));
    }
        // return $camp;
        return view('checkout.create',[
            'camp'=> $camp
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request, Camp $camp)
    {
        //return $request->all();
        // Test input data
        // return $camp;
        // return $request->all();

        // Mapping data
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data ['camp_id'] = $camp->id;

        // Update user data
        $user = Auth::user();
        $user -> email = $data ['email'];
        $user -> name = $data ['name'];
        $user -> occupation = $data ['occupation'];
        $user ->save();

        // Create ke table Checkout
        $checkout = Checkout::create($data);

        //Checkout::create($data);

        //Sending Email
        Mail::to(Auth::user()->email)->send(new AfterCheckout($checkout));


        // return $data;
        // return $checkout;
        return redirect(route('checkout.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkout $checkout)
    {
        //
    }

      /**
     * Remove the specified resource from storage.
     */
    public function success()
    {
        return view('checkout.success');
    }

    // public function invoice (Checkout $checkout)
    // {
    //     return $checkout;
    // }
}

