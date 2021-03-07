@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <a class="text-success" href="{{ route('post.create') }}"><i class="fas fa-plus"></i> Cadastrar
                            Notícia</a>
                        <table class="table table-striped mt-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Título</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->published == true ? 'Publicado' : 'Rascunho' }}</td>
                                        <td class="d-flex">
                                            <a class="mr-3 btn btn-sm btn-outline-success"
                                                href="{{ route('post.edit', ['post' => $post->id]) }}">Editar</a>
                                            <form action="{{ route('post.destroy', ['post' => $post->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <input class="btn btn-sm btn-outline-danger" type="submit" value="Remover">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $posts->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
