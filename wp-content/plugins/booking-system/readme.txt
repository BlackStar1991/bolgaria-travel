=== Pinpoint Booking System (+WooCommerce) ===
Contributors: DOTonPAPER
Donate link: https://pinpoint.world/wordpress/
Tags: accommodations, admin, administration, ajax, appointment, availability, availability calendar, book, bookable, bookable events, boking, booking, booking calendar, booking form, booking module, booking plugin, booking system, bookings, calendar, event, event calendar, events, hotel, hotel booking, hotel rooms, jquery, management, meeting, meeting scheduling, organizer, payment, paypal, plugin, rent, rental, reservation, reservation calendar, reservation plugin, reservation system, responsive, schedule, schedule calendar, schedule system, scheduling, service, to book, villa booking
Requires at least: 4.0
Tested up to: 4.5
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This Plugin will help you to easily create a booking/reservation system into your WordPress website or blog.

== Description ==

View live demo of Booking System Front End [here](https://pinpoint.world/wordpress/).

This Plugin will help you to easily create a booking/reservation system into your WordPress website or blog. The Booking System will display a calendar for users to see availability and book dates and hours.

Booking System is great for booking hotel rooms, apartments, houses, villas, rooms etc, make appointments to doctors, dentists, lawyers, beauty salons, spas, massage therapists etc or schedule events.

The Plugin is intended to book anything, anywhere, anytime. We always accept feedback and constructive criticism so if you have something to say please use the [support forum](http://wordpress.org/support/plugin/booking-system).

= Features =
If you want new features or functionalities in the Booking System drop us a line in [support forum](http://wordpress.org/support/plugin/booking-system).

**Responsive**

* Front End Booking Calendar is responsive and can be viewed on all browsers and devices.

**Booking Calendar**

* A Booking Calendar is displayed in Front End, where clients can view availability and make reservations & appointments.
* The clients can select to display multiple or fewer months for better visualization.
* The clients can click on the calendar's days and/or hours to select the booking period they want.
* The Booking Calendar contains a Sidebar where clients can search availability through the calendar, select number of rooms/items they want, see the price and book them by completing a very customizable Booking Form.
* Support for Terms &amp; Conditions.
* The Check In/Out dates can be in american (MM DD, YYYY) or european (DD MM YYYY) format.
* Only the Calendar be displayed so that your users can check only availability.
* The Back End Booking Calendar is similar to the Front End version so that administrators can have a very familiar way to add information ... <em>what they see the clients see.</em>

**Book Days**

* Add price, promo price, number of items available and information for each day in the Front End Booking Calendar. In the Back End Booking Calendar administrators can add notes to themselves or other administrators.
* The days are displayed in the Booking Calendar with the following statuses: None, Available, Booked, Special, Unavailable.
* Set Price & Status for a groups of days.
* Set discounts depending on the number of days that are booked.
* Set minimum & maximum number of days that you are permitted to book.
* Set the first day of the week that will appear in the Booking calendar.
* Set general available/unavailable weekdays.
* Support for Morning Check Out. It will display information in the Booking Calendar if you need to Check In in the afternoon and Check Out in the morning. This option is very useful for hotels.

**Book Hours**

* You have complete control to what hours you are using in your Booking Calendar. You can set same hours by the minute for the whole calendar or you can set different hours for different days.
* Add price, promo price, number of items available and information for each hour in the Front End Booking Calendar. In the Back End Booking Calendar administrators can add notes to themselves or other administrators.
* The hours are displayed in the Booking Calendar with the following statuses: None, Available, Booked, Special, Unavailable.
* Set Price & Status for a groups of hours.
* Hours can be in AM/PM or 24 hours format.
* Hours intervals are supported.

**Multi Language support for Front End &amp; Back End**

* Note: Not all language files are translated. View documentation to see where you can translate them if needed.

**Ability to change currency**

* You can select any currency to use into your Booking Calendar.

**Reservations**

* Booking requests can be instantly approved or can be approved/rejected by administrators. The booking calendar will be changed accordingly.
* Administrators have the possibility to Approve, Reject or Cancel a reservation.


**Booking Forms**

* Create your own custom booking form to get what information you want from your clients.
* The Booking form supports Text Fields (Email, Phone, Name etc), Text Areas, Checkboxes & Drop Downs.

**Payment Systems**

* PayPal (credit card supported)

**View complete [List of Features](https://pinpoint.world/wordpress/features/)**

== Installation ==

Upload the folder **booking-system** from the zip file to "wp-content/plugins/" and activate the plugin in your admin panel or upload **booking-system.zip** in the "Add new" section.

== Frequently Asked Questions ==

Click [here](http://help.dotonpaper.net/booking-system-wordpress-plugin.html) to view Boking System Documentation.

Click [here](http://help.dotonpaper.net/booking-system-wordpress-plugin.html#faq) to view Booking System FAQ.

== Screenshots ==

View [demo](https://pinpoint.world/wordpress/) here

== Changelog ==

= 2.2.5 =
* External images have been removed.

= 2.2.4 =
* "Coupons" created by other users can be viewed and edited by the booking system's administrators.
* "Discounts" created by other users can be viewed and edited by the booking system's administrators.
* "Emails" created by other users can be viewed and edited by the booking system's administrators.
* "Extras" created by other users can be viewed and edited by the booking system's administrators.
* "Fees" created by other users can be viewed and edited by the booking system's administrators.
* "Forms" created by other users can be viewed and edited by the booking system's administrators.
* "Rules" created by other users can be viewed and edited by the booking system's administrators.
* Licence activation detects server timeout requests.
* Reservations that are expired can be sorted by date.

= 2.2.3 =
* Discount text in calendar is displayed correctly, bug repaired.
* PayPal integration has been updated to  to support certificates using SHA-25.
* Reservations without check out are added on some servers that delete blank post variables. We recommend contacting your hosting company to remove this issue.
* Translation is displayed correctly in widgets, bug repaired.

= 2.2.2 =		
* Reservations with hours are added on some servers that delete blank post variables. We recommend contacting your hosting company to remove this issue.
* WooCommerce cart object is not being saved to cache when you create a reservation.

= 2.2.1 =
* Hours' reservations don't overlap when you use the WooCommerce cart, bug repaired.
* The incompatibility with Yoast SEO has been repaired.

= 2.2.0 =
* Special characters are displayed correctly in infos and notes from the calendar, bug repaired.

= 2.1.9 =
* "Add-ons" activation has been improved. You can delete an activation from [Dot on Paper Shop](https://shop.dotonpaper.net/my-account/) if you have deleted the add-on and you have not deactivated it or if you want to activate it on another domain. Also the notification disappears after what the update is completed.

= 2.1.8 =
* Database is no longer accidentally deleted when you update from FREE to PRO version.
* Reservations are created and the period is booked when a deposit is made via WooCommerce, bug repaired.
* Users that are not administrators can be permitted to use the booking system.
 
= 2.1.7 =
* Email templates content is saved correctly for each language, bug repaired.    
* Minimum booking period for hours is correctly validated, bug repaired.
* The discount is calculated correctly for different rules with same time lapse, bug repaired.
* The discount is calculated correctly for hour intervals, bug repaired.
* Widget bug has been repaired. 
 
= 2.1.6 =
* "Add coupon" function added. Create an unlimited number of coupons.
* "Add discount" function added. Create an unlimited number of discount rules.
* "Add email templates" function added. Create an unlimited number of email templates.
* "Add extra" function added. Create an unlimited number of extras items.
* "Add form" function added. Create an unlimited number of forms.
* "Add rule" function added. Create an unlimited number of rules.
* "Add tax or fee" function added. Create an unlimited number of taxes and/or fees.
* Availability is set correctly and the reservation is saved after what a payment is made with PayPal, bug repaired.
* Only administrators can manage the booking system.
* The word "test" is no longer visible with WooCommerce, bug repaired.
* Some updates have been done to the code to meet the PHP7 standards.
* Validation for hours' availability has been improved.

= 2.1.5 =
* Fatal error that appears when WooCommerce is not installed has been repaired.

= 2.1.4 =
* Compatibility with some WooCommerce themes has been repaired.
* The documentation link has changed.
* The shop's SSL certificate will validate when the licence is activated, bug repaired.

= 2.1.3 =
* "Beautify" theme has been added.
* Reservations are added in WooCommerce cart if user is not logged in, bug repaired.

= 2.1.2 =
* Add-ons' update class has been improved.
* The coupon code is not visible in JavaScript anymore, bug repaired.
* WooCommerce functionalities have been changed. You can more easily attach Pinpoint to an WooCommerce product, variations are not needed anymore, availability is restored when an order is canceled and much more. Integration is much easier with multi vendor plugins types.

= 2.1.1 =
* "Booking System" has been renamed "Pinpoint".
* API - List reservations added.
* Calendar can be selected/removed in WooCommerce products, bug repaired.
* Classes constructors have been modified to meet the PHP5 standards.
* Reservations list pagination display the correct reservations, bug repaired.
* Widgets constructor call has been modified to work in WordPress version 4.3.0 and higher.

= 2.1 =
* "Add-ons" & "Themes" load data also via cURL.
* API - Beta version released.
* Reservations list pagination added.
* PayPal small bug repaired.
* Security bug repaired.
* WooCommerce "Add to cart" text added in translation.

= 2.0 =
* "Add-ons" added. Increase and improve functionalities.
* "Coupons" added. Create voucher codes for your clients to use with their booking requests.
* "Dashboard" added. Display a landing page and server environment.
* "Discounts" added. Give discounts for the period booked, in different time periods.
* "Email templates" added. Customize your booking notifications directly from administration area.
* "Extras" added. Add amenities, services & other stuff, with price or not, to a booking/reservation.
* "Forms" added. Create your custom contact forms.
* "Rules" added. Currently you can set min/max time lapse for a booking request.
* "Settings" database has been updated.
* "Taxes & fees" added. Set taxes & fees that need to be paid (VAT tax for example) with the booking.
* "Themes" added. A collection of themes specially created for the booking system.
* "Tools" added. Tools to help you with some of the booking system needs.
* "Translation" page has been updated in WordPress admin.
* ACAO buster added.
* Add booking calendars in widgets.
* Add bookins/reservations in WordPress admin.
* Admin language is different for each user, in WordPress back end.
* AJAX requests no longer return 403, 404 errors in front end.
* All algorithms are improved and work faster. Install, save, search ...
* All WordPress back end CSS classes are unique.
* Approving/canceling a reservation modifies the booking calendar data.
* Armenian dram currency added.
* Back end UI/CSS has been changed. A new design has been created for WordPress administration area.
* Bangladesh Taka currency added.
* bbPress incompatibility, bug repaired.
* Billing & shipping address added.
* Booking calendar display even it is used twice on same page.
* Booking calendar loading time is improved.
* Booking calendar resize on hidden elements, bug repaired.
* Booking notifications are sent in the language that was used when the reservation was created.
* Booking notifications are sent without SMTP if SMTP does not work.
* Booking notifications can be enabled/disabled in administration area.
* Booking notifications can be sent to multiple admins.
* Booking notifications can be sent using PHP mail function.
* Booking notifications can be sent using WordPress wp_mail function.
* Booking notifications can be set to use different methods to send emails to administrators and users.
* Booking notifications can use two SMTP servers, one for administrators and one for users.
* Booking notifications for administrators have Cc and Bcc fields, so that you can send them to multiple people.
* Booking notifications message and language bugs have been repaired.
* Booking notifications methods can be tested.
* Bookings can be limited to minutes.
* Bookings/reservations calendars jump to the last added/removed month.
* Bookings/reservations logic has been completly modified (search added, filters added, calendar & list view added).
* Calendar ID is removed from clients booking notification emails.
* Compatibility with PHP 5.3 or higher has been repaired.
* Complete code core changes. Everything is OOP & commented.
* Config file added.
* Correct hours format is displayed, in front end booking calendar.
* Cyrillic characters are displayed correctly in calendars tooltip, bug repaired.
* Currencies can be added using hooks.
* Currency can be displayed with space when price is shown, both in booking calendars and WordPress back end.
* Currency can be positioned before or after price, in booking calendar.
* Data save/load speed & server memory usage has been optimized.
* Database class has been updated.
* Database indexes have been updated.
* Database is deleted when you delete the booking system plugin.
* Datepicker & Google translate incompatibility, bug repaired in booking calendar.
* Datepicker bug fix, when you can select only one day, in booking calendar.
* Date select is repaired when minimum amount of days is set.
* Days availability is restored when you cancel a booking/reservation.
* Delete booking/reservation added.
* Deposit information is displayed correctly in email notifications.
* Different levels of checking availability have been added in the booking process.
* Discounts can be calculated including Extras price, in booking requests.
* Display calendar id & name in notifications emails.
* Display hours interval from current hour to next one.
* Display only an information calendar in front end.
* Displaying all translation initially in WordPress admin can be disabled in the configuration file.
* Email header is custom.
* Form data, that was entered when the a booking was requested, can be displayed in calendar information tooltip and/or day/hour body.
* Front end booking calendar info messages hide after a few seconds.
* Front end booking calendar is responsive.
* Front end booking calendar speed has been improved.
* Front end booking calendar's sidebar view is customizable.
* Front end calendar can start at any day you want.
* Front end fonts are loaded from Google using a secure connection (HTTPS).
* Front end UI/CSS has been changed. A new design has been created for front end booking calendar and all classes and ids are unique.
* Hooks added.
* Hours info is displayed on day hover, in booking calendar.
* IE bugs repaired.
* Indonesia Rupiah currency bug repaired.
* Information tooltip is displayed, bug repaired in front end booking calendar.
* Installation algorithms have been optimized.
* Installation on XAMP server repaired.
* Kenya Shilling currency added.
* Language in admin is verified and set to default, if different errors appear.
* Language codes have been changed to international codes for: Albanian (al->sq), Basque (bs->eu), Belarusian (by->be), Chinese (cn->zh), Croatian (cr->hr), Czech (cz->cs), Danish (dk->da), Dutch (du->nl), Greek (gr->el), Haitian Creole(ha->ht), Irish (ir->ga), Malay (mg->ms), Maltese (ma->mt), Persian (pe->fa), Spanish (sp->es), Swedish (se->sv), Welsh (we->cy).
* Languages can be added using hooks.
* Languages can be enabled/disabled in WordPress back end.
* Localhost bugs repaired.
* Major changes in booking hours logic and display.
* Major database changes. Column changes and more indexes created.
* Minimum booking period error message does not display randomly when you select only check in date, in booking calendar.
* Newly created booking forms display correct after PayPal Payment.
* Notifications are not sent two times when you use a SMTP, bug repaired.
* November & December months are displayed correctly in reservations, booking notifications ...
* Payment API has been added.
* PayPal API sandbox credentials have their own settings.
* PayPal payment calculates prices with decimal correctly, bug repaired.
* PayPal transaction may be refunded when a reservation is canceled.
* PayPal works with both SSL and TLS, until SSL will be dropped.
* Payment transaction ID is displayed in booking notification emails.
* Pending reservations are displayed in back end if there is no payment required.
* PHP function mysql_insert_id() has been replaced with $wpdb->insert_id, in WordPress back end.
* PHPMailer class is used when sending booking notifications.
* Plugin paths updated.
* Plugin update has been optimized.
* Possibility to hide number of items select field has been added, in booking calendar.
* Possibility to select more than one group of days/hours in a booking/reservation has been added.
* Price decimals ending in 0 display correctly in back end bookings/reservations and notifications, bug repaired.
* Redirect after a booking has been made, has been added.
* Redirect after a booking has been payed with PayPal, has been added.
* Retina ready, both front end calendar & back end administration area.
* Reservations calendar has been added/improved, in WordPress back end.
* Reservations filters history is saved and is displayed when you revisit the page.
* Select days from different months on front end booking calendar, bug repaired.
* Select first day of the week, in booking calendar.
* Set default database values before installation.
* Set default language for back end and/or front end before installation.
* Set the number of months to be initially displayed in the booking calendar.
* Stop bookings in advance added.
* Tables not created on Windows OS bug repaired.
* Text on Settings page, in WordPress admin, has been changed.
* The translation is displayed in alphabetical order, when you want to edit it, in WordPress admin.
* TinyMCE button incompatibility with some themes has been repaired.
* Touch devices freeze bug repaired.
* Touch devices navigation has been enabled.
* TLS connection can be used with SMTP.
* Translation can repair itself.
* Translation edit has been optimized.
* Translation system has been updated.
* Translation works with special characters, both in booking calendar and WordPress admin.
* UAE Dirham currency added.
* Unpaid reservations do not display in WordPress back end, bug repaired.
* Updating and fixing the translation database has been improved.
* Use prices lower than 1 in a booking request, added.
* User meta is deleted when the plugin is deleted.
* When a booking calendar is deleted the reservations area is removed.
* When hours are enabled, days details can be set manually or set depending on hours details on that current day.
* Windows server mySQL text fields bug repaired.
* WooCommerce support has been added.
* You can set booking requests to by approved instantly, or not.
* You have the possibility to calculate the total price using the last hour selected value, or not.

= 1.4 =
* Security issue repaired.

= 1.3.1 =
* TinyMCE shortcodes bug repaired.

= 1.3 =
* Security fixes.
* 3.9 compatibilities repaired.

= 1.2.1 =
* Calendar "is stuck" bug repaired.

= 1.2 =
* Localhost bugs repaired.

= 1.1 =
* Access-Control-Allow-Origin Buster bug repaired.
* French Translation updated thanks to Asselin de Beauville Christophe - http://gegeek.net/
* German Translation updated thanks to Dieter Pfenning - dieter.pfenning@winball.de
* Polish Translation updated thanks to Kwasniewski Krzysztof - http://etechnologie.pl
* Small fixes.

= 1.0 =
* Initial release of Booking System (WordPress Plugin).

== Upgrade Notice ==

= 2.2.5 =
* External images have been removed.

= 2.2.4 =
* "Coupons" created by other users can be viewed and edited by the booking system's administrators.
* "Discounts" created by other users can be viewed and edited by the booking system's administrators.
* "Emails" created by other users can be viewed and edited by the booking system's administrators.
* "Extras" created by other users can be viewed and edited by the booking system's administrators.
* "Fees" created by other users can be viewed and edited by the booking system's administrators.
* "Forms" created by other users can be viewed and edited by the booking system's administrators.
* "Rules" created by other users can be viewed and edited by the booking system's administrators.
* Licence activation detects server timeout requests.
* Reservations that are expired can be sorted by date.

= 2.2.3 =
* Discount text in calendar is displayed correctly, bug repaired.
* PayPal integration has been updated to  to support certificates using SHA-25.
* Reservations without check out are added on some servers that delete blank post variables. We recommend contacting your hosting company to remove this issue.
* Translation is displayed correctly in widgets, bug repaired.

= 2.2.2 =		
* Reservations with hours are added on some servers that delete blank post variables. We recommend contacting your hosting company to remove this issue.
* WooCommerce cart object is not being saved to cache when you create a reservation.

= 2.2.1 =
* Hours' reservations don't overlap when you use the WooCommerce cart, bug repaired.
* The incompatibility with Yoast SEO has been repaired.

= 2.2.0 =
* Special characters are displayed correctly in infos and notes from the calendar, bug repaired.
 
= 2.1.9 =
* "Add-ons" activation has been improved. You can delete an activation from [Dot on Paper Shop](https://shop.dotonpaper.net/my-account/) if you have deleted the add-on and you have not deactivated it or if you want to activate it on another domain. Also the notification disappears after what the update is completed.

= 2.1.8 =
* Database is no longer accidentally deleted when you update from FREE to PRO version.
* Reservations are created and the period is booked when a deposit is made via WooCommerce, bug repaired.
* Users that are not administrators can be permitted to use the booking system.
 
= 2.1.7 =
* Email templates content is saved correctly for each language, bug repaired.    
* Minimum booking period for hours is correctly validated, bug repaired.
* The discount is calculated correctly for different rules with same time lapse, bug repaired.
* The discount is calculated correctly for hour intervals, bug repaired.
* Widget bug has been repaired. 
 
= 2.1.6 =
* "Add coupon" function added. Create an unlimited number of coupons.
* "Add discount" function added. Create an unlimited number of discount rules.
* "Add email templates" function added. Create an unlimited number of email templates.
* "Add extra" function added. Create an unlimited number of extras items.
* "Add form" function added. Create an unlimited number of forms.
* "Add rule" function added. Create an unlimited number of rules.
* "Add tax or fee" function added. Create an unlimited number of taxes and/or fees.
* Availability is set correctly and the reservation is saved after what a payment is made with PayPal, bug repaired.
* Only administrators can manage the booking system.
* The word "test" is no longer visible with WooCommerce, bug repaired.
* Some updates have been done to the code to meet the PHP7 standards.
* Validation for hours' availability has been improved.

= 2.1.5 =
* Fatal error that appears when WooCommerce is not installed has been repaired.

= 2.1.4 =
* Compatibility with some WooCommerce themes has been repaired.
* The documentation link has changed.
* The shop's SSL certificate will validate when the licence is activated, bug repaired.

= 2.1.3 =
* "Beautify" theme has been added.
* Reservations are added in WooCommerce cart if user is not logged in, bug repaired.

= 2.1.2 =
* Add-ons' update class has been improved.
* The coupon code is not visible in JavaScript anymore, bug repaired.
* WooCommerce functionalities have been changed. You can more easily attach Pinpoint to an WooCommerce product, variations are not needed anymore, availability is restored when an order is canceled and much more. Integration is much easier with multi vendor plugins types.

= 2.1.1 =
* "Booking System" has been renamed "Pinpoint".
* API - List reservations added.
* Calendar can be selected/removed in WooCommerce products, bug repaired.
* Classes constructors have been modified to meet the PHP5 standards.
* Reservations list pagination display the correct reservations, bug repaired.
* Widgets constructor call has been modified to work in WordPress version 4.3.0 and higher.

= 2.1 =
* "Add-ons" & "Themes" load data also via cURL.
* API - Beta version released.
* Reservations list pagination added.
* PayPal small bug repaired.
* Security bug repaired.
* WooCommerce "Add to cart" text added in translation.

= 2.0 =
* "Add-ons" added. Increase and improve functionalities.
* "Coupons" added. Create voucher codes for your clients to use with their booking requests.
* "Dashboard" added. Display a landing page and server environment.
* "Discounts" added. Give discounts for the period booked, in different time periods.
* "Email templates" added. Customize your booking notifications directly from administration area.
* "Extras" added. Add amenities, services & other stuff, with price or not, to a booking/reservation.
* "Forms" added. Create your custom contact forms.
* "Rules" added. Currently you can set min/max time lapse for a booking request.
* "Settings" database has been updated.
* "Taxes & fees" added. Set taxes & fees that need to be paid (VAT tax for example) with the booking.
* "Themes" added. A collection of themes specially created for the booking system.
* "Tools" added. Tools to help you with some of the booking system needs.
* "Translation" page has been updated in WordPress admin.
* ACAO buster added.
* Add booking calendars in widgets.
* Add bookins/reservations in WordPress admin.
* Admin language is different for each user, in WordPress back end.
* AJAX requests no longer return 403, 404 errors in front end.
* All algorithms are improved and work faster. Install, save, search ...
* All WordPress back end CSS classes are unique.
* Approving/canceling a reservation modifies the booking calendar data.
* Armenian dram currency added.
* Back end UI/CSS has been changed. A new design has been created for WordPress administration area.
* Bangladesh Taka currency added.
* bbPress incompatibility, bug repaired.
* Billing & shipping address added.
* Booking calendar display even it is used twice on same page.
* Booking calendar loading time is improved.
* Booking calendar resize on hidden elements, bug repaired.
* Booking notifications are sent in the language that was used when the reservation was created.
* Booking notifications are sent without SMTP if SMTP does not work.
* Booking notifications can be enabled/disabled in administration area.
* Booking notifications can be sent to multiple admins.
* Booking notifications can be sent using PHP mail function.
* Booking notifications can be sent using WordPress wp_mail function.
* Booking notifications can be set to use different methods to send emails to administrators and users.
* Booking notifications can use two SMTP servers, one for administrators and one for users.
* Booking notifications for administrators have Cc and Bcc fields, so that you can send them to multiple people.
* Booking notifications message and language bugs have been repaired.
* Booking notifications methods can be tested.
* Bookings can be limited to minutes.
* Bookings/reservations calendars jump to the last added/removed month.
* Bookings/reservations logic has been completly modified (search added, filters added, calendar & list view added).
* Calendar ID is removed from clients booking notification emails.
* Compatibility with PHP 5.3 or higher has been repaired.
* Complete code core changes. Everything is OOP & commented.
* Config file added.
* Correct hours format is displayed, in front end booking calendar.
* Cyrillic characters are displayed correctly in calendars tooltip, bug repaired.
* Currencies can be added using hooks.
* Currency can be displayed with space when price is shown, both in booking calendars and WordPress back end.
* Currency can be positioned before or after price, in booking calendar.
* Data save/load speed & server memory usage has been optimized.
* Database class has been updated.
* Database indexes have been updated.
* Database is deleted when you delete the booking system plugin.
* Datepicker & Google translate incompatibility, bug repaired in booking calendar.
* Datepicker bug fix, when you can select only one day, in booking calendar.
* Date select is repaired when minimum amount of days is set.
* Days availability is restored when you cancel a booking/reservation.
* Delete booking/reservation added.
* Deposit information is displayed correctly in email notifications.
* Different levels of checking availability have been added in the booking process.
* Discounts can be calculated including Extras price, in booking requests.
* Display calendar id & name in notifications emails.
* Display hours interval from current hour to next one.
* Display only an information calendar in front end.
* Displaying all translation initially in WordPress admin can be disabled in the configuration file.
* Email header is custom.
* Form data, that was entered when the a booking was requested, can be displayed in calendar information tooltip and/or day/hour body.
* Front end booking calendar info messages hide after a few seconds.
* Front end booking calendar is responsive.
* Front end booking calendar speed has been improved.
* Front end booking calendar's sidebar view is customizable.
* Front end calendar can start at any day you want.
* Front end fonts are loaded from Google using a secure connection (HTTPS).
* Front end UI/CSS has been changed. A new design has been created for front end booking calendar and all classes and ids are unique.
* Hooks added.
* Hours info is displayed on day hover, in booking calendar.
* IE bugs repaired.
* Indonesia Rupiah currency bug repaired.
* Information tooltip is displayed, bug repaired in front end booking calendar.
* Installation algorithms have been optimized.
* Installation on XAMP server repaired.
* Kenya Shilling currency added.
* Language in admin is verified and set to default, if different errors appear.
* Language codes have been changed to international codes for: Albanian (al->sq), Basque (bs->eu), Belarusian (by->be), Chinese (cn->zh), Croatian (cr->hr), Czech (cz->cs), Danish (dk->da), Dutch (du->nl), Greek (gr->el), Haitian Creole(ha->ht), Irish (ir->ga), Malay (mg->ms), Maltese (ma->mt), Persian (pe->fa), Spanish (sp->es), Swedish (se->sv), Welsh (we->cy).
* Languages can be added using hooks.
* Languages can be enabled/disabled in WordPress back end.
* Localhost bugs repaired.
* Major changes in booking hours logic and display.
* Major database changes. Column changes and more indexes created.
* Minimum booking period error message does not display randomly when you select only check in date, in booking calendar.
* Newly created booking forms display correct after PayPal Payment.
* Notifications are not sent two times when you use a SMTP, bug repaired.
* November & December months are displayed correctly in reservations, booking notifications ...
* Payment API has been added.
* PayPal API sandbox credentials have their own settings.
* PayPal payment calculates prices with decimal correctly, bug repaired.
* PayPal transaction may be refunded when a reservation is canceled.
* PayPal works with both SSL and TLS, until SSL will be dropped.
* Payment transaction ID is displayed in booking notification emails.
* Pending reservations are displayed in back end if there is no payment required.
* PHP function mysql_insert_id() has been replaced with $wpdb->insert_id, in WordPress back end.
* PHPMailer class is used when sending booking notifications.
* Plugin paths updated.
* Plugin update has been optimized.
* Possibility to hide number of items select field has been added, in booking calendar.
* Possibility to select more than one group of days/hours in a booking/reservation has been added.
* Price decimals ending in 0 display correctly in back end bookings/reservations and notifications, bug repaired.
* Redirect after a booking has been made, has been added.
* Redirect after a booking has been payed with PayPal, has been added.
* Retina ready, both front end calendar & back end administration area.
* Reservations calendar has been added/improved, in WordPress back end.
* Reservations filters history is saved and is displayed when you revisit the page.
* Select days from different months on front end booking calendar, bug repaired.
* Select first day of the week, in booking calendar.
* Set default database values before installation.
* Set default language for back end and/or front end before installation.
* Set the number of months to be initially displayed in the booking calendar.
* Stop bookings in advance added.
* Tables not created on Windows OS bug repaired.
* Text on Settings page, in WordPress admin, has been changed.
* The translation is displayed in alphabetical order, when you want to edit it, in WordPress admin.
* TinyMCE button incompatibility with some themes has been repaired.
* Touch devices freeze bug repaired.
* Touch devices navigation has been enabled.
* TLS connection can be used with SMTP.
* Translation can repair itself.
* Translation edit has been optimized.
* Translation system has been updated.
* Translation works with special characters, both in booking calendar and WordPress admin.
* UAE Dirham currency added.
* Unpaid reservations do not display in WordPress back end, bug repaired.
* Updating and fixing the translation database has been improved.
* Use prices lower than 1 in a booking request, added.
* User meta is deleted when the plugin is deleted.
* When a booking calendar is deleted the reservations area is removed.
* When hours are enabled, days details can be set manually or set depending on hours details on that current day.
* Windows server mySQL text fields bug repaired.
* WooCommerce support has been added.
* You can set booking requests to by approved instantly, or not.
* You have the possibility to calculate the total price using the last hour selected value, or not.

= 1.4 =
* Security issue repaired.

= 1.3.1 =
* TinyMCE shortcodes bug repaired.

= 1.3 =
* Security fixes.
* 3.9 compatibilities repaired.

= 1.2.1 =
* Calendar "is stuck" bug repaired.

= 1.2 =
* Localhost bugs repaired.

= 1.1 =
* Access-Control-Allow-Origin Buster bug repaired.
* French Translation updated thanks to Asselin de Beauville Christophe - http://gegeek.net/
* German Translation updated thanks to Dieter Pfenning - dieter.pfenning@winball.de
* Polish Translation updated thanks to Kwasniewski Krzysztof - http://etechnologie.pl
* Small fixes.

= 1.0 =
* Initial release of Booking System (WordPress Plugin).