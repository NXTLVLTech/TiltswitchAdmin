<?php  

$token= $_POST['token'];
$data= $_POST['data'];
echo $token;
sendNotification($token,$data);
function sendNotification($token,$message){
 if($token!=''){
  $url='https://fcm.googleapis.com/fcm/send';
  $fields=array('registration_ids'=>array($token),'data'=>array("message"=>$message));
  $fields=json_encode($fields);
 $headers=array('Authorization: key='."AIzaSyCwzgJZF9LU_Xmh0SHePxRSnArihcEHMck",'Content-Type:application/json');
  $ch=curl_init();
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_POST,true);
  curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch,CURLOPT_POSTFIELDS,$fields);
 	$result=curl_exec($ch);
  curl_close($ch);
 }
}

?>