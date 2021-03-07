@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-link mb-2" href="{{ route('news.index') }}"><i class="fas fa-long-arrow-alt-left"></i>
                    Voltar para a listagem</a>
                <h3 class="text-center mb-2">{{ $news->title }}</h3>
                <p class="small mb-0 text-center mb-2">Atualizado em {{ date_format($news->updated_at, 'd/m/y') }} às
                    {{ date_format($news->updated_at, 'H:i') }} - Criado por:
                    {{ $news->user ? $news->user->name : 'Anônimo' }}</p>
                <h5 class="my-3 text-justify">{{ $news->lead }}</h5>
                <p class="m-0 text-justify">{{ $news->content }}</p>
                <h5 class="text-center mt-5 font-weight-bold">-
            </div>
        </div>
    </div>
@endsection
