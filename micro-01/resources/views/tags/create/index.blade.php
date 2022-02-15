@extends('layouts.system')

@push('head')
@endpush

@section('content')
    <div style="margin-top: 70px" class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Nova Tag</h2>
            </div>
            <div class="col-md-4">
                <a href="{{ url('tags') }}" class="btn btn-secondary btn-block">Voltar</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="{{url('tags/store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <label>Nome*</label>
                            <input type="text" name="name" class="form-control" required>
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
