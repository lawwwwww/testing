import mysql.connector

mydb=mysql.connector.connect(host="localhost",user="root",passwd="",database="trienekendb")
mycursor=mydb.cursor(buffered=True)


mycursor.execute("INSERT INTO admintable(username,password)VALUES('lala','12345')")   #FAKE DATA

mycursor.execute("INSERT INTO rorotable(rorogroup,size,serialNo,productID,qrcode,in_house,with_customer,lost,longitude,latitude,status,day_held)VALUES('container','small','blublu','PRO123','QR123','Yes','No','No','','','Repair',3)")        #FAKE DATA

mycursor.execute("INSERT INTO drivertable(driverID,username)VALUES('ABC1','Nuing Lait')")  #FAKE DATA
mycursor.execute("INSERT INTO drivertable(driverID,username)VALUES('ABC2','Helmi Ogek')")
mycursor.execute("INSERT INTO drivertable(driverID,username)VALUES('ABC3','Aziezul B Ahmat')")
mycursor.execute("INSERT INTO drivertable(driverID,username)VALUES('ABC4','Lakostine ak Akar')")
mycursor.execute("INSERT INTO drivertable(driverID,username)VALUES('ABC5','Abd Rahman')")
mycursor.execute("INSERT INTO drivertable(driverID,username)VALUES('ABC6','Donny Christy')")
mycursor.execute("INSERT INTO drivertable(driverID,username)VALUES('ABC7','Chong Min Foh')")
mycursor.execute("INSERT INTO drivertable(driverID,username)VALUES('ABC8','Mickcroyson Danver')")
mycursor.execute("INSERT INTO drivertable(driverID,username)VALUES('ABC9','Lukas Manja')")
mycursor.execute("INSERT INTO drivertable(driverID,username)VALUES('ABC10','Jackly Riga')")
mycursor.execute("INSERT INTO drivertable(driverID,username)VALUES('ABC11','Mohd Faizul')")
mycursor.execute("INSERT INTO drivertable(driverID,username)VALUES('ABC12','Hector ak Dio')")
mycursor.execute("INSERT INTO drivertable(driverID,username)VALUES('ABC13','Mi-au')")


mydb.commit()


mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QAA1333B','No')")     #FAKE DATA
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QAA7172M','No')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QAA7515D','No')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QAV 4118','No')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QCD3381','No')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QCK3381','No')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QM6394E','No')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QM6395E','No')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QM6397E','No')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QPB3381','No')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('Spare Truck2','No')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('SU3381E','No')")
mycursor.execute("INSERT INTO trucktable(truckID,status)VALUES('QAA9612B','No')")

mydb.commit()
