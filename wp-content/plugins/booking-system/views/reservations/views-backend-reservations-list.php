<?php

/*
* Title                   : Pinpoint Booking System WordPress Plugin
* Version                 : 2.1.1
* File                    : views/reservations/views-backend-reservations-list.php
* File Version            : 1.0.4
* Created / Last Modified : 26 August 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Back end reservations list views class.
*/

    if (!class_exists('DOPBSPViewsBackEndReservationsList')){
        class DOPBSPViewsBackEndReservationsList extends DOPBSPViewsBackEndReservations{
            /*
             * Constructor
             */
            function __construct(){
            }
            
            /*
             * Returns reservations template.
             * 
             * @param args (array): function arguments
             *                      * reservations (array): reservations list
             *                      * reservations_total (array): total number of reservations
             * 
             * @return reservations HTML page
             */
            function template($args = array()){
                global $DOPBSP;
                
                $reservations = $args['reservations'];
                $reservations_total = $args['reservations_total'];
                
                echo $reservations_total.';;;;;;;;;;;';
?>
                <ul class="dopbsp-reservations-list">
<?php
                /*
                 * Check if reservations exist.
                 */
                if (count($reservations) > 0){
                    foreach ($reservations as $reservation){
                        $DOPBSP->views->backend_reservation->template(array('reservation' => $reservation));
                    }
                }
                else{
?>                    
                    <li class="dopbsp-no-data"><?php echo $DOPBSP->text('RESERVATIONS_NO_RESERVATIONS'); ?></li>
<?php                    
                }
?>
                </ul> 
<?php
            }
        }
    }