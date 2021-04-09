<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
    public function index()
    {
        $pages=Page::all();
        return view('back.pages.index',compact('pages'));
    }

    public function orders(Request $request)
    {
        foreach ($request->get('page') as $key => $order)
        {
            Page::where('id',$order)->update(['order'=>$key]);
        }
    }

    public function create()
    {
        return view('back.pages.create');
    }

    public function update($id)
    {
        $page=Page::findOrFail($id);
        return view('back.pages.update',compact('page'));
    }

    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'title'=>'min:3',
            'image'=>'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $page = Page::findOrfail($id);
        $page->title=$request->title;
        $page->content=$request->content;
        $page->url=Str::slug($request->title);

        if($request->hasFile('image')){
            $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension(); //resim adı
            $request->image->move(public_path('uploads'),$imageName); //public altına uploads klasörü içine ekler
            $page->image='uploads/'.$imageName; //dbye kaydet
        }
        $page->save();
        toastr()->success('Sayfa başarıyla güncellendi');
        return redirect()->route('page.index');
    }

    public function delete($id)
    {
        $page=Page::find($id);
        if(File::exists($page->image)){
            File::delete(public_path($page->image));
        }
        $page->delete();
        toastr()->success('Sayfa başarıyla silindi');
        return redirect()->route('page.index');
    }

    public function post(Request $request)
    {
        $request->validate([
            'title'=>'min:3',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        $last=Page::orderBy('order','desc')->first(); //sonuncu order'ı getir.
        $page = new Page();
        $page->title=$request->title;
        $page->content=$request->content;
        $page->order=$last->order+1; //eklerken son order'a 1 ekleyerek kaydet
        $page->url=Str::slug($request->title);

        if($request->hasFile('image')){
            $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension(); //resim adı
            $request->image->move(public_path('uploads'),$imageName); //public altına uploads klasörü içine ekler
            $page->image='uploads/'.$imageName; //dbye kaydet
        }
        $page->save();
        toastr()->success('Başarılı', 'Sayfa başarıyla eklendi');
        return redirect()->route('page.index');
    }

    public function switch(Request $request)
    {
        $page=Page::findOrFail($request->id);
        $page->status=$request->statu=="true" ? 1 : 0;
        $page->save();
    }
}
