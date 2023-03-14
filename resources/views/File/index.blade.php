@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <a href="#" onclick="location.reload(); return false;">
            Обновить страницу
        </a>
        <form action="{{route('file.create')}}" method="post" enctype="multipart/form-data" class="dropzone mb-4 dz-message " id="dropzone" required >
            @csrf
            <div class="dz-message" data-dz-message><span class="display-6">Выберете файл для загрузки или перетащите его</span></div>
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
        </form>
            <p class="display-5">Файлы</p>
        </div>
    @foreach ($all_files as $files)
    <div class="files mb-4">
        <a href="{{ route('file.download2', $files->id) }}" class="blockquote">{{$files->name }}</a>

    </div>
    @endforeach
    <div>{{ $all_files->links()}}</div>
    <script type="text/javascript">
        Dropzone.options.dropzone =
                {
                    dictDefaultMessage: "Выберете файл для загрузки или перетащите его",
                    maxFilesize: 1000,
                    maxFiles: 10,
                    acceptedFiles: "",
                    addRemoveLinks: true,

                };
                setTimeout(function(){
	                location.reload();
                }, 300000);
    </script>

@endsection
