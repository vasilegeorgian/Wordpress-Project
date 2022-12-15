/**
 * Module Product Gallery
 */
;
( ($, doc, Themify)=>{
    'use strict';
    let isFormInit = null;
    const cssUrl = themifyScript.wc_css_url,
        ver=themify_vars.theme_v,
        loadCss = ()=> {
        return new Promise((resolve, reject) => {
            const checkLoad = ()=> {
                 if (Themify.cssLazy['theme_single_slider_css'] === true && Themify.cssLazy['theme_swiper_css'] === true && Themify.jsLazy['tf_tc']===true) {
                    resolve();
                }
            };
            if (!Themify.cssLazy['theme_swiper_css']) {
                Themify.LoadCss(Themify.cssUrl + Themify.css_modules.sw.u, Themify.css_modules.sw.v, null, null, ()=> {
                    Themify.cssLazy['theme_swiper_css'] = true;
                    checkLoad();
                });
            }
            if (!Themify.cssLazy['theme_single_slider_css']) {
                Themify.LoadCss(cssUrl + 'single/slider.css', ver, null, null, ()=> {
                    Themify.cssLazy['theme_single_slider_css'] = true;
                    checkLoad();
                });
            }
            if(!Themify.jsLazy['tf_tc']){
                Themify.on('tf_carousel_init', checkLoad,true).InitCarousel('load');
            }
            checkLoad();
        });
    },
    zoomInit =  (item)=> {
        const items = item.getElementsByClassName('zoom');
        for (let i = items.length - 1; i > -1; --i) {
            items[i].addEventListener('click', function (e) {
                if (!this.hasAttribute('data-zoom-init')) {
                    this.setAttribute('data-zoom-init', true);
                    Themify.LoadAsync(themify_vars.theme_url + '/js/modules/wc/zoom.js',  ()=>{
                        Themify.jsLazy['theme_product_zoom'] = true;
                        Themify.trigger('themify_theme_product_zoom', [this, e]);
                    }, ver, null,  ()=> {
                        return !!Themify.jsLazy['theme_product_zoom'];
                    });
                }
            },{passive:true});
        }
    };
    Themify.on('themify_theme_product_single_slider',  (item)=> {
        
        const items = item.getElementsByClassName('tf_swiper-container'),
                main = items[0],
                thumbs = items[1];
        setTimeout( ()=> {
            zoomInit(main);
        }, 800);
        
        loadCss().then(() =>{
			if (main.getElementsByClassName('tf_swiper-slide').length <= 1) {
				const arr=[main,thumbs];
				for(let i=arr.length-1;i>-1;--i){
					if(arr[i]){
						arr[i].classList.add('tf_swiper-container-initialized');
						arr[i].classList.remove('tf_hidden');
						Themify.lazyScroll(arr[i].querySelectorAll('[data-lazy]'), true);
					}
				}
                Themify.trigger('single_slider_loaded');
				return;
			}
            Themify.imagesLoad(thumbs,  (el)=> {
                Themify.InitCarousel(el, {
                    direction: 'vertical',
                    visible: 'auto',
                    height: 'auto',
                    wrapvar: false
                });
            })
            .imagesLoad(main,  (el)=> {
                Themify.InitCarousel(el, {
                    slider_nav: false,
                    pager: false,
                    wrapvar: false,
                    height: 'auto',
                    thumbs: thumbs,
                    onInit() {
                        /* when using Product Image module in Builder Pro, use the closest Row as the container */
                        const container = this.el.closest('.module-product-image') ? this.el.closest('.themify_builder_row') : this.el.closest('.product'),
                                form = isFormInit === null ? container.getElementsByClassName('variations_form')[0] : null;
                        if (form) {
                            const _this = this;
                            let isInit = null;
                            // Variation zoom carousel fix for Additional Variation Images by WooCommerce Addon
                            if (typeof wc_additional_variation_images_local === 'object') {
                                isFormInit = true;
                                $(form).on('wc_additional_variation_images_frontend_image_swap_callback', function (e, response) {
                                    if (isInit === true) {
                                        const tmp = doc.createElement('div');
                                        tmp.innerHTML = response.main_images;
                                        Themify.LoadAsync(themify_vars.theme_url + '/js/modules/wc/additional_variations_images.js', ()=>{
                                            Themify.jsLazy['theme_product_additional_variations'] = true;
                                            galleryThumbs.destroy(true, true);
                                            _this.destroy(true, true);
                                            Themify.trigger('themify_theme_additional_variations_images_init', [tmp.getElementsByClassName('woocommerce-product-gallery__image'), main, thumbs]);

                                        },
                                                ver, null, ()=>{
                                                    return !!Themify.jsLazy['theme_product_additional_variations'];
                                                });
                                    }
                                }).on('found_variation hide_variation', function (e) {
                                    if (e.type === 'hide_variation') {
                                        if (isInit === true) {
                                            $(this).off('hide_variation');
                                        }
                                    } else {
                                        isInit = true;
                                    }
                                });
                            } else {

                                const mainImage = this.el.getElementsByTagName('img')[0],
                                        thumbImage = thumbs.getElementsByTagName('img')[0],
                                        cloneMain = mainImage.cloneNode(false),
                                        cloneThumb = thumbImage.cloneNode(false),
                                        zoomUrl = mainImage.parentNode.getAttribute('data-zoom-image');
                                $(form).on('found_variation', function (e, v) {
                                    Themify.LoadCss(cssUrl + 'reset-variations.css', ver);
                                    const images = v.image;
                                    if (typeof images.full_src === 'string') {
                                        isInit = true;
                                        const zoomed = mainImage.closest('.zoom');
                                        if (zoomed) {
                                            $(zoomed).trigger('zoom.destroy')[0].removeAttribute('data-zoom-init');
                                            zoomed.setAttribute('data-zoom-image', images.full_src);
                                        }
                                        mainImage.setAttribute('src', (images.src ? images.src : images.full_src));
                                        mainImage.setAttribute('srcset', (images.srcset ? images.srcset : ''));
                                        thumbImage.setAttribute('src', images.gallery_thumbnail_src);
                                        _this.slideTo(0, _this.params.speed);
                                    }
                                })
                                        .on('hide_variation', ()=> {
                                            if (isInit === true) {
                                                mainImage.setAttribute('src', (cloneMain.hasAttribute('src') ? cloneMain.getAttribute('src') : ''));
                                                mainImage.setAttribute('srcset', (cloneMain.hasAttribute('srcset') ? cloneMain.getAttribute('srcset') : ''));
                                                thumbImage.setAttribute('src', (cloneThumb.hasAttribute('src') ? cloneThumb.getAttribute('src') : ''));
                                                const zoomed = mainImage.closest('.zoom');
                                                if (zoomed) {
                                                    $(zoomed).trigger('zoom.destroy')[0].removeAttribute('data-zoom-init');
                                                    zoomed.setAttribute('data-zoom-image', zoomUrl);
                                                }
                                                _this.slideTo(0, _this.params.speed);
                                                isInit = null;
                                            }
                                        });
									
                            }
                            Themify.initWC(true);
                        }
						Themify.trigger('single_slider_loaded');
                    }
                });
            });
        });
    });

})(jQuery, document, Themify);
