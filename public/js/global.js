
    function displayImg(input){
        var file = $("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#invImage").attr("src",reader.result)
            }
            reader.readAsDataURL(file);
        }
    }


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

