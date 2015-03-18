$(document).ready(function() {
    setInterval(slider, 4000);
});

var slider = function() {
    var currentSlide = $('.slide--active');
    var nextSlide = currentSlide.next('.slide');

    if (nextSlide.length === 0) {
        nextSlide = $('.slide').first();
    }

    currentSlide.fadeOut(600).removeClass('slide--active').css('display', 'none');
    nextSlide.fadeIn(600).addClass('slide--active');
};