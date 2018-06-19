@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
@endpush

@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                        	

                       <a href="{{route('order.create')}}" class="btn btn-primary">Add New</a> 

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
                                           
                                            <th>Sale Id</th>
                                            <th>Table Num</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            
                                            <th>Created at</th>
                                            
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                        	@foreach($orders as $key=>$order)
                                            <tr>
                                                <td>{{$key +1}}</td>
                                               
                                                <td>{{$order->sale_id}}</td>
                                                <td>{{$order->table_num}}</td>
                                                <td>{{$order->item_name}}</td>
                                                <td>{{$order->oquantity}}</td>
                                                <td>{{$order->price}}</td>
                                                

                                                <td>{{$order->created_at}}</td>
                                                
                                                <td><!-- <a href="{{route('order.edit',$order->id)}}" class="btn btn-info btn-sm"><i class="material-icons">border_color</i></a> -->

                                                	<form id="delete-form-{{$order->id}}" action="{{route('order.destroy',$order->id)}}" method="POST" style="display: none;">
                                                		
                                                		@csrf
                                                		@method('DELETE')
                                                	</form>

                                                <button class="btn btn-danger btn-sm" onClick="if(confirm('Do you want to delete this item?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$order->id}}').submit();
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