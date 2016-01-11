(function() {
    'use strict';

    Array.prototype.forEach.call(document.getElementsByClassName('nav-main__toggle'), function(toggle) {
        toggle.addEventListener('click', function() {
            this.classList.toggle('nav-main__toggle_open');
        });
    });

    Array.prototype.forEach.call(document.getElementsByClassName('post-listing__container'), function(listing) {
        listing.addEventListener('click', function(e) {
            if (e.srcElement !== listing) return;

            var list = listing.children[0];
            var scrollLeft = list.scrollLeft;
            var post = list.children[0];

            while(post.nextElementSibling && scrollLeft >= post.nextElementSibling.offsetLeft) {
                post = post.nextElementSibling;
            }

            if (post.nextElementSibling) {
                animateScrollLeft(list, post.nextElementSibling.offsetLeft, 400);
            }
        });
    });

    function animateScrollLeft(el, left, time) {
        var startTime;
        var startLeft = el.scrollLeft;
        var diffLeft = left - startLeft;

        function step(timestamp) {
            if (!startTime) {
                startTime = timestamp;
            }

            var progress = timestamp - startTime;
            var currentLeft = startLeft + (progress / time * diffLeft);

            if (currentLeft > left) {
                currentLeft = left;
            }

            el.scrollLeft = currentLeft;

            if (progress < time) {
                window.requestAnimationFrame(step);
            }
        }

        window.requestAnimationFrame(step);
    }
}());
