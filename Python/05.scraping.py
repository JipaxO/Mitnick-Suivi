from bs4 import BeautifulSoup
import requests

url = "http://www.allocine.fr/"
r = requests.get(url)
print(url, r.status_code)
soup = BeautifulSoup(r.content, "lxml")

# for p in soup.find_all("a"):
#     print(p.text)

links = []
for elem in soup.find_all("a", attrs={"class": "meta-title meta-title-link"}):
    links.append(elem.get("href"))

movie_links = ["http://www.allocine.fr" + elem for elem in links if "film" in elem]

url = movie_links[0]
r = requests.get(url)
print(url, r.status_code)
soup = BeautifulSoup(r.content, "lxml")

for elem in soup.find_all("div", attrs={"class": "titlebar-title titlebar-title-xl"}):
    # Just like that
    print(elem.text)

for elem in soup.find_all("div", attrs={"class": "content-txt"}):
    # Just like that
    print(elem.text)