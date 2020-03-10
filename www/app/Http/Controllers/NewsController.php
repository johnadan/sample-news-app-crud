<?php

namespace App\Http\Controllers;

use App\News;

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

    public function destroy($id)
    {
         $new = News::find($id);

         //ddd($new);

         $new->delete();

         return redirect('home')->with('success', 'News has been deleted successfully');
    }

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

        // $file = $request->file('editedimage');
        // $new->image = Storage::disk('public')->put('editedimage', $file);

        //$new->save();
        
        // return redirect('home')->with('success', 'News has been edited successfully');
        if ($request->user()->news()->save($new)){
            return redirect('home')->with('success', 'News has been edited successfully');
        }
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

}
