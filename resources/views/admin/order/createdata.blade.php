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
                                    <h4 class="title">Add Orders</h4>
                                    <p class="category">Order Input Form</p>
                                </div>
                                
                                <div class="card-content">
                            
                             <input type="hidden" value="{{csrf_token()}}" name="token" value="token">     
                            
                            <div class="row">
                            <div class="col-md-6">

                                <div class="form-group label-floating">
                                <label class="control-label">Table Num</label>
                                
                                <select class="form-control" id="table_num" name="table_num">
                                    @foreach($tables as $key=>$table)
                                    <option value="{{$table->id}}">{{$table->id}}--{{$table->details}}</option>
                                    @endforeach

                                </select>
                            </div>
                            </div>
                            

                            
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
                            </div>

                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                <label class="control-label">Item</label>
                                <input class="form-control" id="order" name="orders">
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
                                        Total: <span id="itemSummary" style="margin-right: 20%;">  </span>   
                                        Offer Discount: <span style="margin-right: 20%;"><input style="height: 60%;color: black;" type="number"  id="discount" value="0"></span>
                                       GrandTotal: <span id="after_discount"></span> 
                                         </h3>  
                                             </div>
                                        </div><br>
                                        
                                    </div>              
                                </div>

                                <br><br>
                                    <a href="{{route('order.index')}}" class="btn btn-danger">Back</a>
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
    $(document).ready(function(){
      var edit=true;
        var url="{{URL::to('/')}}/";
    $.ajaxSetup({
    headers: 
    {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }

    });
//alert(url);
     var token=$('#token').val();
        $("#order").on('keyup',function(){
        $search= $(this).val();
        //alert($search);
        $.ajax({
                     method: 'get',
                     url: '{{ route("orders.itemOrder") }}',
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
           var quantity = $(this).find(".itemquantity").text();
           if(quantity<=1){
            alert('Item is Out of Stock');
            return;
           }
           
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
     

      var url="{{route('order.store')}}"; 
     // alert(url); 
      var Itemid=[]; 

      var table_num=$('#table_num').val();
      //alert(table_num);
      var name=[];
      var quan=[];
      var total=[];
      var grandtotal=$('#itemSummary').html();
      //alert(grandtotal);
      var payment_type=$('#paymenttype').val();
      var discount = $("#discount").val();
      var aftergrandTotal = $("#after_discount").html();
      //alert(payment_type);
     
      
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
            table_num:table_num,
            name:name,
            quan:quan,
            total:total,
            payment_type:payment_type,
            discount:discount,
            grandtotal:grandtotal,
            aftergrandTotal:aftergrandTotal
          
            
          },
          
          function(data){
            //console.log(data);
           alert(data);
           location.reload();
          
    

        });
      
    
    

      
  }); 
 $("#discount").on('keyup change', function() {
            var grandTotal = $("#itemSummary").html();
            //alert(grandTotal);
            var discount = $("#discount").val();
           // alert(discount);

            var after_discount = $("#after_discount").html(grandTotal - discount);

      });
       $("#discount").val('');
     

    });    


</script>
@endsection