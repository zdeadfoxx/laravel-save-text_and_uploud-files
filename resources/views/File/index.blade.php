@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <form action="{{route('file.create')}}" method="post" enctype="multipart/form-data">
          <h3 class="text-center mb-5">Загрузка файлов</h3>
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

            <div class="mb-3">
                <input type="file" name="file"  class="form-control" id="chooseFile">
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                {{ __('Загрузить файл') }}
            </button>

        </form>
    @foreach ($all_files as $file)
    <div class="files">
        <br>
            <a class="link" href="Storage::url($file->file_path)">{{ $file->name }}</a>
        <br>
       <!--<img src="{{ Storage::url($file->file_path) }}" alt="">-->
        <button>Скачать</button>
    </div>
    @endforeach
    </div>
@endsection
