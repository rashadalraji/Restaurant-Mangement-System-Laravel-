@extends('layouts.app')
@push('css')
@endpush

@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                           @include('layouts.partial.message')

                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Update Reservation Info</h4>
                                    <p class="category">Reservation info update form</p>
                                </div>
                                
                                <div class="card-content">
                                    <form action="{{route('reservation.update',$reservation->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                     <div class="row">
                                <div class="col-md-12">
                                <div class="form-group label-floating">
                                <label class="control-label">Table Num</label>
                                <select class="form-control" name="table_num">
                                @foreach($tables as $table)
                                <option {{ $table->id==$reservation->table_num ?'selected' : ''}} value="{{$table->id}}">{{$table->details}}</option>
                                @endforeach
                                </select>
                            </div>
                            </div> 
                                            
                            </div>


                             <div class="row" style="display: none;">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Name</label>
                                 <input type="text" class="form-control" value="{{$reservation->name}}" name="name">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row" style="display: none;">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Phone</label>
                                 <input type="text" class="form-control" value="{{$reservation->phone}}" name="phone">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row" style="display: none;">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Email</label>
                                 <input type="text" class="form-control" value="{{$reservation->email}}" name="email">
                                </div>
                            </div>
                                            
                            </div>


                             <div class="row" style="display: none;">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Date & Time</label>
                                 <input type="text" class="form-control" value="{{$reservation->date_and_time}}" name="date_and_time">
                                </div>
                            </div>
                                            
                            </div>


                             <div class="row" style="display: none;">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Message</label>
                                 <input type="text" class="form-control" value="{{$reservation->message}}" name="message">
                                </div>
                            </div>
                                            
                            </div>


                            
                                        <br><br>
                                    <a href="{{route('reservation.index')}}" class="btn btn-danger">Back</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
@endsection

@push('scripts')

@endpush