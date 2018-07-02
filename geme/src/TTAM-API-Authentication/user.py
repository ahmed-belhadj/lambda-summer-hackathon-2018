#!/usr/bin/env python

import json
import requests
import sys

# Grab the access token from the command line.
access_token = sys.argv[1]

# We download the list of profiles from this URL
# (endpoint), passing the access token through
# the HTTP headers.
url = 'https://api.23andme.com/1/user/'
authorization = 'Bearer {0}'.format(access_token)
headers = {'Authorization': authorization}

# Now we download and print the list of profiles,
# which arrives in JSON format.
data = requests.get(url, headers=headers).json()
for profile in data['profiles']:
  if profile['genotyped']:
    print profile['id']