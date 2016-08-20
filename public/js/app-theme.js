$(function () {

      
     
    //select 2 for form truck 
    $(".select").select2({
        placeholder: "Select a plate number",
        allowClear: true,
    });
    //end select 2 form truck
 //end function js   
});

(function () {
    function checkTime(i) {
        return (i < 10) ? "0" + i : i;
    }

    function startTime() {
        var today = new Date(),
            h = checkTime(today.getHours()),
            m = checkTime(today.getMinutes()),
            s = checkTime(today.getSeconds());
            ampm = checkTime() >= 12 ? 'pm' : 'am',
        document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
        t = setTimeout(function () {
            startTime()
        }, 500);
    }
    startTime();



})();



