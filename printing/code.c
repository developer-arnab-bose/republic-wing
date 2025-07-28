// Bluetooth Thermal System
#include "BluetoothSerial.h"
#include "ArduinoJson.h"
#include "Adafruit_Thermal.h"
#include <WiFi.h>
#include <WebServer.h>
const char* ssid = "ARNAB_BOSE";
const char* password = "Mymainwifitouseforarnab@2024";
#define CHUNK_SIZE 512  // Adjust chunk size as needed

#if !defined(CONFIG_BT_SPP_ENABLED)
#error Serial Bluetooth not available or not enabled. It is only available for the ESP32 chip.
#endif

BluetoothSerial SerialBT;

// String MACadd = "AA:BB:CC:11:22:33";
uint8_t address[6] = { 0x10, 0x67, 0x80, 0x02, 0x70, 0x40 };
//uint8_t address[6]  = {0x00, 0x1D, 0xA5, 0x02, 0xC3, 0x22};
// String name = "PC201-7040";
const char* pin = "0000";  //<- standard pin would be provided by default
bool connected;

WebServer server(80);  // Webserver on 80 port starting
Adafruit_Thermal printer(&SerialBT);

void handleData() {
  server.sendHeader("Access-Control-Allow-Origin", "*");
  server.sendHeader("Access-Control-Allow-Methods", "POST, OPTIONS");
  server.sendHeader("Access-Control-Allow-Headers", "Content-Type");

  if (!server.hasArg("plain")) {
    server.send(400, "text/plain", "Missing body");
    return;
  }

  StaticJsonDocument<8192> doc;
  DeserializationError err = deserializeJson(doc, server.arg("plain"));
  if (err) {
    server.send(400, "text/plain", "JSON Parse Error");
    return;
  }

  int width = doc["width"];
  int height = doc["height"];
  JsonArray data = doc["data"];
  if (!data) {
    server.send(400, "text/plain", "Missing data");
    return;
  }

  uint8_t* bitmap = (uint8_t*)malloc(data.size());
  for (int i = 0; i < data.size(); i++) {
    bitmap[i] = data[i];
  }

  printer.begin();
  printer.printBitmap(width, height, bitmap);
  printer.feed(3);
  free(bitmap);
  server.send(200, "text/plain", "Printed");
}


void setup() {
  Serial.begin(115200);
  SerialBT.setPin(pin);
  SerialBT.begin("Arnab Bose", true);
  SerialBT.setPin(pin);
  Serial.println("The device started in master mode, make sure remote BT device is on!");
  connected = SerialBT.connect(address);

  if (connected) {
    Serial.println("Connected Succesfully!");
  } else {
    while (!SerialBT.connected(10000)) {
      Serial.println("Failed to connect. Make sure remote device is available and in range, then restart app.");
    }
  }
  SerialBT.connect();
  delay(1000);
  Serial.println("Printer is ready for printing");
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.print(WiFi.status());
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());

  printer.begin();  // Init printer (same regardless of serial type)
  SerialBT.print(WiFi.localIP());
  SerialBT.print("\n\n\n\n");

  server.on("/data", HTTP_OPTIONS, []() {
    server.sendHeader("Access-Control-Allow-Origin", "*");
    server.sendHeader("Access-Control-Allow-Methods", "POST, OPTIONS");
    server.sendHeader("Access-Control-Allow-Headers", "Content-Type");
    server.send(204);  // No Content
  });
  server.on("/data", HTTP_POST, handleData);
  server.begin();
}
void loop() {
  server.handleClient();
}