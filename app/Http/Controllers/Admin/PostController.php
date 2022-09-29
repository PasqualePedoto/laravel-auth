<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Admin\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Preleviamo la categoria selezionata che è passata nella query string, per questo
        // è chiamata query
        $category_id = $request->query('category_id');

        // Definiamo la query base per prelevare i posts
        $query = Post::orderBy('updated_at','DESC')->orderBy('created_at','DESC');

        // Ternario che determina se filtrare o meno in base alla presenza del category_id
        $posts = $category_id ? $query->where('category_id',$category_id)->paginate(10) : $query->paginate(10);
 
        // Preleviamo tutte le categorie
        $categories = Category::all();

        // Passiamo il dato alla vista per mantenere selected la option scelta
        $selected_category = $category_id;
        
        return view('admin.posts.index',compact('posts','categories','selected_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('admin.posts.create',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'nullable|string',
            'image' => 'nullable|url'
        ],[
            'title.required' => 'Il titolo è un campo obbligatorio',
            'title.string' => 'Il titolo deve essere composta da caratteri',
            'title.content' => 'Il content deve essere composta da caratteri',
            'image.url' => 'L\'immagine deve essere un url valida',
        ]);

        

        $data = $request->all();

        $new_post = new Post();

        $new_post->fill($data);

        $new_post->user_id = Auth::id();

        $new_post->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.create',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required','string',Rule::unique('post')->ignore($post->id)],
            'content' => 'nullable|string',
            'image' => 'nullable|url'
        ],[
            'title.required' => 'Il titolo è un campo obbligatorio',
            'title.string' => 'Il titolo deve essere composta da caratteri',
            'title.content' => 'Il content deve essere composta da caratteri',
            'image.url' => 'L\'immagine deve essere un url valida',
        ]);

        $data = $request->all();

        $post->update($data);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        
        return redirect()->route('admin.posts.index');
    }
}
