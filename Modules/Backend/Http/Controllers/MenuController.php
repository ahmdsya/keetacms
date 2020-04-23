<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Backend\Entities\Menu;
use Modules\Backend\Entities\Halaman;
use Modules\Backend\Entities\Kategori;

class MenuController extends Controller
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
        $menu = Menu::orderBy('sort')->get();
        $halaman = Halaman::all();
        $kategori = Kategori::all();
        $ref   = [];
        $items = [];
            foreach($menu as $data) {

                $thisRef = &$ref[$data->id];

                $thisRef['parent_id'] = $data->parent_id;
                $thisRef['menu'] = $data->menu;
                $thisRef['link'] = $data->link;
                $thisRef['type'] = $data->type;
                $thisRef['id'] = $data->id;

               if($data->parent_id == 0) {
                    $items[$data->id] = &$thisRef;
               } else {
                    $ref[$data->parent_id]['child'][$data->id] = &$thisRef;
               }

            }

        $getNestable = $this->get_nestable($items);

        return view('backend::menu.index', compact('getNestable', 'menu', 'halaman', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if ($request->type == 'Tautan') {
            Menu::create([
                'menu' => $request->menu,
                'link' => $request->link,
                'type' => $request->type,
                'parent_id' => 0,
                'sort' => 0
            ]);
        }elseif ($request->type == 'Kategori') {
          $kategori = $request->kategori;

          foreach ($kategori as $i => $id) {
            $kategori = Kategori::find($id);
            $slug = $kategori->slug;
            // $link = url('/category/'.$slug);
            $link = route('frontend.category.post', $slug);
            $kategori = $kategori->nama;

            Menu::create([
                'menu' => $kategori,
                'link' => $link,
                'type' => $request->type,
                'parent_id' => 0,
                'sort' => 0
              ]);
          }
        }elseif ($request->type == 'Halaman') {
          $halaman = $request->halaman;

          foreach ($halaman as $i => $id) {
            $halaman = Halaman::find($id);
            $slug = $halaman->slug;
            // $link = url('/page/'.$halaman->id.'/'.$slug);
            $link = route('frontend.single.page', [$halaman->id, $slug]);
            $halaman = $halaman->judul;

            Menu::create([
                'menu' => $halaman,
                'link' => $link,
                'type' => $request->type,
                'parent_id' => 0,
                'sort' => 0
              ]);
          }
        }

        return redirect()->back()->with('sukses', 'Berhasil menambahkan menu.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        Menu::find($id)->update([
            'menu' => $request->menu,
            'link' => $request->link
        ]);

        return redirect()->back()->with('sukses', 'Berhasil diubah.');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if ($request->edit == 'edit-menu') {
            Menu::find($id)->update([
                'menu' => $request->menu,
                'link' => $request->link
            ]);
        }else{
            $data = json_decode($request->data);

            $readbleArray = $this->parseJsonArray($data);

            $i=0;
            foreach($readbleArray as $row){
                $i++;
                $menu = Menu::find($row['id']);
                $menu->update([
                    'parent_id' => $row['parentID'],
                    'sort' => $i,
                ]);
            }
        }

        return redirect()->back()->with('sukses', 'Berhasil mengubah susunan menu.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $parent = Menu::where('parent_id', $id)->get();
        if ($parent->count() > 0) {
            foreach ($parent as $value) {
                Menu::find($value->id)->update([
                    'parent_id' => 0
                ]);
            }

        }
        
        Menu::find($id)->delete();

        return redirect()->back()->with('sukses', 'Berhasil menghapus menu.');
    }


    public function get_nestable($items,$class = 'dd-list')
    {

                $html = "<ol class=\"".$class."\" id=\"menu-id\">";

                foreach($items as $key=>$value) {
                    $readonly = ($value['type'] != 'Tautan') ? "readonly" : "";
                    $html.= '<li class="dd-item" data-id="'.$value['id'].'" >
                                
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content"><span id="label_show'.$value['id'].'">'.$value['menu'].'</span> 
                                    <span class="span-right">:<span id="link_show'.$value['id'].'">'.$value['type'].'</span> &nbsp;&nbsp;
                                        <form method="POST" action="'.route('menu.destroy', $value['id']).'" style="display:inline;"> 
                                        <a class="edit-button" id="'.$value['id'].'" label="'.$value['menu'].'" link="'.$value['link'].'" data-toggle="modal" data-target="#modal'.$value['id'].'"><i class="fa fa-pencil"></i></a>
                                        <input type="hidden" name="_token" value="'.csrf_token().'">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="del-button"><i class="fa fa-trash"></i></button></span> 
                                        </form>
                                </div>

                                <div class="modal fade" id="modal'.$value['id'].'">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Ubah Menu</h4>
                                      </div>
                                      <div class="modal-body">
                                        <form method="POST" action="'.route('menu.update', $value['id']).'" class="form-horizontal">
                                        <input type="hidden" name="_token" value="'.csrf_token().'">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="edit" value="edit-menu">
                                        <div class="form-group">
                                          <label for="menu" class="col-sm-2 control-label">Menu</label>

                                          <div class="col-sm-10">
                                            <input type="text" name="menu" class="form-control" id="menu" value="'.$value['menu'].'">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="link" class="col-sm-2 control-label">Link</label>

                                          <div class="col-sm-10">
                                            <input type="text" name="link" class="form-control" id="link" value="'.$value['link'].'" '.$readonly.'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                      </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>';
                    if(array_key_exists('child',$value)) {
                        $html .= $this->get_nestable($value['child'],'child');
                    }
                        $html .= "</li>";
                }
                $html .= "</ol>";

                return $html;

        
    }

    function parseJsonArray($jsonArray, $parentID = 0) {

      $return = array();
      foreach ($jsonArray as $subArray) {
        $returnSubSubArray = array();
        if (isset($subArray->children)) {
            $returnSubSubArray = $this->parseJsonArray($subArray->children, $subArray->id);
        }

        $return[] = array('id' => $subArray->id, 'parentID' => $parentID);
        $return = array_merge($return, $returnSubSubArray);
      }
      return $return;
    }

}
