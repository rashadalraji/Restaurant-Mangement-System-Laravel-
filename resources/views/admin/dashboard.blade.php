@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
$endpush
 @section('content')
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">content_copy</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Category / Item</p>
                                    <h3 class="title">{{ $categoryCount}}/{{ $itemCount }}
                                        
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-danger">info</i>
                                        <a href="#pablo">Total Categories and Items</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">slideshow</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Slider Count</p>
                                    <h3 class="title">{{ $sliderCount }}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i><a href="{{route('table.index')}}">Get More Details...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="red">
                                    <i class="material-icons">info_outline</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Reservations</p>
                                    <h3 class="title">{{ $reservations->count() }}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">local_offer</i> Reservations Not Confirmed
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="fa fa-twitter"></i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Contact Messages</p>
                                    <h3 class="title">{{ $contactCount }}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">update</i> Just Updated
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                 
                    

                           <div class="row">
                        <div class="col-md-12">

                            

                       

                       @include('layouts.partial.message')

                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Reservations</h4>
                                    <p class="category">Reservataion Informations</p>
                                </div>

                                

                                <div class="card-content table-responsive">
                                    <table class="table table-striped table-bordered" id="table" width="100%" style="text-align: center; overflow: scroll !important; ">
                                        <thead class="text-primary">
                                            <th>Sl</th>
                                            <th>Table Num</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Date & Time</th>
                                            
                                            <th>Status</th>
                                            
                                           
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach($reservations as $key=>$reservation)
                                            <tr>
                                                <tr>
                                                <td>{{$key +1}}</td>
                                                <td>{{$reservation->table_num}}</td>
                                                 
                                                <td>{{$reservation->name}}</td>
                                                <td>{{$reservation->phone}}</td>
                                                <td>{{$reservation->email}}</td>
                                                <td>{{$reservation->date_and_time}}</td>
                                                
                                                <td>
                                    @if($reservation->status==true)
                                         <span class="label label-info">Confirmed</span>
                                    @else     
                                        <span class="label label-danger">Not confirmed yet</span>
                                    @endif        
                                                </td>
                                                
                                               
                                                <td>
                                    @if($reservation->status==false)

                                <form id="status-form-{{$reservation->id}}" action="{{route('reservation.status',$reservation->id)}}" method="POST" style="display: none;">
                                                        
                                    @csrf
                                    
                                    </form>

                                    <button class="btn btn-info btn-sm" onClick="if(confirm('Do you want to confirm the reservation?')){
                                    event.preventDefault();
                                    document.getElementById('status-form-{{$reservation->id}}').submit();
                                    }
                                    else{
                                    event.preventDefault();
                                    }">
                                    <i class="material-icons">done</i></button>

                                    @endif

                                                    <form id="delete-form-{{$reservation->id}}" action="{{route('reservation.destroy',$reservation->id)}}" method="POST" style="display: none;">
                                                        
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                <button class="btn btn-danger btn-sm" onClick="if(confirm('Do you want to delete this item?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$reservation->id}}').submit();
                                                }
                                                else{
                                                event.preventDefault();
                                            }">
                                            <i class="material-icons">delete</i></button>   
                                                </td>
                                                
                                            </tr>
                                                
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