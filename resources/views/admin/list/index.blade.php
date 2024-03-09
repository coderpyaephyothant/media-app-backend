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
<!-- {{$userList}} -->

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">phone_number</th>
      <th scope="col">address</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    <?php
     $i = 1;
    ?>
  @foreach ($userList as $user)
  <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      @if ($user->phone_number === null || $user->phone_number === '')
      <td>-</td>
      @else
      <td>{{$user->phone_number}}</td>
      @endif
      @if ($user->address === null || $user->address === '')
      <td>-</td>
      @else
      <td>{{$user->address}}</td>
      @endif
      <td>
        <!-- delete start -->
        <form action="{{route('admin#listDestory',$user->id)}}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
              <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>               
        </form>
        <!-- delete end -->
      <!-- <a href="{{route('admin#listDestory',$user->id)}}">
      <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Delete
        </button>
      </a> -->
  
      </td>
      <?php
      $i ++;
      ?>
    </tr>
@endforeach
  </tbody>
</table>
@endsection