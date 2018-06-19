@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
@endpush

@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                        	

                       <a href="{{route('supplier.create')}}" class="btn btn-primary">Add New</a> 

                       @include('layouts.partial.message')

                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Suppliers</h4>
                                    <p class="category">Suppliers Information</p>
                                </div>

                                

                                <div class="card-content table-responsive">
                                    <table class="table table-striped table-bordered" id="table" style="text-align: center; overflow: scroll !important; ">
                                        <thead class="text-primary">
                                            <th>Sl</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            
                                            <th>Created at</th>
                                           
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach($suppliers as $key=>$supplier)
                                            <tr>
                                                
                                                <td>{{$key +1}}</td>
                                               
                                                <td>{{$supplier->first_name}}</td>
                                                <td>{{$supplier->last_name}}</td>
                                                <td>{{$supplier->phone_number}}</td>
                                                <td>{{$supplier->email}}</td>
                                                
                                                
                                                
                                                <td>{{$supplier->created_at}}</td>
                                               
                                                <td>

                                <a href="{{route('supplier.show',$supplier->id)}}" class="btn btn-info btn-sm"><i class="material-icons">details</i></a>

                                <a href="{{route('supplier.edit',$supplier->id)}}" class="btn btn-primary btn-sm"><i class="material-icons">border_color</i></a>

                                                    <form id="delete-form-{{$supplier->id}}" action="{{route('supplier.destroy',$supplier->id)}}" method="POST" style="display: none;">
                                                        
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                <button class="btn btn-danger btn-sm" onClick="if(confirm('Do you want to delete this item?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$supplier->id}}').submit();
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