import Helpers from './Helpers';

export default class Events
{
    constructor()
    {
        //Populate calendar on load
        this.populateCalendar();
    }



    populateCalendar()
    {
        if (typeof(window.calendar) === 'undefined') {
            return;
        }

        const done = function (response) {
            window.calendar.addEvent(response.data.calendarEventsData);
        };

        const fail = function () {
            console.error('Error while fetching calendar events!');
        };

        Helpers.doAjax('/wp-json/events/all', 'GET', 'JSON', {}, done, fail);
    }
}