#!/usr/local/bin/python

import RPi.GPIO as GPIO
import time
GPIO.setmode(GPIO.BOARD)

#define the pin that goes to the circuit
pin_to_circuit = 7
pin1=40
GPIO.setup(pin1, GPIO.OUT)
GPIO.output(pin1, GPIO.LOW)
def rc_time (pin_to_circuit):
    count = 0
  
    #Output on the pin for 
    GPIO.setup(pin_to_circuit, GPIO.OUT)
    GPIO.output(pin_to_circuit, GPIO.LOW)
    time.sleep(0.1)

    #Change the pin back to input
    GPIO.setup(pin_to_circuit, GPIO.IN)
  
    #Count until the pin goes high
    while (GPIO.input(pin_to_circuit) == GPIO.LOW):
        count += 1

    return count

#Catch when script is interrupted, cleanup correctly
try:
    # Main loop
    while True:
        x1=rc_time(pin_to_circuit)
        print(x1)
        if(x1>7000):
            GPIO.output(pin1, GPIO.HIGH)
            print('High')
            time.sleep(1)
        else:
            GPIO.output(pin1, GPIO.LOW)
except KeyboardInterrupt:
    pass
finally:
    GPIO.cleanup()
