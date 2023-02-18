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

        if($request->has('file')){

        $request ->validate([
            'file.*'=>'required|mimes: |max:10048'
        ]);

             $get_type = $request->file->getMimeType();
             $get_size = $request->file->getSize();
            $get_name = $request->file->getClientOriginalName();

             $Path = $request->file->store('uplouds','public');

             $download = File::create([
                'name' => $request->file->getClientOriginalName(),
                 'file_path' => $Path,
                 'Mine' => $request->file->getMimeType(),
                 'Size' => $request->file->getSize(),
             ]);

           return redirect()->route('file.index');

            }

        }
        public function create1(Request $request){


        $request ->validate([
            'file'=>'required|max:10048'
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
       

        public function download2($id)
        {
            $files = DB::table('files')->where('id',$id)->first();

           $path = Storage::path("public/$files->file_path");

           return response()->download($path);
        }

    }


