$(document).ready(function(){
    $(".load-content").click(function(e){
        e.preventDefault();  // Prevent default link behavior
        var page = $(this).attr("href");

        $("#main-content").html("<p class='text-center text-gray-500'>Loading...</p>"); // Loading effect
        
        $.ajax({
            url: page,
            type: "GET",
            success: function(data){
                $("#main-content").html(data);
            },
            error: function(){
                $("#main-content").html("<p class='text-center text-red-500'>Error loading content.</p>");
            }
        });
    });
});
