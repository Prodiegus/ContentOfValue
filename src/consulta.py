import mysql.connector

cnx = mysql.connector.connect(
        user="ovni", 
        password="ContentOfValue#2022", 
        host="contentofvalue.mysql.database.azure.com", 
        port=3306, 
        database="cov", 
        ssl_ca="certificacion para data base\DigiCertGlobalRootCA.crt.pem", 
        ssl_disabled=False
)

mycursor = cnx.cursor()

sql = "SELECT * FROM cliente"

mycursor.execute(sql)

myresult = mycursor.fetchall()

for row in myresult:
  print(row)
