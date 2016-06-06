#!/usr/bin/env python
import serial
import time

f = open('filetest.csv', 'w')
ser = serial.Serial('/dev/ttyUSB0', baudrate=115200, timeout=3.0)
print "serial done"
time.sleep(2)
print "read"
ser.write('i')

for x in range (0, 32):
	f.write(ser.readline())
f.close()
print "done"
