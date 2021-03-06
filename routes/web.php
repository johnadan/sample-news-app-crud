<?php

use App\News;

use Illuminate\Support\Facades\Request;

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
 
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('news', 'NewsController');

Route::get('/createnew', "NewsController@postCreate");

Route::delete('/deleteNews/{id}', "NewsController@destroy");

// ->name('post.delete')

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

Route::any('/search',function(){
    $q = Request::get ( 'q' );
    $new = News::where('title','LIKE','%'.$q.'%')->orWhere('author','LIKE','%'.$q.'%')->orWhere('date','LIKE','%'.$q.'%')->get();
    if(count($new) > 0)
        return view('search')->withDetails($new)->withQuery ( $q );
    else return view ('search')->withMessage('No matches found.');
});

Route::get('/test', function()
{
    $img = Image::make('foo.jpg')->resize(300, 200);

    return $img->response('jpg');
});

Route::get('/pdf', 'NewsController@createPDF');

//codedge/laravel-fpdf other example, direct embed to route
// Route::get('/', function (Codedge\Fpdf\Fpdf\Fpdf $fpdf) {

//     $fpdf->AddPage();
//     $fpdf->SetFont('Courier', 'B', 18);
//     $fpdf->Cell(50, 25, 'Hello World!');
//     $fpdf->Output();

// });

Auth::routes();


