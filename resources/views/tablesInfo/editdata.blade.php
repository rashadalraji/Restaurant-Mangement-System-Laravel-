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
                                    <h4 class="title">Edit Table</h4>
                                    <p class="category">You Edit Table Info Here</p>
                                </div>
                                
                                <div class="card-content">
                                    <form action="{{route('tinfo.update',$table->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                     <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Details</label>
                                                    <select class="form-control" name="details">
                                @foreach($tableInfo as $tables)
                                <option value="{{$tables->details}}">{{ $tables->details }}</option>
                                @endforeach
                                </select>
                                                    
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        <br><br>
                                    <a href="{{route('tinfo.index')}}" class="btn btn-danger">Back</a>
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