function doGet(e){
  return handleResponse(e);
}

//GOOGLE SHEET NAME
let SHEET_NAME = "Sheet1";

//Your Bot Token Generated From @BotFather
const BOT_TOKEN = "<--Bot Token-->";

//Your Telegram User ID 
const CHATID = "<--Chat ID-->";

let SCRIPT_PROP = PropertiesService.getScriptProperties(); 

function handleResponse(e) {

  try {
    
    var doc = SpreadsheetApp.openById(SCRIPT_PROP.getProperty("key"));
    var sheet = doc.getSheetByName(SHEET_NAME);
    var headRow = e.parameter.header_row || 1;
    var headers = sheet.getRange(1, 1, 1, sheet.getLastColumn()).getValues()[0];
    var nextRow = sheet.getLastRow()+1; 
    var row = []; 
    for (i in headers){
      if (headers[i] == "Timestamp"){ 
        row.push(new Date());
      } else { 
        row.push(e.parameter[headers[i]]);
      }
    }
    
    sheet.getRange(nextRow, 1, 1, row.length).setValues([row]);
    return ContentService
          .createTextOutput(JSON.stringify({"result":"success", "row": nextRow}))
          .setMimeType(ContentService.MimeType.JSON);
  } catch(e){
    
    return ContentService
          .createTextOutput(JSON.stringify({"result":"error", "error": e}))
          .setMimeType(ContentService.MimeType.JSON);
  } finally { 
    var super_data = "<b>💌 New Contact Form Received 💌</b>\n\n<b>Name: </b>"+e.parameter.name+"\n<b>Email: </b><code>"+e.parameter.email+"</code>\n<b>Subject: </b>\n<code>"+e.parameter.subject+"</code>\n<b>Message: </b>\n<code>"+e.parameter.message+"</code>";
    telegram(super_data);
  }
}

function setup() {
    var doc = SpreadsheetApp.getActiveSpreadsheet();
    SCRIPT_PROP.setProperty("key", doc.getId());
}

function telegram(super_data) {
  var telegramData = {
    "chat_id" : CHATID,
    "text" : super_data,
    "parse_mode" : "HTML"
};
  var options = {
    "method" : "POST",
    "contentType" : "application/json",
    "payload" : JSON.stringify(telegramData)
  };
  var url = "https://api.telegram.org/bot"+BOT_TOKEN+"/sendMessage";
  var tresponse = UrlFetchApp.fetch(url, options);
}