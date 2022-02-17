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
                <h2>Novo Produto</h2>
            </div>
            <div class="col-md-4">
                <a href="{{ url('produtos') }}" class="btn btn-secondary btn-block">Voltar</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('produtos/store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <label>Nome*</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6" style="margin-top: 5px">
                            <label>Tags*</label>
                            @if ($tags->count() > 0)
                                <select name="id_tags[]" class="form-select selectpicker"
                                    title="Nada selecionado" multiple data-live-search="true" required>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="text" class="form-control" placeholder="Sem tags cadastradas" disabled>
                            @endif
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
    <script>
        $('select').selectpicker();
    </script>
@endpush
