
function ajaxAddToCart(id){
 
    var product_id = id;
    console.log('Ajax Function JS',product_id);

    $.ajax({
           type:'POST',
           url:'/ajaxAddToCart',
           data: {"_token": $('meta[name="csrf-token"]').attr('content'), id: product_id },

           success:function(data){
              console.log(data);
              document.getElementById("header_cart_quantity").innerHTML = 
              `<button type="button" class="btn btn-success btn-rounded btn-icon">`+data['cart_qty']+`</button>`;
            
              if(document.getElementById("cart_quantity")){
                document.getElementById("cart_quantity").innerHTML = data['cart_qty'];
              }
              if(document.getElementById("quantity")){
              document.getElementById("quantity").value = data['item_qty'];  // value
              }
              if(document.getElementById("qtyminus")){
                document.getElementById("qtyminus").innerHTML = 
                `<button onClick="ajaxRemoveOneFromCart(`+product_id+`)" class="btn btn-fefault">-</button>`;
              }
              if(document.getElementById("cart_plus")){
                document.getElementById("cart_plus").innerHTML = '+';
              }
              if(document.getElementById("cart_table")){
                document.getElementById("cart_table").innerHTML = data['html'];     
              }              
                        
            }
        });
  }

function ajaxRemoveOneFromCart(id){
    var product_id = id;
    // console.log('hi',product_id);

    $.ajax({
       type:'POST',
       url:'/ajaxRemoveOneFromCart',
       data: {"_token": $('meta[name="csrf-token"]').attr('content'), id: product_id },

       success:function(data){
              console.log(data);
              document.getElementById("header_cart_quantity").innerHTML = 
              `<button type="button" class="btn btn-success btn-rounded btn-icon">`+data['cart_qty']+`</button>`;
              if(document.getElementById("cart_table")){
                document.getElementById("cart_table").innerHTML = data['html'];     
              }
              if(document.getElementById("quantity")){
                document.getElementById("quantity").value = data['item_qty'];  // value             
              }
              if(document.getElementById("qtyminus")){
                if (data['item_qty']==0)
                  document.getElementById("qtyminus").innerHTML ='';
              }
           }
    });
  }

  function ajaxDeleteFromCart(id){
    var product_id = id;
    // console.log('hi',product_id);

    $.ajax({
       type:'POST',
       url:'/ajaxDeleteFromCart',
       data: {"_token": $('meta[name="csrf-token"]').attr('content'), id: product_id },

       success:function(data){
          console.log(data['html']);
          document.getElementById("header_cart_quantity").innerHTML = 
              `<button type="button" class="btn btn-success btn-rounded btn-icon">`+data['cart_qty']+`</button>`;   
          document.getElementById("cart_table").innerHTML = data['html'];     

       }
    });
  }