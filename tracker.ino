#include <LGPS.h>
#include <LGPRS.h>
#include <LGPRSClient.h>
#include <LGSM.h>
#include <DisplayManager.h>
#include <Icons.h>
#include <Lumi.h>
#include <Lumi_default_font.h>
#include <LumiBig.h>
#include <system.h>

gpsSentenceInfoStruct gpsInfo;
LGPRSClient client;

#define SITE_URL "utility.liveanswer.com"
double latitude = 0.00;
double longitude = 0.00;
float dop = 100.00; //dilution of precision
float geoid = 0.00;
int sat_num = 0; //number of visible satellites

String lat_format = "0.00000", lon_format = "0.00000";
String raw = "";

char buff2[50];
int len = 0;
char *command;
char *device;
char *textToNumber;

void setup() {
  // Set pin for output
  pinMode(13, OUTPUT);

  // Initialize the OLED display library
  DisplayManager::init();
  Serial.begin(9600);

  // Power GPS
  LGPS.powerOn();

  // Start up the SMS listener
  while (!LSMS.ready()) {
    delay(1000);
  }

  // If there's a leftover message, flush it.
  if (LSMS.available())
  {
    Serial.println("Flushing in setup...");
    LSMS.flush();
  }
  Serial.println("SMS ready.");

  //GPRS signal
  while (!LGPRS.attachGPRS("wireless.twilio.com", NULL, NULL)) {
    Serial.println("Waiting for GPRS signal...");
    delay(1000);
  }
  Serial.println("GPRS attached.");
}

void loop() {
  // If we have SMS data available, we received a command!
  if (LSMS.available())
  {
    // We received a command!
    // Read in the command response into buff
    while (true)
    {
      int v = LSMS.read();
      if (v < 0)
        break;

      buff2[len++] = (char)v;
    }
    Serial.println(buff2);

    // Store the device ID
    device = strtok(buff2, " ");

    // Store the command
    command = strtok(NULL, " ");

    //Store the caller ID
    String callerId = strtok(NULL, " ");
    textToNumber = strtok(NULL, " ");
    //Output caller ID in Display
    DisplayManager::writeText(textToNumber);

    //Store the command
    String cmd = command;

    //check for command
    if (cmd == "where" || cmd == "Where" || cmd == "Where?"  || cmd == "where?") {
      while(!client.connect(SITE_URL, 80))
      {
        client.connect(SITE_URL, 80);
        Serial.println("Could not connect to: " SITE_URL);
      }
      if (getData(&gpsInfo) > 0) {
        DisplayManager::writeText("GPS OK");
        // Connect client to the test site
        Serial.print("Connecting to: " SITE_URL "...");

        Serial.println("Sending test POST request...");
        LGPS.getData(&gpsInfo);
        Serial.println((char*)gpsInfo.GPRMC);
        String gpsCoordinates = (char*)gpsInfo.GPRMC;

        String str = "GET /find_my_device/index.php?";
        str += "signal=true";
        str += "&lat=";
        str += lat_format;
        str += "&lon=";
        str += lon_format;
        str += "&text_to=";
        str += callerId;
        str += "&raw=";
        str += raw;
        client.println(str);
        client.println(" HTTP/1.1");
        client.println("Host: " SITE_URL);
        client.println();

        Serial.println("Waiting for response from test site...");
        Serial.println(str);
        digitalWrite(13, LOW);
      } else {
        DisplayManager::writeText("NO GPS");
        digitalWrite(13, HIGH);
        String str = "GET /find_my_device/index.php?";
        str += "signal=false";
        str += "&text_to=";
        str += callerId;
        client.println(str);
        client.println(" HTTP/1.1");
        client.println("Host: " SITE_URL);
        client.println();
        Serial.println(str);
      }

    }
    // Reset variables for next message.
    LSMS.flush();
    memset(&buff2[0], 0, sizeof(buff2));
    len = 0;
  }

  if (client.available())
  {
    char c = client.read();
    Serial.print(c);
  }

}

float convert(String str, boolean dir)
{
  double mm, dd;
  int point = str.indexOf('.');
  dd = str.substring(0, (point - 2)).toFloat();
  mm = str.substring(point - 2).toFloat() / 60.00;
  return (dir ? -1 : 1) * (dd + mm);
}



int getData(gpsSentenceInfoStruct* info)
{
  Serial.println("Collecting GPS data.----");
  LGPS.getData(info);
  Serial.println((char*)info->GPGGA);
  if (info->GPGGA[0] == '$')
  {
    Serial.print("Parsing GGA data....");
    String str = (char*)(info->GPGGA);
    str = str.substring(str.indexOf(',') + 1);
    raw = str;

    str = str.substring(str.indexOf(',') + 1);
    latitude = convert(str.substring(0, str.indexOf(',')), str.charAt(str.indexOf(',') + 1) == 'S');
    int val = latitude * 1000000;
    String s = String(val);
    lat_format = s.substring(0, (abs(latitude) < 100) ? 2 : 3);
    lat_format += '.';
    lat_format += s.substring((abs(latitude) < 100) ? 2 : 3);
    str = str.substring(str.indexOf(',') + 3);
    longitude = convert(str.substring(0, str.indexOf(',')), str.charAt(str.indexOf(',') + 1) == 'W');
    val = longitude * 1000000;
    s = String(val);
    lon_format = s.substring(0, (abs(longitude) < 100) ? 3 : 3);
    lon_format += '.';
    lon_format += s.substring((abs(longitude) < 100) ? 3 : 3);
    str = str.substring(str.indexOf(',') + 3);
    str = str.substring(2);
    sat_num = str.substring(0, 2).toInt();
    str = str.substring(3);
    dop = str.substring(0, str.indexOf(',')).toFloat();
    str = str.substring(str.indexOf(',') + 1);
    str = str.substring(str.indexOf(',') + 3);
    geoid = str.substring(0, str.indexOf(',')).toFloat();
    Serial.println("done.");
    if (info->GPRMC[0] == '$')
    {
      Serial.print("Parsing RMC data....");
      str = (char*)(info->GPRMC);
      int comma = 0;
      for (int i = 0; i < 60; ++i)
      {
        if (info->GPRMC[i] == ',')
        {
          comma++;
          if (comma == 7)
          {
            comma = i + 1;
            break;
          }
        }
      }
      str = str.substring(comma);
      str = str.substring(str.indexOf(',') + 1);
      str = str.substring(str.indexOf(',') + 1);

      Serial.println("done.");
      return sat_num;
    }
  }
  else
  {
    Serial.println("No GGA data");
  }
  return 0;
}
