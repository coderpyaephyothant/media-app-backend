@extends('admin.layouts.app')

@section('content')
<h3>This is List Blade</h3>
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
      <th scope="row">{{$i}}</th>
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
      <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Delete
        </button>
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
      </td>
      <?php
      $i ++;
      ?>
    </tr>
@endforeach
  </tbody>
</table>
@endsection