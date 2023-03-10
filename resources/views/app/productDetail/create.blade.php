@extends('layout.basicApp')

@section('title', 'Detalhes do Produto')

@section('content')

    <div class="conteudo-pagina" style="color:red;">
        <div class="titulo-pagina-2">
            <p>Adicionar Detalhes do Produto</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{route('cliente.index')}}">Voltar</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            {{$msg ?? ''}}
            <div style="width:40%; margin-left:auto; margin-right:auto">

                @component('app.productDetail._components.form_create_edit', ['unities' => $unities])
                @endcomponent

            </div>
        </div>
    </div>

@endsection