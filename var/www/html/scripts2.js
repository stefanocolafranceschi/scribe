    //<![CDATA[

    var tabLinks = new Array();
    var contentDivs = new Array();

    function init() {

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

    $('#startreadform').ajaxForm(function() {
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
    var ip1 = document.getElementById("ip1");
    var ip2 = document.getElementById("ip2");
    var ip3 = document.getElementById("ip3");
    var ip4 = document.getElementById("ip4");
    var port = document.getElementById("port");
    var valuetowrite0 = document.getElementById("valuetowrite0");
    var valuetowrite1 = document.getElementById("valuetowrite1");
    var color0 = document.getElementById('divcolor0');
    var color1 = document.getElementById('divcolor1');

       $.get('loadvalue.php?partialaddress='+ip1.value+ip2.value+ip3.value+ip4.value+port.value,function(rs)
          {
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
              setTimeout(function(){readbackfcn();},1000);
          });
}


function readbackfcnsys()
{
    var sysip1 = document.getElementById("sysip1");
    var sysip2 = document.getElementById("sysip2");
    var sysip3 = document.getElementById("sysip3");
    var sysip4 = document.getElementById("sysip4");
    var sysport = document.getElementById("sysport");

       $.get('loadvalue.php?partialaddress='+sysip1.value+sysip2.value+sysip3.value+sysip4.value+sysport.value,function(rs)
          {
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
              setTimeout(function(){readbackfcnsys();},1000);
          });
}

function readbackfcnhyb()
{
    var hybip1 = document.getElementById("hybip1");
    var hybip2 = document.getElementById("hybip2");
    var hybip3 = document.getElementById("hybip3");
    var hybip4 = document.getElementById("hybip4");
    var hybport = document.getElementById("hybport");

       $.get('loadvaluehyb.php?partialaddress='+hybip1.value+hybip2.value+hybip3.value+hybip4.value+hybport.value,function(rs)
          {
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
              setTimeout(function(){readbackfcnhyb();},1000);
          });
}

function readbackfcnadc()
{
    var adcip1 = document.getElementById("adcip1");
    var adcip2 = document.getElementById("adcip2");
    var adcip3 = document.getElementById("adcip3");
    var adcip4 = document.getElementById("adcip4");
    var adcport = document.getElementById("adcport");

       $.get('loadvalueadc.php?partialaddress='+adcip1.value+adcip2.value+adcip3.value+adcip4.value+adcport.value,function(rs)
          {
              var adcid_numbers = JSON.parse(rs);            
              $('#adcValueRead0').html(adcid_numbers[0])
	      $('#adcValueRead1').html(adcid_numbers[1])
              $('#adcValueRead2').html(adcid_numbers[2])
              $('#adcValueRead3').html(adcid_numbers[3])
              $('#adcValueRead10').html(adcid_numbers[4])
              $('#adcValueRead11').html(adcid_numbers[5])
              $('#adcValueRead12').html(adcid_numbers[6])
              setTimeout(function(){readbackfcnadc();},1000);
          });
}

function readbackfcnapz()
{
    var apzip1 = document.getElementById("apzip1");
    var apzip2 = document.getElementById("apzip2");
    var apzip3 = document.getElementById("apzip3");
    var apzip4 = document.getElementById("apzip4");
    var apzport = document.getElementById("apzport");

       $.get('loadvalueapz.php?partialaddress='+apzip1.value+apzip2.value+apzip3.value+apzip4.value+apzport.value,function(rs)
          {
              var apzid_numbers = JSON.parse(rs);            
              $('#apzValueRead0').html(apzid_numbers[0])
	      $('#apzValueRead1').html(apzid_numbers[1])
	      $('#apzValueRead2').html(apzid_numbers[2])
	      $('#apzValueRead3').html(apzid_numbers[3])
	      $('#apzValueRead4').html(apzid_numbers[4])
 	      $('#apzValueRead5').html(apzid_numbers[5])
 	      $('#apzValueRead6').html(apzid_numbers[6])
 	      $('#apzValueRead7').html(apzid_numbers[7])
 	      $('#apzValueRead8').html(apzid_numbers[8])
 	      $('#apzValueRead9').html(apzid_numbers[9])
              $('#apzValueRead10').html(apzid_numbers[10])
	      $('#apzValueRead11').html(apzid_numbers[11])
	      $('#apzValueRead12').html(apzid_numbers[12])
	      $('#apzValueRead13').html(apzid_numbers[13])
	      $('#apzValueRead14').html(apzid_numbers[14])
 	      $('#apzValueRead15').html(apzid_numbers[15])
 	      $('#apzValueRead16').html(apzid_numbers[16])
 	      $('#apzValueRead17').html(apzid_numbers[17])
 	      $('#apzValueRead18').html(apzid_numbers[18])
 	      $('#apzValueRead19').html(apzid_numbers[19])
              $('#apzValueRead20').html(apzid_numbers[20])
	      $('#apzValueRead21').html(apzid_numbers[21])
	      $('#apzValueRead22').html(apzid_numbers[22])
	      $('#apzValueRead23').html(apzid_numbers[23])
	      $('#apzValueRead24').html(apzid_numbers[24])
 	      $('#apzValueRead25').html(apzid_numbers[25])
 	      $('#apzValueRead26').html(apzid_numbers[26])
 	      $('#apzValueRead27').html(apzid_numbers[27])
 	      $('#apzValueRead28').html(apzid_numbers[28])
 	      $('#apzValueRead29').html(apzid_numbers[29])
              $('#apzValueRead30').html(apzid_numbers[30])
	      $('#apzValueRead31').html(apzid_numbers[31])
	      $('#apzValueRead32').html(apzid_numbers[32])
	      $('#apzValueRead33').html(apzid_numbers[33])
	      $('#apzValueRead34').html(apzid_numbers[34])
 	      $('#apzValueRead35').html(apzid_numbers[35])
 	      $('#apzValueRead36').html(apzid_numbers[36])
 	      $('#apzValueRead37').html(apzid_numbers[37])
 	      $('#apzValueRead38').html(apzid_numbers[38])
 	      $('#apzValueRead39').html(apzid_numbers[39])
              $('#apzValueRead40').html(apzid_numbers[40])
	      $('#apzValueRead41').html(apzid_numbers[41])
	      $('#apzValueRead42').html(apzid_numbers[42])
	      $('#apzValueRead43').html(apzid_numbers[43])
	      $('#apzValueRead44').html(apzid_numbers[44])
 	      $('#apzValueRead45').html(apzid_numbers[45])
 	      $('#apzValueRead46').html(apzid_numbers[46])
 	      $('#apzValueRead47').html(apzid_numbers[47])
 	      $('#apzValueRead48').html(apzid_numbers[48])
 	      $('#apzValueRead49').html(apzid_numbers[49])
              $('#apzValueRead50').html(apzid_numbers[50])
	      $('#apzValueRead51').html(apzid_numbers[51])
	      $('#apzValueRead52').html(apzid_numbers[52])
	      $('#apzValueRead53').html(apzid_numbers[53])
	      $('#apzValueRead54').html(apzid_numbers[54])
 	      $('#apzValueRead55').html(apzid_numbers[55])
 	      $('#apzValueRead56').html(apzid_numbers[56])
 	      $('#apzValueRead57').html(apzid_numbers[57])
 	      $('#apzValueRead58').html(apzid_numbers[58])
 	      $('#apzValueRead59').html(apzid_numbers[59])
              $('#apzValueRead60').html(apzid_numbers[60])
	      $('#apzValueRead61').html(apzid_numbers[61])
	      $('#apzValueRead62').html(apzid_numbers[62])
	      $('#apzValueRead63').html(apzid_numbers[63])
	      $('#apzValueRead64').html(apzid_numbers[64])
 	      $('#apzValueRead65').html(apzid_numbers[65])
 	      $('#apzValueRead66').html(apzid_numbers[66])
 	      $('#apzValueRead67').html(apzid_numbers[67])
 	      $('#apzValueRead68').html(apzid_numbers[68])
 	      $('#apzValueRead69').html(apzid_numbers[69])
              $('#apzValueRead70').html(apzid_numbers[70])
	      $('#apzValueRead71').html(apzid_numbers[71])
	      $('#apzValueRead72').html(apzid_numbers[72])
	      $('#apzValueRead73').html(apzid_numbers[73])
	      $('#apzValueRead74').html(apzid_numbers[74])
 	      $('#apzValueRead75').html(apzid_numbers[75])
 	      $('#apzValueRead76').html(apzid_numbers[76])
 	      $('#apzValueRead77').html(apzid_numbers[77])
 	      $('#apzValueRead78').html(apzid_numbers[78])
 	      $('#apzValueRead79').html(apzid_numbers[79])
              $('#apzValueRead80').html(apzid_numbers[80])
	      $('#apzValueRead81').html(apzid_numbers[81])
	      $('#apzValueRead82').html(apzid_numbers[82])
	      $('#apzValueRead83').html(apzid_numbers[83])
	      $('#apzValueRead84').html(apzid_numbers[84])
 	      $('#apzValueRead85').html(apzid_numbers[85])
 	      $('#apzValueRead86').html(apzid_numbers[86])
 	      $('#apzValueRead87').html(apzid_numbers[87])
 	      $('#apzValueRead88').html(apzid_numbers[88])
 	      $('#apzValueRead89').html(apzid_numbers[89])
              $('#apzValueRead90').html(apzid_numbers[90])
	      $('#apzValueRead91').html(apzid_numbers[91])
	      $('#apzValueRead92').html(apzid_numbers[92])
	      $('#apzValueRead93').html(apzid_numbers[93])
	      $('#apzValueRead94').html(apzid_numbers[94])
 	      $('#apzValueRead95').html(apzid_numbers[95])
 	      $('#apzValueRead96').html(apzid_numbers[96])
 	      $('#apzValueRead97').html(apzid_numbers[97])
 	      $('#apzValueRead98').html(apzid_numbers[98])
 	      $('#apzValueRead99').html(apzid_numbers[99])
              $('#apzValueRead100').html(apzid_numbers[100])
	      $('#apzValueRead101').html(apzid_numbers[101])
	      $('#apzValueRead102').html(apzid_numbers[102])
	      $('#apzValueRead103').html(apzid_numbers[103])
	      $('#apzValueRead104').html(apzid_numbers[104])
 	      $('#apzValueRead105').html(apzid_numbers[105])
 	      $('#apzValueRead106').html(apzid_numbers[106])
 	      $('#apzValueRead107').html(apzid_numbers[107])
 	      $('#apzValueRead108').html(apzid_numbers[108])
 	      $('#apzValueRead109').html(apzid_numbers[109])
              $('#apzValueRead110').html(apzid_numbers[110])
	      $('#apzValueRead111').html(apzid_numbers[111])
	      $('#apzValueRead112').html(apzid_numbers[112])
	      $('#apzValueRead113').html(apzid_numbers[113])
	      $('#apzValueRead114').html(apzid_numbers[114])
 	      $('#apzValueRead115').html(apzid_numbers[115])
 	      $('#apzValueRead116').html(apzid_numbers[116])
 	      $('#apzValueRead117').html(apzid_numbers[117])
 	      $('#apzValueRead118').html(apzid_numbers[118])
 	      $('#apzValueRead119').html(apzid_numbers[119])
              $('#apzValueRead120').html(apzid_numbers[120])
	      $('#apzValueRead121').html(apzid_numbers[121])
	      $('#apzValueRead122').html(apzid_numbers[122])
	      $('#apzValueRead123').html(apzid_numbers[123])
	      $('#apzValueRead124').html(apzid_numbers[124])
 	      $('#apzValueRead125').html(apzid_numbers[125])
 	      $('#apzValueRead126').html(apzid_numbers[126])
 	      $('#apzValueRead127').html(apzid_numbers[127])
              setTimeout(function(){readbackfcnadc();},1000);
          });
}
