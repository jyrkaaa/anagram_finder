# anagram_finder
Aws hosted php backend and react next.js frontend
By connecting with the frontend to port 8000, the apis are reacable.
Cors error from backend can be resolved by connecting from port 3000.
Wordbase importing is right now based on the assumption that the url will contain a .txt file.
Anagram search is searched with word parameter: "http://13.51.160.33:8000/api/v1/anagram?word="
Importing can be done two ways, by url or batches of words:
With endpoint "http://13.51.160.33:8000/api/v1/wordsJson" where the payload is an json of
{ "words": ["word1", "word2" ... ] }, you can seperate on frontend.
With endpoint "http://13.51.160.33:8000/api/v1/words" you can isert json of { "url": "your_url.com/data.txt" }
Frontend search start from 3 letters.
Backend : "http://13.51.160.33:8000"

