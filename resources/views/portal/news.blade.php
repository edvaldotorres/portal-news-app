@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4>Últimas notícias</h4>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @forelse ($news as $n)
                    <div class="card mb-3 custom-news"
                        style="{{ $n->image ? 'background-image: url(' . asset('storage/' . $n->image) . ');' : '' }}">
                        <div class="card-body">
                            <h5 class="d-flex justify-content-between font-weight-bold">
                                <a class="text-truncate mr-3 text-dark"
                                    href="{{ route('news.show', $n->id) }}">{{ $n->title }}</a>
                                @if (Auth::check() && $n->user && $n->user == Auth::user())
                                    <a href="{{ route('news.delete', $n->id) }}" class="badge badge-danger">Excluir</a>
                                @endif
                            </h5>
                            <p class="m-0">{{ $n->lead }}</p>
                            <small>Atualizado em {{ date_format($n->updated_at, 'd/m/y') }} às
                                {{ date_format($n->updated_at, 'H:i') }} - Por:
                                {{ $n->user ? $n->user->name : 'Anônimo' }} -
                            </small>
                        </div>
                    </div>
                @empty
                    <p>Nenhuma notícia criada ainda.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
