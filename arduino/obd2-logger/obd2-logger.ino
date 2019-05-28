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

void setup() {
  Serial.begin(115200);
  while(!Serial){
    ;
  }
  obd.begin();
  // initialize OBD-II adapter
  do {
    //Serial.println("Connecting..");
  } while (!obd.init());
  //Serial.println("OBD connected");
  //RTC.begin();*/
  delay(5000);
}

void loop() {
  obd.readPID(PID_ENGINE_OIL_TEMP, OilTemp);
  doc["oil"] = OilTemp;
  obd.readPID(PID_ENGINE_LOAD, EngineLoad);
  doc["engine"] = EngineLoad;
  obd.readPID(PID_RPM,RPMspeed);
  doc["rpm"] = RPMspeed;
  VehicleVoltage = obd.getVoltage();
  doc["volt"] = VehicleVoltage;
  serializeJson(doc,Serial);
  Serial.println("");
  delay(100);
}
