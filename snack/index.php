<?php
include_once './core/ButtonTypeManager.php'; /* Needed to create ButtonType for the menu in setup.php */
include_once 'setup.php';  /* Include setup parameters */
if(isset($_REQUEST['hub_challenge'])){
            $facebook_challenge=isset($_REQUEST['hub_challenge'])?$_REQUEST['hub_challenge']:false;
            $hub_verify_token=isset($_REQUEST['hub_verify_token'])?$_REQUEST['hub_verify_token']:false;
            
            if(($hub_verify_token===$verification_text) && $facebook_challenge && $hub_verify_token ){
                echo $facebook_challenge;
            }
            return;
}


include_once './core/FBResponseBot.php'; /* Include necessary methods */
include_once 'dialogue.php'; /* include replies for incoming requests */

?>
