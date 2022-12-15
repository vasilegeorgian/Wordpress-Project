/**
 * Module Product Slider
 */
;
((Themify, doc)=> {
    'use strict';
    const cssUrl = themifyScript.wc_css_url,
        loadCss =  ()=> {
                return new Promise((resolve, reject) => {
                    const checkLoad =  ()=> {
                        if (Themify.cssLazy['theme_swiper_css'] === true && Themify.cssLazy['theme_slider_css'] === true && Themify.jsLazy['tf_tc']===true) {
                            resolve();
                        }
                    };

                    if (!Themify.cssLazy['theme_slider_css']) {
                        let concat=doc.getElementById('themify_concate-css');
                        if(concat){
                            concat=concat.nextElementSibling;
                        }
                        Themify.LoadCss(cssUrl + 'slider.css', themify_vars.theme_v, concat, null,  ()=> {
                            Themify.cssLazy['theme_slider_css'] = true;
                            checkLoad();
                        });
                    }
                    if (!Themify.cssLazy['theme_swiper_css']) {
                        Themify.LoadCss(Themify.cssUrl + Themify.css_modules.sw.u, Themify.css_modules.sw.v, null, null,  ()=> {
                            Themify.cssLazy['theme_swiper_css'] = true;
                            checkLoad();
                        });
                    }
                    if(!Themify.jsLazy['tf_tc']){
                        Themify.on('tf_carousel_init', checkLoad,true).InitCarousel('load');
                    }
                    checkLoad();
                });
            };
    Themify.on('themify_theme_product_slider',  (el)=> {

        const product = el.closest('.products'),
                url = el.getAttribute('data-link'),
                f = doc.createDocumentFragment(),
                spinner = doc.createElement('span'),
                wrap = doc.createElement('div'),
                big = doc.createElement('div'),
                thumbs = doc.createElement('div'),
                big_sw = doc.createElement('div'),
                thumb_sw = doc.createElement('div');

        let w = product.getAttribute('data-width'),
                h = product.getAttribute('data-height');
        if (!w) {
            w = el.getAttribute('data-w');
        }
        if (!h) {
            h = el.getAttribute('data-h');
        }
        spinner.className = 'tf_loader';
        wrap.className = 'themify_swiper_container tf_abs tf_w tf_h tf_hidden';
        big.className = 'tf_swiper-container tf_carousel tf_swiper-container-big tf_rel tf_overflow';
        thumbs.className = 'tf_swiper-container tf_carousel tf_swiper-container-thumbs tf_w';
        big_sw.className = 'tf_swiper-wrapper tf_rel tf_w tf_h';
        thumb_sw.className = 'tf_swiper-wrapper tf_rel tf_w tf_h tf_box';


        big.appendChild(big_sw);
        thumbs.appendChild(thumb_sw);

        wrap.appendChild(big);
        wrap.appendChild(thumbs);
        el.appendChild(spinner);
        f.appendChild(wrap);
        const header = new Headers({
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        }),
                data = new FormData();
        data.append('action', 'themify_product_slider');
        data.append('slider', el.getAttribute('data-product-slider'));
        data.append('width', w);
        data.append('height', h);
        const ajax = fetch(woocommerce_params.ajax_url, {
            headers: header,
            method: 'POST',
            body: data
        }).then(res => res.json());
        Promise.all([ajax, loadCss()]).then(result => {
			result=result[0];
            if (result) {
                const top_items = doc.createDocumentFragment(),
                        thumb_items = doc.createDocumentFragment(),
                        images = result.big,
                        len = images.length;
                if (len > 0) {
                    for (let i = 0; i < len; ++i) {
                        let slide_big = doc.createElement('div'),
                                slide_thumb = doc.createElement('div'),
                                img_big = doc.createElement('img'),
                                img_thumb = doc.createElement('img');
                        slide_big.className = 'tf_swiper-slide tf_box';
                        slide_thumb.className = 'tf_swiper-slide tf_box';
                        img_big.src = images[i];
                        img_thumb.src = result.thumbs[i];
                        if (url) {
                            let link = doc.createElement('a');
                            link.href = url;
                            link.appendChild(img_big);
                            slide_big.appendChild(link);
                        } else {
                            slide_big.appendChild(img_big);
                        }
                        slide_thumb.appendChild(img_thumb);
                        top_items.appendChild(slide_big);
                        if (len > 1) {
                            thumb_items.appendChild(slide_thumb);
                        }
                    }
                    big_sw.appendChild(top_items);
                    el.appendChild(f);
                    if (len > 1) {
                        thumb_sw.appendChild(thumb_items);
                        Themify.imagesLoad(big,  (item)=> {
                            Themify.InitCarousel(thumbs, {
                                visible: 'auto',
                                lazy: false,
                                slider_nav: false,
                                pager: false,
                                wrapvar: false,
                                height: 'auto',
                                pause_hover: false
                            });
                            Themify.InitCarousel(item, {
                                slider_nav: true,
                                pager: false,
                                lazy: false,
                                wrapvar: true,
                                height: 'auto',
                                pause_hover: false,
                                thumbs: thumbs,
                                auto: 2500,
                                speed: 1500,
                                onInit() {
                                    el.classList.add('slider-finish');
                                    spinner.remove();
                                }
                            });
                        });
                    } else {
                        el.classList.add('slider-finish');
                        big.classList.add('tf_swiper-container-initialized');
                        spinner.remove();
                    }
                }
                if (len <= 1) {
                    spinner.remove();
                }
            }
        });
    });
})(Themify, document );