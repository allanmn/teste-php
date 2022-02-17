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
                <h2>Editar Tag</h2>
            </div>
            <div class="col-md-4">
                <a href="{{ url('tags') }}" class="btn btn-secondary btn-block">Voltar</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="{{url('tags/' . $tag->id . '/update')}}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <label>Nome*</label>
                            <input type="text" name="name" value="{{ $tag->name }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <br>
                            <button class="btn btn-success btn-block" type="submit">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('linkscripts')
@endpush

@push('scripts')
@endpush
