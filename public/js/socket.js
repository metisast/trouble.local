/* Init socket.io */
var socket = io(':6001');
var taskBlock = $('#task-block');

function renderTaskItem(title, id){

    var itemId = 'task-item-' + id;

    var col = $('<div>').addClass('col-md-3 col-xs-6 task-item-parent'); col.addClass(itemId);
    var div1 = $('<div>').addClass('col-md-6 col-xs-6');
    var div2 = $('<div>').addClass('col-md-6 col-xs-6');
    var section = $('<section>').addClass('task-item active');
    var header = $('<header>');
    var article = $('<article>');
    var a = $('<a>');
    var fa = $('<i>').addClass('fa fa-check-square-o fa-2x');

    header.text(title);
    a.attr('href', '/admin/' + id + '/success');
    a.append(fa);

    article.append(a);
    div1.append(article);
    div2.append(header);

    section.append([div2, div1]);
    col.append(section);

    return col;
}

function prependTask(data){
    var test = renderTaskItem(data.room_title, data.id);
    $('.alert-success').fadeOut('fast');
    taskBlock.prepend(test);
}

function deleteTask(id){
    var taskItemParent = $('.task-item-parent');
    console.log(taskItemParent);
}

socket.on('task:show', function(data){
    console.log(data);
    prependTask(data);
});

socket.on('task:delete', function(data){
    console.log(data);
    deleteTask(data.id);
});

/* $('form').on('submit', function(){

 var text = $('textarea').val(),
 msg = {message: text};

 socket.send(msg);
 appendMessage(msg);
 $('textarea').val('');
 return false;
 });*/
