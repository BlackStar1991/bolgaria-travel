<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<style>
    


/*

RESPONSTABLE 2.0 by jordyvanraaij
  Designed mobile first!

If you like this solution, you might also want to check out the 1.0 version:
  https://gist.github.com/jordyvanraaij/9069194

*/
.responstable {
  margin: 1em 0;
  width: 100%;
  overflow: hidden;
  background: #FFF;
  color: #024457;
  border-radius: 10px;
  border: 1px solid #039389 ;
}
.responstable tr {
  border: 1px solid #D9E4E6;
}
.responstable tr:nth-child(odd) {
  background-color: #EAF3F3;
}
.responstable th {
  display: none;
  border: 1px solid #FFF;
  background-color: #039389 ;
  color: #FFF;
  padding: 1em;
}
.responstable th:first-child {
  display: table-cell;
  text-align: center;
}
.responstable th:nth-child(2) {
  display: table-cell;
}
.responstable th:nth-child(2) span {
  display: none;
}
.responstable th:nth-child(2):after {
  content: attr(data-th);
}
@media (min-width: 480px) {
  .responstable th:nth-child(2) span {
    display: block;
  }
  .responstable th:nth-child(2):after {
    display: none;
  }
}
.responstable td {
  display: block;
  word-wrap: break-word;
  max-width: 7em;
}
.responstable td:first-child {
  display: table-cell;
  text-align: center;
  border-right: 1px solid #D9E4E6;
}
@media (min-width: 480px) {
  .responstable td {
    border: 1px solid #D9E4E6;
  }
}
.responstable th, .responstable td {
  text-align: left;
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .responstable th, .responstable td {
    display: table-cell;
    padding: 1em;
  }
}

.wpappp_sub_text{
  text-align: center;
  font-size: 3em;
  margin-top: 20px;
}
#upc_subscriber_tab tr td{
  padding:20px;
  padding-left:0;
}


.wpappp_buton {
    overflow: hidden !important;
    padding: 12px 12px !important;
    cursor: pointer !important;
    -webkit-user-select: none !important;
    -moz-user-select: none !important;
    -ms-user-select: none !important;
    user-select: none !important;
    -webkit-transition: all 60ms ease-in-out !important;
    transition: all 60ms ease-in-out !important;
    text-align: center !important;
    white-space: nowrap !important;
    text-decoration: none !important;
    text-transform: none !important;
    text-transform: capitalize !important;
    color: #fff !important;
    border: 0 none !important;
    border-radius: 4px !important;
    font-size: 14px !important;
    font-weight: 500 !important;
    line-height: 1.3 !important;
    -webkit-appearance: none !important;
    -moz-appearance: none !important;
    appearance: none !important;
    -webkit-box-pack: center !important;
    -webkit-justify-content: center !important;
    -ms-flex-pack: center !important;
    justify-content: center !important;
    -webkit-box-align: center !important;
    -webkit-align-items: center !important;
    -ms-flex-align: center !important;
    align-items: center !important;
    -webkit-box-flex: 0 !important;
    -webkit-flex: 0 0 160px !important;
    -ms-flex: 0 0 160px !important;
    flex: 0 0 160px !important;
    color: #FFFFFF !important;
    background: #039389 !important;
}

.wpappp_buton:hover{
    -webkit-transition: all 60ms ease !important;
    transition: all 60ms ease !important;
    opacity: .85 !important;
}

.wpappp_buton:active{
    -webkit-transition: all 60ms ease !important;
    transition: all 60ms ease !important;
    -webkit-transform: scale(0.97) !important;
    transform: scale(0.97) !important;
    opacity: .75 !important;
}

#upc_subscriber_tab{
    font-size: 18px;
}

</style>
<div id="wpappp-popup-tab-content4" class="wpappp-popup-tab-content">
            <p style="text-align:center;margin:0" class="wpappp_sub_text">Subscriber List</p>
            <p style="text-align:center;margin:0;font-size: 16px;"><strong>Subscriber's data is saved locally do make backup or export before uninstalling plugin</strong></p>
            <div>
                <table id="upc_subscriber_tab">
                    <tr>
                        <td><strong>Download & Export All Subscriber to CSV file: </strong></td>
                        <td><a href="<?php echo plugins_url('sfbap_subscriber_list.php?download_file=sfbap_subcribers_list.csv',__FILE__); ?>" class="wpappp_buton" id="wpappp_export_to_csv" value="Export to CSV" href="#">Download & Export to CSV</a></td>
                        <td><strong>Delete All Subscibers from Database: </strong></td>
                        <td><input type="button" class="wpappp_buton" id="sfbap_delete_all_data" value="Delete All Data" /></td>
                    </tr>
                </table>
            </div>
            <div>
               
                    <?php
                    global $wpdb;
                    $table_name = $wpdb->prefix . "sfbap_subscribers_lists";
                    $result = $wpdb->get_results ( "SELECT * FROM ".$table_name );
                    if($result){?>
                         <table border="1" class="responstable">
                    <tr>
                        <th width="15%">ID</th>
                        <th width="25%">Name</th>
                        <th width="45%">Email</th>
                        <th width="25%">Edit</th>
                    </tr><?php
                        foreach ( $result as $print )   {
                            ?>
                            <tr>
                                <td><?php echo $print->id;?></td>
                                <td><?php echo $print->name;?></td>
                                <td><?php echo $print->email;?></td>
                                <td><input type="button" data-delete="<?php echo $print->id;?>" class="upc_delete_entry wpappp_buton sfbap_delete_entry" id="upc_delete_entry" value="Delete Record" style="margin:0 auto;display:block;"/>
                                </td>
                            </tr>
                            <?php }
                        }
                        else{
                            ?><p style="font-size: 18px;font-weight: bold;margin: 0 auto;">No Subscriber Found!</p><?php
                        }
                        ?>    
                    </div>

                </div>