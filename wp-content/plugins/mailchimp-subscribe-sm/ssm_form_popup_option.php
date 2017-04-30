<?php
function ssm_form_popup_option($post){
    // $post is already set, and contains an object: the WordPress post
    global $post;

     $sm_popup_active = get_post_meta($post->ID,'sm_popup_active',true);
     $smf_popup_overlay_color = get_post_meta($post->ID,'smf_popup_overlay_color',true);
     $smf_popup_close_color = get_post_meta($post->ID,'smf_popup_close_color',true);
     $smf_popup_close_text = get_post_meta($post->ID,'smf_popup_close_text',true);
     $smf_popup_delay = get_post_meta( $post->ID,'smf_popup_delay',true);
?>

<style type="text/css">
    .formLayout_1
    {

        
        padding: 10px;
        width: 550px;
        margin: 10px;

        

    }
    
    .formLayout_1 label 
    {
        display: block;
        width: 195px;
        float: left;
        margin-bottom: 20px;
        margin-left: 20px;
    }
    .formLayout_1 input{
         display: block;
        float: left;
        margin-bottom: 20px;

    }
 
    .formLayout_1 label
    {
        text-align: right;
        padding-right: 20px;
        font-size: 16px;
        font-weight: bold;
    }
 
    br
    {
        clear: left;
    }

#label{
float: left;
text-align: left;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px !important;
  padding: 0 !important;
  height: 34px;
  float: right;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
    </style>
    <div class='formLayout_1'>  
    <br>
    <h2>PopUp Options For Subscribe Form</h2>
    <br>
    <br>
    <label for='sm_popup_active'>Enable PopUp :</label>
    <label class="switch">
      <input type="checkbox" name='sm_popup_active' value='true' <?php   checked( "true", $sm_popup_active); ?> >
      <div class="slider round"></div>
    </label>
    <br>
    <br>
    <label for='smf_popup_overlay_color'>PopUp Delay <span style='font-size:11px;'>(In seconds)</span> : </label>
    <input type='number' name='smf_popup_delay' value='<?php echo $smf_popup_delay; ?>'/>
     <br>
     <br>

    <label for='smf_popup_overlay_color'>OverLay Color : </label>
     <input type='text' class='color_picker' name='smf_popup_overlay_color' data-alpha="true" value='<?php echo $smf_popup_overlay_color; ?>'/>
     <br>
     <br>

    <label for='smf_popup_close_color'>Close Link Color : </label>
     <input type='text' class='color_picker' name='smf_popup_close_color' data-alpha="true" value='<?php echo $smf_popup_close_color; ?>'/>
     <br>
     <br>
     <label for='smf_popup_close_text'>Close Link Text :</label>
     <input type='text' name='smf_popup_close_text' value='<?php echo $smf_popup_close_text; ?>' style="width:300px;">
     <br>
     <br>

    </div>

  <div style='width:100%;text-align:center; background:#e3e3e3;height:60px;border-left:5px solid #a7d142;'>
<a href="http://web-settler.com/mailchimp-subscribe-form/?ref=popup" style='float: left;font-size: 19px; margin: 20px 0 0 10px;'id='pr_msg_link'><i>Unlock All Templates and get more amazing features Click Here</i></a>
  <?php submit_button('Update');?>
</div>

<?php

}
?>