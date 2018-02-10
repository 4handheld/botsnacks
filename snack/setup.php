<?php
///Setup initialization parameters here

        $appToken="EAACdrknpvt8BAIZAHG7sZCZA4lx7JxPi6wZC8YFEOk5v2h87UFor6nZCywLmFYDY2BBwZCpxefKnDjkt4IB9sabvjrHe4ZAm13Dj98qpa6x8lU1C7nWQcQZAekLUdb7vykZBYfswzIGCIuG0ey89DMcKRvNzuO3Yup6BGawNDQI3UkKLZBspJOCUZCc";/*A very long string */        
        $payproPublicToken="XXXXXXXXXXXXXXXXXXXXXXXXx";
        $verification_text="YOUR VERIFICATION TEXT HERE"; /* A word or text known only by you required for webhook verification */
        $getstarted_button_payload="http://fb.com/?firsttime"; /* A payload returned to your webhook when the get started button is clicked */
        $welcome_text="Hi #firstname :). I'm a Bot. Try me. "; /*A Welcome text when the user is about to interact with the bot */
        $whiteListedDomains=array("http://4handheld.com");/* Needed for Webviews. Include urls that would be in direct connection with messenger within the array() */ 
/*      Menu requires 3 parameters Title, type and payload. payload type depends on the type. Visit https://github.com/botapi#menu for more */
        $bot_menu=array(   //
            ButtonType::getNewButtonTemplate(ButtonType::POSTBACK,"Menu","https://4handheld.com/"), // Opens a full Webview within messenger
            ButtonType::getNewButtonTemplate(ButtonType::NESTED,"More...",array(                               // Opens a submenu (Nested menu) within messenger
                    ButtonType::getNewButtonTemplate(ButtonType::POSTBACK,"About","https://4handheld.com"), //Returns that a button was clicked
                    ButtonType::getNewButtonTemplate(ButtonType::WEBVIEW_FULL,"I want a Chat Bot","https://4handheld.com")
                    ))
            );
  

?>