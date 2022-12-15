/**
 * Ajax Dropdown Search form module
 */
;
((Themify,doc)=>{
    'use strict';
    Themify.on('themify_overlay_search_init', el=>{
            let controller,
            container=el.closest('.tf_search_form');
            if(!container){
                container=doc.getElementById('searchform');
				if(!container){
					return;
				}
				container=container.closest('.tf_search_form');
            }
          const form=container.getElementsByTagName('form')[0],
            isOverlay=!!form.closest('.tf_search_overlay'),
			input=form.querySelector('input[name="s"]'),
			params=new URL(form.getAttribute('action')).searchParams,
			term=params.get('term'),
			post_type=params.get('post_type'),
            cache = {},
            result_wrapper=doc.createElement('div'),
			loader=doc.createElement('div'),
			request = new Headers({
				'Accept': 'application/json',
				'X-Requested-With': 'XMLHttpRequest'
			}),
			data = new FormData();
       
        result_wrapper.className='tf_search_result tf_w tf_box tf_hide';
		loader.className='tf_loader tf_hide';
        if (isOverlay) {
			
            container=doc.createElement('div');
            const searchWrap=doc.createElement('div'),
                close=doc.createElement('a'),
                screenReader=doc.createElement('span'),
                overlayCallback = function () {
                    container.classList.toggle('search-active', input.value.length > 0);
                };
            el.addEventListener('click', function (e) {
                e.preventDefault();
                overlayCallback();
                container.classList.add('tf_fd_in');
                input.focus();
                Themify.body[0].style.overflowY = 'hidden';
                Themify.body[0].classList.add('searchform-slidedown');
            });
            close.addEventListener('click', function (e) {
                e.preventDefault();
                overlayCallback();
                if (controller) {
                    controller.abort();
                }
				controller=null;
                container.classList.remove('tf_fd_in');
                Themify.body[0].style.overflowY = '';
                Themify.body[0].classList.remove('searchform-slidedown');
            });
            
            container.className='tf_search_lightbox tf_hide tf_w tf_box tf_opacity tf_h tf_scrollbar';
            searchWrap.className='tf_searchform_inner tf_opacity';
            close.className='tf_close_search tf_close';
            screenReader.className='screen-reader-text';
            
            close.appendChild(screenReader);
            container.appendChild(searchWrap);
            container.appendChild(close);
            form.after(container);
            searchWrap.appendChild(form);
        } 
        else{
            result_wrapper.className+=' tf_scrollbar';
			result_wrapper.setAttribute('tabindex','-1');
        }
        
        input.after(result_wrapper);
		input.before(loader);
            // Tab click event
            const set_tab = (target)=>{
                let href = target.getAttribute('href').replace('#', '');
                if (href === 'all') {
                    href = 'item';
                }
                const li = target.closest('li'),
                        all = result_wrapper.getElementsByClassName('tf_search_item');

                for (let i = all.length - 1; i > -1; --i) {
                    all[i].classList.remove('tf_fd_in');
                    all[i].classList.add('tf_fd_out');
                }
                for (let tabs = li.parentNode.children, i = tabs.length - 1; i > -1; --i) {
                    if ('LI' === tabs[i].tagName) {
                        tabs[i].classList.remove('active');
                    }
                }
                li.classList.add('active');

                setTimeout(()=> {
                    const all_b = result_wrapper.getElementsByClassName('tf_view_button'),
                            item = result_wrapper.querySelector('#tf_result_link_' + href);

                    for (let i = all_b.length - 1; i > -1; --i) {
                        all_b[i].classList.add('tf_hide');
                    }
                    if (item) {
                        item.classList.remove('tf_hide');
                    }
                    for (let i = all.length - 1; i > -1; --i) {
                        let cl = all[i].classList;
                        if (cl.contains('tf_search_' + href)) {
                            cl.remove('tf_hide', 'tf_fd_out');
                            cl.add('tf_fd_in');
                        } else {
                            cl.add('tf_hide');
                        }
                    }
                }, 401);
            },
            set_active_tab = ()=> {
                let tabId=result_wrapper.querySelector('.tf_search_tab .active a');
                if (tabId) {
                    tabId=tabId.getAttribute('href');
                    if(tabId){
                        const tab = result_wrapper.querySelector('.tf_search_tab a[href="' + tabId + '"]');
                        if (tab) {
                            set_tab(tab);
                        }
                    }
                }
            };
            result_wrapper.addEventListener('click', function (e) {
                const target = e.target;
                if (target.tagName === 'A' && target.closest('.tf_search_tab')) {
                    e.preventDefault();
                    set_tab(target);
                }
            });
			
			data.append('action', 'themify_search_autocomplete');
			data.append('post_type', post_type ? post_type : '');
			if (term) {
				data.append('term',term);
				data.append('tax', params.get('tax'));
			}
            // Search input Ajax event
            input.autocomplete = 'off';
            input.addEventListener('keyup', function (e) {
                setTimeout(()=>{
                    const v = this.value.trim();
                    if (controller) {
                        controller.abort();
                    }
                    if (!v) {
                        container.classList.remove('search-active');
                        result_wrapper.innerHTML = '';
                        return;
                    }
                                            container.classList.add('search-active');
                                            if (cache[v]) {
                                                    result_wrapper.innerHTML = cache[v];
                                                    set_active_tab();
                                                    return;
                                            }
                                            container.classList.add('tf_search_loading');
                                            data.set('s', v);
                    controller = new AbortController();
                    fetch(themify_vars.ajax_url, {signal: controller.signal, method: 'POST', headers: request, body: data})
                            .then(response=> {
                                return response.text();
                            })
                            .then(resp => {
                                if (resp) {
                                    result_wrapper.innerHTML = resp;
                                    set_active_tab();
                                    cache[v] = resp;
                                }
                            }).catch(err => {
                                if (err.name !== 'AbortError') {
                                    console.error('Uh oh, an error!', err);
                                }
                            }).
                            finally(()=>{
                                container.classList.remove('tf_search_loading');
                                controller = null;
                            });
                }, 100);
            }, {passive: true});
			
			form.classList.remove('tf_hide');
			if(input.value.trim()){
				Themify.triggerEvent(input,'keyup');
			}
    });
})(Themify,document);
