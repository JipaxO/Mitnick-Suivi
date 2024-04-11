from lxml import etree

filename = "./data/scraping/data.xml"

tree = etree.parse(filename)

for user in tree.xpath("/users/user[job='Veterinary']/name"):
    print(user.text)