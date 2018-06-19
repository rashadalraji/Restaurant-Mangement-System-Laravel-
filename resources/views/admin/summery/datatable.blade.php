@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
<style type="text/css">
#container{
    text-align: center;
}

#daywise{
    width:30%;
    height: 250px;
    font-weight: 900;
    font-size: 30px;
    text-align: center;
    line-height: 250px;
}

#monthwise{
    width:30%;
    height: 250px;
    font-weight: 900;
    font-size: 30px;
    text-align: center;
    line-height: 250px;
}

#mostsold{
    width:30%;
    height: 250px;
    font-weight: 900;
    font-size: 30px;
    text-align: center;
    line-height: 250px;
}
h1{
    background: linear-gradient(60deg, #ab47bc, #8e24aa);
    box-shadow: 0 12px 20px -10px rgba(156, 39, 176, 0.28), 0 4px 20px 0px rgba(0, 0, 0, 0.12), 0 7px 8px -5px rgba(156, 39, 176, 0.2);
    color:white;
    text-align: center;
}
</style>
@endpush

@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                        	

                       <!-- <a href="{{route('item.create')}}" class="btn btn-primary">Add New</a> --> 

                       @include('layouts.partial.message')

<div class="container" id="container">

    <h1>Summery at a glance</h1>
            <a href="{{route('daywise')}}" class="btn btn-primary btn-lg" id="daywise">Day Based Sale</a>
                     
            <a href="{{route('monthwise')}}" class="btn btn-success btn-lg" id="monthwise">Monthly Sale</a>

            <a href="{{route('mostsold')}}" class="btn btn-info btn-lg" id="mostsold">Most Sold Item</a>

        </div>
            <!-- <a href="{{url('lowStock')}}" class="btn btn-info btn-lg" id="stock">stockwise report</a>
            <a href="{{url('profit')}}" class="btn btn-success btn-lg" id="profit_day">profit per day</a>
            <a href="#" class="btn btn-success btn-lg" id="profit_month">profit per month</a>
                   
            <a href="#" class="btn btn-info btn-lg"  id="invoice">invoicewise sales per day</a> -->

                           <!--  <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">All Items</h4>
                                    <p class="category">Item Summery</p>
                                </div>

                                

                                <div class="card-content table-responsive">
                                    <table class="table table-striped table-bordered" id="table" width="100%" style="text-align: center; overflow: scroll !important; ">
                                        <thead class="text-primary">
                                        	<th>Sl</th>
                                            <th>Item Name</th>
                                            <th>Description</th>
                                            <th>Purchase Quantity</th>
                                            <th>Sold Quantity</th>
                                            <th>Total Purchase</th>
                                            <th>Total Sell</th> -->
                                            
                                            <!-- <th>Created at</th> -->
                                            
                                            <!-- <th>Action</th> -->
                                       <!--  </thead>
                                        <tbody>
                                        	@foreach($items as $key=>$item)
                                            <tr>
                                                <td>{{$key +1}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->description}}</td>
                                                <td>{{$item->pquantity}}</td>
                                                <td>{{$item->oquantity}}</td>
                                                <td>{{$item->total}}</td>
                                                <td>{{$item->price}}</td> -->
                                                <!-- <td><img class="img-responsive img-thumbnail" src="{{asset('uploads/item/'.$item->image)}}" style="width: 100px; height: 100px;"></td> -->

                                                <!-- <td>{{$item->created_at}}</td> -->
                                               
                                                <!-- <td>

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
                                                </td> -->
                                                
                                            <!-- </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div> -->
                        
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