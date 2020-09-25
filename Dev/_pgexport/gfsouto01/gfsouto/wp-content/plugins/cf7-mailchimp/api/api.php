<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

if(!class_exists('vxcf_mailchimp_api')){
    
class vxcf_mailchimp_api extends vxcf_mailchimp{
  
    public $info='' ; // info
    public $url='';
    public $api_key='';
    public $error= "";
    public $timeout= "15";

function __construct($info) {
     
    if(isset($info['data'])){ 
       $this->info= $info;
       if(!empty($info['data']['api_key'])){
        $this->api_key=$info['data']['api_key'];
      $temp_arr=explode('-',$this->api_key); 
      if(!empty($temp_arr[1])){ 
$this->url='https://'.$temp_arr[1].'.api.mailchimp.com/3.0/';
      }
       }
    }
    }
public function get_token(){
  $users=$this->get_crm_objects();

    $info=$this->info;
    $info=isset($info['data']) ? $info['data'] : array();
    if(is_array($users) ){
    $info['valid_token']='true';    
    }else {
      unset($info['valid_token']); 
      if(!empty($users) && is_string($users)){
          $info['error']=$users;
      } 
    }
    return $info;

}


public function get_crm_objects(){

$objects=$this->post_crm('lists?count=200','get');

$res='';
if(!empty($objects['detail'])){ //title,detail
  $res=$objects['detail'];  
}else if(isset($objects['lists']) ){
    $res=array();
 foreach($objects['lists'] as $k=>$v){
  $res[$v['id']]=$v['name'];   
 }   
}
 return $res;
}
public function get_crm_fields($module,$fields_type=false){

$fields=$this->post_crm('lists/'.$module.'/merge-fields?count=200','get');
//$field=$this->post_crm('lists/'.$module.'/members?count=200','get');
//var_dump($field);

if($fields_type){

$field_options=array();
if(isset($fields['merge_fields']) && is_array($fields['merge_fields'])){
foreach($fields['merge_fields'] as $k=>$f){ 
$field_options[$k]=array('name'=>$f['key'],'label'=>$f['name']);
if(isset($f['type'])){ 
    
if(in_array($f['type'],array('dropdown','radio'))){
if(!empty($f['options']['choices'])){
   foreach($f['options']['choices'] as $kk=>$v){
$field_options[$k]['options'][]=array('name'=>$kk,'value'=>$v);        
    }
} }   
} }    
}
return $field_options;
}
$res=array();
$address=array('addr1'=>'Street Line 1','addr2'=>'Street Line 2','city'=>'City','state'=>'State','zip'=>'Zip','country'=>'Country');

if(!empty($fields['merge_fields'])){
    $res['email_address']=array('name'=>'email_address','label'=>'Email','type'=>'email','req'=>'true');
    $res['PHONE']=array('name'=>'PHONE','label'=>'Phone Number','type'=>'phone');
 foreach($fields['merge_fields'] as $k=>$v){
     $merge_id=intval($v['merge_id']);
     if($v['type'] == 'address'){
      foreach($address as $i=>$r){
          $field=array('label'=>$v['name'].'-'.$r,'name'=>$v['tag'].'-'.$i,'type'=>'address'); 
          if($v['required'] == true){
          $field['req']='true';    
          } 
          if($merge_id > 4){
              $field['is_custom']='1';
          }   
      $res[$v['tag'].'-'.$i]=$field; 
      }   
     }else{
     $field=array('label'=>$v['name'],'name'=>$v['tag'],'type'=>$v['type']);
     if(in_array($v['type'],array('dropdown','radio'))){
     if(!empty($v['options']['choices'])){ 
     $field['eg']=implode(',',$v['options']['choices']); 
     $field['options']=$v['options']['choices'];
     }
     }else if($v['type'] == 'date'){
      if(!empty($v['options']['date_format'])){ $field['eg']=$v['options']['date_format'];  }   
     }else if($v['type'] == 'birthday'){
      $field['eg']='MM/DD';   
     }
 if($v['required'] == true){ $field['req']='true';    } 
  if($merge_id > 4){
              $field['is_custom']='1';
          }
   
  $res[$v['tag']]=$field;   
 } }

$camps=$this->get_groups($module);  

$groups=$eg=array();
$group_field=array('name'=>'interests','label'=>'Groups','type'=>'dropdown','is_custom'=>'1');
if(!empty($camps) && is_array($camps)){
foreach($camps as $id=>$group){
    if(!empty($group['items'])){
   foreach($group['items'] as $g_id=>$g){     
$groups[$g_id]=$g;    
$eg[]=$g_id.'='.$g;
   }
    }
}
 $group_field['options']=$groups;   
 $group_field['eg']=implode(', ',$eg);   
}

 $res['interests']= $group_field; 
 $res['tags']=array('name'=>'tags','label'=>'Tags','type'=>'text or comma separated');  
}else if(!empty($fields['detail'])){
$res=$fields['detail'];  
}

return $res;
}
  /**
  * Get users from mailchimp
  * @return array users
  */
public function get_groups($object){ 
$arr=$this->post_crm('lists/'.$object.'/interest-categories','get');
$users=array();   
$msg='No Stage Found';
if(!empty($arr['categories']) && is_array($arr['categories']) ){
          foreach($arr['categories'] as $v){
              if(!empty($v['title'])){
$arr_i=$this->post_crm('lists/'.$object.'/interest-categories/'.$v['id'].'/interests','get');
$items=array();
if(!empty($arr_i['interests'])){
    foreach($arr_i['interests'] as $val){
 $items[$val['id']]=$val['name'];       
    }
}    
 $users[$v['id']]=array('title'=>$v['title'],'type'=>$v['type'],'items'=>$items);
              }
          }
      }else if(!empty($arr['error'])){
 $msg=$arr['error'];   
}

  return empty($users) ? $msg : $users;
}


public function push_object($module,$fields,$meta){ 
//check primary key
 $extra=array();

  $debug = isset($_GET['vx_debug']) && current_user_can('manage_options');
  $event= isset($meta['event']) ? $meta['event'] : '';
  $id= isset($meta['crm_id']) ? $meta['crm_id'] : '';
  if($debug){ ob_start();}
if(isset($meta['primary_key']) && $meta['primary_key']!="" && isset($fields[$meta['primary_key']]['value']) && $fields[$meta['primary_key']]['value']!=""){    
$search=$fields[$meta['primary_key']]['value'];
$field=$meta['primary_key'];

$search_response=$this->post_crm('search-members?list_id='.$module.'&query='.urlencode($search),'get');

if(!empty($search_response['exact_matches']['members']) && is_array($search_response['exact_matches']['members']) && count($search_response['exact_matches']['members']) > 0){
  $items=$search_response['exact_matches']['members'];
  //$item=end($items);
  if(!empty($items[0]['id'])){
  $id=$items[0]['id'];  
  $search_response =$items[0]; 
  }  
}

  if($debug){
  ?>
  <h3>Search field</h3>
  <p><?php print_r($field) ?></p>
  <h3>Search term</h3>
  <p><?php print_r($search) ?></p>
    <h3>POST Body</h3>
  <p><?php print_r($body) ?></p>
  <h3>Search response</h3>
  <p><?php print_r($res) ?></p>  
  <?php
  }

      $extra["body"]=$search;
      $extra["response"]=$search_response;
  }
if(!empty($meta['vx_unsub'])){
    if(empty($id)){ 
   return '';     
    }else{
   $event='delete';     
    }
}

     if(in_array($event,array('delete_note','add_note'))){    
  if(isset($meta['related_object'])){
    $extra['Note Object']= $meta['related_object'];
  }
  if(isset($meta['note_object_link'])){
    $extra['note_object_link']=$meta['note_object_link'];
  }
}

 $status=$action=$method=""; $send_body=true;
 $entry_exists=false;

$object_url='';
$is_main=false;
$post=array();
if($id == ""){
    //insert new object
$action="Added";  $status="1"; $method='post';
$object_url='lists/'.$module.'/members';
$is_main=true;
}else{
 $entry_exists=true;
    if($event == 'add_note'){
        if(!empty($fields['body']['value'])){
         $post['note']=$fields['body']['value'];   
        }

$action="Note Added"; $status="1";
$object_url='lists/'.$meta['related_object'].'/members/'.$id.'/notes';
$method='post';  
}else if(in_array($event,array('delete','delete_note'))){
 $send_body=false;
 $method='delete'; 
 $object_url='';
     if($event == 'delete_note' && !empty($meta['note_object_link'])){ 
  $object_url='lists/'.$meta['related_object'].'/members/'.$meta['note_object_link'].'/notes/'.$id;
     }else{
     $object_url='lists/'.$meta['object'].'/members/'.$id;
     }
     $action="Deleted";
  $status="5";  

  }else{
$action="Updated"; $status="2";
if(empty($meta['update'])){     
 $is_main=true;
$object_url='lists/'.$module.'/members/'.$id;
 $method='patch';
 } }
}

if($is_main){

$crm_fields=array();
if(!empty($meta['fields'])){
  $crm_fields=$meta['fields'];  
}

if(is_array($fields) && count($fields)>0){
    $merge_fields=array();
    foreach($fields as $k=>$v){
  if(!empty($crm_fields[$k]['type'])){     
    $type=$crm_fields[$k]['type']; 
$val=$v['value'];

if($type == 'birthday'){ $temp_val=strtotime($val); if(!empty($temp_val)){ $val=date('m/d',$temp_val); } }
if($type == 'address'){
if(strpos($k,'-') !== false){
     $key_arr=explode('-',$k);
$merge_fields[$key_arr[0]][$key_arr[1]]=$val;
}
}else if($k == 'email_address'){
$post[$k]=$val;   
}else if(in_array($k,array('tags','interests'))){
if(!empty($val)){
 if(is_string($val)){
 $val=array_map('trim',explode(',',$val));
 }
 if(is_array($val)){
 if($k == 'interests'){
     foreach($val as $g){
     $post[$k][$g]=true;    
     }
 }else{
  $post[$k]=$val;    
 } }
}
}else{
$merge_fields[$k]=$val;      
}   }
}
if(!empty($merge_fields)){
$post['merge_fields']=$merge_fields;
}
$post['status']=!empty($meta['status']) ? $meta['status'] : 'subscribed';
$post['email_type']=!empty($meta['email_type']) ? $meta['email_type'] : 'html';
$post['language']=!empty($meta['language']) ? $meta['language'] : 'en';
if(!empty($meta['vip'])){
 $post['vip']=true;   
}
if(!empty($meta['assign_group']) && !empty($meta['groups'])){
$post['interests']=array_map(function($k){ return true; },$meta['groups']);
}

} } 
//var_dump($post); die();
$link=""; $error="";
if(!empty($method) && !empty($object_url) ){
$arr= $this->post_crm($object_url, $method,$post);
}
//var_dump($object_url,$arr,$post,$method); die();

if(!empty($arr['detail'])){
       $status=''; $error=$arr['detail'];
    }else if(!empty($arr['id'])){
$id=$arr['id'];        
//apply tags , when updating  a member
if($status == '2' && !empty($post['tags'])){
  $tags=array();
  foreach($post['tags'] as $v){
  $tags[]=array('name'=>$v,'status'=>'active');    
  }

$extra['Tags Response']=$this->post_crm($object_url.'/tags','post',array('tags'=>$tags));   
}
    }
  if($debug){
  ?>
  <h3>Account Information</h3>
  <p><?php //print_r($this->info) ?></p>
  <h3>Data Sent</h3>
  <p><?php print_r($post) ?></p>
  <h3>Fields</h3>
  <p><?php echo json_encode($fields) ?></p>
  <h3>Response</h3>
  <p><?php print_r($response) ?></p>
  <h3>Object</h3>
  <p><?php print_r($module."--------".$action) ?></p>
  <?php
 echo  $contents=trim(ob_get_clean());
  if($contents!=""){
  update_option($this->id."_debug",$contents);   
  }
  }
       //add entry note
 if(!empty($meta['__vx_entry_note']) && !empty($id)){
 $disable_note=$this->post('disable_entry_note',$meta);
   if(!($entry_exists && !empty($disable_note))){
       $entry_note=$meta['__vx_entry_note'];
       if(!empty($entry_note['body'])){
      $note_post=array('note'=>$entry_note['body']);
$object_url='lists/'.$module.'/members/'.$id.'/notes';
$note_response= $this->post_crm( $object_url,'post',$note_post);
  $extra['Note Body']=$entry_note['body'];
  $extra['Note Response']=$note_response;
       }
   }  
 }

return array("error"=>$error,"id"=>$id,"link"=>$link,"action"=>$action,"status"=>$status,"data"=>$fields,"response"=>$arr,"extra"=>$extra);
}
public function create_fields_section($fields){ 
$arr=array(); 
if(!isset($fields['object'])){
        $objects=array(''=>'Select Object');
        $objs=$this->get_crm_objects();
        if(is_array($objs) && count($objs)>0){
         $objects=array_merge($objects,$objs);   
        }
 $arr['gen_sel']['object']=array('label'=>'Select Object','options'=>$objects,'is_ajax'=>true,'req'=>true);   
}else if(isset($fields['fields']) && !empty($fields['object'])){
    // filter fields
    $crm_fields=$this->get_crm_fields($fields['object']); 
    if(!is_array($crm_fields)){
        $crm_fields=array();
    } 
    $add_fields=array();
    if(is_array($fields['fields']) && count($fields['fields'])>0){
        foreach($fields['fields'] as $k=>$v){
           $found=false; 
                foreach($crm_fields as $crm_key=>$val){
                    if(strpos($crm_key,$k)!== false){
                        $found=true; break;
                }
            }
         //   echo $found.'---------'.$k.'============'.$crm_key.'<hr>';
         if(!$found){
       $add_fields[$k]=$v;      
         }   
        }
    }
 $arr['fields']=$add_fields;   
}

return $arr;  
}  
public function field_types($data){
    return array('text'=>'Text','email'=>'Email',"number"=>'Number', "phone"=>'Phone',"date"=>'Date', "url"=>'Url', "imageurl"=>'Image URL', "birthday"=>'BirthDay');
}
public function create_field($field){
  //  return 'ok';
 
$name=isset($field['name']) ? $field['name'] : '';
$label=isset($field['label']) ? $field['label'] : '';
$type=isset($field['type']) ? $field['type'] : '';
$object=isset($field['object']) ? $field['object'] : '';

$error='Unknow error';
if(!empty($label) && !empty($type) && !empty($object)){
$body=array('name'=>$label,'type'=>$type);    
$url='lists/'.$object.'/merge-fields';    
$arr=$this->post_crm($url,'post',$body);
    $error='ok';
if(!empty($arr['error']) ){

 $error=$arr['error'];       
}
}
return $error;    
}

public function post_crm($path,$method,$body=''){
       
      $url=$this->url.$path;   
    if(is_array($body)&& count($body)>0)
   { 
       $body=json_encode($body);
   }
       


     $head=array('Authorization'=> ' apikey ' .$this->api_key); 
       if($method == 'post'){
       $head['Content-Type']='application/json';   
       }
     
       $args = array(
  'body' => $body,
  'headers'=> $head,
  'method' => strtoupper($method), // GET, POST, PUT, DELETE, etc.
  'sslverify' => false,
  'timeout' => 30,
  );
  
  $response = wp_remote_request($url, $args);
  if(is_wp_error($response)) { 
  $error = $response->get_error_message();
  return array('detail'=>$error);
  }
$body=json_decode($response['body'],true);

return $body;
}
public function get_entry($module,$id){


$arr=$this->post_crm('lists/'.$module.'/members/'.$id,'get');
if(!empty($arr['merge_fields']) && is_array($arr['merge_fields'])){
    foreach($arr['merge_fields'] as $k=>$v){
     if(is_array($v)){
    foreach($v as $key=>$val){     
     $arr[$k.'-'.$key]=$val;    
    } }else{
         $arr[$k]=$v;   
     }   
    }
}

      return $arr;     
}
}
}
?>