import mysql.connector

mydb=mysql.connector.connect(host="localhost",user="root",passwd="",database="trienekendb")
mycursor=mydb.cursor(buffered=True)


mycursor.execute("INSERT INTO admintable(username,password)VALUES('lala','12345')")   #FAKE DATA

mycursor.execute("INSERT INTO rorotable(serialNo)VALUES('blublu')")        #FAKE DATA

mycursor.execute("INSERT INTO drivertable(username,password)VALUES('Nuing Lait','12345')")  #FAKE DATA
mycursor.execute("INSERT INTO drivertable(username,password)VALUES('Helmi Ogek','12345')")
mycursor.execute("INSERT INTO drivertable(username,password)VALUES('Aziezul B Ahmat','12345')")
mycursor.execute("INSERT INTO drivertable(username,password)VALUES('Lakostine ak Akar','12345')")
mycursor.execute("INSERT INTO drivertable(username,password)VALUES('Abd Rahman','12345')")
mycursor.execute("INSERT INTO drivertable(username,password)VALUES('Donny Christy','12345')")
mycursor.execute("INSERT INTO drivertable(username,password)VALUES('Chong Min Foh','12345')")
mycursor.execute("INSERT INTO drivertable(username,password)VALUES('Mickcroyson Danver','12345')")
mycursor.execute("INSERT INTO drivertable(username,password)VALUES('Lukas Manja','12345')")
mycursor.execute("INSERT INTO drivertable(username,password)VALUES('Jackly Riga','12345')")
mycursor.execute("INSERT INTO drivertable(username,password)VALUES('Mohd Faizul','12345')")
mycursor.execute("INSERT INTO drivertable(username,password)VALUES('Hector ak Dio','12345')")
mycursor.execute("INSERT INTO drivertable(username,password)VALUES('Mi-au','12345')")


mydb.commit()


mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QAA1333B','no')")     #FAKE DATA
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QAA7172M','no')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QAA7515D','no')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QAV 4118','no')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QCD3381','no')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QCK3381','no')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QM6394E','no')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QM6395E','no')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QM6397E','no')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QPB3381','no')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('Spare Truck2','no')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('SU3381E','no')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QAA9612B','no')")

mydb.commit()
