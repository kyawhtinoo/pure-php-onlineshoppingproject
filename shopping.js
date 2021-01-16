$(document).ready(function(){
   
     showdata();
     cartnoti();
  


     $(".addtocartBtn").on('click',function(){
     	// alert("ok");
         
         var id=$(this).data('id');
         var name=$(this).data('name');
         var price=$(this).data('price');
         var codeno=$(this).data('codeno');
         var photo=$(this).data('photo');
         var discount=$(this).data('discount');



     var item={
     	id:id,
     	name:name,
     	price:price,
     	codeno:codeno,
     	photo:photo,
     	qty:1,
     	discount:discount,
     };
   console.log(item);
     var jsondata=localStorage.getItem("itemlist");
     var jsonarray;
     if (!jsondata) {
     	jsonarray=[];
     } else{
     	jsonarray=JSON.parse(jsondata);
     }

     var condition=false;


    jsonarray.forEach(function(v,i){
    	if (id==v.id) {
    		v.qty++;
    		condition=true;
    	}



    });

        if (!condition) {
           jsonarray.push(item);
        }

         var jsonstring=JSON.stringify(jsonarray);
         localStorage.setItem("itemlist",jsonstring);
         showdata();

   

     });


     function showdata(){
     	var jsondata=localStorage.getItem("itemlist");
     
      if (jsondata) {
     		var jsonarray=JSON.parse(jsondata);
     		 var html='';
     		  var subtotal=0;

          jsonarray.forEach(function(v,i){
          var id = v.id;
          var name = v.name;
          var price = v.price;
          var codeno = v.codeno;
          var photo = v.photo;          
          var qty = v.qty;          
          var discount = v.discount;
          var total=0;
          if (discount>0) {
            total+=discount*qty;

          }else{
            total+=price*qty;
          }
          

          subtotal+=total;

              html+=`<tr>
                          
                          <td> 
                              <button class="btn btn-outline-danger remove_btn btn-sm" data-id="${i}" style="border-radius: 50%"> 
                                <i class="icofont-close-line"></i>
                              </button>
                          </td>


                         <td><img src="${photo}" width="100"  height="100"</td>
                         <td>
                             ${name}<br>
                             ${codeno}
                         </td>
                         <td>
                             <button class="btn  btn-outline-secondary btnincrease" data-id="${i}">
                                <i class="icofont-plus"></i> 
                             </button>
                         </td>
                         <td>
                            ${qty}
                         </td>
                         <td>
                               <button class="btn btn-outline-secondary btndecrease" data-id="${i}">
                                  <i class="icofont-minus"></i>
                               </button>
                         </td>
                         <td>`;if (discount>0) {
                                 
                              html+=` ${discount}<br>
                             <del>${price}</del>`;
                                  }else{
                              html+=`${price}`
                                   }
                            
                             html+=`</td>
                         <td>
                             ${total}
                         </td>
                          
                    </tr>`



     		});
        $("#shoppingcart_table").html(html);
        cartnoti();
     	  $(".Total_t").html(subtotal);
      }
     
    }


 

  $('#shoppingcart_table').on('click','.remove_btn', function()
  {
    var id = $(this).data('id');

    // console.log(id);

     var jsondata=localStorage.getItem("itemlist");
   
     var jsonarray=JSON.parse(jsondata);
    $.each(jsonarray,function (i,v) 
    {
      if (i == id) 
      {
        jsonarray.splice(id,1);
      }
    })

    var jsondata=JSON.stringify(jsonarray);

    localStorage.setItem("itemlist",jsondata);
    
    showdata();
    cartnoti();

  });

 $("#shoppingcart_table").on('click','.btnincrease',function(){

        var id=$(this).data('id');
        var jsondata=localStorage.getItem("itemlist");
        if (jsondata) {
        	var jsonArray=JSON.parse(jsondata);

        	jsonArray.forEach(function(v,i){
        		if (i==id) {
        			v.qty++;
        		}
        	});
        	var jsonstring=JSON.stringify(jsonArray);
        	localStorage.setItem("itemlist",jsonstring);
        	showdata();
        }



  });



   $("#shoppingcart_table").on('click','.btndecrease',function(){
           var id=$(this).data('id');
           var itemlist=localStorage.getItem("itemlist");
           if (itemlist) {
           	var jsonArray=JSON.parse(itemlist);

           	jsonArray.forEach(function(v,i){
           		
           		  if(i==id){
            
                   v.qty--;
                if(v.qty==0){
                   jsonArray.splice(id, 1);
                    }
                 }
           	  });

             var jsonstring=JSON.stringify(jsonArray);
             localStorage.setItem("itemlist",jsonstring);
             showdata();


           }
   });


          function cartnoti(){
          	var jsondata=localStorage.getItem("itemlist");
          	   if (jsondata) {
          	   	var jsonArray=JSON.parse(jsondata);
          	   	var total=0;
          	   	var cash=0;
          	   	jsonArray.forEach(function(v,i){
          	   		total+=v.qty;
          	   		cash+=v.price;
          	   	});
          	   }

          	   $(".cartNoti").html(total);
          	   $("#cartCash").text(cash);
          }



     $('.checkoutBtn').on('click',function(){
        var jsondata=localStorage.getItem("itemlist");
       
       var note=$('#notes').val();
       var subtotal=0;


       
                var jsonArray=JSON.parse(jsondata);
                
                
                jsonArray.forEach(function(v,i){
                  subtotal+=v.price*v.qty;
                 
                });
               

               
        
           console.log(subtotal);

           $.post('storeorder.php',{
           
                carts:jsonArray,
                note:note,
                subtotal:subtotal
           },function(response){
            localStorage.clear();
            location.href="ordersuccess.php";
           });

    });

































$('.orderDetail').click(function(){

    var id = $(this).data('id');
    var orderdate = $(this).data('orderdate');
    var voucherno = $(this).data('voucherno');
    var total = $(this).data('total');
    var status = $(this).data('status');

    console.log(id);    

    $.post('getorder_detail.php',{
      id: id,
    },function(response){
      console.log(response);

          var orderdetails = JSON.parse(response); 

      var shoppingcartData='';

      shoppingcartData +=`<div>`;

          $.each(orderdetails,function (i,v) 
      {
        var id = v.id;
        var codeno = v.codeno;
        var name = v.name;
        var unitprice = v.price;
        var discount = v.discount;
        var photo = v.photo;
        var qty = v.qty;

        if (discount) {
          var price = discount;
        }
        else{
          var price = unitprice;
        }
        var subtotal = price * qty;

        shoppingcartData += `<tr> 
                    <td> 
                      <img src="${photo}" class="cartImg">
                    </td>
                    <td>
                      <p> ${name} </p>
                      <p> ${codeno} </p>
                    </td>
                    <td>
                      <p> ${qty} </p>
                    </td>
                    <td>`; 
        if (discount > 0) {
          shoppingcartData += `<p class="text-danger"> 
                      ${discount} Ks
                    </p>
                    <p class="font-weight-lighter">
                      <del> ${unitprice} Ks </del>
                    </p>
                    `;
        }
        else{
          shoppingcartData += `<p class="text-danger"> 
                      ${unitprice} Ks
                    </p>`;
        }

        shoppingcartData+=`</td>
                  <td> 
                    <p> ${subtotal} Ks </p> 
                  </td>
                </tr>`;
        total += subtotal ++;
      });

      $('#orderDetail').html(shoppingcartData);


    });

        $('#invoiceNo').html(voucherno);
        $('#dateNo').html(orderdate);

        if (status == "Order") {
          statusBadge = '<h5> <span class="badge badge-warning">'+status+'</span> </h5>';
          $('#orderStatus').html(statusBadge);
        }
        else if (status == "Confirm") {
          statusBadge = '<h5> <span class="badge badge-success">'+status+'</span> </h5>';
          $('#orderStatus').html(statusBadge);
        }
        else if (status == "Cancel") {
          statusBadge = '<h5> <span class="badge badge-danger">'+status+'</span> </h5>';
          $('#orderStatus').html(statusBadge);
        }
        else{
          statusBadge = '<h5> <span class="badge badge-primary">'+status+'</span> </h5>';
          $('#orderStatus').html(statusBadge);
        }
        $('#invoiceTotal').html(total);
        $('#orderTotal').html(total);


        $('#detailModal').modal('show');

  });







});











// $(document).ready(function(){

//   cartNoti();
//   showTable();

//   $('.hideForm').hide();  

//   $('.addtocartBtn').on('click', function(){
//     var id = $(this).data('id');
//     var name = $(this).data('name');
//     var codeno = $(this).data('codeno');
//     var photo = $(this).data('photo');
//     var price = $(this).data('price');
//     var discount = $(this).data('discount');
//     var qty = 1;

//     var mylist = {id:id, codeno:codeno,
//           name:name, photo:photo,
//           price:price, discount:discount,
//           qty:qty};

//     var cart = localStorage.getItem('cart');
//     var cartArray;

//     if (cart==null) {
//       cartArray = Array();
//     }
//     else{
//       cartArray = JSON.parse(cart);
//     }

//     var status=false;

//     $.each(cartArray, function(i,v){
//       if (id == v.id) {
//         v.qty++;
//         status = true;
//       }
//     });

//     if (!status) {
//       cartArray.push(mylist);
//     }

//     var cartData = JSON.stringify(cartArray);
//     localStorage.setItem("cart",cartData);

//     cartNoti();
//   });

//   function cartNoti(){
//     var cart = localStorage.getItem('cart');
//     if (cart) {
//       var cartArray = JSON.parse(cart);
//       var total =0;
//       var noti = 0;
//       $.each(cartArray, function(i,v){

//         var unitprice = v.price;
//         var discount = v.discount;
//         var qty = v.qty;
//         if (discount) {
//           var price = discount;
//         }
//         else{
//           var price = unitprice;
//         }
//         var subtotal = price * qty;

//         noti += qty ++;
//         total += subtotal ++;
//       })
//       $('.cartNoti').html(noti);
//       $('.cartTotal').html(total+' Ks');
//     }
//     else{
//       $('.cartNoti').html(0);
//       $('.cartTotal').html(0+' Ks');
//     }
//   }

//   function showTable(){
//     var cart = localStorage.getItem('cart');

//     if (cart) {
//       $('.shoppingcart_div').show();
//       $('.noneshoppingcart_div').hide();

//       var cartArray = JSON.parse(cart);
//       var shoppingcartData='';


//       if (cartArray.length > 0) {
//         var total = 0;
//         $.each(cartArray, function(i,v){
//           var id = v.id;
//           var codeno = v.codeno;
//           var name = v.name;
//           var unitprice = v.price;
//           var discount = v.discount;
//           var photo = v.photo;
//           var qty = v.qty;

//           if (discount) {
//             var price = discount;
//           }
//           else{
//             var price = unitprice;
//           }
//           var subtotal = price * qty;

//           shoppingcartData += `<tr> 
//                       <td> 
//                         <button class="btn btn-outline-danger remove_btn btn-sm" data-id="${i}" style="border-radius: 50%"> 
//                           <i class="icofont-close-line"></i> 
//                         </button>
//                       </td>
//                       <td> 
//                         <img src="${photo}" class="cartImg">
//                       </td>
//                       <td>
//                         <p> ${name} </p>
//                         <p> ${codeno} </p>
//                       </td>
//                       <td>
//                         <button class="btn btn-outline-secondary plus_btn" data-id="${i}"> 
//                           <i class="icofont-plus"></i> 
//                         </button>
//                       </td>
//                       <td>
//                         <p> ${qty} </p>
//                       </td>
//                       <td>
//                         <button class="btn btn-outline-secondary minus_btn" data-id="${i}"> 
//                           <i class="icofont-minus"></i>
//                         </button>
//                       </td>
//                       <td>`; 
//           if (discount > 0) {
//             shoppingcartData += `<p class="text-danger"> 
//                         ${discount} Ks
//                       </p>
//                       <p class="font-weight-lighter">
//                         <del> ${unitprice} Ks </del>
//                       </p>
//                       `;
//           }
//           else{
//             shoppingcartData += `<p class="text-danger"> 
//                         ${unitprice} Ks
//                       </p>`;
//           }

//           shoppingcartData+=`</td>
//                     <td> 
//                       <p> ${subtotal} Ks </p> 
//                     </td>
//                   </tr>`;
//           total += subtotal ;
//         });

//         $('#shoppingcart_table').html(shoppingcartData);
        
//       }
//       else{
//         $('.shoppingcart_div').hide();
//         $('.noneshoppingcart_div').show();
//       }
//     }
//     else{
//       $('.shoppingcart_div').hide();
//       $('.noneshoppingcart_div').show();
//     } $(".Total_t").html(total);
//   }
 

//   // Remove Item
//   $('#shoppingcart_table').on('click','.remove_btn', function()
//   {
//     var id = $(this).data('id');

//     console.log(id);

//     var cart=localStorage.getItem("cart");
//     var cartArray = JSON.parse(cart);

//     $.each(cartArray,function (i,v) 
//     {
//       if (i == id) 
//       {
//         cartArray.splice(id,1);
//       }
//     })

//     var cartData=JSON.stringify(cartArray);

//     localStorage.setItem("cart",cartData);
    
//     showTable();
//     cartNoti();

//   });

//   // Add Quantity
//   $('#shoppingcart_table').on('click','.plus_btn', function()
//   {
//     var id = $(this).data('id');

//     var cart=localStorage.getItem("cart");
//     var cartArray = JSON.parse(cart);
    
//     $.each(cartArray,function (i,v) 
//     {
//       console.log(i);
//       if (i == id) 
//       {
//         v.qty++;
//       }
//     })
    
//     var cartData = JSON.stringify(cartArray);
//     localStorage.setItem('cart',cartData);
//     showTable();
//     cartNoti();

//   });

//   // Sub Quantity
//   $('#shoppingcart_table').on('click','.minus_btn', function()
//   {
//     var id = $(this).data('id');

//     var cart=localStorage.getItem("cart");
//     var cartArray = JSON.parse(cart);
    
//     $.each(cartArray,function (i,v) 
//     {
//       if (i == id) 
//       {
//         v.qty--;
//         if (v.qty == 0) 
//         {
//           cartArray.splice(id,1);
//         }
//       }
//     })
    
//     var cartData = JSON.stringify(cartArray);
//     localStorage.setItem('cart',cartData);
//     showTable();
//     cartNoti();

//   });

//   $('.checkoutBtn').on('click',function(){
//     var notes = $('#notes').val();
//     var cart = localStorage.getItem('cart');
//     var cartArray = JSON.parse(cart);

//     var total =0;
//     $.each(cartArray, function(i,v){

//       var unitprice = v.price;
//       var discount = v.discount;
//       var qty = v.qty;
//       if (discount) {
//         var price = discount;
//       }
//       else{
//         var price = unitprice;
//       }
//       var subtotal = price * qty;

//       total += subtotal ++;
//     });

//     console.log(total);

//     $.post('storeorder.php',{
//       carts: cartArray,
//       notes: notes,
//       subtotal: subtotal
//     },function(response){
//       localStorage.clear();
//       location.href="ordersuccess.php";
//     });
//   });
