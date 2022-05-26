import platform
import psutil
import cpuinfo

print("CPU :",psutil.cpu_percent(1),"% | Memory :",psutil.virtual_memory()[2],"% | Disk :",psutil.disk_usage('/').percent,"%")



