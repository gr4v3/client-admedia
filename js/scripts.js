/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
window.onresize = function() {
  var container = document.getElementsByClassName('fullheight');
    if (container.length && window.innerWidth < window.innerHeight) {
        var element = container[0];
        console.log(element);
            element.style.cssText = 'min-height:' + window.innerHeight + 'px;';
    } else if (container.length) {
        var element = container[0];
         element.style.cssText = '';
    }
};


(function() {
    window.onresize();
})();

