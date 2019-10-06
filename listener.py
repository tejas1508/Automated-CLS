#!/usr/bin/env python
import sys
import time
from socket import *
import mysql.connector

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
s.bind(('192.168.29.117', 12345))

s.listen(5)
c, addr = s.accept()

try:
   while True:
       if (len(sys.argv) != 1):
           msg = sys.argv[2]+'_'+sys.argv[1]
           msg.encode()
           c.send(msg)
       else:
          data = c.recv(1024)
          data.decode()

          if(data[1] == '1'):
              pass
          elif(data)

c.close()
