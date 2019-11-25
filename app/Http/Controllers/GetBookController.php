<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;

class GetBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id){
     $book = Book::find($id);
     $like = $book->reviews()->where('like', 1)->count();
     $review = $book->reviews()->where('user_id', auth()->user()->id)->first();
     $unLike = $book->reviews()->where('like', 0)->count();


     return view('book', compact('book', 'like', 'unLike', 'review'));
    }

    public function openBook($id)
    {
       $book = Book::find($id);
        $file = $book->file_name;
        return response()->download($file, $book->title.'.pdf', [], 'inline');
    }

    public function downloadBook($id)
    {
        $book = Book::find($id);
        $file = $book->file_name;
        //return public_path().'/books/FirstBookO_1573218705.pdf';
        return response()->download($file, $book->title.'.pdf');
    }
}
