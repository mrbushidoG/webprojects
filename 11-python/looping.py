#!/usr/bin/python3

print("Content-type: text/html\n")
print("")

print("Repetition\n")

# x = 0

# while x <= 10:
#     print(f"<p>this is number {x}</p>")
#     print("",end="\n")
#     x = x + 1
    

dictList = {"Game Name":"God Of War","Genre":"Action, Hack and slash","Studio":"Santca Monica"}

for game,details in dictList.items():
    print("<p>"+game+" " +details+"</p>")