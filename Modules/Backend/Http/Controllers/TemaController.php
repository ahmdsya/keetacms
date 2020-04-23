<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem as File;
use Modules\Backend\Entities\Tema;
use ZipArchive;
use Artisan;

class TemaController extends Controller
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
        $tema = Tema::orderBy('status', 'DESC')->get();
        return view('backend::tema.index', compact('tema'));
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
        $request->validate([
            'fileTheme' => 'required|mimes:zip'
        ]);

        $file = $request->file('fileTheme');
        $fileName = $file->getClientOriginalName();
        $name = explode(".", $fileName)[0];
        $location = public_path('Themes');

        if ($file->move($location, $fileName)) {
            $zip = new ZipArchive;  
            if($zip->open($location.'/'.$fileName)){  
                $zip->extractTo($location);  
                $zip->close();
            }
        }

        if (unlink($location.'/'.$fileName)) {
            Tema::create([
                'nama' => $name,
                'status' => '0',
                'screenshot' => 'Themes/'.$name.'/screenshot.png'
            ]);
        }
    
        return redirect()
                ->back()
                ->with('sukses', 'Berhasil');
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
        $temaActive = Tema::where('status', '1')
                            ->update([
                                'status' => '0',
                            ]);

        if ($temaActive) {
            Tema::find($id)
                ->update([
                    'status' => '1',
                ]);
            $tema = Tema::where('status', '1')->first();
            
            EnvSet([
                'APP_THEME' => $tema->nama
            ]);
            // Artisan::call('env:set APP_THEME='.$tema->nama);
        }

        return redirect()
                ->back()
                ->with('sukses', 'Berhasil di aktifkan.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id, File $files)
    {
        $db = Tema::find($id);
        $deleteDirectory = $files->deleteDirectory(public_path('Themes/'.$db->nama), false);

        if ($deleteDirectory) {
            $db->delete($id);
        }

        return redirect()
                ->back()
                ->with('sukses', 'Berhasil di hapus');
    }

}
