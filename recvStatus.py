import mysql.connector
import socket
import time
import requests
import json

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
port = 2019
s.bind(('192.168.43.117', port))
s.listen(5)

try:
   while True:
      c, addr = s.accept()
      data = c.recv(1024)
      data1 = data.decode()
      print(data1)
      print(type(data1))

      f = open("status.txt", "w")
      f.write(data1)
      f.close()

      c.close()
      time.sleep(1)
except KeyboardInterrupt:
   pass
