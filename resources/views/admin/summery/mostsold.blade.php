@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
@endpush

@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                        	

                       <!-- <a href="{{route('item.create')}}" class="btn btn-primary">Add New</a> --> 

                       @include('layouts.partial.message')


           

           
            <!-- <a href="{{url('lowStock')}}" class="btn btn-info btn-lg" id="stock">stockwise report</a>
            <a href="{{url('profit')}}" class="btn btn-success btn-lg" id="profit_day">profit per day</a>
            <a href="#" class="btn btn-success btn-lg" id="profit_month">profit per month</a>
                   
            <a href="#" class="btn btn-info btn-lg"  id="invoice">invoicewise sales per day</a> -->

                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">All Items</h4>
                                    <p class="category">Item Summery</p>
                                </div>

                                

                                <div class="card-content table-responsive">
                                    <table class="table table-striped table-bordered" id="table" width="100%" style="text-align: center; overflow: scroll !important; ">
                                        <thead class="text-primary">
                                        	<th>Sl</th>
                                            <th>Item Id</th>
                                            <th>Item Name</th>
                                            
                                            <th>Total Sale</th>
                                           
                                            
                                            <!-- <th>Created at</th> -->
                                            
                                            <!-- <th>Action</th> -->
                                        </thead>
                                        <tbody>
                                        	@foreach($mostsolds as $key=>$mostsold)
                                            <tr>
                                                <td>{{$key +1}}</td>
                                                <td>{{$mostsold->item_id}}</td>
                                                <td>{{$mostsold->item_name}}</td>
                                          
                                                
                                                <td>{{$mostsold->total}}</td>
                                                
                                                

                                              
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
            <a href="{{route('summery.index')}}" class="btn btn-danger btn-lg" id="daywise">Back</a>

            <a href="{{route('daywise')}}" class="btn btn-primary btn-lg" id="daywise">Day Based Sale</a>
                     
            <a href="{{route('monthwise')}}" class="btn btn-success btn-lg" id="monthwise">Monthly Sale</a>
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