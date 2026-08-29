# WhatsApp Phone Number & Business Intelligence API

[![OSINT Trace - Direct API (Recommended)](https://img.shields.io/badge/OSINT%20Trace-Direct%20API%20(Recommended)-00DF9A?style=for-the-badge&logo=shield)](https://osinttrace.com) [![API.Market](https://img.shields.io/badge/API.Market-8B5CF6?style=for-the-badge)](https://api.market/store/osint-trace-1/whatsapp-checker) [![RapidAPI](https://img.shields.io/badge/RapidAPI-black?style=for-the-badge&logo=rapidapi)](https://rapidapi.com/osint-org-osint-org-default/api/whatsapp-checker)

An enterprise-grade OSINT API to verify WhatsApp phone number registration and extract rich commercial intelligence (Personal vs. Business classification, official verified checkmarks, company names, product catalog links, HD profile pictures, and direct chat links) by international E.164 phone numbers.

## Table of Contents
- [Features](#features)
- [Getting Started](#getting-started)
  - [1. Get API Key](#1-get-api-key)
  - [2. Base URL & Authentication](#2-base-url--authentication)
- [API Endpoints](#api-endpoints)
  - [Single Phone Number Check](#single-phone-number-check)
  - [Code Examples](#code-examples)
- [Response Format](#response-format)
- [HTTP Status Codes](#http-status-codes)
- [Requirements](#requirements)
- [Pricing](#pricing)
- [Support](#support)
- [Legal Compliance](#legal-compliance)

---

## Features

✅ **Instant Registration Check**: Real-time verification of WhatsApp presence on any phone number.  
✅ **Commercial Tier Classification**: Distinguishes between Standard Consumer and WhatsApp Business accounts.  
✅ **Verification Badges**: Detects official Green Checkmark verification status for corporate entities.  
✅ **Product Catalog Link Extraction**: Automatically extracts links to active WhatsApp Business product storefronts (`catalog_url`).  
✅ **Rich Profile Data**: Returns high-resolution avatar photos, business titles, and direct chat URLs (`profile_url`).  
✅ **High Performance**: Asynchronous architecture with high-speed proxy cycling and anti-bot bypass.  
✅ **Developer-Friendly**: Available via direct REST API on [OSINT Trace](https://osinttrace.com) (Recommended) and major developer marketplaces.

---

## Getting Started

### 1. Get API Key

- **OSINT Trace Direct (Recommended)**: Create an account on [OSINT Trace](https://osinttrace.com) and generate your API Key from the [Workspace Dashboard](https://app.osinttrace.com).
- **API.Market**: Subscribe via [API.Market WhatsApp Checker](https://api.market/store/osint-trace-1/whatsapp-checker).
- **RapidAPI**: Subscribe via [RapidAPI WhatsApp Checker](https://rapidapi.com/osint-org-osint-org-default/api/whatsapp-checker).

### 2. Base URL & Authentication

Authentication headers and endpoints vary by provider:

| Provider | Base URL | Auth Header | Endpoint |
|:---|:---|:---|:---|
| **OSINT Trace (Direct - Recommended)** | `https://api.osinttrace.com/v1` | `x-osint-key: YOUR_OSINT_KEY` | `POST /check/whatsapp` |
| **API.Market** | `https://prod.api.market/api/v1/osint-trace-1/whatsapp-checker` | `X-Api-Key: YOUR_API_KEY` | `POST /check/whatsapp` |
| **RapidAPI** | `https://whatsapp-checker.p.rapidapi.com` | `X-RapidAPI-Key: YOUR_API_KEY`<br>`X-RapidAPI-Host: whatsapp-checker.p.rapidapi.com` | `POST /check` |

---

## API Endpoints

### Single Phone Number Check

**Endpoint (OSINT Trace Direct - Recommended):**
> `POST https://api.osinttrace.com/v1/check/whatsapp`

**Request Body:**
```json
{
  "input": "+19295551234"
}
```

### Code Examples

<details open>
<summary><b>OSINT Trace Direct API (cURL) — Recommended</b></summary>

```bash
curl --request POST \
     --url https://api.osinttrace.com/v1/check/whatsapp \
     --header 'x-osint-key: YOUR_OSINT_KEY' \
     --header 'Content-Type: application/json' \
     --data '{"input": "+19295551234"}'
```
</details>

<details>
<summary><b>API.Market (cURL)</b></summary>

```bash
curl --request POST \
     --url https://prod.api.market/api/v1/osint-trace-1/whatsapp-checker/check/whatsapp \
     --header 'X-Api-Key: YOUR_API_KEY' \
     --header 'Content-Type: application/json' \
     --data '{"input": "+19295551234"}'
```
</details>

<details>
<summary><b>RapidAPI (cURL)</b></summary>

```bash
curl --request POST \
     --url https://whatsapp-checker.p.rapidapi.com/check \
     --header 'X-RapidAPI-Host: whatsapp-checker.p.rapidapi.com' \
     --header 'X-RapidAPI-Key: YOUR_API_KEY' \
     --header 'Content-Type: application/json' \
     --data '{"input": "+19295551234"}'
```
</details>

> Additional code snippets for Python, Node.js, Go, PHP, C#, Java, and Shell are available in the [`examples/`](./examples) directory.

---

## Response Format

### Business Account Found (With Full Metadata)
```json
{
  "live": true,
  "note": null,
  "metadata": {
    "is_business": true,
    "is_verified": true,
    "account_type": "Business",
    "name": "Acme Global Solutions",
    "avatar_url": "https://pps.whatsapp.net/v/t61.24694-24/example_avatar.jpg",
    "catalog_url": "https://wa.me/c/19295551234",
    "profile_url": "https://wa.me/19295551234"
  }
}
```

### Personal Account Found
```json
{
  "live": true,
  "note": null,
  "metadata": {
    "is_business": false,
    "is_verified": false,
    "account_type": "Personal",
    "name": null,
    "avatar_url": "https://pps.whatsapp.net/v/t61.24694-24/personal_avatar.jpg",
    "catalog_url": null,
    "profile_url": "https://wa.me/19295551234"
  }
}
```

### Account Not Found
```json
{
  "live": false,
  "note": null,
  "metadata": null
}
```

---

## HTTP Status Codes

| Status Code | Description | Rationale |
|:---|:---|:---|
| **`200 OK`** | Success | Query processed and presence/metadata returned. |
| **`400 Bad Request`** | Validation Error | Malformed request body or non-E.164 phone format. |
| **`401 Unauthorized`** | Authentication Required | Missing, invalid, or expired API key header. |
| **`403 Forbidden`** | Quota / Subscription Error | Quota balance exhausted or subscription inactive. |
| **`408 Request Timeout`** | Timeout | Upstream verification exceeded maximum execution window. |
| **`429 Too Many Requests`** | Rate Limit Exceeded | Exceeded 1 request/second limit. |

---

## Requirements

- **Supported format**: International standard E.164 phone numbers with leading plus sign (e.g., `+19295551234`, `+447911123456`, `+33612345678`).
- **Unacceptable formats**: Usernames and email addresses (WhatsApp identity verification is telephone-bound).
- **Rate Limit**: 1 request per second per active API key.

---

## Pricing

- **Direct Plans (Recommended)**: Flexible subscription tiers and bulk volume pricing available on [OSINT Trace Pricing](https://osinttrace.com/pricing).
- **Marketplace Plans**: Subscriptions also available through [API.Market](https://api.market/store/osint-trace-1/whatsapp-checker) and [RapidAPI](https://rapidapi.com/osint-org-osint-org-default/api/whatsapp-checker/pricing).
- **Free Tier**: Free tier available for evaluation and testing.

---

## Support

For technical inquiries, enterprise SLA plans, or integration assistance:  
📧 Email: [support@osinttrace.com](mailto:support@osinttrace.com)  
🌐 Website: [osinttrace.com](https://osinttrace.com)

---

## Legal Compliance

This API is designed for legitimate cybersecurity investigation, fraud prevention, business verification, and communication hygiene. Users must:
- Comply with applicable local and international data protection regulations (e.g., GDPR, CCPA).
- Adhere to WhatsApp and Meta's Terms of Service and acceptable use policies.
- Ensure lawful basis for investigative data processing.

*This service is independently operated by OSINT Trace and is not affiliated with or endorsed by WhatsApp LLC or Meta Platforms, Inc.*
