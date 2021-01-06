<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books;
use App\Http\Resources\Book as BookResource;
use Dotenv\Validator;

class BookController extends BaseController
{
    


    public function index(){ 

        $books = Books::all(); 
        return $this->sendResponse(BookResource::collection($books),'Books retreived successfully');

    }

    function store(Request $request){ 

        $input = $request->all(); 
        
        

        $validator = Validator::make($input,[  
            'name'=>'required',  
            'bookWriter'=>'required',
            'genre' => 'required',
            'bookSummary'=> 'required',
            'publisher'=>'required'
        ]);


        if($validator->fails()){ 
            return $this->sendEror('Validation error.',$validator->erors());
        }

        
        $book= Books::create($input); 

        return $this->sendResponse(new BookResource($book),' Books created sucessfully');

        
    }

    public function show($id){  

        $book = Books::find($id); 
        
        if(is_null($book)){
            return $this->sendError('Book not found.');
        }

        return $this->sendResponse(new BookResource($book),' Books retrieved sucessfully');
        
    }

    public  function update(Request $request, Books $book){ 

        
        $input = $request->all(); 


        $validator = Validator::make($input,[ 
            'name'=>'required',  
            'bookWriter'=>'required',
            'genre' => 'required',
            'bookSummary'=> 'required'
            

            ]);


        if($validator->fails()){ 

            return $this->sendEror('Validation error.',$validator->erors());
        }


        $book->name = $input['name'];
        $book->bookWriter = $input['bookWriter'];
        $book->genre = $input['genre'];
        $book->bookSummary = $input['bookSummary'];

       
        $book->save();
        return $this->sendResponse(new BookResource($book),' Books updated sucessfully');
        

    }





    public function destroy(Books $book){
        $book->delete(); 
        
        return $this->sendResponse([],' Book deleted sucessfully'); 
    }


    
}
