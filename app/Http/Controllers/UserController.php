<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\News;
use App\Models\NewsImage;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $news = News::all();

        foreach ($news as $item) {
            $firstImage = $item->getFirstImage();
            $featuredImage = $item->images->firstWhere('position', 1);

            $item->firstImage = $firstImage;
            $item->featuredImage = $featuredImage;
        }

        return view('news.index' , compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'quote' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $author = Author::where('user_id', Auth::id())->first();
        // dd($author->id);

        if (!$author) {
            $idUser = Session::get('user.id') ?? Session::get('admin.id');
            $nameAuthor = Session::get('user.name') ?? Session::get('admin.name');
            $author = new Author([
                'user_id' => $idUser,
                'name' => $nameAuthor,
            ]);
            $author->save();
        }

        $news = new News([
            'author_id' => $author->id,
            'title' => $request->input('title'),
            'short_description' => $request->input('short_description'),
            'description' => $request->input('description'),
            'quote' => $request->input('quote'),
            'publication_date' => now(),
        ]);
        $news->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('news_images', 'public');

                $newsImage = new NewsImage([
                    'news_id' => $news->id,
                    'image_path' => $path,
                ]);
                $newsImage->save();
            }
        }

        return redirect()->route('user.dashboard');
    }

    public function show(int $idNews)
    {
        $oneNews = News::findOrFail($idNews);
        $images = $oneNews->images;

        return view('news.show', compact('oneNews', 'images'));
    }

    public function myNews(int $idUser)
    {
        $user = User::findOrFail($idUser);

        $author = $user->author;

        if (!$author) {
            return redirect()->route('user.createNews');
        }

        $userNews = $author->news;

        foreach ($userNews as $item) {
            $firstImage = $item->getFirstImage();
            $featuredImage = $item->images->firstWhere('position', 1);

            $item->firstImage = $firstImage;
            $item->featuredImage = $featuredImage;
        }

        return view('news.myNews', compact('userNews', 'user'));
    }

    public function edit($idNews)
    {
        $oneNews = News::findOrFail($idNews);
        $images = $oneNews->images;

        return view('news.edit', compact('oneNews', 'images'));
    }

    public function update(Request $request, $idNews)
    {
        $oneNews = News::findOrFail($idNews);

        $request->validate([
            'title' => 'required|string|max:255',
            'publication_date' => 'required|date',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'quote' => 'required|string',
            'featured_image' => 'required|exists:news_images,id',
        ]);

        $oneNews->update([
            'title' => $request->title,
            'publication_date' => $request->publication_date,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'quote' => $request->quote,
        ]);

        $oneNews->images()->update([
            'position' => 0
        ]);

        $oneNews->images()->where('id', $request->featured_image)->update([
            'position' => 1
        ]);

        return redirect()->route('user.dashboard');
    }

    public function delete($idNews)
    {
        $oneNews = News::findOrFail($idNews);

        $oneNews->images()->delete();

        $oneNews->delete();

        return redirect()->route('user.dashboard');
    }
}
