$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 

    $('#two,#three').hide();

    $('#a').click(function(){
        $('#two,#three').hide();
        $('#one').toggle();

    });

    $('#b').click(function(){
        $('#one,#three').hide();
        $('#two').toggle();
    });

    $('#c').click(function(){
        $('#two,#one').hide();
        $('#three').toggle();
    });
    
});
