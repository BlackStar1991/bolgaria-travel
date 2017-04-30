
/*
* Title                   : Pinpoint Booking System WordPress Plugin
* Version                 : 2.1.6
* File                    : assets/js/settings/backend-settings-notifications.js
* File Version            : 1.0.8
* Created / Last Modified : 16 February 2016
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Back end notifications settings JavaScript class.
*/

var DOPBSPBackEndSettingsNotifications = new function(){
    'use strict';
    
    /*
     * Private variables
     */
    var $ = jQuery.noConflict();

    /*
     * Constructor
     */
    this.__construct = function(){
    };
    
    /*
     * Display notifications settings.
     * 
     * @param id (Number): calendar ID
     */
    this.display = function(id){
        DOPBSPBackEnd.toggleMessages('active', DOPBSPBackEnd.text('MESSAGES_LOADING'));
        DOPBSPBackEndSettings.toggle(id, 'notifications');

        $.post(ajaxurl, {action: 'dopbsp_settings_notifications_display',
                         id: id}, function(data){
            DOPBSPBackEnd.toggleMessages('success', DOPBSPBackEnd.text('MESSAGES_LOADING_SUCCESS'));
            $('#DOPBSP-column2 .dopbsp-column-content').html(data);
        }).fail(function(data){
            DOPBSPBackEnd.toggleMessages('error', data.status+': '+data.statusText);
        });
    };
    
    /*
     * Test notification method.
     * 
     * @param id (Number): calendar ID
     */
    this.test = function(id){
        DOPBSPBackEnd.toggleMessages('active', DOPBSPBackEnd.text('SETTINGS_NOTIFICATIONS_TEST_SENDING'));
        
        $.post(ajaxurl, {action: 'dopbsp_settings_notifications_test',
                         id: id,
                         method: $('#DOPBSP-settings-notifications-test-method').val(),
                         email: $('#DOPBSP-settings-notifications-test-email').val()}, function(data){
            data = $.trim(data);
                         
            if (data === 'success'){
                DOPBSPBackEnd.toggleMessages('success', DOPBSPBackEnd.text('SETTINGS_NOTIFICATIONS_TEST_SUCCESS'));
            }             
            else{
                DOPBSPBackEnd.toggleMessages('error', data);
            }
        }).fail(function(data){
            DOPBSPBackEnd.toggleMessages('error', data.status+': '+data.statusText);
        });
    };
    
    return this.__construct();
};