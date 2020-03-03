$(document).ready(function() {
    $('#loginButton').click(function(){
        $('#login').css('display', 'block');
    });

    $('#login').find('.close').click(function(){
        $('#login').css('display', 'none');
    })

    $('#login').click(function(){
        $('.modal').css('display', 'none');
    })
}); 