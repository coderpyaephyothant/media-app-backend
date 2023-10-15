<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <title>Layout</title>
</head>
<body>
  
  <div class="container-fluid mt-5">
    <div class="row px-5 mx-5">
      <div class="col-4  text-center">
        <a href="{{route('admin#profile')}}">
          <button class="btn bg-success btn-sm text-white d-block mt-3 w-50">Profile🤩</button>
        </a>
        <a href="{{route('admin#list')}}">
          <button class="btn bg-success btn-sm text-white d-block mt-3 w-50" >List🎫</button>
        </a>
        <a href="{{route('admin#post')}}">
          <button class="btn bg-success btn-sm text-white d-block mt-3 w-50">Post 🎨</button>
        </a>
        <a href="{{route('admin#trendPost')}}">
          <button class="btn bg-success btn-sm text-white d-block mt-3 mb-3 w-50">trendPost 🍕</button>
        </a>
        <form action="{{route('logout')}}" method="POST">
          @csrf
          <button class="btn bg-danger btn-sm text-white d-block mt-3 mb-3 w-50" >logout 🔐</button>
        </form>
      </div>
      <div class="col" >@yield('content')</div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>