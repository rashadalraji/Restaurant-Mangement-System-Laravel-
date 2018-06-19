@extends('layouts.app')
@push('css')
<style>
   .ordereditems{
    
    cursor: pointer;
   } 
   
   tr#ordered:hover{
   color:navy-blue;
   font-size: 20px;
   font-weight: 900;
   }
   #thead{
    background: linear-gradient(60deg, #ab47bc, #8e24aa);
    box-shadow: 0 12px 20px -10px rgba(156, 39, 176, 0.28), 0 4px 20px 0px rgba(0, 0, 0, 0.12), 0 7px 8px -5px rgba(156, 39, 176, 0.2);
    color:white;
   }
   th{
    text-align: center;
   }

  h3{
    background: linear-gradient(60deg, #ab47bc, #8e24aa);
    box-shadow: 0 12px 20px -10px rgba(156, 39, 176, 0.28), 0 4px 20px 0px rgba(0, 0, 0, 0.12), 0 7px 8px -5px rgba(156, 39, 176, 0.2);
    color:white;
   }

</style>
@endpush

@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @include('layouts.partial.message')

                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Add Purchase</h4>
                                    <p class="category">Item Purchase Form</p>
                                </div>
                                
                                <div class="card-content">
                            
                             <input type="hidden" value="{{csrf_token()}}" name="token" value="token"> 

                             <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                <label class="control-label">Payment Type</label>
                                <select class="form-control" id="paymenttype">
                                  <option value="-1">select</option>
                                  <option value="cash">cash</option>
                                  <option value="check">check</option>
                                  <option value="card">card</option>

                                </select>
                            </div>
                            </div>
                            

                           
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                <label class="control-label">Supplier Id</label>
                                <select class="form-control" name="supplier_id" id="supplier_id">
                                  @foreach($suppliers as $supplier)
                                  <option value="{{$supplier->id}}">{{$supplier->first_name}} {{$supplier->last_name}}</option>
                                  @endforeach

                                </select>
                            </div>
                            </div>
                            </div>    
                            
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                <label class="control-label">Description</label>
                                <input class="form-control" id="description" name="description">
                            </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                <label class="control-label">Item</label>
                                <input class="form-control" id="purchase" name="purchase">
                            </div>
                            </div>
                            </div>
                            
                            <div id="show"></div>

                            <br><br>
                            <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                        <thead id="thead">
                                            <tr>
                                                
                                                    <th style="font-weight: 600">Item Name</th>
                                                    
                                                    <th style="font-weight: 600">Price</th>
                                                    <th style="font-weight: 600">Quantity</th>
                                                    <th style="font-weight: 600">Total</th>
                                                    <th style="font-weight: 600">Action</th>
                                                </tr>
                                          
                                            </thead>
                                            <tbody id="itemTableItems">
                                     </tbody>  
                                            
                                        </table>
                                         <div class="card bg-info text-white">
                                             <div class="card-body" >
                                     <h3> 
                                         Grand Total: <span id="itemSummary">  </span><br></h3> 
                                       <!--  Discount<span><input type="number"  id="discount" value="0"></span><br>
                                       After GrandTotal<span id="after_discount"></span> 
                                           -->
                                             </div>
                                        </div><br>
                                        
                                    </div>              
                                </div>

                                <br><br>
                                    <a href="{{route('purchase.index')}}" class="btn btn-danger">Back</a>
                                    <input type="button" class="btn btn-primary" value="Save" id="submit">
                                
                           
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
@endsection

@section('scriptsection')
<script type="text/javascript">
  var edit=true;
    $(document).ready(function(){
        var url="{{URL::to('/')}}/";
    $.ajaxSetup({
    headers: 
    {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }

    });
//alert(url);
     var token=$('#token').val();
        $("#purchase").on('keyup',function(){
        $search= $(this).val();
        //alert($search);
        $.ajax({
                     method: 'get',
                     url: '{{ route("purchases.itemPurchase") }}',
                     data: {'search': $search},      
                     success: function(data){    
                    
                         //alert(data);
                      $('#show').fadeIn();
                      $("#show").html(data);
                         
                         } 


        });       
        });
        
    $(document).on('click','tr.ordereditems',function(){
           var id = $(this).find(".itemid").text();
           var name = $(this).find(".iname").text();
           //alert(name);
           var price=$(this).find(".price").text();
           var quantity = $(this).find(".quan").text();
           
         $('td.name').each(function (){
           // alert("hi");
         var checkName=  $.trim($(this).text()); 
            //alert(checkName);
           if (checkName==name){
            var a=confirm("This item is alredy added to the list, do you want to add more?");
            if(a){ 
             var check=$(this).next().next().find('input.quan').val();
                //console.log(check);
                check=parseInt(check)+1;
                $(this).next().next().find('input.quan').val(check);
                
               // $.each($('input.itemQuantity'),function(){
                   // var itemssquantity=$('.itemQuantity').val();
                    //$('td.total').html(check*itemprice);
                    //calc_total();
                //});
                
                //alert(check);
         //$(".itemQuantity").val( newquantity);  
              $('.quan').trigger("change"); 
                edit=false;
                return false;
            }else{edit=false;}  
        }else{edit=true;}
        });
            if(edit){
           var table="<tr><td class='hidden' id='itemid'>"+id+"</td><td class='name'>"+name+"</td><td class='price' name='price'>"+price+"</td><td class='quantity'><input type='number' class='quan' value='1'></td><td class='total'>"+price+"</td><td><button class='btn btn-danger btn-sm removeItem' type='button'>X</button></td></tr><hr>";
     //alert(table);
           $("#itemTableItems").append(table);
          calculateSum();
         $("#show").fadeOut();
         $("#order").val('');
           }
       });

    $(document).on('change','.quan',function(){
       var a=$(this).val();
       //alert(a);
       //alert('The number is: '+ a +'this');
          
         var b=$(this).parent().parent().find('td.price').html();
        //alert(b);
         
         var c=$(this).parent().parent().find('td.total').html(a * b);
         //alert(c);
          
        calculateSum();
        
     });

    $(document).on('click', '.removeItem', function () {
        $(this).parent().parent().remove();
         calculateSum();

    });
    

    function calculateSum() {
     var priceArr = $("#itemTableItems td.total");
     $totals = 0;
     $.each(priceArr,function(k,v){
       $totals += parseFloat($(this).text());  
     });
$("#itemSummary").html($totals);
     $("#after_discount").html($totals); 
}

$("#submit").click(function(){
     

      var url="{{route('purchase.store')}}"; 
     // alert(url); 
      var Itemid=[];
      var description=$('#description').val();
      var supplierid=$('#supplier_id').val();
      var payment_type=$('#paymenttype').val();
      var grandtotal=$('#itemSummary').html();
      //alert(grandtotal);
      var name=[];
      var quan=[];
      var total=[];
      
     
     
      
      $.each($('td#itemid'),function(){
          Itemid.push($(this).html());
          //alert(Itemid);
      });
       $.each($('td.name'),function(){
          name.push($(this).html());
          //alert(name);
          
      });
       $.each($('td.quantity input'),function(){
          quan.push($(this).val());
          //alert(quan);
      });
       $.each($('td.total'),function(){
          total.push($(this).html());
          //alert(total);
      });
    
      //alert(quan);
      //alert(ItemId);
      $.post(url,
          {
            itemid:Itemid,
            description:description,
            payment_type:payment_type,
            supplierid:supplierid,
            grandtotal:grandtotal,
            name:name,
            quan:quan,
            total:total
          
            
          },
          function(data){
            alert('purchase confirmed');
            location.reload();
           // console.log(data);
           //alert('data inserted');
          
     
      });

      
  }); 
     

    });    


</script>
@endsection