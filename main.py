#!/usr/local/bin/python

import RPi.GPIO as GPIO
import time
from time import perf_counter
GPIO.setmode(GPIO.BOARD)

#define the pin that goes to the circuit
ldrPin1 = 7
ldrPin2 = 11
ldrPin3 = 13
ldrPin4 = 15

ledPin1 = 32
ledPin2 = 36
ledPin3 = 38
ledPin4 = 40

# initialize pins
GPIO.setup(ldrPin1, GPIO.OUT)
GPIO.output(ldrPin1, GPIO.LOW)
GPIO.setup(ldrPin2, GPIO.OUT)
GPIO.output(ldrPin2, GPIO.LOW)
GPIO.setup(ldrPin3, GPIO.OUT)
GPIO.output(ldrPin3, GPIO.LOW)
GPIO.setup(ldrPin4, GPIO.OUT)
GPIO.output(ldrPin4, GPIO.LOW)

def rc_time (ldrPin):
    count = 0
  
    #Output on the pin for 
    GPIO.setup(ldrPin, GPIO.OUT)
    GPIO.output(ldrPin, GPIO.LOW)
    time.sleep(0.1)

    #Change the pin back to input
    GPIO.setup(ldrPin, GPIO.IN)
  
    #Count until the pin goes high
    while (GPIO.input(ldrPin, GPIO.LOW)):
        count += 1

    return count

def measureONTime(ledPin1, ledPin2):
    t1 = perf_counter()

    while True:
        if(GPIO.input(ledPin1, GPIO.LOW)):
            t2 = perf_counter()

    
    
#Catch when script is interrupted, cleanup correctly
try:
    # Main loop
    while True:
        x1 = rc_time(ldrPin1)
        x2 = rc_time(ldrPin2)
        x3 = rc_time(ldrPin3)
        x4 = rc_time(ldrPin4)

        time.sleep(0.5)
        
        if(x1>7000 && x2>7000):
            GPIO.output(ledPin1, GPIO.HIGH)
            GPIO.output(ledPin2, GPIO.HIGH)
        else:
            GPIO.output(ledPin1, GPIO.LOW)
            GPIO.output(ledPin2, GPIO.LOW)

        if(x3>7000 && x4>7000):
            GPIO.output(ledPin3, GPIO.HIGH)
            GPIO.output(ledPin4, GPIO.HIGH)
        else:
            GPIO.output(ledPin3, GPIO.HIGH)
            GPIO.output(ledPin4, GPIO.HIGH)
           
except KeyboardInterrupt:
    pass
finally:
    GPIO.cleanup()
