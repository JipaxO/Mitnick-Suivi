import re

# 1. Create a regex that finds integers without size limit.
s = "sssgdds8sfsfs"
pattern = r'\d'

print(re.findall(pattern, s))

# 2. Create a regex that finds negative integers without size limit.
s = r'sssgdds-8sfsfs'
pattern = r'-\d'

print(re.findall(pattern, s))

# 3. Create a regex that finds (positive or negative) integers without size limit.
s = r'sssgdds-8s8fsfs'
pattern = r'-?\d'

print(re.findall(pattern, s))

# 4. Capture all the numbers of the following sentence :
text = "21 scouts and 3 tanks fought against 4,003 protestors, so the manager was not 100.00% happy."
pattern = r'\d+(?:,\d+)*(?:\.\d+)?'

print(re.findall(pattern, text))

# 5. Find all words that end with 'ly'.
text = "He had prudently disguised himself but was quickly captured by the police."
pattern = r'\b\w+ly\b'

print(re.findall(pattern, text))

# 6. License plate number
plate = input("Enter your license plate number: ")
pattern = r'^[A-Z]{2}-\d{3}-[A-Z]{2}$'
if re.match(pattern, plate):
    print("good")
else:
    print("Not good")

# 7 . Address IPV4
