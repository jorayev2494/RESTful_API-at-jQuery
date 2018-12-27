$(document).ready(function() {

    select = null;

    /**
     * Получение редактируемый данный из БД-х
     */
    $('.myEdit').restful({
        method:'GET',
        onSuccess:function(data)
        {
            console.log(data);
            console.log("Ответ от сервера!");
        },
    });


    $(".myEdit").click(function(){

        window.select = $(this).parent("td").parent("tr:first").children();

        var inputId = select[0].innerText;
        var inputName = $("input[name='name']").val(select[1].innerText);
        var inputParody = $("input[name='parody']").val(select[2].innerText);
        var inputAge = $("#selected").val(select[3].innerText).text(select[3].innerText).removeAttr("disabled");
        var inputVoice = $("input[name='voice']").val(select[4].innerText);

        var myForm = $("#form").removeAttr("method").removeClass("myClass");
        var myFormAction = myForm.attr("action");
        myForm.removeAttr("action");
        var myForm = $("#form").addClass("myEditForm").attr("method", "PUT").attr("id", "myEditForm").attr("action", myFormAction + "/" + inputId);
        var submit = $("#submit").text("Up-te");

    });

    /**
     * Обновление данных
     */
    $("form").click(function(){

        var hasClass = $(this).hasClass("myClass");

        if (!hasClass) {
            $('form').restful({
                onSuccess:function(data){

                    console.log(data);

                    if (data["REST"] == "update") {
                        window.select[1].innerText = data['response']['name'];
                        window.select[2].innerText = data['response']['parody'];
                        window.select[3].innerText = data['response']['selected'];
                        window.select[4].innerText = data['response']['voice'];
                    }
                }
            });
        }

    });

    // var eee = document.getElementsByClassName("myEditForm");
    // console.log(eee);

    // $('#myEditForm').restful({
    //     onSuccess:function(data){

    //         console.log(data);

    //         if (data["REST"] == "update") {
    //             window.select[1].innerText = data['response']['name'];
    //             window.select[2].innerText = data['response']['parody'];
    //             window.select[3].innerText = data['response']['selected'];
    //             window.select[4].innerText = data['response']['voice'];
    //         }
    //     }
    // });


});
