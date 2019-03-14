<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Books;
use App\ItemFavorite;
use Auth;
use Jenssegers\Agent\Agent;
class BooksController extends Controller
{
    //

    public function index(){
        
        $data['books'] = Books::published()->get();
        return view('cms.books',$data);
    }

    public function add(Request $request){  
        
        // $books = new Books();
        // $books->title = $request->input('title');
        // $books->category = $request->input('category');
        // $books->description = $request->input('description');
        // $books->save(); 
        
        // $file = $request->save_file;
        // $filename = $file->getClientOriginalName();
       
        // $request->request->add(['file' => $filename]);
        Books::create($request->all());
        // $path = 'public/uploads/'.$filename;   
        // $this->saveFile($filename,$path);   
        
        
        alertify()->success('Item added to cart')->delay(10000)->position('bottom right');
        return redirect()->back();
    }

    public function saveFile($filetosave,$path){
        return Storage::put($path, $filetosave);  
    }

    public function delete($id){
        $books = Books::find($id);
        $books->delete();
        return redirect()->back()->with(['success'=>'Data successfully removed']);
    }

    public function restore($id){
        $books = Books::withTrashed()->where('id',$id)->restore(); 
        return redirect()->back()->with(['success'=>'Data successfully restored']);
    }

    
    public function edit($id){
        $data['book'] = Books::find($id);  
        return view('cms.books.edit',$data);
    }

    public function add_favorites($id){ 

        
        ItemFavorite::firstOrCreate(
            [
                'item_id' => $id,
                'customer_id' => isset(Auth::user()->id) ? Auth::user()->id : 1
            ]
            );


            alertify()->success('i am daisychained')->delay(10000)->clickToClose()->position('bottom right');
            

        return redirect()->back();
    }

    public function update(Request $request){
        
        $book = Books::whereId($request->id)->update($request->except('_token'));
      
        if($book){ 
            return redirect()->back()->with(['success'=>'Data successfully updated']);
        } else{
            
            return redirect()->back()->with(['error'=>'Error on saving']);
        }
    }

    public function front_view($id){
 
        $data['book'] = Books::find($id);  
        return view('frontend.books.view',$data);

    }

}

