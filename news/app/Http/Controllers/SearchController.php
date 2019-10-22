<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use Illuminate\Support\Facades\Request;

use App\News;

use DB;

class SearchController extends Controller
{
    //
    public function searchNews() {
    $input = Request::get('search');
    $results = DB::table('news')->where('title', '=', $input)->orWhere('author', '=', $input)->get();
    //return view::make('news')->with('results', $results);
    //return redirect('home')->with('results', $results);
    return redirect('search')->with('results', $results);
    }
}
