/**
 * header video module
 */
;
( (Themify,doc)=> {
    'use strict';
    const _init=(videos)=>{
        for(let i=videos.length-1;i>-1;--i){
             let videoSrc = videos[i].getAttribute('data-fullwidthvideo');
             if (videoSrc && videoSrc.indexOf('.mp4') >= 0 && videoSrc.indexOf(window.location.hostname) >= 0) {
                 let wrap=doc.createElement('div'),
                     video=doc.createElement('video');
                     wrap.className='big-video-wrap';
                     video.className='header-video video-' + i;
                     video.muted=true;
                     video.autoplay=true;
                     video.loop=true;
                     video.setAttribute('playsinline','true');
                     video.setAttribute('type','video/mp4');
                     video.setAttribute('src',videoSrc);
                     wrap.appendChild(video);
                     videos[i].insertBefore(wrap, videos[i].firstChild);
             }
        }
    };
    Themify.on('themify_theme_header_video_init',(videos)=>{
        if(videos instanceof jQuery){
           videos=videos.get();
        }
        setTimeout(()=>{
            _init(videos);
        },1500);
    });

})(Themify,document);