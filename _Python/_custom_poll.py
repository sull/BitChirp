#FIGHT THE FUTURE

import xmlrpclib
import json
import time
import requests
import urllib

api = xmlrpclib.ServerProxy("http://username:password@localhost:8442/")

print api.helloWorld("TEST1","TEST2")

theRemoteURL = "https://bitchirp.org/_maintenance/bittweet_process_00.php"
inboxMessages = json.loads(api.getAllInboxMessages())
#print inboxMessages

#MAKE JSON
for s in inboxMessages['inboxMessages']:
	if int(s['receivedTime']) > int(1372636800):
		print "processing chirp...";
		theString=s['message'];
		#theString=unicode(theString,errors='ignore');
		theSubject=s['subject'];
		#theSubject=unicode(theSubject,errors='ignore');
		theTime=s['receivedTime'];
		payload={'APIKEY_A':theString,'APIKEY_X':theSubject,'APIKEY_Q':theTime};
		r=requests.post(theRemoteURL,data=payload);
		#print "processed..." + theString + "." + theTime;
