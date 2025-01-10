<?php

namespace App\Http\Controllers;

use App\Models\Product;

use App\Models\Provider;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.admin.barang.manage-barang');
    }

    public function datatable(Request $request){
        $data = Product::where('type', 'barang');

        return DataTables::of($data)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.admin.barang.manage-barang-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        Product::create([
            'name'          => $request->name,
            'price'         => $request->price,
            'description'   => $request->description,
            'provider_id'   => $request->provider_id,
            'type'          => 'barang',
            'image'         => null
        ]);

        return redirect()->back()->with('success', 'Berhasil membuat data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['barang'] = Product::findOrFail($id);

        return view('content.admin.barang.manage-barang-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Product::findOrFail($id)->update([
            'name'          => $request->name,
            'price'         => $request->price,
            'description'   => $request->description,
            'provider_id'   => $request->username,
            'type'          => 'barang',
            'image'         => null
        ]);

        return redirect()->back()->with('success', 'Berhasil mengedit data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data!');
    }
}
