(function() {
    'use strict';

    Array.prototype.forEach.call(document.getElementsByClassName('nav-main__toggle'), function(toggle) {
        toggle.addEventListener('click', function() {
            this.classList.toggle('nav-main__toggle_open');
        });
    });
}());
