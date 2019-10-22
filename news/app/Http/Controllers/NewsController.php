<?php

namespace App\Http\Controllers;

use App\News;

//use Illuminate\Support\Facades\Input;

//use Session;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function getNewsPublic(){
        $news = News::orderBy('created_at', 'DESC')->get();
        //$news = News::all();
        return view('welcome', compact('news'));
    }

    // public function postCreateNew(Request $request){
    // 	$this->validate($request, [
    // 	'title' => 'required',
    //      'author' => 'required',
    //      'date' => 'required',
    //      'content' => 'required',
    //      'image' => 'required'
    // 	]);
    // 	$new = new News();
    // 	$new->title = $request['title'];
    //     $new->author = $request['author'];
    //     $new->date = $request['date'];
    //     $new->content = $request['content'];
        
    //     $file = $request->file('image');
    //     $new->image = Storage::disk('public')->put('image', $file);

    //     //dd($new);

    // 	if ($request->user()->news()->save($new)) {
    //         return redirect('home');
    // 	}
    	
    // }

    // public function getDeleteNew($id){
    //     $new = News::find($id);
    //     // $new = News::findorfail($id);
    //     //ddd($new);
    //     // dd($new);
    //     $new->delete();
    //     return redirect('home');
    // }

    public function destroy($id)
    {
         $new = News::find($id);

         //ddd($new);

         $new->delete();

         return redirect('home')->with('success', 'News has been deleted successfully');
    }

    // public function postEditNew(Request $request, $id){
    //     $new = News::find($id);
    //     // ddd($new);
    //     $new->title = $request->editedtitle;
    //     $new->author = $request->editedauthor;
    //     $new->date = $request->editeddate;
    //     $new->content = $request->editedcontent;

    //     $new->save();
        
    //     return redirect('home');
    // }

    public function index()
    {
        $news = News::orderBy('created_at', 'DESC')->get();
        //$news = News::all();

        return view('home', compact('news'));
        // return view('shares.index', compact('shares'));
    }

    public function show($id)
    {
        $new = News::findOrFail($id);

        return view('show')->withNew($new);
    }

    public function postCreate(){
        return view('/createnew'); 
    }

    public function edit($id)
    {
        $new = News::find($id);

        //return view('/editnew/{id}');
        
        //return view('/editnew');
        return view('editnew')->withNew($new);
    }

    public function update(Request $request, $id){
         // ddd($new);
        $this->validate($request, [
        'editedtitle' => 'required',
         'editedauthor' => 'required',
         'editeddate' => 'required',
         'editedcontent' => 'required',
         //'image' => 'required'
        ]);
        $new = News::find($id);
        // ddd($new);
        $new->title = $request->editedtitle;
        $new->author = $request->editedauthor;
        $new->date = $request->editeddate;
        $new->content = $request->editedcontent;

        $new->save();
        
        return redirect('home')->with('success', 'News has been edited successfully');
    }

    public function store(Request $request){
        $this->validate($request, [
        'title' => 'required',
         'author' => 'required',
         'date' => 'required',
         'content' => 'required',
         'image' => 'required'
        ]);
        $new = new News();
        $new->title = $request['title'];
        $new->author = $request['author'];
        $new->date = $request['date'];
        $new->content = $request['content'];
        
        $file = $request->file('image');
        $new->image = Storage::disk('public')->put('image', $file);

        if ($request->user()->news()->save($new)){
            return redirect('home')->with('success', 'News has been added successfully');
            //return redirect('home')->with('success', 'News has been added');
        }
    }

    // public function getSearchNew(){
    //     $q = Input::get ( 'q' );
    //     $new = News::where('title','LIKE','%'.$q.'%')->orWhere('author','LIKE','%'.$q.'%')->get();
    //     if(count($new) > 0)
    //         return view('/home')->withDetails($new)->withQuery ( $q );
    //     else return view ('/home')->withMessage('No matches found.');
    // }

    // public function search(Request $request){
    //     if ($request->ajax()) {
    //     $output = "";
    //     $news = News::where('title','LIKE','%'.$request->search."%")->get();
    //     if ($news) {
    //         foreach ($news as $new) {
    //         $output.='<tr>'.
    //         '<td>'.$new->title.'</td>'.
    //         '<td>'.$new->author.'</td>'.
    //         //'<td>'.$new->content.'</td>'.
    //         '</tr>';
    //         }
    //     if (!$news) {
    //             echo "No results found!";
    //         }    
    //     return Response($output);
    //     }
    //    }
    // }

    // public function Sample(){

    // }

}
