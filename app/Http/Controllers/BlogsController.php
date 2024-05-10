<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function page() {
     
        $blogs = Blogs::orderBy('id','desc')->get();
        return view('front.pages.blogs', compact('blogs'));
    }
    public function getBlog($slug){
            $blog = Blogs::whereSlug($slug)->first() ?? abort(404,'BÖYLE BİR YAZI BULUNAMADI');
            $blogs = Blogs::inRandomOrder()->limit(5)->get();
            return view('front.pages.blogdetail', compact('blog','blogs'));
    }
    public function index()
    {
            $blogs = Blogs::all();
            return view('panel.pages.blogs', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.pages.blogsAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imageName = "";
        if($request->has('images'))
        {
            $imageName = rand(1,1000).'-blogimage-'.time().rand(1,1000).'.'.$request->file('images')->extension();
            $request->file('images')->move(public_path('front/images/blog'),$imageName);
        }


        Blogs::create([
            'slug' => Str::slug($request->title),
            'title' => $request->title,
            'content' => $request->content,
            'photo' => $imageName
        ]);
        return redirect()->back()->withSuccess('Blog başarıyla eklendi.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Blogs $blogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blogs $blog)
    {
      
        $blog = Blogs::find($blog->id) ?? abort(404,'Böyle bir blog yok...');
     
        return view('panel.pages.blogsEdit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blogs $blog)
    {
        $blog = Blogs::find($blog->id) ?? abort(404,'Böyle bir ilan yok...');
        $editblog = $request->except(['_token', '_method']);

        $blog->title = $request->title;
        $blog->content = $request->content;
        
        if($request->has('images'))
        {
            $imageName = rand(1,1000).'-blogimage-'.time().rand(1,1000).'.'.$request->file('images')->extension();
            $request->file('images')->move(public_path('front/images/blog'),$imageName);    
            $blog->photo = $imageName;
        }
        $blog->save();
        return redirect()->back()->withSuccess('Blog başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blogs $blog)
    {
        if(Auth::check())
        {
            if(auth()->user()->type == "admin") 
            {
                $blog = Blogs::find($blog->id) ?? abort(404,'Böyle bir blog yok...');

                    unlink(public_path('front/images/blog/').$blog->photo);
                
                $blog->delete();
                return redirect()->route('admin.blogs.index')->withSuccess('Blog başarıyla silindi.');
            }
            else {
                return redirect()->route('admin.blogs.index')->withErrors('Blog silinemedi...');
            }

            }
            else {
                return redirect()->route('admin.blogs.index')->withErrors('Blog silinemedi...');
            }
    }
}
