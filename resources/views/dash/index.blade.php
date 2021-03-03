@extends('layouts.layout')

@section('content')
    <h1>Dashboard de vendas</h1>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Tabela de vendas
                <a href='{{ route('sales/create') }}' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>  Nova venda</a></h5>
            <form>
                <div class="form-row align-items-center">
                    <div class="col-sm-5 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Clientes</div>
                            </div>
                            <select class="form-control" id="inlineFormInputName">
                                <option selected value disabled>Escolha um cliente</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id_client }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 my-1">
                        <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Período</div>
                            </div>
                            <input type="text" class="form-control date_range" id="inlineFormInputGroupUsername" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-sm-1 my-1">
                        <button type="submit" class="btn btn-primary" style='padding: 14.5px 16px;'>
                            <i class='fa fa-search'></i></button>
                    </div>
                </div>
            </form>
            <table class='table'>
                <thead>
                    <tr>
                        <th scope="col">Produto</th>
                        <th scope="col">Data</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ \App\Traits\Utils::formata_data_hora($product->created_at) }}</td>
                                <td>{{ \App\Traits\Utils::formatar_valor($product->price) }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productshow" data-id="{{ $product->id_product }}">
                                            Detalhes
                                        </button>
                                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('products/show', $product->id_product) }}">Editar</a>
                                            <button type="button" class="dropdown-item" id="deleteButton" data-id="{{ $product->id_product }}">Excluir</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center font-weight-bold">Nenhum Produto encontrado.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Resultado de vendas</h5>
            <table class='table'>
                <thead>
                    <tr>
                        <th scope="col">Status</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor Total</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($sales) > 0)
                        @foreach($sales as $sale)
                            <tr>
                                @if ($sale->slug === 'Aprovado')
                                    <td>Vendidos</td>
                                @elseif($sale->slug === 'Cancelado')
                                    <td>Cancelados</td>
                                @elseif($sale->slug === 'Devolvido')
                                    <td>Devoluções</td>
                                @endif
                                <td>{{ $sale->quantity }}</td>
                                <td>{{ \App\Traits\Utils::formatar_valor($sale->total) }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="text-center font-weight-bold">Nenhuma venda encontrada.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Produtos
                <a href='{{ route('products/create') }}' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>  Novo produto</a></h5>
            <table class='table'>
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ \App\Traits\Utils::formatar_valor($product->price) }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productshow" data-id="{{ $product->id_product }}">
                                            Detalhes
                                        </button>
                                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('products/show', $product->id_product) }}">Editar</a>
                                            <button type="button" class="dropdown-item" id="deleteButton" data-id="{{ $product->id_product }}">Excluir</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="text-center font-weight-bold">Nenhum produto encontrado.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <x-modal idModal="productshow"></x-modal>
@endsection

@section('script')
    <script src="{{ asset('js/products/products.show.script.js') }}"></script>
@endsection
