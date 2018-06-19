@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
@endpush

@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">

            <form action="{{route('summery.daywisesale')}}" method="POST" enctype="multipart/form-data">
                @csrf
         <input class="form-control" type="date" name="daytime" id="date">
         <button type="submit" class="btn btn-success">submit</button> 

            </form>    	
        </div>
                       <!-- <a href="{{route('item.create')}}" class="btn btn-primary">Add New</a> --> 

                       @include('layouts.partial.message')


           <!--  <a href="{{url('daywise')}}" class="btn btn-primary btn-lg" id="daywise">Day Based Sale</a> -->

           
            <!-- <a href="{{url('lowStock')}}" class="btn btn-info btn-lg" id="stock">stockwise report</a>
            <a href="{{url('profit')}}" class="btn btn-success btn-lg" id="profit_day">profit per day</a>
            <a href="#" class="btn btn-success btn-lg" id="profit_month">profit per month</a>
                   
            <a href="#" class="btn btn-info btn-lg"  id="invoice">invoicewise sales per day</a> -->

                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Day Based Report</h4>
                                    <!-- <p class="category">Item Summery</p> -->
                                </div>

                                

                                <div class="card-content table-responsive">
                                    <table class="table table-striped table-bordered" id="table" width="100%" style="text-align: center; overflow: scroll !important; ">
                                        <thead class="text-primary">
                                    <tr>    
                                                      
                                        <th>id</th>
                                        <th>Payment Type</th>
                                        <th>Total</th>
                                        <th>Discount</th>
                                        <th>Grand Total</th>
                                        <th>Date</th>
                                        <th>Action </th>
                                    </tr>

                                     <?php
                                        $Total=0;
                                        $dis=0;
                                        $grandtotal=0;
                                     ?>
                             
                                            
                                            <!-- <th>Created at</th> -->
                                            
                                            <!-- <th>Action</th> -->
                                        </thead>
                                        <tbody>
                                            <tr>
                                        @foreach($datebase as $key=>$datee)
                                        
                                        <td>{{ $key+1 }}</td>
                                        <td>{{$datee->payment_type}}</td>
                                        <td>{{$datee->total}}</td>
                                        <td>{{$datee->discount}}</td>
                                        <td>{{$datee->grandtotal}}</td>
                                        <td>{{$datee->created_at}}</td>
                                        <?php
                                             $Total+=$datee->total;
                                             $dis+=$datee->discount;
                                             $grandtotal+=$datee->grandtotal;
                                        
                                             ?>
               <td><a href="{{route('daybase.show',$datee->id)}}" class="btn btn-info btn-sm"><i class="material-icons">details</i></a></td>
                                        </tr>
              
              
                                            @endforeach    
                                        	<tr>
                                        		<td></td>
                                        		<td></td>
                                        		<td>Total {{$Total}}</td>
                                                <td>Discount {{$dis}}</td>
                                        		<td>Grand Total {{$grandtotal}}</td>
                                                <td colspan="2"></td>

                                        	</tr>
                                        </tbody>
                                    </table>
                                </div>

                                <a href="{{route('summery.index')}}" class="btn btn-primary btn-lg" id="daywise">Back</a>
                     
            <a href="{{route('monthwise')}}" class="btn btn-success btn-lg" id="monthwise">Monthly Sale</a>

            <a href="{{route('mostsold')}}" class="btn btn-info btn-lg" id="mostsold">Most Sold Item</a>
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