
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
    digitalWrite(PIN_LED, LOW);
  }
}

void http_post() {

}
