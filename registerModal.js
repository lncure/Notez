$(document).ready(function() {
    $('#registerButton').click(function(){
        $('#register').css('display', 'block');
    });

    $('#register').find('.close').click(function(){
        $('#register').css('display', 'none');
    })

    $('#register').click(function(){
        $('.modal').css('display', 'none');
    })
});  

