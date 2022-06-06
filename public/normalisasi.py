import json
data = {}
with open('fast.log') as f:
    lines = f.readlines()
if(len(lines)>101):
    lines = lines[-100:]
for line in lines:
    date = line.split(" ")[0].split(".")[0]
    type = line.split("[**]")[1]
    ip = line.split("[**]")[2].split("}")[-1].split("->")[0].split(":")[0]
    data[ip+"-"+type] = [date,type,ip]
with open('data.json', 'w') as f:
    json.dump(data, f, indent=2)
