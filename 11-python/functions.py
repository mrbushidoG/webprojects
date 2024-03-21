#!/usr/bin/python3

print("Content-type: text/html\n")


print("Managing Code" + "<br>")


age = 22
name = "Abdel Magid"
ssn = "1111-11"


def log(msg):
    msg = str(msg)
    msg = msg + "<br>"
    print(msg)



log(age)
log(name)
log(ssn)