import Helpers from './Helpers';

export default class Init
{
    constructor()
    {
        this.globalVars();
        this.globalServices();
        this.backButtonForceReload();
        this.ajaxCSRFToken();
    }



    globalVars()
    {
        window.body = $('body');
    }



    globalServices()
    {
        window.helpers = new Helpers();
    }



    backButtonForceReload()
    {
        $(window).on('popstate', function () {
            window.location.reload();
        });
    }



    ajaxCSRFToken()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }
}