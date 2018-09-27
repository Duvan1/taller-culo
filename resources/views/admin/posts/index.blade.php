@extends('admin.layout')
@section('header')
	<h1>
        Todos los posts
        <small>Tu hermana</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">posts</li>
      </ol>
@endsection
@section('content')
	<h1>Ver posts</h1>
	<p>Usuario autenticado: {{auth()->user()->email}}</p>


	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Launch demo modal
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="posts-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>title</th>
                  <th>acciones</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($posts as $post)
                		<tr>
	                		<td>{{$post->id}}</td>
	                		<td>{{$post->title}}</td>
	                		<td>
                        <a href="{{ route('post.show', $post) }}" class="btn btn-xs btn-info" target="_blank"><i class="fa fa-eye"></i></a>
	                			<a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                        <form action="{{route('admin.post.destroy', $post)}}" method="POST" style="display: inline;">
                            {{csrf_field()}} {{ method_field('DELETE')}}
	                			  <button class="btn btn-xs btn-danger"
                          onclick="return confirm('¿Estás seguro que desea eliminar el post?')"><i class="fa fa-times"></i></button>
                        </form>
	                		</td>
                		</tr>
                	@endforeach                
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
@endsection