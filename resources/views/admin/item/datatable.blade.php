@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
@endpush

@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                        	

                       <a href="{{route('item.create')}}" class="btn btn-primary">Add New</a> 

                       @include('layouts.partial.message')

                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">All Items</h4>
                                    <p class="category">Items according to category</p>
                                </div>

                                

                                <div class="card-content table-responsive">
                                    <table class="table table-striped table-bordered" id="table" width="100%" style="text-align: center; overflow: scroll !important; ">
                                        <thead class="text-primary">
                                        	<th>Sl</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Category Name</th>
                                            <th>Unit Price</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Image</th>
                                            <th>Created at</th>
                                            
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                        	@foreach($items as $key=>$item)
                                            <tr>
                                                <td>{{$key +1}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->description}}</td>
                                                <td>{{$item->category->name}}</td>
                                                <td>{{$item->unit_price}}</td>
                                                <td>{{$item->price}}</td>
                                                <td>{{$item->quantity}}</td>
                                                <td><img class="img-responsive img-thumbnail" src="{{asset('uploads/item/'.$item->image)}}" style="width: 100px; height: 100px;"></td>

                                                <td>{{$item->created_at}}</td>
                                               
                                                <td><a href="{{route('item.edit',$item->id)}}" class="btn btn-info btn-sm"><i class="material-icons">border_color</i></a>

                                                	<form id="delete-form-{{$item->id}}" action="{{route('item.destroy',$item->id)}}" method="POST" style="display: none;">
                                                		
                                                		@csrf
                                                		@method('DELETE')
                                                	</form>

                                                <button class="btn btn-danger btn-sm" onClick="if(confirm('Do you want to delete this item?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$item->id}}').submit();
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