@extends('admin.layouts.app')
@section('content')
@if (Session::has('successProfileUpdate'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{Session::get('successProfileUpdate')}}</strong> 
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
<div class="col-12">
  <form method="Post" action="{{route('admin#update')}}">
    @csrf
    <div class="form-group">
      <div class="d-flex">
        <spam for="name" class="col-2">Name</spam>
        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value={{$loginUserData->name}}>
      </div>
    </div>
    <!-- @if ($errors->has('name'))
    <div class="d-flex">
      <span class="col-2"></span>
      <p class="text-danger ">Admin Name is invalid!</p>
    </div>
    @endif  -->
   
    <div class="form-group">
      <div class="d-flex">
        <spam for="exampleInputEmail1" class="col-2">Email</spam>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value={{$loginUserData->email}}>
      </div>
      <!-- @if ($errors->has('email'))
    <div class="d-flex">
      <span class="col-2"></span>
      <p class="text-danger ">Admin email is invalid!</p>
    </div>
    @endif  -->
    
    </div>
    <!-- <div class="form-group">
      <div class="d-flex">
      <spam for="exampleInputEmail1" class="col-2">Password</spam>
      <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
      </div> -->
      <!-- @if ($errors->has('password'))
    <div class="d-flex">
      <span class="col-2"></span>
      <p class="text-danger ">Admin password is invalid!</p>
    </div>
    @endif  -->
    
    <!-- </div> -->
    <div class="form-group">
      <div class="d-flex">
      <spam for="number" class="col-2">Phone Number</spam>
      <input type="text" class="form-control" id="name" name="phone_number"  placeholder="Your Name" value={{$loginUserData->phone_number}}>
      </div>
      <!-- @if ($errors->has('phone_number'))
    <div class="d-flex">
      <span class="col-2"></span>
      <p class="text-danger ">Admin phone_number is invalid!</p>
    </div>
    @endif  -->
    
    </div>
    <div class="form-group">
      <div class="d-flex">
      <spam for="address" class="col-2">Address</spam>
      <textarea name="address" id="address" cols="80" rows="5" class="form-control">{{$loginUserData->address}}</textarea>
      </div>
      <!-- @if ($errors->has('address'))
    <div class="d-flex">
      <span class="col-2"></span>
      <p class="text-danger ">Admin address is invalid!</p>
    </div>
    @endif  -->
    
    </div>
    <button type="submit" class="btn btn-sm btn-success">Submit</button>
  </form>
  <div class="mt-3">
    <a href="{{route('admin#changePassword')}}">
      <button type="submit" class="btn btn-sm btn-info">ChangePassword</button>
    </a>
  </div>
</div>

@endsection