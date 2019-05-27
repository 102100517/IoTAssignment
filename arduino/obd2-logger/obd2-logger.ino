#include <OBD2UART.h>
#include <ArduinoJson.h>
#include <RTClib.h>

int ledpin=13;
StaticJsonDocument<200> doc;
COBD obd;
int OilTemp = 0;
int EngineLoad = 0;
int RPMspeed = 0;
float VehicleVoltage = 0;
//RTC_DS1307 RTC;

void setup() {
  // put your setup code here, to run once:
  //pinMode(ledpin,OUTPUT);
  Serial.begin(115200);
  while(!Serial){
    ;
  }
  /*obd.begin();
  // initialize OBD-II adapter
  do {
    //Serial.println("Connecting..");
  } while (!obd.init());
  //Serial.println("OBD connected");
  //RTC.begin();*/
  delay(5000);
}

void loop() {
  // put your main code here, to run repeatedly:
  //obd.readPID(PID_ENGINE_OIL_TEMP, OilTemp);
  //Serial.print(OilTemp);
  //Serial.println("C");
  doc["oil"] = 86;
  //obd.readPID(PID_ENGINE_LOAD, EngineLoad);
  //Serial.print(EngineLoad);
  //Serial.println("%");
  doc["engine"] = 40;
  //obd.readPID(PID_RPM,RPMspeed);
  //Serial.println(RPMspeed);
  doc["rpm"] = 4000;
  //VehicleVoltage = obd.getVoltage();
  //Serial.print(VehicleVoltage);
  //Serial.println("V");
  doc["volt"] = 13.7;
  //JsonObject obj = doc.to<JsonObject>();
  serializeJsonPretty(doc,Serial);
  delay(100);
}
