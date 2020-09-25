<?php
/**
* Plugin Name: Contact Form 7 Mailchimp
* Description: Integrates Contact Form 7 and <a href="https://wordpress.org/plugins/contact-form-entries/">Contact Form Entries Plugin</a> with Mailchimp allowing form submissions to be automatically sent to your Mailchimp account 
* Version: 1.0.5
* Requires at least: 3.8
* Tested up to: 5.3
* Author URI: https://www.crmperks.com
* Plugin URI: https://www.crmperks.com/plugins/contact-form-plugins/contact-form-mailchimp-plugin/
* Author: CRM Perks.
* Text Domain: contact-form-mailchimp
* Domain Path: /languages/
*/
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;


if( !class_exists( 'vxcf_mailchimp' ) ):


class vxcf_mailchimp {

  
 public  $url = "https://www.crmperks.com";

  public  $crm_name = "mailchimp";
  public  $id = "vxcf_mailchimp";
  public  $domain = "vxcf-mailchimp";
  public  $version = "1.0.5";
  public  $update_id = "6000001";
  public  $min_cf_version = "1.0";
  public $type = "vxcf_mailchimp";
  public  $fields = null;
  public  $data = null;

  private $filter_condition;
  private $plugin_dir= "";
  private $temp;
  private $crm_arr= false;
  public $notice_js= false;
  public static $title='Contact Form Mailchimp Plugin';  
  public static $path = ''; 
  public static $slug = "";
  public static $debug_html = '';
  public static $save_key='';  
  public static  $lic_msg = "";
  public static $db_version='';  
  public static $vx_plugins;  
  public static $note;
  public static $feeds_res;    
  public static $cf_status='';    
  public static $cf_status_msg='';    
  public static $tooltips;    
  public static $entry_created=false;
    public static $plugin;       
  public static $api_timeout;  
  public static $is_pr;        

 public function instance(){ 
      add_action( 'plugins_loaded', array( $this, 'setup_main' ) );
register_deactivation_hook(__FILE__,array($this,'deactivate'));
register_activation_hook(__FILE__,(array($this,'activate')));



 }   
  /**
  * Plugin starting point. Will load appropriate files
  * 
  */
  public  function init(){

/*      self::$cf_status= $this->cf_status();
    if(self::$cf_status !== 1){
  add_action( 'admin_notices', array( $this, 'install_cf_notice' ) );
  add_action( 'after_plugin_row_'.self::$slug, array( $this, 'install_cf_notice_plugin_row' ) );    
  return;
  } */
  
$pro_file=self::$path . 'wp/crmperks-notices.php';
if(file_exists($pro_file)){ 
include_once($pro_file); 
}else{
//plugin api
$this->plugin_api(true);    
self::$is_pr=true;
 $pro_file=self::$path . 'pro/add-ons.php';
if(file_exists($pro_file)){
include_once($pro_file);
} } 

require_once(self::$path . "includes/crmperks-cf.php"); 
require_once(self::$path . "includes/plugin-pages.php");    
 

  }
  
      /**
  * create tables and roles
  * 
  */
  public function setup_main(){
  
 add_filter('wpcf7_before_send_mail', array($this, 'form_submitted'),99);
 add_action('cfx_form_submitted', array($this, 'entry_created_crmperks'),10,3);
 add_action('vxcf_entry_created', array($this, 'entry_created'),10,3);
 add_action('vx_contact_created', array($this, 'entry_created_contacts'),10,3);
 add_action('vx_callcenter_entry_created', array($this, 'entry_created_callcenter'),10,3);
      
      if(is_admin()){
  self::$path=$this->get_base_path(); 
  add_action('init', array($this,'init'));
       //loading translations
load_plugin_textdomain('contact-form-mailchimp-crm', FALSE,  $this->plugin_dir_name(). '/languages/' );
  
  self::$db_version=get_option($this->type."_version");
  if(self::$db_version != $this->version && current_user_can( 'manage_options' )){
  $data=$this->get_data_object();
  $data->update_table();
  update_option($this->type."_version", $this->version);
  //add post permissions
  require_once(self::$path . "includes/install.php"); 
  $install=new vxcf_mailchimp_install();
  $install->create_roles();   

  }
}
  
  }
   public function form_submitted($form){ 

    //entries plugin exists , do not use this hook
    if(class_exists('vxcf_form')){ return; }
    $form_id=$form->id();
     $submission = WPCF7_Submission::get_instance();  
    
     $lead = $submission->uploaded_files();
if(!is_array($lead)){  $lead=array(); }
$form_title=$form->title();
$tags=array();

if(method_exists('WPCF7_ShortcodeManager','get_instance') || method_exists('WPCF7_FormTagsManager','get_instance')){

         $form_text=get_post_meta($form_id ,'_form',true); 
         
if(method_exists('WPCF7_FormTagsManager','get_instance')){
    $manager=WPCF7_FormTagsManager::get_instance(); 
$contents=$manager->scan($form_text); 
$tags=$manager->get_scanned_tags();   

}else if(method_exists('WPCF7_ShortcodeManager','get_instance')){ //
 $manager = WPCF7_ShortcodeManager::get_instance();
$contents=$manager->do_shortcode($form_text);
$tags=$manager->get_scanned_tags();    
} }


if(is_array($tags)){
  foreach($tags as $k=>$v){
      if(!empty($v['name'])){
      $name=$v['name'];
$val=$submission->get_posted_data($name);
if(!isset($lead[$name])){  $lead[$name]=$val;  }
         
  }  }
}
//var_dump($lead);
$form_arr=array('id'=>'cf_'.$form_id,'name'=>$form_title,'fields'=>$tags);
$this->entry_created($lead,'0',$form_arr); 

}
public  function plugin_api($start_instance=false){
    if(empty(self::$path)){   self::$path=$this->get_base_path(); }
   $api_file=self::$path . "pro/plugin-api.php";
    if(!class_exists('vxcf_plugin_api') && file_exists( $api_file)){   
require_once( $api_file );
}
if(class_exists('vxcf_plugin_api')){
 $slug=$this->get_slug();
 $settings_link=$this->link_to_settings();
 $is_plugin_page=$this->is_crm_page(); 
self::$plugin=new vxcf_plugin_api($this->id,$this->version,$this->type,$this->domain,$this->update_id,self::$title,$slug,self::$path,$settings_link,$is_plugin_page);
if($start_instance){
self::$plugin->instance();
}
} }
   /**
  * contact form entry created
  * 
  * @param mixed $entry
  * @param mixed $form
  */
  public function entry_created($entry,$entry_id,$form){

      self::$entry_created=true;
      
       if($this->do_actions()){ 
     do_action('vx_addons_save_entry',$entry_id,$entry,'cf',$form);
       }  

     $entry['__vx_id']=$entry_id; 
      $this->push($entry,$form,'',false);  
  } 
public function entry_created_crmperks($entry_id,$entry,$form){ 
    self::$entry_created=true;
       if($this->do_actions()){ 
     do_action('vx_addons_save_entry',$entry_id,$entry,'vf',$form);
       } 

$form['id']='vf_'.$form['id'];
$form['cfx_type']='vf';
$entry['__vx_id']=$entry_id;   
$this->push($entry,$form,'',false);    
}
  public function entry_created_contacts($entry,$entry_id,$form){

       if($this->do_actions()){ 
     do_action('vx_addons_save_entry',$entry_id,$entry,'cc',$form);
       }  

     $entry['__vx_id']=$entry_id; 
      $this->push($entry,$form,'',false);  
  } 
  public function entry_created_callcenter($entry,$entry_id,$form){ 
      $this->push($entry,$form,'',false); 
    }

  /**
  * Install Contact Form Notice
  * 
  */
  public function install_cf_notice(){
        $message=self::$cf_status_msg;
  if(!empty($message)){
  $this->display_msg('admin',$message,'gravity'); 
     $this->notice_js=true; 
  
  }
  }
   public function submit(){
       $entry='{"your-name":"Your Name (required)","your-email":"admin@localhost.com","your-subject":"subject test","your-message":"sdfsdfsdfsdf","your-country":["India"],"your-sports":["Tennis"],"your-fruit":["Banana"],"your-browser":"Safari","your-file":""}';
       $form='{"id":69,"name":"Contact form 1"}';
       $entry=json_decode($entry,true);
       $form=json_decode($form,true);
         apply_filters('vx_addons_save_entry',false,$entry_id,$entry,'cf',$form);   
         $entry['__vx_id']="1"; 
      $p=$this->push($entry,$form);  
   var_dump($p); die();  
 } 

  /**
  * Install Contact Form Notice (plugin row)
  * 
  */
  public function install_cf_notice_plugin_row(){
  $message=self::$cf_status_msg;
  if(!empty($message)){
   $this->display_msg('',$message,'gravity');
  } 
  }
  /**
  * display admin notice
  * 
  * @param mixed $type
  * @param mixed $message
  * @param mixed $id
  */
  public function display_msg($type,$message,$id=""){
  //exp 
  global $wp_version;
  $ver=floatval($wp_version);
  if($type == "admin"){
     if($ver<4.2){
  ?>
    <div class="error vx_notice notice" data-id="<?php echo $id ?>"><p style="display: table"><span style="display: table-cell; width: 98%"><span class="dashicons dashicons-megaphone"></span> <b><?php _e('Contact Form Mailchimp Plugin','contact-form-mailchimp-crm') ?>. </b><?php echo wp_kses_post($message);?> </span>
<span style="display: table-cell; padding-left: 10px; vertical-align: middle;"><a href="#" class="notice-dismiss" title="<?php _e('Dismiss Notice','contact-form-mailchimp-crm') ?>">dismiss</a></span> </p></div>
  <?php
     }else{
  ?>
  <div class="error vx_notice notice below-h2 is-dismissible" data-id="<?php echo $id ?>"><p><span class="dashicons dashicons-megaphone"></span> <b><?php _e('Contact Form Mailchimp Plugin','contact-form-mailchimp-crm') ?>. </b> <?php echo wp_kses_post($message);?> </p>
  </div>    
  <?php
     }
  }else{
  ?>
  <tr class="plugin-update-tr"><td colspan="5" class="plugin-update">
  <style type="text/css"> .vx_msg a{color: #fff; text-decoration: underline;} .vx_msg a:hover{color: #eee} </style>
  <div style="background-color: rgba(224, 224, 224, 0.5);  padding: 9px; margin: 0px 10px 10px 28px "><div style="background-color: #d54d21; padding: 5px 10px; color: #fff" class="vx_msg"> <span class="dashicons dashicons-info"></span> <?php echo wp_kses_post($message) ?>
</div></div></td></tr>
  <?php
  }   
  }
   /**
  * admin_screen_message function.
  * 
  * @param mixed $message
  * @param mixed $level
  */
  public  function screen_msg( $message, $level = 'updated') {
  echo '<div class="'. esc_attr( $level ) .' fade notice below-h2 is-dismissible"><p>';
  echo $message ;
  echo '</p></div>';
  } 


  /**
  * create tables and roles
  * 
  */
  public function install(){
      
  if(current_user_can( 'manage_options' )){
  self::$db_version=get_option($this->type."_version");
  if(self::$db_version != $this->version){
  $data=$this->get_data_object();
  $data->update_table();
  update_option($this->type."_version", $this->version);
  //add post permissions
  require_once(self::$path . "includes/install.php"); 
  $install=new vxcf_mailchimp_install();
  $install->create_roles();   

  }

  } 
  }
/**
* Contact Form status
* 
*/
  public  function cf_status() {
  
  $installed = 0;
  if(!class_exists('vxcf_form')) {
  if(file_exists(WP_PLUGIN_DIR.'/contact-form-entries-pro/contact-form-entries-pro.php')) {
  $installed=2;   
  }
  }else{
  $installed=1;
  if(!$this->is_cf_supported()){
  $installed=3;   
  }      
  }
  if($installed !=1){
    if($installed === 0){ // not found
  $message = sprintf(__("%sContact Form Entries%s is required. %s it today!%s", 'contact-form-mailchimp-crm'), "<a href='https://www.crmperks.com/'>", "</a>", "<a href='https://www.crmperks.com/'>", "</a>");   
  }else if($installed === 2){ // not active
  $message = sprintf(__('Contact Form Entries is installed but not active. %sActivate Contact Form Entries%s to use the Contact Form Mailchimp Plugin','contact-form-mailchimp-crm'), '<strong><a href="'.wp_nonce_url(admin_url('plugins.php?action=activate&plugin=contact-form-entries-pro/contact-form-entries-pro.php'), 'activate-plugin_contact-form-entries-pro/contact-form-entries-pro.php').'">', '</a></strong>');  
  } else if($installed === 3){ // not supported
  $message = sprintf(__("A higher version of %sContact Form Entries%s is required. %sPurchase it today!%s", 'contact-form-mailchimp-crm'), "<a href='https://www.crmperks.com/'>", "</a>", "<a href='https://www.crmperks.com/'>", "</a>");
  }  
  self::$cf_status_msg=$message;
  }
  return $installed;   
  }

  
  /**
  * Returns true if the current page is an Feed pages. Returns false if not
  * 
  * @param mixed $page
  */
  public  function is_crm_page($page=""){
  if(empty($page)) {
  $page = $this->post("page");
  }
  return $page == $this->id;
  } 

    
    /**
  * form fields
  * 
  * @param mixed $form_id
  */
public  function get_form_fields($form_id){
            $fields=array();
            
           $fields=apply_filters('vx_add_crm_form_fields',$fields,$form_id); 
 if(empty($fields)){
      global $vxcf_form;

if(is_object($vxcf_form) && method_exists($vxcf_form,'get_form_fields')){  
    $fields=$vxcf_form->get_form_fields($form_id);   
}else if(strpos($form_id,'cf_') === 0 ){
        if(method_exists('WPCF7_ShortcodeManager','get_instance') || method_exists('WPCF7_FormTagsManager','get_instance')){
$id=substr($form_id,3);
         $form_text=get_post_meta($id,'_form',true); 
         
if(method_exists('WPCF7_FormTagsManager','get_instance')){
    $manager=WPCF7_FormTagsManager::get_instance(); 
$contents=$manager->scan($form_text); 
$tags=$manager->get_scanned_tags();   

}else if(method_exists('WPCF7_ShortcodeManager','get_instance')){ //
 $manager = WPCF7_ShortcodeManager::get_instance();
$contents=$manager->do_shortcode($form_text);
$tags=$manager->get_scanned_tags();    
}

if(is_array($tags)){
  foreach($tags as $tag){
     if(is_object($tag)){ $tag=(array)$tag; }
   if(!empty($tag['name'])){
       $id=str_replace(' ','',$tag['name']);
       $tag['label']=ucwords(str_replace(array('-','_')," ",$tag['name']));
       $tag['type_']=$tag['type'];
       $tag['type']=$tag['basetype'];
       $tag['req']=strpos($tag['type'],'*') !==false ? 'true' : '';
   $fields[$id]=$tag;    
   }   
  }  
}
    }
}    
           }
  return $fields;
}

  public function get_form($form_id){
      
      $title='Contacts Addon';
      if($form_id !='vx_contacts'){
      global $vxcf_form;
      if(method_exists($vxcf_form,'get_forms')){
          $forms=$vxcf_form->get_forms();
          if(is_array($forms) && count($forms)>0){
              foreach($forms as $key=>$vals){
             $found=false;
               if(!empty($vals['forms']) && is_array($vals['forms'])){
                   foreach($vals['forms'] as $k=>$v){
                    $f_id=$key.'_'.$k;
                    if($f_id == $form_id){
                        $found=true;  
                        if(!empty($v)){
                     $title=$v;  
                        }
                      break;  
                    }   
                   }
               }   
              if($found){
                  break;
              }
              }
          }
      }
      }
        $form=array('id'=>$form_id,'title'=>$title,'name'=>$title);

  return $form;
  }
   

  /**
  * settings link
  * 
  * @param mixed $escaped
  */
  public  function link_to_settings( $tab='' ) {
  $q=array('page'=>$this->id);
  if(!empty($tab)){
   $q['tab']=$tab;   
  }
  $url = admin_url('admin.php?'.http_build_query($q));
  
  return  $url;
  }


    /**
  * Get CRM info
  * 
  */
  public function get_info($id){
$data=$this->get_data_object();
      $info=$data->get_account($id);
 $data=array();  $meta=$info_arr=array(); 
if(is_array($info)){
if(!empty($info['data'])){ 
  $info_arr=json_decode($this->de_crypt($info['data']),true);   
if(!is_array($info_arr)){
    $info_arr=array();
}
}

$info_arr['time']=$info['time']; 
$info_arr['id']=$info['id']; 
$info['data']=$info_arr; 
if(!empty($info['meta'])){ 
  $meta=json_decode($info['meta'],true); 
}
$info['meta']=is_array($meta) ? $meta : array();   
 
}
  return $info;    
  }
  /**
  * update account
  * 
  * @param mixed $data
  * @param mixed $id
  */
  public function update_info($data,$id) {

if(empty($id)){
    return;
}

 $time = current_time( 'mysql' ,1);

  $sql=array('updated'=>$time);
  if(is_array($data)){

  
    if(isset($data['meta'])){
  $sql['meta']= json_encode($data['meta']);    
  }
  if( isset($data['data']) && is_array($data['data'])){
      $_data=$this->get_data_object();
     $acount=$_data->get_account($id);
       if(array_key_exists('time' , $data['data']) && empty($data['data']['time'])){
  $sql['time']= $time;    
  $sql['status']= '2';    
  } 
  if(isset($data['data']['class'])){
  $sql['status']= $data['data']['class'] == 'updated' ? '1' : '2'; 
  }
  if(isset($data['data']['meta'])){
      unset($data['data']['meta']);
  }
  if(isset($data['data']['status'])){
      unset($data['data']['status']);
  }
  if(isset($data['data']['name'])){
     $sql['name']=$data['data']['name']; 
     // unset($data['data']['name']);
  }else if(isset($_GET['id'])){
      $sql['name']="Account #".$this->post('id'); 
  }
  
    $str=json_encode($data['data']);
  $enc_str=$this->en_crypt($str);
  $sql['data']=$enc_str;
  }
  } 

 $data=$this->get_data_object();
$result = $data->update_info_data($sql,$id);

  
return $result;
}

  /**
  * contact form field values, modify check boxes etc
  * 
  * @param mixed $entry
  * @param mixed $form
  * @param mixed $gf_field_id
  * @param mixed $crm_field_id
  * @param mixed $custom
  */
  public  function verify_field_val($entry,$field_id){
  $value=false;
 
  if(isset($entry[$field_id])){
      $value=$entry[$field_id];
     if(is_array($value) && isset($value['value'])){
      $value=$value['value'];   
     }
     if(!is_array($value)){
          $value=maybe_unserialize($value);
     }
  
  }
  if($value && is_array($value)){
      
 $fields=$this->form_fields;
 
         if(isset($fields[$field_id]['type']) && $fields[$field_id]['type'] == 'file'){
   
             $upload=wp_upload_dir();
    $base_url=$upload['baseurl'].'/cf7_entries_vx/';
    foreach($value as $k=>$v){
        if(strpos($v,'://') === false){
       $v=$base_url.$v;     
        }
             $value[$k]=$v;
    } 
 }
 
  $value=implode(", ",$value);
  }
  return $value;        
  }
  /**
  * filter enteries
  * 
  * @param mixed $feed
  * @param mixed $entry
  * @param mixed $form
  */
  public  function check_filter($feed,$entry){
    $filters=$this->post('filters',$feed);
  $final=$this->filter_condition=null;
  if(is_array($filters)){
   $time=current_time('timestamp'); 
   foreach($filters as $filter_s){
  $check=null; $and=null;  
  if(is_array($filter_s)){
  foreach($filter_s as $filter){
  $field=$filter['field'];
  $fval=$filter['value'];
  $val=$this->verify_field_val($entry,$field);
  if(is_array($val)){ $val=trim(implode(' ',$val)); }
  switch($filter['op']){
  case"is": $check=$fval == $val;     break;
  case"is_not": $check=$fval != $val;     break;
  case"contains": $check=strpos($val,$fval) !==false;     break;
  case"not_contains": $check=strpos($val,$fval) ===false;     break;
  case"is_in": $check=strpos($fval,$val) !==false;     break;
  case"not_in": $check=strpos($fval,$val) ===false;     break;
  case"starts": $check=strpos($val,$fval) === 0;     break;
  case"not_starts": $check=strpos($val,$fval) !== 0;     break;
  case"ends": $check=(strpos($val,$fval)+strlen($fval)) == strlen($val);  break;
  case"not_ends": $check=(strpos($val,$fval)+strlen($fval)) != strlen($val);  break;
  case"less": $check=(float)$val<(float)$fval; break;
  case"greater": $check=(float)$val>(float)$fval;  break;
  case"less_date": $check=strtotime($val,$time) < strtotime($fval,$time);  break;
  case"greater_date": $check=strtotime($val,$time) > strtotime($fval,$time);  break;
  case"equal_date": $check=strtotime($val,$time) == strtotime($fval,$time);  break;
  case"empty": $check=$val == "";  break;
  case"not_empty": $check=$val != "";  break;
  }
  $and_c[]=array("check"=>$check,"field_val"=>$fval,"input"=>$val,"field"=>$field,"op"=>$filter['op']);
  if($check !== null){
  if($and !== null){
  $and=$and && $check;    
  }else{
  $and=$check;    
  }   
  }  
  } //end and loop filter
  }
  if($and !== null){
  if($final !== null){
  $final=$final || $and;  
  }else{
  $final=$and;
  }    
  }
    $this->filter_condition[]=$and_c;
  } // end or loop
  }
  return $final === null ? true : $final;
  }

 public function get_all_objects(){
    $option=get_option($this->id.'_meta',array());
$objects=array();
if(!empty($option['objects'])){
 $objects=$option['objects'];   
}
return $objects;
}
      /**
  * Logs page row
  * 
  * @param mixed $feed
  */
  public  function verify_log($feed,$objects=''){
  $link="N/A"; $desc=__("Added to ",'contact-form-mailchimp-crm');
    $status_imgs=array("1"=>"created","2"=>"updated","4"=>"filtered",'5'=>'deleted');
    $feed['status_img']=isset($status_imgs[$feed["status"]]) ? $status_imgs[$feed["status"]] : 'failed';
    
      if(isset($objects[$feed['object']])){
      $feed['object']=$objects[$feed['object']];
  }
  
  if(!empty($feed['crm_id'])&& !empty($feed['object']) && !empty($feed['status'])){

    $link=$feed['crm_id'];      

  if($feed['status'] == 1 && $feed['event'] == 'add_note'){
  // $desc="Note Added to ";     
  }
  if($feed['status'] == 2){
  $desc="Updated to ";    
  }
  $desc.=$feed['object'];
  if($feed['status'] == 5){
   $desc=sprintf(__("Deleted from %s",'contact-form-mailchimp-crm'),$feed['object']);   
  }
  }else if($feed['status'] == 4){
      $desc=sprintf(__("Filtered from %s",'contact-form-mailchimp-crm'),$feed['object']); 
  }else{
  $desc= !empty($feed['error']) ? $feed['error'] : __("Unknown Error",'contact-form-mailchimp-crm');
  }
  $title=__("Failed",'contact-form-mailchimp-crm');   
  if($feed['status'] == 1){
  $title=__("Created",'contact-form-mailchimp-crm');   
  }else if($feed['status'] == 2){
  $title=__("Updated",'contact-form-mailchimp-crm');   
  }else if($feed['status'] == 4){
  $title=__("Filtered",'contact-form-mailchimp-crm');   
  }else if($feed['status'] == 5){
  $title=__("Deleted",'contact-form-mailchimp-crm');   
  }
  $feed['_crm_id']= !empty($feed['crm_id']) ? $feed['crm_id'] : "N/A";
  $feed['a_link']=$link;
  $feed['desc']=$desc;
  $feed['title']=$title;
  return $feed;
  }   
  /**
  * get address components
  *  
  * @param mixed $entry
  * @param mixed $field_id
  * @param mixed $type
  */
  private  function get_address($entry, $field_id,$type=""){
  $street_value = str_replace("  ", " ", trim($entry[$field_id . ".1"]));
  $street2_value = str_replace("  ", " ", trim($entry[$field_id . ".2"]));
  $city_value = str_replace("  ", " ", trim($entry[$field_id . ".3"]));
  $state_value = str_replace("  ", " ", trim($entry[$field_id . ".4"]));
  $zip_value = trim($entry[$field_id . ".5"]);
  if(method_exists('GF_Field_Address','get_country_code')){
  $field_c=new GF_Field_Address();
  $country_value=$field_c->get_country_code(trim($entry[$field_id . ".6"]));
  }else{
  $country_value = GFCommon::get_country_code(trim($entry[$field_id . ".6"]));       
  }
  $country =trim($entry[$field_id . ".6"]);
  $address = $street_value;
  $address .= !empty($address) && !empty($street2_value) ? "  $street2_value" : $street2_value;
  if($type =="json"){
  $arr=array("street"=>$address,"city"=>$city_value,"state"=>$state_value,"zip"=>$zip_value,"country"=>$country);
  return json_encode($arr);
  }
  $address .= !empty($address) && (!empty($city_value) || !empty($state_value)) ? "  $city_value" : $city_value;
  $address .= !empty($address) && !empty($city_value) && !empty($state_value) ? "  $state_value" : $state_value;
  $address .= !empty($address) && !empty($zip_value) ? "  $zip_value" : $zip_value;
  $address .= !empty($address) && !empty($country_value) ? "  $country_value" : $country_value;
  
  return $address;
  }

  /**
  * Add checkbox to entry info - option to send entry to crm
  * 
  * @param mixed $form_id
  * @param mixed $lead
  */
  public  function entry_info_send_checkbox( $form_id, $lead ) {
  
  // If this entry's form isn't connected to crm, don't show the checkbox
  if(!$this->show_send_to_crm_button() ) { return; }
  
  // If this is not the Edit screen, get outta here.
  if(empty($_POST["screen_mode"]) || $_POST["screen_mode"] === 'view') { return; }
  
   if(!current_user_can($this->id."_send_to_crm")){return; }
  
  if( apply_filters( $this->id.'_show_manual_export_button', true ) ) {
  printf('<input type="checkbox" name="'.$this->id.'_update" id="'.$this->id.'_update" value="1" /><label for="'.$this->id.'_update" title="%s">%s</label><br /><br />', __('Create or update this entry in Mailchimp. The fields will be mapped according to the form feed settings.', 'contact-form-mailchimp-crm'), __('Send to Mailchimp', 'contact-form-mailchimp-crm'));
  } else {
  echo '<input type="hidden" name="'.$this->id.'_update" id="'.$this->id.'_update" value="1" />';
  }
  }
  /**
  * Add button to entry info - option to send entry to crm
  * 
  * @param mixed $button
  */
  public  function entry_info_send_button( $button = '' ) {
  // If this entry's form isn't connected to crm, don't show the button
  if(!$this->show_send_to_crm_button()) { return $button; }
if(!current_user_can($this->id."_send_to_crm")){return; }
  // Is this the view or the edit screen?
  $mode = empty($_POST["screen_mode"]) ? "view" : $_POST["screen_mode"];
  if($mode === 'view') {
            $margin="";
      if(defined("vx_btn")){
      $margin="margin-top: 5px;";    
      }else{define('vx_btn','true');}
  $button.= '<input type="submit" class="button button-large button-secondary alignright" name="'.$this->id.'_send" style="margin-left:5px; '.$margin.'" title="'.__('Create or update this entry in Mailchimp. The fields will be mapped according to the form feed settings.','contact-form-mailchimp-crm').'" value="'.__('Send to Mailchimp', 'contact-form-mailchimp-crm').'" onclick="jQuery(\'#action\').val(\'send_to_crm\')" />';
  //logs button

      $entry_id=$this->post('lid');
      $form_id = rgget('id');
      if(empty($entry_id)){
          $entry_id=$this->get_entry_id($form_id);
      }
      $log_url=admin_url( 'admin.php?page=gf_edit_forms&view=settings&subview='.$this->id.'&tab=log&id='.$_GET['id'].'&entry_id='.$entry_id);  
    $button.= '<a class="button button-large button-secondary alignright" style="margin-left:5px; margin-top:5px; " title="'.__('Go to Mailchimp Logs','contact-form-mailchimp-crm').'" href="'.$log_url.'">'.__('Mailchimp Logs','contact-form-mailchimp-crm').'</a>';
  
  } 
  return $button;
  }
  /**
  * Whether to show the Entry "Send to CRM" button or not
  *
  * If the entry's form has been mapped to CRM feed, show the Send to CRM button. Otherwise, don't.
  *
  * @return boolean True: Show the button; False: don't show the button.
  */
  private  function show_send_to_crm_button() {
  
  $form_id = rgget('id');
  
  return $this->has_feed($form_id);
  }
  /**
  * Does the current form have a feed assigned to it?
  * @param  INT      $form_id Form ID
  * @return boolean
  */
  function has_feed($form_id) {
  $data=$this->get_data_object();
  $feeds = $data->get_feed_by_form( $form_id , true);
  
  return !empty($feeds);
  }
  

  
  /**
  * if contact form installed and supported
  * 
  */
  private  function is_cf_supported(){
  if(class_exists("vxcf_form")){
 global $vxcf_form;
 $version='1.0';
 if($vxcf_form->version){
  $version=$vxcf_form->version;   
 }
  $is_correct_version = version_compare($version, $this->min_cf_version, ">=");
  return $is_correct_version;
  }
  else{
  return false;
  }
  }
  /**
  * uninstall plugin
  * 
  */
  public  function uninstall(){
  //droping all tables
 require_once(self::$path . "includes/install.php"); 
  $install=new vxcf_mailchimp_install();
    do_action('uninstall_vx_plugin_'.$install->id);
  $install->remove_data();
  $install->remove_roles();
  }
    /**
  * email validation
  * 
  * @param mixed $email
  */
  public function is_valid_email($email){
         if(function_exists('filter_var')){
      if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      return true;    
      }
       }else{
       if(strpos($email,"@")>1){
      return true;       
       }    
       }
   return false;    
  }
  /**
  * deactivate
  * 
  * @param mixed $action
  */
  public function deactivate($action="deactivate"){ 
  do_action('plugin_status_'.$this->type,$action);
  }
  /**
  * activate plugin
  * 
  */
  public function activate(){ 
$this->plugin_api(true);
do_action('plugin_status_'.$this->type,'activate');  
  }
    /**
  * Send CURL Request
  * 
  * @param mixed $body
  * @param mixed $path
  * @param mixed $method
  */
  public function request($path="",$method='POST',$body="",$head=array()) {

        $args = array(
            'body' => $body,
            'headers'=> $head,
            'method' => strtoupper($method), // GET, POST, PUT, DELETE, etc.
            'sslverify' => false,
            'timeout' => 20,
        );

       $response = wp_remote_request($path, $args);

        if(is_wp_error($response)) { 
            $this->error_msg= $response->get_error_message();
            return false;
        } else if(isset($response['response']['code']) && $response['response']['code'] != 200 && $response['response']['code'] != 404) {
            $this->error_msg = strip_tags($response['body']);
            return false;
        } else if(!$response) {
            return false;
        }
   $result=wp_remote_retrieve_body($response);
        return $result;
    }

  /**
  * Formates User Informations and submitted form to string
  * This string is sent to email and mailchimp
  * @param  array $info User informations 
  * @param  bool $is_html If HTML needed or not 
  * @return string formated string
  */
  public  function format_user_info($info,$is_html=false){
  $str=""; $file="";
  if($is_html){
      self::$path=$this->get_base_path();
  if(file_exists(self::$path."templates/email.php")){    
  ob_start();
  include_once(self::$path."templates/email.php");
  $file= ob_get_contents(); // data is now in here
  ob_end_clean();
  } 
  if(trim($file) == "")
  $is_html=false;
  }
  if(isset($info['info']) && is_array($info['info'])){
  if($is_html){
  if(isset($info['info_title'])){
  $str.='<tr><td style="font-family: Helvetica, Arial, sans-serif;background-color: #C35050; height: 36px; color: #fff; font-size: 24px; padding: 0px 10px">'.$info['info_title'].'</td></tr>'."\n";
  }
  if(is_array($info['info']) && count($info['info'])>0){
  $str.='<tr><td style="padding: 10px;"><table border="0" cellpadding="0" cellspacing="0" width="100%;"><tbody>';      
  foreach($info['info'] as $f_k=>$f_val){
  $str.='<tr><td style="padding-top: 10px;color: #303030;font-family: Helvetica;font-size: 13px;line-height: 150%;text-align: right; font-weight: bold; width: 28%; padding-right: 10px;">'.$f_k.'</td><td style="padding-top: 10px;color: #303030;font-family: Helvetica;font-size: 13px;line-height: 150%;text-align: left; word-break:break-all;">'.$f_val.'</td></tr>'."\n";      
  }
  $str.="</table></td></tr>";             
  }
  }else{
  if(isset($info['title']))
  $str.="\n".$info['title']."\n";    
  foreach($info['info'] as $f_k=>$f_val){
  $str.=$f_k." : ".$f_val."\n";      
  }
  }
  }
  if($is_html){
  $str=str_replace(array("{title}","{msg}","{sf_contents}"),array($info['title'],$info['msg'],$str),$file);
  }
  return $str;   
  }
 

  /**
  * if plugin user is valid
  * 
  * @param mixed $update
  */
  
  public function is_valid_user($update){
  return is_array($update) && isset($update['user']['user']) && $update['user']['user']!=""&& isset($update['user']['expires']);
  }     
public function post($key, $arr="") {
  if($arr!=""){
  return isset($arr[$key])  ? self::clean($arr[$key]) : "";
  }
  return isset($_REQUEST[$key]) ? self::clean($_REQUEST[$key]) : "";
}
public static function clean($var){
    if ( is_array( $var ) ) {
        return array_map( array('self','clean'), $var );
    } else {
        return  sanitize_text_field(wp_unslash($var));
    }
}
  public static  function get_key(){
  $k='Wezj%+l-x.4fNzx%hJ]FORKT5Ay1w,iczS=DZrp~H+ve2@1YnS;;g?_VTTWX~-|t';
  if(defined('AUTH_KEY')){
  $k=AUTH_KEY;
  }
  return substr($k,0,30);        
  }
  /**
  * check if other version of this plugin exists
  * 
  */
  public function other_plugin_version(){ 
  $status=0;
  if(class_exists('vxcf_mailchimp_wp')){
      $status=1;
  }else if( file_exists(WP_PLUGIN_DIR.'/contact-form-mailchimp-crm/contact-form-mailchimp-crm.php')) {
  $status=2;
  } 
  return $status;
  }
    /**
  * Get time Offset 
  * 
  */
  public function time_offset(){
 $offset = (int) get_option('gmt_offset');
  return $offset*3600;
  } 
  /**
  * Decrypts Values
  * @param array $info Mailchimp encrypted API info 
  * @return array API settings
  */
  public static function de_crypt($info){
  $info=trim($info);
  if($info == "")
  return '';
  $str=base64_decode($info);
  $key=self::get_key();
      $decrypted_string='';
     if(function_exists("openssl_encrypt") && strpos($str,':')!==false ) {
$method='AES-256-CBC';
$arr = explode(':', $str);
 if(isset($arr[1]) && $arr[1]!=""){
 $decrypted_string=openssl_decrypt($arr[0],$method,$key,false, base64_decode($arr[1]));     
 }
 }else{
     $decrypted_string=$str;
 }
  return $decrypted_string;
  }   
  /**
  * Encrypts Values
  * @param  string $str 
  * @return string Encrypted Value
  */
  public static function en_crypt($str){
  $str=trim($str);
  if($str == "")
  return '';
  $key=self::get_key();
if(function_exists("openssl_encrypt")) {
$method='AES-256-CBC';
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));
$enc_str=openssl_encrypt($str,$method, $key,false,$iv);
$enc_str.=":".base64_encode($iv);
  }else{
      $enc_str=$str;
  }
  $enc_str=base64_encode($enc_str);
  return $enc_str;
  }
  
  /**
  * Get variable from array
  *  
  * @param mixed $key
  * @param mixed $key2
  * @param mixed $arr
  */
  public function post2($key,$key2, $arr="") {
  if(is_array($arr)){
  return isset($arr[$key][$key2])  ? $arr[$key][$key2] : "";
  }
  return isset($_REQUEST[$key][$key2]) ? $_REQUEST[$key][$key2] : "";
  }
  /**
  * Get variable from array
  *  
  * @param mixed $key
  * @param mixed $key2
  * @param mixed $arr
  */
  public function post3($key,$key2,$key3, $arr="") {
  if(is_array($arr)){
  return isset($arr[$key][$key2][$key3])  ? $arr[$key][$key2][$key3] : "";
  }
  return isset($_REQUEST[$key][$key2][$key3]) ? $_REQUEST[$key][$key2][$key3] : "";
  }
  /**
  * get base url
  * 
  */
  public function get_base_url(){
  return plugin_dir_url(__FILE__);
  }
    /**
  * get plugin direcotry name
  * 
  */
  public function plugin_dir_name(){
  if(!empty($this->plugin_dir)){
  return $this->plugin_dir;
  }
  if(empty(self::$path)){
  self::$path=$this->get_base_path(); 
  }
  $this->plugin_dir=basename(self::$path);
  return $this->plugin_dir;
  }
  /**
  * get plugin slug
  *  
  */
  public function get_slug(){
  return plugin_basename(__FILE__);
  }
public function do_actions(){
     if(!is_object(self::$plugin) ){ $this->plugin_api(); }
      if(method_exists(self::$plugin,'valid_addons')){
       return self::$plugin->valid_addons();  
      }
    
   return false;   
  }
  /**
  * Returns the physical path of the plugin's root folder
  * 
  */
  public function get_base_path(){
  return plugin_dir_path(__FILE__);
  }

    /**
  * get api object
  * 
  * @param mixed $settings
  * @return vxg_api_mailchimp
  */
  public  function get_api($crm=""){
   $api = false;
  $api_class=$this->id."_api";
  if(!class_exists($api_class))
  require_once(self::$path."api/api.php");
  
  $api = new $api_class($crm);
  return $api;
  }
  /**
  * get contact form entry
  * 
  */
  public function get_cf_entry($entry_id,$type=''){
      $entry=array();
      
  if($type == 'addon'){

  if( class_exists( 'vxcf_crm' ) && !empty( $entry_id ) ) {
  $entry = vxcf_crm::get_entry( $entry_id );
  $entry['__vx_id']=$entry_id;
  $entry['form_id']='vx_contacts';
  }   
  }
  else{
  if( class_exists( 'vxcf_form' ) && !empty( $entry_id ) ) {
  $entry = vxcf_form::get_entry( $entry_id );
  $entry['__vx_id']=$entry_id;
  } 
  }
  return $entry;
  }
   /**
  * get contact form entry
  * 
  */
  public function get_cf_entry_detail($entry_id){
      $entry=array();
  // Fetch entry (use new GF API from version 1.8)
  if( class_exists( 'vxcf_form' ) && !empty( $entry_id ) ) {
  $entry = vxcf_form::get_entry_detail( $entry_id );
  } 
  return $entry;
  }
    /**
  * get data object
  * 
  */
  public function get_data_object(){
  require_once(self::$path . "includes/data.php");     
  if(!is_object($this->data))
  $this->data=new vxcf_mailchimp_data();
  return $this->data;
  }


  /**
  * push form data to crm
  * 
  * @param mixed $entry
  * @param mixed $form
  * @param mixed $is_admin
  */
  public  function push($entry, $form,$event="",$is_admin=true,$log=""){  

     $data_db=$this->get_data_object(); 
     $log_id='';   $feeds_meta=array();
   if(!empty($log)){
       if(isset($log['id'])){
       $log_id=$log['id'];
       }
       $log_feed=$data_db->get_feed($log['feed_id']);
       
   if(!empty($log_feed)){
       $feeds_meta=array($log_feed);
   }
   }else{   
  //get feeds of a form 
  $feeds=$data_db->get_feed_by_form($form['id'],true);
    
  if(is_array($feeds) && count($feeds)>0){
  $e=1000; $k=1;
    foreach($feeds as $feed){
          $data=isset($feed['data']) ? json_decode($feed['data'],true) : array(); 
             $meta=isset($feed['meta']) ? json_decode($feed['meta'],true) : array();
           $feed['meta']=$meta;
           $feed['data']=$data;
 if(!empty($data['organisation_check']) || !empty($data['opportunity_check']) || !empty($data['contact_check'])){
     $feeds_meta[$e++]=$feed; 
  }else{
  $feeds_meta[$k++]=$feed; 
  }
    }  
      ksort($feeds_meta); 
  }

   } 

$entry_id=$this->post('__vx_id',$entry);

$type='cf';
if($form['id'] == 'vx_contacts'){
$type='cc';    
}
  
if(empty($form['__vx_addons']) && ($event == '' || $event == 'update' || $event == 'submit')){
$entry=apply_filters('vx_crm_post_fields',$entry,$entry_id,$type,$form);
} 
if(isset($form['id'])){
$entry['_vx_form_id']=$form['id'];   
}
if( isset($form['name'])){
$entry['_vx_form_name']=$form['name'];   
}else if( isset($form['title'])){
$entry['_vx_form_name']=$form['title'];   
}

$local_time=current_time( 'mysql');
$entry['_vx_created']=isset($entry['__vx_entry']['created']) ? $entry['__vx_entry']['created'] : $local_time;   
 $entry['_vx_updated']=isset($entry['__vx_entry']['updated']) ? $entry['__vx_entry']['updated'] : $local_time;  
 
 if(!empty($entry['_vx_created'])){
     $entry['_vx_created']=date('m/d/Y h:i A',strtotime($entry['_vx_created']));
 }
 if(!empty($entry['_vx_updated'])){
     $entry['_vx_updated']=date('m/d/Y h:i A',strtotime($entry['_vx_updated']));
 }
 if(!empty($entry['__vx_entry'])){  
  $entry['_vx_url']=$entry['__vx_entry']['url'];     
 }

   $screen_msg_class="updated"; $notice=""; $log_link='';
  if(is_array($feeds_meta) && count($feeds_meta)>0){
  foreach($feeds_meta as $feed){
        $temp=array();
  $force_send=false;
      $post_comment=true;
      $screen_msg="";
      $parent_id=0;
      if(isset($entry['__vx_parent_id'])){
  $parent_id=$entry['__vx_parent_id'];  
}
  $object=$this->post('object',$feed);
  if(empty($object)){
      continue;
  } 
  //
    $data=$meta=array();

  if(is_array($feed)){
  if(isset($feed['data']) && is_array($feed['data'])){
      $data=$feed['data'];
    $feed=array_merge($feed,$data);  
  }
 //
   if(isset($feed['meta']) && is_array($feed['meta'])){
       $meta=$feed['meta'];
    $feed=array_merge($feed,$meta);  
  }     
  }
  //
  
     
if( in_array($event,array('restore','update','delete','add_note','delete_note'))){
$is_admin=true;
$search_object=$object;
if(in_array($event,array('add_note','delete_note')) && !empty($log)){
   
   if($event == 'add_note'){
        $note=json_decode($log['data'],true);
        if(!empty($note['title']['value'])){
            self::$note=array('id'=>$log['parent_id']);
      self::$note['title']=$note['title']['value'];
      self::$note['body']=$note['body']['value'];
        }
   } 
}
   if($event == 'delete_note' && !empty(self::$note)){
         $parent_id=self::$note['id'];
   }
 
    if(in_array($event,array('delete_note','add_note'))){
    $order_notes=$this->post('entry_notes',$feed); //if notes sync not enabled in feed return
    if( empty($order_notes)){
        continue;
    }
 //change main object to Note
$feed['related_object']=$object;
 $object=$feed['object']='Note';   
 }
 if($event == 'delete_note'){
//when deleting note search note object 
    $search_object='Note';
 }
 $_data=$this->get_data_object();
$feed_log=$_data->get_feed_log($feed['id'],$entry_id,$search_object,$parent_id); 
//var_dump($feed_log); die();
 if($event == 'restore' && $feed_log['status'] != 5) { // only allow successfully deleted records
     continue;
 }
  if( in_array($event,array('update','delete') ) && !in_array($feed_log['status'],array(1,2) )  ){ // only allow successfully sent records
     continue;
 }
if(empty($feed_log['crm_id']) || empty($feed_log['object']) || $feed_log['object'] != $search_object){
    
   continue; 
}
if($event !='restore'){
 $feed['crm_id']=$feed_log['crm_id'];
    unset($feed['primary_key']);
}
   $feed['event']=$event;  
// add note and save related extra info
 if( $event == 'add_note' && !empty(self::$note)){
    $temp=array('title'=>array('value'=>self::$note['title']),'body'=>array('value'=>self::$note['body']),'parent_id'=>array('value'=> $feed['crm_id']),'object'=>array('value'=> $search_object));  
$parent_id=self::$note['id']; 
 $feed['note_object_link']=$feed_log['crm_id'];
 } 
 // delete not and save extra info
 if( $event == 'delete_note'){
 $feed_log_arr= json_decode($feed_log['extra'],true);
 if(isset($feed_log_arr['note_object_link'])){
$feed['note_object_link']=$feed_log_arr['note_object_link']; 
 }
$temp=array('ParentId'=>array('value'=> $feed['crm_id']));   
}
 //delete object
 if( $event == 'delete'){
    $temp=array('Id'=>array('value'=> $feed['crm_id']));     
 }
//
  if(!in_array($event , array('update','restore') )){ 
     //do not apply filters when adding note , deleting note , entry etc
      $force_send=true;   
  }  
        //do not post comment in al other cases 
     $post_comment=false; 

 } 
// var_dump(self::$note,$object,$feed['note_object'],$feed['object'],$feed['crm_id'],$feed['event'],$temp,$force_send); 
 //continue; 
// die();
if(isset($entry['__vx_data'])){
$force_send=true;  
$temp=$entry['__vx_data'];  
}

  if(!$force_send && isset($data['map']) && is_array($data['map']) && count($data['map'])>0){

      $custom= isset($meta['fields']) && is_array($meta['fields']) ? $meta['fields'] : array();
     if(empty($this->form_fields)){
  $this->form_fields=$this->get_form_fields($form['id']);
 }
  foreach($data['map'] as $k=>$v){ 
  /// 
  $value=''; 
  if(!empty($v)){ //if value not empty
      if($this->post('type',$v) == "value"){ //custom value
      $value=trim($this->post('value',$v)); 
  //starts with { and ends } , any char in brackets except {
  preg_match_all('/\{[^\{]+\}/',$value,$matches);
  if(!empty($matches[0])){
      $vals=array();
   foreach($matches[0] as $m){
       $m=trim($m,'{}'); 
    $vals['{'.$m.'}']=$this->verify_field_val($entry,$m);    
   }
  $value=str_replace(array_keys($vals),array_values($vals),$value);    
  }   

  }else{ //general field
  $field=$this->post('field',$v); 

  if($field !=""){
  $value=$this->verify_field_val($entry,$field); 
 if($field == '_vx_form_id' && isset($form['id'])){
  $value=$form['id'];   
 }else if($field == '_vx_form_name' && isset($form['title'])){
  $value=$form['title'];   
 }
  }}
if(!empty($value)){
  if(isset($custom[$k])){

  $temp[$k]=array("value"=>$value,"label"=>$custom[$k]['label']);  
      }
      }
  }
  } 
 
  //add note 
   if(!empty($data['note_check']) && !empty($data['note_fields']) && is_array($data['note_fields'])){
          $entry_note=''; $entry_note_title='';
          foreach($data['note_fields'] as $e_note){ 
              $value=$this->verify_field_val($entry,$e_note); 
           if(!empty($value)){ 
               if(!empty($entry_note)){
                   $entry_note.="\n";
               }
           $entry_note.=$value;    
           }   
           if(empty($entry_note_title)){
            $entry_note_title=substr($entry_note,0,100);   
           }
          }
          if(!empty($entry_note)){
     $feed['__vx_entry_note']=array('title'=>$entry_note_title,'body'=>$entry_note);      
          }

  }
   
  }

$no_filter=true;    
  //not submitted by admin
  if(empty($event) && !$is_admin  && $this->post('manual_export',$data) == "1"){ //if manual export is yes
  continue;   
  }         
    if(isset($_REQUEST['bulk_action']) && $_REQUEST['bulk_action'] =="send_to_crm_bulk_force" && !empty($log_id)){
  $force_send=true;
  }
  if(!$force_send && $this->post('optin_enabled',$data) == "1"){ //apply filters if not sending by force and optin is enabled
  $no_filter=$this->check_filter($data,$entry); 
  $res=array("status"=>"4","extra"=>array("filter"=>$this->filter_condition),"data"=>$temp);  
  } 
$account=$this->post('account',$feed);

  $info=$this->get_info($account); 

  if(!$no_filter && !empty($data['un_sub'])){ 
    $no_filter=true;
   if(empty($feed['primary_key'])){ $feed['primary_key']='email_address'; }
    $feed['vx_unsub']='1';  
  }
 
  if($no_filter){ //get $res if no filter , other wise use filtered $res
  $api=$this->get_api($info);
  $res_temp=$api->push_object($feed['object'],$temp,$feed);
if(!empty($res_temp)){ $res=$res_temp; }
  }
  
  $feed_id=$this->post('id',$feed);
  self::$feeds_res[$feed_id]=$res;
  $status=$res['status'];  $error=""; $id="";
  if($this->post('id',$res)!=""){ 
      $id=$res['id'];
      $action=$this->post('action',$res);
      if($action == "Added"){
          if(empty($res['link'])){
  $msg=sprintf(__('Successfully Added to Mailchimp (%s) with ID # %s .', 'contact-form-mailchimp-crm'),$feed['object'],$res['id']);
          }else{
  $msg=sprintf(__('Successfully Added to Mailchimp (%s) with ID # %s . View entry at %s', 'contact-form-mailchimp-crm'),$feed['object'],$res['id'],$res['link']);
          }
  $screen_msg=__( 'Entry added in Mailchimp', 'contact-form-mailchimp-crm');
      }else{
            if(empty($res['link'])){
  $msg=sprintf(__('Successfully Updated to Mailchimp (%s) with ID # %s . View entry at %s', 'contact-form-mailchimp-crm'),$feed['object'],$res['id'],$res['link']);   
            }else{
  $msg=sprintf(__('Successfully Updated to Mailchimp (%s) with ID # %s .', 'contact-form-mailchimp-crm'),$feed['object'],$res['id']);   
            }
          if($event == 'delete'){  
     $screen_msg=__( 'Entry deleted from Mailchimp', 'contact-form-mailchimp-crm');
          }else{
     $screen_msg=__( 'Entry updated in Mailchimp', 'contact-form-mailchimp-crm');
          }
          }
   
  
  }else if($this->post('status',$res) == 4){
  $screen_msg=$msg=__( 'Entry filtered', 'contact-form-mailchimp-crm');    
  }else{
  $status=0; $screen_msg_class="error";
  $screen_msg=__('Errors when adding to Mailchimp. Entry not sent! Check the Entry Notes below for more details.' , 'contact-form-mailchimp-crm' );
  if($log_id!=""){
      //message for  bulk actions in logs
  $screen_msg=__('Errors when adding to Mailchimp. Entry not sent' , 'contact-form-mailchimp-crm' );    
  }
  $msg=sprintf(__('Error while creating %s', 'contact-form-mailchimp-crm'),$feed['object']);
  if($this->post('error',$res)!=""){
      $error= is_array($res['error']) ? json_encode($res['error']) : $res['error'];
  $msg.=" ($error)";
  
  $_REQUEST['VXGMailchimpError']=$msg; //front end form error for admin only
  }   
  if(!$is_admin){
      $info['msg']=$msg;
$this->send_error_email($info,$entry,$form);
  }
  
  } 

  //insert log
  $arr=array("object"=>$feed["object"],"form_id"=>$form['id'],"status"=>$status,"entry_id"=>$entry_id,"crm_id"=>$id,"meta"=>$error,"time"=>date('Y-m-d H:i:s'),"data"=>$temp,"response"=>$this->post('response',$res),"extra"=>$this->post('extra',$res),"feed_id"=>$this->post('id',$feed),'parent_id'=>$parent_id,'event'=>$event,"link"=>$this->post('link',$res));
  $settings=get_option($this->type.'_settings',array());
//  if($this->post('disable_log',$settings) !="yes"){ 
   $insert_id=$data_db->insert_log($arr,$log_id); 
//  } 
  $log_link='';
    if(!empty($insert_id)){ //   
   $log_url=admin_url( 'admin.php?page='.$this->id.'&tab=logs&log_id='.$insert_id);  
  $log_link=' <a href="'.$log_url.'" class="vx_log_link" data-id="'.$insert_id.'">'.__('View Detail','contact-form-mailchimp-crm')."</a>";
 $screen_msg.=$log_link;
    }
    if($post_comment){
  //insert entry comment
//$this->add_note($entry["id"], $msg);
    } 
    if($notice!=""){
  $notice.='<br/>';
  } 
    if(isset($info['objects'][$object])){
  $notice.='<b>'.$info['objects'][$object].': </b>';
  }
  $notice.=$screen_msg;  
   
  }
  }
  return array("msg"=>$notice,"class"=>$screen_msg_class);
  }

  /**
  * Send error email
  * 
  * @param mixed $info
  * @param mixed $entry
  * @param mixed $form
  */
  public function send_error_email($info,$entry,$form){
        if(!empty($info['data']['error_email'])){
  $subject="Error While Posting to Mailchimp";
    $entry_link=add_query_arg(array('page' => 'vxcf_leads','tab'=>'entries', 'id' => $entry['__vx_id']), admin_url('admin.php'));  
  $page_url = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 

  $detail=array(
  "Time"=>date('d/M/y H:i:s',current_time('timestamp')),
  "Page URL"=>'<a href="'.$page_url.'" style="word-break:break-all;">'.$page_url.'</a>',
  "Entry ID"=>'<a href="'.$entry_link.'" target="_blank" style="word-break:break-all;">'.$entry_link.'</a>'
  );
  if(isset($form['title'])){
    $detail["Form Name"]=$form['title'];
  $detail["Form Id"]=$form['id'];
  }
    $email_info=array("msg"=>$info['msg'],"title"=>__('Mailchimp','contact-form-mailchimp-crm')." Error","info_title"=>"More Detail","info"=>$detail);
  $email_body=$this->format_user_info($email_info,true);

  $error_emails=explode(",",$info['data']['error_email']); 
  $headers = array('Content-Type: text/html; charset=UTF-8');
  foreach($error_emails as $email)   
  wp_mail(trim($email),$subject, $email_body,$headers);

        }

  }


  /**
  * Get Objects from local options or from mailchimp
  *     
  * @param mixed $check_option
  * @return array
  */
  public function get_objects($info="",$refresh=false){
    

 
   $objects=array();   
   if(!empty($info)){   
   $meta=$this->post('meta',$info);  
   
   }else{
   $meta=get_option($this->id.'_meta',array());    
   }
   if(empty($meta['objects'])){
    $refresh=true;   
   }else{
     $objects=$meta['objects'];  
   } 

  //get objects from mailchimp
 if($refresh && !empty($info)){
  $api=$this->get_api($info); 
  $objects=$api->get_crm_objects(); 

  if(is_array($objects)){
  $option=get_option($this->id.'_meta',array());
     $meta_objects=$objects;
  if(!empty($option['objects']) && is_array($option['objects'])){
   $meta_objects=array_merge($option['objects'],$objects);   
  }

  $option['objects']=$meta_objects;

  update_option($this->id.'_meta',$option); //save objects for logs search option
  $meta["objects"]=$objects;
  $this->update_info(array("meta"=>$meta),$info['id']);
  }
 } 

  return $objects;    
 }
    /**
  * check if user conected to crm
  *     
  * @param mixed $settings
  */
  public function api_is_valid($info="") {

  if(isset($info['data']['class']) && is_array($info['data']) && $info['data']['class'] =='updated'){ 
  return true;
  }else{
  return false;}       
  }
}

$vxcf_mailchimp=new vxcf_mailchimp();
$vxcf_mailchimp->instance();
$vx_cf['vxcf_mailchimp']='vxcf_mailchimp';
endif;

