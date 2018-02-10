<?php
    include_once './core/ButtonTypeManager.php'; /* Needed to create ButtonType for the menu in setup.php */
    include_once 'setup.php';
    include_once 'core/Init.php';
    $init=new Init($appToken);

if(isset($_POST['init'])){
  $init->setupBot($verification_text, $getstarted_button_payload, $welcome_text, $whiteListedDomains, $bot_menu);
 //  echo $init->returnSetupBotProfile($getstarted_button_payload, $welcome_text, $whiteListedDomains, $bot_menu);
}

?>

<?php

function getWhiteListedDomians($domains){
     $data="";
    foreach($domains as $key=>$value){
        if($key>0){
            $data.=",";
        }
        $data.="".$value;
    }
    return $data;
}

function getGetStarted($get_started){
    return $get_started['payload'];
}

function getWelcomeText($text){
    return $text[0]['text'];
}

function getMenu($menu){
    return json_encode($menu);
}
?>

<?php
$resp=$init->returnSetUpValues();
$trans=json_decode($resp,true);
$pack=$trans['data'][0];
$account_linking=isset($pack['account_linking_url'])?$pack['account_linking_url']:"Not set";
$whitelisted_domains=isset($pack['whitelisted_domains'])?getWhiteListedDomians($pack['whitelisted_domains']):"Not set";

$persistent_menu=isset($pack['persistent_menu'])?getMenu($pack['persistent_menu']):"Not set";
$get_started=isset($pack['get_started'])?getGetStarted($pack['get_started']):"Not set";
$greeting=isset($pack['greeting'])?getWelcomeText($pack['greeting']):"Not set";
$payment_settings=isset($pack['payment_settings'])?$pack['payment_settings']:"Not set";
$target_audience=isset($pack['target_audience'])?$pack['target_audience']:"Not set";
$home_url=isset($pack['home_url'])?$pack['home_url']:"Not set";

?>
<ul>
    <li>Account Linking : <?php echo $account_linking?></li>
    <li>Whitelisted Domain : <?php  echo $whitelisted_domains; ?></li>
    <li>Persistent Menu : <?php echo $persistent_menu?></li>
    <li>Get Started : <?php echo $get_started?></li>
    <li>Greeting : <?php echo $greeting?></li>
    <li>Payment Settings : <?php echo $payment_settings?></li>
    <li>Target Audience : <?php echo $target_audience?></li>
    <li>Home URL : <?php echo $home_url?></li>
</ul>


<form method="post" >
<input type="submit" name="init" value="SETUP" />
</form>