/*
 * Themify Wishlist Plugin
 */
(function ($,Themify,themeVars) {
    'use strict';
    const ThemifyWishilist = {
        cookie: themeVars.wishlist.cookie,
        expires: Date.prototype.toUTCString.call( new Date( themeVars.wishlist.expiration * 1000 ) ),
        path: themeVars.wishlist.cookie_path,
        domain: themeVars.wishlist.domain,
        init() {
            this.addCart();
            this.removeCart();
        },
        isCookieEnabled() {
            return navigator.cookieEnabled;
        },
        getTotal() {
            return this.getCookie().length;
        },
        getCookie() {
            const cookie = ' ' + document.cookie,
                    search = ' ' + this.cookie + '=',
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
        },
        delCookie() {
            document.cookie = this.cookie + "=" + "; expires=Thu, 01 Jan 1970 00:00:01 GMT;path=" + this.path + ";SameSite=strict";
        },
        removeItem(value) {
            value = parseInt(value);
            const cookies = this.getCookie(),
                index = cookies.indexOf(value);
            if (index !== -1) {
                cookies.splice(index, 1);
                this.setCookie(cookies);
                return true;
            }
            return false;
        },
        setValue(value) {
            value = parseInt(value);
            const cookies = this.getCookie();
            if (cookies.indexOf(value)=== -1) {
                cookies.push(value);
                this.setCookie(cookies);
                return true;
            }
            return false;
        },
        setCookie(cookies) {
            document.cookie = this.cookie + '=' + JSON.stringify(cookies) +
                '; expires=' + this.expires +
                '; path=' + this.path +';';
        },
        response(item, count, remove) {
            const total = count ? count : this.getTotal(),
                el = $('.wishlist .icon-menu-count');
			if(el.length>0){
				if (total > 0) {
					el.removeClass('wishlist_empty');
				}
				else {
					el.addClass('wishlist_empty');
				}
				el.replaceWith(el[0].outerHTML);
				$('.wishlist .icon-menu-count').text(total);
			}
			if (remove) {
                if ($('#wishlist-wrapper').length > 0) {
                    item.closest('.product').fadeOut(function () {
                        $(this).remove();
                        if ($('.wishlisted').length === 0) {
                            $('#wishlist-wrapper').html('<p class="themify_wishlist_no_items ti-heart-broken">' + themeVars.wishlist.no_items + '</p>');
                        }
                    });
                }
            }
            const items = Themify.body[0].querySelectorAll('.wishlist-button[data-id="'+item.data('id')+'"]');
            if(items.length>0){
                for(let i=items.length-1;i>-1;i--){
                    if(remove){
                        items[i].classList.remove('wishlisted');
                    }else{
                        items[i].className+=' wishlisted';
                    }
                }
            }
            //Set ClickSpark events//
            Themify.trigger('themify_theme_spark',[item,{'text':'ti-heart','duration':500,'type':'explosion','rotation':20}]);
        },
        addCart() {
            const self = this;

            Themify.body.on('click', '.wishlist-button', function (e) {
                e.preventDefault();
                if ($(this).hasClass('wishlisted')) {
                    return;
                }
                const item = $(this),
                    item_id = item.data('id');
                if (self.isCookieEnabled()) {
                    if (self.setValue(item_id)) {
                        self.response(item, false, false);
                    }
                }
                else {
                    //trying to set cookie by php
                    $.ajax({
                        url: themify_vars.ajaxurl,
                        data : {
                            action : "themify_add_wishlist",
                            id : item_id
                        },
                        success(resp) {
                            if (resp) {
                                self.response(item, resp, false);
                            }
                        }
                    });
                }
            });
        },
        removeCart() {
            const self = this;
            Themify.body.on('click','.wishlisted',  function (e) {
                e.preventDefault();
                const item = $(this);
                if (self.isCookieEnabled()) {
                    if (self.removeItem($(this).data('id'))) {
                        self.response(item, false, true);
                    }
                }
                else {
                    //trying to set cookie by php
                    $.ajax({
                        url: themify_vars.ajaxurl,
                        data: {
                                action : 'themify_add_wishlist',
                                id : item.data( 'id' ),
                                type : 'remove'
                        },
                        success(resp) {
                            self.response(item, resp, true);
                        }
                    });
                }

            });
        }
    };
    ThemifyWishilist.init();

})(jQuery,Themify,themifyScript);
