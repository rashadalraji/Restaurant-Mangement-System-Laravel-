@extends('layouts.app')
@push('css')
@endpush

@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                           @include('layouts.partial.message')

                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Edit Category</h4>
                                    <p class="category">You Can Edit Category Here</p>
                                </div>
                                
                                <div class="card-content">
                                    <form action="{{route('item.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                     <div class="row">
                                <div class="col-md-12">
                                <div class="form-group label-floating">
                                <label class="control-label">Category</label>
                                <select class="form-control" name="category">
                                @foreach($categories as $category)
                                <option {{$category->id==$item->category->id ? 'selected' : ''}} value="{{$category->id}}">{{ $category->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            </div>
                                            
                            </div>


                             <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Name</label>
                                 <input type="text" class="form-control" value="{{$item->name}}" name="name">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Description</label>
                                 <textarea class="form-control" name="description">{{$item->description}}</textarea>
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Unit Price</label>
                                 <input type="number" class="form-control" name="unit_price" value="{{$item->unit_price}}">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Price</label>
                                 <input type="number" class="form-control" value="{{$item->price}}" name="price">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Quantity</label>
                                 <input class="form-control" name="quantity" value="{{$item->quantity}}">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                   
                                 <label class="control-label">Image</label>
                                 <input type="file" name="image">
                                
                            </div>
                                            
                            </div>
                                        <br><br>
                                    <a href="{{route('category.index')}}" class="btn btn-danger">Back</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
@endsection

@push('scripts')

@endpush