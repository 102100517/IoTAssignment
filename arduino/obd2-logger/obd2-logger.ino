#include <OBD2UART.h>
#include <ArduinoJson.h>
#include <RTClib.h>

int ledpin=13;
const int capacity = JSON_OBJECT_SIZE(3);
StaticJsonDocument<capacity> doc;
COBD obd;
int RPMspeed = 0;
int EngineLoad = 0;
//RTC_DS1307 RTC;

void setup() {
  // put your setup code here, to run once:
  pinMode(ledpin,OUTPUT);
  Serial.begin(9600);
  while(!Serial){
    ;
  }
  obd.begin();
  while (!obd.init()); 
  //RTC.begin();
}

void loop() {
  // put your main code here, to run repeatedly:
  doc["Action"].set("Read");
  obd.readPID(PID_RPM, RPMspeed);
  doc["RPM"].set(RPMspeed);
  obd.readPID(PID_ENGINE_LOAD, EngineLoad);
  doc["Engine Load"].set(EngineLoad);
  JsonObject obj = doc.to<JsonObject>();
  serializeJsonPretty(doc,Serial);
}
