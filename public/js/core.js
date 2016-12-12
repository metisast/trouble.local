(function ($) {

    /* Search stat */
    var btnSearch = $('#send');
    var formStat = $('#stat');
    var formUrl = formStat.data('url');
    var panelBody = $('.panel-body');

    btnSearch.click(function () {
        var data = formStat.serialize();
        $.ajax({
            url: formUrl,
            type: 'post',
            data: data,
            success: function (data) {
                //clearError
                var clearError = formStat.find('.has-error').removeClass('has-error');
                clearError.find('.control-label').html('');
                panelBody.html('');
                for(var i = 0; i < data.rooms.length; i++){
                    panelBody.append('<p>' + data.rooms[i].room_title + ' количество вызовов - ' +
                        data.rooms[i].cnt + '</p>');
                }

                console.log(data);
            },
            error: function (err) {
                if(err.status == 422){
                    //Show errors
                    var data = JSON.parse(err.responseText);
                    var errorM = formStat.find("[name='" + Object.keys(data)[0] +  "']");
                    errorM.parent().parent().addClass('has-error');
                    errorM.parent().next().html(data.date_from[0]);
                }
            },
            complete: function () {

            }
        });

        return false;
    });


})(jQuery);