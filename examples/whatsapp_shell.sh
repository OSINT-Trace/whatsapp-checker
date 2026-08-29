#!/usr/bin/env bash

# Primary (Recommended): OSINT Trace Direct API
curl --request POST \
  --url https://api.osinttrace.com/v1/check/whatsapp \
  --header 'x-osint-key: YOUR_OSINT_KEY' \
  --header 'Content-Type: application/json' \
  --data '{"input":"+19295551234"}'

# Alternative (API.Market):
# curl --request POST \
#   --url https://prod.api.market/api/v1/osint-trace-1/whatsapp-checker/check/whatsapp \
#   --header 'X-Api-Key: YOUR_API_KEY' \
#   --header 'Content-Type: application/json' \
#   --data '{"input":"+19295551234"}'

# Alternative (RapidAPI):
# curl --request POST \
#   --url https://whatsapp-checker.p.rapidapi.com/check \
#   --header 'x-rapidapi-host: whatsapp-checker.p.rapidapi.com' \
#   --header 'x-rapidapi-key: YOUR_RAPIDAPI_KEY' \
#   --header 'Content-Type: application/json' \
#   --data '{"input":"+19295551234"}'
