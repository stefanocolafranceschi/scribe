     simages = new Array('histo/waveforms.gif','histo/latency.gif','histo/charge.gif'); //URLs of the Images
     
    function myscopeFunction() {
        setInterval(function(){
           atmp = new Date();
           atmp = "?"+atmp.getTime();
           for (ll=0;ll<simages.length;ll++){
              document.getElementById("amg"+ll).src = simages[ll]+atmp;
              //alert(ll+simages[ll]+atmp);

           }
           //setTimeout("myscopeFunction()",1000);
       }, 5000);
    }
    
	
    $(document).ready(function(){
	myscopeFunction();
		$('#scopecontrol').ajaxForm(function() {
		});
});
