<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action="{{route('admin.post.store')}}"> 
    {{ csrf_field()}} 
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
              <label for="extract">titulo</label>   
              <input type="text" name="title" required class="form-control" placeholder="ingrese el titulo de su blog" value="{{old('title')}}">
              {!! $errors->first('title','<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </form>
</div>