@extends('layouts.app')
@push('css')

$endpush

@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                        	

                       

                       @include('layouts.partial.message')

                            <div class="card">

                            	<div class="card-header" data-background-color="purple">
                                    <h3 class="title" style="text-align: center">Supplier Information</h3>
                                    
                                </div>

                                <div class="card-header" data-background-color="purple">
                                    <h3 class="title" style="text-align: center">{{$supplier->first_name}} {{$supplier->last_name}}</h3>
                                    
                                </div>

                               <div class="card-content"> 
                               	<div class="row">
                               		<div class="col-md-6">
                                    <strong>Phone Number: {{$supplier->phone_number}}</strong><br>
                       
                               		<b>Email: {{$supplier->email}}</b><br>
                                    
                                    <strong>Account Number: {{$supplier->account_number}}</strong><br>
                                    <strong>Account Type: {{$supplier->account_type}}</strong><br>
                                    <strong>Company Name: {{$supplier->company_name}}</strong><br>
                                    <strong>Present Address: {{$supplier->present_addr}}</strong><br>
                               			<strong>Permanent Address: {{$supplier->permanent_addr}}</strong>
                               			<hr>
                               			<b>Created at: {{$supplier->created_at}}</b>

                            </div>
                            
                        </div>
                        
                       <a href="{{route('supplier.index')}}" class="btn btn-danger">Back</a> 
                       <div class="clearfix">
                    </div>
                </div>
             </div>
           
@endsection

@push('scripts')

</script>
@endpush
