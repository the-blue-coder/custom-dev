import Helpers from './Helpers';

let $ = jQuery.noConflict();

export default class SocialNetworks
{
    constructor()
    {
        //Handle LinkedIn posts update
        $('#linkedin_update_posts').on('click', this.updateLinkedinPosts);
    }



    updateLinkedinPosts(e)
    {
        e.preventDefault();

        let thisButton = $(this);

        if (thisButton[0].hasAttribute('disabled')) { 
            return;
        }

        thisButton.attr('disabled', 'disabled');

        const done = function () {
            alert('Posts successfully updated!');
        };

        const fail = function () {
            alert('Error while updating posts, please try again.');
        }

        const always = function () {
            thisButton.removeAttr('disabled');
        };

        Helpers.doAjax('/wp-json/social-networks/update-linkedin-posts', 'POST', 'JSON', {}, done, fail, always);
    }
}