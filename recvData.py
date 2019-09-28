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

   mycursor = mydb.cursor()
   sql = """INSERT INTO data (value) VALUES (%s)"""
   val = (data,)
   mycursor.execute(sql,val)
   mydb.commit()
   mycursor.close()
   mydb.close()

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
port = 12345
s.bind(('192.168.29.117', port))

s.listen(5)
try:
   while True:
      c, addr = s.accept()
      data = c.recv(1024)
      print(data)
      data = data.decode()
      f = open("ldrData.txt", "w")
      f.write(data)
      f.close()
      c.close()
      time.sleep(5)
except KeyboardInterrupt:
   print('sadf')
