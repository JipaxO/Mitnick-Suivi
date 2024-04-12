import os
import re
import selenium
import collections
import bs4
import requests
import numpy as np
import pandas as pd
import json
import lxml.html
import time
import random
import logging

from bs4 import BeautifulSoup
from selenium import webdriver
from random import randint
from time import gmtime, strftime
from tabulate import tabulate
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as ec
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.common.by import By

url = "https://www.leboncoin.fr/tablettes_liseuses/2639173877.htm"

driver = webdriver.Firefox()
driver.implicitly_wait(30)
driver.get(url)

python_button = driver.find_elements_by_xpath('//div[@data-reactid="269"]')[0]
python_button.click()

# And then we use Beautiful soup
soup = BeautifulSoup(driver.page_source)

driver.close()

for elem in soup.find_all("a", attrs={"data-qa-id": "adview_number_phone_contact"}):
    print(elem.text)
