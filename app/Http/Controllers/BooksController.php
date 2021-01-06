<?php

namespace App\Http\Controllers;

use App\Models\Books;

use Illuminate\Http\Request;



class BooksController extends Controller
{
    


    public function index(){
        $books = auth()->user()->books(); 
        return view('dashboard', compact('books')); 
    }

    public function add(){
        return view('add');
    }

    

    public function create(Request $request){ 
        $this->validate($request,['bookSummary'=>'required']);
        $book = new Books();
        $book->bookSummary = $request->bookSummary; 
        $book->name = $request->name;
        $book->bookWriter = $request->bookWriter;
        
        $book->genre = $request->genre;
        $book->publisher = $request->publisher;
      
        $book->user_id = auth()->user()->id; 
        $book->save();
        return redirect('/dashboard'); 
    }

    
    public function edit(Books $book){ 
        if(auth()->user()->id == $book->user_id){
            return view('edit',compact('book'));
        }{
            return redirect('dashboard'); 
        }
    }

    public function update(Request $request, Books $book){ 

        if(isset($_POST['delete'])){ 
            $book->delete(); 
            return redirect('dashboard');  
        }
        else{
            $this->validate($request,['bookSummary'=>'required']);
            $book->bookSummary = $request->bookSummary;

            $this->validate($request,['genre'=>'required']);
            $book->genre = $request->genre;

            $this->validate($request,['bookWriter'=>'required']);
            $book->bookWriter = $request->bookWriter;

            $this->validate($request,['name'=>'required']);
            $book->name = $request->name;

            $this->validate($request,['publisher'=>'required']);
            $book->publisher = $request->publisher;

            $book->save();
            return redirect('dashboard');
        }
    }
}
