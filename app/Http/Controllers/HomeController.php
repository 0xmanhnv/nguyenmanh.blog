<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Form;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function dropzone()

    {

        return view('uploadsFile');

    }


    /**

     * Image Upload Code

     *

     * @return void

     */

    public function dropzoneStore(Request $request)

    {

        $image = $request->file('file');
        // dd($image);

        $imageName = time().$image->getClientOriginalName();

        $image->move(public_path('images'),$imageName);



        return response()->json(['success'=>$imageName]);

    }
}
