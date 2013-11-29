#FIGHT THE FUTURE by "SRMojuze"
#Licensed under GNU GPL V3

import xmlrpclib
import json
import time
import requests
import urllib
import time
import base64


#test MYSQL
import MySQLdb
#USE UNICODE WHEN CONNECTING TO MYSQL
conn = MySQLdb.connect(host="localhost",port=3306,user="USERNAME",passwd="PASSWORD",db="DATABASE",use_unicode = True, charset = "utf8",)
cursor = conn.cursor()

api = xmlrpclib.ServerProxy("http://user:password@localhost:8442/")

print api.helloWorld("test1","test2")

#theRemoteURL = "http://bitchirp.org/_maintenance/bittweet_process_00.php"
inboxMessages = json.loads(api.getAllInboxMessages())
#print inboxMessages

#MAKE JSON
for s in inboxMessages['inboxMessages']:
	if int(s['receivedTime']) > int(time.time()-20000):
		print "processing chirp..."
		theFromAddress=s['fromAddress']	
		theToAddress=s['toAddress']
		theString=s['message']
		theString=theString.decode('base64')
		#theString=unicode(theString,errors='ignore');
		theSubject=s['subject']
		theSubject=theSubject.decode('base64')
		#theSubject=unicode(theSubject,errors='ignore');
		theTime=s['receivedTime']
	
		#Let's see if it is new
		cursor.execute("SELECT COUNT(*) FROM core_00 WHERE time = FROM_UNIXTIME(%s) AND from_address = %s",(theTime,theFromAddress))
		theResult=cursor.fetchone()[0]
		print "Result is: " + str(theResult)
		if theResult < 1:
			cursor.execute("INSERT INTO core_00(time,from_address,to_address,subject,tweet) VALUES(FROM_UNIXTIME(%s), %s,%s,%s,%s)",(theTime,theFromAddress,theToAddress,theSubject,theString))
			conn.commit()

		#Prevent Terminal/nohup/etc errors?
		print type(theSubject) 
		#This is not correct since base64 should go to byte should go to unicode?
		print unicode(theSubject,errors="ignore")
		print "received at " + theTime

conn.close();	
