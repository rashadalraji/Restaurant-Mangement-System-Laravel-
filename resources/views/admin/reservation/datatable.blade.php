@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
@endpush

@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                        	

                       <a href="{{route('reserve.create')}}" class="btn btn-primary">Add New</a> 

                       @include('layouts.partial.message')

                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Reservations</h4>
                                    <p class="category">Reservataion Informations</p>
                                </div>

                                

                                <div class="card-content table-responsive">
                                    <table class="table table-striped table-bordered" id="table" style="text-align: center; overflow: scroll !important; ">
                                        <thead class="text-primary">
                                            <th>Sl</th>
                                            <th>Table Num</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Date & Time</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th>Created at</th>
                                           
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach($reservations as $key=>$reservation)
                                            <tr>
                                                
                                                <td>{{$key +1}}</td>
                                               
                                                <td>{{$reservation->table_num}}</td>
                                                <td>{{$reservation->name}}</td>
                                                <td>{{$reservation->phone}}</td>
                                                <td>{{$reservation->email}}</td>
                                                <td>{{$reservation->date_and_time}}</td>
                                                <td>{{$reservation->message}}</td>
                                                <td>
                                    @if($reservation->status==true)
                                         <span class="label label-info">Confirmed</span>
                                    @else     
                                        <span class="label label-danger">Not confirmed yet</span>
                                    @endif        
                                                </td>
                                                <td>{{$reservation->created_at}}</td>
                                               
                                                <td>

                                <a href="{{route('reservation.edit',$reservation->id)}}" class="btn btn-primary btn-sm"><i class="material-icons">border_color</i></a>



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