<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Support\Facades\Storage;
use App\Tags;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Posts::paginate(5);
        return view('admin.post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tags::all();
        $category = Category::all();
        return view('admin.post.create',compact('category','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'      => 'required',
            'category_id'=> 'required',
            'content'     => 'required',
            'picture'      => 'required'
        ]);
        $picture = $request->picture;
        $new_picture = time().$picture->getClientOriginalName();

        $post = Posts::create([
            'title'     => $request->title,
            'category_id'   => $request->category_id,
            'content'   => $request->content,
            'picture'   => 'public/uploads/post/'.$new_picture,
            'slug'      => Str::slug($request->title),
            'users_id'  => Auth::id()
        ]);
        $post->tags()->attach($request->tags);
        $picture->move('public/uploads/post/',$new_picture);
        return redirect()->back()->with('success','Post has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $tags = Tags::all();
        $post = Posts::findorfail($id);
        return view('admin.post.edit',compact('post','category','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'      => 'required',
            'category_id'=> 'required',
            'content'     => 'required',
        ]);
        
        $post = Posts::findorfail($id);

        if($request->has('picture')){
            $picture = $request->picture;
            $new_picture = time().$picture->getClientOriginalName();
            $picture->move('public/uploads/post/',$new_picture);

            $post_data = [
                'title'     => $request->title,
                'category_id'   => $request->category_id,
                'content'   => $request->content,
                'picture'   => 'public/uploads/post/'.$new_picture,
                'slug'      => Str::slug($request->title)
            ];
        }else{
            $post_data = [
                'title'     => $request->title,
                'category_id'   => $request->category_id,
                'content'   => $request->content,
                'slug'      => Str::slug($request->title)
            ];
        }
        
        $post->tags()->sync($request->tags);
        $post->update($post_data);
        return redirect()->route('post.index')->with('success','Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::findorfail($id);
        $post->delete();

        return redirect()->back()->with('success','Post hasbeen deleted');
    }

    public function del(){
        $post = Posts::onlyTrashed()->paginate(5);
        return view('admin.post.del', compact('post'));
    }

    public function restore($id){
        $post = Posts::withTrashed()->where('id',$id)->first();
        $post->restore();

        return redirect()->back()->with('success','Post hasbeen restored! Please check your list post');
    }
    public function kill($id){
        $picture = Posts::where('id',$id)->first();
        File::forceDelete('public/uploads/post/'.$picture);
        Storage::disk('s3')->delete('public/uploads/post/'.$picture);

        $post = Posts::withTrashed()->where('id',$id)->first();
        $post->forceDelete();


        return redirect()->back()->with('success','Post hasbeen permanently deleted');
    }
}
