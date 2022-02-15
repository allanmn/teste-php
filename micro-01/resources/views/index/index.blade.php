@extends('layouts.system')

@push('head')
@endpush

@section('content')
    <div class="container"  style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <!-- Jumbotron -->
                <div class="p-5 text-center bg-light">
                    <h1 class="mb-3">Projeto PHP</h1>
                    <h4 class="mb-3">Listagem e CRUD de produtos e categorias</h4>
                    <a class="btn btn-primary" href="{{ url('tags') }}" role="button">Tags</a>
                    <a class="btn btn-primary" href="{{ url('produtos') }}" role="button">Produtos</a>
                    <a class="btn btn-primary" href="{{ url('relatorio') }}" role="button">Relatório</a>
                </div>
                <!-- Jumbotron -->
            </div>
        </div>
    </div>
@endsection

@push('linkscripts')
@endpush

@push('scripts')
@endpush
