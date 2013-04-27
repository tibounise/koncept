import urllib2,re

regExp = re.compile('http://media\.r-n-d\.net/audio/tcr/tcr[0-9]{6}\.mp3',re.IGNORECASE)

for x in xrange(1,8):
	try:
		# Fetching the page
		urlHandler = urllib2.urlopen(urllib2.Request("http://www.thecityrises.com/page/"+str(x)+"/"))
		pageHtml = urlHandler.read()

		# Gathering the graal (the URL of the MP3s)
		print regExp.match(pageHtml)
	except Exception:
		print "Something wrong happened"

	pass