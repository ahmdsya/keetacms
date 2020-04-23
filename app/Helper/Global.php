<?php

use Illuminate\Support\Facades\DB;


function latePost($limit)
{
	$latePost = DB::table('artikels as a')
                        ->join('kategoris as k', 'a.kategori', '=', 'k.id')
                        ->where('a.status', '=', 'Aktif')
                        ->orderBy('a.created_at', 'DESC')
                        ->select('a.*', 'k.nama', 'k.slug as kslug')
                        ->limit($limit)
                        ->get();

    return $latePost;
}

function popularPost($limit)
{
	$popularPost = DB::table('artikels as a')
                        ->join('kategoris as k', 'a.kategori', '=', 'k.id')
                        ->where('a.status', '=', 'Aktif')
                        ->orderBy('a.hits', 'DESC')
                        ->select('a.*', 'k.nama', 'k.slug as kslug')
                        ->limit($limit)
                        ->get();

    return $popularPost;
}

function trandingPost($limit, $offset)
{
    $trandingPost = DB::table('artikels as a')
                        ->join('kategoris as k', 'a.kategori', '=', 'k.id')
                        ->where('a.status', '=', 'Aktif')
                        ->orderBy('a.hits', 'DESC')
                        ->select('a.*', 'k.nama', 'k.slug as kslug')
                        ->limit($limit)
                        ->offset($offset)
                        ->get();

    return $trandingPost;
}

function relatedPost($kategori_id, $limit)
{
	$relatedPost = DB::table('artikels as a')
                        ->join('kategoris as k', 'a.kategori', '=', 'k.id')
                        ->where('a.kategori', '=', $kategori_id)
                        ->where('a.status', '=', 'Aktif')
                        ->select('a.*', 'k.nama', 'k.slug as kslug')
                        ->orderByRaw('RAND()')
                        ->take($limit)
                        ->get();

    return $relatedPost;
}

function category()
{
    $category = DB::table('kategoris as k')
                    ->join('artikels as a', 'k.id', '=', 'a.kategori')
                    ->where('a.status', '=', 'Aktif')
                    ->groupBy('k.id')
                    ->select('k.*', DB::raw('count(a.id) as post_count'))
                    ->get();

    return $category;
}

function commentCount($post_id)
{
	$komentar = DB::table('comments')
					->where('post_id', '=', $post_id)
                    ->where('publikasi', '=', 1)
                    ->get();

    $count = count($komentar);

    return $count;
}

function role()
{
    $role = DB::table('admin_role as ar')
                ->join('roles as r', 'ar.role_id', '=', 'r.id')
                ->join('admins as a', 'ar.admin_id', '=', 'a.id')
                ->where('admin_id', auth('admin')->user()->id)
                ->select('r.name')
                ->first();
    
    $name = $role->name;

    return $name;
}

function setting($key)
{
    $data = DB::table('pengaturans')
                ->where('key', $key)
                ->first();

    $value = $data->value;

    return $value;
}

function menuItems()
{
    $menu = DB::table('menus')
                ->orderBy('sort', 'ASC')
                ->get();

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
        }else {
            $ref[$data->parent_id]['child'][$data->id] = &$thisRef;
        }

    }

    return $items;
}

function EnvSet($data = array()){
        if(count($data) > 0){

            // Read .env-file
            $env = file_get_contents(base_path() . '/.env');

            // Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);;

            // Loop through given data
            foreach((array)$data as $key => $value){

                // Loop through .env-data
                foreach($env as $env_key => $env_value){

                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);

                    // Check, if new key fits the actual .env-key
                    if($entry[0] == $key){
                        // If yes, overwrite it with the new one
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        // If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }

            // Turn the array back to an String
            $env = implode("\n", $env);

            // And overwrite the .env with the new data
            file_put_contents(base_path() . '/.env', $env);
            
            return true;
        } else {
            return false;
        }
    }

function commentsItems($postID)
{
    $comments = DB::table('comments')
                    ->where('post_id', '=', $postID)
                    ->where('publikasi', '=', 1)
                    ->limit(setting('show_comment_per_page'))
                    ->get();

    $ref   = [];
    $items = [];
            
    foreach($comments as $data) {

        $thisRef = &$ref[$data->id];

        $thisRef['parent'] = $data->parent;
        $thisRef['post_id'] = $data->post_id;
        $thisRef['nama'] = $data->nama;
        $thisRef['email'] = $data->email;
        $thisRef['website'] = $data->website;
        $thisRef['content'] = $data->content;
        $thisRef['created_at'] = $data->created_at;
        $thisRef['id'] = $data->id;

        if($data->parent == 0) {
            $items[$data->id] = &$thisRef;
        }else {
            $ref[$data->parent]['child'][$data->id] = &$thisRef;
        }

    }

    return $items;
}
