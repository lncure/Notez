$.ajax({
    type: "GET",
    url: "https://api.nasa.gov/planetary/apod?api_key=AA90SMkiFJJXeAe0eGJpfteaRfPznde0aOFBAKmn",
    success: function(myData) {

        $("#explanation").html(myData.explanation);
        $("#fuckyou").html(myData.title);
        $("#spaceImage").attr("src", myData.url)                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
    },
});
