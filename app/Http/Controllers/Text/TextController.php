<?php

namespace App\Http\Controllers\Text;

use App\Http\Controllers\Controller;
use App\Models\Text\Text;
use Illuminate\Http\Request;

class TextController extends Controller
{
    public function index(){
        $all_text = Text::all();

        return view('Text.index',compact('all_text'));
    }

    public function create(){

        return view('Text.index');

    }

    public function store(Request $request){

        $request = request()->validate([
            'text'=> 'string'
        ]);

        Text::create($request);

        return redirect()->route('Text.index');
    }

    public function show($id){
        $find_text = Text::findOrFail($id);


        return view('Text.edit',compact('find_text'));

    }

    public function update($id){
        $find_text = Text::findOrFail($id);

        $data = request()->validate([
            'text'=> 'string'
        ]);

        $find_text->update($data);

        return redirect()->route('Text.index', ['text' => $find_text->id]);
    }

    public function delete($id){

        $find_text = Text::findOrFail($id);

        $find_text->delete();

        return redirect()->route('Text.index',$find_text->$id);
    }

    public function return_deleted(){

    }



}
