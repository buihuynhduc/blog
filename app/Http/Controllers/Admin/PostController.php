<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::paginate(5);
        return view('admin.post.list')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $namefile = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $image= Str::random(5).'_'.$namefile;
            while (file_exists("image/post/".$image))
            {
                $image= Str::random(5).'_'.$namefile;
            }
            $file->move('image/post',$image);
        }
        Posts::create(
            [
                'title'=>$request->title,
                'description'=>$request->description,
                'content'=>$request->get('content'),
                'image'=>$image,
                'view_count'=>0,
                'user_id'=>Auth::user()->id,
                'new_post'=>$request->new_post?1:0,
                'category_id'=>$request->category_id,
                'slug'=>Str::slug($request->name),
                'highlight_post'=>$request->highlight_post?1:0,
            ]
        );
        return redirect()->route('admin.post')->with('success','create post success');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::find($id);
        $category = Category::all();
        return  view('admin.post.edit')->with('post',$post)->with('categories',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $namefile = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $image= Str::random(5).'_'.$namefile;
            while (file_exists("image/post/".$image))
            {
                $image= Str::random(5).'_'.$namefile;
            }
            $file->move('image/post',$image);
        }
        else
        {
            $image = Posts::find($id)->image;
        }
        $post= Posts::find($id);
        $post->update(
            [
                'title'=>$request->title,
                'description'=>$request->description,
                'content'=>$request->get('content'),
                'image'=>$image,
                'view_count'=>0,
                'user_id'=>Auth::user()->id,
                'new_post'=>$request->new_post?1:0,
                'category_id'=>$request->category_id,
                'slug'=>Str::slug($request->name),
                'highlight_post'=>$request->highlight_post?1:0,
            ]
        );
        return redirect()->route('admin.post')->with('success','update post success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);
        $post->delete();
        return redirect()->route('admin.post')->with('success','delete success');
    }
}
