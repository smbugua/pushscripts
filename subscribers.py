#!/usr/bin/python
import psycopg2
import requests
import os
import xmltodict 
myConnection = psycopg2.connect( host="172.23.178.145", user="monitoring_apps", password="monitoring_apps", dbname="mdsa_test", port="7755" )
cur = myConnection.cursor()

def xmlparser(xml):
		#start to destructure the xml request and creating dicts 
	dict1 = dict(xmltodict.parse(xml)['methodResponse'])

	ma_accountname = dict1['name']
	print ma_accountname
	if ma_accountname == 'accountValue1': 
		print ma_accountname
		##Send request to LBN endpoint shared to felix 
	else: 
		dict2 = dict(xmltodict.parse(xml)['methodResponse']['member']['value']['string'])
		print dict2
		print "end"

# Use all the SQL you like
cur.execute("SELECT subscriber_fk FROM public.tbl_decisioning2 ")
subscriber_fk = cur.fetchone()[0]
print subscriber_fk
url="http://172.30.16.42:10010/Air"
#headers = {'content-type': 'application/soap+xml'}
headers = {'content-type': 'text/xml',
		'User-Agent':'MDSALS/3.1/2.0',
		'Authorization':'Basic S09QQUNSRURPOktPUEFDUkVETw==',
		'Host':'172.30.16.42:10010'}
body = "<?xml version='1.0' encoding=\'UTF-8\'?><methodCall><methodName>GetBalanceAndDate</methodName><params><param><value><struct><member><name>originNodeType</name><value><string>EXT</string></value></member><member><name>originHostName</name><value><string>mdsar</string></value></member><member><name>originTransactionID</name><value><string>2704750469498169163</string></value></member><member><name>originTimeStamp</name><value><dateTime.iso8601>20180322T12:33:17+0300</dateTime.iso8601></value></member><member><name>subscriberNumber</name><value><string>254"+str(subscriber_fk)+"</string></value></member><member><name>subscriberNumberNAI</name><value><i4>1</i4></value></member></struct></value></param></params></methodCall>"
#print body
#response = requests.post(url,data=body,headers=headers)
response="<?xml version='1.0'encoding='utf-8'?><methodResponse><params><param><value><struct><member><name>accountValue1</name><value><string>3</string></value></member><member><name>creditClearanceDate</name><value><dateTime.iso8601>20211019T12:00:00+0000</dateTime.iso8601></value></member><member><name>urrency1</name><value><string>KES</string></value></member><member><name>dedicatedAccountInformation</name><value><array><data><value><struct><member><name>dedicatedAccountID</name><value><i4>1</i4></value></member><member><name>dedicatedAccountValue1</name><value><string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value></member></struct></value><value><struct><member><name>dedicatedAccountID</name><value><i4>2</i4></value></member><member><name>dedicatedAccountValue1</name><value><string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value></member></struct></value><value><struct<member><name>dedicatedAccountID</name><value><i4>4</i4></value></member><member><name>dedicatedAccountValue1</name><value><string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value></member></struct></value><value><struct><member><name>dedicatedAccountID</name><value><i4>5</i4></value></member><member><name>dedicatedAccountValue1</name><value><string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value></member></struct></value><value><struct><member><name>dedicatedAccountID</name><value><i4>6</i4></value></member><member><name>dedicatedAccountValue1</name><value><string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value></member>/struct></value><value><struct><member><name>dedicatedAccountID</name><value><i4>7</i4></value></member><member><name>dedicatedAccountValue1</name><value><string0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value></member></truct></value><value><struct><member><name>dedicatedAccountID</name><value><i4>9</i4></value></member><member><name>dedicatedAccountValue1</name><value<string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value></member></struct></value><value><struct><member><name>dedicatedAccountID</name><value><i4>10</i4></value></member><member><name>dedicatedAccountValue1</name><value><string>1000</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>20180328T12:00:00+0000</dateTime.iso8601></value></member></struct></value><value><struct><member><name>dedicatedAccountID</name><value><i4>100</i4></value></member><member><name>dedicatedAccountValue1</name><value><string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value></member></struct></value><value><struct><member><name>dedicatedAccountID</name><value><i4>229</i4></value>/member><member><name>dedicatedAccountValue1</name><alue<string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>20190926T12:00:00+0000</dateTime.iso8601></value>member></struct></value><value><struct>ember><name>dedicatedAccountID</name><value><i4>230</i4></value></member><member><name>dedicatedAccountValue1</name><value<string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>20190529T12:00:00+0000</dateTime.iso8601></value></member></truct></value><value>struct><member><name>dedicatedAccountID</name><value><i4>231</i4></value></member><member><name>dedicatedAccountValue1</name><value<string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>20190528T12:00:00+0000</dateTime.iso8601></value></member></struct></value></data></array></value></member><member><name>languageIDCurrent</name><value><i4>1</i4></value></member><member><name>riginTransactionID/name><value><string>2704750469498169163</string></value></member><member><name>responseCode</name><value><i4>0</i4></value></member><member><name>rviceClassCurrent</name><value><i4>2</i4></value></member><member><name>serviceFeeExpiryDate</name><value><dateTime.iso8601>20181231T12:00:00+0000</DateTime.iso8601></value></member><member><name>serviceRemovalDate</name><value><dateTime.iso8601>20211019T12:00:00+0000</dateTime.iso8601></value>/member><member><name>supervisionExpiryDate</name><value><dateTime.iso8601>20181231T12:00:00+0000</dateTime.iso8601></value></member></struct></value></param></params></methodResponse>"
#print response.content
xmlparser(response)

myConnection.close()