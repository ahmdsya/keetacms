<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Artesaos\SEOTools\Facades\SEOTools;
use Shipu\Themevel\Contracts\ThemeContract;
use Modules\Backend\Entities\Comment;
use Module;
use DB;

class FrontendController extends Controller
{

    private $theme;

    public function __construct(ThemeContract $theme)
    {
        $this->theme = $theme;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function home()
    {
        
        SEOTools::setTitle(setting('web_tittle'));
        SEOTools::setDescription(setting('web_description'));
        SEOTools::metatags()->setKeywords(explode(',', setting('web_keyword')));
        SEOTools::setCanonical(setting('web_url'));
        SEOTools::opengraph()->setTitle(setting('web_tittle'));
        SEOTools::opengraph()->setDescription(setting('web_description'));
        SEOTools::opengraph()->setUrl(setting('web_url'));
        SEOTools::opengraph()->setSiteName(setting('author'));
        SEOTools::opengraph()->addImage(asset('backend/img'.setting('web_logo')));
        SEOTools::jsonLd()->setTitle(setting('web_tittle'));
        SEOTools::jsonLd()->setDescription(setting('web_description'));
        SEOTools::jsonLd()->setType('article');
        SEOTools::jsonLd()->setUrl(setting('web_url'));
        SEOTools::jsonLd()->setImage(asset('backend/img'.setting('web_logo')));

        $artikels = DB::table('artikels as a')
                        ->join('kategoris as k', 'a.kategori', '=', 'k.id')
                        ->where('a.status', '=', 'Aktif')
                        ->orderBy('a.created_at', 'DESC')
                        ->select('a.*', 'k.nama', 'k.slug as kslug')
                        ->paginate(setting('show_post_per_page'));

        return view('required.home', compact('artikels'));
    }

    public function singlePost($id, $slug)
    {
        $singlePost = DB::table('artikels as a')
                        ->join('kategoris as k', 'a.kategori', '=', 'k.id')
                        ->where('a.id', '=', $id)
                        ->where('a.slug', '=', $slug)
                        ->where('status', '=', 'Aktif')
                        ->select('a.*', 'k.nama', 'k.slug as kslug')
                        ->first();

        if($singlePost->judul_seo != null || $singlePost->deskripsi != null || $singlePost->keyword != null){
            SEOTools::setTitle($singlePost->judul_seo);
            SEOTools::setDescription($singlePost->deskripsi);
            SEOTools::metatags()->setKeywords(explode(',', $singlePost->keyword));
            SEOTools::setCanonical(url('/post/'.$singlePost->id.'/'.$singlePost->slug));
            SEOTools::opengraph()->setTitle($singlePost->judul_seo);
            SEOTools::opengraph()->setDescription($singlePost->deskripsi);
            SEOTools::opengraph()->setUrl(url('/post/'.$singlePost->id.'/'.$singlePost->slug));
            SEOTools::opengraph()->setSiteName(setting('author'));
            SEOTools::opengraph()->addImages([asset('backend/img'.setting('web_logo')), asset($singlePost->gambar)]);
            SEOTools::jsonLd()->setTitle($singlePost->judul_seo);
            SEOTools::jsonLd()->setDescription($singlePost->deskripsi);
            SEOTools::jsonLd()->setType('article');
            SEOTools::jsonLd()->setUrl(url('/post/'.$singlePost->id.'/'.$singlePost->slug));
            SEOTools::jsonLd()->setImage(asset('backend/img'.setting('web_logo')));
        }else{
            SEOTools::setTitle($singlePost->judul);
            SEOTools::setDescription(setting('web_description'));
            SEOTools::metatags()->setKeywords(explode(',', setting('web_keyword')));
            SEOTools::setCanonical(url('/post/'.$singlePost->id.'/'.$singlePost->slug));
            SEOTools::opengraph()->setTitle($singlePost->judul);
            SEOTools::opengraph()->setDescription(setting('web_description'));
            SEOTools::opengraph()->setUrl(setting('web_url'));
            SEOTools::opengraph()->setSiteName(setting('author'));
            SEOTools::opengraph()->addImages([asset('backend/img'.setting('web_logo')), asset($singlePost->gambar)]);
            SEOTools::jsonLd()->setTitle($singlePost->judul);
            SEOTools::jsonLd()->setDescription(setting('web_description'));
            SEOTools::jsonLd()->setType('article');
            SEOTools::jsonLd()->setUrl(url('/post/'.$singlePost->id.'/'.$singlePost->slug));
            SEOTools::jsonLd()->setImage(asset('backend/img'.setting('web_logo')));
        }

        $key = 'blog_'.$singlePost->id;

        if (!Session::has($key)) {
            DB::table('artikels')
                    ->where([['id', $id], ['slug', '=', $slug]])
                    ->update([
                        'hits' => DB::raw('hits+1')
                    ]);
        }

        $komentar = DB::table('comments')
                    ->where('post_id', '=', $id)
                    ->where('publikasi', '=', 1)
                    ->get();

        return view('required.single-post', compact('singlePost', 'komentar'));
    }

    public function singlePage($id, $slug)
    {
        $singlePage = DB::table('halamen')
                        ->where('id', '=', $id)
                        ->where('slug', '=', $slug)
                        ->where('status', '=', 'Aktif')
                        ->first();

        if($singlePage->judul_seo != null || $singlePage->deskripsi != null || $singlePage->keyword != null){
            SEOTools::setTitle($singlePage->judul_seo);
            SEOTools::setDescription($singlePage->deskripsi);
            SEOTools::metatags()->setKeywords(explode(',', $singlePage->keyword));
            SEOTools::setCanonical(url('/page/'.$singlePage->id.'/'.$singlePage->slug));
            SEOTools::opengraph()->setTitle($singlePage->judul_seo);
            SEOTools::opengraph()->setDescription($singlePage->deskripsi);
            SEOTools::opengraph()->setUrl(url('/page/'.$singlePage->id.'/'.$singlePage->slug));
            SEOTools::opengraph()->setSiteName(setting('author'));
            SEOTools::opengraph()->addImages([asset('backend/img'.setting('web_logo')), asset($singlePage->gambar)]);
            SEOTools::jsonLd()->setTitle($singlePage->judul_seo);
            SEOTools::jsonLd()->setDescription($singlePage->deskripsi);
            SEOTools::jsonLd()->setType('article');
            SEOTools::jsonLd()->setUrl(url('/page/'.$singlePage->id.'/'.$singlePage->slug));
            SEOTools::jsonLd()->setImage(asset('backend/img'.setting('web_logo')));
        }else{
            SEOTools::setTitle($singlePage->judul);
            SEOTools::setDescription(setting('web_description'));
            SEOTools::metatags()->setKeywords(explode(',', setting('web_keyword')));
            SEOTools::setCanonical(url('/page/'.$singlePage->id.'/'.$singlePage->slug));
            SEOTools::opengraph()->setTitle($singlePage->judul);
            SEOTools::opengraph()->setDescription(setting('web_description'));
            SEOTools::opengraph()->setUrl(setting('web_url'));
            SEOTools::opengraph()->setSiteName(setting('author'));
            SEOTools::opengraph()->addImages([asset('backend/img'.setting('web_logo')), asset($singlePage->gambar)]);
            SEOTools::jsonLd()->setTitle($singlePage->judul);
            SEOTools::jsonLd()->setDescription(setting('web_description'));
            SEOTools::jsonLd()->setType('article');
            SEOTools::jsonLd()->setUrl(url('/page/'.$singlePage->id.'/'.$singlePage->slug));
            SEOTools::jsonLd()->setImage(asset('backend/img'.setting('web_logo')));
        }

        return view('required.single-page', compact('singlePage'));
    }

    public function search(Request $request)
    {
        $pencarian = strip_tags($request->get);

        SEOTools::setTitle('Search: '.$pencarian);
        SEOTools::setDescription(setting('web_description'));
        SEOTools::metatags()->setKeywords(explode(',', setting('web_keyword')));
        SEOTools::setCanonical(url('/search?get='.$pencarian));
        SEOTools::opengraph()->setTitle('Search: '.$pencarian);
        SEOTools::opengraph()->setDescription(setting('web_description'));
        SEOTools::opengraph()->setUrl(url('/search?get='.$pencarian));
        SEOTools::opengraph()->setSiteName(setting('author'));
        SEOTools::opengraph()->addImage(asset('backend/img'.setting('web_logo')));
        SEOTools::jsonLd()->setTitle('Search: '.$pencarian);
        SEOTools::jsonLd()->setDescription(setting('web_description'));
        SEOTools::jsonLd()->setType('article');
        SEOTools::jsonLd()->setUrl(url('/search?get='.$pencarian));
        SEOTools::jsonLd()->setImage(asset('backend/img'.setting('web_logo')));

        $search = DB::table('artikels as a')
                        ->join('kategoris as k', 'a.kategori', '=', 'k.id')
                        ->where('status', '=', 'Aktif')
                        ->where('a.judul', 'like', '%'.$pencarian.'%')
                        ->orWhere('k.nama', 'like', '%'.$pencarian.'%')
                        ->select('a.*', 'k.nama', 'k.slug as kslug')
                        ->paginate(setting('show_post_per_page'));

        $search->appends(['get' => $pencarian]);

        return view('required.search', compact('pencarian', 'search'));
    }

    public function categoryPost($slug)
    {
        $category = DB::table('kategoris')
                        ->where('slug', '=', $slug)
                        ->orWhere('nama', '=', $slug)
                        ->first();

        SEOTools::setTitle($category->nama);
        SEOTools::setDescription($category->deskripsi);
        SEOTools::metatags()->setKeywords($category->nama);
        SEOTools::setCanonical(url('/category/'.$category->slug));
        SEOTools::opengraph()->setTitle($category->nama);
        SEOTools::opengraph()->setDescription($category->deskripsi);
        SEOTools::opengraph()->setUrl(url('/category/'.$category->slug));
        SEOTools::opengraph()->setSiteName(setting('author'));
        SEOTools::opengraph()->addImage(asset('backend/img'.setting('web_logo')));
        SEOTools::jsonLd()->setTitle($category->nama);
        SEOTools::jsonLd()->setDescription($category->deskripsi);
        SEOTools::jsonLd()->setType('article');
        SEOTools::jsonLd()->setUrl(url('/category/'.$category->slug));
        SEOTools::jsonLd()->setImage(asset('backend/img'.setting('web_logo')));

        $categoryPost = DB::table('artikels')
                        ->where('kategori', '=', $category->id)
                        ->where('status', '=', 'Aktif')
                        ->orderBy('created_at', 'DESC')
                        ->paginate(setting('show_post_per_page'));

        return view('required.category-post', compact('categoryPost','category'));
    }

    public function comment(Request $request)
    {
        Comment::create([
            'parent' => $request->parent,
            'post_id' => $request->post_id,
            'nama' => htmlspecialchars($request->nama),
            'email' => strip_tags($request->email),
            'website' => htmlspecialchars($request->website),
            'content' => htmlspecialchars($request->content),
            'publikasi' => $request->publikasi
        ]);

        return redirect()->back()->with('sukses', 'Terima Kasih, komentar Anda telah terkirim.');
    }

    public function balasComment(Request $request)
    {
        Comment::create([
            'parent' => $request->parent,
            'post_id' => $request->post_id,
            'nama' => htmlspecialchars($request->nama),
            'email' => strip_tags($request->email),
            'website' => htmlspecialchars($request->website),
            'content' => htmlspecialchars($request->content),
            'publikasi' => $request->publikasi
        ]);

        return redirect()->back()->with('sukses', 'Terima Kasih, komentar Anda telah terkirim.');
    }
}
