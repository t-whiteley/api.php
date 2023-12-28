import json
import requests


url = "http://localhost:3000/products/"
# url = "http://localhost:3000/products/3"
data = {'name': "new_name"}


### METHOD
# response = requests.post(url, json=data)
response = requests.get(url)
# response = requests.patch(url, json=data)
# response = requests.delete(url)


### OUTPUT
print("CODE: " + str(response.status_code))
print("HEADERS: " + str(response.headers))
# print("TEXT: " + str(response.text))
print("TEXT: ")
jo = json.loads(str(response.text))
j = json.dumps(jo, indent=2)
print(j)