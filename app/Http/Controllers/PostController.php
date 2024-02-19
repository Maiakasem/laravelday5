<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'user_id' => 'required|exists:users,id',
            'img'=> 'required|max:1024|image',
        ]);
        $fileName=Storage::putFile('public/postImgs',$data['img']);
        $data['img']=$fileName;
        $data['slug'] = Str::slug($data['title']);
        $post=post::create($data);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $postData = Post::where('id', $id)->first();
        return view('posts.show', ['postData' => $postData]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $postData = Post::where('id', $id)->first();
        $users = User::all();
        return view('posts.edit', ['postData'=>$postData, 'users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'img'=>'nullable|image|max:1024',
            
        ]);
        $post = Post::find($id);
        if ($request->hasFile ( 'img' )){
            Storage::delete($post->img);
            $path = $request->file('img')->store('postImgs', 'public');
            
           
        }

        
        $post['slug'] = Str::slug($request->input('title'));
        $post->update($data);
        return redirect()->route('posts.index');
    }
   

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        
        $post = Post::find($id);
        Storage::delete($post->img);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
