@extends('admin.layouts.app')
@section('content')
<div class=" col-12 d-flex justify-content-center">
 <div class="col-8">
     <div class="card">
         <div class="card-body">
             <!-- form -->
             <form action="{{route('admin#updateDetail', $postById->post_id)}}" method="POST" enctype="multipart/form-data">
                 @csrf
             <div class="d-flex">
                    <div class="col-4">

                        <div class="form-group row">
                            <div class="col-sm-10">
                            <img class="rounded hover-opacity img-fluid w-50 mb-2" src="{{ old('image',asset('/uploads/'.$postById->image))}}" alt="_post_image_">
                                <p for="image" class="text-success">you can choose new image to update...</p>
                              <input type="file" class="form-control" name="image" >
                            </div>
                          </div>

                        <div>
                            <br>
                                @if($category_name)
                            <div>
                                <div class="form-group row">
                                <div class="col-sm-10">
                                    <p class="font-weight-bold">Category : </p>
                                    <select name="cId"  class="form-control">
                                        <option value="" active>choose category</option>
                                        @foreach ($catDropdown as $item)
                                        <option value="{{$item->category_id}}" 
                                        @if ($postById->category_id == $item->category_id)
                                            selected
                                        @endif>

                                        {{$item->title}}
                                       </option>
                                        @endforeach
                                      </select>
                                      @if ($errors->has('category'))
                                  <p class="text-danger">{{$errors->first('category')}}</p>
                              @endif
                                </div>
                              </div>
                            </div>
                            @else
                                <p>Category not available</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="d-flex justify-content-between">
                        <div class="form-group">
                        <p class="font-weight-bold">Post Title : </p>
                        <input type="text" class="form-control" placeholder="Enter Category Name" id="cName" name="cName"  value="{{ old('cName',$postById->title) }}">
                        </div>

                        <div>
                        @php
                        $previousUrl = url()->previous();
                        $previousRouteName = Str::afterLast($previousUrl, '/');
                    @endphp           
                        <a href="{{ $previousRouteName === 'admin-trend-post' ? route('admin#trendPost') : route('admin#post') }}" class="btn btn-outline-info" type="button">
                            <i class="fa-solid fa-house"></i>
                            <i class="fa-solid fa-arrow-turn-up"></i>
                        </a>
                                
                        </div>
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Post Description : </p>
                        <textarea class="form-control mt-3 text-justify" rows="5" id="desc" name="desc">{{ old('desc',$postById->description) }}</textarea>
                    </div>

                    <div class="float-right rounded">
                        <button type="submit" class="btn btn-info">
                        <i class="fa-solid fa-marker"></i>    
                        Save</button>
                    </div>
                    </div>
                </div>
                </form>
         </div>
     </div>
 </div>
</div>


@endsection
<style>
    .hover-opacity {
    transition: all 0.6s ease-in-out;
}

.hover-opacity:hover {
    opacity: 0.7;
    transform: scale(1.05); 
}
</style>