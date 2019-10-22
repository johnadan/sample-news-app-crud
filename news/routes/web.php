<?php

use App\News;
use Illuminate\Support\Facades\Request;

// use App\News;
// use Illuminate\Support\Facades\Request;

//use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'NewsController@getNewsPublic');
 //{
    //return view('welcome');
//});

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('news', 'NewsController');

Route::get('/createnew', "NewsController@postCreate");

//Route::get('/editnew/{id}', "NewsController@edit");

//Route::post('/createnew', "NewsController@postCreateNew");

//Route::get('/createnew', "NewsController@Sample")->name('createnew');

//Route::get('/createnew', "NewsController@Sample");

//Route::delete('/deleteNew/{id}', "NewsController@getDeleteNew")->name('new.delete');

//Route::put('/editNew/{id}', "NewsController@postEditNew")->name('new.edit');

//Route::get('/search','NewsController@search');

//Route::get('/search','SearchController@searchNews');

// Route::post('/search',function(){
//     $q = Request::get ( 'q' );
//     $news = News::where('title','LIKE','%'.$q.'%')->orWhere('author','LIKE','%'.$q.'%')->get();
//     if(count($news) > 0)
//         return view('search')->withDetails($news)->withQuery ( $q );
//     else return view ('search')->withMessage('No matches found. Try to search again');
// });

// Route::post ( '/search', function () {
// 	$q = Request::get ( 'q' );
// 	if($q != ""){
// 		$news = News::where ( 'title', 'LIKE', '%' . $q . '%' )->orWhere ( 'author', 'LIKE', '%' . $q . '%' )->orWhere ( 'date', 'LIKE', '%' . $q . '%' )->get ();
// 		if (count ( $news ) > 0)
// 			return view ( 'search' )->withDetails ( $news )->withQuery ( $q );
// 		else
// 			return view ( 'search' )->withMessage ( 'No matches found. Try to search again' );
// 	}
// 	return view ( 'search' )->withMessage ( 'No matches found. Try to search again' );
// } );

// Route::get('/clear-cache', function() {
//     Artisan::call('cache:clear');
//     return "Cache is cleared";
// });

Route::any('/search',function(){
    $q = Request::get ( 'q' );
    $new = News::where('title','LIKE','%'.$q.'%')->orWhere('author','LIKE','%'.$q.'%')->orWhere('date','LIKE','%'.$q.'%')->get();
    if(count($new) > 0)
        return view('search')->withDetails($new)->withQuery ( $q );
    else return view ('search')->withMessage('No matches found.');
});

Auth::routes();

// Route::middleware(['auth'])->group(function() {
// 	Route::get('/home', 'HomeController@index')->name('home');
// }

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
