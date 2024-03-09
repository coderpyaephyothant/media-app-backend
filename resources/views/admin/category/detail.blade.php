@extends('admin.layouts.app')
@section('content')

<div class="col-6">
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <div class="col-6">
                <img src="{{ asset('dist/img/user8-128x128.jpg')}}" alt=""> 
                <div>
                    <button class="btn btn-light text-decoration-none "><i class="fa fa-sm fa-list"></i> CategoryName</button>
                </div>
                </div>
                <div class="col-6">
                 <div class="d-flex justify-content-between">
                 <h3><u>This is Category Name</u></h3>
                 <div>
                 <a href="{{route('admin#category')}}" class="btn btn-success btn-sm" type="button"><i class="fa-solid fa-house"></i></a>
                 </div>
                 </div>
                <p class="card-text mt-3 text-justify">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                    Incidunt ipsa possimus sint sequi eos esse sapiente provident exercitationem a tempore, 
                    magni id ipsum consequuntur voluptates et recusandae officiis facilis neque.
                </p>
                </div>
            </div>
            
            
        </div>
    </div>
</div>


@endsection