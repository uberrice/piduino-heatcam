import serial
import time

f = open('filetest.csv', 'w')

ser = serial.Serial('/dev/ttyUSB0', 115200)
time.sleep(3)
ser.write('i')

for x in range (0, 32):
	f.write(ser.readline())
