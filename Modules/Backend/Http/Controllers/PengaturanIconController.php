<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Backend\Entities\Pengaturan;

class PengaturanIconController extends Controller
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
        $pengaturan = Pengaturan::where('group', '=', 'icon')->orderBy('id', 'DESC')->get();

        return view('backend::pengaturan.icon', compact('pengaturan'));
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
        $pengaturan = Pengaturan::where('id', $id)->first();

        request()->validate([
            'value' => 'required|image|mimes:jpeg,png,jpg,ico,gif|max:2048',
        ]);

        if ($pengaturan->key == 'web_favicon') {
            $imageName = 'favicon.'.request()->value->getClientOriginalExtension();
        }elseif ($pengaturan->key == 'web_logo') {
            $imageName = 'logo.'.request()->value->getClientOriginalExtension();
        }

        $move = request()->value->move(public_path('backend/img'), $imageName);

        if ($move) {
            unlink(public_path('backend/img/'.$pengaturan->value));

            $update = Pengaturan::find($id);
            $update->update([
                'value' => $imageName
            ]);
        }

        return redirect()->back()->with('sukses', 'Berhasil di ubah.');
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
