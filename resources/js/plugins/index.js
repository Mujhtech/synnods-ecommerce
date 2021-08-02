import Vue from 'vue';
import VModal from 'vue-js-modal';
import Notifications from 'vue-notification'
import VueNouislider from 'vue-nouislider/dist/vue-nouislider.common';
import VueAwesomeSwiper from 'vue-awesome-swiper'
import VueLazyLoad from 'vue-lazyload';
import 'vue-nouislider/dist/vue-nouislider.css';

Vue.use( VModal );
Vue.use( Notifications );
Vue.use( VueAwesomeSwiper );
Vue.use( VueNouislider );

Vue.use( VueLazyLoad, {
    preLoad: 0,
    throttleWait: 0,
    attempt: 1,
    scale: 0,
    observer: true,

    // optional
    observerOptions: {
        rootMargin: '0px',
        threshold: 0.1
    },
    adapter: {
        loaded( { bindType, el } ) {
            if ( el.nodeName === 'IMG' ) {
                handler( el );
            }
        },
        loading( listener, Init ) {
            if ( !listener.el.style.paddingTop ) {
                var padding = 100;
                var ratio = listener.el.getAttribute( 'image-ratio' );
                if ( ratio ) {
                    padding = ratio;
                } else if ( listener.el.getAttribute( 'width' ) && listener.el.getAttribute( 'height' ) )
                    padding = listener.el.getAttribute( 'height' ) / listener.el.getAttribute( 'width' ) * 100;
                if ( listener.el.nodeName === 'IMG' ) {
                    listener.el.style.paddingTop = padding + '%';
                    listener.el.style.height = 0;
                }
            }

            if ( !listener.el.style.backgroundColor && listener.el.nodeName === 'IMG' ) {
                listener.el.style.backgroundColor = '#f4f4f4';
            }
        },
    }
} );

function handler( el ) {
    let num = 0;
    let interval = window.setInterval( () => {
        if ( el.currentSrc || el.backgroundImage || num === 100 ) {
            el.removeAttribute( 'style' );
            el.classList.add( 'fade-in', 'fadeIn' );
            if ( !el.classList.contains( 'last-image' ) && !el.classList.contains( 'vue-lb-modal-image' ) ) {
                el.setAttribute( 'style', 'animation-duration: .3s; animation-delay: 0s' );
            }
            window.clearInterval( interval );
        }
        num++;
    }, 300 );
}