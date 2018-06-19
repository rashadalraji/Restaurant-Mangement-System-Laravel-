@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
@endpush

@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                        	

                       <a href="{{route('purchase.create')}}" class="btn btn-primary">Add New</a> 

                       @include('layouts.partial.message')

                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">All Orders</h4>
                                    <p class="category">Orders By Customer</p>
                                </div>

                                

                                <div class="card-content table-responsive">
                                    <table class="table table-striped table-bordered" id="table" width="100%" style="text-align: center; overflow: scroll !important; ">
                                        <thead class="text-primary">
                                        	<th>Sl</th>
                                           
                                            
                                            <th>Item Name</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            
                                            <th>Created at</th>
                                            
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                        	@foreach($purchases as $key=>$purchase)
                                            <tr>
                                                <td>{{$key +1}}</td>
                                               
                                                
                                                <td>{{$purchase->item_name}}</td>
                                                <td>{{$purchase->description}}</td>
                                                <td>{{$purchase->pquantity}}</td>
                                                <td>{{$purchase->total}}</td>
                                                

                                                <td>{{$purchase->created_at}}</td>
                                                
                                                <td><!-- <a href="{{route('purchase.edit',$purchase->id)}}" class="btn btn-info btn-sm"><i class="material-icons">border_color</i></a> -->

                                                	<form id="delete-form-{{$purchase->id}}" action="{{route('purchase.destroy',$purchase->id)}}" method="POST" style="display: none;">
                                                		
                                                		@csrf
                                                		@method('DELETE')
                                                	</form>

                                                <button class="btn btn-danger btn-sm" onClick="if(confirm('Do you want to delete this item?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$purchase->id}}').submit();
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