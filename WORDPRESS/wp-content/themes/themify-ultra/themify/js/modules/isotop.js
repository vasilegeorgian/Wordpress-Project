/**
 * isotop module
 */
;
(($, Themify, win, doc) => {
    'use strict';
    let st = null,
            req = null,
            resizeObserver = null,
            isCalled = false,
            isSafari = null;
    const isoTopItems = [],
            sizes = {
                'list-post': 100,
                'list-large-image': 100,
                'list-thumb-image': 100,
                'grid2': 48.4,
                'grid2-thumb': 48.4,
                'grid3': 31.2,
                'grid4': 22.6,
                'grid5': 17.44,
                'grid6': 14
            },
            styles = {},
            addObserver = (el) => {
        if (win.ResizeObserver) {
            if (resizeObserver === null) {
                resizeObserver = new ResizeObserver((entries, observer) => {
                    setTimeout(() => {
                        if (isCalled === true) {
                            return;
                        }
                        if (req !== null) {
                            cancelAnimationFrame(req);
                        }
                        isCalled = true;
                        req = requestAnimationFrame(() => {
                            for (let i = entries.length - 1; i > -1; --i) {
                                if (!doc.contains(entries[i].target)) {
                                    observer.unobserve(entries[i].target);
                                } else {
                                    let wrap = entries[i].target.closest('.masonry-done');
                                    if (wrap) {
                                        let iso = win['Isotope'].data(wrap);
                                        if (iso && iso.isWorking !== true) {
                                            iso.isWorking = true;

                                            iso.once('layoutComplete', function () {
                                                this.isWorking = false;
                                            });
                                            iso.layout();
                                        }
                                    }
                                }
                            }
                            isCalled = false;
                        });
                    }, 800);
                });
            }
            setTimeout(() => {
                resizeObserver.observe(el);
            }, 300);
        } else {
            if (resizeObserver === null) {
                resizeObserver = new MutationObserver(mutationsList => {
                    if (mutationsList[0] && mutationsList[0].target && mutationsList[0].target.nodeType !== Node.TEXT_NODE) {
                        const wrap = mutationsList[0].target.closest('.masonry-done');
                        if (wrap) {
                            setTimeout(() => {
                                Themify.imagesLoad(wrap, () => {
                                    const iso = win['Isotope'].data(wrap);
                                    if (iso) {
                                        if (req !== null) {
                                            cancelAnimationFrame(req);
                                        }
                                        req = requestAnimationFrame(() => {
                                            iso.layout();
                                        });
                                    }
                                });
                            }, 1200);
                        }
                    }
                });
            }
            resizeObserver.observe(el, {
                attributes: true,
                attributeOldValue: false,
                characterDataOldValue: false,
                childList: true,
                subtree: true,
                attributeFilter: ['data-lazy', 'src', 'class']
            });
        }

    },
            reLayoutIsoTop = () => {
        if (isCalled === true) {
            return;
        }
        isCalled = true;
        if (req !== null) {
            cancelAnimationFrame(req);
        }
        req = requestAnimationFrame(() => {
            for (let i = isoTopItems.length - 1; i > -1; --i) {
                try {
                    if (isoTopItems[i].element.classList.contains('masonry-done')) {
                        if (isoTopItems[i].isWorking !== true) {
                            isoTopItems[i].isWorking = true;
                            isoTopItems[i].once('layoutComplete', function () {
                                this.isWorking = false;
                            });
                            isoTopItems[i].layout();
                        }
                    } else {
                        isoTopItems.splice(i, 1);
                    }
                } catch (er) {
                    isoTopItems.splice(i, 1);
                }
            }
            isCalled = false;
        });
    },
            init = (item, options) => {
        if (!options || typeof options !== 'object') {
            options = {
                layoutMode: item.getAttribute('data-layout'),
                gutter: item.getAttribute('data-gutter'),
                columnWidth: item.getAttribute('data-column'),
                itemSelector: item.getAttribute('data-selector'),
                fitWidth: item.getAttribute('data-fit') === '1',
                percentPosition: item.getAttribute('data-percent') !== '0'
            };
            if (options['gutter'] === '0') {
                options['gutter'] = false;
            }
            if (options['columnWidth'] === '0') {
                options['columnWidth'] = false;
            }
        }
        if (!options['layoutMode']) {
            if (item.classList.contains('packery-gallery')) {
                options['layoutMode'] = 'packery';
                options['columnWidth'] = options['gutter'] = false;
            } else if (item.classList.contains('masonry-fit-rows')) {
                options['layoutMode'] = 'fitRows';
            }
        }
        const opt = {
            originLeft: !Themify.isRTL,
            resize: false,
            containerStyle: null,
            onceLayoutComplete: options['onceLayoutComplete'],
            layoutComplete: options['layoutComplete'],
            arrangeComplete: options['arrangeComplete'],
            removeComplete: options['removeComplete'],
            filterCallback: options['filterCallback']
        },
                mode = options['layoutMode'] ? options['layoutMode'] : 'masonry';
        opt['layoutMode'] = mode;
        opt[mode] = {};
        opt[mode]['columnWidth'] = options['columnWidth'];
        opt[mode]['gutter'] = options['gutter'];
        if (!options['itemSelector']) {
            opt['itemSelector'] = item.classList.contains('products') ? '.products>.product' : (item.classList.contains('gallery-wrapper') ? '.item' : '.loops-wrapper > .post');
        } else {
            opt['itemSelector'] = options['itemSelector'];
        }
        opt['stagger'] = options['stagger'] ? options['stagger'] : 30;
        if (options['fitWidth'] === true) {
            opt[mode]['fitWidth'] = true;
        }
        if (options['stamp']) {
            opt['stamp'] = options['stamp'];
        }
        if (options['fitWidth'] === true) {
            opt['percentPosition'] = false;
        } else {
            opt['percentPosition'] = options['percentPosition'] === undefined ? true : options['percentPosition'];
        }

        Themify.imagesLoad(item, (wrap) => {
            const postFilter = wrap.previousElementSibling;
            let size = '',
                    gutter = 0,
                    hasGutter = opt[mode]['gutter'] === false ? false : !wrap.classList.contains('no-gutter'),
                    isGutter = wrap.getElementsByClassName('gutter-sizer')[0];
            const check = Isotope.data(wrap),
                    removeGutter = () => {
                if (isGutter) {
                    isGutter.remove();
                    isGutter = false;
                }
            };
            if (check) {
                check.destroy();
                removeGutter();
            }
            if (wrap.classList.contains('auto_tiles')) {
                if (postFilter !== null && postFilter.classList.contains('post-filter')) {
                    Themify.trigger('themify_isotop_filter', [postFilter, undefined, opt['filterCallback']]);
                }
                return;
            }
            for (let cl = wrap.classList, i = cl.length - 1; i > -1; --i) {
                if (sizes[cl[i].trim()] !== undefined) {
                    size = cl[i].trim();
                    break;
                }
            }
            if (size === 'list-post' || size === 'list-large-image' || size === 'list-thumb-image') {
                if (postFilter === null || !postFilter.classList.contains('post-filter')) {
                    removeGutter();
                    return;
                }
                hasGutter = false;
            }
            if (!styles['masonry_done']) {
                styles['masonry_done'] = true;
                const stText = '.masonry>.post,.products.masonry>.product{animation-fill-mode:backwards;transition:none;animation:none;clear:none!important;margin-right:0!important;margin-left:0!important}.masonry-done{opacity:1}';
                if (st === null) {
                    st = doc.createElement('style');
                    st.innerText = stText;
                    doc.head.prepend(st);
                } else {
                    st.innerText += stText;
                }
            }
            if (hasGutter === true) {
                if (!isGutter) {
                    gutter = doc.createElement('div');
                    gutter.className = 'gutter-sizer';
                    wrap.insertBefore(gutter, wrap.firstChild);
                } else {
                    gutter = isGutter;
                }

                if (!wrap.classList.contains('tf_fluid')) {
                    let stylesText = '';
                    const isProduct = wrap.classList.contains('products'),
                            gutterSize = wrap.classList.contains('gutter-narrow') ? 1.6 : 3.2;

                    if (!styles[gutterSize + isProduct]) {
                        styles[gutterSize + isProduct] = true;
                        let sel = isProduct ? '.products' : '';
                        if (gutterSize === 1.6) {
                            sel += '.gutter-narrow';
                        }
                        if (sel !== '') {
                            sel += '>';
                        }
                        stylesText += sel + '.gutter-sizer{width:' + gutterSize + '%}';
                    }
                    if (!styles['contain']) {
                        styles['contain'] = true;
                        stylesText += '.gutter-sizer{contain:paint style size}@media (max-width:680px){.gutter-sizer{width:0}}';
                    }
                    if (stylesText) {
                        st.innerText = stylesText + st.innerText;
                    }
                }
            } else {
                removeGutter();
            }
            opt[mode]['gutter'] = gutter;
            wrap.classList.add('masonry-done', 'tf_rel');
            const iso = new Isotope(wrap, opt);
            isoTopItems.push(iso);
            addObserver(wrap);
            if (postFilter !== null && postFilter.classList.contains('post-filter')) {
                Themify.trigger('themify_isotop_filter', [postFilter, iso, opt['filterCallback']]);
            }
            iso.revealItemElements(iso.items);

            if (opt['onceLayoutComplete']) {
                iso.once('layoutComplete', opt['onceLayoutComplete']);
            }
            if (opt['layoutComplete']) {
                iso.on('layoutComplete', opt['layoutComplete']);
            }
            if (opt['arrangeComplete']) {
                iso.on('arrangeComplete', opt['arrangeComplete']);
            }
            if (opt['removeComplete']) {
                iso.on('removeComplete', opt['removeComplete']);
            }
            iso.layout();
        });

    };

    Themify.on('tf_isotop_init', (items, options) => {

        if (items.length === undefined) {
            items = [items];
        }
        for (let i = items.length - 1; i > -1; --i) {
            Themify.requestIdleCallback(() => {
                init(items[i], options);
            }, 500);
        }
    })
            .on('themify_isotop_filter', (postFilter, hasIso, callback) => {
                if (postFilter.hasAttribute('data-done')) {
                    return;
                }
                postFilter.setAttribute('data-done', 1);
                const children = postFilter.children,
                        len = children.length,
                        wrap = postFilter.nextElementSibling,
                        is_ajax = postFilter.hasAttribute('data-ajax'),
                        is_ajax_sort = true === is_ajax && postFilter.hasAttribute('data-sort');
                let count = 0;
                if (!styles['post_filter']) {
                    styles['post_filter'] = true;
                    const stylesText = '.post-filter{transition:opacity .2s ease-in-out}';
                    if (st === null) {
                        st = doc.createElement('style');
                        st.innerText = stylesText;
                        doc.head.prepend(st);
                    } else {
                        st.innerText += stylesText;
                    }
                }
                if (is_ajax === false) {
                    for (let i = len - 1; i > -1; --i) {
                        let cat = children[i].getAttribute('class').replace(/(current-cat)|(cat-item)|(-)|(active)/g, '').replace(' ', ''),
                                post = wrap.querySelector('.cat-' + cat);
                        if (post === null || post.parentNode !== wrap) {
                            children[i].style['display'] = 'none';
                            ++count;
                        } else {
                            children[i].style['display'] = '';
                        }
                    }
                }
                if ((len - count) > 1) {
                    postFilter.classList.remove('tf_opacity');
                    postFilter.style['display'] = '';
                } else {
                    postFilter.style['display'] = 'none';
                }
                if (hasIso || wrap.classList.contains('auto_tiles')) {
                    let controller;
                    const _filter = function (e) {
                        e.preventDefault();
                        postFilter.parentNode.classList.remove('tb_hide_loadmore');
                        const target = e.target.closest('.cat-item');
                        if (target) {
                            let value = '*';
                            const wrap = this.nextElementSibling;
                            if (!target.classList.contains('active')) {
                                const active = this.querySelector('.cat-item.active');
                                if (active) {
                                    active.classList.remove('active');
                                }
                                if (!target.classList.contains('cat-item-all')) {
                                    value = target.getAttribute('class').replace(/(current-cat)|(cat-item)|(-)|(active)/g, '').replace(' ', '');
                                }
                                if (!target.dataset.p) {
                                    target.dataset.p = 1;
                                }
                                if (is_ajax === true) {
                                    if (target.dataset.done) {
                                        postFilter.parentNode.classList.add('tb_hide_loadmore');
                                    }
                                    if (target.dataset.empty) {
                                        postFilter.parentNode.classList.add('tb_empty_filter');
                                    } else {
                                        postFilter.parentNode.classList.remove('tb_empty_filter');
                                    }
                                }
                                if (is_ajax === true && !target.dataset.done && !target.dataset.loading && !target.dataset.init) {
                                    target.dataset.init = true;
                                    target.dataset.loading = true;
                                    // Run Ajax and re-call this function
                                    if (wrap.parentNode.classList.contains('tf_ajax_filter_loading')) {
                                        controller.abort();
                                    } else {
                                        wrap.parentNode.classList.add('tf_ajax_filter_loading');
                                    }
                                    controller = new AbortController();
                                    const self = this,
                                            data = new FormData();
                                    data.append('action', 'themify_ajax_load_more');
                                    data.append('type', 'module');
                                    data.append('module', postFilter.dataset.el);
                                    data.append('id', postFilter.dataset.id);
                                    data.append('page', target.dataset.p);
                                    if ('*' !== value) {
                                        data.append('tax', value);
                                    }
                                    if (true === is_ajax_sort) {
                                        const order = postFilter.querySelector('.tf_ajax_sort_order.active'),
                                                orderby = postFilter.querySelector('.tf_ajax_sort_order_by .active');
                                        if (order) {
                                            data.append('order', order.dataset.type);
                                        }
                                        if (orderby) {
                                            data.append('orderby', orderby.dataset.orderBy);
                                        }
                                    }
                                    fetch(themify_vars.ajax_url, {
                                        signal: controller.signal,
                                        headers: new Headers({'X-Requested-With': 'XMLHttpRequest'}),
                                        method: 'POST',
                                        body: data
                                    })
                                            .then(response => {
                                                return response.text();
                                            })
                                            .then(html => {
                                                const doc = (new DOMParser()).parseFromString(html, 'text/html'),
                                                        container = doc.querySelector('.' + postFilter.dataset.el + ' .loops-wrapper'),
                                                        btn = doc.querySelector('.load-more-button');
                                                let childs, old;
                                                if (container !== null) {
                                                    childs = Themify.convert(container.children);
                                                    const fr = doc.createDocumentFragment(),
                                                            len = childs.length;
                                                    if (childs[0] !== undefined) {
                                                        for (let j = 0; j < len; ++j) {
                                                            childs[j].className += ' tf_opacity';
                                                            fr.appendChild(childs[j]);
                                                        }
                                                        if (postFilter.dataset.reload) {
                                                            old = wrap.querySelectorAll('.post');
                                                            delete postFilter.dataset.reload;
                                                        }
                                                        wrap.appendChild(fr);
                                                    }
                                                    if (null === btn) {
                                                        target.dataset.done = true;
                                                        postFilter.parentNode.className += ' tb_hide_loadmore';
                                                    } else if ('*' === value) {
                                                        const button = wrap.parentNode.querySelector('.load-more-button');
                                                        if (button) {
                                                            button.href = button.dataset.url;
                                                            button.dataset.page = btn.dataset.page;
                                                        }
                                                    }
                                                    if (childs.length > 0) {
                                                        target.dataset.p = parseInt(target.dataset.p) + 1;
                                                        Themify.trigger('tf_isotop_append', [{'new': childs, 'remove': old}, wrap, () => {
                                                                wrap.parentNode.classList.remove('tf_ajax_filter_loading');
                                                                _filter.bind(self)(e);
                                                            }]);
                                                    } else {
                                                        target.dataset.empty = true;
                                                        if (wrap.parentNode.querySelector('.tb_empty_filter_msg') === null) {
                                                            const empty_msg = doc.createElement('span');
                                                            empty_msg.className = 'tb_empty_filter_msg tf_hide';
                                                            empty_msg.innerText = themify_vars.nop;
                                                            wrap.parentNode.appendChild(empty_msg);
                                                        }
                                                        wrap.parentNode.classList.remove('tf_ajax_filter_loading');
                                                        _filter.bind(self)(e);
                                                    }
                                                }
                                            }).catch(err => {
                                        console.warn('Ajx filter error!', err);
                                    });
                                    return;
                                } else if (is_ajax === true && target.dataset.loading) {
                                    delete target.dataset.loading;
                                }
                                target.className += ' active';
                            } else {
                                target.classList.remove('active');
                                if (true === is_ajax_sort) {
                                    Themify.triggerEvent(postFilter.querySelector('.cat-item-all'), 'click');
                                    return;
                                }
                            }
                            if (wrap !== null) {
                                if (postFilter.hasAttribute('data-hash')) {
                                    if (target.classList.contains('active') && target.dataset.id) {
                                        location.hash = target.dataset.id;
                                    } else if (win.location.hash.indexOf(postFilter.dataset.hash) > -1) {
                                        if (win.history && win.history.pushState) {
                                            win.history.pushState('', '', win.location.pathname);
                                        } else {
                                            win.location.href = win.location.href.replace(/#.*$/, '#');
                                        }
                                    }
                                }
                                let iso = win['Isotope'].data(wrap);
                                if (wrap.classList.contains('auto_tiles')) {
                                    const posts = wrap.children;
                                    for (let i = posts.length - 1; i > -1; --i) {
                                        if (posts[i].classList.contains('post') && !posts[i].style['width']) {
                                            posts[i].style['width'] = posts[i].offsetWidth + 'px';
                                            posts[i].style['height'] = posts[i].offsetHeight + 'px';
                                        }
                                    }
                                    wrap.classList.add('masonry-done');
                                    if (!iso) {
                                        let gutter;
                                        if (Themify.w < 680) {
                                            gutter = 0;
                                        } else {
                                            gutter = win.getComputedStyle(wrap).getPropertyValue('grid-row-gap');
                                            if (gutter) {
                                                gutter = parseFloat(gutter);
                                            } else if (gutter != '0') {
                                                gutter = 5;
                                            }
                                        }
                                        iso = new Isotope(wrap, {
                                            layoutMode: 'packery',
                                            packery: {
                                                'gutter': gutter
                                            },
                                            resize: false
                                        });
                                    }
                                    if (value === '*') {
                                        const _arrange = function () {
                                            this.off('arrangeComplete', _arrange);
                                            setTimeout(() => {
                                                if (value === '*') {
                                                    const posts = this.element.children;
                                                    for (let i = posts.length - 1; i > -1; --i) {
                                                        if (posts[i].classList.contains('post')) {
                                                            posts[i].style['width'] = posts[i].style['height'] = posts[i].style['position'] = posts[i].style['left'] = posts[i].style['top'] = '';
                                                        }
                                                    }
                                                    this.element.classList.remove('masonry-done');
                                                    this.element.style['height'] = this.element.style['position'] = '';
                                                }
                                            }, 20);
                                        };
                                        iso.once('arrangeComplete', _arrange);
                                    }
                                }
                                if (iso) {
                                    if (true === is_ajax) {
                                        value = '*' === value ? '.initial-cat' : '.ajax-cat-' + value;
                                    } else {
                                        value = '*' === value ? value : '.cat-' + value.trim() + ',.cat-all';
                                    }
                                    iso.arrange({filter: (value)});
                                    if (callback) {
                                        callback.call(iso, target, value);
                                    }
                                }
                            }
                        } else if (true === is_ajax_sort) {
                            const sort = e.target.closest('.tf_ajax_sort_order') || e.target.closest('[data-order-by]') ? e.target : null;
                            if (sort !== null && !sort.classList.contains('active')) {
                                const active = sort.parentNode.querySelector('.active');
                                if (active) {
                                    active.classList.remove('active');
                                }
                                sort.className += ' active';
                                // Reset all init data
                                for (let i = len - 1; i > -1; --i) {
                                    delete children[i].dataset.init;
                                    delete children[i].dataset.done;
                                    delete children[i].dataset.p;
                                }
                                postFilter.dataset.reload = true;
                                const el = postFilter.querySelector('.cat-item.active') || postFilter.querySelector('.cat-item-all');
                                if (el) {
                                    el.classList.remove('active');
                                    Themify.triggerEvent(el, 'click');
                                }
                            }
                        }
                    };
                    postFilter.addEventListener('click', _filter);
                    const hash = win.location.hash.replace('#', '');
                    if (hash !== '' && hash !== '#') {
                        const item = postFilter.querySelector('[data-id="' + hash + '"]');
                        if (item) {
                            item.click();
                        }
                    }
                }
            }).on('tf_isotop_layout', reLayoutIsoTop)
            .on('tfsmartresize', reLayoutIsoTop)
            .on('tf_isotop_append', (items, element, callback) => {
                const len = items['new'].length,
                        container = $(element),
                        isotop = win['Isotope'] !== undefined ? win['Isotope'].data(element) : null;
                if (isSafari === null) {
                    isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
                }
                let k = 0;
                for (let i = 0; i < len; ++i) {
                    items['new'][i].style['display'] = 'none';
                    Themify.imagesLoad(items['new'][i], (el) => {
                        // Fix Srcset in safari browser
                        if (isSafari) {
                            const imgSrcset = el.querySelector('img[srcset]');
                            if (null !== imgSrcset) {
                                imgSrcset.outerHTML = imgSrcset.outerHTML;
                            }
                        }
                        ++k;
                        if (isotop) {
                            isotop.appended(el);
                        }
                        items['new'][i].classList.remove('tf_opacity');
                        if (k === len) {
                            if (isotop || container[0].classList.contains('auto_tiles')) {
                                if (container[0].classList.contains('auto_tiles')) {
                                    Themify.autoTiles(container[0]);
                                }
                                if (isotop && items['remove']) {
                                    isotop.remove(items['remove']);
                                }
                            }
                            for (let i = 0; i < len; ++i) {
                                Themify.lazyScroll(Themify.convert(Themify.selectWithParent('[data-lazy]', items['new'][i])).reverse(), true);
                            }
                            Themify.fontAwesome();
                            callback();
                        }
                    });
                }
            });

})(jQuery, Themify, window, document);
