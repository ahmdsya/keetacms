<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Backend\Entities\Halaman;

class HalamanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
    }
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $halaman = Halaman::join('admins', 'halamen.author', 'admins.id')
                            ->orderBy('id', 'DESC')
                            ->select('halamen.*', 'admins.name')
                            ->get();
                            
        return view('backend::halaman.index', compact('halaman'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('backend::halaman.tambah');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        Halaman::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'judul_seo' => $request->judul_seo,
            'deskripsi' => $request->deskripsi,
            'keyword' => $request->keyword,
            'status' => $request->status,
            'gambar' => $request->gambar,
            'author' => auth('admin')->user()->id,
        ]);

        return redirect()
                    ->route('halaman.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('backend::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $halaman = Halaman::find($id);
        return view('backend::halaman.ubah', compact('halaman'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $halaman = Halaman::find($id);
        $halaman->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'judul_seo' => $request->judul_seo,
                'deskripsi' => $request->deskripsi,
                'keyword' => $request->keyword,
                'status' => $request->status,
                'gambar' => $request->gambar,
            ]);

        return redirect()
                    ->back()
                    ->with('sukses', 'Berhasil di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Halaman::find($id)->delete();

        return redirect()->back()->with('sukses', 'Berhasil di hapus.');
    }
}
