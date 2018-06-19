@extends('layouts.app')

@push('css')
<!--link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/-->
@endpush

@section('content')

<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                        	<!--error messages-->
                        	@if ($errors->any())
    							<div class="alert alert-danger">
       								 <ul>
           					 @foreach ($errors->all() as $error)
                					<li>{{ $error }}</li>
            					@endforeach
       								 </ul>
  							  </div>
							@endif

							<!--end error messages-->

                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Create Slider Table</h4>
                                    <p class="category">Insert data to the slider table</p>
                                </div>
                               
                            </div>
                            <div class="card-content">
                            <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                            	@csrf
                            	<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Title</label>
                                                    <input type="text" class="form-control" name="title">
                                                </div>
                                            </div>
                                 </div>

                                 <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Sub Title</label>
                                                    <input type="text" class="form-control" name="sub_title">
                                                </div>
                                            </div>
                                 </div>

                                 <div class="row">
                                            <div class="col-md-12">
                                                
                                                    <label class="control-label">Image</label>
                                                    <input type="file" class="" name="image">
                                               
                                            </div>
                                 </div>
                                 <br><br>
                                 <a href="{{route('slider.index')}}" class="btn btn-danger">Back</a>
                                 <button type="submit" class="btn btn-primary">Save</button>

                            </form>
                             </div>
                        </div>
                        
                    </div>
                </div>
            </div>

@endsection

@push('scripts')

@endpush