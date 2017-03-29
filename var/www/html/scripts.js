    //<![CDATA[

    var tabLinks = new Array();
    var contentDivs = new Array();


     images = new Array('histo/FEC0_APZ-Sigma_APV_0.gif','histo/FEC0_APZ-Sigma_APV_1.gif', 'histo/FEC0_APZ-Sigma_APV_2.gif','histo/FEC0_APZ-Sigma_APV_3.gif','histo/FEC0_APZ-Sigma_APV_4.gif','histo/FEC0_APZ-Sigma_APV_5.gif','histo/FEC0_APZ-Sigma_APV_6.gif','histo/FEC0_APZ-Sigma_APV_7.gif','histo/FEC0_APZ-Sigma_APV_8.gif','histo/FEC0_APZ-Sigma_APV_9.gif','histo/FEC0_APZ-Sigma_APV_10.gif','histo/FEC0_APZ-Sigma_APV_11.gif','histo/FEC0_APZ-Sigma_APV_12.gif','histo/FEC0_APZ-Sigma_APV_13.gif','histo/FEC0_APZ-Sigma_APV_14.gif','histo/FEC0_APZ-Sigma_APV_15.gif','histo/FEC1_APZ-Sigma_APV_0.gif','histo/FEC1_APZ-Sigma_APV_1.gif', 'histo/FEC1_APZ-Sigma_APV_2.gif','histo/FEC1_APZ-Sigma_APV_3.gif','histo/FEC1_APZ-Sigma_APV_4.gif','histo/FEC1_APZ-Sigma_APV_5.gif','histo/FEC1_APZ-Sigma_APV_6.gif','histo/FEC1_APZ-Sigma_APV_7.gif','histo/FEC1_APZ-Sigma_APV_8.gif','histo/FEC1_APZ-Sigma_APV_9.gif','histo/FEC1_APZ-Sigma_APV_10.gif','histo/FEC1_APZ-Sigma_APV_11.gif','histo/FEC1_APZ-Sigma_APV_12.gif','histo/FEC1_APZ-Sigma_APV_13.gif','histo/FEC1_APZ-Sigma_APV_14.gif','histo/FEC1_APZ-Sigma_APV_15.gif','histo/FEC2_APZ-Sigma_APV_0.gif','histo/FEC2_APZ-Sigma_APV_1.gif', 'histo/FEC2_APZ-Sigma_APV_2.gif','histo/FEC2_APZ-Sigma_APV_3.gif','histo/FEC2_APZ-Sigma_APV_4.gif','histo/FEC2_APZ-Sigma_APV_5.gif','histo/FEC2_APZ-Sigma_APV_6.gif','histo/FEC2_APZ-Sigma_APV_7.gif','histo/FEC2_APZ-Sigma_APV_8.gif','histo/FEC2_APZ-Sigma_APV_9.gif','histo/FEC2_APZ-Sigma_APV_10.gif','histo/FEC2_APZ-Sigma_APV_11.gif','histo/FEC2_APZ-Sigma_APV_12.gif','histo/FEC2_APZ-Sigma_APV_13.gif','histo/FEC2_APZ-Sigma_APV_14.gif','histo/FEC2_APZ-Sigma_APV_15.gif','histo/FEC3_APZ-Sigma_APV_0.gif','histo/FEC3_APZ-Sigma_APV_1.gif', 'histo/FEC3_APZ-Sigma_APV_2.gif','histo/FEC3_APZ-Sigma_APV_3.gif','histo/FEC3_APZ-Sigma_APV_4.gif','histo/FEC3_APZ-Sigma_APV_5.gif','histo/FEC3_APZ-Sigma_APV_6.gif','histo/FEC3_APZ-Sigma_APV_7.gif','histo/FEC3_APZ-Sigma_APV_8.gif','histo/FEC3_APZ-Sigma_APV_9.gif','histo/FEC3_APZ-Sigma_APV_10.gif','histo/FEC3_APZ-Sigma_APV_11.gif','histo/FEC3_APZ-Sigma_APV_12.gif','histo/FEC3_APZ-Sigma_APV_13.gif','histo/FEC3_APZ-Sigma_APV_14.gif','histo/FEC3_APZ-Sigma_APV_15.gif','histo/FEC4_APZ-Sigma_APV_0.gif','histo/FEC4_APZ-Sigma_APV_1.gif', 'histo/FEC4_APZ-Sigma_APV_2.gif','histo/FEC4_APZ-Sigma_APV_3.gif','histo/FEC4_APZ-Sigma_APV_4.gif','histo/FEC4_APZ-Sigma_APV_5.gif','histo/FEC4_APZ-Sigma_APV_6.gif','histo/FEC4_APZ-Sigma_APV_7.gif','histo/FEC4_APZ-Sigma_APV_8.gif','histo/FEC4_APZ-Sigma_APV_9.gif','histo/FEC4_APZ-Sigma_APV_10.gif','histo/FEC4_APZ-Sigma_APV_11.gif','histo/FEC4_APZ-Sigma_APV_12.gif','histo/FEC4_APZ-Sigma_APV_13.gif','histo/FEC4_APZ-Sigma_APV_14.gif','histo/FEC4_APZ-Sigma_APV_15.gif','histo/FEC0_APZ-Pedestal_APV_0.gif','histo/FEC0_APZ-Pedestal_APV_1.gif', 'histo/FEC0_APZ-Pedestal_APV_2.gif','histo/FEC0_APZ-Pedestal_APV_3.gif','histo/FEC0_APZ-Pedestal_APV_4.gif','histo/FEC0_APZ-Pedestal_APV_5.gif','histo/FEC0_APZ-Pedestal_APV_6.gif','histo/FEC0_APZ-Pedestal_APV_7.gif','histo/FEC0_APZ-Pedestal_APV_8.gif','histo/FEC0_APZ-Pedestal_APV_9.gif','histo/FEC0_APZ-Pedestal_APV_10.gif','histo/FEC0_APZ-Pedestal_APV_11.gif','histo/FEC0_APZ-Pedestal_APV_12.gif','histo/FEC0_APZ-Pedestal_APV_13.gif','histo/FEC0_APZ-Pedestal_APV_14.gif','histo/FEC0_APZ-Pedestal_APV_15.gif','histo/FEC1_APZ-Pedestal_APV_0.gif','histo/FEC1_APZ-Pedestal_APV_1.gif', 'histo/FEC1_APZ-Pedestal_APV_2.gif','histo/FEC1_APZ-Pedestal_APV_3.gif','histo/FEC1_APZ-Pedestal_APV_4.gif','histo/FEC1_APZ-Pedestal_APV_5.gif','histo/FEC1_APZ-Pedestal_APV_6.gif','histo/FEC1_APZ-Pedestal_APV_7.gif','histo/FEC1_APZ-Pedestal_APV_8.gif','histo/FEC1_APZ-Pedestal_APV_9.gif','histo/FEC1_APZ-Pedestal_APV_10.gif','histo/FEC1_APZ-Pedestal_APV_11.gif','histo/FEC1_APZ-Pedestal_APV_12.gif','histo/FEC1_APZ-Pedestal_APV_13.gif','histo/FEC1_APZ-Pedestal_APV_14.gif','histo/FEC1_APZ-Pedestal_APV_15.gif','histo/FEC2_APZ-Pedestal_APV_0.gif','histo/FEC2_APZ-Pedestal_APV_1.gif', 'histo/FEC2_APZ-Pedestal_APV_2.gif','histo/FEC2_APZ-Pedestal_APV_3.gif','histo/FEC2_APZ-Pedestal_APV_4.gif','histo/FEC2_APZ-Pedestal_APV_5.gif','histo/FEC2_APZ-Pedestal_APV_6.gif','histo/FEC2_APZ-Pedestal_APV_7.gif','histo/FEC2_APZ-Pedestal_APV_8.gif','histo/FEC2_APZ-Pedestal_APV_9.gif','histo/FEC2_APZ-Pedestal_APV_10.gif','histo/FEC2_APZ-Pedestal_APV_11.gif','histo/FEC2_APZ-Pedestal_APV_12.gif','histo/FEC2_APZ-Pedestal_APV_13.gif','histo/FEC2_APZ-Pedestal_APV_14.gif','histo/FEC2_APZ-Pedestal_APV_15.gif','histo/FEC3_APZ-Pedestal_APV_0.gif','histo/FEC3_APZ-Pedestal_APV_1.gif', 'histo/FEC3_APZ-Pedestal_APV_2.gif','histo/FEC3_APZ-Pedestal_APV_3.gif','histo/FEC3_APZ-Pedestal_APV_4.gif','histo/FEC3_APZ-Pedestal_APV_5.gif','histo/FEC3_APZ-Pedestal_APV_6.gif','histo/FEC3_APZ-Pedestal_APV_7.gif','histo/FEC3_APZ-Pedestal_APV_8.gif','histo/FEC3_APZ-Pedestal_APV_9.gif','histo/FEC3_APZ-Pedestal_APV_10.gif','histo/FEC3_APZ-Pedestal_APV_11.gif','histo/FEC3_APZ-Pedestal_APV_12.gif','histo/FEC3_APZ-Pedestal_APV_13.gif','histo/FEC3_APZ-Pedestal_APV_14.gif','histo/FEC3_APZ-Pedestal_APV_15.gif','histo/FEC4_APZ-Pedestal_APV_0.gif','histo/FEC4_APZ-Pedestal_APV_1.gif', 'histo/FEC4_APZ-Pedestal_APV_2.gif','histo/FEC4_APZ-Pedestal_APV_3.gif','histo/FEC4_APZ-Pedestal_APV_4.gif','histo/FEC4_APZ-Pedestal_APV_5.gif','histo/FEC4_APZ-Pedestal_APV_6.gif','histo/FEC4_APZ-Pedestal_APV_7.gif','histo/FEC4_APZ-Pedestal_APV_8.gif','histo/FEC4_APZ-Pedestal_APV_9.gif','histo/FEC4_APZ-Pedestal_APV_10.gif','histo/FEC4_APZ-Pedestal_APV_11.gif','histo/FEC4_APZ-Pedestal_APV_12.gif','histo/FEC4_APZ-Pedestal_APV_13.gif','histo/FEC4_APZ-Pedestal_APV_14.gif','histo/FEC4_APZ-Pedestal_APV_15.gif'); //URLs of the Images
     
function twodig(n){
    return n > 9 ? "" + n: "0" + n;
}

    function myFunction() {
        //setInterval(function(){
           tmp = new Date();
           tmp = "?"+tmp.getTime();
           for (i=0;i<images.length;i++){
              document.getElementById("img"+i).src = images[i]+tmp;
              //alert(i+images[i]+tmp);
           }
           setTimeout(function(){readbackstatus();},3000);
       //}, 5000);
    }
    

    function init() {
      document.getElementById('syssceltafec').style.display = 'none';
      document.getElementById('syssceltafechdmi').style.display = 'none';
      // Grab the tab links and content divs from the page
      var tabListItems = document.getElementById('tabs').childNodes;
      for ( var i = 0; i < tabListItems.length; i++ ) {
        if ( tabListItems[i].nodeName == "LI" ) {
          var tabLink = getFirstChildWithTagName( tabListItems[i], 'A' );
          var id = getHash( tabLink.getAttribute('href') );
          tabLinks[id] = tabLink;
          contentDivs[id] = document.getElementById( id );
        }
      }

      // Assign onclick events to the tab links, and
      // highlight the first tab
      var i = 0;

      for ( var id in tabLinks ) {
        tabLinks[id].onclick = showTab;
        tabLinks[id].onfocus = function() { this.blur() };
        if ( i == 0 ) tabLinks[id].className = 'selected';
        i++;
      }

      // Hide all content divs except the first
      var i = 0;

      for ( var id in contentDivs ) {
        if ( i != 0 ) contentDivs[id].className = 'tabContent hide';
        i++;
      }
    }

    function showTab() {
      var selectedId = getHash( this.getAttribute('href') );
      document.getElementById('syssceltafec').style.display = '';	  
      document.getElementById('syssceltafechdmi').style.display = 'none';
      if (selectedId=="general") {
	     document.getElementById('syssceltafec').style.display = 'none';
             document.getElementById('syssceltafechdmi').style.display = 'none';
      }
      if (selectedId=="hybrid") {
             document.getElementById('syssceltafechdmi').style.display = '';
      }
      if (selectedId=="zsregisters") {
             document.getElementById('syssceltafechdmi').style.display = '';
      }
      if (selectedId=="daq") {
	     document.getElementById('syssceltafec').style.display = 'none';
             document.getElementById('syssceltafechdmi').style.display = 'none';
      }
      if (selectedId=="dqm") {
             document.getElementById('syssceltafec').style.display = 'none';
             document.getElementById('syssceltafechdmi').style.display = 'none';
      }
      if (selectedId=="amorelog") {
             document.getElementById('syssceltafec').style.display = 'none';
             document.getElementById('syssceltafechdmi').style.display = 'none';
      }
      if (selectedId=="zspedestals") {
	     document.getElementById('syssceltafec').style.display = 'none';
             document.getElementById('syssceltafechdmi').style.display = 'none';
      }



      // Highlight the selected tab, and dim all others.
      // Also show the selected content div, and hide all others.
      for ( var id in contentDivs ) {
        if ( id == selectedId ) {
          tabLinks[id].className = 'selected';
          contentDivs[id].className = 'tabContent';
        } else {
          tabLinks[id].className = '';
          contentDivs[id].className = 'tabContent hide';
        }
      }

      // Stop the browser following the link
      return false;
    }

    function getFirstChildWithTagName( element, tagName ) {
      for ( var i = 0; i < element.childNodes.length; i++ ) {
        if ( element.childNodes[i].nodeName == tagName ) return element.childNodes[i];
      }
    }

    function getHash( url ) {
      var hashPos = url.lastIndexOf ( '#' );
      return url.substring( hashPos + 1 );
    }

    //]]>


$(document).ready(function(){

    readbackstatus();
    readbackfcn();
    readbackfcnsys();
    readbackfcnhyb();
    readbackfcnadc();
    readbackfcnapz();
    readbackfcnapzp();
    readbackdaq();
    readbackamore();
    readbackamorelog1();
    readbackamorelog2();
    readbackamorelog3();
    readbackamorelog4();
    readbackamorelog5();
    readbackamorelog6();
    readbackamoreongoing();
    myFunction();

 $("input.csysidfec").change(function(){

   $.ajax({
        type: 'post',
        url: 'fecchoice.php',
        data: $('#syswhichfec').serialize(),
        success: function () {
          //alert('form was submitted');
        }
      });
});

$("input.cidhdmi").change(function(){

   $.ajax({
        type: 'post',
        url: 'check.php',
        data: $('#hybwhichfec').serialize(),
        success: function () {
          //alert('form was submitted');
        }
      });
});

    $('#startreadform').ajaxForm(function() {
	});
	$('#generalform').ajaxForm(function() {
	});
	$('#runcontrol').ajaxForm(function() {
	});
	$('#filename').ajaxForm(function() {
        });
        $('#amorecontrol').ajaxForm(function() {
        });
	$('#dateform').ajaxForm(function() {
	});
	$('#apvwhichfec').ajaxForm(function() {
	});
	$('#adcwhichfec').ajaxForm(function() {
	});
	$('#syswhichfec').ajaxForm(function() {
	});
	$('#hybwhichfec').ajaxForm(function() {
	});
	$('#apzwhichfec').ajaxForm(function() {
	});
	$('#wapzwhichfec').ajaxForm(function() {
	});
        $('#writeadcaddress0').ajaxForm(function() {
        });
        $('#writeadcaddress1').ajaxForm(function() {
        });
        $('#writeadcaddress2').ajaxForm(function() {
        });
        $('#writeadcaddress3').ajaxForm(function() {
        });
        $('#writeadcaddress4').ajaxForm(function() {
        });
        $('#writeadcaddress5').ajaxForm(function() {
        });
        $('#writeadcaddress6').ajaxForm(function() {
        });
	$('#writeaddress0').ajaxForm(function() {
	});
	$('#writeaddress1').ajaxForm(function() {
	});
	$('#writeaddress2').ajaxForm(function() {
	});
	$('#writeaddress3').ajaxForm(function() {
	});
	$('#writeaddress4').ajaxForm(function() {
	});
	$('#writeaddress5').ajaxForm(function() {
	});
	$('#writeaddress6').ajaxForm(function() {
	});
	$('#writeaddress7').ajaxForm(function() {
	});
	$('#writeaddress8').ajaxForm(function() {
	});
	$('#writeaddress9').ajaxForm(function() {
	});
	$('#writeaddress0a').ajaxForm(function() {
	});
	$('#writeaddress0b').ajaxForm(function() {
	});
	$('#writeaddress0c').ajaxForm(function() {
	});
	$('#writeaddress0d').ajaxForm(function() {
	});
	$('#writeaddress0e').ajaxForm(function() {
	});
	$('#writeaddress0f').ajaxForm(function() {
	});
	$('#writeaddress10').ajaxForm(function() {
	});
	$('#writeaddress11').ajaxForm(function() {
	});
	$('#writeaddress12').ajaxForm(function() {
	});
	$('#writeaddress13').ajaxForm(function() {
	});
	$('#writeaddress14').ajaxForm(function() {
	});
	$('#writeaddress15').ajaxForm(function() {
	});
	$('#writeaddress1d').ajaxForm(function() {
	});
	$('#writeaddress1e').ajaxForm(function() {
	});
	$('#writeaddress1f').ajaxForm(function() {
	});
	$('#writeadcaddress0').ajaxForm(function() {
	});
	$('#writeadcaddress1').ajaxForm(function() {
	});
	$('#writeadcaddress2').ajaxForm(function() {
	});
	$('#writeadcaddress3').ajaxForm(function() {
	});
	$('#writeadcaddress4').ajaxForm(function() {
	});
	$('#writeadcaddress5').ajaxForm(function() {
	});
	$('#writeadcaddress6').ajaxForm(function() {
	});
	$('#writehybaddress0').ajaxForm(function() {
	});
	$('#writehybaddress1').ajaxForm(function() {
	});
	$('#writehybaddress2').ajaxForm(function() {
	});
	$('#writehybaddress3').ajaxForm(function() {
	});
	$('#writehybaddress10').ajaxForm(function() {
	});
	$('#writehybaddress11').ajaxForm(function() {
	});
	$('#writehybaddress12').ajaxForm(function() {
	});
	$('#writehybaddress13').ajaxForm(function() {
	});
	$('#writehybaddress14').ajaxForm(function() {
	});
	$('#writehybaddress15').ajaxForm(function() {
	});
	$('#writehybaddress16').ajaxForm(function() {
	});
	$('#writehybaddress18').ajaxForm(function() {
	});
	$('#writehybaddress19').ajaxForm(function() {
	});
	$('#writehybaddress1a').ajaxForm(function() {
	});
	$('#writehybaddress1b').ajaxForm(function() {
	});
	$('#writehybaddress1c').ajaxForm(function() {
	});
	$('#writehybaddress1d').ajaxForm(function() {
	});
	$('#writeapzaddress0').ajaxForm(function() {
	});
	$('#writeapzaddress1').ajaxForm(function() {
	});
	$('#writeapzaddress2').ajaxForm(function() {
	});
	$('#writeapzaddress3').ajaxForm(function() {
	});
	$('#writeapzaddress4').ajaxForm(function() {
	});
	$('#writeapzaddress5').ajaxForm(function() {
	});
	$('#writeapzaddress6').ajaxForm(function() {
	});
	$('#writeapzaddress7').ajaxForm(function() {
	});
	$('#writeapzaddress8').ajaxForm(function() {
	});
	$('#writeapzaddress9').ajaxForm(function() {
	});
	$('#writeapzaddress10').ajaxForm(function() {
	});
	$('#writeapzaddress11').ajaxForm(function() {
	});
	$('#writeapzaddress12').ajaxForm(function() {
	});
	$('#writeapzaddress13').ajaxForm(function() {
	});
	$('#writeapzaddress14').ajaxForm(function() {
	});
	$('#writeapzaddress15').ajaxForm(function() {
	});
	$('#writeapzaddress16').ajaxForm(function() {
	});
	$('#writeapzaddress17').ajaxForm(function() {
	});
	$('#writeapzaddress18').ajaxForm(function() {
	});
	$('#writeapzaddress19').ajaxForm(function() {
	});
	$('#writeapzaddress20').ajaxForm(function() {
	});
	$('#writeapzaddress21').ajaxForm(function() {
	});
	$('#writeapzaddress22').ajaxForm(function() {
	});
	$('#writeapzaddress23').ajaxForm(function() {
	});
	$('#writeapzaddress24').ajaxForm(function() {
	});
	$('#writeapzaddress25').ajaxForm(function() {
	});
	$('#writeapzaddress26').ajaxForm(function() {
	});
	$('#writeapzaddress27').ajaxForm(function() {
	});
	$('#writeapzaddress28').ajaxForm(function() {
	});
	$('#writeapzaddress29').ajaxForm(function() {
	});
	$('#writeapzaddress30').ajaxForm(function() {
	});
	$('#writeapzaddress31').ajaxForm(function() {
	});
	$('#writeapzaddress32').ajaxForm(function() {
	});
	$('#writeapzaddress33').ajaxForm(function() {
	});
	$('#writeapzaddress34').ajaxForm(function() {
	});
	$('#writeapzaddress35').ajaxForm(function() {
	});
	$('#writeapzaddress36').ajaxForm(function() {
	});
	$('#writeapzaddress37').ajaxForm(function() {
	});
	$('#writeapzaddress38').ajaxForm(function() {
	});
	$('#writeapzaddress39').ajaxForm(function() {
	});
	$('#writeapzaddress40').ajaxForm(function() {
	});
	$('#writeapzaddress41').ajaxForm(function() {
	});
	$('#writeapzaddress42').ajaxForm(function() {
	});
	$('#writeapzaddress43').ajaxForm(function() {
	});
	$('#writeapzaddress44').ajaxForm(function() {
	});
	$('#writeapzaddress45').ajaxForm(function() {
	});
	$('#writeapzaddress46').ajaxForm(function() {
	});
	$('#writeapzaddress47').ajaxForm(function() {
	});
	$('#writeapzaddress48').ajaxForm(function() {
	});
	$('#writeapzaddress49').ajaxForm(function() {
	});
	$('#writeapzaddress50').ajaxForm(function() {
	});
	$('#writeapzaddress51').ajaxForm(function() {
	});
	$('#writeapzaddress52').ajaxForm(function() {
	});
	$('#writeapzaddress53').ajaxForm(function() {
	});
	$('#writeapzaddress54').ajaxForm(function() {
	});
	$('#writeapzaddress55').ajaxForm(function() {
	});
	$('#writeapzaddress56').ajaxForm(function() {
	});
	$('#writeapzaddress57').ajaxForm(function() {
	});
	$('#writeapzaddress58').ajaxForm(function() {
	});
	$('#writeapzaddress59').ajaxForm(function() {
	});
	$('#writeapzaddress60').ajaxForm(function() {
	});
	$('#writeapzaddress61').ajaxForm(function() {
	});
	$('#writeapzaddress62').ajaxForm(function() {
	});
	$('#writeapzaddress63').ajaxForm(function() {
	});
	$('#writeapzaddress64').ajaxForm(function() {
	});
	$('#writeapzaddress65').ajaxForm(function() {
	});
	$('#writeapzaddress66').ajaxForm(function() {
	});
	$('#writeapzaddress67').ajaxForm(function() {
	});
	$('#writeapzaddress68').ajaxForm(function() {
	});
	$('#writeapzaddress69').ajaxForm(function() {
	});
	$('#writeapzaddress70').ajaxForm(function() {
	});
	$('#writeapzaddress71').ajaxForm(function() {
	});
	$('#writeapzaddress72').ajaxForm(function() {
	});
	$('#writeapzaddress73').ajaxForm(function() {
	});
	$('#writeapzaddress74').ajaxForm(function() {
	});
	$('#writeapzaddress75').ajaxForm(function() {
	});
	$('#writeapzaddress76').ajaxForm(function() {
	});
	$('#writeapzaddress77').ajaxForm(function() {
	});
	$('#writeapzaddress78').ajaxForm(function() {
	});
	$('#writeapzaddress79').ajaxForm(function() {
	});
	$('#writeapzaddress80').ajaxForm(function() {
	});
	$('#writeapzaddress81').ajaxForm(function() {
	});
	$('#writeapzaddress82').ajaxForm(function() {
	});
	$('#writeapzaddress83').ajaxForm(function() {
	});
	$('#writeapzaddress84').ajaxForm(function() {
	});
	$('#writeapzaddress85').ajaxForm(function() {
	});
	$('#writeapzaddress86').ajaxForm(function() {
	});
	$('#writeapzaddress87').ajaxForm(function() {
	});
	$('#writeapzaddress88').ajaxForm(function() {
	});
	$('#writeapzaddress89').ajaxForm(function() {
	});
	$('#writeapzaddress90').ajaxForm(function() {
	});
	$('#writeapzaddress91').ajaxForm(function() {
	});
	$('#writeapzaddress92').ajaxForm(function() {
	});
	$('#writeapzaddress93').ajaxForm(function() {
	});
	$('#writeapzaddress94').ajaxForm(function() {
	});
	$('#writeapzaddress95').ajaxForm(function() {
	});
	$('#writeapzaddress96').ajaxForm(function() {
	});
	$('#writeapzaddress97').ajaxForm(function() {
	});
	$('#writeapzaddress98').ajaxForm(function() {
	});
	$('#writeapzaddress99').ajaxForm(function() {
	});
	$('#writeapzaddress100').ajaxForm(function() {
	});
	$('#writeapzaddress101').ajaxForm(function() {
	});
	$('#writeapzaddress102').ajaxForm(function() {
	});
	$('#writeapzaddress103').ajaxForm(function() {
	});
	$('#writeapzaddress104').ajaxForm(function() {
	});
	$('#writeapzaddress105').ajaxForm(function() {
	});
	$('#writeapzaddress106').ajaxForm(function() {
	});
	$('#writeapzaddress107').ajaxForm(function() {
	});
	$('#writeapzaddress108').ajaxForm(function() {
	});
	$('#writeapzaddress109').ajaxForm(function() {
	});
	$('#writeapzaddress110').ajaxForm(function() {
	});
	$('#writeapzaddress111').ajaxForm(function() {
	});
	$('#writeapzaddress112').ajaxForm(function() {
	});
	$('#writeapzaddress113').ajaxForm(function() {
	});
	$('#writeapzaddress114').ajaxForm(function() {
	});
	$('#writeapzaddress115').ajaxForm(function() {
	});
	$('#writeapzaddress116').ajaxForm(function() {
	});
	$('#writeapzaddress117').ajaxForm(function() {
	});
	$('#writeapzaddress118').ajaxForm(function() {
	});
	$('#writeapzaddress119').ajaxForm(function() {
	});
	$('#writeapzaddress120').ajaxForm(function() {
	});
	$('#writeapzaddress121').ajaxForm(function() {
	});
	$('#writeapzaddress122').ajaxForm(function() {
	});
	$('#writeapzaddress123').ajaxForm(function() {
	});
	$('#writeapzaddress124').ajaxForm(function() {
	});
	$('#writeapzaddress125').ajaxForm(function() {
	});
	$('#writeapzaddress126').ajaxForm(function() {
	});
	$('#writeapzaddress127').ajaxForm(function() {
	});
	$('#writeapz2address0').ajaxForm(function() {
	});
	$('#writeapz2address1').ajaxForm(function() {
	});
	$('#writeapz2address2').ajaxForm(function() {
	});
	$('#writeapz2address3').ajaxForm(function() {
	});
	$('#writeapz2address4').ajaxForm(function() {
	});
	$('#writeapz2address5').ajaxForm(function() {
	});
	$('#writeapz2address6').ajaxForm(function() {
	});
	$('#writeapz2address7').ajaxForm(function() {
	});
	$('#writeapz2address8').ajaxForm(function() {
	});
	$('#writeapz2address9').ajaxForm(function() {
	});
	$('#writeapz2address10').ajaxForm(function() {
	});
	$('#writeapz2address11').ajaxForm(function() {
	});
	$('#writeapz2address12').ajaxForm(function() {
	});
	$('#writeapz2address13').ajaxForm(function() {
	});
	$('#writeapz2address14').ajaxForm(function() {
	});
	$('#writeapz2address15').ajaxForm(function() {
	});
	$('#writeapz2address16').ajaxForm(function() {
	});
	$('#writeapz2address17').ajaxForm(function() {
	});
	$('#writeapz2address18').ajaxForm(function() {
	});
	$('#writeapz2address19').ajaxForm(function() {
	});
	$('#writeapz2address20').ajaxForm(function() {
	});
	$('#writeapz2address21').ajaxForm(function() {
	});
	$('#writeapz2address22').ajaxForm(function() {
	});
	$('#writeapz2address23').ajaxForm(function() {
	});
	$('#writeapz2address24').ajaxForm(function() {
	});
	$('#writeapz2address25').ajaxForm(function() {
	});
	$('#writeapz2address26').ajaxForm(function() {
	});
	$('#writeapz2address27').ajaxForm(function() {
	});
	$('#writeapz2address28').ajaxForm(function() {
	});
	$('#writeapz2address29').ajaxForm(function() {
	});
	$('#writeapz2address30').ajaxForm(function() {
	});
	$('#writeapz2address31').ajaxForm(function() {
	});
	$('#writeapz2address32').ajaxForm(function() {
	});
	$('#writeapz2address33').ajaxForm(function() {
	});
	$('#writeapz2address34').ajaxForm(function() {
	});
	$('#writeapz2address35').ajaxForm(function() {
	});
	$('#writeapz2address36').ajaxForm(function() {
	});
	$('#writeapz2address37').ajaxForm(function() {
	});
	$('#writeapz2address38').ajaxForm(function() {
	});
	$('#writeapz2address39').ajaxForm(function() {
	});
	$('#writeapz2address40').ajaxForm(function() {
	});
	$('#writeapz2address41').ajaxForm(function() {
	});
	$('#writeapz2address42').ajaxForm(function() {
	});
	$('#writeapz2address43').ajaxForm(function() {
	});
	$('#writeapz2address44').ajaxForm(function() {
	});
	$('#writeapz2address45').ajaxForm(function() {
	});
	$('#writeapz2address46').ajaxForm(function() {
	});
	$('#writeapz2address47').ajaxForm(function() {
	});
	$('#writeapz2address48').ajaxForm(function() {
	});
	$('#writeapz2address49').ajaxForm(function() {
	});
	$('#writeapz2address50').ajaxForm(function() {
	});
	$('#writeapz2address51').ajaxForm(function() {
	});
	$('#writeapz2address52').ajaxForm(function() {
	});
	$('#writeapz2address53').ajaxForm(function() {
	});
	$('#writeapz2address54').ajaxForm(function() {
	});
	$('#writeapz2address55').ajaxForm(function() {
	});
	$('#writeapz2address56').ajaxForm(function() {
	});
	$('#writeapz2address57').ajaxForm(function() {
	});
	$('#writeapz2address58').ajaxForm(function() {
	});
	$('#writeapz2address59').ajaxForm(function() {
	});
	$('#writeapz2address60').ajaxForm(function() {
	});
	$('#writeapz2address61').ajaxForm(function() {
	});
	$('#writeapz2address62').ajaxForm(function() {
	});
	$('#writeapz2address63').ajaxForm(function() {
	});
	$('#writeapz2address64').ajaxForm(function() {
	});
	$('#writeapz2address65').ajaxForm(function() {
	});
	$('#writeapz2address66').ajaxForm(function() {
	});
	$('#writeapz2address67').ajaxForm(function() {
	});
	$('#writeapz2address68').ajaxForm(function() {
	});
	$('#writeapz2address69').ajaxForm(function() {
	});
	$('#writeapz2address70').ajaxForm(function() {
	});
	$('#writeapz2address71').ajaxForm(function() {
	});
	$('#writeapz2address72').ajaxForm(function() {
	});
	$('#writeapz2address73').ajaxForm(function() {
	});
	$('#writeapz2address74').ajaxForm(function() {
	});
	$('#writeapz2address75').ajaxForm(function() {
	});
	$('#writeapz2address76').ajaxForm(function() {
	});
	$('#writeapz2address77').ajaxForm(function() {
	});
	$('#writeapz2address78').ajaxForm(function() {
	});
	$('#writeapz2address79').ajaxForm(function() {
	});
	$('#writeapz2address80').ajaxForm(function() {
	});
	$('#writeapz2address81').ajaxForm(function() {
	});
	$('#writeapz2address82').ajaxForm(function() {
	});
	$('#writeapz2address83').ajaxForm(function() {
	});
	$('#writeapz2address84').ajaxForm(function() {
	});
	$('#writeapz2address85').ajaxForm(function() {
	});
	$('#writeapz2address86').ajaxForm(function() {
	});
	$('#writeapz2address87').ajaxForm(function() {
	});
	$('#writeapz2address88').ajaxForm(function() {
	});
	$('#writeapz2address89').ajaxForm(function() {
	});
	$('#writeapz2address90').ajaxForm(function() {
	});
	$('#writeapz2address91').ajaxForm(function() {
	});
	$('#writeapz2address92').ajaxForm(function() {
	});
	$('#writeapz2address93').ajaxForm(function() {
	});
	$('#writeapz2address94').ajaxForm(function() {
	});
	$('#writeapz2address95').ajaxForm(function() {
	});
	$('#writeapz2address96').ajaxForm(function() {
	});
	$('#writeapz2address97').ajaxForm(function() {
	});
	$('#writeapz2address98').ajaxForm(function() {
	});
	$('#writeapz2address99').ajaxForm(function() {
	});
	$('#writeapz2address100').ajaxForm(function() {
	});
	$('#writeapz2address101').ajaxForm(function() {
	});
	$('#writeapz2address102').ajaxForm(function() {
	});
	$('#writeapz2address103').ajaxForm(function() {
	});
	$('#writeapz2address104').ajaxForm(function() {
	});
	$('#writeapz2address105').ajaxForm(function() {
	});
	$('#writeapz2address106').ajaxForm(function() {
	});
	$('#writeapz2address107').ajaxForm(function() {
	});
	$('#writeapz2address108').ajaxForm(function() {
	});
	$('#writeapz2address109').ajaxForm(function() {
	});
	$('#writeapz2address110').ajaxForm(function() {
	});
	$('#writeapz2address111').ajaxForm(function() {
	});
	$('#writeapz2address112').ajaxForm(function() {
	});
	$('#writeapz2address113').ajaxForm(function() {
	});
	$('#writeapz2address114').ajaxForm(function() {
	});
	$('#writeapz2address115').ajaxForm(function() {
	});
	$('#writeapz2address116').ajaxForm(function() {
	});
	$('#writeapz2address117').ajaxForm(function() {
	});
	$('#writeapz2address118').ajaxForm(function() {
	});
	$('#writeapz2address119').ajaxForm(function() {
	});
	$('#writeapz2address120').ajaxForm(function() {
	});
	$('#writeapz2address121').ajaxForm(function() {
	});
	$('#writeapz2address122').ajaxForm(function() {
	});
	$('#writeapz2address123').ajaxForm(function() {
	});
	$('#writeapz2address124').ajaxForm(function() {
	});
	$('#writeapz2address125').ajaxForm(function() {
	});
	$('#writeapz2address126').ajaxForm(function() {
	});
	$('#writeapz2address127').ajaxForm(function() {
	});
    $('.hybsubadrhelptext').hide();
    $('.hybmodehelptext').hide();
    $('.hyblatencyhelptext').hide();
    $('.hybmuxgainhelptext').hide();
    $('.hybiprehelptext').hide();
    $('.hybipcaschelptext').hide();
    $('.hybipsfhelptext').hide();
    $('.hybishahelptext').hide();
    $('.hybissfhelptext').hide();
    $('.hybipsphelptext').hide();
    $('.hybimuxinhelptext').hide();
    $('.hybicalhelptext').hide();
    $('.hybvpsphelptext').hide();
    $('.hybvfshelptext').hide();
    $('.hybvfphelptext').hide();
    $('.hybcdrvhelptext').hide();
    $('.hybcselhelptext').hide();
    $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    $('.apzsubadrhelptext').hide()


    $("#hybsubadrhelpshow").click(function(){
        $('.hybsubadrhelptext').show();
    $('.hybmodehelptext').hide();
    $('.hyblatencyhelptext').hide();
    $('.hybmuxgainhelptext').hide();
    $('.hybiprehelptext').hide();
    $('.hybipcaschelptext').hide();
    $('.hybipsfhelptext').hide();
    $('.hybishahelptext').hide();
    $('.hybissfhelptext').hide();
    $('.hybipsphelptext').hide();
    $('.hybimuxinhelptext').hide();
    $('.hybicalhelptext').hide();
    $('.hybvpsphelptext').hide();
    $('.hybvfshelptext').hide();
    $('.hybvfphelptext').hide();
    $('.hybcdrvhelptext').hide();
    $('.hybcselhelptext').hide();
    });

    $("#hybmodehelpshow").click(function(){
        $('.hybmodehelptext').show();
    $('.hybsubadrhelptext').hide();
    $('.hyblatencyhelptext').hide();
    $('.hybmuxgainhelptext').hide();
    $('.hybiprehelptext').hide();
    $('.hybipcaschelptext').hide();
    $('.hybipsfhelptext').hide();
    $('.hybishahelptext').hide();
    $('.hybissfhelptext').hide();
    $('.hybipsphelptext').hide();
    $('.hybimuxinhelptext').hide();
    $('.hybicalhelptext').hide();
    $('.hybvpsphelptext').hide();
    $('.hybvfshelptext').hide();
    $('.hybvfphelptext').hide();
    $('.hybcdrvhelptext').hide();
    $('.hybcselhelptext').hide();
    });

    $("#hyblatencyhelpshow").click(function(){
        $('.hybmodehelptext').hide();
    $('.hybsubadrhelptext').hide();
    $('.hyblatencyhelptext').show();
    $('.hybmuxgainhelptext').hide();
    $('.hybiprehelptext').hide();
    $('.hybipcaschelptext').hide();
    $('.hybipsfhelptext').hide();
    $('.hybishahelptext').hide();
    $('.hybissfhelptext').hide();
    $('.hybipsphelptext').hide();
    $('.hybimuxinhelptext').hide();
    $('.hybicalhelptext').hide();
    $('.hybvpsphelptext').hide();
    $('.hybvfshelptext').hide();
    $('.hybvfphelptext').hide();
    $('.hybcdrvhelptext').hide();
    $('.hybcselhelptext').hide();
    });

    $("#hybmuxgainhelpshow").click(function(){
        $('.hybmodehelptext').hide();
    $('.hybsubadrhelptext').hide();
    $('.hyblatencyhelptext').hide();
    $('.hybmuxgainhelptext').show();
    $('.hybiprehelptext').hide();
    $('.hybipcaschelptext').hide();
    $('.hybipsfhelptext').hide();
    $('.hybishahelptext').hide();
    $('.hybissfhelptext').hide();
    $('.hybipsphelptext').hide();
    $('.hybimuxinhelptext').hide();
    $('.hybicalhelptext').hide();
    $('.hybvpsphelptext').hide();
    $('.hybvfshelptext').hide();
    $('.hybvfphelptext').hide();
    $('.hybcdrvhelptext').hide();
    $('.hybcselhelptext').hide();
    });

    $("#hybiprehelpshow").click(function(){
        $('.hybmodehelptext').hide();
    $('.hybsubadrhelptext').hide();
    $('.hyblatencyhelptext').hide();
    $('.hybmuxgainhelptext').hide();
    $('.hybiprehelptext').show();
    $('.hybipcaschelptext').hide();
    $('.hybipsfhelptext').hide();
    $('.hybishahelptext').hide();
    $('.hybissfhelptext').hide();
    $('.hybipsphelptext').hide();
    $('.hybimuxinhelptext').hide();
    $('.hybicalhelptext').hide();
    $('.hybvpsphelptext').hide();
    $('.hybvfshelptext').hide();
    $('.hybvfphelptext').hide();
    $('.hybcdrvhelptext').hide();
    $('.hybcselhelptext').hide();
    });

    $("#hybipcaschelpshow").click(function(){
        $('.hybmodehelptext').hide();
    $('.hybsubadrhelptext').hide();
    $('.hyblatencyhelptext').hide();
    $('.hybmuxgainhelptext').hide();
    $('.hybiprehelptext').hide();
    $('.hybipcaschelptext').show();
    $('.hybipsfhelptext').hide();
    $('.hybishahelptext').hide();
    $('.hybissfhelptext').hide();
    $('.hybipsphelptext').hide();
    $('.hybimuxinhelptext').hide();
    $('.hybicalhelptext').hide();
    $('.hybvpsphelptext').hide();
    $('.hybvfshelptext').hide();
    $('.hybvfphelptext').hide();
    $('.hybcdrvhelptext').hide();
    $('.hybcselhelptext').hide();
    });

    $("#hybipsfhelpshow").click(function(){
        $('.hybmodehelptext').hide();
    $('.hybsubadrhelptext').hide();
    $('.hyblatencyhelptext').hide();
    $('.hybmuxgainhelptext').hide();
    $('.hybiprehelptext').hide();
    $('.hybipcaschelptext').hide();
    $('.hybipsfhelptext').show();
    $('.hybishahelptext').hide();
    $('.hybissfhelptext').hide();
    $('.hybipsphelptext').hide();
    $('.hybimuxinhelptext').hide();
    $('.hybicalhelptext').hide();
    $('.hybvpsphelptext').hide();
    $('.hybvfshelptext').hide();
    $('.hybvfphelptext').hide();
    $('.hybcdrvhelptext').hide();
    $('.hybcselhelptext').hide();
    });

    $("#hybishahelpshow").click(function(){
        $('.hybmodehelptext').hide();
    $('.hybsubadrhelptext').hide();
    $('.hyblatencyhelptext').hide();
    $('.hybmuxgainhelptext').hide();
    $('.hybiprehelptext').hide();
    $('.hybipcaschelptext').hide();
    $('.hybipsfhelptext').hide();
    $('.hybishahelptext').show();
    $('.hybissfhelptext').hide();
    $('.hybipsphelptext').hide();
    $('.hybimuxinhelptext').hide();
    $('.hybicalhelptext').hide();
    $('.hybvpsphelptext').hide();
    $('.hybvfshelptext').hide();
    $('.hybvfphelptext').hide();
    $('.hybcdrvhelptext').hide();
    $('.hybcselhelptext').hide();
    });

    $("#hybissfhelpshow").click(function(){
        $('.hybmodehelptext').hide();
    $('.hybsubadrhelptext').hide();
    $('.hyblatencyhelptext').hide();
    $('.hybmuxgainhelptext').hide();
    $('.hybiprehelptext').hide();
    $('.hybipcaschelptext').hide();
    $('.hybipsfhelptext').hide();
    $('.hybishahelptext').hide();
    $('.hybissfhelptext').show();
    $('.hybipsphelptext').hide();
    $('.hybimuxinhelptext').hide();
    $('.hybicalhelptext').hide();
    $('.hybvpsphelptext').hide();
    $('.hybvfshelptext').hide();
    $('.hybvfphelptext').hide();
    $('.hybcdrvhelptext').hide();
    $('.hybcselhelptext').hide();
    });

    $("#hybipsphelpshow").click(function(){
        $('.hybmodehelptext').hide();
    $('.hybsubadrhelptext').hide();
    $('.hyblatencyhelptext').hide();
    $('.hybmuxgainhelptext').hide();
    $('.hybiprehelptext').hide();
    $('.hybipcaschelptext').hide();
    $('.hybipsfhelptext').hide();
    $('.hybishahelptext').hide();
    $('.hybissfhelptext').hide();
    $('.hybipsphelptext').show();
    $('.hybimuxinhelptext').hide();
    $('.hybicalhelptext').hide();
    $('.hybvpsphelptext').hide();
    $('.hybvfshelptext').hide();
    $('.hybvfphelptext').hide();
    $('.hybcdrvhelptext').hide();
    $('.hybcselhelptext').hide();
    });

    $("#hybimuxinhelpshow").click(function(){
        $('.hybmodehelptext').hide();
    $('.hybsubadrhelptext').hide();
    $('.hyblatencyhelptext').hide();
    $('.hybmuxgainhelptext').hide();
    $('.hybiprehelptext').hide();
    $('.hybipcaschelptext').hide();
    $('.hybipsfhelptext').hide();
    $('.hybishahelptext').hide();
    $('.hybissfhelptext').hide();
    $('.hybipsphelptext').hide();
    $('.hybimuxinhelptext').show();
    $('.hybicalhelptext').hide();
    $('.hybvpsphelptext').hide();
    $('.hybvfshelptext').hide();
    $('.hybvfphelptext').hide();
    $('.hybcdrvhelptext').hide();
    $('.hybcselhelptext').hide();
    });

    $("#hybicalhelpshow").click(function(){
        $('.hybmodehelptext').hide();
    $('.hybsubadrhelptext').hide();
    $('.hyblatencyhelptext').hide();
    $('.hybmuxgainhelptext').hide();
    $('.hybiprehelptext').hide();
    $('.hybipcaschelptext').hide();
    $('.hybipsfhelptext').hide();
    $('.hybishahelptext').hide();
    $('.hybissfhelptext').hide();
    $('.hybipsphelptext').hide();
    $('.hybimuxinhelptext').hide();
    $('.hybicalhelptext').show();
    $('.hybvpsphelptext').hide();
    $('.hybvfshelptext').hide();
    $('.hybvfphelptext').hide();
    $('.hybcdrvhelptext').hide();
    $('.hybcselhelptext').hide();
    });

    $("#hybvpsphelpshow").click(function(){
        $('.hybmodehelptext').hide();
    $('.hybsubadrhelptext').hide();
    $('.hyblatencyhelptext').hide();
    $('.hybmuxgainhelptext').hide();
    $('.hybiprehelptext').hide();
    $('.hybipcaschelptext').hide();
    $('.hybipsfhelptext').hide();
    $('.hybishahelptext').hide();
    $('.hybissfhelptext').hide();
    $('.hybipsphelptext').hide();
    $('.hybimuxinhelptext').hide();
    $('.hybicalhelptext').hide();
    $('.hybvpsphelptext').show();
    $('.hybvfshelptext').hide();
    $('.hybvfphelptext').hide();
    $('.hybcdrvhelptext').hide();
    $('.hybcselhelptext').hide();
    });

    $("#hybvfshelpshow").click(function(){
        $('.hybmodehelptext').hide();
    $('.hybsubadrhelptext').hide();
    $('.hyblatencyhelptext').hide();
    $('.hybmuxgainhelptext').hide();
    $('.hybiprehelptext').hide();
    $('.hybipcaschelptext').hide();
    $('.hybipsfhelptext').hide();
    $('.hybishahelptext').hide();
    $('.hybissfhelptext').hide();
    $('.hybipsphelptext').hide();
    $('.hybimuxinhelptext').hide();
    $('.hybicalhelptext').hide();
    $('.hybvpsphelptext').hide();
    $('.hybvfshelptext').show();
    $('.hybvfphelptext').hide();
    $('.hybcdrvhelptext').hide();
    $('.hybcselhelptext').hide();
    });

    $("#hybvfphelptext").click(function(){
        $('.hybmodehelptext').hide();
    $('.hybsubadrhelptext').hide();
    $('.hyblatencyhelptext').hide();
    $('.hybmuxgainhelptext').hide();
    $('.hybiprehelptext').hide();
    $('.hybipcaschelptext').hide();
    $('.hybipsfhelptext').hide();
    $('.hybishahelptext').hide();
    $('.hybissfhelptext').hide();
    $('.hybipsphelptext').hide();
    $('.hybimuxinhelptext').hide();
    $('.hybicalhelptext').hide();
    $('.hybvpsphelptext').hide();
    $('.hybvfshelptext').hide();
    $('.hybvfphelptext').show();
    $('.hybcdrvhelptext').hide();
    $('.hybcselhelptext').hide();
    });

    $("#hybcdrvhelpshow").click(function(){
        $('.hybmodehelptext').hide();
    $('.hybsubadrhelptext').hide();
    $('.hyblatencyhelptext').hide();
    $('.hybmuxgainhelptext').hide();
    $('.hybiprehelptext').hide();
    $('.hybipcaschelptext').hide();
    $('.hybipsfhelptext').hide();
    $('.hybishahelptext').hide();
    $('.hybissfhelptext').hide();
    $('.hybipsphelptext').hide();
    $('.hybimuxinhelptext').hide();
    $('.hybicalhelptext').hide();
    $('.hybvpsphelptext').hide();
    $('.hybvfshelptext').hide();
    $('.hybvfphelptext').hide();
    $('.hybcdrvhelptext').show();
    $('.hybcselhelptext').hide();
    });

    $("#hybcselhelpshow").click(function(){
        $('.hybmodehelptext').hide();
    $('.hybsubadrhelptext').hide();
    $('.hyblatencyhelptext').hide();
    $('.hybmuxgainhelptext').hide();
    $('.hybiprehelptext').hide();
    $('.hybipcaschelptext').hide();
    $('.hybipsfhelptext').hide();
    $('.hybishahelptext').hide();
    $('.hybissfhelptext').hide();
    $('.hybipsphelptext').hide();
    $('.hybimuxinhelptext').hide();
    $('.hybicalhelptext').hide();
    $('.hybvpsphelptext').hide();
    $('.hybvfshelptext').hide();
    $('.hybvfphelptext').hide();
    $('.hybcdrvhelptext').hide();
    $('.hybcselhelptext').show();
    });


    $("#bclkmodehelpshow").click(function(){
        $('.bclkmodehelptext').show();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    });

    $("#bclktrgbursthelpshow").click(function(){
    $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').show();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    });


    $("#bclkfreqhelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').show();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    });


    $("#bclktrgdelayhelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').show();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    });


    $("#bclktpdelayhelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').show();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    });

    $("#bclkrosynchelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').show();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    });


    $("#adcstatushelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').show();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    });

    $("#evbldchenablehelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').show();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    });


    $("#evblddatalenghthelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').show();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    });


    $("#evbldmodehelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').show();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    });


    $("#evbldeventinfotypehelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').show();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    });


    $("#evbldeventinfodatahelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').show();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    });


    $("#roenabledhelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').show();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    });


    $("#apzsyncdethelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').show();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    });


    $("#apzstatushelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').show();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    });


    $("#apzapvselecthelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').show();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    });

    $("#apznsampleshelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').show();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    });


    $("#apzzerosuppthrhelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').show();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    });


    $("#apzzerosuppprmshelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').show();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    });


    $("#apzsynclowthrhelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').show();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').hide();
    });


    $("#apzsynchighthrhelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').show();
    $('.apzcmdhelptext').hide();
    });

    $("#apzsynchighthrhelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').show();
    $('.apzcmdhelptext').hide();
    });


    $("#apzcmdhelpshow").click(function(){
        $('.bclkmodehelptext').hide();
    $('.bclktrgbursthelptext').hide();
    $('.bclkfreqhelptext').hide();
    $('.bclktrgdelayhelptext').hide();
    $('.bclktpdelayhelptext').hide();
    $('.bclkrosynchelptext').hide();
    $('.adcstatushelptext').hide();
    $('.evbldchenablehelptext').hide();
    $('.evblddatalenghthelptext').hide();
    $('.evbldmodehelptext').hide();
    $('.evbldeventinfotypehelptext').hide();
    $('.evbldeventinfodatahelptext').hide();
    $('.roenabledhelptext').hide();
    $('.apzsyncdethelptext').hide();
    $('.apzstatushelptext').hide();
    $('.apzapvselecthelptext').hide();
    $('.apznsampleshelptext').hide();
    $('.apzzerosuppthrhelptext').hide();
    $('.apzzerosuppprmshelptext').hide();
    $('.apzsynclowthrhelptext').hide();
    $('.apzsynchighthrhelptext').hide();
    $('.apzcmdhelptext').show();
    });


    $("#apzsubadrhelpshow").click(function(){
        $('.apzsubadrhelptext').show();
    });


});


function readbackfcn()
{
	if (document.getElementById('sysidfec1').checked) {
	  apvidfec_value = document.getElementById('sysidfec1').value;
	}
	if (document.getElementById('sysidfec2').checked) {
	  apvidfec_value = document.getElementById('sysidfec2').value;
	}
	if (document.getElementById('sysidfec3').checked) {
	  apvidfec_value = document.getElementById('sysidfec3').value;
	}
	if (document.getElementById('sysidfec4').checked) {
	  apvidfec_value = document.getElementById('sysidfec4').value;
	}
	if (document.getElementById('sysidfec5').checked) {
	  apvidfec_value = document.getElementById('sysidfec5').value;
	}

        //var apvidfec document.getElementByName('apvidfec3');
        //var apvidfec_value;
        //for(var i = 0; i < apvidfec.length; i++){
        //   if(apvidfec[i].checked){
        //      apvidfec_value = apvidfec[i].value;
        //      window.alert(apvidfec_value);
        //   }
        //}

    var ip1 = document.getElementById('date'+apvidfec_value+'ip1');
    var ip2 = document.getElementById('date'+apvidfec_value+'ip2');
    var ip3 = document.getElementById('date'+apvidfec_value+'ip3');
    var ip4 = document.getElementById('date'+apvidfec_value+'ip4');	
    var port = document.getElementById("port");
    //var valuetowrite0 = document.getElementById("valuetowrite0");
    //var valuetowrite1 = document.getElementById("valuetowrite1");
    //var color0 = document.getElementById('divcolor0');
    //var color1 = document.getElementById('divcolor1');
       $.get('loadvalue.php?partialaddress='+ip1.value+ip2.value+ip3.value+ip4.value+port.value,function(rs)
          {
              $('#ValueRead0').html('--')
	      $('#ValueRead1').html('--')
              $('#ValueRead2').html('--')
              $('#ValueRead3').html('--')
              $('#ValueRead4').html('--')
              $('#ValueRead5').html('--')
              $('#ValueRead6').html('--')
              $('#ValueRead7').html('--')
              $('#ValueRead8').html('--')
              $('#ValueRead9').html('--')
              $('#ValueRead0a').html('--')
              $('#ValueRead0b').html('--')
              $('#ValueRead0c').html('--')
              $('#ValueRead0d').html('--')
              $('#ValueRead0e').html('--')
              $('#ValueRead0f').html('--')
              $('#ValueRead10').html('--')
              $('#ValueRead11').html('--')
              $('#ValueRead12').html('--')
              $('#ValueRead13').html('--')
              $('#ValueRead14').html('--')
              $('#ValueRead15').html('--')
              $('#ValueRead16').html('--')
              $('#ValueRead17').html('--')
              $('#ValueRead18').html('--')
              $('#ValueRead19').html('--')
              $('#ValueRead1a').html('--')
              $('#ValueRead1b').html('--')
              $('#ValueRead1c').html('--')
              $('#ValueRead1d').html('--')
              $('#ValueRead1e').html('--')
              $('#ValueRead1f').html('--')
              var id_numbers = JSON.parse(rs);            
              $('#ValueRead0').html(id_numbers[0])
	      $('#ValueRead1').html(id_numbers[1])
              $('#ValueRead2').html(id_numbers[2])
              $('#ValueRead3').html(id_numbers[3])
              $('#ValueRead4').html(id_numbers[4])
              $('#ValueRead5').html(id_numbers[5])
              $('#ValueRead6').html(id_numbers[6])
              $('#ValueRead7').html(id_numbers[7])
              $('#ValueRead8').html(id_numbers[8])
              $('#ValueRead9').html(id_numbers[9])
              $('#ValueRead0a').html(id_numbers[10])
              $('#ValueRead0b').html(id_numbers[11])
              $('#ValueRead0c').html(id_numbers[12])
              $('#ValueRead0d').html(id_numbers[13])
              $('#ValueRead0e').html(id_numbers[14])
              $('#ValueRead0f').html(id_numbers[15])
              $('#ValueRead10').html(id_numbers[16])
              $('#ValueRead11').html(id_numbers[17])
              $('#ValueRead12').html(id_numbers[18])
              $('#ValueRead13').html(id_numbers[19])
              $('#ValueRead14').html(id_numbers[20])
              $('#ValueRead15').html(id_numbers[21])
              $('#ValueRead16').html(id_numbers[22])
              $('#ValueRead17').html(id_numbers[23])
              $('#ValueRead18').html(id_numbers[24])
              $('#ValueRead19').html(id_numbers[25])
              $('#ValueRead1a').html(id_numbers[26])
              $('#ValueRead1b').html(id_numbers[27])
              $('#ValueRead1c').html(id_numbers[28])
              $('#ValueRead1d').html(id_numbers[29])
              $('#ValueRead1e').html(id_numbers[30])
              $('#ValueRead1f').html(id_numbers[31])
/*
              if ( id_numbers[0].replace(/(\r\n|\n|\r)/gm,"") !== valuetowrite0.value ) {
                 color0.style.backgroundColor='red';
              }
              else {
                 color0.style.backgroundColor='white';
              }
              if ( id_numbers[1].replace(/(\r\n|\n|\r)/gm,"") !== valuetowrite1.value ) {
                 color1.style.backgroundColor='red';              
              }
              else {
                 color1.style.backgroundColor='white';
              }
*/
              setTimeout(function(){readbackfcn();},3000);
          });
}
function readbackamoreongoing()
{
var url = "loadamoreongoing.php";
        var result = "";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'text',
            success: function (data) {
                $('#srsamoreongoing').html(data);
                setTimeout(function(){readbackamoreongoing();},8000);
            },
            async: false
        });
}
function readbackamorelog1()
{
var url = "loadamorelog1.php";
        var result = "";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'text',
            success: function (data) {
                $('#srsamorelog1').html(data);
                setTimeout(function(){readbackamorelog1();},8000);
            },
            async: false
        });
}
function readbackamorelog2()
{
var url = "loadamorelog2.php";
        var result = "";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'text',
            success: function (data) {
                $('#srsamorelog2').html(data);
                setTimeout(function(){readbackamorelog2();},8000);
            },
            async: false
        });
}
function readbackamorelog3()
{
var url = "loadamorelog3.php";
        var result = "";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'text',
            success: function (data) {
                $('#srsamorelog3').html(data);
                setTimeout(function(){readbackamorelog3();},8000);
            },
            async: false
        });
}
function readbackamorelog4()
{
var url = "loadamorelog4.php";
        var result = "";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'text',
            success: function (data) {
                $('#srsamorelog4').html(data);
                setTimeout(function(){readbackamorelog4();},8000);
            },
            async: false
        });
}
function readbackamorelog5()
{
var url = "loadamorelog5.php";
        var result = "";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'text',
            success: function (data) {
                $('#srsamorelog5').html(data);
                setTimeout(function(){readbackamorelog5();},8000);
            },
            async: false
        });
}
function readbackamorelog6()
{
var url = "loadamorelog6.php";
        var result = "";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'text',
            success: function (data) {
                $('#srsamorelog6').html(data);
                setTimeout(function(){readbackamorelog6();},8000);
            },
            async: false
        });
}
function readbackamore()
{
var url = "loadamore.php";
        var result = "";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'text',
            success: function (data) {
                $('#srsamore').html(data);
                setTimeout(function(){readbackamore();},8000);
            },
            async: false
        });
}
function readbackdaq()
{
var url = "loaddaq.php";
        var result = "";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'text',
            success: function (data) {
                $('#srsdaq').html(data);
                setTimeout(function(){readbackdaq();},8000);
            },
            async: false
        });
}

function readbackstatus()
{
var url = "loadstatus.php";
        var result = "";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'text',
            success: function (data) {
                $('#srsstatus').html(data);
                setTimeout(function(){readbackstatus();},5000);
            },
            async: false
        });
}

function readbackfcnsys()
{
    if (document.getElementById('sysidfec1').checked) {
	  sysidfec_value = document.getElementById('sysidfec1').value;
	}
	if (document.getElementById('sysidfec2').checked) {
	  sysidfec_value = document.getElementById('sysidfec2').value;
	}
	if (document.getElementById('sysidfec3').checked) {
	  sysidfec_value = document.getElementById('sysidfec3').value;
	}
	if (document.getElementById('sysidfec4').checked) {
	  sysidfec_value = document.getElementById('sysidfec4').value;
	}
	if (document.getElementById('sysidfec5').checked) {
	  sysidfec_value = document.getElementById('sysidfec5').value;
	}
	//window.alert(sysidfec_value);
    var sysip1 = document.getElementById('date'+sysidfec_value+'ip1');
    var sysip2 = document.getElementById('date'+sysidfec_value+'ip2');
    var sysip3 = document.getElementById('date'+sysidfec_value+'ip3');
    var sysip4 = document.getElementById('date'+sysidfec_value+'ip4');	    
	
    var sysport = document.getElementById("sysport");

       $.get('loadvaluesys.php?partialaddress='+sysip1.value+sysip2.value+sysip3.value+sysip4.value+sysport.value,function(rs)
          {
              $('#sysValueRead0').html('--')
	      $('#sysValueRead1').html('--')
              $('#sysValueRead2').html('--')
              $('#sysValueRead3').html('--')
              $('#sysValueRead4').html('--')
              $('#sysValueRead5').html('--')
              $('#sysValueRead6').html('--')
              $('#sysValueRead7').html('--')
              $('#sysValueRead8').html('--')
              $('#sysValueRead9').html('--')
              $('#sysValueRead0a').html('--')
              $('#sysValueRead0b').html('--')
              $('#sysValueRead0c').html('--')
              $('#sysValueRead0d').html('--')
              $('#sysValueRead0e').html('--')
              $('#sysValueRead0f').html('--')
              var sysid_numbers = JSON.parse(rs);            
              $('#sysValueRead0').html(sysid_numbers[0])
	      $('#sysValueRead1').html(sysid_numbers[1])
              $('#sysValueRead2').html(sysid_numbers[2])
              $('#sysValueRead3').html(sysid_numbers[3])
              $('#sysValueRead4').html(sysid_numbers[4])
              $('#sysValueRead5').html(sysid_numbers[5])
              $('#sysValueRead6').html(sysid_numbers[6])
              $('#sysValueRead7').html(sysid_numbers[7])
              $('#sysValueRead8').html(sysid_numbers[8])
              $('#sysValueRead9').html(sysid_numbers[9])
              $('#sysValueRead0a').html(sysid_numbers[10])
              $('#sysValueRead0b').html(sysid_numbers[11])
              $('#sysValueRead0c').html(sysid_numbers[12])
              $('#sysValueRead0d').html(sysid_numbers[13])
              $('#sysValueRead0e').html(sysid_numbers[14])
              $('#sysValueRead0f').html(sysid_numbers[15])
              setTimeout(function(){readbackfcnsys();},5000);
          });
}

function readbackfcnhyb()
{
    if (document.getElementById('sysidfec1').checked) {
	  hybidfec_value = document.getElementById('sysidfec1').value;
	}	
	if (document.getElementById('sysidfec2').checked) {
	  hybidfec_value = document.getElementById('sysidfec2').value;
	}
	if (document.getElementById('sysidfec3').checked) {
	  hybidfec_value = document.getElementById('sysidfec3').value;
	}
	if (document.getElementById('sysidfec4').checked) {
	  hybidfec_value = document.getElementById('sysidfec4').value;
	}
	if (document.getElementById('sysidfec5').checked) {
	  hybidfec_value = document.getElementById('sysidfec5').value;
	}
    var hybip1 = document.getElementById('date'+hybidfec_value+'ip1');
    var hybip2 = document.getElementById('date'+hybidfec_value+'ip2');
    var hybip3 = document.getElementById('date'+hybidfec_value+'ip3');
    var hybip4 = document.getElementById('date'+hybidfec_value+'ip4');
    var hybport = document.getElementById("hybport");

    var hybidhdmi0 = document.getElementById("idhdmi0");
    var hybidhdmi1 = document.getElementById("idhdmi1");
    var hybidhdmi2 = document.getElementById("idhdmi2");
    var hybidhdmi3 = document.getElementById("idhdmi3");
    var hybidhdmi4 = document.getElementById("idhdmi4");
    var hybidhdmi5 = document.getElementById("idhdmi5");
    var hybidhdmi6 = document.getElementById("idhdmi6");
    var hybidhdmi7 = document.getElementById("idhdmi7");
    var hybapvkind1 = document.getElementById("apvkind1");
    var hybapvkind2 = document.getElementById("apvkind2");
    var hybsubaddress=0;

    if (document.getElementById('idhdmi4').checked) {
       hybsubaddress = hybsubaddress + 32768;
    }
    if (document.getElementById('idhdmi5').checked) {
       hybsubaddress = hybsubaddress + 16384;
    }
    if (document.getElementById('idhdmi6').checked) {
       hybsubaddress = hybsubaddress + 8192;
    }
    if (document.getElementById('idhdmi7').checked) {
       hybsubaddress = hybsubaddress + 4096;
    }
    if (document.getElementById('idhdmi0').checked) {
       hybsubaddress = hybsubaddress + 2048;
    }
    if (document.getElementById('idhdmi1').checked) {
       hybsubaddress = hybsubaddress + 1024;
    }
    if (document.getElementById('idhdmi2').checked) {
       hybsubaddress = hybsubaddress + 512;
    }
    if (document.getElementById('idhdmi3').checked) {
       hybsubaddress = hybsubaddress + 256;
    }
    if (document.getElementById('apvkind1').checked) {
       hybsubaddress = hybsubaddress + 1;
    }
    if (document.getElementById('apvkind2').checked) {
       hybsubaddress = hybsubaddress + 2;
    }
    hybsubaddress=hybsubaddress.toString(16);
    //window.alert(hybsubaddress);

       $.get('loadvaluehyb.php?partialaddress='+hybip1.value+hybip2.value+hybip3.value+hybip4.value+hybport.value+hybsubaddress,function(rs)
          {
              $('#hybValueRead0').html('--')
	      $('#hybValueRead1').html('--')
              $('#hybValueRead2').html('--')
              $('#hybValueRead3').html('--')
              $('#hybValueRead10').html('--')
              $('#hybValueRead11').html('--')
              $('#hybValueRead12').html('--')
              $('#hybValueRead13').html('--')
              $('#hybValueRead14').html('--')
              $('#hybValueRead15').html('--')
              $('#hybValueRead16').html('--')
              $('#hybValueRead18').html('--')
              $('#hybValueRead19').html('--')
              $('#hybValueRead1a').html('--')
              $('#hybValueRead1b').html('--')
              $('#hybValueRead1c').html('--')
              $('#hybValueRead1d').html('--')
              var hybid_numbers = JSON.parse(rs);            
              $('#hybValueRead0').html(hybid_numbers[0])
	      $('#hybValueRead1').html(hybid_numbers[1])
              $('#hybValueRead2').html(hybid_numbers[2])
              $('#hybValueRead3').html(hybid_numbers[3])
              $('#hybValueRead10').html(hybid_numbers[4])
              $('#hybValueRead11').html(hybid_numbers[5])
              $('#hybValueRead12').html(hybid_numbers[6])
              $('#hybValueRead13').html(hybid_numbers[7])
              $('#hybValueRead14').html(hybid_numbers[8])
              $('#hybValueRead15').html(hybid_numbers[9])
              $('#hybValueRead16').html(hybid_numbers[10])
              $('#hybValueRead18').html(hybid_numbers[11])
              $('#hybValueRead19').html(hybid_numbers[12])
              $('#hybValueRead1a').html(hybid_numbers[13])
              $('#hybValueRead1b').html(hybid_numbers[14])
              $('#hybValueRead1c').html(hybid_numbers[15])
              $('#hybValueRead1d').html(hybid_numbers[16])
              setTimeout(function(){readbackfcnhyb();},5000);
          });
}

function readbackfcnadc()
{
    if (document.getElementById('sysidfec1').checked) {
	  adcidfec_value = document.getElementById('sysidfec1').value;
	}	
	if (document.getElementById('sysidfec2').checked) {
	  adcidfec_value = document.getElementById('sysidfec2').value;
	}
	if (document.getElementById('sysidfec3').checked) {
	  adcidfec_value = document.getElementById('sysidfec3').value;
	}
	if (document.getElementById('sysidfec4').checked) {
	  adcidfec_value = document.getElementById('sysidfec4').value;
	}
	if (document.getElementById('sysidfec5').checked) {
	  adcidfec_value = document.getElementById('sysidfec5').value;
	}
        //window.alert(adcidfec_value);
    var adcip1 = document.getElementById('date'+adcidfec_value+'ip1');
    var adcip2 = document.getElementById('date'+adcidfec_value+'ip2');
    var adcip3 = document.getElementById('date'+adcidfec_value+'ip3');
    var adcip4 = document.getElementById('date'+adcidfec_value+'ip4');

	var adcport = document.getElementById("adcport");

       $.get('loadvalueadc.php?partialaddress='+adcip1.value+adcip2.value+adcip3.value+adcip4.value+adcport.value,function(rs)
          {
              $('#adcValueRead0').html('--')
	      $('#adcValueRead1').html('--')
              $('#adcValueRead2').html('--')
              $('#adcValueRead3').html('--')
              $('#adcValueRead10').html('--')
              $('#adcValueRead11').html('--')
              $('#adcValueRead12').html('--')
              var adcid_numbers = JSON.parse(rs);            
              $('#adcValueRead0').html(adcid_numbers[0])
	      $('#adcValueRead1').html(adcid_numbers[1])
              $('#adcValueRead2').html(adcid_numbers[2])
              $('#adcValueRead3').html(adcid_numbers[3])
              $('#adcValueRead10').html(adcid_numbers[4])
              $('#adcValueRead11').html(adcid_numbers[5])
              $('#adcValueRead12').html(adcid_numbers[6])
              setTimeout(function(){readbackfcnadc();},4000);
          });
}

function readbackfcnapz()
{

    if (document.getElementById('sysidfec1').checked) {
	  apzidfec_value = document.getElementById('sysidfec1').value;
	}	
	if (document.getElementById('sysidfec2').checked) {
	  apzidfec_value = document.getElementById('sysidfec2').value;
	}
	if (document.getElementById('sysidfec3').checked) {
	  apzidfec_value = document.getElementById('sysidfec3').value;
	}
	if (document.getElementById('sysidfec4').checked) {
	  apzidfec_value = document.getElementById('sysidfec4').value;
	}
	if (document.getElementById('sysidfec5').checked) {
	  apzidfec_value = document.getElementById('sysidfec5').value;
	}

	if (document.getElementById('idhdmi0').checked) {
	  apzidhdmi_value = 0;
	}
        if (document.getElementById('idhdmi1').checked) {
	  apzidhdmi_value = 1;
	}	
	if (document.getElementById('idhdmi2').checked) {
	  apzidhdmi_value = 2;
	}
	if (document.getElementById('idhdmi3').checked) {
	  apzidhdmi_value = 3;
	}
	if (document.getElementById('idhdmi4').checked) {
	  apzidhdmi_value = 4;
	}
	if (document.getElementById('idhdmi5').checked) {
	  apzidhdmi_value = 5;
	}
	if (document.getElementById('idhdmi6').checked) {
	  apzidhdmi_value = 6;
	}
	if (document.getElementById('idhdmi7').checked) {
	  apzidhdmi_value = 7;
	}
	if (document.getElementById('apvkind1').checked) {
	  apzidhdmi_value = apzidhdmi_value*2;
	}
	if (document.getElementById('apvkind2').checked) {
	  apzidhdmi_value = apzidhdmi_value*2+1;
	}

    var apzip1 = document.getElementById('date'+apzidfec_value+'ip1');
    var apzip2 = document.getElementById('date'+apzidfec_value+'ip2');
    var apzip3 = document.getElementById('date'+apzidfec_value+'ip3');
    var apzip4 = document.getElementById('date'+apzidfec_value+'ip4');
    var apzport = document.getElementById("apzport");

       $.get('loadvalueapz.php?partialaddress='+apzip1.value+apzip2.value+apzip3.value+apzip4.value+apzport.value+twodig(apzidhdmi_value),function(rs)
          {
             $('#apzValueReadAPZ_0').html('--')
	      $('#apzValueReadAPZ_1').html('--')
	      $('#apzValueReadAPZ_2').html('--')
	      $('#apzValueReadAPZ_3').html('--')
	      $('#apzValueReadAPZ_4').html('--')
 	      $('#apzValueReadAPZ_5').html('--')
 	      $('#apzValueReadAPZ_6').html('--')
 	      $('#apzValueReadAPZ_7').html('--')
 	      $('#apzValueReadAPZ_8').html('--')
 	      $('#apzValueReadAPZ_9').html('--')
              $('#apzValueReadAPZ_10').html('--')
	      $('#apzValueReadAPZ_11').html('--')
	      $('#apzValueReadAPZ_12').html('--')
	      $('#apzValueReadAPZ_13').html('--')
	      $('#apzValueReadAPZ_14').html('--')
 	      $('#apzValueReadAPZ_15').html('--')
 	      $('#apzValueReadAPZ_16').html('--')
 	      $('#apzValueReadAPZ_17').html('--')
 	      $('#apzValueReadAPZ_18').html('--')
 	      $('#apzValueReadAPZ_19').html('--')
              $('#apzValueReadAPZ_20').html('--')
	      $('#apzValueReadAPZ_21').html('--')
	      $('#apzValueReadAPZ_22').html('--')
	      $('#apzValueReadAPZ_23').html('--')
	      $('#apzValueReadAPZ_24').html('--')
 	      $('#apzValueReadAPZ_25').html('--')
 	      $('#apzValueReadAPZ_26').html('--')
 	      $('#apzValueReadAPZ_27').html('--')
 	      $('#apzValueReadAPZ_28').html('--')
 	      $('#apzValueReadAPZ_29').html('--')
              $('#apzValueReadAPZ_30').html('--')
	      $('#apzValueReadAPZ_31').html('--')
	      $('#apzValueReadAPZ_32').html('--')
	      $('#apzValueReadAPZ_33').html('--')
	      $('#apzValueReadAPZ_34').html('--')
 	      $('#apzValueReadAPZ_35').html('--')
 	      $('#apzValueReadAPZ_36').html('--')
 	      $('#apzValueReadAPZ_37').html('--')
 	      $('#apzValueReadAPZ_38').html('--')
 	      $('#apzValueReadAPZ_39').html('--')
              $('#apzValueReadAPZ_40').html('--')
	      $('#apzValueReadAPZ_41').html('--')
	      $('#apzValueReadAPZ_42').html('--')
	      $('#apzValueReadAPZ_43').html('--')
	      $('#apzValueReadAPZ_44').html('--')
 	      $('#apzValueReadAPZ_45').html('--')
 	      $('#apzValueReadAPZ_46').html('--')
 	      $('#apzValueReadAPZ_47').html('--')
 	      $('#apzValueReadAPZ_48').html('--')
 	      $('#apzValueReadAPZ_49').html('--')
              $('#apzValueReadAPZ_50').html('--')
	      $('#apzValueReadAPZ_51').html('--')
	      $('#apzValueReadAPZ_52').html('--')
	      $('#apzValueReadAPZ_53').html('--')
	      $('#apzValueReadAPZ_54').html('--')
 	      $('#apzValueReadAPZ_55').html('--')
 	      $('#apzValueReadAPZ_56').html('--')
 	      $('#apzValueReadAPZ_57').html('--')
 	      $('#apzValueReadAPZ_58').html('--')
 	      $('#apzValueReadAPZ_59').html('--')
              $('#apzValueReadAPZ_60').html('--')
	      $('#apzValueReadAPZ_61').html('--')
	      $('#apzValueReadAPZ_62').html('--')
	      $('#apzValueReadAPZ_63').html('--')
	      $('#apzValueReadAPZ_64').html('--')
 	      $('#apzValueReadAPZ_65').html('--')
 	      $('#apzValueReadAPZ_66').html('--')
 	      $('#apzValueReadAPZ_67').html('--')
 	      $('#apzValueReadAPZ_68').html('--')
 	      $('#apzValueReadAPZ_69').html('--')
              $('#apzValueReadAPZ_70').html('--')
	      $('#apzValueReadAPZ_71').html('--')
	      $('#apzValueReadAPZ_72').html('--')
	      $('#apzValueReadAPZ_73').html('--')
	      $('#apzValueReadAPZ_74').html('--')
 	      $('#apzValueReadAPZ_75').html('--')
 	      $('#apzValueReadAPZ_76').html('--')
 	      $('#apzValueReadAPZ_77').html('--')
 	      $('#apzValueReadAPZ_78').html('--')
 	      $('#apzValueReadAPZ_79').html('--')
              $('#apzValueReadAPZ_80').html('--')
	      $('#apzValueReadAPZ_81').html('--')
	      $('#apzValueReadAPZ_82').html('--')
	      $('#apzValueReadAPZ_83').html('--')
	      $('#apzValueReadAPZ_84').html('--')
 	      $('#apzValueReadAPZ_85').html('--')
 	      $('#apzValueReadAPZ_86').html('--')
 	      $('#apzValueReadAPZ_87').html('--')
 	      $('#apzValueReadAPZ_88').html('--')
 	      $('#apzValueReadAPZ_89').html('--')
              $('#apzValueReadAPZ_90').html('--')
	      $('#apzValueReadAPZ_91').html('--')
	      $('#apzValueReadAPZ_92').html('--')
	      $('#apzValueReadAPZ_93').html('--')
	      $('#apzValueReadAPZ_94').html('--')
 	      $('#apzValueReadAPZ_95').html('--')
 	      $('#apzValueReadAPZ_96').html('--')
 	      $('#apzValueReadAPZ_97').html('--')
 	      $('#apzValueReadAPZ_98').html('--')
 	      $('#apzValueReadAPZ_99').html('--')
              $('#apzValueReadAPZ_100').html('--')
	      $('#apzValueReadAPZ_101').html('--')
	      $('#apzValueReadAPZ_102').html('--')
	      $('#apzValueReadAPZ_103').html('--')
	      $('#apzValueReadAPZ_104').html('--')
 	      $('#apzValueReadAPZ_105').html('--')
 	      $('#apzValueReadAPZ_106').html('--')
 	      $('#apzValueReadAPZ_107').html('--')
 	      $('#apzValueReadAPZ_108').html('--')
 	      $('#apzValueReadAPZ_109').html('--')
              $('#apzValueReadAPZ_110').html('--')
	      $('#apzValueReadAPZ_111').html('--')
	      $('#apzValueReadAPZ_112').html('--')
	      $('#apzValueReadAPZ_113').html('--')
	      $('#apzValueReadAPZ_114').html('--')
 	      $('#apzValueReadAPZ_115').html('--')
 	      $('#apzValueReadAPZ_116').html('--')
 	      $('#apzValueReadAPZ_117').html('--')
 	      $('#apzValueReadAPZ_118').html('--')
 	      $('#apzValueReadAPZ_119').html('--')
              $('#apzValueReadAPZ_120').html('--')
	      $('#apzValueReadAPZ_121').html('--')
	      $('#apzValueReadAPZ_122').html('--')
	      $('#apzValueReadAPZ_123').html('--')
	      $('#apzValueReadAPZ_124').html('--')
 	      $('#apzValueReadAPZ_125').html('--')
 	      $('#apzValueReadAPZ_126').html('--')
 	      $('#apzValueReadAPZ_127').html('--')
              var apzid_numbers = JSON.parse(rs);            
              $('#apzValueReadAPZ_0').html(apzid_numbers[0])
	      $('#apzValueReadAPZ_1').html(apzid_numbers[16])
	      $('#apzValueReadAPZ_2').html(apzid_numbers[32])
	      $('#apzValueReadAPZ_3').html(apzid_numbers[48])
	      $('#apzValueReadAPZ_4').html(apzid_numbers[64])
 	      $('#apzValueReadAPZ_5').html(apzid_numbers[80])
 	      $('#apzValueReadAPZ_6').html(apzid_numbers[96])
 	      $('#apzValueReadAPZ_7').html(apzid_numbers[112])
 	      $('#apzValueReadAPZ_8').html(apzid_numbers[4])
 	      $('#apzValueReadAPZ_9').html(apzid_numbers[20])
              $('#apzValueReadAPZ_10').html(apzid_numbers[36])
	      $('#apzValueReadAPZ_11').html(apzid_numbers[52])
	      $('#apzValueReadAPZ_12').html(apzid_numbers[68])
	      $('#apzValueReadAPZ_13').html(apzid_numbers[84])
	      $('#apzValueReadAPZ_14').html(apzid_numbers[100])
 	      $('#apzValueReadAPZ_15').html(apzid_numbers[116])
 	      $('#apzValueReadAPZ_16').html(apzid_numbers[8])
 	      $('#apzValueReadAPZ_17').html(apzid_numbers[24])
 	      $('#apzValueReadAPZ_18').html(apzid_numbers[40])
 	      $('#apzValueReadAPZ_19').html(apzid_numbers[56])
              $('#apzValueReadAPZ_20').html(apzid_numbers[72])
	      $('#apzValueReadAPZ_21').html(apzid_numbers[88])
	      $('#apzValueReadAPZ_22').html(apzid_numbers[104])
	      $('#apzValueReadAPZ_23').html(apzid_numbers[120])
	      $('#apzValueReadAPZ_24').html(apzid_numbers[12])
 	      $('#apzValueReadAPZ_25').html(apzid_numbers[28])
 	      $('#apzValueReadAPZ_26').html(apzid_numbers[44])
 	      $('#apzValueReadAPZ_27').html(apzid_numbers[60])
 	      $('#apzValueReadAPZ_28').html(apzid_numbers[76])
 	      $('#apzValueReadAPZ_29').html(apzid_numbers[92])
              $('#apzValueReadAPZ_30').html(apzid_numbers[108])
	      $('#apzValueReadAPZ_31').html(apzid_numbers[124])
	      $('#apzValueReadAPZ_32').html(apzid_numbers[1])
	      $('#apzValueReadAPZ_33').html(apzid_numbers[17])
	      $('#apzValueReadAPZ_34').html(apzid_numbers[33])
 	      $('#apzValueReadAPZ_35').html(apzid_numbers[49])
 	      $('#apzValueReadAPZ_36').html(apzid_numbers[65])
 	      $('#apzValueReadAPZ_37').html(apzid_numbers[81])
 	      $('#apzValueReadAPZ_38').html(apzid_numbers[97])
 	      $('#apzValueReadAPZ_39').html(apzid_numbers[113])
              $('#apzValueReadAPZ_40').html(apzid_numbers[5])
	      $('#apzValueReadAPZ_41').html(apzid_numbers[21])
	      $('#apzValueReadAPZ_42').html(apzid_numbers[37])
	      $('#apzValueReadAPZ_43').html(apzid_numbers[53])
	      $('#apzValueReadAPZ_44').html(apzid_numbers[69])
 	      $('#apzValueReadAPZ_45').html(apzid_numbers[85])
 	      $('#apzValueReadAPZ_46').html(apzid_numbers[101])
 	      $('#apzValueReadAPZ_47').html(apzid_numbers[117])
 	      $('#apzValueReadAPZ_48').html(apzid_numbers[9])
 	      $('#apzValueReadAPZ_49').html(apzid_numbers[25])
              $('#apzValueReadAPZ_50').html(apzid_numbers[41])
	      $('#apzValueReadAPZ_51').html(apzid_numbers[57])
	      $('#apzValueReadAPZ_52').html(apzid_numbers[73])
	      $('#apzValueReadAPZ_53').html(apzid_numbers[89])
	      $('#apzValueReadAPZ_54').html(apzid_numbers[105])
 	      $('#apzValueReadAPZ_55').html(apzid_numbers[121])
 	      $('#apzValueReadAPZ_56').html(apzid_numbers[13])
 	      $('#apzValueReadAPZ_57').html(apzid_numbers[29])
 	      $('#apzValueReadAPZ_58').html(apzid_numbers[45])
 	      $('#apzValueReadAPZ_59').html(apzid_numbers[61])
              $('#apzValueReadAPZ_60').html(apzid_numbers[77])
	      $('#apzValueReadAPZ_61').html(apzid_numbers[93])
	      $('#apzValueReadAPZ_62').html(apzid_numbers[109])
	      $('#apzValueReadAPZ_63').html(apzid_numbers[125])
	      $('#apzValueReadAPZ_64').html(apzid_numbers[2])
 	      $('#apzValueReadAPZ_65').html(apzid_numbers[18])
 	      $('#apzValueReadAPZ_66').html(apzid_numbers[34])
 	      $('#apzValueReadAPZ_67').html(apzid_numbers[50])
 	      $('#apzValueReadAPZ_68').html(apzid_numbers[66])
 	      $('#apzValueReadAPZ_69').html(apzid_numbers[82])
              $('#apzValueReadAPZ_70').html(apzid_numbers[98])
	      $('#apzValueReadAPZ_71').html(apzid_numbers[114])
	      $('#apzValueReadAPZ_72').html(apzid_numbers[6])
	      $('#apzValueReadAPZ_73').html(apzid_numbers[22])
	      $('#apzValueReadAPZ_74').html(apzid_numbers[38])
 	      $('#apzValueReadAPZ_75').html(apzid_numbers[54])
 	      $('#apzValueReadAPZ_76').html(apzid_numbers[70])
 	      $('#apzValueReadAPZ_77').html(apzid_numbers[86])
 	      $('#apzValueReadAPZ_78').html(apzid_numbers[102])
 	      $('#apzValueReadAPZ_79').html(apzid_numbers[118])
              $('#apzValueReadAPZ_80').html(apzid_numbers[10])
	      $('#apzValueReadAPZ_81').html(apzid_numbers[26])
	      $('#apzValueReadAPZ_82').html(apzid_numbers[42])
	      $('#apzValueReadAPZ_83').html(apzid_numbers[58])
	      $('#apzValueReadAPZ_84').html(apzid_numbers[74])
 	      $('#apzValueReadAPZ_85').html(apzid_numbers[90])
 	      $('#apzValueReadAPZ_86').html(apzid_numbers[106])
 	      $('#apzValueReadAPZ_87').html(apzid_numbers[122])
 	      $('#apzValueReadAPZ_88').html(apzid_numbers[14])
 	      $('#apzValueReadAPZ_89').html(apzid_numbers[30])
              $('#apzValueReadAPZ_90').html(apzid_numbers[46])
	      $('#apzValueReadAPZ_91').html(apzid_numbers[62])
	      $('#apzValueReadAPZ_92').html(apzid_numbers[78])
	      $('#apzValueReadAPZ_93').html(apzid_numbers[94])
	      $('#apzValueReadAPZ_94').html(apzid_numbers[110])
 	      $('#apzValueReadAPZ_95').html(apzid_numbers[126])
 	      $('#apzValueReadAPZ_96').html(apzid_numbers[3])
 	      $('#apzValueReadAPZ_97').html(apzid_numbers[19])
 	      $('#apzValueReadAPZ_98').html(apzid_numbers[35])
 	      $('#apzValueReadAPZ_99').html(apzid_numbers[51])
              $('#apzValueReadAPZ_100').html(apzid_numbers[67])
	      $('#apzValueReadAPZ_101').html(apzid_numbers[83])
	      $('#apzValueReadAPZ_102').html(apzid_numbers[99])
	      $('#apzValueReadAPZ_103').html(apzid_numbers[115])
	      $('#apzValueReadAPZ_104').html(apzid_numbers[7])
 	      $('#apzValueReadAPZ_105').html(apzid_numbers[23])
 	      $('#apzValueReadAPZ_106').html(apzid_numbers[39])
 	      $('#apzValueReadAPZ_107').html(apzid_numbers[55])
 	      $('#apzValueReadAPZ_108').html(apzid_numbers[71])
 	      $('#apzValueReadAPZ_109').html(apzid_numbers[87])
              $('#apzValueReadAPZ_110').html(apzid_numbers[103])
	      $('#apzValueReadAPZ_111').html(apzid_numbers[119])
	      $('#apzValueReadAPZ_112').html(apzid_numbers[11])
	      $('#apzValueReadAPZ_113').html(apzid_numbers[27])
	      $('#apzValueReadAPZ_114').html(apzid_numbers[43])
 	      $('#apzValueReadAPZ_115').html(apzid_numbers[59])
 	      $('#apzValueReadAPZ_116').html(apzid_numbers[75])
 	      $('#apzValueReadAPZ_117').html(apzid_numbers[91])
 	      $('#apzValueReadAPZ_118').html(apzid_numbers[107])
 	      $('#apzValueReadAPZ_119').html(apzid_numbers[123])
              $('#apzValueReadAPZ_120').html(apzid_numbers[15])
	      $('#apzValueReadAPZ_121').html(apzid_numbers[31])
	      $('#apzValueReadAPZ_122').html(apzid_numbers[47])
	      $('#apzValueReadAPZ_123').html(apzid_numbers[63])
	      $('#apzValueReadAPZ_124').html(apzid_numbers[79])
 	      $('#apzValueReadAPZ_125').html(apzid_numbers[95])
 	      $('#apzValueReadAPZ_126').html(apzid_numbers[111])
 	      $('#apzValueReadAPZ_127').html(apzid_numbers[127])
              setTimeout(function(){readbackfcnapz();},5000);
          });
}

function readbackfcnapzp()
{
    if (document.getElementById('sysidfec1').checked) {
	  apzidfec_value = document.getElementById('sysidfec1').value;
	}	
	if (document.getElementById('sysidfec2').checked) {
	  apzidfec_value = document.getElementById('sysidfec2').value;
	}
	if (document.getElementById('sysidfec3').checked) {
	  apzidfec_value = document.getElementById('sysidfec3').value;
	}
	if (document.getElementById('sysidfec4').checked) {
	  apzidfec_value = document.getElementById('sysidfec4').value;
	}
	if (document.getElementById('sysidfec5').checked) {
	  apzidfec_value = document.getElementById('sysidfec5').value;
	}
	if (document.getElementById('idhdmi0').checked) {
	  apzidhdmi_value = 0;
	}
        if (document.getElementById('idhdmi1').checked) {
	  apzidhdmi_value = 1;
	}	
	if (document.getElementById('idhdmi2').checked) {
	  apzidhdmi_value = 2;
	}
	if (document.getElementById('idhdmi3').checked) {
	  apzidhdmi_value = 3;
	}
	if (document.getElementById('idhdmi4').checked) {
	  apzidhdmi_value = 4;
	}
	if (document.getElementById('idhdmi5').checked) {
	  apzidhdmi_value = 5;
	}
	if (document.getElementById('idhdmi6').checked) {
	  apzidhdmi_value = 6;
	}
	if (document.getElementById('idhdmi7').checked) {
	  apzidhdmi_value = 7;
	}
	if (document.getElementById('apvkind1').checked) {
	  apzidhdmi_value = apzidhdmi_value*2;
	}
	if (document.getElementById('apvkind2').checked) {
	  apzidhdmi_value = apzidhdmi_value*2+1;
	}
    //alert(apzidhdmi_value);
    var apzip1 = document.getElementById('date'+apzidfec_value+'ip1');
    var apzip2 = document.getElementById('date'+apzidfec_value+'ip2');
    var apzip3 = document.getElementById('date'+apzidfec_value+'ip3');
    var apzip4 = document.getElementById('date'+apzidfec_value+'ip4');
    var apzport = document.getElementById("apzport");

       $.get('loadvalueapzp.php?partialaddress='+apzip1.value+apzip2.value+apzip3.value+apzip4.value+apzport.value+twodig(apzidhdmi_value),function(rs)
          {
             $('#apzValueReadAPZp_0').html('--')
	      $('#apzValueReadAPZp_1').html('--')
	      $('#apzValueReadAPZp_2').html('--')
	      $('#apzValueReadAPZp_3').html('--')
	      $('#apzValueReadAPZp_4').html('--')
 	      $('#apzValueReadAPZp_5').html('--')
 	      $('#apzValueReadAPZp_6').html('--')
 	      $('#apzValueReadAPZp_7').html('--')
 	      $('#apzValueReadAPZp_8').html('--')
 	      $('#apzValueReadAPZp_9').html('--')
              $('#apzValueReadAPZp_10').html('--')
	      $('#apzValueReadAPZp_11').html('--')
	      $('#apzValueReadAPZp_12').html('--')
	      $('#apzValueReadAPZp_13').html('--')
	      $('#apzValueReadAPZp_14').html('--')
 	      $('#apzValueReadAPZp_15').html('--')
 	      $('#apzValueReadAPZp_16').html('--')
 	      $('#apzValueReadAPZp_17').html('--')
 	      $('#apzValueReadAPZp_18').html('--')
 	      $('#apzValueReadAPZp_19').html('--')
              $('#apzValueReadAPZp_20').html('--')
	      $('#apzValueReadAPZp_21').html('--')
	      $('#apzValueReadAPZp_22').html('--')
	      $('#apzValueReadAPZp_23').html('--')
	      $('#apzValueReadAPZp_24').html('--')
 	      $('#apzValueReadAPZp_25').html('--')
 	      $('#apzValueReadAPZp_26').html('--')
 	      $('#apzValueReadAPZp_27').html('--')
 	      $('#apzValueReadAPZp_28').html('--')
 	      $('#apzValueReadAPZp_29').html('--')
              $('#apzValueReadAPZp_30').html('--')
	      $('#apzValueReadAPZp_31').html('--')
	      $('#apzValueReadAPZp_32').html('--')
	      $('#apzValueReadAPZp_33').html('--')
	      $('#apzValueReadAPZp_34').html('--')
 	      $('#apzValueReadAPZp_35').html('--')
 	      $('#apzValueReadAPZp_36').html('--')
 	      $('#apzValueReadAPZp_37').html('--')
 	      $('#apzValueReadAPZp_38').html('--')
 	      $('#apzValueReadAPZp_39').html('--')
              $('#apzValueReadAPZp_40').html('--')
	      $('#apzValueReadAPZp_41').html('--')
	      $('#apzValueReadAPZp_42').html('--')
	      $('#apzValueReadAPZp_43').html('--')
	      $('#apzValueReadAPZp_44').html('--')
 	      $('#apzValueReadAPZp_45').html('--')
 	      $('#apzValueReadAPZp_46').html('--')
 	      $('#apzValueReadAPZp_47').html('--')
 	      $('#apzValueReadAPZp_48').html('--')
 	      $('#apzValueReadAPZp_49').html('--')
              $('#apzValueReadAPZp_50').html('--')
	      $('#apzValueReadAPZp_51').html('--')
	      $('#apzValueReadAPZp_52').html('--')
	      $('#apzValueReadAPZp_53').html('--')
	      $('#apzValueReadAPZp_54').html('--')
 	      $('#apzValueReadAPZp_55').html('--')
 	      $('#apzValueReadAPZp_56').html('--')
 	      $('#apzValueReadAPZp_57').html('--')
 	      $('#apzValueReadAPZp_58').html('--')
 	      $('#apzValueReadAPZp_59').html('--')
              $('#apzValueReadAPZp_60').html('--')
	      $('#apzValueReadAPZp_61').html('--')
	      $('#apzValueReadAPZp_62').html('--')
	      $('#apzValueReadAPZp_63').html('--')
	      $('#apzValueReadAPZp_64').html('--')
 	      $('#apzValueReadAPZp_65').html('--')
 	      $('#apzValueReadAPZp_66').html('--')
 	      $('#apzValueReadAPZp_67').html('--')
 	      $('#apzValueReadAPZp_68').html('--')
 	      $('#apzValueReadAPZp_69').html('--')
              $('#apzValueReadAPZp_70').html('--')
	      $('#apzValueReadAPZp_71').html('--')
	      $('#apzValueReadAPZp_72').html('--')
	      $('#apzValueReadAPZp_73').html('--')
	      $('#apzValueReadAPZp_74').html('--')
 	      $('#apzValueReadAPZp_75').html('--')
 	      $('#apzValueReadAPZp_76').html('--')
 	      $('#apzValueReadAPZp_77').html('--')
 	      $('#apzValueReadAPZp_78').html('--')
 	      $('#apzValueReadAPZp_79').html('--')
              $('#apzValueReadAPZp_80').html('--')
	      $('#apzValueReadAPZp_81').html('--')
	      $('#apzValueReadAPZp_82').html('--')
	      $('#apzValueReadAPZp_83').html('--')
	      $('#apzValueReadAPZp_84').html('--')
 	      $('#apzValueReadAPZp_85').html('--')
 	      $('#apzValueReadAPZp_86').html('--')
 	      $('#apzValueReadAPZp_87').html('--')
 	      $('#apzValueReadAPZp_88').html('--')
 	      $('#apzValueReadAPZp_89').html('--')
              $('#apzValueReadAPZp_90').html('--')
	      $('#apzValueReadAPZp_91').html('--')
	      $('#apzValueReadAPZp_92').html('--')
	      $('#apzValueReadAPZp_93').html('--')
	      $('#apzValueReadAPZp_94').html('--')
 	      $('#apzValueReadAPZp_95').html('--')
 	      $('#apzValueReadAPZp_96').html('--')
 	      $('#apzValueReadAPZp_97').html('--')
 	      $('#apzValueReadAPZp_98').html('--')
 	      $('#apzValueReadAPZp_99').html('--')
              $('#apzValueReadAPZp_100').html('--')
	      $('#apzValueReadAPZp_101').html('--')
	      $('#apzValueReadAPZp_102').html('--')
	      $('#apzValueReadAPZp_103').html('--')
	      $('#apzValueReadAPZp_104').html('--')
 	      $('#apzValueReadAPZp_105').html('--')
 	      $('#apzValueReadAPZp_106').html('--')
 	      $('#apzValueReadAPZp_107').html('--')
 	      $('#apzValueReadAPZp_108').html('--')
 	      $('#apzValueReadAPZp_109').html('--')
              $('#apzValueReadAPZp_110').html('--')
	      $('#apzValueReadAPZp_111').html('--')
	      $('#apzValueReadAPZp_112').html('--')
	      $('#apzValueReadAPZp_113').html('--')
	      $('#apzValueReadAPZp_114').html('--')
 	      $('#apzValueReadAPZp_115').html('--')
 	      $('#apzValueReadAPZp_116').html('--')
 	      $('#apzValueReadAPZp_117').html('--')
 	      $('#apzValueReadAPZp_118').html('--')
 	      $('#apzValueReadAPZp_119').html('--')
              $('#apzValueReadAPZp_120').html('--')
	      $('#apzValueReadAPZp_121').html('--')
	      $('#apzValueReadAPZp_122').html('--')
	      $('#apzValueReadAPZp_123').html('--')
	      $('#apzValueReadAPZp_124').html('--')
 	      $('#apzValueReadAPZp_125').html('--')
 	      $('#apzValueReadAPZp_126').html('--')
 	      $('#apzValueReadAPZp_127').html('--')
              var apzid_numbers = JSON.parse(rs);            
              $('#apzValueReadAPZp_0').html(apzid_numbers[0])
	      $('#apzValueReadAPZp_1').html(apzid_numbers[16])
	      $('#apzValueReadAPZp_2').html(apzid_numbers[32])
	      $('#apzValueReadAPZp_3').html(apzid_numbers[48])
	      $('#apzValueReadAPZp_4').html(apzid_numbers[64])
 	      $('#apzValueReadAPZp_5').html(apzid_numbers[80])
 	      $('#apzValueReadAPZp_6').html(apzid_numbers[96])
 	      $('#apzValueReadAPZp_7').html(apzid_numbers[112])
 	      $('#apzValueReadAPZp_8').html(apzid_numbers[4])
 	      $('#apzValueReadAPZp_9').html(apzid_numbers[20])
              $('#apzValueReadAPZp_10').html(apzid_numbers[36])
	      $('#apzValueReadAPZp_11').html(apzid_numbers[52])
	      $('#apzValueReadAPZp_12').html(apzid_numbers[68])
	      $('#apzValueReadAPZp_13').html(apzid_numbers[84])
	      $('#apzValueReadAPZp_14').html(apzid_numbers[100])
 	      $('#apzValueReadAPZp_15').html(apzid_numbers[116])
 	      $('#apzValueReadAPZp_16').html(apzid_numbers[8])
 	      $('#apzValueReadAPZp_17').html(apzid_numbers[24])
 	      $('#apzValueReadAPZp_18').html(apzid_numbers[40])
 	      $('#apzValueReadAPZp_19').html(apzid_numbers[56])
              $('#apzValueReadAPZp_20').html(apzid_numbers[72])
	      $('#apzValueReadAPZp_21').html(apzid_numbers[88])
	      $('#apzValueReadAPZp_22').html(apzid_numbers[104])
	      $('#apzValueReadAPZp_23').html(apzid_numbers[120])
	      $('#apzValueReadAPZp_24').html(apzid_numbers[12])
 	      $('#apzValueReadAPZp_25').html(apzid_numbers[28])
 	      $('#apzValueReadAPZp_26').html(apzid_numbers[44])
 	      $('#apzValueReadAPZp_27').html(apzid_numbers[60])
 	      $('#apzValueReadAPZp_28').html(apzid_numbers[76])
 	      $('#apzValueReadAPZp_29').html(apzid_numbers[92])
              $('#apzValueReadAPZp_30').html(apzid_numbers[108])
	      $('#apzValueReadAPZp_31').html(apzid_numbers[124])
	      $('#apzValueReadAPZp_32').html(apzid_numbers[1])
	      $('#apzValueReadAPZp_33').html(apzid_numbers[17])
	      $('#apzValueReadAPZp_34').html(apzid_numbers[33])
 	      $('#apzValueReadAPZp_35').html(apzid_numbers[49])
 	      $('#apzValueReadAPZp_36').html(apzid_numbers[65])
 	      $('#apzValueReadAPZp_37').html(apzid_numbers[81])
 	      $('#apzValueReadAPZp_38').html(apzid_numbers[97])
 	      $('#apzValueReadAPZp_39').html(apzid_numbers[113])
              $('#apzValueReadAPZp_40').html(apzid_numbers[5])
	      $('#apzValueReadAPZp_41').html(apzid_numbers[21])
	      $('#apzValueReadAPZp_42').html(apzid_numbers[37])
	      $('#apzValueReadAPZp_43').html(apzid_numbers[53])
	      $('#apzValueReadAPZp_44').html(apzid_numbers[69])
 	      $('#apzValueReadAPZp_45').html(apzid_numbers[85])
 	      $('#apzValueReadAPZp_46').html(apzid_numbers[101])
 	      $('#apzValueReadAPZp_47').html(apzid_numbers[117])
 	      $('#apzValueReadAPZp_48').html(apzid_numbers[9])
 	      $('#apzValueReadAPZp_49').html(apzid_numbers[25])
              $('#apzValueReadAPZp_50').html(apzid_numbers[41])
	      $('#apzValueReadAPZp_51').html(apzid_numbers[57])
	      $('#apzValueReadAPZp_52').html(apzid_numbers[73])
	      $('#apzValueReadAPZp_53').html(apzid_numbers[89])
	      $('#apzValueReadAPZp_54').html(apzid_numbers[105])
 	      $('#apzValueReadAPZp_55').html(apzid_numbers[121])
 	      $('#apzValueReadAPZp_56').html(apzid_numbers[13])
 	      $('#apzValueReadAPZp_57').html(apzid_numbers[29])
 	      $('#apzValueReadAPZp_58').html(apzid_numbers[45])
 	      $('#apzValueReadAPZp_59').html(apzid_numbers[61])
              $('#apzValueReadAPZp_60').html(apzid_numbers[77])
	      $('#apzValueReadAPZp_61').html(apzid_numbers[93])
	      $('#apzValueReadAPZp_62').html(apzid_numbers[109])
	      $('#apzValueReadAPZp_63').html(apzid_numbers[125])
	      $('#apzValueReadAPZp_64').html(apzid_numbers[2])
 	      $('#apzValueReadAPZp_65').html(apzid_numbers[18])
 	      $('#apzValueReadAPZp_66').html(apzid_numbers[34])
 	      $('#apzValueReadAPZp_67').html(apzid_numbers[50])
 	      $('#apzValueReadAPZp_68').html(apzid_numbers[66])
 	      $('#apzValueReadAPZp_69').html(apzid_numbers[82])
              $('#apzValueReadAPZp_70').html(apzid_numbers[98])
	      $('#apzValueReadAPZp_71').html(apzid_numbers[114])
	      $('#apzValueReadAPZp_72').html(apzid_numbers[6])
	      $('#apzValueReadAPZp_73').html(apzid_numbers[22])
	      $('#apzValueReadAPZp_74').html(apzid_numbers[38])
 	      $('#apzValueReadAPZp_75').html(apzid_numbers[54])
 	      $('#apzValueReadAPZp_76').html(apzid_numbers[70])
 	      $('#apzValueReadAPZp_77').html(apzid_numbers[86])
 	      $('#apzValueReadAPZp_78').html(apzid_numbers[102])
 	      $('#apzValueReadAPZp_79').html(apzid_numbers[118])
              $('#apzValueReadAPZp_80').html(apzid_numbers[10])
	      $('#apzValueReadAPZp_81').html(apzid_numbers[26])
	      $('#apzValueReadAPZp_82').html(apzid_numbers[42])
	      $('#apzValueReadAPZp_83').html(apzid_numbers[58])
	      $('#apzValueReadAPZp_84').html(apzid_numbers[74])
 	      $('#apzValueReadAPZp_85').html(apzid_numbers[90])
 	      $('#apzValueReadAPZp_86').html(apzid_numbers[106])
 	      $('#apzValueReadAPZp_87').html(apzid_numbers[122])
 	      $('#apzValueReadAPZp_88').html(apzid_numbers[14])
 	      $('#apzValueReadAPZp_89').html(apzid_numbers[30])
              $('#apzValueReadAPZp_90').html(apzid_numbers[46])
	      $('#apzValueReadAPZp_91').html(apzid_numbers[62])
	      $('#apzValueReadAPZp_92').html(apzid_numbers[78])
	      $('#apzValueReadAPZp_93').html(apzid_numbers[94])
	      $('#apzValueReadAPZp_94').html(apzid_numbers[110])
 	      $('#apzValueReadAPZp_95').html(apzid_numbers[126])
 	      $('#apzValueReadAPZp_96').html(apzid_numbers[3])
 	      $('#apzValueReadAPZp_97').html(apzid_numbers[19])
 	      $('#apzValueReadAPZp_98').html(apzid_numbers[35])
 	      $('#apzValueReadAPZp_99').html(apzid_numbers[51])
              $('#apzValueReadAPZp_100').html(apzid_numbers[67])
	      $('#apzValueReadAPZp_101').html(apzid_numbers[83])
	      $('#apzValueReadAPZp_102').html(apzid_numbers[99])
	      $('#apzValueReadAPZp_103').html(apzid_numbers[115])
	      $('#apzValueReadAPZp_104').html(apzid_numbers[7])
 	      $('#apzValueReadAPZp_105').html(apzid_numbers[23])
 	      $('#apzValueReadAPZp_106').html(apzid_numbers[39])
 	      $('#apzValueReadAPZp_107').html(apzid_numbers[55])
 	      $('#apzValueReadAPZp_108').html(apzid_numbers[71])
 	      $('#apzValueReadAPZp_109').html(apzid_numbers[87])
              $('#apzValueReadAPZp_110').html(apzid_numbers[103])
	      $('#apzValueReadAPZp_111').html(apzid_numbers[119])
	      $('#apzValueReadAPZp_112').html(apzid_numbers[11])
	      $('#apzValueReadAPZp_113').html(apzid_numbers[27])
	      $('#apzValueReadAPZp_114').html(apzid_numbers[43])
 	      $('#apzValueReadAPZp_115').html(apzid_numbers[59])
 	      $('#apzValueReadAPZp_116').html(apzid_numbers[75])
 	      $('#apzValueReadAPZp_117').html(apzid_numbers[91])
 	      $('#apzValueReadAPZp_118').html(apzid_numbers[107])
 	      $('#apzValueReadAPZp_119').html(apzid_numbers[123])
              $('#apzValueReadAPZp_120').html(apzid_numbers[15])
	      $('#apzValueReadAPZp_121').html(apzid_numbers[31])
	      $('#apzValueReadAPZp_122').html(apzid_numbers[47])
	      $('#apzValueReadAPZp_123').html(apzid_numbers[63])
	      $('#apzValueReadAPZp_124').html(apzid_numbers[79])
 	      $('#apzValueReadAPZp_125').html(apzid_numbers[95])
 	      $('#apzValueReadAPZp_126').html(apzid_numbers[111])
 	      $('#apzValueReadAPZp_127').html(apzid_numbers[127])
              setTimeout(function(){readbackfcnapzp();},5000);
          });
}
