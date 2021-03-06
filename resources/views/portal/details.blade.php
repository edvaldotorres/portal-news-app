@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-link mb-2" href="{{ route('news.index') }}"><i class="fas fa-long-arrow-alt-left"></i> Voltar para a listagem</a>
                @if ($news->image)
                    <div class="mb-3 expand rounded shadow-sm">
                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="img-fluid">
                    </div>
                @endif
                <h3 class="text-center mb-2">{{ $news->title }}</h3>
                <p class="small mb-0 text-center mb-2">Atualizado em {{ date_format($news->updated_at, 'd/m/y') }} às
                    {{ date_format($news->updated_at, 'H:i') }} - Por:
                    {{ $news->user ? $news->user->name : 'Anônimo' }}</p>
                <h5 class="my-3 text-justify">{{ $news->lead }}</h5>
                <p class="m-0 text-justify">{{ $news->content }}</p>

                <h5 class="text-center mt-5 font-weight-bold">-
                    {{-- {{ $news->comments->count() == 0 ? 'Nenhum' : $news->comments->count() }}
                    comentário{{ $news->comments->count() > 1 ? 's' : '' }} -</h5> --}}

                {{-- Comments --}}
                {{-- @foreach ($news->comments as $c)
                    <div class="mb-2">
                        <p
                            class="font-weight-bold mb-0{{ !$c->user ? ' text-danger' : ($c->user == Auth::user() ? ' text-primary' : '') }}">
                            {{ $c->user ? $c->user->name : 'Anônimo' }}:</p>
                        <p class="mb-0 font-italic">{{ $c->comment }}</p>
                        @if ($c->attachment)
                            <p class="mb-0"><span class="font-weight-bold">Anexo: </span><a
                                    href="{{ route('comments.attachments.download', $c->id) }}">Download</a></p>
                        @endif
                        <small>
                            {{ date_format($c->created_at, 'd/m/y H:i:s') }}
                            @if (Auth::check() && $c->user && $c->user == Auth::user())
                                - <a class="text-danger" href="{{ route('comments.delete', $c->id) }}">Excluir</a>
                            @endif
                        </small>
                        <hr>
                    </div>
                @endforeach --}}
{{-- 
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="my-2">Novo comentário:</h5>
                    <small>Comentando como:
                        <strong>{{ Auth::check() ? Auth::user()->name : 'Anônimo' }}</strong></small>
                </div> --}}
                {{-- <form method="POST" action="{{ route('comments.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="news_id" value="{{ $news->id }}">

                    <textarea id="comment" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}"
                        name="comment" rows="3" maxlength="1000" required>{{ old('comment') }}</textarea>
                    @if ($errors->has('comment'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('comment') }}</strong>
                        </span>
                    @endif

                    <div class="mt-2">
                        <label for="attachment">{{ __('Anexo') }}:</label>
                        <input id="attachment" type="file" class="form-control-file" name="attachment"
                            value="{{ old('attachment') }}">
                        @if ($errors->has('attachment'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('attachment') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Comentar') }}
                        </button>
                    </div>
                </form> --}}
            </div>
        </div>
    </div>
@endsection
