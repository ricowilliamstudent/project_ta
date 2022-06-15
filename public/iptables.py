import paramiko
import sys

client = paramiko.SSHClient()
# add to known hosts
client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
try:
    client.connect(hostname="10.30.11.103", username="root", password="duniaku1234")
except:
    print("[!] Cannot connect to the SSH Server")
    exit()
print("jalan")
ssh_stdin, ssh_stdout, ssh_stderr = client.exec_command('iptables -I INPUT -s '+sys.argv[1]+' -j '+sys.argv[2])

