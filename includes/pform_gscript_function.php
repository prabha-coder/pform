<?php

 
function PForm_my_ajax_callback_function() {

         $pform_tt=get_option('my_option_name');
         $GScript_URL = $pform_tt['gscript_url'];
         if( isset($_POST['PForm_Table_Data'])) {
       
         $fields_string = http_build_query($_POST['PForm_Table_Data']);
          
         	try{

          $curl = curl_init();
          curl_setopt_array($curl, array(
          CURLOPT_URL => strval($GScript_URL."?".$fields_string),
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',));
          $response = curl_exec($curl);
          curl_close($curl);
          echo $response;

         	}catch(Exception $e) {
              echo json_encode(array('error'=>$e->getMessage()));
              exit;
            }

         die();
       }
}

add_action( 'wp_ajax_PForm_my_action_name', 'PForm_my_ajax_callback_function' );    
add_action( 'wp_ajax_nopriv_PForm_my_action_name', 'PForm_my_ajax_callback_function' );