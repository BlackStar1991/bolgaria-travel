<?php

/*
* Title                   : Pinpoint Booking System WordPress Plugin
* Version                 : 2.1.2
* File                    : includes/class-frontend.php
* File Version            : 1.1
* Created / Last Modified : 08 November 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Front end PHP class.
*/

    if (!class_exists('DOPBSPFrontEnd')){
        class DOPBSPFrontEnd{
            /*
             * Constructor
             */
            function __construct(){
                add_action('wp_enqueue_scripts', array(&$this, 'addStyles'));
                add_action('wp_enqueue_scripts', array(&$this, 'addScripts'));
                
                add_shortcode('dopbs', array(&$this, 'shortcode'));
                add_shortcode('dopbsp', array(&$this, 'shortcode'));
            }
            
            /*
             * Add plugin's CSS files.
             */
            function addStyles(){
                global $DOPBSP;
                
                /*
                 * Register styles.
                 */
                wp_register_style('DOPBSP-css-dopselect', $DOPBSP->paths->url.'libraries/css/jquery.dop.Select.css');

                /*
                 * Enqueue styles.
                 */
                wp_enqueue_style('DOPBSP-css-dopselect');
            }
            
            /*
             * Add plugin's JavaScript files.
             */
            function addScripts(){
                global $DOPBSP;
                
                /*
                 * Register JavaScript.
                 */
                
                /*
                 * Libraries.
                 */
                wp_register_script('DOP-js-prototypes', $DOPBSP->paths->url.'libraries/js/dop-prototypes.js', array('jquery'));
                wp_register_script('DOP-js-jquery-dopselect', $DOPBSP->paths->url.'libraries/js/jquery.dop.Select.js', array('jquery'), false, true);
                
                /*
                 * Calendar
                 */
                wp_register_script('DOPBSP-js-frontend-calendar', $DOPBSP->paths->url.'assets/js/jquery.dop.frontend.BSPCalendar.js', array('jquery'), false, true);
                
                /*
                 * Front end.
                 */
                wp_register_script('DOPBSP-js-frontend', $DOPBSP->paths->url.'assets/js/frontend.js', array('jquery'), false, true);
                
                /*
                 * Deposit
                 */
                wp_register_script('DOPBSP-js-frontend-deposit', $DOPBSP->paths->url.'assets/js/deposit/frontend-deposit.js', array('jquery'), false, true);
                
                /*
                 * Discounts
                 */
                wp_register_script('DOPBSP-js-frontend-discounts', $DOPBSP->paths->url.'assets/js/discounts/frontend-discounts.js', array('jquery'), false, true);
                
                /*
                 * Fees
                 */
                wp_register_script('DOPBSP-js-frontend-fees', $DOPBSP->paths->url.'assets/js/fees/frontend-fees.js', array('jquery'), false, true);
                
                /*
                 * Rules
                 */
                wp_register_script('DOPBSP-js-frontend-rules', $DOPBSP->paths->url.'assets/js/rules/frontend-rules.js', array('jquery'), false, true);
                
                /*
                 *  Enqueue JavaScript.
                 */
                
                /*
                 * Libraries.
                 */
                if (!wp_script_is('jquery', 'queue')){
                    wp_enqueue_script('jquery');
                }
                
                if (!wp_script_is('jquery-ui-datepicker', 'queue')){
                    wp_enqueue_script('jquery-ui-datepicker');
                }
                
                if (!wp_script_is('jquery-ui-slider', 'queue')){
                    wp_enqueue_script('jquery-ui-slider');
                }
                
                wp_enqueue_script('DOP-js-prototypes');
                wp_enqueue_script('DOP-js-jquery-dopselect');
                
                /*
                 * Calendar
                 */
                wp_enqueue_script('DOPBSP-js-frontend-calendar');
                
                /*
                 * Front end.
                 */
                wp_enqueue_script('DOPBSP-js-frontend');
                
                /*
                 * Deposit
                 */
                wp_enqueue_script('DOPBSP-js-frontend-deposit');
                
                /*
                 * Discounts
                 */
                wp_enqueue_script('DOPBSP-js-frontend-discounts');
                
                /*
                 * Fees
                 */
                wp_enqueue_script('DOPBSP-js-frontend-fees');
                
                /*
                 * Rules
                 */
                wp_enqueue_script('DOPBSP-js-frontend-rules');
            }

            /*
             * Initialize shortcode.
             * 
             * @param atts (array): shortcode attributes
             */
            function shortcode($atts){
                global $DOPBSP;
                
                extract(shortcode_atts(array('class' => 'dopbsp'), $atts));
                        
                if(isset($atts)) {
                    
                    if (is_array($atts)) {
                        
                        if (!array_key_exists('lang', $atts)){
                            $atts['lang'] = DOPBSP_CONFIG_TRANSLATION_DEFAULT_LANGUAGE;
                        }

                        if (!array_key_exists('woocommerce', $atts)){
                            $atts['woocommerce'] = 'false';
                        }

                        if (!array_key_exists('woocommerce_add_to_cart', $atts)){
                            $atts['woocommerce_add_to_cart'] = 'false';
                        }

                        if (!array_key_exists('woocommerce_position', $atts)){
                            $atts['woocommerce_position'] = 'summary';
                        }

                        if (!array_key_exists('woocommerce_product_id', $atts)){
                            $atts['woocommerce_product_id'] = 0;
                        }
                    } else {
                        $atts['lang'] = DOPBSP_CONFIG_TRANSLATION_DEFAULT_LANGUAGE;
                    }
                
                } else {
                    $atts['lang'] = DOPBSP_CONFIG_TRANSLATION_DEFAULT_LANGUAGE;
                }
                
                $content = $DOPBSP->classes->frontend_calendar->display($atts);
                
                return $content;
            }
        }
    }