<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Backend\Entities\Artikel;
use Modules\Backend\Entities\Kategori;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super;editor;writer', ['only'=>'show']);
    }
    
    public function index()
    {
        $artikel = Artikel::join('admins', 'artikels.author', 'admins.id')
                            ->orderBy('id', 'DESC')
                            ->select('artikels.*', 'admins.name')
                            ->get();

        return view('backend::artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $kategori = Kategori::all();

        return view('backend::artikel.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        Artikel::create([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'judul_seo' => $request->judul_seo,
                'deskripsi' => $request->deskripsi,
                'keyword' => $request->keyword,
                'status' => $request->status,
                'kategori' => $request->kategori,
                'gambar' => $request->gambar,
                'show_comment' => $request->comment,
                'author' => auth('admin')->user()->id,
        ]);

        $artikel = Artikel::orderBy('id', 'DESC')->limit(1)->first();

        return redirect()
                ->route('artikel.edit',$artikel->id)
                ->with('sukses', 'Artikel berhasil di tambah.');
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
        $artikel = Artikel::find($id);
        $kategori = Kategori::all();

        return view('backend::artikel.ubah', compact('artikel', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        Artikel::find($id)->update([
                    'judul' => $request->judul,
                    'isi' => $request->isi,
                    'judul_seo' => $request->judul_seo,
                    'deskripsi' => $request->deskripsi,
                    'keyword' => $request->keyword,
                    'status' => $request->status,
                    'kategori' => $request->kategori,
                    'gambar' => $request->gambar,
                    'show_comment' => $request->comment,
                ]);

        return redirect()
                ->back()
                ->with('sukses', 'Artikel berhasil di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Artikel::find($id)->delete();

        return redirect()
                ->back()
                ->with('sukses', 'Artikel berhasil di hapus.');
    }
}
