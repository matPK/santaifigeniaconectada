<div class="panel panel-primary">
    <div class="panel-heading">
        Opções
    </div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
            <li role="presentation" class="{{Request::is('lojista') ? "active" : ""}}">
                <a href="{{route('lojista.index')}}">Visão Geral</a>
            </li>
            <li role="presentation" class="{{Request::is('lojista/lojas*') ? "active" : ""}}">
                <a href="{{route('lojas.index')}}">Lojas</a>
            </li>
            <li role="presentation" class="{{Request::is('lojista/produtos*') ? "active" : ""}}">
                <a href="{{route('produtos.index')}}">Produtos</a>
            </li>
        </ul>                
    </div>
</div>