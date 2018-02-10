# botsnacks
Code template to bootstrap Facebook Messenger Bot Development

Build very powerful and scalable facebook messenger bot. This code template uses cutting edge design to ease FB Bot coding.

Features: 
=========

* Use of HashTags: Reference a user's bio data is as easy as using a hashtag.

* Use of Chaining: Focus on the conversation's flow.

* Centralized Button Management: All Button types are accessed from a ButtonType Class. Buttons are created with just a single method with 3 parameters.

* Non-deterministic Text Response : Create an array of matching responses and the template selects one randomly each time it has to reply

* Easy Reciept  Response : Easily send Reciepts to users

* Bot menu template available and ready for editing : Just edit the bot token, verification token, menu text/payloads, get started payload, and more.

* Easy Payment billing : Request payment using a token, Description and Price. Payment platforms include paystack, remita, flutterwave, Paypal, Quickteller and Interswitch.

* Postback as URLContent / QuickReply as URLContent : Easily fetch the response from an api endpoint if the endpoint has been set as a   payload for a QuickReply Button or a Postback button.

* Pre-deployment debugging by running index.php on browser, sending sample requests and viewing responses: Test for bugs before production deployment

# Setting up
* Visit developer.facebook.com and create a new App.
* Generate a page access token for the bot and copy it.
* Fork botsnacks and open up setup.php.
* Edit $appToken and update the value to contain the Page Acces Token that was recently copied.
* Edit $verification_text and update the value to contain a secret text known only by you.
* Go to your Messenger bot's webhook and point it to the index.php file and input the value for the $verification_text. Note : https connection is required. ngrok is recommended for pre-production purposes as this template has been optimized for low-end processing computing systems. Select the webhook events indicated below.
* Once the Webhook has successfully been integrated, launch assist.php on your browser in order to configure/setup the Messenger bot's profile such as menu,welcome text, get started payload and more. 
* Now, chat with the bot via messenger. 


# Note :
Please select the following webhook events and nothing more. Until further notice, repetitive replies can occur if events not indicated below are selected:

*messages, 
*messaging_postbacks, 
*message_deliveries, 
*message_reads, 
*messaging_payments, 
*messaging_account_linking, 
*message_echoes, 
*

Also, edit setup.php to edit/update the setup properties. assist.php should be launched on the browser each time that setup.php is updated. Edit conversation.php to edity/update the conversation flow. No other file should be edited.
