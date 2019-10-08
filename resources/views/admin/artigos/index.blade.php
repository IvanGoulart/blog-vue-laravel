@extends('layouts.app')

@section('content')
  <pagina tamanho="12">
    <painel titulo="Lista de Artigos">
      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>



      <tabela-lista
      v-bind:titulos="['#','Título','Descrição']"
      v-bind:itens="{{$listaArtigos}}"
      ordem="desc" ordemcol="1"
      criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="7887522323"
      modal="sim"

      ></tabela-lista>

    </painel>

  </pagina>

  <modal nome="adicionar" titulo="Adicionar">
    
  <formulario id="formAdicionar" css="" action="#" method="put" enctype="multipart/form-data" token="12345">

      <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
      </div>
     
  </formulario>
  <span slot="botoes">
      <button form="formAdicionar" class="btn btn-info">Adicionar</button>
  
  
  </span>
  </modal>
  <modal nome="editar" titulo="Editar">
  <formulario id="formEditar" css="" action="#" method="put" enctype="multipart/form-data" token="12345">

      <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="Título">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao" placeholder="Descrição">
      </div>
      
  </formulario>

  <span slot="botoes">
      <button form="formEditar" class="btn btn-info">Atualizar</button>
  </span>
  </modal>
  <modal nome="detalhe" v-bind:titulo="$store.state.item.titulo">
      <p>@{{$store.state.item.descricao}}</p>
  </modal>
@endsection
