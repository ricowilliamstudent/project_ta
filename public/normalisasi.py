from audioop import reverse
import json
data = {}
# Get data from server
with open('/var/log/suricata/fast.log') as f:
    lines = f.readlines()
if(len(lines)>101):
    lines = lines[-100:]

if(len(lines)>1):
    for line in lines:
        date = line.split(" ")[0].split(".")[0].split('-')

        date1 = date[0].split("/")

        tmp=[]

        tmp.append(date1[1])
        tmp.append(date1[0])
        tmp.append(date1[2])
        date1 = "-".join(tmp)

        w =[]
        w.append(date1)
        w.append(date[1])

        date = ' '.join(w)

        type = line.split("[**]")[1].split(" ")[2]
        # Get IP
        ip = line.split("[**]")[2].split("}")[-1].split("->")[0].split(":")[0]
        print(line)
        data[ip+"-"+type] = [date,type,ip]
else:
# Turn data into data.json
    data = []
with open('data.json', 'w') as f:

    json.dump(data, f, indent=2)

