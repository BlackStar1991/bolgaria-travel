<?php

/*
* Title                   : Pinpoint Booking System WordPress Plugin
* Version                 : 2.1.1
* File                    : includes/settings/class-backend-settings.php
* File Version            : 1.1.1
* Created / Last Modified : 26 August 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Back end settings PHP class.
*/

    if (!class_exists('DOPBSPBackEndSettings')){
        class DOPBSPBackEndSettings extends DOPBSPBackEnd{
            /*
             * Public variables.
             */
            public $default_calendar = array();
            public $default_general = array();
            public $default_notifications = array();
            public $default_payment = array();
                        
            /*
             * Constructor
             */
            function __construct(){
                add_action('init', array(&$this, 'init'));
            }
        
            /*
             * Prints out the settings page.
             */
            function view(){
                global $DOPBSP;
                
                $DOPBSP->views->backend_settings->template();
            }
            
            /*
             * Initialize settings.
             */
            function init(){
                $this->default_calendar = apply_filters('dopbsp_filter_default_settings_calendar', $this->default_calendar);
                $this->default_general = apply_filters('dopbsp_filter_default_settings_general', $this->default_general);
                $this->default_notifications = apply_filters('dopbsp_filter_default_settings_notifications', $this->default_notifications);
                $this->default_payment = apply_filters('dopbsp_filter_default_settings_payment', $this->default_payment);
            }
            
            /*
             * Edit settings.
             * 
             * @post id (integer): calendar ID
             * @post settings_type (string): settings type
             * @post key (string): option key
             * @post value (combined): the value with which the option will be modified
             * 
             * @param args (array): function arguments
             *                          "id" (integer): calendar ID
             *                          "is_ajax" (boolean): set it to false if the function is not called using a AJAX request
             *                          "key" (string): option key
             *                          "settings_type" (string): settings type
             *                          "value" (combined): the value with which the option will be modified
             */
            function set($args = array('id' => '',
                                       'is_ajax' => true,
                                       'key' => '',
                                       'settings_type' => '',
                                       'value' => '')){
                global $wpdb;
                global $DOPBSP;
                
                if (count($args) == 0 || !isset($args['key'])){
                    $args = array('id' => '',
                                  'is_ajax' => true,
                                  'key' => '',
                                  'settings_type' => '',
                                  'value' => '');
                }
                
                $is_ajax = $args['is_ajax'];
                $id = $is_ajax ? $_POST['id']:$args['id'];
                $settings_type = $is_ajax ? $_POST['settings_type']:$args['settings_type'];
                $key = $is_ajax ? $_POST['key']:$args['key'];
                $post_value = $is_ajax ? $_POST['value']:$args['value'];
                $value = $key == 'hours_definitions' ? json_encode($post_value):$post_value;
                
                switch ($settings_type){
                    case 'calendar':
                        $table = $DOPBSP->tables->settings_calendar;
                        $id_type = 'calendar_id';
                        break;
                    case 'notifications':
                        $table = $DOPBSP->tables->settings_notifications;
                        $id_type = 'calendar_id';
                        break;
                    case 'payment':
                        $table = $DOPBSP->tables->settings_payment;
                        $id_type = 'calendar_id';
                        break;
                    default:
                        $table = $DOPBSP->tables->settings;
                        $id_type = 'none';
                }
                
                /*
                 * Update settings tables.
                 */
                $control_data = $id_type == 'none' ? $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$table.' WHERE unique_key=%s',
                                                                                   $key)):
                                                     $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$table.' WHERE '.$id_type.'=%d AND unique_key=%s',
                                                                                   $id, $key));
                
                if ($wpdb->num_rows == 0){
                    $wpdb->insert($table, $id_type == 'none' ? array('unique_key' => $key,
                                                                     'value' => $value):
                                                               array($id_type => $id,
                                                                     'unique_key' => $key,
                                                                     'value' => $value));
                }
                else{
                    $wpdb->update($table, array('value' => $value), 
                                          $id_type == 'none' ? array('unique_key' => $key):
                                                               array($id_type => $id,
                                                                     'unique_key' => $key));
                }
                
                /*
                 * Update calendars/searches tables.
                 */
                if ($id != 0){
                    switch ($key){
                        case 'hours_enabled':
                            if ($settings_type == 'calendar'){
                                $wpdb->update($DOPBSP->tables->calendars, array('hours_enabled' => $value), 
                                                                          array('id' => $id));
                            }
                            break;
                        case 'hours_interval_enabled':
                            if ($settings_type == 'calendar'){
                                $wpdb->update($DOPBSP->tables->calendars, array('hours_interval_enabled' => $value), 
                                                                          array('id' => $id));
                            }
                            break;
                    }
                }
                
                if ($is_ajax){
                    die();
                }
            }
            
            /*
             * Get options values from database.
             * 
             * @post id (integer): calendar ID
             * @post settings_type (integer): settings type
             * 
             * @return options values object
             */
            function values($id,
                            $settings_type){
                global $wpdb;
                global $DOPBSP;
                
                $values = new stdClass;
                
                switch ($settings_type){
                    case 'calendar':
                        $table = $DOPBSP->tables->settings_calendar;
                        $defaults = $this->default_calendar;
                        $id_type = 'calendar_id';
                        break;
                    case 'notifications':
                        $table = $DOPBSP->tables->settings_notifications;
                        $defaults = $this->default_notifications;
                        $id_type = 'calendar_id';
                        break;
                    case 'payment':
                        $table = $DOPBSP->tables->settings_payment;
                        $defaults = $this->default_payment;
                        $id_type = 'calendar_id';
                        break;
                    default:
                        $table = $DOPBSP->tables->settings;
                        $defaults = $this->default_general;
                        $id_type = 'none';
                }
                
                $settings = $id_type == 'none' ? $wpdb->get_results('SELECT unique_key, value FROM '.$table, OBJECT_K):
                                                 $wpdb->get_results($wpdb->prepare('SELECT unique_key, value FROM '.$table.' WHERE '.$id_type.'=%d', 
                                                                                   $id), OBJECT_K);
                $columns = $wpdb->get_results('DESCRIBE '.$table);
                
                foreach ($defaults as $key => $default){
                    $values->$key = isset($settings[$key]) ? $settings[$key]->value:(count($columns) > 5 ? $this->value($id, $settings_type, $key):$default);
                }
                
                if ($id_type != 'none'){
                    $values->$id_type = $id;
                }
                
                return $values;
            }
            
            /*
             * Get option value from database.
             * 
             * @post id (integer): calendar ID
             * @post settings_type (integer): settings type
             * @post key (string): option key
             * 
             * @return option value
             */
            function value($id,
                           $settings_type,
                           $key){
                global $wpdb;
                global $DOPBSP;
                
                switch ($settings_type){
                    case 'calendar':
                        $table = $DOPBSP->tables->settings_calendar;
                        $value_default = isset($this->default_calendar[$key]) ? $this->default_calendar[$key]:'Key is invalid!';
                        $id_type = 'calendar_id';
                        break;
                    case 'notifications':
                        $table = $DOPBSP->tables->settings_notifications;
                        $value_default = isset($this->default_notifications[$key]) ? $this->default_notifications[$key]:'Key is invalid!';
                        $id_type = 'calendar_id';
                        break;
                    case 'payment':
                        $table = $DOPBSP->tables->settings_payment;
                        $value_default = isset($this->default_payment[$key]) ? $this->default_payment[$key]:'Key is invalid!';
                        $id_type = 'calendar_id';
                        break;
                    default:
                        $table = $DOPBSP->tables->settings;
                        $value_default = isset($this->default_general[$key]) ? $this->default_general[$key]:'Key is invalid!';
                        $id_type = 'none';
                }
                
                if ($value_default != 'Key is invalid!'){
                    $value_data = $id_type == 'none' ? $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$table.' WHERE unique_key="%s"',
                                                                                     $key)):
                                                       $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$table.' WHERE '.$id_type.'=%d AND unique_key="%s"',
                                                                                     $id, $key));
                    
                    if ($wpdb->num_rows == 0){
                        if ($id_type != 'none'){
                            $value_data = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$table.' WHERE '.$id_type.'=%d AND unique_key=""',
                                                                        $id));
                        }
                        
                        if ($id_type != 'none'
                                && $wpdb->num_rows == 0){
                            $value = $value_default;
                        }
                        else{
                            $value = isset($value_data->$key) ? $value_data->$key:$value_default;
                        }
                    }
                    else{
                        $value = $value_data->value;
                    }
                }
                else{
                    $value = $value_default;
                }
                
                return $value;
            }  
        }
    }