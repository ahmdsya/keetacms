<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Backend\Entities\Comment;

class KomentarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super;editor;writer', ['only'=>'show']);
    }
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $komentar = Comment::join('artikels', 'comments.post_id', '=', 'artikels.id')
                            ->orderBy('comments.id', 'DESC')
                            ->select('comments.*', 'artikels.judul', 'artikels.id as aid')
                            ->get();

        return view('backend::komentar.index', compact('komentar'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('backend::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
        $komentar = Comment::find($id);

        return view('backend::komentar.ubah', compact('komentar'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $komentar = Comment::find($id);

        $komentar->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'website' => $request->website,
            'content' => $request->content,
            'publikasi' => $request->publikasi
        ]);

        return redirect()->back()->with('sukses', 'Berhasil di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $komentar = Comment::find($id);
        $komentar->delete();

        return redirect()->back()->with('sukses', 'Berhasil di hapus.');
    }

    public function balasIndex($id)
    {
        $komentar = Comment::find($id);

        return view('backend::komentar.balas', compact('komentar'));
    }

    public function balas(request $request, $id)
    {
        Comment::create([
            'parent' => $id,
            'post_id' => $request->post_id,
            'nama' => auth('admin')->user()->name,
            'email' => auth('admin')->user()->email,
            'website' => env('APP_URL'),
            'content' => $request->content,
            'publikasi' => 1
        ]);

        return redirect()->back()->with('sukses', 'Berhasil membalas komentar.');
    }
}
