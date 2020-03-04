$(document).ready(function(){
    console.log("hjælp");
    $('#red').click(function(){
        $("body").css("background-color", "red")
        console.log("hjælp igen");
    })

    console.log("hjælp");
    $('#blue').click(function(){
        $("body").css("background-color", "blue")
        console.log("hjælp igen");
    })

    console.log("hjælp");
    $('#green').click(function(){
        $("body").css("background-color", "green")
        console.log("hjælp igen");
    })

    console.log("hjælp");
    $('#default').click(function(){
        $("body").css("background-color", " #ffd7e1")
        console.log("hjælp igen");
    })

});