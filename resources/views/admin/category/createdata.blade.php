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
                                    <h4 class="title">Add Category</h4>
                                    <p class="category">Category Input Form</p>
                                </div>
                                
                                <div class="card-content">
                                    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                     <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <br><br>
                                    <a href="{{route('category.index')}}" class="btn btn-danger">Back</a>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
@endsection

@push('scripts')

@endpush