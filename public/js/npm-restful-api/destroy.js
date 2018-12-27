$(document).ready(function() {

    $('.myDestroy').restful({

        onSuccess:function(data){
            console.log("Ответ от сервера!");
            console.log(data);
        },

    });

    $(".myDestroy").click(function(){
        $(this).parent("td").parent("tr:first").hide(600);
        console.log("Deleted");
    });


});
