@extends('admin.layouts.app')
@section('content')
<div class="col-5">
    <div class="card">
    <div class="card-body">
      <h3 class="text-Info">Create Category</h3>
      <!-- form -->
    <form action="{{route('admin#createCategory')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="cName">Category Title</label>
            <input type="text" class="form-control" placeholder="Enter Category Title" id="cName" name="cName"  autofocus="autofocus" value="{{ old('cName') }}">
        </div>
        <div class="form-group">
            <label for="desc">Description</label>
            <textarea class="form-control" rows="5" id="desc" name="desc">{{ old('desc') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </div>
</div>

<div class="col-6">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        ?>
                        @foreach ($categoryList as $category)
                    <tr>
                        <th scope="row">{{$category->category_id}}</th>
                        <td>{{$category->title}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                        <a href="{{ route('admin#categoryDetail', $category->category_id) }}">
                        <button type="button" class="btn btn-sm btn-light"><i class="fa-solid fa-circle-info"></i></button>
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