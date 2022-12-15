/* Themify Theme Scripts - https://themify.me/ */
;
(($, Themify, win, doc, fwVars, themeVars)=> {
    'use strict';
    const ThemifyTheme = {
        bodyCl: Themify.body[0].classList,
        v: fwVars.theme_v,
        headerType: themeVars.headerType,
        url: fwVars.theme_url + '/',
        init() {
            this.darkMode();
            Themify.megaMenu(doc.getElementById('main-nav'));
            this.headerRender();
            this.clickableItems();
            this.headerVideo();
            this.fixedHeader();
            this.wc();
            setTimeout(()=>{this.loadFilterCss();}, 800);
            setTimeout(()=>{this.backToTop();}, 2000);
            this.resize();
            this.doInfinite(doc.getElementById('loops-wrapper'));
            setTimeout(()=>{this.commentAnimation();}, 3500);
            this.builderActive();
            if (doc.getElementById('mc_embed_signup')) {
                Themify.LoadCss(this.url + 'styles/modules/mail_chimp.css', this.v);
            }
            this.revealingFooter();
        },
        builderActive() {
            if (Themify.is_builder_active === true) {
                Themify.LoadAsync(this.url + 'js/modules/builderActive.js', null, this.v);
            }
        },
        fixedHeader() {
            if (this.bodyCl.contains('fixed-header-enabled') && this.headerType !== 'header-bottom' && this.headerType !== 'header-leftpane' && this.headerType !== 'header-minbar' && this.headerType !== 'header-rightpane' && this.headerType !== 'header-slide-down' && this.headerType !== 'header-none' && doc.getElementById('headerwrap') !== null) {
                Themify.FixedHeader();
            }
        },
        revealingFooter() {
            if (this.bodyCl.contains('revealing-footer') && doc.getElementById('footerwrap') !== null) {
                Themify.LoadAsync(this.url + 'js/modules/revealingFooter.js', null, this.v);
            }
        },
        doInfinite(container, wpf) {
            Themify.infinity(container, {
                scrollToNewOnLoad: themeVars.scrollToNewOnLoad,
                scrollThreshold: !('auto' !== themeVars.autoInfinite),
                history: wpf || !themeVars.infiniteURL ? false : 'replace'
            });
        },
        loadFilterCss() {
            const filters = ['blur', 'grayscale', 'sepia', 'none'];
            for (let i = filters.length - 1; i > -1; --i) {
                if (doc.getElementsByClassName('filter-' + filters[i])[0] !== undefined || doc.getElementsByClassName('filter-hover-' + filters[i])[0] !== undefined) {
                    Themify.LoadCss(this.url + 'styles/modules/filters/' + filters[i] + '.css', this.v);
                }
            }
            Themify.on('infiniteloaded.themify', this.loadFilterCss.bind(this), true);
        },
        headerVideo() {
            const header = doc.getElementById('headerwrap');
            if (header) {
                const videos = Themify.selectWithParent('[data-fullwidthvideo]', header);
                if (videos.length > 0) {
                    Themify.LoadAsync(this.url + 'js/modules/headerVideo.js',  ()=> {
                        Themify.trigger('themify_theme_header_video_init', [videos]);
                    }, this.v);
                }
            }
        },
        wc() {
            if (win['woocommerce_params'] !== undefined) {
                Themify.LoadAsync(this.url + 'js/modules/themify.shop.js',  ()=>{
                    Themify.trigger('themify_theme_shop_init', this);
                }, this.v);
            }
        },
        resize() {
            if (this.headerType === 'header-menu-split') {
                Themify.on('tfsmartresize',  (e)=> {
                    if (e && e.w !== Themify.w) {
                        if ($('#menu-icon').is(':visible')) {
                            if ($('.header-bar').find('#site-logo').length === 0) {
                                $('#site-logo').prependTo('.header-bar');
                            }
                        } else if ($('.themify-logo-menu-item').find('#site-logo').length === 0) {
                            $('.themify-logo-menu-item').append($('.header-bar').find('#site-logo'));
                        }
                    }
                });
            }
        },
        clickableItems() {
            const items = doc.getElementsByClassName('toggle-sticky-sidebar');
            for (let i = items.length - 1; i > -1; --i) {
                items[i].addEventListener('click', function () {
                    const sidebar = $('#sidebar');
                    if ($(this).hasClass('open-toggle-sticky-sidebar')) {
                        $(this).removeClass('open-toggle-sticky-sidebar').addClass('close-toggle-sticky-sidebar');
                        sidebar.addClass('open-mobile-sticky-sidebar tf_scrollbar');
                    } else {
                        $(this).removeClass('close-toggle-sticky-sidebar').addClass('open-toggle-sticky-sidebar');
                        sidebar.removeClass('open-mobile-sticky-sidebar tf_scrollbar');
                    }
                }, {passive: true});
            }
            setTimeout( () =>{
                Themify.body.on('click', '.post-content', function (e) {
                    if (e.target.tagName !== 'A' && e.target.tagName !== 'BUTTON') {
                        const el = this.closest('.loops-wrapper');
                        if (el !== null) {
                            const cl = el.classList;
                            if ((cl.contains('grid6') || cl.contains('grid5') || cl.contains('grid4') || cl.contains('grid3') || cl.contains('grid2')) && (cl.contains('polaroid') || cl.contains('overlay') || cl.contains('flip'))) {
                                const link = this.closest('.post').querySelector('a[data-post-permalink]');
                                if (link && link.href) {
                                    link.click();
                                }
                            }
                        }
                    }
                });
            }, 1500);
        },
        headerRender(){
            Themify.sideMenu(doc.getElementById('menu-icon'), {
                close: '#menu-icon-close',
                side: this.headerType === 'header-minbar-left' || this.headerType === 'header-left-pane' || this.headerType === 'header-slide-left' ? 'left' : 'right'
            });
            const header_top_wdts = doc.getElementsByClassName('top-bar-widgets')[0];
            if (undefined !== fwVars.m_m_expand || header_top_wdts) {
                Themify.on('sidemenushow.themify',  (panel_id)=> {
                    if ('#mobile-menu' === panel_id) {
                        // Expand Mobile Menus
                        if (undefined !== fwVars.m_m_expand) {
                            const items = doc.querySelectorAll('#main-nav>li.has-sub-menu');
                            for (let i = items.length - 1; i > -1; i--) {
                                items[i].className += ' toggle-on';
                            }
                        }
                        // Clone Header Top widgets
                        if (header_top_wdts) {
                            const mobile_menu = doc.getElementById('main-nav-wrap');
                            mobile_menu.parentNode.insertBefore(header_top_wdts.cloneNode(true), mobile_menu.nextSibling);
                        }
                    }
                }, true);
            }
        },
        backToTop() {
            if (this.headerType === 'header-bottom') {
                const footer_tab = doc.getElementsByClassName('footer-tab')[0];
                if (footer_tab !== undefined) {
                    footer_tab.addEventListener('click', function (e) {
                        e.preventDefault();
                        const cl = this.classList,
                            footerWrap=doc.getElementById('footerwrap'),
                            closed=cl.contains('tf_close');
                            cl.toggle('ti-angle-down',closed);
                            cl.toggle('tf_close',!closed);
                            if(footerWrap){
                                footerWrap.classList.toggle('expanded',!closed);
                            }
                    });
                }
            }
            const back_top = doc.getElementsByClassName('back-top')[0];
            if (back_top !== undefined) {
                if (back_top.classList.contains('back-top-float')) {
                    const events = ['scroll'],
                            scroll = function () {
                                back_top.classList.toggle('back-top-hide',this.scrollY < 10);
                            };
                    if (Themify.isTouch) {
                        events.push('touchstart');
                        events.push('touchmove');
                    }
                    for (let i = events.length - 1; i > -1; --i) {
                        win.addEventListener(events[i], scroll, {passive: true});
                    }
                }
                back_top.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    Themify.scrollTo();
                });
            }
        },
        commentAnimation() {
            const form=doc.getElementById('commentform');
            if (form) {
                $(form).on('focus', 'input, textarea', function () {
                    $(this).one('blur', function () {
                        if (this.value === '') {
                            $(this).removeClass('filled').closest('#commentform p').removeClass('focused');
                        } else {
                            $(this).addClass('filled');
                        }
                    }).closest('#commentform p').addClass('focused');
                });
            }
        },
		setCookie( cname, cvalue, exMins ) {
			var d = new Date();
			d.setTime(d.getTime() + (exMins*60*1000));
			var expires = "expires="+d.toUTCString();  
			document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		},
		darkMode(){
			if ( themeVars.darkmode ) {
				const el = doc.getElementById( 'tf_theme_dark-mode-css' );
				if ( themeVars.darkmode.start ) {
					/* Scheduled dark mode */
					const current_date = new Date(),
						start_date = new Date(),
						end_date = new Date(),
						start = themeVars.darkmode.start.split(':'),
						end = themeVars.darkmode.end.split(':');
					start_date.setHours(start[0],start[1],0);
					if(parseInt(end[0])<parseInt(start[0])){
						end_date.setDate(end_date.getDate() + 1);
					}
					end_date.setHours(end[0],end[1],0);
					if ( current_date >= start_date && current_date < end_date ) {
						el.media = 'all';
					}
				} else {
					/* by user preference */
					let toggles = doc.getElementsByClassName( 'tf_darkmode_toggle' );
					for ( let i = toggles.length - 1; i > -1; --i ) {
						toggles[ i ].addEventListener( 'click', ( e ) => {
							e.preventDefault();
							let enabled = el.media === 'all';
							el.media = enabled ? 'none' : 'all';
							this.setCookie( 'tf_darkmode', enabled ? '' : 1, enabled ? 0 : 3 );
						} );
					}
					if ( document.cookie.indexOf( 'tf_darkmode=' ) !== -1 ) {
						el.media = 'all';
					}
				}
			}
		}
    };
    ThemifyTheme.init();
})(jQuery, Themify, window, document, themify_vars, themifyScript);

