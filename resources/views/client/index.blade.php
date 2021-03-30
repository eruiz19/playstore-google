@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de Categorías de apps</h3></div>
          <!-- <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('developer.create') }}" class="btn btn-info" >Añadir App</a>
            </div>
          </div> -->
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th width="200px">Nombre</th>
               <!-- <th width="200px">Precio</th>
               <th width="200px">Descripción</th>
               <th width="200px">Logo</th>
               <th width="200px">Categoría</th>
               <th width="100px">Editar</th>
               <th width="100px">Eliminar</th> -->
             </thead>
             <tbody>
              @if($categorias->count())  
              @foreach($categorias as $categoria)  
              <tr>
                <td>{{$categoria->name}}</td>
                <!-- <td>{{$app->price}}</td>
                <td>{{$app->description}}</td>
                <td>{{$app->picture}}</td>
                <td>{{$app->category['name']}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('DeveloperController@edit', $app->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('DeveloperController@destroy', $app->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                </td> -->
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $categorias->links() }}
    </div>
  </div>
</section>

@endsection