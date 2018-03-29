#!/usr/bin/python
#script to curl a remote AIR and break down response into an array then post the data recovered in to a postgres db
#welcomed mmwesh21
import psycopg2
import requests
import os
import xmltodict 
import datetime
myConnection = psycopg2.connect( host="172.23.178.145", user="monitoring_apps", password="monitoring_apps", dbname="mdsa_test", port="7755" )
cur = myConnection.cursor()
#sql queries
cur.execute("SELECT subscriber_fk FROM public.tbl_decisioning2 ")
subscriber_fk = cur.fetchone()[0]
print (subscriber_fk)
url="http://172.30.16.42:10010/Air"
#headers = {'content-type': 'application/soap+xml'}
headers = {'content-type': 'text/xml',
		'User-Agent':'MDSALS/3.1/2.0',
		'Authorization':'Basic S09QQUNSRURPOktPUEFDUkVETw==',
		'Host':'172.30.16.42:10010'}
body = "<?xml version='1.0' encoding=\'UTF-8\'?><methodCall><methodName>GetBalanceAndDate</methodName><params><param><value><struct><member><name>originNodeType</name><value><string>EXT</string></value></member><member><name>originHostName</name><value><string>mdsar</string></value></member><member><name>originTransactionID</name><value><string>2704750469498169163</string></value></member><member><name>originTimeStamp</name><value><dateTime.iso8601>20180322T12:33:17+0300</dateTime.iso8601></value></member><member><name>subscriberNumber</name><value><string>254"+str(subscriber_fk)+"</string></value></member><member><name>subscriberNumberNAI</name><value><i4>1</i4></value></member></struct></value></param></params></methodCall>"

response = requests.post(url,data=body,headers=headers)

def xmlparser(xml):
		#start to destructure the xml request and creating dicts 
	
	dict1= dict(xmltodict.parse(xml)['methodResponse']['params']['param']['value']['struct']['member'][0])
	dict2=dict1['name']
	dict3=dict1['value']['string']
	#dict4=dict3[]
	#print (dict1)
	print (dict2)
	print (dict3)
	dt=datetime.datetime.now()
	cur.execute("INSERT into tbl_xmldata(subscriberno,name,value,datestamp)values(%s,%s,%s,%s)",(subscriber_fk,str(dict2),str(dict3),dt))
	myConnection.commit()
	print("inserted")

#parse response	
xmlparser(response)

myConnection.close()