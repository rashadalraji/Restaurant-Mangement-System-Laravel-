@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{asset('frontend/css/bootstrap-datetimepicker.min.css')}}">
@endpush

@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @include('layouts.partial.message')

                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Add Supplier Info</h4>
                                    <p class="category">Supplier Info Form</p>
                                </div>
                                
                                <div class="card-content">
                                    <form action="{{route('supplier.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf


                             <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">First Name</label>
                                 <input type="text" class="form-control" name="first_name">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Last Name</label>
                                 <input type="text" class="form-control" name="last_name">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Phone Number</label>
                                 <input type="text" class="form-control" name="phone_number">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Email</label>
                                 <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Present Address</label>
                                 <textarea class="form-control" name="present_addr"></textarea>
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Permanent Address</label>
                                 <textarea class="form-control" name="permanent_addr"></textarea>
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Account Number</label>
                                 <input type="number" class="form-control" name="account_number">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Account Type</label>
                                 <input type="text" class="form-control" name="account_type">
                                </div>
                            </div>
                                            
                            </div>

                             <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Company Name</label>
                                 <input type="text" class="form-control" name="company_name">
                                </div>
                            </div>
                                            
                            </div>


                            

                                        <br><br>
                                    <a href="{{route('supplier.index')}}" class="btn btn-danger">Back</a>
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
<script src="{{asset('frontend/js/bootstrap-datetimepicker.min.js')}}"></script>
<script>
            $(function () {
            
                $('#datetimepicker1').datetimepicker({
                format: "dd MM yyyy - HH:11 P",
                showMeridian:true,
                autoclose:true,
                todayBtn:true
            });
                });
               

        </script>

@endpush