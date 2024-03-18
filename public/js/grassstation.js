window.onhelp = function() {
    return false;
};
$(window).keydown(function (e) { 
    switch (e.keyCode) {
        //ESC
        case 27:
            //this.onEsc();
            break;
        //F1
        case 112:
            //this.onF1();
            break;
        //Fallback to default browser behaviour
        default:
            return true;
    }
    //Returning false overrides default browser event
    return false;
});

function openQuickSearch(){
    
}