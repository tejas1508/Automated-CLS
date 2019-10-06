import sys
import time
import socket

msg = 'AUTO_ON'
print(msg)
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
port = 5555
s.connect(('192.168.43.82', port))
data = msg.encode()
s.send(data)
s.close()
