import os, psutil, cpuinfo, platform

# Koneksi ke database
import mysql.connector
from sqlalchemy import false, true

mydb = mysql.connector.connect(
  host="localhost",
  user="user",
  password="password",
  database="websiteips"
)

mycursor = mydb.cursor()

sql = "INSERT INTO sensor (cpu, memory, disk) VALUES (%s, %s, %s)"
val = (psutil.cpu_percent(1), psutil.virtual_memory()[2], psutil.disk_usage('/').percent)
mycursor.execute(sql, val)

mydb.commit()

# End Koneksi ke database
cpu = psutil.cpu_percent(1)
memory = psutil.virtual_memory()[2]
disk = psutil.disk_usage('/').percent

brandcpu = platform.processor()

memoryy = psutil.virtual_memory()
memorytersedia = round(memoryy.available/1024.0/1024.0/1024.0,1)

diskk = psutil.disk_usage('/')
disktersedia = round(diskk.free/1024.0/1024.0/1024.0,1)

jumlahcore = psutil.cpu_count(logical=False)

used = psutil.virtual_memory()
memoryused = round(used.used/1024.0/1024.0/1024.0,1)

used = psutil.disk_usage('/')
diskused = round(used.used/1024.0/1024.0/1024.0,1)

totalcore = psutil.cpu_count(logical=True)

totalmem = psutil.virtual_memory()
totalmemory = round(totalmem.total/1024.0/1024.0/1024.0,1)

totaldis = psutil.disk_usage('/')
totaldisk = round(totaldis.total/1024.0/1024.0/1024.0,1)

print(cpu,",",memory,",",disk,",",brandcpu,",",memorytersedia,",",disktersedia,",",jumlahcore,",",memoryused,",",diskused,",",totalcore,",",totalmemory,",",totaldisk)


