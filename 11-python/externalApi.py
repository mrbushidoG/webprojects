#!/usr/bin/python3

import requests

print("Content-type: text/html\n")

print("Getting Data From The Web..<br>")

response = requests.get('https://catfact.ninja/facts')

#print(response.text)

response = response.json()

for i in range(len(response)):
    print(response['data'][i]['fact'])
    print('<br>')

