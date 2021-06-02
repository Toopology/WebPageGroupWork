    self.onError=null;       
    currentX = currentY = 0;         
    whichIt = null;          
            lastScrollX = 0; lastScrollY = -50;       
    NS = (document.layers) ? 1 : 0;       
    IE = (document.all) ? 1: 0;       
    <!-- STALKER CODE -->       
    function heartBeat() {       
        if(IE) { diffY = document.documentElement.scrollTop; diffX = document.documentElement.scrollLeft; }       
        if(NS) { diffY = self.pageYOffset; diffX = self.pageXOffset; }       
        if(diffY != lastScrollY) {                    percent = .1 * (diffY - lastScrollY);       
                    if(percent > 0) percent = Math.ceil(percent);       
                    else percent = Math.floor(percent);                    if(IE) document.getElementById("floater").style.pixelTop += percent;       
                    if(NS) document.getElementById("floater").top += percent;                     lastScrollY = lastScrollY + percent;       
        }       
        if(diffX != lastScrollX) {       
            percent = .1 * (diffX - lastScrollX);       
            if(percent > 0) percent = Math.ceil(percent);       
            else percent = Math.floor(percent);       
            if(IE) document.getElementById("floater").style.pixelLeft += percent;       
            if(NS) document.getElementById("floater").left += percent;       
            lastScrollX = lastScrollX + percent;       
        }           
    }    <!-- /STALKER CODE -->       
    <!-- DRAG DROP CODE -->       
    function checkFocus(x,y) {        
            stalkerx = document.getElementById("floater").pageX;       
            stalkery = document.getElementById("floater").pageY;       
            stalkerwidth = document.getElementById("floater").clip.width;       
            stalkerheight = document.getElementById("floater").clip.height;       
            if( (x > stalkerx && x < (stalkerx+stalkerwidth)) && (y > stalkery && y < (stalkery+stalkerheight))) return true;       
            else return false;       
    }    function grabIt(e) {       
        if(IE) {       
            whichIt = event.srcElement;       
            while (whichIt.id.indexOf("floater") == -1) {       
                whichIt = whichIt.parentElement;       
                if (whichIt == null) { return true; }       
            }       
            whichIt.style.pixelLeft = whichIt.offsetLeft;       
            whichIt.style.pixelTop = whichIt.offsetTop;       
            currentX = (event.clientX + document.documentElement.scrollLeft);       
               currentY = (event.clientY + document.documentElement.scrollTop);            
        } else {        
            window.captureEvents(Event.MOUSEMOVE);       
            if(checkFocus (e.pageX,e.pageY)) {        
                    whichIt = document.getElementById("floater");       
                    StalkerTouchedX = e.pageX-document.getElementById("floater").pageX;       
                    StalkerTouchedY = e.pageY-document.getElementById("floater").pageY;       
            }         }       
        return true;       
    }       
    function moveIt(e) {       
        if (whichIt == null) { return false; }       
        if(IE) {       
            newX = (event.clientX + document.documentElement.scrollLeft);       
            newY = (event.clientY + document.documentElement.scrollTop);       
            distanceX = (newX - currentX);    distanceY = (newY - currentY);            currentX = newX;    currentY = newY;       
            whichIt.style.pixelLeft += distanceX;            whichIt.style.pixelTop += distanceY;       
            if(whichIt.style.pixelTop < document.documentElement.scrollTop) whichIt.style.pixelTop = document.documentElement.scrollTop;            if(whichIt.style.pixelLeft < document.documentElement.scrollLeft) whichIt.style.pixelLeft = document.documentElement.scrollLeft;       
            if(whichIt.style.pixelLeft > document.documentElement.offsetWidth - document.documentElement.scrollLeft - whichIt.style.pixelWidth - 20) whichIt.style.pixelLeft = document.documentElement.offsetWidth - whichIt.style.pixelWidth - 20;       
            if(whichIt.style.pixelTop > document.documentElement.offsetHeight + document.documentElement.scrollTop - whichIt.style.pixelHeight - 5) whichIt.style.pixelTop = document.documentElement.offsetHeight + document.documentElement.scrollTop - whichIt.style.pixelHeight - 5;       
            event.returnValue = false;       
        } else {       
            whichIt.moveTo(e.pageX-StalkerTouchedX,e.pageY-StalkerTouchedY);       
            if(whichIt.left < 0+self.pageXOffset) whichIt.left = 0+self.pageXOffset;       
            if(whichIt.top < 0+self.pageYOffset) whichIt.top = 0+self.pageYOffset;       
            if( (whichIt.left + whichIt.clip.width) >= (window.innerWidth+self.pageXOffset-17)) whichIt.left = ((window.innerWidth+self.pageXOffset)-whichIt.clip.width)-17;       
            if( (whichIt.top + whichIt.clip.height) >= (window.innerHeight+self.pageYOffset-17)) whichIt.top = ((window.innerHeight+self.pageYOffset)-whichIt.clip.height)-17;       
            return false;       
        }       
        return false;       
    }    
    
function dropIt() {  
whichIt = null;  
if(NS) window.releaseEvents (Event.MOUSEMOVE);  
return true;}  


    if(NS || IE) action = window.setInterval("heartBeat()",1);       
