<?php

namespace App\Http\Controllers;

use App\Models\Text\Text;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_text = Text::paginate(12);
        return view('text.index',compact('all_text'));
    }
}
