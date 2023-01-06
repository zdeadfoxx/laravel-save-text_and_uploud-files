@extends('layouts.base')
@section('content')
<div class="container">

    <form action="{{ route('Text.update', $find_text->id) }}" method="post">

        @csrf
        @method('put')

        <div class="form-group">
            <label for="text">{{ __('Текст') }}</label>

            <input type="text" class="form-control mb-3" id="text" name="text" value="{{ $find_text->text }}" required>

        </div>
            <button type="submit" class="btn btn-primary mb-3"> {{ __('Обновить') }}</button>
    </form>

    <div class="card " style="width: 20rem;">
        <div class="card-body">

        <p class="card-text">

            <p>{{$find_text->text}} </p>

            <P>{{ __('Запись создана: ') }}{{  $find_text->created_at}}</P>

            <P>{{ __('Запись обновлена: ') }}{{ $find_text->updated_at }}</P>

        </p>

        </div>

        <div class="button__back">
            <a  class="btn btn-primary  ms-3 mb-3" href="{{ route('Text.index') }}">{{ __('Назад') }}</a>
        </div>

    </div>
</div>
@endsection
