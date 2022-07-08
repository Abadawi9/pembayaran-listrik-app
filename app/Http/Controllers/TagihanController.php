<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestStoreOrUpdateTagihan;
use App\Models\Pelangan;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tagihans = Tagihan::latest()->paginate(10);
        return view('dashboard.tagihan.index', compact('tagihans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelangans = Pelangan::all(['id', 'nama']);
        return view('dashboard.tagihan.create', compact('pelangans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreOrUpdateTagihan $request)
    {
        $pelanggan = Pelangan::findOrFail($request->pelanggan_id);
        $validated = $request->validated() + [
            'total_bayar' => ($request->jml_pemakaian * $pelanggan->tarif->tarif) + $pelanggan->tarif->beban,
        ];

        Tagihan::create($validated);
        return redirect(route('tagihans.index'))->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function show(Tagihan $tagihan)
    {
        return $tagihan;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tagihan $tagihan)
    {
        $pelangans = Pelangan::all(['id', 'nama']);
        return view('dashboard.tagihan.edit', compact('tagihan', 'pelangans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreOrUpdateTagihan $request, $id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $pelanggan = Pelangan::findOrFail($request->pelanggan_id);
        $validated = $request->validated() + [
            'total_bayar' => ($request->jml_pemakaian * $pelanggan->tarif->tarif) + $pelanggan->tarif->beban,
            'status' => $request->status
        ];

        $tagihan->update($validated);
        return redirect(route('tagihans.index'))->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $tagihan->delete();
        return redirect(route('tagihans.index'))->with('success', 'Data berhasil dihapus');
    }

    public function bayar(Request $request)
    {
        // $request->validate([
        //     'bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20348',
        // ]);

        // $imageName = time() . '.' . $request->bukti->extension();

        // $request->image->move(public_path('/uploads/images'), $imageName);

        $tagihan = Tagihan::findOrFail($request->tagihan_id);
        $tagihan->update([
            'status' => 'lunas',
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Tagihan berhasil dibayar',
            'request' => $request->all()
        ]);
    }

    public function getStruk(Tagihan $tagihan)
    {
        return view('components.receipt', compact('tagihan'));
    }
}
