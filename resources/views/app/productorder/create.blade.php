@extends('layout.basicApp')

@section('title', 'Pedido Produto')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produtos ao Pedido</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{route('pedido.index')}}">Voltar</a>
                    
                </li>
            </ul>
        </div>
        <div class="informacao-pagina" >
            
            <h4>Detalhes do Pedido</h4>
            <p>ID do Pedido: {{$order->id}}</p>
            <p>Cliente: {{$order->client_id}}</p>

            <div style="width:40%; margin-left:auto; margin-right:auto">
                <h4>Itens do Pedido</h4>
                <table border="1" width="90%" style="margin-left:auto; margin-right:auto">
                    <thead>
                        <tr>
                            <th>Quantidade</th>
                            <th>ID Produto</th>
                            <th>Nome do Produto</th>
                            <th>Última atualização:</th>
                            
                        </tr>
                    </thead>
                    <tbody >
                        @foreach($order->products as $p)
                        <tr>
                            <td>{{$p->pivot->quantity}}</td>
                            <td>{{$p->id}}</td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->pivot->updated_at->format('d/m/Y H:i:s')}}</td>
                            <form id="form_{{$p->pivot->id}}" method="POST" 
                                action="{{route('pedido-produto.destroy', [
                                    'product_order' => $p->pivot->id, 
                                    'order_id' => $order->id
                                    ])}}">
                                @csrf
                                @method('DELETE')
                            <td style="background-color: rgb(214, 3, 56); border:1px solid black; border-radius:5px">
                                <a href="#" onclick="document.getElementById('form_{{$p->pivot->id}}').submit()"
                                    style="text-decoration:none; color: #fff">
                                Excluir
                                </a>
                            </td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @component('app.productorder._components.form_create', ['order' => $order, 'products' => $products])
                @endcomponent

            </div>
        </div>
    </div>

@endsection