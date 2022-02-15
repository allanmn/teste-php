@extends('layouts.system')

@push('head')
@endpush

@section('content')
    <div style="margin-top: 70px" class="container">
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
                            <tr>
                                @foreach ($tags as $tag)
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->$created_at }}</td>
                                    <td>
                                        <a href="@" class="btn btn-info">Editar</a>
                                        <a href="@" class="btn btn-danger">Remover</a>
                                        <a href="@" class="btn btn-warning">Restaurar</a>
                                    </td>
                                @endforeach
                            @else
                                <td class="text-center" colspan="4">Nenhum registro encontrado</td>
                        @endif
                        </tr>
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
