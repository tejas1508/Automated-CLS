#!/usr/local/bin/python

import RPi.GPIO as GPIO
import time
from time import perf_counter
GPIO.setmode(GPIO.BOARD)
import datetime
from socket import *
s=socket()
flag1=0
flag2=0
flag3=0
flag4=0

#define the pin that goes to the circuit
ldrPin1 = 7
ldrPin2 = 11
#ldrPin3 = 13
#ldrPin4 = 15

ledPin1 = 32
ledPin2 = 36
#ledPin3 = 38
#ledPin4 = 40

# initialize pins
GPIO.setup(ldrPin1, GPIO.OUT)
GPIO.output(ldrPin1, GPIO.LOW)
GPIO.setup(ldrPin2, GPIO.OUT)
GPIO.output(ldrPin2, GPIO.LOW)

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

        time.sleep(0.5)

        if(x1>7000):
            GPIO.output(ledPin1, GPIO.HIGH)
            flag1=1
            s.connect(('192.168.29.117',12345))
            p1=datetime.datetime.now()
            p1=str(p1)
            p1='start 1 '+p1
            p2=p1.encode()
            s.send(p2)
            s.close()
            time.sleep(1)
        else:
            if(flag1==1):
                GPIO.output(ledPin1, GPIO.LOW)
                flag1=0
                s.connect(('192.168.29.117',12345))
                p1=datetime.datetime.now()
                p1=str(p1)
                p1='end 1 '+p1
                p2=p1.encode()
                s.send(p2)
                s.close()
            else:
                GPIO.output(ledPin1, GPIO.LOW)

        if(x2>7000):
            GPIO.output(ledPin2, GPIO.HIGH)
            flag2=1
            s.connect(('192.168.29.117',12345))
            p1=datetime.datetime.now()
            p1=str(p1)
            p1='start 2 '+p1
            p2=p1.encode()
            s.send(p2)
            s.close()
            time.sleep(1)
        else:
            if(flag2==1):
                GPIO.output(ledPin2, GPIO.LOW)
                flag2=0
                s.connect(('192.168.29.117',12345))
                p1=datetime.datetime.now()
                p1=str(p1)
                p1='end 2 '+p1
                p2=p1.encode()
                s.send(p2)
                s.close()
            else:
                GPIO.output(ledPin2, GPIO.LOW)




except KeyboardInterrupt:
    pass
finally:
    GPIO.cleanup()
