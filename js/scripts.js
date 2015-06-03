/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function toggleFullScreen() {
  if (!document.fullscreenElement &&    // alternative standard method
      !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {  // current working methods
    if (document.documentElement.requestFullscreen) {
      document.documentElement.requestFullscreen();
    } else if (document.documentElement.msRequestFullscreen) {
      document.documentElement.msRequestFullscreen();
    } else if (document.documentElement.mozRequestFullScreen) {
      document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullscreen) {
      document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
  }
}
function detectswipe(el,func) {
  swipe_det = new Object();
  swipe_det.sX = 0;
  swipe_det.sY = 0;
  swipe_det.eX = 0;
  swipe_det.eY = 0;
  var min_x = 50;  //min x swipe for horizontal swipe
  var max_y = 120;  //max y difference for horizontal swipe
  
  var max_x = 100;  //max x difference for vertical swipe
  var min_y = 50;  //min y swipe for vertical swipe
  
  var direc = false;
  ele = el;
  ele.addEventListener('touchstart',function(e){
    var t = e.touches[0];
    swipe_det.sX = t.screenX; 
    swipe_det.sY = t.screenY;
    return true;
  },true);
  ele.addEventListener('touchmove',function(e){
    var t = e.touches[0];
    swipe_det.eX = t.screenX; 
    swipe_det.eY = t.screenY;    
    return true;
  },true);
  ele.addEventListener('touchend',function(e){
    //horizontal detection
    if ((((swipe_det.eX - min_x > swipe_det.sX) || (swipe_det.eX + min_x < swipe_det.sX)) && ((swipe_det.eY < swipe_det.sY + max_y) && (swipe_det.sY > swipe_det.eY - max_y)))) {
      if(swipe_det.eX > swipe_det.sX) direc = "right";
      else direc = "left";
    }
    //vertical detection
    if ((((swipe_det.eY - min_y > swipe_det.sY) || (swipe_det.eY + min_y < swipe_det.sY)) && ((swipe_det.eX < swipe_det.sX + max_x) && (swipe_det.sX > swipe_det.eX - max_x)))) {
      if(swipe_det.eY > swipe_det.sY) direc = "down";
      else direc = "up";
    }

    if (direc) {
      if(typeof func === 'function') func(direc);
    }
    direc = false;
    return true;
  },true);  
}

(function() {
    toggleFullScreen();
    var menu = document.getElementsByClassName('menu');
    var menucontainer = document.getElementsByClassName('menu-container');
    var containerfluid = document.getElementsByClassName('container-fluid');
    if (menu.length && menucontainer.length && containerfluid.length) {
        menuitem = menu.item(0);
        menuitem.open = false;
        menucontaineritem = menucontainer.item(0);
        containerfluiditem = containerfluid.item(0);
        containerfluiditem.onclick = function(e) {
            var event = e || window.event;
            if (event.srcElement.parentNode === menuitem) {
                menucontaineritem.className = 'menu-container active';
                menuitem.open = true;
            } else {
                menucontaineritem.className = 'menu-container';
                menuitem.open = false;
            }
        };    
        detectswipe(document.body, function(direction) {
            switch(direction) {
                case 'right':
                        menucontaineritem.className = 'menu-container active';
                        menuitem.open = true;
                    break;
                case 'left':
                        menucontaineritem.className = 'menu-container';
                        menuitem.open = false;
                    break;
            }
        });    
    }
})();

