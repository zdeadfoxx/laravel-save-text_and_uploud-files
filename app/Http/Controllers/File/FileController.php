<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use App\Models\File\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(){
        $all_files = file::all();

        return view('File.index',compact('all_files'));
    }


    public function create(Request $request){

        $request ->validate([
            'file'=>'required|mimes:csv,zip,txt,xlx,xls,pdf,png,jpg,torrent|max:10048'
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
}
