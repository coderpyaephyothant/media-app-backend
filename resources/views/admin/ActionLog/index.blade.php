@extends('admin.layouts.app')

@section('content')
<!-- success delete -->
@if (Session::has('successListDelete'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{Session::get('successListDelete')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<!-- unsuccessfully delete -->
@if (Session::has('unsuccessListDelete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>{{Session::get('unsuccessListDelete')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Post Views</th>
      <th scope="col">Post Title</th>
      <th scope="col">User Name</th>
      <th scope="col">Detail</th>
    </tr>
  </thead>
  <tbody>
    <?php
     $i = 1;
    ?>
  @foreach ($logs as $log)
  <a href="{{ route('admin#detail', ['id' => $log->post_id]) }}">
  <tr>
      <td scope="row">{{$i}}</td>
      <td>{{$log->post_count}}</td>
      <td>{{$log->title}}</td>
      <td>{{$log->user_name}}</td>
      <td> &nbsp; &nbsp; <a href="{{ route('admin#postDetail', $log->post_id) }}"><i class="fas fa-circle-info"></i></a></td>
      
      <?php
      $i ++;
      ?>
      </a>
    </tr>
@endforeach
  </tbody>
</table>
<div class=" col-12 d-flex justify-content-center mt-3">
{{ $logs->links() }}
</div>
@endsection