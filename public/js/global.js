
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
        if (this.cart[i].name === name) {
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
    }
});

$(".atc").click(function(){
    id = $(this).val();
    var item = getItem(id);
    url = url.replace(':id', item.image);
    $("#invImg").attr("src", url )
    $('#invTitleModel').text(item.name);
    $('#invPrice').text("Price: " + item.price);

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