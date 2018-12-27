$(document).ready(function() {

    var url = "http://jqueryrestfulapi.loc/api/animals/";

    $('.myClass').restful({
        onSuccess:function(data){

            if (data["REST"] == "store") {
                $('#myTable tr:last').show(600).after(
                    '<tr>'
                    + '<td>' + data['response']['id'] + '</td>'
                    + '<td>' + data['response']['name'] + '</td>'
                    + '<td>' + data['response']['parody'] + '</td>'
                    + '<td>' + data['response']['age'] + '</td>'
                    + '<td>' + data['response']['voice'] + '</td>'
                    + '<td>'
                    + '<a href="' + url + data['response']['id'] + '" class="btn btn-success fa-pull-left disabled myEdit" style="float: left;">Редакттровать</a>'
                        // + '<a  href="' + url + data['response']['id'] + '" class="btn btn-info fa-pull-right myEdit">Edit</a>'
                        + '<form method="DELETE" action="' + url + data['response']['id'] + '" style="float: right;" class="form-inline fa-pull-right myDestroy">'
                            + '<button disabled type="submit" class="btn btn-danger">Удалит</button>'
                            // + '<a class="btn btn-success fa-pull-right" href="javascript: reload()">Refresh</a>'
                        + '</form>'
                    + '</td>'
                    +'</tr>'
                );
            }

        }
    });


});
