**HTTP GET**

**The GET Method**

GET is used to request data from a specified resource using an ASCII string of maximum 2048 characters. The request can be cached and remains in the browser history. Only used when requesting data and never for sensitive information. Encoding type “application/x-www-form-urlencoded”.

A comparison between **POST** and **GET** is discussed on a separate page (https://github.com/virenio/HTTP-POST-vs-GET).

A simple framework explaining and implementing HTTP - GET is presented in this article. There is an actual implementation of two-way communication done to demonstrate the flow of data from the ESP32 to a website , process some variable on the website  and transfer data from Website to ESP32. The URL sent from ESP32 to The Website can be studied in detail. “ param1” can be scaled up to “paramN”. 

String  Data =   

                        "&param1=" + String(val1) +
                        
                        "&param2=" + String(val2) + 
                        
                           …………………………………
                           
                        "&paramN=" + String(valN) +  "";

The URL length limit of 2048 characters must be maintained. 

**Code**

Code is presented in 2 parts one php server site based files and ESP32 code. A database is used to store interim values. 

**Files: outputs_action.php    and HTTP_GET.ino.**
 
**HTTP_GET.ino**

The code is straightforward. Will discuss the URL sent to the webpage. 

String serverURL = "http://192.168.xx.xx/HTTP_GET/";

String serverGet = "outputs_action.php?param=getData";

String serverName = serverURL + serverGet + "&param1=" + String(val1) ;

Note the settings of interest. **“param”**   and **“param1”**

This will allow user to send unlimited combination of values to request data from the website.
The student is requested to try various combinations and request data from the website. The code then receives the HTTP response and the payload.

  Free resources
  
  http.end();

**outputs_action.php**

 if ($_SERVER["REQUEST_METHOD"] == "GET") {
 receives the request 
$action = clean_input($_GET["param"]);
        if ($action == "getData") {
param value is checked 

  $id = clean_input($_GET["param1"]);//not used
param1 is checked 

$result = getData();
             $result1 = $result["intVal1"];
Data is read from the dataTable

echo $result1 ;
data is sent to the ESP32

$result1 =  $result1 +1 ;
Data is processed

$err =  updateOutput($result1);

Processed Data is saved on the dataTable.

**Note:**

1)	XAMPP based APACHE and MYSQL server used for localhost access.
2)	ESP32 / ESP8266 programmed with Arduino IDE. Framework can be applied to other microcontrollers with WIFI, with small modifications.
3)	<myWebSite.com (generic name ) > Cloud server website   on some hosting service of your choice.
4)	PHP Script, JSON and JavaScript are used in the examples
5)	The code and implementation are posted for Educational and training purposes only.are posted for Educational and training purposes only.
.


