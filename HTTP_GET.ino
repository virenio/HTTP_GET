/*
Title:   Test framework for HTTP GET  Date: 6 Sept 2024 5 pm
C:\xxxxp\hxxxs\ 
*/
 
#include <WiFi.h>
#include <HTTPClient.h> 
 
//const char* serverName = "http://192.168.xxx.xxx/HTTP_GET/outputs_action.php?action=outputs_state&status=1";
String serverURL = "http://192.168.xxx.xxx/vdp_HTTP_GET/";
String serverGet = "outputs_action.php?param=getData";
 
float val1 = 1 ;
const char* ssid  = "xxxxxxx";  //Set your home network SSID
const char* password  = "xxxxxx";  //Set your home network password.

const char* serverName;
String outputsState;
const long interval = 5000;
unsigned long previousMillis = 0;
WiFiClient client;
HTTPClient http;

 int httpResponseCode ;
String payload = "{}"; 

void setup(){
 Serial.begin(115200);
// Connect to Wi-Fi
  Serial.println("Title: HTTP GET   ");
  Serial.println("HTML: http://192.168.xxx.xxx/folder/outputs.php       ");
   
 
  
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi..");
  }
  
}
void loop() {
  unsigned long currentMillis = millis();
  
  if(currentMillis - previousMillis >= interval) {
     // Check WiFi connection status
    if(WiFi.status()== WL_CONNECTED ){ 
//--------------Section Working   1 ---------------------------------------------
     
  // Your IP address with path or Domain name with URL path 
  
 String serverName = serverURL + serverGet + "&param1=" + String(val1) ;
http.begin(client, serverName); 
  // Send HTTP POST request
httpResponseCode = http.GET();
   
 if (httpResponseCode>0) {
    Serial.print("------------HTTP Response code:  ");
    Serial.println(httpResponseCode);
    payload = http.getString();
  }
  else {
    Serial.print("Error code: ");
    Serial.println(httpResponseCode);
  }
  // Free resources
  http.end();
 // Serial.println(" Payload outputsState ");
  Serial.println(payload);
   outputsState = payload;
//--------------Section Working   1 ---------------------------------------------

      previousMillis = currentMillis;
    }
    else {
      Serial.println("WiFi Disconnected");
    }
  }
}
