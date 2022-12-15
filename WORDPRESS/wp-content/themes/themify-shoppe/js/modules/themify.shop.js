;
( ($, Themify, win, doc, fwVars, themeVars)=> {
    'use strict';
    const svgs = {},
            ThemifyShop = {
                v: null,
                url: null,
                js_url: null,
                css_url: null,
                bodyCl: null,
                init(ThemifyTheme) {
                    this.v = ThemifyTheme.v;
                    this.url = ThemifyTheme.url;
                    this.js_url = this.url + 'js/modules/wc/';
                    this.css_url = this.url + 'styles/wc/modules/';
                    this.bodyCl = ThemifyTheme.bodyCl;
                    this.sideMenu();
                    this.wcAjaxInit();
                    this.events();
                    this.initProductSlider();
                    this.initWishlist();
                    setTimeout(()=>{this.clicks();this.initThemibox();}, 1000);
                    if (this.bodyCl.contains('single-product')) {
                        this.singleProductSlider();
                        setTimeout(()=>{this.plusMinus();}, 800);
                    }
                    this.pluginCompatibility();
                },
                events() {
                    Themify.body
                            .on('infiniteloaded.themify', this.initProductSlider.bind(this))
                            .on('keyup', 'input.qty', function () {
                                const el = $(this),
                                        max_qty = parseInt(el.attr('max'), 10);
                                if (el.val() > max_qty) {
                                    el.val(max_qty);
                                }
                            });
                    Themify
                            .on('themify_theme_spark', (item, options)=> {
                                this.clickToSpark(item, options);
                            })
                            .on('themiboxloaded',  (container)=> {
                                if ($.fn.prettyPhoto) {
                                    // Run WooCommerce PrettyPhoto after Themibox is loaded
                                    $(".thumbnails a[data-rel^='prettyPhoto']", container).prettyPhoto({
                                        hook: 'data-rel',
                                        social_tools: false,
                                        theme: 'pp_woocommerce',
                                        horizontal_padding: 20,
                                        opacity: .8,
                                        deeplinking: false
                                    });
                                    Themify.trigger('single_slider_loaded');
                                } else {
                                    if(!this.singleProductSlider(container)){
                                    Themify.trigger('single_slider_loaded');
                                    }
                                    this.plusMinus(container);
                                }
                            });
                },
                clickToSpark(item, options) {
                    if (themeVars['sparkling_color'] !== undefined) {
                        if (!options) {
                            options = {};
                        }
                        if (!options['text']) {
                            options['text'] = 'ti-shopping-cart';
                        }
                        let isWorking = false;
                        const path = this.url + 'images/' + options['text'] + '.svg',
                                callback =  () =>{
                                    if (!isWorking && win['clickSpark'] && svgs[path]) {
                                        isWorking = true;
                                        options = Object.assign({
                                            duration: 300,
                                            count: 30,
                                            speed: 8,
                                            type: 'splash',
                                            rotation: 0,
                                            size: 10
                                        }, options);
                                        clickSpark.setParticleImagePath(svgs[path]);
                                        clickSpark.setParticleDuration(options['duration']);
                                        clickSpark.setParticleCount(options['count']);
                                        clickSpark.setParticleSpeed(options['speed']);
                                        clickSpark.setAnimationType(options['type']);
                                        clickSpark.setParticleRotationSpeed(options['rotation']);
                                        clickSpark.setParticleSize(options['size']);
                                        clickSpark.fireParticles(item);
                                    }
                                },
                                getImage =  ()=> {
                                    if (svgs[path]) {
                                        callback();
                                    } else {
                                        fetch(path)
                                                .then(r => r.text())
                                                .then(text => {
                                                    const color = themeVars.sparkling_color;
                                                    if (color !== '#dcaa2e') {
                                                        text = text.replace('#dcaa2e', color);
                                                    }
                                                    svgs[path] = 'data:image/svg+xml;base64,' + win.btoa(text);
                                                    callback();
                                                });
                                    }
                                };
                        if (win['clickSpark'] !== undefined) {
                            getImage();
                        } else {
                            Themify.LoadAsync(this.js_url + 'clickspark.min.js', getImage, '1.0', null, ()=> {
                                return !!win['clickSpark'];
                            });
                        }
                    }
                },
                initWishlist() {
                    if (themeVars['wishlist'] !== undefined) {
                        const self = this,
                                getCookie = ()=> {
                                    const cookie = ' ' + doc.cookie,
                                            search = ' ' + themeVars['wishlist'].cookie + '=',
                                            setStr = [];
                                    if (cookie.length > 0) {
                                        let offset = cookie.indexOf(search);
                                        if (offset !== -1) {
                                            offset += search.length;
                                            let end = cookie.indexOf(';', offset);
                                            if (end === -1) {
                                                end = cookie.length;
                                            }
                                            const arr = JSON.parse(unescape(cookie.substring(offset, end)));
                                            for (let x in arr) {
                                                setStr.push(arr[x]);
                                            }
                                        }
                                    }
                                    return setStr;
                                };
                        setTimeout(() =>{
                            // Assign/Reassign wishlist buttons based on cookie
                            const wb = doc.getElementsByClassName('wishlist-button'),
                                    cookies = getCookie(),
                                    icon = doc.querySelector('.wishlist .icon-menu-count'),
                                    total = cookies.length;
                            for (let k = wb.length - 1; k > -1; --k) {
                                wb[k].classList.toggle('wishlisted', cookies.includes(parseInt(wb[k].dataset.id)));
                            }
                            // Update wishlist count
                            if (icon) {
                                icon.classList.toggle('wishlist_empty', total === 0);
                                icon.textContent = total;
                            }
                        }, 1500);
                        if (self.bodyCl.contains('wishlist-page')) {
                            $.ajax({
                                url: fwVars.ajax_url,
                                data: {
                                    action: 'themify_load_wishlist_page'
                                },
                                success(resp) {
                                    if (resp) {
                                        doc.getElementsByClassName('page-content')[0].insertAdjacentHTML('beforeend', resp);
                                    }
                                }
                            });
                        }
                        Themify.body.on('click.tf_wishlist', '.wishlisted,.wishlist-button', function (e) {
                            e.preventDefault();
                            e.stopImmediatePropagation();
                            const el = $(this);
                            Themify.LoadAsync(self.js_url + 'themify.wishlist.js',()=> {
                                Themify.body.off('click.tf_wishlist');
                                el.click();
                            }, self.v);
                        });
                    }
                },
                singleProductSlider(container) {
                    if (!container) {
                        container = doc;
                    }
                    const items = container.getElementsByClassName('woocommerce-product-gallery__wrapper')[0];
                    if (items && items.getElementsByClassName('tf_swiper-container')[0]) {
                        Themify.LoadAsync(this.js_url + 'single-slider.js', ()=> {
                                Themify.jsLazy['theme_single_slider_js'] = true;
                                Themify.trigger('themify_theme_product_single_slider', items);
                            },
                            this.v,
                            null,
                            ()=>{
                                return !!Themify.jsLazy['theme_single_slider_js'];
                        });
                        return true;
                    }
                    else{
                            return false;
                    }
                },
                plusMinus(el) {
                    el = el ? el : Themify.body[0];
                    const items = el.querySelectorAll('#minus1,#add1');
                    for (let i = items.length - 1; i > -1; --i) {
                        items[i].addEventListener('click', function (e) {
                            e.preventDefault();
                            e.stopPropagation();
                            const input = this.closest('form').getElementsByClassName('qty')[0];
                            if (input) {
                                let v = (input.value) * 1;
                                const min = parseInt(input.min),
                                        step = input.step > 0 ? parseInt(input.step) : 1,
                                        max = parseInt(input.max);
                                v -= (this.id === 'minus1' ? step : -1 * (step));
                                if (v < min) {
                                    v = min;
                                } else if (!isNaN(max) && v > max) {
                                    v = max;
                                }
                                input.value = v;
                            }
                        });
                    }
                },
                initProductSlider() {
                    if (!this.bodyCl.contains('wishlist-page')) {
                        const items = doc.getElementsByClassName('product-slider'),
                                ev = Themify.isTouch ? 'touchstart' : 'mouseover',
                                self = this;
                        for (let i = items.length - 1; i > -1; --i) {
                            if (items[i].hasAttribute('data-product-slider') && !items[i].classList.contains('slider_attached') && !items[i].classList.contains('hovered')) {
                                items[i].className += ' slider_attached';
                                items[i].addEventListener(ev, function () {
                                    if (!this.classList.contains('hovered')) {
                                        const _this = this;
                                        this.classList.add('hovered');
                                        
                                        Themify.LoadAsync(self.js_url + 'slider.js', ()=> {
                                                Themify.jsLazy['theme_slider'] = true;
                                                Themify.trigger('themify_theme_product_slider', [_this]);
                                            },
                                            self.v,
                                            null,
                                            ()=> {
                                            return !!Themify.jsLazy['theme_slider'];
                                        });
                                    }
                                }, {passive: true, once: true});
                            }
                        }
                        Themify.on('infiniteloaded.themify', this.initProductSlider.bind(this), true);
                    }
                },
                initThemibox() {
                    if (Themify.jsLazy['theme_quick_look'] === undefined) {
                        const self = this;
                        Themify.body.one('click', '.themify-lightbox', function (e) {
                            e.preventDefault();
                            if (!Themify.jsLazy['theme_quick_look']) {
                                Themify.jsLazy['theme_quick_look'] = true;
                                const _this = this;
                                Themify.LoadAsync(self.js_url + 'themibox.js', ()=>{
                                    Themify.trigger('themify_theme_themibox_run',[_this]);
                                }, self.v);
                            }
                        });
                    }
                },
                clicks() {
                    // reply review
                    let items = doc.getElementsByClassName('reply-review');
                    for (let i = items.length - 1; i > -1; --i) {
                        items[i].addEventListener('click', function (e) {
                            e.preventDefault();
                            $('#respond').slideToggle('slow');
                        });
                    }
                    // add review
                    items = doc.getElementsByClassName('add-reply-js');
                    for (let i = items.length - 1; i > -1; --i) {
                        items[i].addEventListener('click', function (e) {
                            e.preventDefault();
                            $(this).hide();
                            $('#respond').slideDown('slow');
                            $('#cancel-comment-reply-link').show();
                        });
                    }
                    items = doc.getElementById('cancel-comment-reply-link');
                    if (items !== null) {
                        items.addEventListener('click', function (e) {
                            e.preventDefault();
                            $(this).hide();
                            $('#respond').slideUp();
                            $('.add-reply-js').show();
                        });
                    }
                },
                wcAjaxInit() {
                    if (typeof wc_add_to_cart_params !== 'undefined') {
                        Themify.LoadAsync(this.js_url + 'ajax_to_cart.js', null, this.v);
                    }
                },
                sideMenu() {
                    if (null === doc.getElementById('slide-cart')) {
                        return;
                    }
                    const self = this;
                    let isLoad = false;
                    Themify.sideMenu(doc.querySelectorAll('#cart-link,#cart-link-mobile-link'), {
                        panel: '#slide-cart',
                        close: '#cart-icon-close',
                        beforeShow() {
                            if (isLoad === false) {
                                if (doc.getElementById('cart-wrap')) {
                                    this.panelVisible = true;
                                    Themify.LoadCss(self.css_url + 'basket.css', self.v, null, null, ()=> {
                                        isLoad = true;
                                        this.panelVisible = false;
                                        this.showPanel();
                                    });
                                }
                            }
                        }
                    });
                },
                pluginCompatibility() {
                    // compatibility with plugins
                    if (doc.querySelector('.loops-wrapper.products')) {
                        const events = {'wpf_form': 'wpf_ajax_success', 'yit-wcan-container': 'yith-wcan-ajax-filtered'};
                        for (let k in events) {
                            if (doc.getElementsByClassName(k)[0]) {
                                $(doc).on(events[k], ()=> {
                                    this.initProductSlider();
                                });
                            }
                        }
                    }
                }
            };

    //Remove brackets
    for (let items = doc.querySelectorAll('.widget_product_categories .count'), i = items.length - 1; i > -1; --i) {
        items[i].textContent = items[i].textContent.replace('(', '').replace(')', '');
    }
    Themify.on('themify_theme_shop_init', (ThemifyTheme)=> {
        ThemifyShop.init(ThemifyTheme);
    }, true);


})(jQuery, Themify, window, document, themify_vars, themifyScript);