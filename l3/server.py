import BaseHTTPServer, SimpleHTTPServer
import ssl


httpd = BaseHTTPServer.HTTPServer(('localhost', 4822),
        SimpleHTTPServer.SimpleHTTPRequestHandler)

httpd.socket = ssl.wrap_socket (httpd.socket,
        keyfile="/home/jakub/Pulpit/szkola/CrypSec/l3/kk/privkeyA.pem", 
        certfile='/home/jakub/Pulpit/szkola/CrypSec/l3/kk/certA.crt', server_side=True)

httpd.serve_forever()
