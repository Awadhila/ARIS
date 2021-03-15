var shopingCart = {};
shopingCart.cart = [];
var itemId;
var quantitiy=0;


shopingCart.Item =	function(id,count){
    this.id = id
    this.count = count
}
shopingCart.addItemToCart = function (id, count){
for (var i in this.cart) {
  if (this.cart[i].id == id) {
      this.cart[i].count += count;
      this.saveCart();
      return;
  }
}

var item = new shopingCart.Item(id,count);
this.cart.push(item);
this.saveCart();
}

shopingCart.removeItemFromCart = function  (id){
    //var message = "One piece of " + name + "has been removed"
    for (var i in this.cart) {
        if (this.cart[i].id == id) {
            this.cart[i].count--;
            if (this.cart[i].count === 0) {
                this.cart.splice(i,1)
                   // message += " and no more "+ name + " are left in cart"
            }
            break;
        }
    }
    this.saveCart ()
    //return message;
}
shopingCart.removeItemFromCartAll = function  (name){
for (var i in this.cart) {
    if (this.cart[i].name === name) {
        this.cart.splice(i,1)
        break;
    }
}
this.saveCart ()
}
shopingCart.displayPaymentCart = function () {
    var cartArray = shopingCart.cart;
    var output = "";
    var x = 0;
    var price;

    for (var i in cartArray){
        x++;
        var item = getItem(cartArray[i].id);
        if(type == "Sales"){
            price = item.priceBuy;
        }else {
            price = item.priceSale;
        }
        let total = parseInt(price) * parseInt(cartArray[i].count );

        if (($('#count'+item.id).length > 0)) {
            $( '#count'+item.id).replaceWith( "<div id='count"+item.id+"' class='col-sm'>"+ cartArray[i].count +"</div>");
            $( '#total'+item.id).replaceWith( "<div id='total"+item.id+"'class='col-sm'>"+ total +"</div>" );
        }else {
            output += '<div class="row mb-2 cartItems">';
            output += "<div class='col-sm-2 '>"+ item.name +"</div>";
            output += "<div id='count"+item.id+"' class='col-sm-2'>"+ cartArray[i].count +"</div>";
            output += "<div class='col-sm-3'>"+ price +"</div>";
            output += "<div id='total"+item.id+"'class='col-sm-2'>"+ total +"</div>";
            output += "<div class='col-sm-3'><button type='button' class='btn btn-danger'>Remove</button></div>";
            output += '</div>';
            $("#cart").append(output);
        }
    }
}
shopingCart.clearCart = function clearCart (){
    this.cart = [];
    this.saveCart ()
}
shopingCart.saveCart = function  (){
    localStorage.setItem("shopingCart",JSON.stringify(this.cart))
}

shopingCart.loadCart = function  (){
    this.cart = JSON.parse(localStorage.getItem("shopingCart"))
}
shopingCart.checkout = function checkout (e){

}
function getItem(id) {
    let myitem;
    items.data.forEach(item => {
    if ( item.id == id ) {
        myitem = item;
    }});
    return myitem;
}
$("#add").click(function(){
    var item = getItem(itemId);
    if (confirm(item.name + " is being added to cart")) {
        quantity = parseInt($('#quantity').val());
        shopingCart.addItemToCart(itemId,quantity);
        $('#quantity').val(1);
        quantity=1;
        shopingCart.displayPaymentCart();
        $('#AddToCart').modal('hide');

        
    }
});

$(".atc").click(function(){
    itemId = $(this).val();
    var item = getItem(itemId);
    $("#invImg").attr("src", url+item.image);
    $('#invTitleModel').text(item.name);
    $('#invPrice').text("Price: " + item.price);

});
$("#select").click(function(){
    alert($("#type").val());
    if ($("#type").val() == 'Sales'){
        var id = prompt("Please enter supplier id", "15");
        if (id == null || id == "") {
        } else {
            window.location = "/transactions/sales/"+id
        }
    }else{
        var id = prompt("Please enter supplier id", "15");
        if (id == null || id == "") {
        } else {
            window.location = "/transactions/delivery/"+id
        }
    }
});
$("#back").click(function(){
    window.location = "/transactions"
});
$("#checkOutCart").submit(function(e){
    e.preventDefault();
    
    let cart = shopingCart.cart;
    let _token=$("input[name=_token]").val();
    console.log(cart);
    $.ajax({
        url: "/checkout",
        type: "POST",
        data: {
            Id:clientId,
            Type:type,
            cart:cart,
            _token:_token,
        },
        success:function(response) {
            $('#cartModal').modal('hide');
            $( "div" ).remove( ".cartItems" );

            if (response){
                console.log(response);
            }
        }
    });
});


$("#checkoutBtn").click(function(){   
    alert();
    shopingCart.checkout();
    //window.location = "/transactions"

});
$("#new").click(function(){
    var val = $("#new").val();
    $("#ModalLongTitle").html(val);
});
$("#edit").click(function(){
    var val = $("#edit").val();
    $("#ModaleditTitle").html(val);
});
$("#new").click(function(){
    alert();
});

$('.quantity-right-plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        quantity = parseInt($('#quantity').val());

        // If is not undefined
        $('#quantity').val(quantity + 1);

            // Increment
        
    });

    $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        quantity = parseInt($('#quantity').val());

        // If is not undefined      
            // Increment
            if(quantity>1){
            $('#quantity').val(quantity - 1);
            }
    });

    $( "#edit" ).click(function() {
        alert("cliked");
        $( "textarea,input" ).removeClass( "form-control-plaintext" ).addClass( "form-control" ).attr("readonly", false);
        $("#tabsMenu,#searchForm,#recordsContols,#staticCatagory,#staticOrigin,.non-editable,#origin,#catagory").hide();
        $("#PreviewImage,#origin_update,#supp,#catagory_update,#update").show();
    });
    $( "#update" ).click(function() {
        alert("cliked");
        $( "textarea,input" ).removeClass( "form-control" ).addClass( "form-control-plaintext" ).attr("readonly", false);
        $("#tabsMenu,#searchForm,#recordsContols,#staticCatagory,#staticOrigin,.non-editable,#origin,#catagory").show();
        $("#PreviewImage,#origin_update,#supp,#catagory_update,#update").hide();
    });
    $( "#delBtn" ).click(function (){
        url = url.replace(':id', $(this).val());
        $("#delete").attr("href", url )
    });
