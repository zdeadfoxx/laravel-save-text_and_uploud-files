@extends('layouts.base')
@section('content')

<div class="container">

<main class="d-flex justify-content-center mt-3">
    <div class="card" style="width: 20rem;">
        <div class="card-body">

        <p class="card-text">
            <p class="border-bottom text-center">{{ $find_text->text }}</p>

            <P>{{ __('Запись создана: ') }}{{ $find_text->created_at }}</P>

            <P>{{ __('Запись обновлена: ') }}{{ $find_text->updated_at }}</P>
        </p>

        <div class="button__row d-flex">
            <div class="button__update me-2">

                <a class="btn btn-primary" href="{{ route('Text.edit', $find_text->id) }}">{{ __('Изменить') }}</a>

            </div>
            <div class="button__delete">

                <form action="{{ route('Text.delete',$find_text->id) }}" method="post">

                @csrf
                @method('delete')

                <button class="btn btn-primary  me-2" type="submit">{{ __('Удалить') }}</button>
                </form>

            </div>
            <div class="button__back">
                <a  class="btn btn-primary  me-2" href="{{ route('Text.index') }}">{{ __('Назад') }}</a>
            </div>
        </div>
        </div>
    </div>
</main>

</div>

@endsection
