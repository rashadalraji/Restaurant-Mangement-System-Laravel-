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
                                    <form action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                        
                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Employee Id</label>
                                 <input type="text" class="form-control" name="employee_id">
                                </div>
                            </div>
                                            
                            </div>           
                            


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
                                   
                                 <label class="control-label">Image</label>
                                 <input type="file" name="image">
                                
                            </div>
                                            
                            </div>


                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Designation</label>
                                 <input type="text" class="form-control" name="designation">
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
                                 <label class="control-label">Phone</label>
                                 <input type="text" class="form-control" name="phone">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Gender</label>
                                 <select name="gender" class="form-control">
                                     <option value="male">Male</option>
                                     <option value="female">Female</option>
                                     <option value="others">Others</option>

                                 </select>
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                 <label class="control-label">Joining Date</label>
                                    <input type="text" class="form-control reserve-form empty iconified datetimepicker1" name="joining_date" placeholder="&#xf017;  Time">
                                    </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                    <label class="control-label">Resigning Date</label>
                                    <input type="text" class="form-control reserve-form empty iconified datetimepicker1" name="resignation_date" placeholder="&#xf017;  Time">
                                    </div>
                            </div>
                                            
                            </div>



                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Present Address</label>
                                 <textarea class="form-control" name="present_address"></textarea>
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Permanent Address</label>
                                 <textarea class="form-control" name="permanent_address"></textarea>
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