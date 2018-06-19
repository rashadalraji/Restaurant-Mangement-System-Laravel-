@extends('layouts.app')
@push('css')
@endpush

@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-1">
                            @include('layouts.partial.message')

                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Login</h4>
                                    <p class="category">Enter Email & Password to Login</p>
                                </div>
                                
                                <div class="card-content">
                                    <form action="{{route('login')}}" method="POST">
                                        @csrf
                                     <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="email" class="form-control" name="email" value="{{old('email')}}" required>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Password</label>
                                                    <input type="password" class="form-control" name="password" required>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <br><br>
                                    
                                    <button type="submit" class="btn btn-primary">Login</button>
                                    <a href="{{route('register')}}" class="btn btn-info">Register</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
@endsection

@push('scripts')

@endpush