// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

// Import Slick
import 'slick-carousel/slick/slick.min';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

if ('serviceWorker' in navigator) {
    window.addEventListener('load', function () {
        navigator.serviceWorker.register('elefant/serviceworker.js');
    });
}

//Custom code//
// import then needed Font Awesome functionality
import { library, dom } from '@fortawesome/fontawesome-svg-core';
// import the Facebook and Twitter icons
import { faFacebook, faFacebookSquare, faTwitter, faTwitterSquare, faLinkedin } from '@fortawesome/free-brands-svg-icons';
import { faDownload, faHome, faHeart, faBox, faAddressCard, faCompressArrowsAlt, faClipboardCheck, faProjectDiagram, faDesktop, faLifeRing, faChalkboardTeacher, faFileDownload, faHandsHelping, faPhone, faEnvelope, faArrowRight, faArrowLeft} from '@fortawesome/free-solid-svg-icons';

// add the imported icons to the library
library.add(faDownload, faHome, faFacebook, faFacebookSquare, faTwitter, faTwitterSquare, faLinkedin, faBox, faHeart, faAddressCard, faCompressArrowsAlt, faClipboardCheck, faProjectDiagram, faDesktop, faLifeRing, faChalkboardTeacher, faFileDownload, faHandsHelping, faPhone, faEnvelope, faArrowRight, faArrowLeft);

// tell FontAwesome to watch the DOM and add the SVGs when it detects icon markup
dom.watch();

// Load Events
jQuery(document).ready(() => routes.loadEvents());
