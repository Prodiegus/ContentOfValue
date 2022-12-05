import mysql.connector

def mostrarClientes():
        mycursor = cnx.cursor()

        sql = "SELECT * FROM cliente"

        mycursor.execute(sql)

        myresult = mycursor.fetchall()

        for row in myresult:
                print(row)


def mostrarRecibir():
        mycursor = cnx.cursor()

        sql = "SELECT * FROM recibir"

        mycursor.execute(sql)

        myresult = mycursor.fetchall()

        for row in myresult:
                print(row)

def agregarEmail():
        mycursor = cnx.cursor()
        asunto = input("Asunto: ")
        text = input("Cuerpo: ")
        sql = "INSERT INTO email(asunto,text) VALUES(%s, %s);"

        val = (asunto, text)

        mycursor.execute(sql, val)

        cnx.commit()

def mostrarEmail():
        mycursor = cnx.cursor()

        sql = "SELECT * FROM email"

        mycursor.execute(sql)

        myresult = mycursor.fetchall()

        for row in myresult:
                print(row)

def enviarMail():
        mycursor = cnx.cursor()

        id = input("ID: ")

        sql = "SELECT * FROM email WHERE id="+id+";"

        mycursor.execute(sql)

        mail = mycursor.fetchall()

        sql = "SELECT mail FROM cliente WHERE recibir=1;"

        mycursor.execute(sql)

        myresult = mycursor.fetchall()

        for row in myresult:
                sql = "INSERT INTO recibir(id, mail) VALUES(%s, %s);"

                val = (mail[0][0], row[0])

                mycursor.execute(sql, val)

                cnx.commit()
                print(mail[0][0], row[0])
                
def mostrarMenu():
        print("\n\nMenu de administracion\n\n")
        print("1- Mostrar Clientes")
        print("2- Mostrar correos enviados")
        print("3- Mostrar Mails guardados")
        print("4- Agregar Mail")
        print("5- Enviar Mail")
        print("99 Mostrar Menu")
        print("0- Salir")

cnx = mysql.connector.connect(
        user="ovni", 
        password="ContentOfValue#2022", 
        host="contentofvalue.mysql.database.azure.com", 
        port=3306, 
        database="cov", 
        ssl_ca="certificacion para data base\DigiCertGlobalRootCA.crt.pem", 
        ssl_disabled=False
)

mostrarMenu()

op = int(input("Seleccion: "))

while(op!=0):
        if(op==1):
                mostrarClientes()
        elif(op==2):
                mostrarRecibir()
        elif(op==3):
                mostrarEmail()
        elif(op==4):
                agregarEmail()
        elif(op==5):
                enviarMail()
        elif(op==99):
                mostrarMenu()
        op = int(input("Seleccion: "))