<?php
// Parsing and replying Chat Input

/*              HASHTAGS as User Info
 * BotSnacks uses hashtags within response text to refer to the user's public profile
 * #firstname refers to the user's first name
 * #lastname refers to the user's last name
 * #profilepic refers to the user's public profile picture
 * #locale refers to the user's locale
 * #timezone refers to the user's timezone
 * #gender refers to the user's gender

//              CHAINING as Code Structure
 * BotSnacks heavily implements chaining. This enables developers to focus on the request and response as a flow.

//              ButtonType:: as Button Reference
 * All Buttons are accessed statically from the ButtonType class.
 * Buttons require 3 parameters, (ButtonType, Title , Payload). The payload depends on the Button type.
*/
$bot=new FBResponseBot($appToken);
 $bot
        ->setDebugMode(false) 
        //->confirmPostBackAsURL()
        ->isPostBack("http://fb.com/?firsttime")// this is the greeting text from setup.php. This is the first time reply 
        ->sendTypingResponse()
        ->sendTextResponse("Hi #firstname, How are you.");
        Introduction($bot)   
        ->close()
                
        ->isIncomingContains(array("pay"))
        ->sendTypingResponse()
        ->sendPaymentRequest($payproPublicToken,"Delivery Paymment",1000)
        ->close()
                
        ->isQuickReply("https://fb.com/?menu")
        ->sendTypingResponse()
        ->sendCarousel(createMenu($bot))
        ->close() 
                
        ->isIncomingContains(array("menu"))
        ->sendTypingResponse()
        ->sendCarousel(createMenu($bot))
        ->close()
                
        ->isPostBack("https://fb.com/?menu=item1")
        ->sendTypingResponse()
        ->sendList(sendMenuList($bot,"Item 1"),true,ButtonType::getNewButtonTemplate(ButtonType::POSTBACK, "More..", "https://fb.com/list_more"))
        ->close()
        
        ->isPostBack("https://fb.com/?menu=item2")
        ->sendTypingResponse()
        ->sendList(sendMenuList($bot,"Item 2"),true,ButtonType::getNewButtonTemplate(ButtonType::POSTBACK, "More..", "https://fb.com/list_more"))
        ->close() 
                
        ->isPostBack("https://fb.com/?menu=item3")
        ->sendTypingResponse()
        ->sendList(sendMenuList($bot,"Item 3"),true,ButtonType::getNewButtonTemplate(ButtonType::POSTBACK, "More..", "https://fb.com/list_more"))
        ->close() 
                
        ->isPostBack("https://fb.com/?menu=item4")
        ->sendTypingResponse()
        ->sendList(sendMenuList($bot,"Item 4"),true,ButtonType::getNewButtonTemplate(ButtonType::POSTBACK, "More..", "https://fb.com/list_more"))
        ->close()         
          
        ->isPostBack("https://fb.com/list_more")
        ->sendTypingResponse()
        ->sendList(sendMenuList($bot,"beans"),true,ButtonType::getNewButtonTemplate(ButtonType::POSTBACK, "More..", "https://fb.com/list_more"))
        ->close()        
        
        ->isIncomingContains(array("Stupid","crazy","Mad"))
        ->sendTypingResponse()
        ->sendTextResponse(array("Sorry #firstname , but I'd prefer that we keep our conversation civil."))
        ->sendTypingResponse();
        Introduction($bot) 
        ->close()
                
        ->isIncomingContains(array("Hi","Hey","Hello","Wassup","Menu"))
        ->sendTypingResponse()
        ->sendTextResponse(array("Hi","Welcome #firstname","How are you, #firstname?")) //Selects a random response from the array
        ->sendTypingResponse()
        ->sendTextResponse("We deliver food groceries promptly. Let's deliver to you. Try this Recipe.")
        ->sendTypingResponse();
        Introduction($bot) 
        ->close()
                
        ->isIncomingContains(array(array("How","are","you")))//Checks for word combibnation in on particular order 
        ->sendTypingResponse()
        ->sendTextResponse(array("I'm ok","I'm cool","I'm fine","I'm doing great"))
        ->sendTypingResponse()
        ->sendTextResponse(array("How are you?"))
        ->close() 
        
        ->isIncomingContains(array("ok","FINE","cool","great"))
        ->sendTypingResponse()
        ->sendTextResponse(array("Great!!","Nice.","Awesome"))
        ->sendTypingResponse()
        ->sendTextResponse(getHi())        
        ->close()           
        
        ->isIncomingContains(array(array("How","much"),array("How","affordable")))
        ->sendTypingResponse()
        ->sendTextResponse(array("Very affordable","Depends on your order"))
        ->close() 

        ->isQuickReply("https://fb.com/pay")
        ->sendTypingResponse()
        ->sendPaymentRequest($payproPublicToken,"Delivery Paymment",1000)
        ->close()
                
        ->isIncomingContains(array(array("demo","reciept")))
        ->sendReciept("Mr Buyer","ORD665555","NGN","VISA6677","buy.com/product/554","0.00",$timestamp="99897876","4 Stores"
                //We'd rather not bother ourself with the extra data, but it's still available for those that need
           ,$bot->getRecieptExtra(  
                   $bot->getRecieptSummary(1000,500,300),  // or false
                   $bot->getRecieptAddress("No 1 street ", "No 1 street", "City", "234555", "Lagos", "Nigeria"), //or false
                   generateRecieptAdjustments($bot), // or false
                   generateRecieptElements($bot))       // or false f0r extra_data.
                )
        ->close()
               
        
        ;
        
        
        function Introduction($bot){
        $bot
        ->sendTextResponse(getHi())
       ->sendQuickReplyResponse("How are you?",
                array(
                        ButtonType::getNewButtonTemplate(ButtonType::QUICKBUTTON,"Cool", "https://fb.com/pay"),
                        ButtonType::getNewButtonTemplate(ButtonType::QUICKBUTTON,"Hmm..", "https://fb.com/?menu")
                     ));
          return $bot;  
        }

        function getHi(){
            $recipe="";
            $recipe.="Hi";
            return $recipe;
        }
        
        function createMenu($bot){ ///Sample Carousel List
            $menu=array(
            $bot->getNewCarouselTemplateItem("Item 1", "image1.png", "View Item 1",false,array(ButtonType::getNewButtonTemplate(ButtonType::POSTBACK, "View", "https://fb.com/?menu=item1"))),
            $bot->getNewCarouselTemplateItem("Item 2", "image2.png", "View Item 2",false,array(ButtonType::getNewButtonTemplate(ButtonType::POSTBACK, "View", "https://fb.com/?menu=item2"))),
            $bot->getNewCarouselTemplateItem("Item 3", "image3.png", "View Item 3",false,array(ButtonType::getNewButtonTemplate(ButtonType::POSTBACK, "View", "https://fb.com/?menu=item3"))),
            $bot->getNewCarouselTemplateItem("Item 4", "image4.png", "View Item 4",false,array(ButtonType::getNewButtonTemplate(ButtonType::POSTBACK, "View", "https://fb.com/?menu=item4")))
        );
          return $menu;  
        }
        
        function sendMenuList($bot,$item){  //Sample List 
            $icon="";
            return array(
            $bot->getNewCarouselTemplateItem("Upcoming...", $icon, "$item menu", false ,array(ButtonType::getNewButtonTemplate(ButtonType::WEB_URL, "View", "https://dd.com"))),
            $bot->getNewCarouselTemplateItem("Upcoming...", $icon, "$item menu", ButtonType::getNewButtonTemplate(ButtonType::WEBVIEW_FULL, "Title", "https://fb.com/samplepostback"),array(ButtonType::getNewButtonTemplate(ButtonType::WEBVIEW_TALL, "View", "https://fb.com"))),
            $bot->getNewCarouselTemplateItem("Upcoming...", $icon, "$item menu", ButtonType::getNewButtonTemplate(ButtonType::WEBVIEW_FULL, "Title", "https://fb.com"),array(ButtonType::getNewButtonTemplate(ButtonType::POSTBACK, "View", "https://fb.com")))
        );  
        }
        
        function getInstructionalVideo($food){
               return "https://youtu.be/R2dRrjMFVxA";
       }
        
        function generateRecieptElements($bot){
            return array(
                $bot->getRecieptCartItem("Item 1"/*Compulsory*/, "from 4store"/*or false*/, 1/*or false*/, "200"/*or false*/, "NGN"/*or false*/, "www.pixar.com/shirt/shirt.img"/*or false*/),
                $bot->getRecieptCartItem("Item 2"/*Compulsory*/, "from 4store"/*or false*/, 1/*or false*/, "200"/*or false*/, "NGN"/*or false*/, "www.pixar.com/shirt/shirt.img"/*or false*/),
                $bot->getRecieptCartItem("Item 3"/*Compulsory*/, "from 4store"/*or false*/, 1/*or false*/, "200"/*or false*/, "NGN"/*or false*/, "www.pixar.com/shirt/shirt.img"/*or false*/)
                );
            
        }
        
        function generateRecieptAdjustments($bot){
            return array(    
              $bot->getRecieptAdjustmentsItem("Tie", "200"),
              $bot->getRecieptAdjustmentsItem("Gucci Shoes", "490")
                        );
        }


?>
