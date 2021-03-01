<?php

namespace App\Http\Controllers;

use App\News;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\HtmlString;
use Codedge\Fpdf\Fpdf\Fpdf;

class NewsController extends Controller
{
    //
    private $fpdf;

    public function getNewsPublic(){
        $news = News::orderBy('created_at', 'DESC')->get();
        //$news = News::all();
        // QrCode::generate('Make me into a QrCode!');
        //return view('welcome', compact('news'));
        //$qr = QrCode::generate('Make me into a QrCode!', '../../../public/images/qrcode.svg');
        $qr = QrCode::size(500)->backgroundColor(255, 0, 0)->eyeColor(0, 255, 255, 255, 0, 0, 0)->eye('circle')->style('dot')->margin(100)->encoding('UTF-8')->generate('Make me into a QrCode!');
        //size not working
        return view('welcome', compact('news','qr'));
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
        'editedtitle' => 'string',
         'editedauthor' => 'string',
         'editeddate' => 'required',
         'editedcontent' => 'string',
        //  'editedimage' => 'required'
        //  'editedimage' => 'image|mimes:jpeg,png,jpg,gif,svg'
        // 'editedimage' => 'mimes:jpeg,png,jpg,gif,svg'
        ]);
        $new = News::find($id);
        // ddd($new);
        $new->title = $request->editedtitle;
        $new->author = $request->editedauthor;
        $new->date = $request->editeddate;
        $new->content = $request->editedcontent;
        //$new->image = $request->editedimage;

        // $file = $request->file('editedimage');
        // $new->image = Storage::disk('public')->put('editedimage', $file);
        
        //$new->image = Storage::disk('public/storage/image')->put('editedimage', $file);

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
         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp,pdf,doc,ppt|max:2048'
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

    public function createPDF()
    {
        $this->fpdf = new Fpdf;
        // $this->fpdf->AddPage("L", ['100', '100']);
        $this->fpdf->AddPage("L", ['215.9','279.4']); //8.5 x 11 inches 
        $this->fpdf->SetFont('Courier', 'B', 18); 
        // $this->fpdf->SetFont('Arial','B',14);
        //$this->fpdf->Text(10, 10, "Hello FPDF"); //sagad
        $this->fpdf->Cell(50, 25, 'Hello World!'); //may margin     
        $this->fpdf->Output();
        exit;
    }

}
