import calendar from "../../module/jquery.simple-calendar.js";
export default class Calendar{
  constructor(){
    this.$calendar = $('.max_event .vc_column_container .vc_single_image-wrapper.vc_box_border_grey');
    if(this.$calendar.length){
      this.calendar();
      this.globalCalendar();
      this.heightMatch();
    }
  }

  tdClasses(){
    const $td = this.$calendar.find('tbody td');
    $td.each(function(){
      let $this = $(this);
      switch (1){
        case $this.find('.day.wrong-month').length && $this.next('td').find('.day:not(.wrong-month)').length:
          $this.addClass('last');
          break;
        case $this.find('.day:not(.wrong-month)').length && $this.next('td').find('.day.wrong-month').length:
          $this.next('td').addClass('first');
          break;
      }
    })
  }

  globalCalendar(){
    window.calendar = this.$calendar;
    window.calendar.addEvent = function(event){
      for (let x in event){
        window.calendar.data().plugin_simpleCalendar.settings.events.push(event[x]);
      }
      window.calendar.data().plugin_simpleCalendar.changeMonth(1);
      window.calendar.data().plugin_simpleCalendar.changeMonth(-1);
    }
  }

  calendar(){
    let self = this;
    this.$calendar.simpleCalendar({
      //Defaults options below
      //string of months starting from january
      months: ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
      days: ['D','L','M','M','J','V','S'],
      displayYear: true,              // Display year in header
      fixedStartDay: true,            // Week begin always by monday
      displayEvent: true,             // Display existing event
      events: [],                     // List of events
      onInit: function (calendar) {
        self.tdClasses();
      }, // Callback after first initialization
      onMonthChange: function (month, year) {
        self.tdClasses();
      }, // Callback on month change
      onDateSelect: function (date, events) {}, // Callback on date selection
      onEventSelect: function() {}, // Callback on event selection - use $(this).data('event') to access the event
      onEventCreate: function( $el ) {},          // Callback fired when an HTML event is created - see $(this).data('event')
      onDayCreate:   function( $el, d, m, y ) {}  // Callback fired when an HTML day is created   - see $(this).data('today'), .data('todayEvents')
    });
  }

  heightMatch(){
    const $container = this.$calendar.closest('.wpb_row').length;
  }
}