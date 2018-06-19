@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
@endpush

@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                        	

                       <a href="{{route('employee.create')}}" class="btn btn-primary">Add New</a> 

                       @include('layouts.partial.message')

                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">All employees Information</h4>
                                    <p class="category">Employee Information Form</p>
                                </div>

                                

                                <div class="card-content table-responsive">
                                    <table class="table table-striped table-bordered" id="table" width="100%" style="text-align: center; overflow: scroll !important; ">
                                        <thead class="text-primary">
                                        	<th>Sl</th>
                                            <th>Employee Id</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Image</th>
                                            <th>Designation</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Gender</th>
                                            
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                        	@foreach($employees as $key=>$employee)
                                            <tr>
                                                <td>{{$key +1}}</td>
                                                <td>{{$employee->employee_id}}</td>
                                                <td>{{$employee->first_name}}</td>
                                                <td>{{$employee->last_name}}</td>
                                                <td><img class="img-responsive img-thumbnail" src="{{asset('uploads/employee/'.$employee->image)}}" style="width: 100px; height: 100px;"></td>
                                                <td>{{$employee->designation}}</td>
                                                <td>{{$employee->email}}</td>
                                                <td>{{$employee->phone}}</td>
                                                <td>{{$employee->gender}}</td>
                                                
                                                <td>
                                                    <a href="{{route('employee.show',$employee->id)}}" class="btn btn-info btn-sm"><i class="material-icons">details</i></a>

                                                        <a href="{{route('employee.edit',$employee->id)}}" class="btn btn-primary btn-sm"><i class="material-icons">border_color</i></a>

                                                	<form id="delete-form-{{$employee->id}}" action="{{route('employee.destroy',$employee->id)}}" method="POST" style="display: none;">
                                                		
                                                		@csrf
                                                		@method('DELETE')
                                                	</form>

                                                <button class="btn btn-danger btn-sm" onClick="if(confirm('Do you want to delete this employee information?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$employee->id}}').submit();
                                                }
                                                else{
                                                event.preventDefault();
                                            }">
                                            <i class="material-icons">delete</i></button>	
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                        
                    </div>
                </div>
             </div>
           
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#table').DataTable();
} );

</script>
@endpush