#FIGHT THE FUTURE

import xmlrpclib
import json
import time
import requests
import urllib
import time
import base64

api = xmlrpclib.ServerProxy("http://username:password@localhost:portnumber")

print api.helloWorld("TEST1","TEST2")

theRemoteURL = "https://bitchirp.org/DIRECTORY/PROCESS.php"
inboxMessages = json.loads(api.getAllInboxMessages())
#print inboxMessages

#MAKE JSON
for s in inboxMessages['inboxMessages']:
	if int(s['receivedTime']) > int(time.time()-50000):
		print "processing chirp...";
		theFromAddress=s['fromAddress'];
		theToAddress=s['toAddress'];
		theString=s['message'];
		theString=base64.b64decode(theString);
		#theString=unicode(theString,errors='ignore');
		theSubject=s['subject'];
		theSubject=base64.b64decode(theSubject);
		#theSubject=unicode(theSubject,errors='ignore');
		theTime=s['receivedTime'];
		payload={'APIKEYHERE':theString,'APIKEYHERE':theSubject,'APIKEYHERE':theTime,'APIKEYHERE':theFromAddress,'APIKEYHERE':theToAddress};
		r=requests.post(theRemoteURL,data=payload);
		print "processed..." + unicode(theSubject,errors='ignore') + "." + theTime;
