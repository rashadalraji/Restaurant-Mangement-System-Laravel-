@extends('layouts.app')



@push('css')
<!--link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/-->
@endpush


@section('content')
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                        <a href="{{ route('slider.create')}}" class="btn btn-info">Add New</a>	
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">All Slider Table</h4>
                                    <p class="category">The data's are coming through slider table</p>
                                </div>
                                <!--div class="card-content"-->
                                <div class="container">
                                    <table class="table table-bordered table-inverse" id="table" style="width:100%">
                                        <thead class="text-primary">
                                            <th>Sl</th>
                                            <th>Title</th>
                                            <th>Sub Title</th>
                                            <th>Image</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                        </thead>
                                        <tbody>
                                        	@foreach($sliders as $key=>$slider)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{$slider->title}}</td>
                                                <td>{{$slider->sub_title}}</td>
                                                
                                                
                                                <td style="width: 100px; height: 80px;"><img width="100px" src="{{asset('uploads/slider'.'/'.$slider->image)}}"/> </td>
                                                <td>{{$slider->created_at}}</td>
                                                <td>{{$slider->updated_at}}</td>
                                                
                                             
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
<!--script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#table').DataTable();
} );

</script-->
@endpush