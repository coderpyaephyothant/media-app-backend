@extends('admin.layouts.app')
@section('content')
<div class="col-12">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close mt-n5" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

  </button>
    </div>
@endif
</div>
<div class="col-5">
    <div class="card">
    <div class="card-body">
      <h3 class="text-primary">Create Posts</h3>
      <!-- form -->
        <form action="{{route('admin#createPost')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <!-- Post Title -->
          <div class="form-group">
            <label for="cName">Post Title</label>
            <input type="text" class="form-control" placeholder="Enter Category Name" id="cName" name="cName"  autofocus="autofocus" value="{{ old('cName') }}">
          </div>

            <!-- Selector -->
          <select name="cId" class="form-control">
              <option value="">-- Select Category --</option>
              @foreach ($catDropdown as $cDropdown)
                  <option value="{{ $cDropdown->category_id }}">{{ $cDropdown->title }}</option>
              @endforeach 
          </select>

          <!-- Description -->
          <div class="form-group">
          <label for="desc">Description</label>
          <textarea class="form-control" rows="5" id="desc" name="desc">{{ old('desc') }}</textarea>
          </div>

          <!-- image Upload -->
          <div class="form-group">
            <label for="image" class=""> Image</label>
            <div>
              <input type="file" class="" placeholder="Name"  name="image"  value="{{old('image')}}">
            </div>
              <!-- @if ($errors->has('image'))
                  <p class="text-danger">{{$errors->first('image')}}</p>
              @endif -->
          </div>

          <!-- submit button -->
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
</div>
<div class="col-7">
    <div class="card">
        <div class="card-body">
        <!-- <h3 class="text-primary" onclick="window.location.href='{{ route('admin#profile')}}';">Posts</h3> -->
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Detail</th>
    </tr>
  </thead>
  <tbody>
  <?php
     $i = 1;
    ?>
  @foreach ($posts as $post)
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->description}}</td>
      <td>
    <a href="{{ route('admin#postDetail', $post->post_id) }}">
        <button type="button" class="btn btn-sm btn-primary">Detail</button>
    </a>
</td>
      </tr>
    <?php
    $i ++
    ?>
    @endforeach

  </tbody>
</table>
        </div>
    </div>
</div>

@endsection