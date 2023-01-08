<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use App\Models\File\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index(){
        $all_files = file::all();

        return view('File.index',compact('all_files'));
    }


    public function create(Request $request){

        $request ->validate([
            'file'=>'required|mimes:csv,zip,7z,txt,xlx,xls,pdf,png,jpg,torrent|max:10048'
        ]);

        $fileModel = new File();

        if($request->file()){

            $fileName = time() . '_'.$request->file->getClientOriginalName();

            $filePath = $request->file('file')->storeAs('uplouds', $fileName, 'public');

            $fileModel -> name = time(). '_'.$request->file->getClientOriginalName();



            $fileModel->file_path = '' .$filePath;

            $fileModel->save();

            return back()
            ->with('Успех','Файл успешно загружен.')

            ->with('file',$fileName);
        }

    }

    public function download(Request $request, $id){
        $find_file = File::findOrFail($id);
        $path = Storage::disk('local')->path($find_file);

        return response()->download($path, basename($path));

    }

    public function show($id){

        $find_text = File::findOrFail($id);
        return redirect()->route('Text.index', ['name' => $find_text->id]);
    }
}
