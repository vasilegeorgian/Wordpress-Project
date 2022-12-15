( (Themify )=>{

	Themify.on( 'builder_load_module_partial', ( el, type, isLazy )=>{
		if ( (isLazy === true && ! el[0].classList.contains( 'module-products' )) ||  Themify.is_builder_active){
                    return;
                }
		const items = Themify.selectWithParent( 'module-products', el );
		for ( let i = items.length-1; i > -1; --i ) {
                    let button = items[i].getElementsByClassName( 'load-more-button' )[0];
                    if ( button ) {
                            let options = {
                                    button : button
                                };
                            let wrap = items[i].getElementsByClassName( 'loops-wrapper' )[0];
                            if(wrap.classList.contains('tb_ajax_pagination')){
                                    options.id='[data-id="'+wrap.dataset.id+'"]';
                                    options.scrollThreshold=false;
                            }
                            Themify.infinity( wrap, options );
                    }
		}
	});

} )(Themify );