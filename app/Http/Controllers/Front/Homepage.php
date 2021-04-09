<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Config;
use Illuminate\Support\Facades\DB; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
class Homepage extends Controller
{
    public function __construct()
    {
        
        if(Config::find(1)->active==0){
            return redirect()->to('site-bakimda')->send();
        }
    }

    public function index()
    {
        $categorylist=Category::where('status',1)->get(); //tüm kategori isimlerini getir
        $articlelist=Article::with('Category')->where('status',1)->whereHas('Category',function($query){
            $query->where('status',1);
        })->paginate(10); //yazıları sayfalama
        $articlelist->withPath(url('/yazilar/sayfa')); //pagination url düzelt
        //$pages=Page::orderBy('order','ASC')->get(); //tüm menü sayfalarını sıralamaya göre getir
        
        return view('front.homepage',
        ['categorylist' => $categorylist],
        ['articlelist' => $articlelist],
        //['pages' => $pages]
        );
        
    }

    

    public function single($slug) //detay sayfası
    {
        $article=Article::where('slug',$slug)->first() ?? abort(404, 'Böyle bir yazı bulunamadı');
        $article->increment('hit'); //hit değerini 1 artır 
        $categorylist=Category::all();
        return view('front.single',['categorylist' => $categorylist],['article' => $article]);
    }

    public function category($slug) //kategori menüsü kategori sluglarını çekiyoruz
    {
        $category=Category::where('slug',$slug)->first() ?? abort(404, 'Böyle bir yazı bulunamadı');
        $categorylist=Category::all(); //bu kategori listesi widget için
        $data['category']=$category;
        $data['articles']=Article::where('category_id',$category->id)->where('status',1)->orderBy('created_at','DESC')->paginate(1);
        return view('front.category',$data,['categorylist' => $categorylist]);
    }

    public function page($slug) //sayfa detay
    {
        $page=Page::where('url',$slug)->first() ?? abort(404);
        $data['pages']=Page::where('status',1)->orderBy('order','ASC')->get();
        $data['page']=$page;
        
        return view('front.page',$data);
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function contactpost(Request $request)
    {
        $rules = [
            'name'  => 'required|min:5',
            'email' => 'required|email',
            'topic'   => 'required',
            'message'   => 'required|min:10'
        ];


       


        $this->validate($request, $rules);

        Mail::send([],[],function($message) use($request){
            $message->from('iletisim@blogsitesi.com','Blog Sitesi'); //bizden gidecek
            $message->to('ery.kalkan19@outlook.com');
            $message->setBody(' Mesajı gönderen: '.$request->name.'<br />
            Mesajı gönderen mail: '.$request->email.'<br />
            Mesaj konusu: '.$request->topic.'<br />
            Mesaj: '.$request->message.'<br /><br />
            Mesaj gönderilme tarihi: '.now().'

','text/html');
            $message->subject($request->name. ' iletişimden mesaj gönderdi.');
        });
        

        /* $contact = new Contact;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->topic=$request->topic;
        $contact->message=$request->message; 
        
        $contact->save(); */
        return redirect()->route('contact')->with('success','Mesajınız bize iletildi. Teşekkür ederiz.');
    }

    
}
