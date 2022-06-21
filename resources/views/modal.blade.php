<!-- Modal for adding List -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Add List Here</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/addList">
            @csrf
            <input name="email" type="hidden" value="{{$data->email}}">
            <div class="mb-4">
                <label for="title">Enter Title</label>
                <input class="form-control form-control-lg" name="title" type="text" placeholder="List Title" required>
                @error('title')
                    <i style="color:red">{{$message}}</i>
                @enderror
            </div>
            <div class="mb-4">
                <label for="content">Enter Content</label>
                <textarea class="form-control form-control-lg" name="content" placeholder="Content" required></textarea>
                @error('content')
                    <i style="color:red">{{$message}}</i>
                @enderror
            </div>
            <input type="hidden" name="created_at" value="{{ date('Y-m-d h:i:s') }}">
            <div class="mb-3">
                <button class="btn btn-lg btn-success"><i class="fas fa-plus"></i> Add List</button>
            </div>
            
        </form>
      </div>
    </div>
  </div>
</div>