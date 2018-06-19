@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
$endpush

@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                        	

                       <a href="{{route('table.create')}}" class="btn btn-primary">Add New</a> 

                       @include('layouts.partial.message')

                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Data Table for Front page Slider</h4>
                                    <p class="category">Getting data from Database Sliding Dynamically</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-striped table-bordered" id="table" width="100%" style="text-align: center;">
                                        <thead class="text-primary">
                                        	<th>Sl</th>
                                            <th>Title</th>
                                            <th>Sub Title</th>
                                            <th>Image</th>
                                            <th>Created at</th>
                                            <th>Updated at at</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                        	@foreach($tables as $key=>$table)
                                            <tr>
                                                <td>{{$key +1}}</td>
                                                <td>{{$table->title}}</td>
                                                <td>{{$table->sub_title}}</td>
                                                <td style="width: 100px; height: 80px;"><img src="{{asset('uploads/table'.'/'.$table->image)}}"/> </td>

                                                <td>{{$table->created_at}}</td>
                                                <td>{{$table->updated_at}}</td>
                                                <td><a href="{{route('table.edit',$table->id)}}" class="btn btn-info btn-sm"><i class="material-icons">border_color</i></a>

                                                	<form id="delete-form-{{$table->id}}" action="{{route('table.destroy',$table->id)}}" method="POST" style="display: none;">
                                                		
                                                		@csrf
                                                		@method('DELETE')
                                                	</form>

                                                <button class="btn btn-danger btn-sm" onClick="if(confirm('Do you want to delete this item?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$table->id}}').submit();
                                                }
                                                else{
                                                event.preventDefault();
                                            }">
                                            <i class="material-icons">delete</button>	
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