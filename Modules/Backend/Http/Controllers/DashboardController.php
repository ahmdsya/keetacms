<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Backend\Entities\Artikel;
use Modules\Backend\Entities\Halaman;
use Modules\Backend\Entities\Kategori;
use Modules\Backend\Entities\Comment;
use Modules\Backend\Entities\Tema;
use Bitfumes\Multiauth\Model\Admin;

class DashboardController extends Controller
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
        $artikel = Artikel::all();
        $halaman = Halaman::all();
        $admin = Admin::all();
        $kategori = Kategori::all();
        $komentar = Comment::all();
        $tema = Tema::all();
 
        return view('backend::dashboard.index',
            compact('artikel', 'halaman', 'admin', 'kategori', 'komentar', 'tema'));
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
        return view('backend::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
