@extends('layouts.system')

@push('head')
@endpush

@section('content')
    <div style="margin-top: 70px" class="container">

        @if (session('status'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-{{ session('status')[0] }}">
                        {{ session('status')[1] }}
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-8">
                <h2>Lista de Tags</h2>
            </div>
            <div class="col-md-4">
                <a href="{{ url('tags/create') }}" class="btn btn-primary btn-block">Novo</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Criado em</th>
                        <th>Ações</th>
                    </thead>
                    <tbody>
                        @if ($tags->count() > 0)
                            @foreach ($tags as $tag)
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ date_format($tag->created_at, 'd/m/Y') }}</td>
                                    <td>
                                        <a href="{{ url('tags/' . $tag->id . '/edit') }}" class="btn btn-info">Editar</a>
                                        <form class="d-inline-block" action="{{ url('tags/' . $tag->id . '/delete') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Remover</button>
                                        </form>
                                    </td>
                            @endforeach
                            </tr>
                        @else
                            <tr>
                                <td class="text-center" colspan="4">Nenhum registro encontrado</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('linkscripts')
@endpush

@push('scripts')
@endpush
