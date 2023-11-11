@extends('layouts.app')

@section('title', 'Carrinho')

@section('content')
    <div class="container mt-5">
        <h2>Carrinho de Compras</h2>
        <table class="table mb-4 border border-transparent">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th></th>
                <th scope="col">Produto</th>
                <th scope="col">Preço</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Total</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <!-- Exemplo de item no carrinho -->
            <tr>
                <th scope="row">1</th>
                <td>
                    <img width="100" height="100" src="https://ae01.alicdn.com/kf/Sdc2f14ea2fd1438a8e3e112a8ab6c141m/Star-wars-R2-d2-rob-m-vel-modelo-de-brinquedo-aplicativo-controle-remoto-el-trico-rob.jpg" alt="">
                </td>
                <td class="align-middle px-4">Produto A</td>
                <td class="align-middle px-4">R$ 50.00</td>
                <td class="align-middle px-4">2</td>
                <td class="align-middle px-4">R$ 100.00</td>
                <td class="align-middle px-4"><button class="btn btn-danger">Remover</button></td>
            </tr>

            <tr>
                <th scope="row">1</th>
                <td>
                    <img width="100" height="100" src="https://ae01.alicdn.com/kf/Sdc2f14ea2fd1438a8e3e112a8ab6c141m/Star-wars-R2-d2-rob-m-vel-modelo-de-brinquedo-aplicativo-controle-remoto-el-trico-rob.jpg" alt="">
                </td>
                <td class="align-middle px-4">Produto A</td>
                <td class="align-middle px-4">R$ 50.00</td>
                <td class="align-middle px-4">2</td>
                <td class="align-middle px-4">R$ 100.00</td>
                <td class="align-middle px-4"><button class="btn btn-danger">Remover</button></td>
            </tr>
            <!-- Fim do exemplo -->
            </tbody>
        </table>
        <div class="text-end">
            <h4>Total: R$ 100.00</h4>
            <button class="btn btn-primary">Finalizar Compra</button>
        </div>
    </div>
@endsection
