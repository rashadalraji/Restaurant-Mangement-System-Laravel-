@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{asset('frontend/css/bootstrap-datetimepicker.min.css')}}">
@endpush

@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                           @include('layouts.partial.message')

                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Reservation Create</h4>
                                    <p class="category">Reservation info create form</p>
                                </div>
                                
                                <div class="card-content">
                                    <form action="{{route('reserve.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                       
                                     <div class="row">
                                <div class="col-md-12">
                                <div class="form-group label-floating">
                                <label class="control-label">Table Num</label>
                                <select class="form-control" name="table_num">
                                @foreach($tables as $table)
                                <option value="{{$table->id}}">{{$table->details}}</option>
                                @endforeach
                                </select>
                            </div>
                            </div> 
                                            
                            </div>


                             <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Name</label>
                                 <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Phone</label>
                                 <input type="text" class="form-control" name="phone">
                                </div>
                            </div>
                                            
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Email</label>
                                 <input type="text" class="form-control" name="email">
                                </div>
                            </div>
                                            
                            </div>


                            <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                    <input type="text" class="form-control reserve-form empty iconified" name="date_and_time" id="datetimepicker1" required="required" placeholder="&#xf017;  Time">
                                    </div>
                            </div>
                                            
                            </div>


                             <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating">
                                 <label class="control-label">Details</label>
                                 <input type="text" class="form-control" name="message">
                                </div>
                            </div>
                                            
                            </div>


                            
                                        <br><br>
                                    <a href="{{route('reservation.index')}}" class="btn btn-danger">Back</a>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
@endsection

@push('scripts')
<script src="{{asset('frontend/js/bootstrap-datetimepicker.min.js')}}"></script>
<script>
            $(function () {
            
                $('#datetimepicker1').datetimepicker({
                format: "dd MM yyyy - HH:11 P",
                showMeridian:true,
                autoclose:true,
                todayBtn:true
            });
                });
               

        </script>

@endpush