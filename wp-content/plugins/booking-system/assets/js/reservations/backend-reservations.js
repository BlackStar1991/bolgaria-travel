
/*
* Title                   : Pinpoint Booking System WordPress Plugin
* Version                 : 2.1.2
* File                    : assets/js/reservations/backend-reservations.js
* File Version            : 1.0.6
* Created / Last Modified : 11 October 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Back end reservations JavaScript class.
*/

var DOPBSPBackEndReservations = new function(){
    'use strict';
    
    /*
     * Private variables.
     */
    var $ = jQuery.noConflict();
        
    /*
     * Constructor
     */
    this.__construct = function(){
    };
    
    /*
     * Display reservations.
     */
    this.display = function(){
        var calendarID = $('#DOPBSP-calendar-ID').val();
        
        $('.DOPBSP-admin .dopbsp-main').css('display', 'block');  
        
        if (calendarID.indexOf(',') !== -1){
            $('.DOPBSP-admin .dopbsp-main .dopbsp-button.dopbsp-reservations-add-button').addClass('dopbsp-disabled');
            $('.DOPBSP-admin .dopbsp-main .dopbsp-button.dopbsp-reservations-calendar-button').addClass('dopbsp-disabled');
            DOPBSPBackEndReservations.saveFilters({calendar: ''});
        }
        else{
            $('.DOPBSP-admin .dopbsp-main .dopbsp-button.dopbsp-reservations-add-button').removeClass('dopbsp-disabled');
            $('.DOPBSP-admin .dopbsp-main .dopbsp-button.dopbsp-reservations-calendar-button').removeClass('dopbsp-disabled');
            DOPBSPBackEndReservations.saveFilters({calendar: calendarID});
        }
        
        if (calendarID.indexOf(',') !== -1){
            DOPBSPBackEndReservationsList.display();
        }
        else if ($('.DOPBSP-admin .dopbsp-main .dopbsp-button.dopbsp-reservations-add-button').hasClass('dopbsp-selected')){
            DOPBSPBackEndReservationsAdd.display();
        }
        else if ($('.DOPBSP-admin .dopbsp-main .dopbsp-button.dopbsp-reservations-calendar-button').hasClass('dopbsp-selected')){
            DOPBSPBackEndReservationsCalendar.display();
        }
        else if ($('.DOPBSP-admin .dopbsp-main .dopbsp-button.dopbsp-reservations-list-button').hasClass('dopbsp-selected')){
            DOPBSPBackEndReservationsList.display();
        }
        else{
            if (DOPPrototypes.getCookie('DOPBSP_reservations_view') === 'calendar'){
                DOPBSPBackEndReservationsCalendar.display();
            }
            else{
                DOPBSPBackEndReservationsList.display();
            }
        }
    };
    
    /*
     * Save reservations filters in cookies.
     * 
     * @param filters (Object): filters list to be saved
     *                          * status_pending (Boolean): pending status filter
     *                          * status_approved (Boolean): approved status filter
     *                          * status_rejected (Boolean): rejected status filter
     *                          * status_canceled (Boolean): canceled status filter
     *                          * status_expired (Boolean): expired status filter
     *                          * payment_methods (String): selected payment methods
     *                          * per_page (Number): number of results per page (list only)
     *                          * order (String): order direction filter (list only)
     *                          * order_by (String): order by field filter (list only)
     * 
     */
    this.saveFilters = function(filters){
        for (var key in filters){
            DOPPrototypes.setCookie('DOPBSP_reservations_'+key, filters[key], 60);
        }
    };
    
    return this.__construct();
};