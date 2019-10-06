import mysql.connector

import socket
import time

def storeData(data):
   mydb = mysql.connector.connect(
   host="localhost",
   user="root",
   passwd="",
   database="iottest"
   )

   lid = data1[0:1]
   print(lid)
   mins = data1[2:]
   print(mins)

   mycursor = mydb.cursor()
   sql = """INSERT INTO consumptioninfo(L_id, P_Secs) VALUES (%s, %s)"""
   val = (lid, mins)
   mycursor.execute(sql,val)
   mydb.commit()
   mycursor.close()
   mydb.close()

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
port = 12345
s.bind(('192.168.43.117', port))
s.listen(5)

try:
   while True:
      c, addr = s.accept()
      data = c.recv(1024)
      data1 = data.decode()
      print(data1)
      print(type(data1))
      storeData(data1)
      c.close()
      time.sleep(5)
except KeyboardInterrupt:
   pass
