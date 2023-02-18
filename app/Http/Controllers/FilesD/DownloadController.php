<?php

namespace App\Http\Controllers\FilesD;

use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Models\File\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{

    public function index()
    {
        $all_files = File::all();
        return view('file.index', compact('all_files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Path = $request->file->store('uplouds','public');

        $download = Download::create([
            'path' => $Path,
            'mine' => $request->file()->getMimeType(),
            'size' => $request->file()->getSize(),
        ]);

        return $download;
    }

    public function download(Download $download)
    {
    }


    public function update(Request $request, Download $download)
    {
        //
    }

    public function delete(Download $download,Storage $storage)
    {
        if(! $storage::disk('public')->delete($download->path)){
            return;
        }
        if($download->delete()){
            return ['result'=>true];
        }
    }
}
