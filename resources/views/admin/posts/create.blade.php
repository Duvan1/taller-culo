@extends('admin.layout')

@section('header')
	<h1>
        Crear posts
        <small>Tu mamá</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">crear posts</li>
      </ol>
@endsection

@section('content')
	@if(session()->has('flash'))
        <div class="alert alert-success">{{session('flash')}}</div>
    @endif
	<div class="row">	
		<form method="POST" action="{{route('admin.post.store')}}">	
		{{ csrf_field()}}	
			<div class="col-md-8">
				<div class="box box-primary">
					<div class="box-body">
						<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
							<label for="extract">titulo</label>		
							<input type="text" name="title" class="form-control" placeholder="ingrese el titulo de su blog" value="{{old('title')}}">
							{!! $errors->first('title','<span class="help-block">:message</span>') !!}
						</div>
						<div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
							<label for="extract">texto</label>		
							<textarea name="body" id="editor" rows="10" class="form-control" placeholder="ingrese el texto de su blog">{{old('body')}}</textarea>
							{!! $errors->first('body','<span class="help-block">:message</span>') !!}
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-body">
						<!-- Date -->
            <div class="form-group">
              <label>Date:</label>

              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="published_at" class="form-control pull-right" id="datepicker" value="{{old('published_at')}}">
              </div>
              <!-- /.input group -->
            </div>
            <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
            	<label>Categoria</label>
            	<select class="form-control" name="category">
            		<option value="">Seleccione una opción</option>
            		@foreach($categories as $category)
            		<option value="{{$category->id}}"
            			{{old('category') == $category->id ? 'selected':''}}>{{$category->name}}</option>         		

            		@endforeach
            	</select>
            	{!! $errors->first('category','<span class="help-block">:message</span>') !!}
            </div>
						<div class="form-group {{ $errors->has('excerpt') ? 'has-error' : ''}}">
							<label for="extract">extract</label>		
							<textarea name="excerpt" id="extract" class="form-control" placeholder="ingrese el extracto de su blog">{{old('excerpt')}}</textarea>	
							{!! $errors->first('category','<span class="help-block">:message</span>') !!}
						</div>
						<div class="form-group">
              <label>Seleccione las etiquetas</label>
              <select class="form-control select2" multiple="multiple" data-placeholder="etiquetas"
                      style="width: 100%;" name="tags[]">
                @foreach($tags as $tag)
                	<option {{collect(old('tags'))->contains($tag->id) ? 'selected':''}} value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
              </select>
            </div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Guardar Publicación</button>
						</div>
									
					</div>
				</div>
			</div>	
		</form>
	</div>

	
@endsection

@push('styles')
	<link rel="stylesheet" href="{{asset('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
	<link rel="stylesheet" href="{{asset('adminlte/bower_components/select2/dist/css/select2.min.css')}}">

@endpush

@push('scripts')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
	<script src="{{asset('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
	<script src="{{asset('adminlte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
	<script>
	    $('#datepicker').datepicker({
	      autoclose: true
	    })
	    CKEDITOR.replace('editor')
	    $('.select2').select2()
	</script> 
 @endpush