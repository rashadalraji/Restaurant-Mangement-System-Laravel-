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
                                    <h4 class="title">Add Item</h4>
                                    <p class="category">Item Input Form</p>
                                </div>
                                
                                <div class="card-content">
                                    <form action="{{route('item.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group label-floating">
                                <label class="control-label">Category</label>
                                <select class="form-control" name="category">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{ $category->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            </div>
                                            
                            </div>


                             <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Name</label>
                                 <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Description</label>
                                 <textarea class="form-control" name="description"></textarea>
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Unit Price</label>
                                 <input type="number" class="form-control" name="unit_price">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Price</label>
                                 <input type="number" class="form-control" name="price">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Quantity</label>
                                 <textarea class="form-control" name="quantity"></textarea>
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
                                    <a href="{{route('item.index')}}" class="btn btn-danger">Back</a>
                                    <button type="submit" class="btn btn-primary">Save</button>
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