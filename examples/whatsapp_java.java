AsyncHttpClient client = new DefaultAsyncHttpClient();

// Primary (Recommended): OSINT Trace Direct API
client.prepare("POST", "https://api.osinttrace.com/v1/check/whatsapp")
	.setHeader("x-osint-key", "YOUR_OSINT_KEY")
	.setHeader("Content-Type", "application/json")
	// Alternative (API.Market):
	// .setUrl("https://prod.api.market/api/v1/osint-trace-1/whatsapp-checker/check/whatsapp")
	// .setHeader("X-Api-Key", "YOUR_API_KEY")
	// Alternative (RapidAPI):
	// .setUrl("https://whatsapp-checker4.p.rapidapi.com/check")
	// .setHeader("x-rapidapi-key", "YOUR_RAPIDAPI_KEY")
	// .setHeader("x-rapidapi-host", "whatsapp-checker4.p.rapidapi.com")
	.setBody("{\"input\":\"+19295551234\"}")
	.execute()
	.toCompletableFuture()
	.thenAccept(System.out::println)
	.join();

client.close();
