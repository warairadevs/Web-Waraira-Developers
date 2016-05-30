$(document).ready(function(){
    $("#menuButton").click(function(){
        $("#menuButton").hide();
        $("#wrapper").toggleClass("toggled");
    });

    $("#closeMenuButton").click(function(){
        $("#menuButton").show();
        $("#wrapper").toggleClass("toggled");
    });
});
