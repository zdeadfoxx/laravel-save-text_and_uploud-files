<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use App\Models\File\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class  FileController extends Controller
{
    public function index(){
        $all_files = file::paginate(7);
        return view('file.index',compact('all_files'));
    }

        public function create(Request $request){
            /*
             $get_type = $request->file->getMimeType(); - получение типа файла
             $get_size = $request->file->getSize(); - получение размер файла
            $get_name = $request->file->getClientOriginalName(); - получение имени файла
            */
        $request ->validate([
            'file'=>'required|max:1e+6'
        ]);

        $fileModel = new file();

        if($request->file()){
            // добавляет цифры до названия файла
            $fileName = time() . '_'.$request->file->getClientOriginalName();
            // убирает данные цифры
            //$fileName =$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uplouds', $fileName, 'public');

            $get_type = $request->file->getMimeType();
            $get_size = $request->file->getSize();
            $fileModel -> name = $request->file->getClientOriginalName();

            $fileModel->file_path = '' .$filePath;
            $fileModel->Size = '' .$get_size;
            $fileModel->Mine = '' .$get_type;

            $fileModel->save();
            return redirect()->route('file.index');
            }
        }
        public function download2($id)
        {
           $files = DB::table('files')->where('id',$id)->first();
           $path = Storage::path("public/$files->file_path");
           return response()->download($path);
        }

    }


