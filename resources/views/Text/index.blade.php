@extends('layouts.base')
@section('content')

<div class="container d-flex flex-column min-vh-100 ">
    <form class="" action="{{ route('Text.store','$text->id') }}" method="post">
        @csrf
        <div class="form-group">
        <label for="text">{{ __('Текст') }}</label>
        <input type="text" class="form-control mb-3" id="text" name="text" placeholder="{{ __('Введите текст') }}" required>
        </div>
        <button type="submit" class="btn btn-primary mb-5">
            {{ __('Сохранить') }}</button>
    </form>

    <div class="list ">
        @foreach ($all_text as $text )
        <ul class="list-group  ">
            <li class="list-group-item d-flex justify-content-sm-between  mb-3 ">
                <a href="{{ route('Text.show',$text->id) }}">

                {{ $text->id }}. {{ $text->text }}
                </a>

                <div class="button__delete mt-2 d-flex">
                    <form action="{{ route('Text.delete',$text->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-primary"
                    type="submit">{{ __('Удалить') }}</button>
                    </form>
                </div>
            </li>
            </ul>
        @endforeach
    </div>
</div>

@endsection
