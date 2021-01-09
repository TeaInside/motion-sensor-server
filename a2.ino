
#include "WiFly.h"
#include <LiquidCrystal.h>

#define PIN_LED   (4)
#define PIN_PIEZO (3)
#define PIN_INPUT (2)

char x = 0;
int counter = 0;

const int rs = 13, en = 12, d4 = 11, d5 = 10, d6 = 9, d7 = 8;
LiquidCrystal lcd(rs, en, d4, d5, d6, d7);

void http_post();

void setup() {
  lcd.begin(2, 16);
  pinMode(PIN_LED, OUTPUT);
  pinMode(PIN_PIEZO, OUTPUT);
  pinMode(PIN_INPUT, INPUT);

  String ssid = "android-j3";
  String passphrase = "aaabbbccc123!@#";

  WiFly.begin();
  if (!WiFly.join(ssid, passphrase)) {
    Serial.println("Association failed.");
    while (1) {
      // Hang on failure.
    }
  }
}

void loop() {
  int val = digitalRead(PIN_INPUT);
  lcd.setCursor(0, 0);
  lcd.print(counter);
  if (val == HIGH) {
    if (!x) {
      x = 1;
      http_post();
      counter++;
    } else {
      digitalWrite(PIN_LED, HIGH);
      tone(PIN_PIEZO, 1000, 500);
    }
  } else {
    x = 0;
    digitalWrite(PIN_LED, LOW);
  }
}


Client client("fp-hs.teainside.org", 443);

void http_post()
{
  String PostData="action=1";
  unsigned char i;

  if (client.connect()) {
    client.println("POST /insert.php HTTP/1.1");
    client.println("Host: fp-hs.teainside.org");
    client.println("User-Agent: Arduino/1.0");
    client.println("Connection: close");
    client.println("API-Key: 51866292d9f808e47c67930bb63989fc");
    client.println("Content-Type: application/x-www-form-urlencoded;");
    client.print("Content-Length: ");
    client.println(PostData.length());
    client.println();
    client.println(PostData);
  }
}
