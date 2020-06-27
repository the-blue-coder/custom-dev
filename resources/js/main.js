import SocialNetworks from './classes/SocialNetworks';
import Arborus from './classes/Arborus';
import Events from './classes/Events';

window.$ = jQuery.noConflict();

$(document).ready(function () {
    new Arborus();
    new SocialNetworks();
    new Events();
});