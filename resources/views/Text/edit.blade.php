@extends('layouts.base')
@section('content')
<div class="container">

    <form action="{{ route('text.update', $find_text->id) }}" method="post">

        @csrf
        @method('put')

        <div class="form-group">
            <label for="text">{{ __('Текст') }}</label>

            <input type="text" class="form-control mb-3" id="text" name="text" value="{{ $find_text->text }}" required maxlength="255">
           <!-- <textarea name="text" class="form-control mb-3" value="{{ $find_text->text }}" maxlength="254" required rows="15" cols="30"></textarea>-->
        </div>
            <button type="submit" class="btn btn-primary mb-3  btn-dark"> {{ __('Обновить') }}</button>
    </form>

    <div class="card mt-3" style="">
        <div class="card-body ">
        <div class="card-text ">
            <p class="border-bottom border-dark">{{$find_text->text}} </p>

            <P>{{ __('Запись создана: ') }}{{  $find_text->created_at}}</P>

            <P>{{ __('Запись обновлена: ') }}{{ $find_text->updated_at }}</P>
        </div>
        </div>
        <div class="button__back">
            <a  class="btn btn-primary  ms-3 mb-3  btn-dark" href="{{ route('text.index') }}">{{ __('Назад') }}</a>
        </div>
    </div>
</div>
@endsection
