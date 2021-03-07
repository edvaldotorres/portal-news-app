@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4>Últimas notícias</h4>
                @forelse ($news as $new)
                    <div class="card mb-3 custom-news">
                        <div class="card-body">
                            <h5 class="d-flex justify-content-between font-weight-bold">
                                <a class="text-truncate mr-3 text-dark"
                                    href="{{ route('news.show', $new->id) }}">{{ $new->title }}</a>
                            </h5>
                            <p class="m-0">{{ $new->lead }}</p>
                            <small>Atualizado em {{ date_format($new->updated_at, 'd/m/y') }} às
                                {{ date_format($new->updated_at, 'H:i') }} - Criado por:
                                {{ $new->user ? $new->user->name : 'Anônimo' }}
                            </small>
                            <div class="col-md-5 offset-10">
                                <a href="{{ route('news.show', $new->id) }}" type="button" class="btn btn-primary">Ver mais</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Nenhuma notícia criada ainda.</p>
                @endforelse
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {!! $news->links() !!}
        </div>
    </div>
@endsection
