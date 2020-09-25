<?php
if ( ! defined( 'ABSPATH' ) ) {
     exit;
 }                                            
 ?>
 <div  class="vx_div">
   <div class="vx_head">
<div class="crm_head_div"> <?php _e('5. Map Form Fields to Mailchimp Fields.', 'contact-form-mailchimp-crm'); ?></div>
<div class="crm_btn_div" title="<?php _e('Expand / Collapse','contact-form-mailchimp-crm') ?>"><i class="fa crm_toggle_btn vx_action_btn fa-minus"></i></div>
<div class="crm_clear"></div> 
  </div>
  <div class="vx_group">
  <div class="vx_col1">
  <label>
  <?php _e("Fields Mapping", 'contact-form-mailchimp-crm'); ?>
  <?php $this->tooltip("vx_map_fields") ?>
  </label>
  </div>
  <div class="vx_col2">
  <div id="vx_fields_div">
  <?php 
   $req_span=" <span class='vx_red vx_required'>(".__('Required','contact-form-mailchimp-crm').")</span>";
 $req_span2=" <span class='vx_red vx_required vx_req_parent'>(".__('Required','contact-form-mailchimp-crm').")</span>";


  foreach($map_fields as $k=>$v){

  $sel_val=isset($map[$k]['field']) ? $map[$k]['field'] : ""; 
  $val_type=isset($map[$k]['type']) && !empty($map[$k]['type']) ? $map[$k]['type'] : "field"; 

      if(isset($skipped_fields[$k])){
        continue;
    }
    
  $options=$this->form_fields_options($form_id,$sel_val); 
    $display="none"; $btn_icon="fa-plus";
  if(isset($map[$k][$val_type]) && !empty($map[$k][$val_type])){
    $display="block"; 
    $btn_icon="fa-minus";   
  }
  $required=isset($v['req']) && $v['req'] == "true" ? true : false;
   $req_html=$required ? $req_span : "";
  ?>
<div class="crm_panel crm_panel_100">
<div class="crm_panel_head2">
<div class="crm_head_div"><span class="crm_head_text crm_text_label">  <?php echo $v['label'];?></span> <?php echo $req_html ?></div>
<div class="crm_btn_div">
<?php
 if(! $required){   
?>
<i class="vx_remove_btn vx_remove_btn vx_action_btn fa fa-trash-o" title="<?php _e('Delete','contact-form-mailchimp-crm'); ?>"></i>
<?php } ?>
<i class="fa crm_toggle_btn vx_action_btn vx_btn_inner <?php echo $btn_icon ?>" title="<?php _e('Expand / Collapse','contact-form-mailchimp-crm') ?>"></i>
</div>
<div class="crm_clear"></div> </div>
<div class="more_options crm_panel_content" style="display: <?php echo $display ?>;">
  <?php if(!isset($v['name_c'])){ ?>

  <div class="crm-panel-description">
  <span class="crm-desc-name-div"><?php echo __('Name:','contact-form-mailchimp-crm')." ";?><span class="crm-desc-name"><?php echo $v['name']; ?></span> </span>
  <?php if($this->post('type',$v) !=""){ ?>
    <span class="crm-desc-type-div">, <?php echo __('Type:','contact-form-mailchimp-crm')." ";?><span class="crm-desc-type"><?php echo $v['type'] ?></span> </span>
<?php
   }
  if($this->post('maxlength',$v) !=""){ 
   ?>
   <span class="crm-desc-len-div">, <?php echo __('Max Length:','contact-form-mailchimp-crm')." ";?><span class="crm-desc-len"><?php echo $v['maxlength']; ?></span> </span>
  <?php 
  }     if($this->post('eg',$v) !=""){ 
   ?>
   <span class="crm-desc-eg-div">, <?php echo __('e.g:','contact-form-mailchimp-crm')." ";?><span class="crm-desc-eg"><?php echo $v['eg']; ?></span> </span>
  <?php 
  }
  ?>
   </div> 
  <?php
  }
  ?>

<div class="vx_margin">


<div class="entry_row">
<div class="entry_col1 vx_label"><label  for="vx_type_<?php echo $k ?>"><?php _e('Field Type','contact-form-mailchimp-crm') ?></label></div>
<div class="entry_col2">
<select name='meta[map][<?php echo $k ?>][type]'  id="vx_type_<?php echo $k ?>" class='vxc_field_type vx_input_100'>
<?php
  foreach($sel_fields as $f_key=>$f_val){
  $select="";
  if($this->post2($k,'type',$map) == $f_key)
  $select='selected="selected"';
  ?>
  <option value="<?php echo $f_key ?>" <?php echo $select ?>><?php echo $f_val?></option>    
  <?php } ?> 
</select>
</div>
<div class="crm_clear"></div>
</div>  
<div class="entry_row entry_row2">
<div class="entry_col1 vx_label">
<label for="vx_field_<?php echo $k ?>" style="<?php if($this->post2($k,'type',$map) != ''){echo 'display:none';} ?>" class="vxc_fields vxc_field_"><?php _e('Select Field','contact-form-mailchimp-crm') ?></label>

<label for="vx_value_<?php echo $k ?>" style="<?php if($this->post2($k,'type',$map) != 'value'){echo 'display:none';} ?>" class="vxc_fields vxc_field_value"> <?php _e('Custom Value','contact-form-mailchimp-crm') ?></label>
</div>
<div class="entry_col2">
<div class="vxc_fields vxc_field_value" style="<?php if($this->post2($k,'type',$map) != 'value'){echo 'display:none';} ?>">
<input type="text" name='meta[map][<?php echo $k?>][value]'  id="vx_value_<?php echo $k ?>" value='<?php echo $this->post2($k,'value',$map)?>' placeholder='<?php _e("Custom Value",'contact-form-mailchimp-crm')?>' class='vx_input_100 vxc_field_input'>
<div class="howto"><?php echo sprintf(__('You can add a form field %s in custom value from following form fields','contact-form-mailchimp-crm'),'<code>{field_id}</code>')?></div>
</div>


<select name="meta[map][<?php echo $k ?>][field]"  id="vx_field_<?php echo $k ?>" class="vxc_field_option vx_input_100">
<?php echo $options ?>
</select>


</div>
<div class="crm_clear"></div>
</div>  

  </div></div>
  <div class="clear"></div>
  </div>
<?php
  }
  ?> 
 
 <div id="vx_field_temp" style="display:none"> 
  <div class="crm_panel crm_panel_100 vx_fields">
<div class="crm_panel_head2">
<div class="crm_head_div"><span class="crm_head_text crm_text_label">  <?php _e('Custom Field', 'contact-form-mailchimp-crm');?></span> </div>
<div class="crm_btn_div">
<i class="vx_remove_btn vx_action_btn fa fa-trash-o" title="<?php _e('Delete','contact-form-mailchimp-crm'); ?>"></i>
<i class="fa crm_toggle_btn vx_action_btn vx_btn_inner fa-minus" title="<?php _e('Expand / Collapse','contact-form-mailchimp-crm') ?>"></i>
</div>
<div class="crm_clear"></div> </div>
<div class="more_options crm_panel_content" style="display: block;">


  <div class="crm-panel-description">
  <span class="crm-desc-name-div"><?php echo __('Name:','contact-form-mailchimp-crm')." ";?><span class="crm-desc-name"></span> </span>
  <span class="crm-desc-type-div">, <?php echo __('Type:','contact-form-mailchimp-crm')." ";?><span class="crm-desc-type"></span> </span>
  <span class="crm-desc-len-div">, <?php echo __('Max Length:','contact-form-mailchimp-crm')." ";?><span class="crm-desc-len"></span> </span>

  <span class="crm-desc-eg-div">, <?php echo __('e.g:','contact-form-mailchimp-crm')." ";?><span class="crm-desc-eg"></span> </span>
  
   </div> 


<div class="vx_margin">


<div class="entry_row">
<div class="entry_col1 vx_label"><label  for="vx_type"><?php _e('Field Type','contact-form-mailchimp-crm') ?></label></div>
<div class="entry_col2">
<select name='type' class='vxc_field_type vx_input_100'>
<?php
  foreach($sel_fields as $f_key=>$f_val){
  ?>
  <option value="<?php echo $f_key ?>"><?php echo $f_val?></option>    
  <?php } ?> 
</select>
</div>
<div class="crm_clear"></div>
</div>  

<div class="entry_row entry_row2">
<div class="entry_col1 vx_label">
<label for="vx_field_" class="vxc_fields vxc_field_"><?php _e('Select Field','contact-form-mailchimp-crm') ?></label>

<label for="vx_value_" style="display:none" class="vxc_fields vxc_field_value"> <?php _e('Custom Value','contact-form-mailchimp-crm') ?></label>
</div>
<div class="entry_col2">
<div class="vxc_fields vxc_field_value" style="display:none">
<input type="text" name='value'  id="vx_value_"  placeholder="<?php _e("Custom Value",'contact-form-mailchimp-crm')?>" class="vx_input_100 vxc_field_input">
<div class="howto"><?php echo sprintf(__('You can add a form field %s in custom value from following form fields','contact-form-mailchimp-crm'),'<code>{field_id}</code>')?></div>
</div>


<select name="field"  id="vx_field_" class="vxc_field_option vx_input_100">
<?php echo $this->form_fields_options($form_id) ?>
</select>


</div>
<div class="crm_clear"></div>
</div>  

  </div></div>
  <div class="clear"></div>
  </div>
   </div>
   <!--end field box template--->

   <div class="crm_panel crm_panel_100">
<div class="crm_panel_head2">
<div class="crm_head_div"><span class="crm_head_text ">  <?php _e("Add New Field", 'contact-form-mailchimp-crm');?></span> </div>
<div class="crm_btn_div"><i class="fa crm_toggle_btn vx_btn_inner fa-minus" style="display: none;" title="<?php _e('Expand / Collapse','contact-form-mailchimp-crm'); ?>"></i></div>
<div class="crm_clear"></div> </div>
<div class="more_options crm_panel_content" style="display: block;">

<div class="vx_margin">
<div style="display: table">
  <div style="display: table-cell; width: 85%; padding-right: 14px;">
<select id="vx_add_fields_select" class="vx_input_100" autocomplete="off">
<option value=""></option>
<?php
$json_fields=array();
 foreach($fields as $k=>$v){
     $v['type']=ucfirst($v['type']);
     if(!empty($v['options'])){
        $ops=array();
        foreach($v['options'] as $op_id=>$op){
            if($k != 'interests'){
               $op_id=$op; 
            }
            $ops[$op_id]=$op;
        } 
         $v['options']=$ops;
     }
    
     $json_fields[$k]=$v;
   $disable='';
   if(isset($map_fields[$k]) || isset($skip_fields[$k])){
    $disable='disabled="disabled"';   
   } 
echo "<option value='{$k}' {$disable} >{$v['label']}</option>";   
} ?>
</select>
  </div><div style="display: table-cell;">
 <button type="button" class="button button-default" style="vertical-align: middle;" id="xv_add_custom_field"><i class="fa fa-plus-circle" ></i> <?php _e('Add Field','contact-form-mailchimp-crm')?></button>
  
  </div></div>
 

  </div></div>
  <div class="clear"></div>
  </div>
  <!--add new field box template--->
  <script type="text/javascript">
var crm_fields=<?php echo json_encode($json_fields); ?>;

</script> 

  </div>
  </div>
  <div class="clear"></div>
  </div>
  </div>
  <div class="vx_div">
   <div class="vx_head">
<div class="crm_head_div"> <?php _e('6. When to Send Entry to Mailchimp.', 'contact-form-mailchimp-crm'); ?></div>
<div class="crm_btn_div" title="<?php _e('Expand / Collapse','contact-form-mailchimp-crm') ?>"><i class="fa crm_toggle_btn vx_action_btn fa-minus"></i></div>
<div class="crm_clear"></div> 
  </div>
 
  <div class="vx_group">
  <div class="vx_row">
  <div class="vx_col1">
  <label for="crm_manual_export">
  <?php esc_html_e('Disable Automatic Export', 'contact-form-mailchimp-crm'); ?>
  <?php $this->tooltip("vx_manual_export") ?>
  </label>
  </div>
  <div class="vx_col2">
  <fieldset>
  <legend class="screen-reader-text"><span>
  <?php _e('Disable Automatic Export', 'contact-form-mailchimp-crm'); ?>
  </span></legend>
  <label for="crm_manual_export">
  <input name="meta[manual_export]" id="crm_manual_export" type="checkbox" value="1" <?php echo isset($meta['manual_export'] ) ? 'checked="checked"' : ''; ?>>
  <?php _e( 'Manually send the entries to Mailchimp.', 'contact-form-mailchimp-crm'); ?> </label>
  </fieldset>
  </div>
  <div style="clear: both;"></div>
  </div>
  <div class="vx_row">
  <div class="vx_col1">
  <label for="crm_optin">
  <?php _e("Opt-In Condition", 'contact-form-mailchimp-crm'); ?>
  <?php $this->tooltip("vx_optin_condition") ?>
  </label>
  </div>
  <div class="vx_col2">
  <div>
  <input type="checkbox" style="margin-top: 0px;" id="crm_optin" class="crm_toggle_check" name="meta[optin_enabled]" value="1" <?php echo !empty($meta["optin_enabled"]) ? "checked='checked'" : ""?>/>
  <label for="crm_optin">
  <?php _e("Enable", 'contact-form-mailchimp-crm'); ?>
  </label>
  </div>
  <div style="clear: both;"></div>
  <div id="crm_optin_div"  style="margin-top: 16px; <?php echo empty($meta["optin_enabled"]) ? "display:none" : ""?>">
  <div>
  <?php
  $sno=0;
  foreach($filters as $filter_k=>$filter_v){
  $sno++;
                              ?>
  <div class="vx_filter_or" data-id="<?php echo $filter_k ?>">
  <?php if($sno>1){ ?>
  <div class="vx_filter_label">
  <?php _e('OR','contact-form-mailchimp-crm') ?>
  </div>
  <?php } ?>
  <div class="vx_filter_div">
  <?php
  if(is_array($filter_v)){
  $sno_i=0;
  foreach($filter_v as $s_k=>$s_v){   
  $sno_i++;
  
  ?>
  <div class="vx_filter_and">
  <?php if($sno_i>1){ ?>
  <div class="vx_filter_label">
  <?php _e('AND','contact-form-mailchimp-crm') ?>
  </div>
  <?php } ?>
  <div class="vx_filter_field vx_filter_field1">
  <select id="crm_optin_field" name="meta[filters][<?php echo $filter_k ?>][<?php echo $s_k ?>][field]">
  <?php 
  echo $this->form_fields_options($form_id,$this->post('field',$s_v));
                ?>
  </select>
  </div>
  <div class="vx_filter_field vx_filter_field2">
  <select name="meta[filters][<?php echo $filter_k ?>][<?php echo $s_k ?>][op]" >
  <?php
                 foreach($vx_op as $k=>$v){
  $sel="";
  if($this->post('op',$s_v) == $k)
  $sel='selected="selected"';
                   echo "<option value='".$k."' $sel >".$v."</option>";
               } 
              ?>
  </select>
  </div>
  <div class="vx_filter_field vx_filter_field3">
  <input type="text" class="vxc_filter_text" placeholder="<?php _e('Value','contact-form-mailchimp-crm') ?>" value="<?php echo $this->post('value',$s_v) ?>" name="meta[filters][<?php echo $filter_k ?>][<?php echo $s_k ?>][value]">
  </div>
  <?php if( $sno_i>1){ ?>
  <div class="vx_filter_field vx_filter_field4"><i class="vx_icons-h vx_trash_and vxc_tips fa fa-trash-o" data-tip="Delete"></i></div>
  <?php } ?>
  <div style="clear: both;"></div>
  </div>
  <?php
  } }
                     ?>
  <div class="vx_btn_div">
  <button class="button button-default button-small vx_add_and" title="<?php _e('Add AND Filter','contact-form-mailchimp-crm'); ?>"><i class="vx_icons-s vx_trash_and fa fa-hand-o-right"></i>
  <?php _e('Add AND Filter','contact-form-mailchimp-crm') ?>
  </button>
  <?php if($sno>1){ ?>
  <a href="#" class="vx_trash_or">
  <?php _e('Trash','contact-form-mailchimp-crm') ?>
  </a>
  <?php } ?>
  </div>
  </div>
  </div>
  <?php
                          }
                      ?>
  <div class="vx_btn_div">
  <button class="button button-default  vx_add_or" title="<?php _e('Add OR Filter','contact-form-mailchimp-crm'); ?>"><i class="vx_icons vx_trash_and fa fa-check"></i>
  <?php _e('Add OR Filter','contact-form-mailchimp-crm') ?>
  </button>
  </div>
  </div>
  <!--------- template------------>
  <div style="display: none;" id="vx_filter_temp">
  <div class="vx_filter_or">
  <div class="vx_filter_label">
  <?php _e('OR','contact-form-mailchimp-crm') ?>
  </div>
  <div class="vx_filter_div">
  <div class="vx_filter_and">
  <div class="vx_filter_label vx_filter_label_and">
  <?php _e('AND','contact-form-mailchimp-crm') ?>
  </div>
  <div class="vx_filter_field vx_filter_field1">
  <select id="crm_optin_field" name="field">
  <?php 
  echo $this->form_fields_options($form_id);
                ?>
  </select>
  </div>
  <div class="vx_filter_field vx_filter_field2">
  <select name="op" >
  <?php
                 foreach($vx_op as $k=>$v){
  
                   echo "<option value='".$k."' >".$v."</option>";
               } 
              ?>
  </select>
  </div>
  <div class="vx_filter_field vx_filter_field3">
  <input type="text" class="vxc_filter_text" placeholder="<?php _e('Value','contact-form-mailchimp-crm') ?>" name="value">
  </div>
  <div class="vx_filter_field vx_filter_field4"><i class="vx_icons vx_trash_and vxc_tips fa fa-trash-o"></i></div>
  <div style="clear: both;"></div>
  </div>
  <div class="vx_btn_div">
  <button class="button button-default button-small vx_add_and" title="<?php _e('Add AND Filter','contact-form-mailchimp-crm'); ?>"><i class="vx_icons vx_trash_and  fa fa-hand-o-right"></i>
  <?php _e('Add AND Filter','contact-form-mailchimp-crm') ?>
  </button>
  <a href="#" class="vx_trash_or">
  <?php _e('Trash','contact-form-mailchimp-crm') ?>
  </a> </div>
  </div>
  </div>
  </div>
  <!--------- template end ------------>
   <p><input type="checkbox" style="margin-top: 0px; " id="crm_unsub" class="crm_toggle_check" name="meta[un_sub]" value="1" <?php echo !empty($meta["un_sub"]) ? "checked='checked'" : ""?> autocomplete="off"/>
    <label for="crm_unsub"><?php _e('If Condition(s) do not match then remove from List', 'contact-form-mailchimp-crm'); ?></label></p>
    
  </div>
  </div>
  <div style="clear: both;"></div>
  </div>
<?php
   if($api_type != "web"){ 
         $settings=get_option($this->type.'_settings',array());
         if(!empty($settings['notes'])){
?>

  <div class="vx_row">
  <div class="vx_col1">
  <label for="vx_notes"><?php _e('Entry Notes ', 'contact-form-mailchimp-crm');  $this->tooltip('vx_entry_notes');?></label>
  </div>
  <div class="vx_col2">
  <input type="checkbox" style="margin-top: 0px;" id="vx_notes" class="crm_toggle_check" name="meta[entry_notes]" value="1" <?php echo !empty($meta['entry_notes']) ? 'checked="checked"' : ''?> autocomplete="off"/>
    <label for="vx_notes"><?php _e('Add / delete notes to Mailchimp when added / deleted in Contact Form Entries Plugin', 'contact-form-mailchimp-crm'); ?></label>
  
  </div>
  <div class="clear"></div>
  </div>
<?php
         }
    }
?>

  </div> 
  </div>
  <?php

   $panel_count=6;

      $panel_count++;
  ?>     
  <div class="vx_div "> 
  <div class="vx_head ">
<div class="crm_head_div"> <?php  echo sprintf(__('%s. Choose Primary Key.',  'contact-form-mailchimp-crm' ),$panel_count); ?></div>
<div class="crm_btn_div"><i class="fa crm_toggle_btn fa-minus" title="<?php _e('Expand / Collapse','contact-form-mailchimp-crm') ?>"></i></div>
<div class="crm_clear"></div> 
  </div>                    
    <div class="vx_group">
  <div class="vx_row">
  <div class="vx_col1">
  <label for="crm_primary_field"><?php _e('Select Primary Key','%dd%') ?></label>
  </div><div class="vx_col2">
  <select id="crm_primary_field" name="meta[primary_key]" class="vx_sel vx_input_100" autocomplete="off">
  <?php echo $this->crm_select($fields,$meta['primary_key']); ?>
  </select> 
  <div class="description" style="float: none; width: 90%"><?php _e('If you want to update a pre-existing object, select what should be used as a unique identifier ("Primary Key"). For example, this may be an email address, lead ID, or address. When a new entry comes in with the same "Primary Key" you select, a new object will not be created, instead the pre-existing object will be updated.', '%dd%'); ?></div>
  </div>
  <div class="clear"></div>
  </div>
 <div class="vx_row">
  <div class="vx_col1">
  <label for="vx_update"><?php _e('Update Entry ', '%dd%');?></label>
  </div>
  <div class="vx_col2">
  <input type="checkbox" style="margin-top: 0px;" id="vx_update" class="crm_toggle_check" name="meta[update]" value="1" <?php echo !empty($meta['update']) ? 'checked="checked"' : ''?> autocomplete="off"/>
    <label for="vx_update"><?php _e('Do not update entry, if already exists', '%dd%'); ?></label>
  
  </div>
  <div class="clear"></div>
  </div>
   
   
  </div>

  </div>
  <!-------------------------- lead owner -------------------->

<div class="vx_div">
     <div class="vx_head">
<div class="crm_head_div"> <?php echo sprintf(__('%s. Add Note.', 'contact-form-mailchimp-crm'),$panel_count+=1); ?></div>
<div class="crm_btn_div" title="<?php _e('Expand / Collapse','contact-form-mailchimp-crm') ?>"><i class="fa crm_toggle_btn fa-minus"></i></div>
<div class="crm_clear"></div> 
  </div>


  <div class="vx_group">

    <div class="vx_row">
  <div class="vx_col1">
  <label for="crm_note">
  <?php _e("Add Note ", 'contact-form-mailchimp-crm'); ?>
  <?php $this->tooltip('vx_entry_note') ?>
  </label>
  </div>
  <div class="vx_col2">
  <input type="checkbox" style="margin-top: 0px;" id="crm_note" class="crm_toggle_check" name="meta[note_check]" value="1" <?php echo !empty($meta['note_check']) ? "checked='checked'" : ""?>/>
  <label for="crm_note_div">
  <?php _e("Enable", 'contact-form-mailchimp-crm'); ?>
  </label>
  </div>
  <div style="clear: both;"></div>
  </div>
  <div id="crm_note_div" style="margin-top: 16px; <?php echo empty($meta["note_check"]) ? "display:none" : ""?>">
  <div class="vx_row">
  <div class="vx_col1">
  <label for="crm_note_fields">
  <?php _e( 'Note Fields ', 'contact-form-mailchimp-crm' ); $this->tooltip("vx_note_fields") ?>
  </label>
  </div>
  <div class="vx_col2">
  <select name="meta[note_fields][]" id="crm_note_fields" multiple="multiple" class="crm_sel crm_note_sel crm_sel2 vx_input_100" style="width: 100%"  autocomplete="off">

  <?php echo $this->form_fields_options($form_id,$this->post('note_fields',$meta)); ?>
  </select>
    <span class="howto">
  <?php _e('You can select multiple fields.', 'contact-form-mailchimp-crm'); ?>
  </span>
   </div>
  <div style="clear: both;"></div>
  </div>
  
  <div class="vx_row">
  <div class="vx_col1">
  <label for="crm_disable_note">
  <?php _e( 'Disable Note ', 'contact-form-mailchimp-crm' ); $this->tooltip("vx_disable_note") ?>
  </label>
  </div>
  <div class="vx_col2">
  
  <input type="checkbox" style="margin-top: 0px;" id="crm_disable_note" class="crm_toggle_check" name="meta[disable_entry_note]" value="1" <?php echo !empty($meta['disable_entry_note']) ? "checked='checked'" : ""?>/>
  <label for="crm_disable_note">
  <?php _e('Do not Add Note if entry already exists in Mailchimp', 'contact-form-mailchimp-crm'); ?>
  </label>
    
   </div>
  <div style="clear: both;"></div>
  </div>
  
  </div>

  </div>
  </div>
  
<?php 
$panel_count++;
$statuses=array('subscribed'=>'Subscribed','unsubscribed'=>'UnSubscribed','cleaned'=>'Cleaned','pending'=>'Pending (double optin)');
$langs=array("en"=>"English","ar"=>"Arabic","af"=>"Afrikaans","be"=>"Belarusian","bg"=>"Bulgarian","ca"=>"Catalan","zh"=>"Chinese","hr"=>"Croatian","cs"=>"Czech","da"=>"Danish","nl"=>"Dutch","et"=>"Estonian","fa"=>"Farsi","fi"=>"Finnish","fr"=>"French (France)","fr_CA"=>"French (Canada)","de"=>"German","el"=>"Greek","he"=>"Hebrew","hi"=>"Hindi","hu"=>"Hungarian","is"=>"Icelandic","id"=>"Indonesian","ga"=>"Irish","it"=>"Italian","ja"=>"Japanese","km"=>"Khmer","ko"=>"Korean","lv"=>"Latvian","lt"=>"Lithuanian","mt"=>"Maltese","ms"=>"Malay","mk"=>"Macedonian","no"=>"Norwegian","pl"=>"Polish","pt"=>"Portuguese (Brazil)","pt_PT"=>"Portuguese (Portugal)","ro"=>"Romanian","ru"=>"Russian","sr"=>"Serbian","sk"=>"Slovak","sl"=>"Slovenian","es"=>"Spanish (Mexico)","es_ES"=>"Spanish (Spain)","sw"=>"Swahili","sv"=>"Swedish","ta"=>"Tamil","th"=>"Thai","tr"=>"Turkish","uk"=>"Ukrainian","vi"=>"Vietnamese");
$email_types=array('html'=>'Html', 'text'=>'Text');
if(empty($meta['status'])){ $meta['status']='subscribed'; }
if(empty($meta['language'])){ $meta['language']='en'; }
if(empty($meta['email_type'])){ $meta['email_type']='html'; }
?>
<div class="vx_div vx_refresh_panel">    
      <div class="vx_head ">
<div class="crm_head_div"> <?php echo sprintf(__('%s. Status and other settings',  'contact-form-mailchimp-crm' ),$panel_count); ?></div>
<div class="crm_btn_div"><i class="fa crm_toggle_btn fa-minus" title="<?php _e('Expand / Collapse','contact-form-mailchimp-crm') ?>"></i></div>
<div class="crm_clear"></div> 
  </div>                 
    <div class="vx_group ">
   <div class="vx_row"> 
   <div class="vx_col1"> 
  <label for="crm_sel_status"><?php _e('Status/ Double Optin', 'contact-form-mailchimp-crm'); ?></label>
  </div>
  <div class="vx_col2">
  <select id="crm_sel_status" name="meta[status]" style="width: 100%;" autocomplete="off">
  <?php echo $this->gen_select($statuses,$this->post('status',$meta)); ?>
  </select>
  <div class="howto"><?php _e('Select status as "pending" if you want people to confirm their email address before being subscribed', 'contact-form-mailchimp-crm'); ?></div>
  </div>
<div class="clear"></div>
</div>
  
   <div class="vx_row"> 
   <div class="vx_col1"> 
  <label for="crm_sel_language"><?php _e('Language', 'contact-form-mailchimp-crm'); ?></label>
  </div>
  <div class="vx_col2">
  <select id="crm_sel_language" name="meta[language]" style="width: 100%;" autocomplete="off">
  <?php echo $this->gen_select($langs,$this->post('language',$meta)); ?>
  </select>
  
  </div>
<div class="clear"></div>
</div>

   <div class="vx_row"> 
   <div class="vx_col1"> 
  <label for="crm_sel_email"><?php _e('Email Type', 'contact-form-mailchimp-crm'); ?></label>
  </div>
  <div class="vx_col2">
  <select id="crm_sel_email" name="meta[email_type]" style="width: 100%;" autocomplete="off">
  <?php echo $this->gen_select($email_types,$this->post('email_type',$meta)); ?>
  </select>
  
  </div>
<div class="clear"></div>
</div>

   <div class="vx_row"> 
   <div class="vx_col1"> 
  <label for="crm_sel_vip"><?php _e('Add to VIP', 'contact-form-mailchimp-crm'); ?></label>
  </div>
  <div class="vx_col2">
  <select id="crm_sel_vip" name="meta[vip]" style="width: 100%;" autocomplete="off">
<option value=""><?php _e('No', 'contact-form-mailchimp-crm'); ?></option>
<option value="yes" <?php if(!empty($meta['vip'])){ echo 'selected="selected"'; } ?>><?php _e('Yes', 'contact-form-mailchimp-crm'); ?></option>
  </select>
  
  </div>
<div class="clear"></div>
</div>

  </div>
  </div>
<?php
  if(vxcf_mailchimp::$is_pr){

      $panel_count++;
      $groups=$this->post('groups',$info_meta);
  ?>
    <div class="vx_div vx_refresh_panel ">    
      <div class="vx_head ">
<div class="crm_head_div"> <?php  echo sprintf(__('%s. Groups',  'contact-form-mailchimp-crm' ),$panel_count); ?></div>
<div class="crm_btn_div"><i class="fa crm_toggle_btn fa-minus" title="<?php _e('Expand / Collapse','contact-form-mailchimp-crm') ?>"></i></div>
<div class="crm_clear"></div> 
  </div>                 
    <div class="vx_group ">
   <div class="vx_row"> 
   <div class="vx_col1"> 
  <label for="crm_camp"><?php _e("Assign Interests ", 'contact-form-mailchimp-crm'); $this->tooltip('vx_stage_check');?></label>
  </div>
  <div class="vx_col2">
  <input type="checkbox" style="margin-top: 0px;" id="crm_camp" class="crm_toggle_check <?php if(empty($groups)){echo 'vx_refresh_btn';} ?>" name="meta[assign_group]" value="1" <?php echo !empty($meta["assign_group"]) ? "checked='checked'" : ""?> autocomplete="off"/>
    <label for="crm_optin"><?php _e("Enable", 'contact-form-mailchimp-crm'); ?></label>
  </div>
<div class="clear"></div>
</div>
    <div id="crm_camp_div" style="<?php echo empty($meta["assign_group"]) ? "display:none" : ""?>">

  <div class="vx_row">
  <div class="vx_col1">
  <label><?php _e('Groups List ','contact-form-mailchimp-crm'); $this->tooltip('vx_stages'); ?></label>
  </div>
  <div class="vx_col2">
  <button class="button vx_refresh_data" data-id="refresh_groups" type="button" autocomplete="off" style="vertical-align: baseline;">
  <span class="reg_ok"><i class="fa fa-refresh"></i> <?php _e('Refresh Data','contact-form-mailchimp-crm') ?></span>
  <span class="reg_proc"><i class="fa fa-refresh fa-spin"></i> <?php _e('Refreshing...','contact-form-mailchimp-crm') ?></span>
  </button>
  </div> 
   <div class="clear"></div>
  </div> 
 
<div id="vx_groups_data">
<?php $this->groups($meta,$info_meta);  ?>
</div>
  
  
  </div>
  

  </div>
  </div>   
<?php
  }
?>
  <div class="button-controls submit" style="padding-left: 5px;">
  <input type="hidden" name="form_id" value="<?php echo $form_id ?>">
  <button type="submit" title="<?php _e('Save Feed','contact-form-mailchimp-crm'); ?>" name="<?php echo $this->id ?>_submit" class="button button-primary button-hero"> <i class="vx_icons vx vx-arrow-50"></i> <?php echo empty($fid) ? __("Save Feed", 'contact-form-mailchimp-crm') : __("Update Feed", 'contact-form-mailchimp-crm'); ?> </button>
  </div>

  <?php
      do_action('vx_plugin_upgrade_notice_'.$this->type);
  ?>

