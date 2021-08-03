<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePageRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;

class PageController extends Controller
{
    public function index()
    {
        $pages=Page::all();
        return view('dashboard.page.index',compact('pages'));
    }

    public function create(){
        return view('dashboard.page.create');
    }

    public function store(StorePageRequest $request)
    {
          Page::create([
              'title_en'=>$request->title_en,
              'title_ar'=>$request->title_ar,
              'desc_en'=>$request->desc_en,
              'desc_ar'=>'null',
              'photo'=>'null',
              'slug'=>$request->slug,
          ]);
          return redirect()->route('admin.page.index');
    }


    public function show($slug)
    {
        $page = page::whereSlug($slug)->first();
        return view('dashboard.page.show',compact('page'));
    }
}
