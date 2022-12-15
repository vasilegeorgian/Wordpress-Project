/**
 * Lightbox Themibox module
 */
;
(($,Themify, doc) =>{
    'use strict';
    let clickedItem,
        mainImg,
        product,
        wrap = doc.createElement('div'),
        container = doc.createElement('div'),
        wrapCl=wrap.classList,
        contCl=container.classList;
    const pattern = doc.createElement('div'),
        ver=themify_vars.theme_v,
        cssUrl=themifyScript.wc_css_url,
        loaded={},
        keyUp = (e)=>{
            if (e.keyCode === 27) {
                closeLightBox(e);
            }
        },
        loadCss=()=>{
            return new Promise((resolve, reject) => {
                const js=themifyScript.wc_gal,
                    checkLoad =   ()=> {
                    if (loaded['theme_single'] === true && loaded['theme_lightbox'] === true && loaded['theme_breadcrumb'] === true) {
						if(js){
							for(let k in js){
								if(loaded[k]!==true){
									return;
								}
							}
						}
						resolve();
                    }
                };
                let concateCss=doc.getElementById('themify_concate-css');
                if(concateCss){
                    concateCss=concateCss.nextElementSibling;
                }
                if( loaded['theme_single']!==true){
                    if (!Themify.body[0].classList.contains('product-single')) {
                        Themify.LoadCss(cssUrl + 'single/product.css', ver, concateCss, null,   ()=> {
                            loaded['theme_single'] = true;
                            checkLoad();
                        });
                    } else {
                        loaded['theme_single'] = true;
                    }
                }
                if( loaded['theme_lightbox']!==true){
                    Themify.LoadCss(cssUrl + 'lightbox.css', ver, null, null,  ()=> {
                        loaded['theme_lightbox'] = true;
                        checkLoad();
                    });
                }
                if( loaded['theme_breadcrumb']!==true){
                    if (doc.getElementsByClassName('woocommerce-breadcrumb').length === 0) {
                        Themify.LoadCss(cssUrl + 'breadcrumb.css', ver, concateCss, null,   ()=>  {
                            loaded['theme_breadcrumb'] = true;
                            checkLoad();
                        });
                    } else {
                        loaded['theme_breadcrumb'] = true;
                        checkLoad();
                    }
                }
				if(js){
					for(let k in js){
						if(loaded[k]!==true){
							Themify.LoadAsync(js[k].s,   ()=>  {
								loaded[k] = true;
								checkLoad();
							}, js[k].v, null,   ()=>  {
								if(k==='flexslider' || k==='zoom'){
									return $[k]!==undefined;
								}
								if(k==='photoswipe'){
									return typeof PhotoSwipe!=='undefined';
								}
								if(k==='photoswipe-ui-default'){
									return typeof PhotoSwipeUI_Default!=='undefined';
								}
								
								return !!loaded[k];
							});
						}
					}
				}
                checkLoad();
            });
        },
        closeLightBox = function(e) {
            if (e.type !== 'keyup') {
                e.preventDefault();
            }
            if (clickedItem) {
                pattern.addEventListener('transitionend', function(e) {
                    const _callback =  ()=>  {
                        wrapCl.add('tf_hide');
                        container.innerHTML = '';
                        Themify.trigger('themiboxclosed');
						Themify.body[0].classList.remove('post-lightbox');
                        doc.removeEventListener('keyup', keyUp, {
                            passive: true
                        });
                        clickedItem = mainImg = product = null;
                    };
                    Themify.body[0].classList.remove('post-lightbox');
                    if (wrapCl.contains('lightbox-message')) {
                        wrapCl.remove('lightbox-message');
                        wrap.addEventListener('transitionend', function(e) {
                            this.style['top'] = '';
                            _callback();
                        }, {
                            passive: true,
                            once: true
                        });
                        wrap.style['top'] = '150%';
                    } else {

                        wrapCl.add('lightbox_closing', 'post-lightbox-prepare');
                        const box = product.getBoundingClientRect();
                        wrap.addEventListener('transitionend', function(e) {
                            mainImg.style['display'] = '';
                            contCl.remove('tf_hidden');
                            container.style['transition'] = '';
                            this.addEventListener('transitionend', function() {
                                this.classList.remove('post-lightbox-prepare', 'lightbox_closing');
                                _callback();
                            }, {
                                passive: true,
                                once: true
                            });
                            this.style['top'] = box.top + (box.height / 2) + 'px';
                            this.style['left'] = box.left + (box.width / 2) + 'px';
                        }, {
                            passive: true,
                            once: true
                        });
                        container.style['transition'] = 'none';
                        contCl.add('tf_hidden');
                        for (let items = container.children, i = items.length - 1; i > -1; --i) {
                            if (mainImg !== items[i]) {
                                items[i].remove();
                            }
                        }

                        wrap.style['width'] = box.width + 'px';
                        wrap.style['height'] = box.height + 'px';
                    }
                    this.classList.add('tf_hide');
                }, {
                    passive: true,
                    once: true
                });
                pattern.classList.add('tf_opacity');
            }
        },
        addToBasket =  ()=>  {
            const wr = doc.createElement('div'),
                header = doc.createElement('h3'),
                close = doc.createElement('a'),
                checkout = doc.createElement('a');
            wr.className = 'tf_textc lightbox-added';
            header.textContent = themifyScript.lng.add_to;
            close.className = 'button outline';
            close.href = '#';
            close.textContent = themifyScript.lng.keep_shop;
            close.addEventListener('click', closeLightBox, {
                once: true
            });
            checkout.href = themifyScript.checkout_url;
            checkout.className = 'button checkout';
            checkout.textContent = themifyScript.lng.checkout;
            wr.appendChild(header);
            wr.appendChild(close);
            wr.appendChild(checkout);
            return wr;
        },
        clickLightBox = function(e) {
            e.preventDefault();
            if (clickedItem) {
                return false;
            }
            clickedItem=this;

            Themify.initWC(true); //start to load js files

            product = clickedItem.closest('.product,.slide-inner-wrap,.type-product');
            if(product){
                product=product.querySelector('.product-image,.post-image');
            }
            if (!product) {
                return false;
            }
            wrapCl.add('woocommerce','woo_qty_btn', 'post-lightbox-prepare', 'tf_hide');
            let url = clickedItem.href,
                imgUrl = product.getElementsByTagName('img')[0];
            if (!themify_vars.wc_js) {
                url = Themify.UpdateQueryString('load_wc', '1', url);
            }
            imgUrl = imgUrl ? imgUrl.src : clickedItem.dataset.image;
            if (!imgUrl) {
                imgUrl = themifyScript.placeholder;
            }
            mainImg = new Image();
            mainImg.src = imgUrl;
            const box = product.getBoundingClientRect();
            wrap.style['width'] = box.width + 'px';
            wrap.style['height'] = box.height + 'px';
            wrap.style['top'] = box.top + (box.height / 2) + 'px';
            wrap.style['left'] = box.left + (box.width / 2) + 'px';
            const header = new Headers({
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }),
            ajax = fetch(Themify.UpdateQueryString('post_in_lightbox', '1', url), {
                headers: header
            }).then((res) => res.text());
            
            Promise.all([mainImg.decode(), loadCss()]).then(() => {
				
                    container.appendChild(mainImg);
                    pattern.classList.remove('tf_hide');
                    wrapCl.remove('tf_hide');
                    setTimeout(  ()=>  {
                        wrap.addEventListener('transitionend', function(e) {
                            Themify.body[0].classList.add('post-lightbox');
                            pattern.classList.remove('tf_opacity');
                            contCl.add('post-lightbox-flip-infinite');
                            ajax.then(resp=> {
                                

                                Themify.on('single_slider_loaded',()=>{
									setTimeout(()=>{
											
											container.addEventListener('animationiteration', function() {
													this.classList.remove('post-lightbox-flip-infinite');
													
													wrap.addEventListener('transitionend', function(e) {
														wrap=wrapClone;
														container=cloneContainer;
														contCl=container.classList;
														wrapCl=wrap.classList;
														wrap.style['top']=wrapClone.style['left']='';
														wrapCl.remove('tf_opacity');
															wrap.previousSibling.remove();
															wrap.style['transition'] ='none';
															wrap.style['width'] = wrap.style['height'] = container.style['transition'] = '';
															if (typeof ThemifyShoppeAjaxCart === 'function') {
                                                                                                                            const form=container.querySelector('form.cart');
                                                                                                                            if(form){
																form.addEventListener('submit', ThemifyShoppeAjaxCart);
                                                                                                                            }
															}
															wrapClone=cloneContainer=null;
															contCl.remove('tf_opacity');
															doc.addEventListener('keyup', keyUp, {
																	passive: true
															});
															setTimeout(()=>{
																wrap.style['transition'] ='';
																wrap.lastElementChild.addEventListener('click', closeLightBox,{once:true});
															},10);
															
													}, {
															once: true,
															passive: true
													});
													wrap.style['transition'] ='';
													container.style['transition'] = 'none';
													contCl.add('tf_opacity');
													wrapCl.remove('post-lightbox-prepare');
													wrap.style['width'] =wrapClone.clientWidth+'px';
													wrap.style['height'] = wrapClone.clientHeight+'px';
											}, {
													passive: true,
													once: true
											});
									},15);
                                        
                                },true);
                                    
                                    
                                let wrapClone=wrap.cloneNode(true),
                                    cloneContainer=wrapClone.firstChild;
                                    cloneContainer.style['transition'] = wrapClone.style['transition'] ='none';
									cloneContainer.classList.remove('post-lightbox-flip-infinite');
									wrapClone.classList.remove('post-lightbox-prepare');
									wrapClone.classList.add('tf_opacity');
                                    wrapClone.style['top']= wrapClone.style['left']='-1000vh';
									wrapClone.style['width'] = wrapClone.style['height'] = '';
									
									mainImg=cloneContainer.getElementsByTagName('img')[0];
									mainImg.style['display'] ='none';
                                    cloneContainer.insertAdjacentHTML('beforeend', resp);
                                    wrap.after(wrapClone);

                                    Themify.fontAwesome(cloneContainer);
                                    let pswp = doc.getElementsByClassName('pswp')[0];
                                    if (!pswp) {
										pswp = cloneContainer.getElementsByClassName('pswp')[0];
										if (pswp) {
												Themify.body[0].prepend(pswp);
										}
                                    }
                                    if (Themify.cssLazy['theme_social_share'] !== true && cloneContainer.getElementsByClassName('share-wrap')[0]) {
                                        let concate=doc.getElementById('themify_concate-css');
                                        if(concate){
                                            concate=concate.nextElementSibling;
                                        }
										Themify.cssLazy['theme_social_share'] = true;
										Themify.LoadCss(cssUrl + 'social-share.css', themify_vars.theme_v, concate);
                                    }
                                    Themify.trigger('themiboxloaded', cloneContainer).initWC(true);
                            });
                        }, {
                            once: true,
                            passive: true
                        });
                        wrap.style['height'] = '';
                        wrap.style['width'] = (box.width > 180 ? 180 : box.width) + 'px';
                        wrap.style['top'] = wrap.style['left'] = '';
                    }, 15);
            })
        };
    Themify.on('themify_theme_themibox_run', (clicked) =>{
        const f = doc.createDocumentFragment(),
            close = doc.createElement('a');
        wrap.id = 'post-lightbox-wrap';
        wrap.className = 'tf_scrollbar tf_box tf_hide';
        pattern.id = 'pattern';
        pattern.className = 'tf_opacity tf_hide tf_w tf_h';
        container.id = 'post-lightbox-container';
        container.className = 'tf_box tf_w tf_h tf_overflow';
        close.className = 'close-lightbox tf_close';
        close.href = '#';
        pattern.addEventListener('click', closeLightBox);
        wrap.appendChild(container);
        wrap.appendChild(close);
        f.appendChild(wrap);
        f.appendChild(pattern);
        Themify.body.on('click', '.themify-lightbox',clickLightBox)
        .on('added_to_cart',   ()=>  {
            if (clickedItem) {
                wrapCl.add('lightbox-message');
                wrap.addEventListener('transitionend', function(e) {
                    this.style['padding'] = '';
                    container.appendChild(addToBasket());
                    this.addEventListener('transitionend', function(e) {
                        this.style['max-height'] = '';
                    }, {
                        passive: true,
                        once: true
                    });
                    this.style['max-height'] = '100%';
                }, {
                    passive: true,
                    once: true
                });
                container.innerHTML = '';
                wrap.style['padding'] = wrap.style['max-height'] = '0px';
            }
        })[0].appendChild(f);
        clicked.click();
    }, true);
})(jQuery,Themify, document);