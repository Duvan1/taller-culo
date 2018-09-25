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
    @if($post->photos->count())
    <div class="col-md-12">
		<div class="box box-primary">
			<div class="box-body">
				<div class="row">
						@foreach($post->photos as $photo)
							<form method="POST" action="{{route('admin.photos.destroy', $photo)}}">
								{{method_field('DELETE')}} {{csrf_field()}}
								<div class="col-md-2">
									<button class="btn btn-danger btn-xs" style="position: absolute;">
										<i class="fa fa-remove"></i>
									</button>
									<img class="img-responsive" src="{{url($photo->url)}}">
								</div>
							</form>
						@endforeach
					</div>
			</div>
		</div> 
	</div>
		@endif
	<div class="row">	
		<form method="POST" action="{{route('admin.posts.update', $post)}}">	
		{{ csrf_field()}}	{{method_field('PUT')}}
			<div class="col-md-8">
				<div class="box box-primary">
					<div class="box-body">
						<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
							<label for="extract">titulo</label>		
							<input type="text" name="title" class="form-control" placeholder="ingrese el titulo de su blog" value="{{old('title', $post->title)}}">
							{!! $errors->first('title','<span class="help-block">:message</span>') !!}
						</div>
						<div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
							<label for="extract">texto</label>		
							<textarea name="body" id="editor" rows="10" class="form-control" placeholder="ingrese el texto de su blog">{{old('body', $post->body)}}</textarea>
							{!! $errors->first('body','<span class="help-block">:message</span>') !!}
						</div>
						<div class="form-group {{ $errors->has('iframe') ? 'has-error' : ''}}">
							<label for="extract">Contenido embebido</label>		
							<textarea name="iframe" id="editor" rows="2" class="form-control" placeholder="ingrese el contenido embebido">{{old('iframe', $post->iframe)}}</textarea>
							{!! $errors->first('iframe','<span class="help-block">:message</span>') !!}
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
                <input type="text" name="published_at" class="form-control pull-right" id="datepicker" value="{{old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null)}}">
              </div>
              <!-- /.input group -->
            </div>
            <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
            	<label>Categoria</label>
            	<select class="form-control" name="category">
            		<option value="">Seleccione una opción</option>
            		@foreach($categories as $category)
            		<option value="{{$category->id}}"
            			{{old('category', $post->category_id) == $category->id ? 'selected':''}}>{{$category->name}}</option>         		

            		@endforeach
            	</select>
            	{!! $errors->first('category','<span class="help-block">:message</span>') !!}
            </div>
				<div class="form-group {{ $errors->has('excerpt') ? 'has-error' : ''}}">
					<label for="extract">extract</label>		
					<textarea name="excerpt" id="extract" class="form-control" placeholder="ingrese el extracto de su blog">{{old('excerpt', $post->excerpt)}}</textarea>	
					{!! $errors->first('category','<span class="help-block">:message</span>') !!}
				</div>
						<div class="form-group">
              <label>Seleccione las etiquetas</label>
              <select class="form-control select2" multiple="multiple" data-placeholder="etiquetas"
                      style="width: 100%;" name="tags[]">
                @foreach($tags as $tag)
                	<option {{collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected':''}} value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
            	<div class="dropzone">
            		
            	</div>
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
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">

@endpush

@push('scripts')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
	<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
	<script src="{{asset('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
	<script src="{{asset('adminlte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
	<script>
	    $('#datepicker').datepicker({
	      autoclose: true
	    })

	    $('.select2').select2();

	    CKEDITOR.replace('editor');
	    CKEDITOR.config.height =315;
	    
	    myDropzone = new Dropzone('.dropzone',{
	    	url: '/directory/public/admin/posts/{{$post->id}}/photos',
	    	acceptedFiles: 'image/*',
	    	maxFilesize: 2,
	    	paramName: 'photo',
	    	headers: {
	    		'X-CSRF-TOKEN': '{{ csrf_token() }}'
	    	},
	    	dictDefaultMessage: 'Arrastre las fotos aquí'
	    });

	    Dropzone.autoDiscover = false;
	</script> 
 @endpush