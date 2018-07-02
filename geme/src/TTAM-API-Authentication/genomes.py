#!/usr/bin/env python

import json
import requests
import sys

# Grab the access token and profile id from the command line.
access_token = sys.argv[1]
profile_id = sys.argv[2]

# We download the entire genome for the profile from this URL
# (endpoint), passing the access token through the HTTP headers.
url = 'https://api.23andme.com/1/genomes/{0}/'.format(profile_id)
authorization = 'Bearer {0}'.format(access_token)
headers = {'Authorization': authorization}

# Now we download and print the full genome, which arrives in
# JSON format.
data = requests.get(url, headers=headers).json()
print data['genome']