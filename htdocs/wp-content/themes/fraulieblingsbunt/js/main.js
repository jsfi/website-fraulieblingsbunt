(function() {
    'use strict';

    var h = {
        each: function(elements, eachFunc) {
            return Array.prototype.forEach.call(elements, eachFunc);
        },

        filter: function(elements, filterFunc) {
            return Array.prototype.filter.call(elements, filterFunc);
        },

        throttle: function(callback, delay, no_trailing) {
            var timeout_id;
            var last_exec = 0;

            return function() {
                var that = this;
                var elapsed = +new Date() - last_exec;
                var args = arguments;

                function exec() {
                    last_exec = +new Date();
                    callback.apply( that, args );
                };

                function clear() {
                    timeout_id = undefined;
                };

                timeout_id && clearTimeout(timeout_id);

                if (elapsed > delay ) {
                    exec();
                } else if (no_trailing !== true) {
                    timeout_id = setTimeout(exec, delay - elapsed);
                }
            };
        },

        animateScrollLeft: function(el, left, time) {
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
        },

        cleanHTML: function(html, selector) {
            var replace = '<div data-tag="$1"$2>$3</div>';
            var el = document.createElement('div');
            var ret;

            html = String(html).replace(/<\!doctype[\S\s]*?>/gi, '');
            html = html.replace(/<!--[\S\s]*?-->/gi, '');
            html = html.replace(/<(meta|link)([\S\s]*?)>/gi, '');
            html = html.replace(/<(html)([\S\s]*?)>([\S\s]*?)<\/\1>/gi, replace);
            html = html.replace(/<(head|body)([\S\s]*?)>([\S\s]*?)<\/\1>/gi, replace);
            html = html.replace(/<(title|script|style)[\S\s]*?<\/\1>/gi, '');

            el.innerHTML = html;

            if (selector) {
                return el.querySelectorAll(selector);
            } else {
                ret = el.querySelectorAll('[data-tag="body"]');
                if (!ret) ret = el.children;

                return ret;
            }
        }
    }

    h.each(document.getElementsByClassName('nav-main__toggle'), function(toggle) {
        toggle.addEventListener('click', function() {
            this.classList.toggle('nav-main__toggle_open');
        });
    });

    h.each(document.getElementsByClassName('post-listing__container'), function(listingContainer) {
        var listing = h.filter(listingContainer.children, function(el) {
            return el.classList.contains('post-listing');
        });
        var pagination;
        var scrollListener;
        var secondToLast;

        if (listing.length !== 1) throw new Error('Container must have one listing');
        listing = listing[0];

        listingContainer.addEventListener('click', function(e) {
            var scrollLeft;
            var post;

            if (e.srcElement !== listingContainer) return;

            scrollLeft = listing.scrollLeft;
            post = listing.children[0];

            while(post.nextElementSibling && scrollLeft >= post.nextElementSibling.offsetLeft) {
                post = post.nextElementSibling;
            }

            if (post.nextElementSibling) {
                h.animateScrollLeft(listing, post.nextElementSibling.offsetLeft, 400);
            }
        });

        pagination = listingContainer.nextElementSibling;
        if (pagination && pagination.classList.contains('pagination') && listing.children.length > 2) {
            secondToLast = listing.children[listing.children.length - 2];
            scrollListener = h.throttle(function(e) {
                var item;
                var link;
                var url;
                var request;

                if (listing.scrollLeft > secondToLast.offsetLeft) {
                    if (pagination.dataset.loading) return;

                    pagination.dataset.loading = true;
                    item = pagination.getElementsByClassName('pagination__current');

                    if (item.length !== 1) throw new Error('Pagination must have one current item');
                    item = item[0];

                    while(item.nextElementSibling && !url) {
                        item = item.nextElementSibling;

                        if (item.dataset.loaded) continue;

                        item.dataset.loaded = true;
                        link = item.getElementsByTagName('a');

                        if (link.length !== 1) throw new Error('Pagination item must have one link');
                        link = link[0];

                        url = link.href;
                    }

                    if (url) {
                        request = new XMLHttpRequest();

                        request.onreadystatechange = function() {
                            var loaded;
                            if (request.readyState === 4) {
                                h.each(h.cleanHTML(request.responseText, '.post-listing .post'), function(item) {
                                    listing.appendChild(item);
                                });
                                pagination.dataset.loading = false;
                            }
                        }

                        request.open('Get', url);
                        request.send();
                    } else {
                        listing.removeEventListener('scroll', scrollListener);
                    }
                }
            }, 250);

            listing.addEventListener('scroll', scrollListener);
        }
    });
}());
