#!/usr/bin/env python
# -*- coding: UTF-8 -*-
print "Content-Type: text/html"
print 
import serial
import time
import cgi
import cgitb
cgitb.enable()
f = open('filetest.csv', 'w')
ser = serial.Serial('/dev/ttyUSB0', baudrate=115200, timeout=3.0)
time.sleep(2)
ser.write('i')

for x in range (0, 32):
	f.write(ser.readline())
f.close()
print "<h1><a href='../index.php'>go back</a></h1>"
