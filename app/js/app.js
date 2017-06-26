$('.message').hover(function() {
    $(document).bind('mousewheel DOMMouseScroll',function(){
        stopWheel();
    });
}, function() {
    $(document).unbind('mousewheel DOMMouseScroll');
});


function stopWheel(e){
    if(!e){ /* IE7, IE8, Chrome, Safari */
        e = window.event;
    }
    if(e.preventDefault) { /* Chrome, Safari, Firefox */
        e.preventDefault();
    }
    e.returnValue = false; /* IE7, IE8 */
}
