#!/usr/bin/env python
import sys
import time
import socket

action = sys.argv[1]
lid = sys.argv[2]
print(action)
print(lid)

msg = 'AUTO_OFF\n'+action+'_'+lid
print(msg)
##msg = 'OFF_1'
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
port = 5555
s.connect(('192.168.43.82', port))
data = msg.encode()
s.send(data)
# if(len(sys.argv) == 1):
#     print(2)
# else:
#     print(sys.argv[1])
s.close()
