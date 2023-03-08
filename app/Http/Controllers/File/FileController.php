<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use App\Models\File\File;
use Dotenv\Validator;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\ResponseFactory;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Size;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

class  FileController extends Controller
{
    public function index(){
        $all_files = file::all();

        return view('file.index',compact('all_files'));
    }

        public function create(Request $request){
            /*
             $get_type = $request->file->getMimeType(); - получение типа файла
             $get_size = $request->file->getSize(); - получение размер файла
            $get_name = $request->file->getClientOriginalName(); - получение имени файла
            */
        $request ->validate([
            'file'=>'required|max:10048'
        ]);

        $fileModel = new File();

        if($request->file()){
            // добавляет цифры до названия файла
            $fileName = time() . '_'.$request->file->getClientOriginalName();
            // убирает данные цифры
            //$fileName =$request->file->getClientOriginalName();

            $filePath = $request->file('file')->storeAs('uplouds', $fileName, 'public');

            $get_type = $request->file->getMimeType();

            $fileModel -> name = $request->file->getClientOriginalName();


            $fileModel->file_path = '' .$filePath;

            $fileModel->Mine = '' .$get_type;

            $fileModel->save();

            return back()
            ->with('Успех','Файл успешно загружен.')

            ->with('file',$fileName);

            }
        }
        public function download2($id)
        {
            $files = DB::table('files')->where('id',$id)->first();

           $path = Storage::path("public/$files->file_path");

           return response()->download($path);
        }

    }


