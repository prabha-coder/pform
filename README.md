# PForm Wordpress Plugin

This Plugin is to help us to collect contact form details from a WordPress site to Google sheet and send a notification to the telegram.

[Download](https://raw.githubusercontent.com/prabha-coder/pform/master/pform.zip "PForm Wordpress Plugin Download")

### Plugin Features :

- Adaptable Layout with WordPress Theme

**Tested on Astra Theme 1**

[![Pform-Output1.png](https://i.postimg.cc/7hrF851Z/Pform-Output1.png)](https://github.com/prabha-coder/pform "Layout 1")

[![Pform-Output2.png](https://i.postimg.cc/MKzqLLpJ/Pform-Output2.png)](https://github.com/prabha-coder/pform "Layout 2")

**Tested on Astra Theme 2**

[![Theme2.png](https://i.postimg.cc/wxF2dtQ4/Theme2.png)](https://github.com/prabha-coder/pform "Layout 3")

- Changeable Contact Form Titles

- Can Enable/Disable Button Form

- Google Sheet Storage

- Get Notification on Telegram

------------

### How to Use :

- Download PForm Plugin and Install it on Your WordPress Site.

- After activate the plugin and select <code>PForm Setting</code> from Menu sidebar.

- Fill the details for your titles and Google Web App URL.

[![Pform-Option2.png](https://i.postimg.cc/9M4H2tHV/Pform-Option2.png)](https://github.com/prabha-coder/pform "PForm")

**👇 How to get Google Web App URL  👇**

- Goto your [Google drive](https://drive.google.com "Drive") and Click <code>New</code> Button from Left Top -> Click <code>Google Sheets</code> and Give the file name.

- Type tag names on the first row of the sheet. Refer to this image 👇

[![create-tag-names.png](https://i.postimg.cc/MGQgrZ7K/create-tag-names.png)](https://postimg.cc/KKm912pd)

- Click <code>Tools</code> from menu bar and Select <code>Script editor</code>.

- Create a Telegram Bot from [@Botfather](https://t.me/botfather "Botfather") & Copy the Token.

- Goto your created Bot and send <code>/start</code> or Click Start button.

- Now GoTo  [@userinfobot](http://t.me/userinfobot "userinfobot") Send it any message it will give your Telegram ID (9 Digit) and copy the ID.

- Copy the code from <code>[Code.gs](https://github.com/prabha-coder/pform/blob/master/Code.gs "Code.gs")</code>.

- Paste it on Script Editor and Replace Telegram Token and ID. Refer to this image 👇 

[![Google-Apps-Script-Code.png](https://i.postimg.cc/br3HpMXF/Google-Apps-Script-Code.png)](https://github.com/prabha-coder/pform "App Script Code")

- Save it and if it asks authorization, Give it. Click the Deploy button and Select New Deployment.

- In Prompt Window, Select <b>who has access</b> to <code>Anyone</code>. Finally, Click <code>Deploy</code> Button and Copy the Web App URL.

- Paste it on PForm setting -> Google App Script URL field and click Save Changes. That's it.

**👇 How to place contact form in WordPress page/post  👇**

- Paste this shortcode <code><b> [pform_contact] </b> </code> on anywhere wordpress page/post.

- For Button Contact Form, You can enable/disable it from PForm Setting.
**👇 Google Sheet Storage 👇**

[![Conform-Data-Stored-In-Google-Sheet.png](https://i.postimg.cc/sxWnW20M/Conform-Data-Stored-In-Google-Sheet.png)](https://github.com/prabha-coder/pform "Google Sheet Screenshot")

**👇 Telegram Notification  👇**

[![Telegram-screenshot.jpg](https://i.postimg.cc/3N8fXVg3/Telegram-screenshot.jpg)](https://github.com/prabha-coder/pform "Telegram Screenshot")
