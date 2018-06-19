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
                                    <h4 class="title">Add Employee</h4>
                                    <p class="category">Employee Information Form</p>
                                </div>
                                
                                <div class="card-content">
                                    <form action="{{route('employee.update',$employee->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Employee Id</label>
                                 <input type="text" class="form-control" name="employee_id" value="{{$employee->employee_id}}">
                                </div>
                            </div>
                                            
                            </div>
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">First Name</label>
                                 <input type="text" class="form-control" name="first_name" value="{{$employee->first_name}}">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Last Name</label>
                                 <input type="text" class="form-control" name="last_name" value="{{$employee->last_name}}">
                                </div>
                            </div>
                                            
                            </div>

                             <div class="row">
                                    <div class="col-md-12">
                                   
                                 <label class="control-label">Image</label>
                                 <input type="file" name="image">
                                
                            </div>
                                            
                            </div>


                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Designation</label>
                                 <input type="text" class="form-control" name="designation" value="{{$employee->designation}}">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Email</label>
                                 <input type="email" class="form-control" name="email" value="{{$employee->email}}">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Phone</label>
                                 <input type="text" class="form-control" name="phone" value="{{$employee->phone}}">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Gender</label>
                                 <input type="text" class="form-control" name="gender" value="{{$employee->gender}}">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                 <label class="control-label">Joining Date</label>
                                    <input type="text" class="form-control reserve-form empty iconified datetimepicker1" name="joining_date" placeholder="&#xf017;  Time" value="{{$employee->joining_date}}">
                                    </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                    <label class="control-label">Resigning Date</label>
                                    <input type="text" class="form-control reserve-form empty iconified datetimepicker1" name="resignation_date" placeholder="&#xf017;  Time" value="{{$employee->resignation_date}}">
                                    </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Present Address</label>
                                 <textarea class="form-control" name="present_address">{{$employee->present_address}}</textarea>
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Permanent Address</label>
                                 <textarea class="form-control" name="permanent_address">{{$employee->permanent_address}}</textarea>
                                </div>
                            </div>
                                            
                            </div>


                           
                                        <br><br>
                                    <a href="{{route('employee.index')}}" class="btn btn-danger">Back</a>
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
            
                $('.datetimepicker1').datetimepicker({
                format: "dd MM yyyy - HH:11 P",
                showMeridian:true,
                autoclose:true,
                todayBtn:true
            });
                });
               

        </script>

@endpush