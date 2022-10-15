$(document).ready(function(){

    // Slider Nav menu button click event
    $('a[name=sliderMenu]').each(function(){
        $(this).click((e)=>{
            // Prevent Site reload for anchor tags
            e.preventDefault();

            // Remove active class from all button
            $('a[name=sliderMenu]').removeClass('active');

            // Add active class to clicked button
            $(this).addClass('active');

            // Get the card slide number
            var slide_number = $(this).data('card');

            $('div.custom-card').removeClass('active');
            // Detect whic card needs to be active
            switch(slide_number)
            {
                case 1:
                    $('div[data-card=1]').addClass('active');
                    $('div.custom-card').addClass('ps1');
                    $('div.custom-card').removeClass('ps2');
                    $('div.custom-card').removeClass('ps3');
                break;
                case 2:
                    $('div[data-card=2]').addClass('active');
                    $('div.custom-card').addClass('ps2');
                    $('div.custom-card').removeClass('ps1');
                    $('div.custom-card').removeClass('ps3');
                break;

                case 3:
                    $('div[data-card=3]').addClass('active');
                    $('div.custom-card').addClass('ps3');
                    $('div.custom-card').removeClass('ps1');
                    $('div.custom-card').removeClass('ps2');
                break;

                default:
                break;
            }
        });
    });

});