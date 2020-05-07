#open cmd
#pip install tabula-py
#pip install tabulate
#pip install mysql-connector-python

import sys
import tabula as tb
import tabulate
import pandas as pd
import mysql.connector
import csv

mydb=mysql.connector.connect(host="localhost",user="root",passwd="",database="trienekendb")
mycursor=mydb.cursor(buffered=True)


path="pdf/"+sys.argv[1]
df=tb.read_pdf(path,pages="all",multiple_tables=True,pandas_options={'header':None})

#for x in df:
#	x+=' ,'
#	print(x)

cust=[]
loc=[]
area=[]
csize=[]
ctype=[]
salesOrder=[]
date=[]
month=[]
year=[]
truck=[]
driver=[]

for i in range(1,len(df),2):
    for j in range(len(df[i].columns)-1):
        for k in range(1,len(df[i][j])):
            if(isinstance(df[i][j][k],str)):    #remove float item(nan)
                if(j==0):
                    if('\r' in df[i][j][k]):
                        aaaa=df[i][j][k].replace('\r',' ')
                        cust.append(aaaa)
                    else:
                        cust.append(df[i][j][k])
                    date.append(df[i-1][0][0][4:6])      #day
                    month.append(df[i-1][0][0][7:9])     #month
                    year.append(df[i-1][0][0][10:14])    #year
                    truck.append(df[i-1][0][2][5:])      #truck
                    driver.append(df[i-1][4][0])         #driver
                elif(j==1):
                    if('\r' in df[i][j][k]):
                        aaaaa=df[i][j][k].replace('\r',' ')
                        loc.append(aaaaa)
                    else:
                        loc.append(df[i][j][k])
                elif(j==2):
                    area.append(df[i][j][k])
                elif(j==3):
                    csize.append(df[i][j][k])
                elif(j==7):
                    ctype.append(df[i][j][k])
                elif(j==9):
                    salesOrder.append(df[i][j][k])
                    
                    
   

fdate=[]
for mmm in range(len(year)):
    fdate.append(year[mmm]+'-'+month[mmm]+'-'+date[mmm])	#STORE DATE IN YYYY-MM-DD FORMAT

did=[]                   #GET DRIVER ID FROM DATABASE
for qw in range(len(driver)):
    mycursor.execute("SELECT driverid FROM drivertable where username=%s",(driver[qw],))
    myresult=mycursor.fetchone()
    for jjj in myresult:
        did.append(jjj)

for qw in range(len(cust)):      #INSERT ALL THE EXTRACTED DATA INTO DATABASE
	mycursor.execute("INSERT INTO triptable(cust_name,areaID,container_retrieve,container_placed,collection_type,ship_date,driverID,truckID,adminID,salesOrderNo,address,container_size) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s) ",[cust[qw],area[qw],'blublu','blublu',ctype[qw],fdate[qw],did[qw],truck[qw],'1',salesOrder[qw],loc[qw],csize[qw]])
	
	mycursor.execute("INSERT INTO uploadedtable(cust_name,areaID,container_retrieve,container_placed,collection_type,ship_date,driverID,truckID,adminID,salesOrderNo,address,container_size) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s) ",[cust[qw],area[qw],'blublu','blublu',ctype[qw],fdate[qw],did[qw],truck[qw],'1',salesOrder[qw],loc[qw],csize[qw]])
	    
mydb.commit()		