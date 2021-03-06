@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Notícia</div>
                    <div class="card-body">
                        <a class="text-success" href="{{ route('post.index') }}"><i
                                class="fas fa-long-arrow-alt-left"></i> Voltar para a listagem</a>
                        <form action="{{ route('post.update', ['post' => $post->id]) }}" method="post" class="mt-4"
                            autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Título</label>
                                <input type="text" class="form-control" id="title" placeholder="Insira o título da notícia"
                                    name="title" value="{{ old('title') ?? $post->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Lead</label>
                                <input id="lead" placeholder="Insira a lead da notícia" type="text"
                                    class="form-control{{ $errors->has('lead') ? ' is-invalid' : '' }}" name="lead"
                                    value="{{ old('lead') ?? $post->lead }}" maxlength="190" required>
                            </div>
                            <div class="form-group">
                                <label for="content">Conteúdo</label>
                                <textarea class="form-control" id="content" rows="10" name="content"
                                    placeholder="Insira o conteúdo..." required>{{ old('content') ?? $post->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="content">Publicado</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="published" id="publishedtrue"
                                        value="1" {{ $post->published == true ? 'checked' : '' }}>
                                    <label class="form-check-label" for="publishedtrue">
                                        Sim
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="published" id="publishedfalse"
                                        value="0" {{ $post->published == false ? 'checked' : '' }}>
                                    <label class="form-check-label" for="publishedfalse">
                                        Não
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-success">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
