<?php

namespace App\Http\Controllers;

//import Model "Post"
use App\Models\Post;
use App\Models\User;

//return type View
use Illuminate\View\View;

//return type redirectresponse
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * index
     * 
     * @return View
     * 
     */
    public function index(Request $request): View
    {
        // Mengecek apakah pengguna sudah autentikasi
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            
            if ($usertype == 'user') {
                $viewName = 'news.index';
            } elseif ($usertype == 'admin') {
                $viewName = 'news.admin';
            } else {
                return redirect()->back();
            }
        } else {
            $viewName = 'news.index';
        }
    
        if ($request->has('cari')) {
            $news = Post::where('title', 'like', '%' . $request->cari . '%')->get();
        } else {
            $news = Post::latest()->get();
        }
        return view($viewName, ['news' => $news, 'request' => $request]);
    }
    
    public function create(): View
    {
        return view('news.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form 
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:10000',
            'title' => 'required|min:5',
            'content' => 'required|min:10',
            'category' => 'required'
        ]);

        //upload image 
        $image = $request->file('image');
        $image->storeAs('public/news', $image->hashName());

        //create post 
        Post::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category
        ]);

        //redirect to index 
        return redirect('admin')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function show(string $id): View
    {
        $new = Post::findOrFail($id);
        return view('news.show', compact('new'));
    }

    public function destroy($id): RedirectResponse
    {
        $news = Post::findOrFail($id);

        Storage::delete('public/news' . $news->image);
        $news->delete();
        return redirect()->route('news.admin')->with(['success' => 'Data Berhasil Dihapus']);
    }

    public function edit(string $id): View
    {
        $new = Post::findOrFail($id);
        return view('news.edit', compact('new'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form 
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,jpg,png,webp|max:10000',
            'title' => 'required|min:5',
            'content' => 'required|min:10',
            'category' => 'required'
        ]);


        //get post by ID 
        $new = Post::findOrFail($id);
        //check if image is uploaded 
        if ($request->hasFile('image')) {
            //upload new image 
            $image = $request->file('image');
            $image->storeAs('public/news', $image->hashName());
            //delete old image 
            Storage::delete('public/news/' . $new->image);
            //update news with new image 
            $new->update([
                'image' => $image->hashName(),

                'title' => $request->title,
                'content' => $request->content,
                'category' => $request->category
            ]);
        } else {

            //update post without image 
            $new->update([
                'title' => $request->title,

                'content' => $request->content,
                'category' => $request->category
            ]);
        }

        //redirect to index 
        return redirect('admin')->with('success', 'Data Berhasil Diubah!');
    }

    public function admin(): View
    {
        $news = Post::latest()->get();
        $title = 'Hapus Data!';
        $text = "Yakin Mau Hapus Berita Ini?";
        confirmDelete($title, $text);
        return view('news.admin', compact('news'));

    }
}
