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

response="<?xml version='1.0' encoding='utf-8'?><methodResponse><params><param><value><struct><member><name>accountValue1</name><value><string>3</string></value></member><member><name>creditClearanceDate</name><value><dateTime.iso8601>20211019T12:00:00+0000</dateTime.iso8601></value></member><member><name>currency1</name><value><string>KES</string></value></member><member><name>dedicatedAccountInformation</name><value><array><data><value><struct><member><name>dedicatedAccountID</name><value><i4>1</i4></value></member><member><name>dedicatedAccountValue1</name><value><string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value></member></struct></value><value><struct><member><name>dedicatedAccountID</name><value><i4>2</i4></value></member><member><name>dedicatedAccountValue1</name><value><string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value></member></struct></value><value><struct><member><name>dedicatedAccountID</name><value><i4>4</i4></value></member><member><name>dedicatedAccountValue1</name><value><string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value></member></struct></value><value><struct><member><name>dedicatedAccountID</name><value><i4>5</i4></value></member><member><name>dedicatedAccountValue1</name><value><string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value></member></struct></value><value><struct><member><name>dedicatedAccountID</name><value><i4>6</i4></value></member><member><name>dedicatedAccountValue1</name><value><string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value></member></struct></value><value><struct><member><name>dedicatedAccountID</name><value><i4>7</i4></value></member><member><name>dedicatedAccountValue1</name><value><string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value></member></struct></value><value><struct><member><name>dedicatedAccountID</name><value><i4>9</i4></value></member><member><name>dedicatedAccountValue1</name><value><string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value></member></struct></value><value><struct><member><name>dedicatedAccountID</name><value><i4>10</i4></value></member><member><name>dedicatedAccountValue1</name><value><string>1000</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>20180328T12:00:00+0000</dateTime.iso8601></value></member></struct></value><value><struct><member><name>dedicatedAccountID</name><value><i4>100</i4></value></member><member><name>dedicatedAccountValue1</name><value><string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value></member></struct></value><value><struct><member><name>dedicatedAccountID</name><value><i4>229</i4></value></member><member><name>dedicatedAccountValue1</name><value><string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>20190926T12:00:00+0000</dateTime.iso8601></value></member></struct></value><value><struct><member><name>dedicatedAccountID</name><value><i4>230</i4></value></member><member><name>dedicatedAccountValue1</name><value><string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>20190529T12:00:00+0000</dateTime.iso8601></value></member></struct></value><value><struct><member><name>dedicatedAccountID</name><value><i4>231</i4></value></member><member><name>dedicatedAccountValue1</name><value><string>0</string></value></member><member><name>expiryDate</name><value><dateTime.iso8601>20190528T12:00:00+0000</dateTime.iso8601></value></member></struct></value></data></array></value></member><member><name>languageIDCurrent</name><value><i4>1</i4></value></member><member><name>originTransactionID</name><value><string>2704750469498169163</string></value></member><member><name>responseCode</name><value><i4>0</i4></value></member><member><name>serviceClassCurrent</name><value><i4>2</i4></value></member><member><name>serviceFeeExpiryDate</name><value><dateTime.iso8601>20181231T12:00:00+0000</dateTime.iso8601></value></member><member><name>serviceRemovalDate</name><value><dateTime.iso8601>20211019T12:00:00+0000</dateTime.iso8601></value></member><member><name>supervisionExpiryDate</name><value><dateTime.iso8601>20181231T12:00:00+0000</dateTime.iso8601></value></member></struct></value></param></params></methodResponse>"
#print response.content

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