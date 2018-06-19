@extends('layouts.app')
@push('css')

$endpush

@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                        	

                       

                       @include('layouts.partial.message')

                            <div class="card">

                              <div class="card-header" data-background-color="purple">
                                    <h3 class="title" style="text-align: center">Employee Information</h3>
                                    
                                </div>

                                <div class="card-header" data-background-color="purple">
                                    <h3 class="title" style="text-align: center">{{$employee->first_name}} {{$employee->last_name}}</h3>
                                    
                                </div>

                               <div class="card-content"> 
                               	<div class="row">
                               		<div class="col-md-6">
                                    <strong>Employee Id: {{$employee->employee_id}}</strong><br>
                               			<strong>Designation: {{$employee->designation}}</strong><br>
                               			<b>Email: {{$employee->email}}</b><br>
                                    <strong>Phone: {{$employee->phone}}</strong><br>
                                    <strong>Gender: {{$employee->gender}}</strong><br>
                                    <strong>Joining Date: {{$employee->joining_date}}</strong><br>
                                    <strong>Resigning Date: {{$employee->resignation_date}}</strong><br>
                                    <strong>Present Address: {{$employee->present_address}}</strong><br>
                               			<strong>Permanent Address: {{$employee->permanent_address}}</strong>
                               			<hr>
                               			<b>Created at: {{$employee->created_at}}</b>

                            </div>
                            <div class="col-md-6">
                              <span style="float: right;"><img class="img-responsive img-thumbnail" src="{{asset('uploads/employee/'.$employee->image)}}" style="width: 200px; height: 200px;"></span>
                            </div>
                        </div>
                        
                       <a href="{{route('employee.index')}}" class="btn btn-danger">Back</a> 
                       <div class="clearfix">
                    </div>
                </div>
             </div>
           
@endsection

@push('scripts')

</script>
@endpush