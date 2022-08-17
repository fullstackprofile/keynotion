<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Coupon\CouponStoreRequest;
use App\Http\Requests\Coupon\CouponUpdateRequest;
use App\Models\Coupon;
use App\Notifications\CouponNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():mixed
    {
        $coupon = Coupon::orderBy('created_at','asc')->paginate(15);

        return view('admin.coupon.index',[
            'coupons'=>$coupon
        ]);
    }

    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $coupon = Coupon::query()
            ->where('user', 'LIKE', "%{$search}%")
            ->paginate(15);
        return view('admin.coupon.index')->with(array( 'coupons'=>$coupon));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():mixed
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponStoreRequest $request)
    {
        $coupon = Coupon::create($request->validated());

        $coupon = Coupon::latest()->first();
        Notification::send($coupon, new CouponNotification($coupon));
        return redirect()->route('coupons.index')->withSuccess("Nice Job! You're coupon has been successfully created :) !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon):mixed
    {
        return view('admin.coupon.edit',[
            'coupons'=>$coupon
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(CouponUpdateRequest $request, Coupon $coupon)
    {
        $coupon->update($request->validated());
        return redirect()->route('coupons.index')->withSuccess("Nice Job! You're coupon has been successfully updated :) !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->back()->withSuccess(" You're Coupon has been successfully deleted !");
    }
}
