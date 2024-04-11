import os

# Can you put the contents of this file in the form of a list in which each element is a sentence ? (Use .split() for
# example...)
filename = "./data/handling/data.txt"
my_file = open(filename, "r")  # r for "read"

split = my_file.read().split()

# for elem in split:
#     print(elem)

my_file.close()

# Put all the .txt files from the data/ directory into a variable. Then, copy the content of all the files from this
# variable into a file in data/ that you will name final.txt.

path = os.path.join("./data/handling")
content =""
txt_file = []

for root, dirs, files in os.walk(path):
    for file in files:
        if file.endswith(".txt"):
            txt_file.append(os.path.join(root, file))

for elem in txt_file:
    content += open(elem,"r",encoding= "latin1").read()

open(os.path.join("./","handling_final.txt"),"w").write(content)