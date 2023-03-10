@extends('layout.basicApp')

@section('title', 'Cliente')

@section('content')
   

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Clientes</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{route('cliente.create')}}">Novo</a>
                    <a href="">Consulta</a>
                </li>
            </ul>
        </div>
        
        <div class="informacao-pagina">
            
            <div style="width:95%; margin-left:auto; margin-right:auto">
                
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID do Cliente</th>
                            <th>Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->name }}</td>
                            
                            <td style="background-color: rgb(4, 135, 223); border:1px solid black; border-radius:5px">
                                <a style="text-decoration:none; color: #fff" href="{{route('cliente.show', $client->id)}}">
                                Detalhes
                                </a>
                            </td>
                            <td style="background-color: rgb(214, 3, 56); border:1px solid black; border-radius:5px">
                                <form id="form_{{$client->id}}" method="POST" action="{{route('cliente.destroy', $client->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <a style="text-decoration:none; color: #fff" href="#" 
                                    onclick="document.getElementById('form_{{$client->id}}').submit()">
                                    Excluir
                                    </a>
                                </form>
                            </td>
                            <td style="background-color: rgb(253, 145, 4); border:1px solid black; border-radius:5px">
                                <a style="text-decoration:none; color: #fff" href="{{route('cliente.edit', $client)}}">
                                    Editar
                                </a>
                            </td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
                {{-- Call provider in listProvider Methods: --}}
                <div class="pagination">
                    
                    {{$clients->appends($request)->links()}}<br>
                    
                <div>
            </div>
        </div>
    </div>
    
    

@endsection