
$("#sale").click(function(){
    $("#tranasactions_type_btn").hide();
    $("#invH3").show();
    $("#grid").show();
});
$("#receive").click(function(){
    $("#tranasactions_type_btn").hide();
    $("#invH3").show();
    $("#grid").show();
});
var shopingCart = {};
shopingCart.cart = [];
var id;
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
    for (var i in cartArray){
        x++;
        var item = getItem(cartArray[i].id);
        let total = parseInt(item.price) * parseInt(cartArray[i].count );
        if (($('#count'+item.id).length > 0)) {
            $( '#count'+item.id).replaceWith( "<div id='count"+item.id+"' class='col-sm'>"+ cartArray[i].count +"</div>");
            $( '#total'+item.id).replaceWith( "<div id='total"+item.id+"'class='col-sm'>"+ total +"</div>" );
        }else {
            output += '<div class="row mb-2">';
            output += "<div class='col-sm-2 '>"+ item.name +"</div>";
            output += "<div id='count"+item.id+"' class='col-sm-2'>"+ cartArray[i].count +"</div>";
            output += "<div class='col-sm-3'>"+ item.price +"</div>";
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
    var item = getItem(id);
    if (confirm(item.name + " is being added to cart")) {
        quantity = parseInt($('#quantity').val());
        shopingCart.addItemToCart(id,quantity);
        $('#quantity').val(1);
        quantity=1;
        shopingCart.displayPaymentCart();
    }
});

$(".atc").click(function(){
    id = $(this).val();
    var item = getItem(id);
    $("#invImg").attr("src", url+item.image);
    $('#invTitleModel').text(item.name);
    $('#invPrice').text("Price: " + item.price);

});

$("#checkOutCart").submit(function(e){
    e.preventDefault();
    alert('clicked');
    let data = "this.cart";
    console.log(data);
    $.ajax({
        url: "{{route('checkout')}}",
        type: "POST",
        data: {data,
        },
        success:function() {
            $('#cartModal').model('hide');
            shopingCart.clearCart();
        }
    });
});

$(".check-out").click(function(){
    alert();
    shopingCart.checkout();
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
