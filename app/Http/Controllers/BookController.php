<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\book;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Hash;

class BookController extends Controller
{
    public function __construct()
    {
        $this->data = [];
        // $this->middleware('auth');
    }

    public function index()
    {   
            return view('admin.books');
    }
    public function getBookData(Request $request)
    {
        $configuration = book::select('*');
       return Datatables::of($configuration)->make(true);
    }
    public function addBook(BookRequest $request){
             $request->all();
         $book = new book;
        $book->book_name = $request->input('bookName');
        $book->book_auther = $request->input('autherName');
        $book->book_price = $request->input('bookPrice');
        $book->book_dept = $request->input('department');
        $book->book_number = $request->input('bookNumber');
        $book->book_available=$request->input('bookAvailable');
        $book->save(); 
        return redirect()->route('admin/books')->with('success', 'Success Fully Insterted');

    }
  
}
