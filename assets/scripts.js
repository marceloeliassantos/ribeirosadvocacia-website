$(document).ready(function()
{

    $(function() {
        $(".preload").fadeOut(4000, function() {
            $(".content").fadeIn(1000);        
        });
    });

    $('#slider1').click(function() {
        $('.image-slider').removeClass('in');                         
        $('#slider1-box').addClass('in');
        $('#seta').removeClass().addClass('seta-1');
    });    
    $('#slider2').click(function() {
        $('.image-slider').removeClass('in');                         
        $('#slider2-box').addClass('in');
        $('#seta').removeClass().addClass('seta-2');
    });   
    $('#slider3').click(function() {
        $('.image-slider').removeClass('in');                         
        $('#slider3-box').addClass('in');
        $('#seta').removeClass().addClass('seta-3');
    });   
    $('#slider4').click(function() {
        $('.image-slider').removeClass('in');                         
        $('#slider4-box').addClass('in');
        $('#seta').removeClass().addClass('seta-4');
    });       
});