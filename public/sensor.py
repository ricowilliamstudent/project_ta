import os, platform, psutil, cpuinfo

# Koneksi ke database
import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="website_ips"
)

mycursor = mydb.cursor()

sql = "INSERT INTO sensor (cpu, memory, disk) VALUES (%s, %s, %s)"
val = (psutil.cpu_percent(1), psutil.virtual_memory()[2], psutil.disk_usage('/').percent)
mycursor.execute(sql, val)

mydb.commit()

# End Koneksi ke database

print(psutil.cpu_percent(1),",",psutil.virtual_memory()[2],",",psutil.disk_usage('/').percent)
