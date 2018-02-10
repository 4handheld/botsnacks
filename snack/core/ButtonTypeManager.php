<?php

class ButtonType{
     const  POSTBACK="postback";
     const  WEB_URL="web";
     const  WEBVIEW_TALL="webview_tall";
     const  WEBVIEW_FULL="webview_full";
     const  WEBVIEW_COMPACT="webview_compact";
     const  SHARE="share";
     const  CALL="call";
     const  LOGIN="login";
     const  LOGOUT="logout";
     const  QUICKBUTTON="quickbutton";
     const  NESTED="nested";
     
     
//    postback, web, share, call, login, logout, quickbutton, webview
   static function getNewButtonTemplate($type="postback",$title="Sample Postback",$payload="Post back was clicked"){
        if($type=="quickbutton"){  //Quick Response Button
        return array(
                     "content_type"=>"text", //
                     "title"=>$title,
                     "payload"=>$payload
                     );
        }else if($type=="nested"){
         return array(
                "type"=>$type, //
                "call_to_actions"=>$payload,
                "title"=>$title
                 ); 
        }else if($type=="postback"){
        return array(
                     "type"=>$type, //
                     "title"=>$title,
                     "payload"=>$payload
                     );
        }else if($type=="web"){
         return array(
                "type"=>"web_url", //
                "url"=>$payload,
                "title"=>$title
                 ); 
        }else if($type=="webview_full"){
         return array(
                "type"=>"web_url", //
                "url"=>$payload,
                "title"=>$title,
                "fallback_url"=>$payload,
                "messenger_extensions"=>true,
                "webview_height_ratio"=>"full"
                 ); 
        }else if($type=="webview_tall"){
         return array(
                "type"=>"web_url", //
                "url"=>$payload,
                "title"=>$title,
                "fallback_url"=>$payload,
                "messenger_extensions"=>true,
                "webview_height_ratio"=>"tall"
                 ); 
        }else if($type=="webview_compact"){
         return array(
                "type"=>"web_url", //
                "url"=>$payload,
                "title"=>$title,
                "fallback_url"=>$payload,
                "messenger_extensions"=>true,
                "webview_height_ratio"=>"compact"
                 ); 
        }else if($type=="share"){
         return array(
                "type"=>"element_".$type, //
                "share_contents"=>array(
                        "attachment"=>array(
                            "type"=>"template",
                            "payload"=>$payload  //list template,  generic(carousal) template, media template
                        )
                )
           ); 
        }else if($type=="call"){
         return array(
                "type"=>"phone_number", //
                "url"=>$payload,
                "title"=>$title
                 ); 
        }else if($type=="login"){
         return array(
                "type"=>"account_link", //
                "url"=>$payload
                 ); 
        }else if($type=="logout"){
         return array(
                "type"=>"account_unlink"
                 ); 
        }else{
         return array();   
        }
        
    }
     
}
?>
