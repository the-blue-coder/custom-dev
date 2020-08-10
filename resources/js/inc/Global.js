import Helpers from './Helpers';

export default class Global
{
    constructor()
    {
        this.globalVars();
        this.globalServices();
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



    ajaxCSRFToken()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }
}