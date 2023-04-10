@extends('layouts.base')
@section('content')

<div class="container d-flex flex-column min-vh-100 ">
    <form class="" action="{{ route('text.store','$all_text->id') }}" method="post">
        @csrf
        <div class="form-group">
        <label for="text">{{ __('Текст') }}</label>
       <input type="text"  class="form-control mb-3"  id="text" name="text" placeholder="{{ __('Введите текст') }}" maxlength="255" required>
       <!-- <textarea name="text" class="form-control mb-3" placeholder="{{ __('Введите текст') }}" maxlength="255" required rows="5" cols="33"></textarea>--->
        <button type="submit" class="btn btn-primary mb-5  btn-dark">
            {{ __('Сохранить') }}</button>
    </form>
    <h2 class="display-5">Сохраненные заметки</h2>
        @foreach ($all_text as $text )
      <!--Сделать в базе элемент, который будет отмечать, что добавлена ссылка и под ней для перихода будет кнопка-->
      <!--Изменине ссылок может быть вынесено на первую страницу, чтобы была система SPA-->
        <div class="card mt-3">
            <div class="card-body">
                <a class=""  href="{{ route('text.show',$text->id) }}" title="
Дата сохранения текста: {{ $text->created_at }}
Дата обновления текста: {{ $text->updated_at }}">{{ $text->text }}
                 </a>
                {{-- <form action="{{ $text->text }}">
                    <button>Перейти</button>
                </form> --}}

                <div class="button__delete mt-4 d-flex">
                    <form action="{{ route('text.delete',$text->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-primary  btn-dark" type="submit">{{ __('Удалить') }}</button>
                    </form>
                </div>
            </div>
          </div>
        @endforeach
        <div>{{ $all_text->links()}}</div>
</div>
@endsection
