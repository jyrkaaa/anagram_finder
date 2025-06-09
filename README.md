# anagram_finder
Aws hosted php backend and react next.js frontend
By connecting with the frontend to port 8000, the apis are reacable.
Cors error from backend can be resolved by connecting from port 3000.
Wordbase importing is right now based on the assumption that the url will contain a .txt file.
Limited by memory of backend php, batching in backend and frontend.
Anagram search is searched with "http://51.20.37.171:8000/api/v1/anagram?word="
Importing is with "http://51.20.37.171:8000/api/v1/wordsJson" where the payload is an json of
{ "words": ["word1", "word2" ... ] }
Frontend search start from 3 letters.
