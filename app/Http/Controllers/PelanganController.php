<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestStoreOrUpdatePelanggan;
use App\Models\Pelangan;
use App\Models\Tarif;
use Illuminate\Http\Request;

class PelanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggans = Pelangan::latest()->paginate(10);
        return view('dashboard.pelanggan.index', compact('pelanggans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tarif = Tarif::all(['id', 'daya']);
        return view('dashboard.pelanggan.create', compact('tarif'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreOrUpdatePelanggan $request)
    {
        $pelanggan = Pelangan::create($request->validated());
        return redirect(route('pelanggans.index'))->with('success', 'Data pelanggan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelangan  $pelangan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelangan $pelangan)
    {
        return $pelangan;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelangan  $pelangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelangan $pelanggan)
    {
        $tarif = Tarif::all(['id', 'daya']);
        return view('dashboard.pelanggan.edit', compact('pelanggan', 'tarif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelangan  $pelangan
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreOrUpdatePelanggan $request, Pelangan $pelangan, $id)
    {
        $pelangan = Pelangan::findOrFail($id);
        $pelangan->update($request->validated());
        return redirect(route('pelanggans.index'))->with('success', 'Data pelanggan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelangan  $pelangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelangan $pelangan, $id)
    {
        $pelangan = Pelangan::findOrFail($id);
        $pelangan->delete();
        return redirect(route('pelanggans.index'))->with('success', 'Data pelanggan berhasil dihapus');
    }
}
