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
        <form action="{{route('admin#listDestory',$user->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" {{ auth()->user()->id == $user->id ? 'disabled' : '' }} >Delete</button>             
        </form>
      </td>
      <?php
      $i ++;
      ?>
    </tr>
@endforeach
  </tbody>
</table>
@endsection