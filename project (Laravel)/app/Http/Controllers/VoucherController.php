<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'code' => 'required|unique:vouchers,code',
            'percentage' => 'required|numeric',
            'max_uses' => 'required|numeric',
        ]);

        Voucher::create($validated);

        return back()->with('success','Berhasil Membuat Voucher');
    }

    /**
     * Display the specified resource.
     */
    public function show(Voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voucher $voucher)
    {
        // dd($request);

        $voucher->update([
            'percentage' => $request['percentage'],
            'max_uses' => $request['max_uses'],
        ]);

        return back()->with('success','Berhasil Memperbarui Voucher');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return back()->with('success', 'Berhasil menghapus voucher');
    }
}
