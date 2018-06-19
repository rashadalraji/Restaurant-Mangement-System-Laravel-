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
                                    <h4 class="title">Data Input Form</h4>
                                    <p class="category">Insert Data Into Database</p>
                                </div>
                                
                                <div class="card-content">
                                    <form action="{{route('table.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                     <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Title</label>
                                                    <input type="text" class="form-control" name="title">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Sub Title</label>
                                                    <input type="text" class="form-control" name="sub_title">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                
                                                     <label class="control-label">Image</label>
                                                    <input type="file" class="" name="image">
                                               
                                            </div>
                                        </div>
                                        <br><br>
                                    <a href="{{route('table.index')}}" class="btn btn-danger">Back</a>
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