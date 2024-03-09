@extends('admin.layouts.app')
@section('content')
@if (Session::has('oldMessageDoesNotMatched'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{Session::get('oldMessageDoesNotMatched')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if (Session::has('sameOldPassword'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{Session::get('sameOldPassword')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if (Session::has('differentNewAndConfirmedPassword'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{Session::get('differentNewAndConfirmedPassword')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if (Session::has('successPasswordUpdate'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{Session::get('successPasswordUpdate')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="Post" action="{{route('admin#updatedPasswrod')}}">
  @csrf
  <!-- Old Password -->
  <div class="form-group">
    <div class="d-flex">
      <spam for="oldPassword" class="col-2">Old Password</spam>
      <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Old Password">
    </div>
  </div>
  <!-- New Password -->
  <div class="form-group">
    <div class="d-flex">
      <spam for="newPassword" class="col-2">New Password</spam>
      <input type="password" class="form-control" name="newPassword" id="newPassword"  placeholder="New Password">
    </div>
  </div>
  <!-- Confirm Password -->
  <div class="form-group">
    <div class="d-flex">
    <spam for="confirmPassword" class="col-2">Confirm Password</spam>
    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"  placeholder="confirm Password">
    </div>
  </div>
  <button type="submit" class="btn btn-sm btn-primary">Submit</button>
</form>
<div class="mt-3">
  <!-- <a href="{{route('admin#profile')}}"> -->
    <button onclick="window.location.href='{{ route('admin#profile')}}';" style="cursor: pointer;" class="btn btn-sm btn-danger">Home</button>
  <!-- </a> -->
</div>

@endsection