<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::orderBy('id', 'DESC')->paginate(10);
        return view('dashboard.discounts.index', compact('discounts'));
    }

    public function show(Discount $discount)
    {
        return view('dashboard.discounts.show', compact('discount'));
    }

    public function create()
    {
        return view('dashboard.discounts.create');
    }

    public function store(DiscountRequest $request)
    {
        Discount::create($request->validated());
        return redirect()->route('dashboard.discounts.index')->with('success', 'Discount Created Successfully');
    }

    public function edit(Discount $discount)
    {
        return view('dashboard.discounts.edit', compact('discount'));
    }

    public function update(Discount $discount, DiscountRequest $request)
    {
        $discount->update($request->validated());
        return redirect()->route('dashboard.discounts.index');
    }
    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect()->route('dashboard.discounts.index');
    }
    function checkCode(Request $request)
    {
        $discount = Discount::where('code', $request->code)->count();
        return response()->json(['data' => ['is_exist' => $discount]]);
    }


    function search(Request $request)
    {
        $discounts = Discount::whereLike('code', "%$request->q%")->orWhereLike('percentage', "%$request->q%")->limit(5)->get();
        return response()->json(['data' => ['discounts' => $discounts]]);
    }
}
