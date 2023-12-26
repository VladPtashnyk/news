<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
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

        return view('admin.index', compact('news'));
    }

    public function allUsers()
    {
        $users = User::all();
        $authors = Author::all();

        return view('admin.all-users', compact('users', 'authors'));
    }

    public function deleteUser($idUser)
    {
        $user = User::find($idUser);

        $user->delete();

        return redirect()->route('admin.allUsers');
    }

    public function deleteAuthors($idAuthor)
    {
        $author = Author::find($idAuthor);

        $author->delete();

        return redirect()->route('admin.allUsers');
    }

    public function deleteNews($idNews)
    {
        $oneNews = News::findOrFail($idNews);

        $oneNews->images()->delete();

        $oneNews->delete();

        return redirect()->route('admin.dashboard');
    }

}
