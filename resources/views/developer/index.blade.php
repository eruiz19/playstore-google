@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de Apps</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('developer.create') }}" class="btn btn-info" >Añadir App</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Precio</th>
               <th>Descripción</th>
               <th>Logo</th>
               <th>Categoría</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($apps->count())  
              @foreach($apps as $app)  
              <tr>
                <td>{{$app->name}}</td>
                <td>{{$app->price}}</td>
                <td>{{$app->description}}</td>
                <td>{{$app->picture}}</td>
                <td>{{$app->category->name}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('DeveloperController@edit', $app->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('DeveloperController@destroy', $app->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
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
      {{ $apps->links() }}
    </div>
  </div>
</section>

@endsection