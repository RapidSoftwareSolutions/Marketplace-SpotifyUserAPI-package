# SpotifyUserAPI Package
Through the Spotify Web API your applications can retrieve and manage Spotify content.
* Domain: spotify.com
* Credentials: client_id, client_key

## How to get credentials: 
0. Go to [Spotify DEvelopers section](https://developer.spotify.com/my-applications) 
1. Login or sigh up to create new applications and manage your Spotify credentials to authenticate your requests.
2. [Create new app](https://developer.spotify.com/my-applications/#!/applications/create)
3. When you register an application on your account, two credentials are created for you - **Client ID** and **Client Secret**. You can see the credentials on the application’s details page.

## TOC: 
* [getAccessToken](#getAccessToken)
* [refreshAccessToken](#refreshAccessToken)
* [getTrackAudioFeatures](#getTrackAudioFeatures)
* [getFeaturedPlaylists](#getFeaturedPlaylists)
* [getNewReleases](#getNewReleases)
* [getCategories](#getCategories)
* [getCategory](#getCategory)
* [getCategoryPlaylists](#getCategoryPlaylists)
* [getCurrentUserProfile](#getCurrentUserProfile)
* [getFollowedArtists](#getFollowedArtists)
* [followUser](#followUser)
* [followArtist](#followArtist)
* [unfollowUser](#unfollowUser)
* [unfollowArtist](#unfollowArtist)
* [checkFollowUser](#checkFollowUser)
* [checkFollowArtist](#checkFollowArtist)
* [followPlaylist](#followPlaylist)
* [unfollowPlaylist](#unfollowPlaylist)
* [saveTrack](#saveTrack)
* [getUserSavedTracks](#getUserSavedTracks)
* [removeSavedTrack](#removeSavedTrack)
* [checkSavedTrack](#checkSavedTrack)
* [saveAlbumForUser](#saveAlbumForUser)
* [getUserSavedAlbums](#getUserSavedAlbums)
* [removeSavedAlbum](#removeSavedAlbum)
* [checkSavedAlbum](#checkSavedAlbum)
* [getUserTopArtists](#getUserTopArtists)
* [getUserTopTracks](#getUserTopTracks)
* [getRecommendations](#getRecommendations)
 
<a name="getAccessToken"/>
## SpotifyUserAPI.getAccessToken
Exchange an authorization code received when the user signs into the app for an access token used for API calls.

| Field       | Type  | Description
|-------------|-------|----------
| client_id   | String| The Client ID obtained from Spotify.
| client_key  | String| The Client Secret obtained from Spotify.
| code        | String| An authorization code that can be exchanged for an access token.
| redirect_uri| String| The value of redirect_uri here must exactly match one of the values you entered when you registered your application, including upper/lowercase, terminating slashes, etc

#### Request example
```json
{	"client_id": "...",
	"client_key": "...",
	"code": "...",
	"redirect_uri": "http://site.com/redirect_uri"
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
                        "to": "{
                            'access_token': 'NgCXRK...MzYjw',
                            'token_type': 'Bearer',
                            'scope": 'user-read-private user-read-email',
                            'expires_in': 3600,
                            'refresh_token': 'NgAagA...Um_SHo'
                         }
                 }
	}
}
```

<a name="refreshAccessToken"/>
## SpotifyUserAPI.refreshAccessToken
Access tokens are deliberately set to expire after a short time, after which new tokens may be granted by supplying the refresh token originally obtained during the authorization code exchange.

| Field        | Type  | Description
|--------------|-------|----------
| client_id    | String| The Client ID obtained from Spotify.
| client_key   | String| The Client Secret obtained from Spotify.
| refresh_token| String| The refresh token returned from the getAccessToken method.

#### Request example
```json
{	"client_id": "...",
	"client_key": "...",
	"refresh_token": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
                        "to": "{
                            "access_token': 'NgA6ZcYI...ixn8bUQ',
                            'token_type': 'Bearer',
                            'scope': 'user-read-private user-read-email',
                            'expires_in': 3600
                         }"
                 }
	}
}
```

<a name="getTrackAudioFeatures"/>
## SpotifyUserAPI.getTrackAudioFeatures
Get audio feature information for a single track identified by its unique Spotify ID.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| The Spotify ID for the track

#### Request example
```json
{	"access_token": "...",
	"id": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
                            'danceability': 0.735,
                            'energy' 0.578,
                            'key': 5,
                            'loudness': -11.84,
                            'mode': 0,
                            'speechiness': 0.0461,
                            'acousticness': 0.514,
                            'instrumentalness': 0.0902,
                            'liveness': 0.159,
                            'valence': 0.624,
                            'tempo': 98.002,
                            'type': 'audio_features',
                            'id': "06AKEBrKUckW0KREUWRnvT',
                            'uri': "'spotify:track:06AKEBrKUckW0KREUWRnvT',
                            'track_href': 'https://api.spotify.com/v1/tracks/06AKEBrKUckW0KREUWRnvT',
                            'analysis_url': 'http://echonest-analysis.s3.amazonaws.com/TR/xZIVRgimIx9_iJFqTriVhCm_4unjh7tZAglpO5D-xS4xNkvxq70uCFAtuoVYTaIeHbWoLKvCB6W-kvd9E=/3/full.json?AWSAccessKeyId=AKIAJRDFEY23UEVW42BQ&Expires=1455893394&Signature=rmceqCXLMbPrXt9RTIJwk%2BQzxoY%3D',
                            'duration_ms': 255349,
                            'time_signature': 4 
                        }"
		}
	}
}
```

<a name="getFeaturedPlaylists"/>
## SpotifyUserAPI.getFeaturedPlaylists
Get a list of Spotify featured playlists (shown, for example, on a Spotify player’s “Browse” tab).

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| locale      | String| Optional: The desired language, consisting of a lowercase ISO 639 language code and an uppercase ISO 3166-1 alpha-2 country code, joined by an underscore.
| country     | String| Optional: A country: an ISO 3166-1 alpha-2 country code. Provide this parameter if you want the list of returned items to be relevant to a particular country.
| timestamp   | String| Optional: A timestamp in ISO 8601 format: yyyy-MM-ddTHH:mm:ss. Use this parameter to specify the user's local time to get results tailored for that specific date and time in the day.

#### Request example
```json
{	"access_token": "...",
	"country": "SE"
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
                            'message' : 'Monday morning music, coming right up!',
                            'playlists' : {
                              'href' : 'https://api.spotify.com/v1/browse/featured-playlists?country=SE×tamp=2015-05-18T06:44:32&offset=0&limit=2',
                              'items' : [ {
                                'collaborative' : false,
                                'external_urls' : {
                                  'spotify' : 'http://open.spotify.com/user/spotify/playlist/6ftJBzU2LLQcaKefMi7ee7'
                                },
                                'href' : 'https://api.spotify.com/v1/users/spotify/playlists/6ftJBzU2LLQcaKefMi7ee7',
                                'id' : '6ftJBzU2LLQcaKefMi7ee7',
                                'images' : [ {
                                  'height' : 300,
                                  'url' : 'https://i.scdn.co/image/7bd33c65ebd1e45975bbcbbf513bafe272f033c7',
                                  'width' : 300
                                } ],
                                'name' : 'Monday Morning Mood',
                                'owner' : {
                                  'external_urls' : {
                                    'spotify' : 'http://open.spotify.com/user/spotify'
                                  },
                                  'href' : 'https://api.spotify.com/v1/users/spotify',
                                  'id' : 'spotify',
                                  'type' : 'user',
                                  'uri' : 'spotify:user:spotify'
                                },
                                'public' : null,
                                'snapshot_id' : 'WwGvSIVUkUvGvqjgj/bQHlRycYmJ2TkoIxYfoalWlmIZT6TvsgvGMgtQ2dGbkrAW',
                                'tracks' : {
                                  'href' : 'https://api.spotify.com/v1/users/spotify/playlists/6ftJBzU2LLQcaKefMi7ee7/tracks',
                                  'total' : 245
                                },
                                'type' : 'playlist',
                                'uri' : 'spotify:user:spotify:playlist:6ftJBzU2LLQcaKefMi7ee7'
                              }, {
                                'collaborative' : false,
                                'external_urls' : {
                                  'spotify' : 'http://open.spotify.com/user/spotify__sverige/playlist/4uOEx4OUrkoGNZoIlWMUbO'
                                },
                                'href' : 'https://api.spotify.com/v1/users/spotify__sverige/playlists/4uOEx4OUrkoGNZoIlWMUbO',
                                'id' : '4uOEx4OUrkoGNZoIlWMUbO',
                                'images' : [ {
                                  'height' : 300,
                                  'url' : 'https://i.scdn.co/image/24aa1d1b491dd529b9c03392f350740ed73438d8',
                                  'width' : 300
                                } ],
                                'name' : 'Upp och hoppa!',
                                'owner' : {
                                  'external_urls' : {
                                    'spotify' : 'http://open.spotify.com/user/spotify__sverige'
                                  },
                                  'href' : 'https://api.spotify.com/v1/users/spotify__sverige',
                                  'id' : 'spotify__sverige',
                                  'type' : 'user',
                                  'uri' : 'spotify:user:spotify__sverige'
                                },
                                'public' : null,
                                'snapshot_id' : '0j9Rcbt2KtCXEXKtKy/tnSL5r4byjDBOIVY1dn4S6GV73EEUgNuK2hU+QyDuNnXz',
                                'tracks' : {
                                  'href' : 'https://api.spotify.com/v1/users/spotify__sverige/playlists/4uOEx4OUrkoGNZoIlWMUbO/tracks',
                                  'total' : 38
                                },
                                'type' : 'playlist',
                                'uri' : 'spotify:user:spotify__sverige:playlist:4uOEx4OUrkoGNZoIlWMUbO'
                              } ],
                              'limit' : 2,
                              'next' : 'https://api.spotify.com/v1/browse/featured-playlists?country=SE×tamp=2015-05-18T06:44:32&offset=2&limit=2',
                              'offset' : 0,
                              'previous' : null,
                              'total' : 12
                            }
                          }"
		}
	}
}
```

<a name="getNewReleases"/>
## SpotifyUserAPI.getNewReleases
Get a list of new album releases featured in Spotify (shown, for example, on a Spotify player’s “Browse” tab).

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| country     | String| Optional: A country: an ISO 3166-1 alpha-2 country code. Provide this parameter if you want the list of returned items to be relevant to a particular country.

#### Request example
```json
{	"access_token": "...",
	"country": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
                            'albums' : {
                              'href' : 'https://api.spotify.com/v1/browse/new-releases?country=SE&offset=0&limit=20',
                              'items' : [ {
                                'album_type' : 'album',
                                'available_markets' : [ 'AD', 'AR', 'AT', 'AU', 'BE', 'BG', 'BO', 'BR', 'CH', 'CL', 'CO', 'CR', 'CY', 'CZ', 'DE', 'DK', 'DO', 'EC', 'EE', 'ES', 'FI', 'FR', 'GB', 'GR', 'GT', 'HK', 'HN', 'HU', 'IE', 'IS', 'IT', 'LI', 'LT', 'LU', 'LV', 'MC', 'MT', 'MX', 'MY', 'NI', 'NL', 'NO', 'NZ', 'PA', 'PE', 'PH', 'PL', 'PT', 'PY', 'RO', 'SE', 'SG', 'SI', 'SK', 'SV', 'TR', 'TW', 'UY' ],
                                'external_urls' : {
                                  'spotify' : 'https://open.spotify.com/album/5ilFUqPyUh5ro42HIqWeFf'
                                },
                                'href' : 'https://api.spotify.com/v1/albums/5ilFUqPyUh5ro42HIqWeFf',
                                'id' : '5ilFUqPyUh5ro42HIqWeFf',
                                'images' : [ {
                                  'height' : 640,
                                  'url' : 'https://i.scdn.co/image/0351f979962e3976447ac666256d0aa7fb3b6f2c',
                                  'width' : 640
                                }, {
                                  'height' : 300,
                                  'url' : 'https://i.scdn.co/image/0bf5e87809f8ab683d48754ad5a3a42ec8927e93',
                                  'width' : 300
                                }, {
                                  'height' : 64,
                                  'url' : 'https://i.scdn.co/image/0ba3e22ec2b71b337cd02430d1c9b93a82c719d9',
                                  'width' : 64
                                } ],
                                'name' : 'Spotify Sessions',
                                'type' : 'album',
                                'uri' : 'spotify:album:5ilFUqPyUh5ro42HIqWeFf'
                              }, {
                                'album_type' : 'single',
                                'available_markets' : [ 'AD', 'AR', 'AT', 'AU', 'BE', 'BG', 'BO', 'BR', 'CA', 'CH', 'CL', 'CO', 'CR', 'CY', 'CZ', 'DE', 'DK', 'DO', 'EC', 'EE', 'ES', 'FI', 'FR', 'GB', 'GR', 'GT', 'HK', 'HN', 'HU', 'IE', 'IS', 'IT', 'LI', 'LT', 'LU', 'LV', 'MC', 'MT', 'MX', 'MY', 'NI', 'NL', 'NO', 'NZ', 'PA', 'PE', 'PH', 'PL', 'PT', 'PY', 'RO', 'SE', 'SG', 'SI', 'SK', 'SV', 'TR', 'TW', 'US', 'UY' ],
                                'external_urls' : {
                                  'spotify' : 'https://open.spotify.com/album/3Yn7SafpsmEqH6ffadxhuR'
                                },
                                'href' : 'https://api.spotify.com/v1/albums/3Yn7SafpsmEqH6ffadxhuR',
                                'id' : '3Yn7SafpsmEqH6ffadxhuR',
                                'images' : [ {
                                  'height' : 640,
                                  'url' : 'https://i.scdn.co/image/454e921f5ecbb6c30b30c1314b8ff7626760792e',
                                  'width' : 640
                                }, {
                                  'height' : 300,
                                  'url' : 'https://i.scdn.co/image/81570f5eab2fa41b24d5964a0d44a71af711aa8f',
                                  'width' : 300
                                }, {
                                  'height' : 64,
                                  'url' : 'https://i.scdn.co/image/4e1b25193530126c4bc36ba472916e41990639b9',
                                  'width' : 64
                                } ],
                                'name' : 'The Carrier',
                                'type' : 'album',
                                'uri' : 'spotify:album:3Yn7SafpsmEqH6ffadxhuR'
                              }, {
                              ...
                              } ],
                              'limit' : 20,
                              'next' : 'https://api.spotify.com/v1/browse/new-releases?country=SE&offset=20&limit=20',
                              'offset' : 0,
                              'previous' : null,
                              'total' : 500
                            }
                          }"
		}
	}
}
```

<a name="getCategories"/>
## SpotifyUserAPI.getCategories
Get a list of categories used to tag items in Spotify (on, for example, the Spotify player’s “Browse” tab).

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| country     | String| Optional: A country: an ISO 3166-1 alpha-2 country code. Provide this parameter if you want the list of returned items to be relevant to a particular country.
| locale      | String| Optional: The desired language, consisting of a lowercase ISO 639 language code and an uppercase ISO 3166-1 alpha-2 country code, joined by an underscore.

#### Request example
```json
{	"access_token": "...",
	"country": "...",
	"locale": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
                            'categories' : {
                              'href' : 'https://api.spotify.com/v1/browse/categories?offset=0&limit=20',
                              'items' : [ {
                                'href' : 'https://api.spotify.com/v1/browse/categories/toplists',
                                'icons' : [ {
                                  'height' : 275,
                                  'url' : 'https://datsnxq1rwndn.cloudfront.net/media/derived/toplists_11160599e6a04ac5d6f2757f5511778f_0_0_275_275.jpg',
                                  'width' : 275
                                } ],
                                'id' : 'toplists',
                                'name' : 'Top Lists'
                              }, {
                                'href' : 'https://api.spotify.com/v1/browse/categories/mood',
                                'icons' : [ {
                                  'height' : 274,
                                  'url' : 'https://datsnxq1rwndn.cloudfront.net/media/original/mood-274x274_976986a31ac8c49794cbdc7246fd5ad7_274x274.jpg',
                                  'width' : 274
                                } ],
                                'id' : 'mood',
                                'name' : 'Mood'
                              }, {
                                'href' : 'https://api.spotify.com/v1/browse/categories/party',
                                'icons' : [ {
                                  'height' : 274,
                                  'url' : 'https://datsnxq1rwndn.cloudfront.net/media/derived/party-274x274_73d1907a7371c3bb96a288390a96ee27_0_0_274_274.jpg',
                                  'width' : 274
                                } ],
                                'id' : 'party',
                                'name' : 'Party'
                              }, {
                                'href' : 'https://api.spotify.com/v1/browse/categories/pop',
                                'icons' : [ {
                                  'height' : 274,
                                  'url' : 'https://datsnxq1rwndn.cloudfront.net/media/derived/pop-274x274_447148649685019f5e2a03a39e78ba52_0_0_274_274.jpg',
                                  'width' : 274
                                } ],
                                'id' : 'pop',
                                'name' : 'Pop'
                              }, {
                                'href' : 'https://api.spotify.com/v1/browse/categories/workout',
                                'icons' : [ {
                                  'height' : 275,
                                  'url' : 'https://datsnxq1rwndn.cloudfront.net/media/derived/workout_856581c1c545a5305e49a3cd8be804a0_0_0_275_275.jpg',
                                  'width' : 275
                                } ],
                                'id' : 'workout',
                                'name' : 'Workout'
                              }, ... ],
                              'limit' : 20,
                              'next' : 'https://api.spotify.com/v1/browse/categories?offset=20&limit=20',
                              'offset' : 0,
                              'previous' : null,
                              'total' : 31
                            }
                          }"
		}
	}
}
```

<a name="getCategory"/>
## SpotifyUserAPI.getCategory
Get a single category used to tag items in Spotify (on, for example, the Spotify player’s “Browse” tab).

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| The Spotify category ID for the category.
| country     | String| Optional: A country: an ISO 3166-1 alpha-2 country code. Provide this parameter if you want the list of returned items to be relevant to a particular country.
| locale      | String| Optional: The desired language, consisting of a lowercase ISO 639 language code and an uppercase ISO 3166-1 alpha-2 country code, joined by an underscore.

#### Request example
```json
{	"access_token": "...",
	"id": "...",
	"country": "...",
	"locale": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
                            'href' : 'https://api.spotify.com/v1/browse/categories/party',
                            'icons' : [ {
                              'height' : 274,
                              'url' : 'https://datsnxq1rwndn.cloudfront.net/media/derived/party-274x274_73d1907a7371c3bb96a288390a96ee27_0_0_274_274.jpg',
                              'width' : 274
                            } ],
                            'id' : 'party',
                            'name' : 'Party'
                          }"
		}
	}
}
```

<a name="getCategoryPlaylists"/>
## SpotifyUserAPI.getCategoryPlaylists
Get a list of Spotify playlists tagged with a particular category.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| The Spotify category ID for the category.
| country     | String| Optional: A country: an ISO 3166-1 alpha-2 country code. Provide this parameter if you want the list of returned items to be relevant to a particular country.

#### Request example
```json
{	"access_token": "...",
	"id": "...",
	"country": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
                            'playlists' : {
                              'href' : 'https://api.spotify.com/v1/browse/categories/party/playlists?country=BR&offset=0&limit=2',
                              'items' : [ {
                                'collaborative' : false,
                                'external_urls' : {
                                  'spotify' : 'http://open.spotify.com/user/spotifybrazilian/playlist/4k7EZPI3uKMz4aRRrLVfen'
                                },
                                'href' : 'https://api.spotify.com/v1/users/spotifybrazilian/playlists/4k7EZPI3uKMz4aRRrLVfen',
                                'id' : '4k7EZPI3uKMz4aRRrLVfen',
                                'images' : [ {
                                  'height' : 300,
                                  'url' : 'https://i.scdn.co/image/bf6544c213532e9650088dfef76c8521093d970e',
                                  'width' : 300
                                } ],
                                'name' : 'Noite Eletrônica',
                                'owner' : {
                                  'external_urls' : {
                                    'spotify' : 'http://open.spotify.com/user/spotifybrazilian'
                                  },
                                  'href' : 'https://api.spotify.com/v1/users/spotifybrazilian',
                                  'id' : 'spotifybrazilian',
                                  'type' : 'user',
                                  'uri' : 'spotify:user:spotifybrazilian'
                                },
                                'public' : null,
                                'snapshot_id' : 'PULvu1V2Ps8lzCxNXfNZTw4QbhBpaV0ZORc03Mw6oj6kQw9Ks2REwhL5Xcw/74wL',
                                'tracks' : {
                                  'href' : 'https://api.spotify.com/v1/users/spotifybrazilian/playlists/4k7EZPI3uKMz4aRRrLVfen/tracks',
                                  'total' : 100
                                },
                                'type' : 'playlist',
                                'uri' : 'spotify:user:spotifybrazilian:playlist:4k7EZPI3uKMz4aRRrLVfen'
                              }, {
                                'collaborative' : false,
                                'external_urls' : {
                                  'spotify' : 'http://open.spotify.com/user/spotifybrazilian/playlist/4HZh0C9y80GzHDbHZyX770'
                                },
                                'href' : 'https://api.spotify.com/v1/users/spotifybrazilian/playlists/4HZh0C9y80GzHDbHZyX770',
                                'id' : '4HZh0C9y80GzHDbHZyX770',
                                'images' : [ {
                                  'height' : 300,
                                  'url' : 'https://i.scdn.co/image/be6c333146674440123073cb32c1c8b851e69023',
                                  'width' : 300
                                } ],
                                'name' : 'Festa Indie',
                                'owner' : {
                                  'external_urls' : {
                                    'spotify' : 'http://open.spotify.com/user/spotifybrazilian'
                                  },
                                  'href' : 'https://api.spotify.com/v1/users/spotifybrazilian',
                                  'id' : 'spotifybrazilian',
                                  'type' : 'user',
                                  'uri' : 'spotify:user:spotifybrazilian'
                                },
                                'public' : null,
                                'snapshot_id' : 'V66hh9k2HnLCdzHvtoXPv+tm0jp3ODM63SZ0oISfGnlHQxwG/scupDbKgIo99Zfz',
                                'tracks' : {
                                  'href' : 'https://api.spotify.com/v1/users/spotifybrazilian/playlists/4HZh0C9y80GzHDbHZyX770/tracks',
                                  'total' : 74
                                },
                                'type' : 'playlist',
                                'uri' : 'spotify:user:spotifybrazilian:playlist:4HZh0C9y80GzHDbHZyX770'
                              } ],
                              'limit' : 2,
                              'next' : 'https://api.spotify.com/v1/browse/categories/party/playlists?country=BR&offset=2&limit=2',
                              'offset' : 0,
                              'previous' : null,
                              'total' : 86
                            }"
		}
	}
}
```

<a name="getCurrentUserProfile"/>
## SpotifyUserAPI.getCurrentUserProfile
Get detailed profile information about the current user.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method

#### Request example
```json
{	"access_token": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
                            'birthdate': '1937-06-01',
                            'country': 'SE',
                            'display_name': 'JM Wizzler',
                            'email': 'email@example.com',
                            'external_urls': {
                              'spotify': 'https://open.spotify.com/user/wizzler'
                            },
                            'followers' : {
                              'href' : null,
                              'total' : 3829
                            },
                            'href': 'https://api.spotify.com/v1/users/wizzler',
                            'id': 'wizzler',
                            'images': [
                              {
                                'height': null,
                                'url': 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-frc3/t1.0-1/1970403_10152215092574354_1798272330_n.jpg',
                                'width': null
                              }
                            ],
                            'product': 'premium',
                            'type': 'user',
                            'uri': 'spotify:user:wizzler'
                          }"
		}
	}
}
```

<a name="getFollowedArtists"/>
## SpotifyUserAPI.getFollowedArtists
Get the current user’s followed artists.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method

#### Request example
```json
{	"access_token": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
                            'artists' : {
                              'items' : [ {
                                'external_urls' : {
                                  'spotify' : 'https://open.spotify.com/artist/0I2XqVXqHScXjHhk6AYYRe'
                                },
                                'followers' : {
                                  'href' : null,
                                  'total' : 7753
                                },
                                'genres' : [ 'swedish hip hop' ],
                                'href' : 'https://api.spotify.com/v1/artists/0I2XqVXqHScXjHhk6AYYRe',
                                'id' : '0I2XqVXqHScXjHhk6AYYRe',
                                'images' : [ {
                                  'height' : 640,
                                  'url' : 'https://i.scdn.co/image/2c8c0cea05bf3d3c070b7498d8d0b957c4cdec20',
                                  'width' : 640
                                }, {
                                  'height' : 300,
                                  'url' : 'https://i.scdn.co/image/394302b42c4b894786943e028cdd46d7baaa29b7',
                                  'width' : 300
                                }, {
                                  'height' : 64,
                                  'url' : 'https://i.scdn.co/image/ca9df7225ade6e5dfc62e7076709ca3409a7cbbf',
                                  'width' : 64
                                } ],
                                'name' : 'Afasi & Filthy',
                                'popularity' : 54,
                                'type' : 'artist',
                                'uri' : 'spotify:artist:0I2XqVXqHScXjHhk6AYYRe'
                             },{
                               ...
                             }],
                            'next' : 'https://api.spotify.com/v1/users/thelinmichael/following?type=artist&after=0aV6DOiouImYTqrR5YlIqx&limit=20',
                            'total' : 183,
                              'cursors' : {
                                'after' : '0aV6DOiouImYTqrR5YlIqx'
                              },
                             'limit' : 20,
                             'href' : 'https://api.spotify.com/v1/users/thelinmichael/following?type=artist&limit=20'
                            }
                          }"
		}
	}
}
```

<a name="followUser"/>
## SpotifyUserAPI.followUser
Make current user follow another Spotify user.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| User Spotify ID.

#### Request example
```json
{	"access_token": "...",
	"id": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"[No content]"
		}
	}
}
```

<a name="followArtist"/>
## SpotifyUserAPI.followArtist
Make current user follow an artist.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| Artist Spotify ID.

#### Request example
```json
{	"access_token": "...",
	"id": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"[No content]"
		}
	}
}
```

<a name="unfollowUser"/>
## SpotifyUserAPI.unfollowUser
Remove user from current user's following list.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| User Spotify ID.

#### Request example
```json
{	"access_token": "...",
	"id": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"[No content]"
		}
	}
}
```

<a name="unfollowArtist"/>
## SpotifyUserAPI.unfollowArtist
Remove artist from current user's following list.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| Artist Spotify ID.

#### Request example
```json
{	"access_token": "...",
	"id": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"[No content]"
		}
	}
}
```

<a name="checkFollowUser"/>
## SpotifyUserAPI.checkFollowUser
Check if current user is following another user.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| User Spotify ID.

#### Request example
```json
{	"access_token": "...",
	"id": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"[true]"
		}
	}
}
```

<a name="checkFollowArtist"/>
## SpotifyUserAPI.checkFollowArtist
Check if current user is following an artist.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| Artist Spotify ID.

#### Request example
```json
{	"access_token": "...",
	"id": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"[true]"
		}
	}
}
```

<a name="followPlaylist"/>
## SpotifyUserAPI.followPlaylist
Add the current user as a follower of a playlist.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| owner_id    | String| The Spotify user ID of the person who owns the playlist.
| playlist_id | String| The Spotify ID of the playlist.
| public      | String| Optional: If true the playlist will be included in user's public playlists, if false it will remain private.

#### Request example
```json
{	"access_token": "...",
	"owner_id": "...",
	"playlist_id": "...",
	"public": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"[empty]"
		}
	}
}
```

<a name="unfollowPlaylist"/>
## SpotifyUserAPI.unfollowPlaylist
Remove the current user as a follower of a playlist.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| owner_id    | String| The Spotify user ID of the person who owns the playlist.
| playlist_id | String| The Spotify ID of the playlist.

#### Request example
```json
{	"access_token": "...",
	"owner_id": "...",
	"playlist_id": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"[empty]"
		}
	}
}
```

<a name="saveTrack"/>
## SpotifyUserAPI.saveTrack
Save one track to the current user’s “Your Music” library.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| A comma-separated list of the Spotify IDs.

#### Request example
```json
{	"access_token": "...",
	"id": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"[empty]"
		}
	}
}
```

<a name="getUserSavedTracks"/>
## SpotifyUserAPI.getUserSavedTracks
Get a list of the songs saved in the current Spotify user’s “Your Music” library.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| market      | String| Optional: An ISO 3166-1 alpha-2 country code. Provide this parameter if you want to apply Track Relinking.

#### Request example
```json
{	"access_token": "...",
	"market": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
                            'href': 'https://api.spotify.com/v1/me/tracks?offset=0&limit=20',
                            'items': [
                              {
                                'added_at': '2014-07-08T14:05:27Z',
                                'track': {
                                  'album': {
                                    'album_type': 'album',
                                    'available_markets': [
                                      'AD',
                                      'AR',
                                      'AT',
                                      ...
                                      'TR',
                                      'TW',
                                      'UY'
                                    ],
                                    'external_urls': {
                                      'spotify': 'https://open.spotify.com/album/4kbE34G5bxaxwuCqz0NEw4'
                                    },
                                    'href': 'https://api.spotify.com/v1/albums/4kbE34G5bxaxwuCqz0NEw4',
                                    'id': '4kbE34G5bxaxwuCqz0NEw4',
                                    'images': [
                                      {
                                        'height': 635,
                                        'url': 'https://i.scdn.co/image/5ac900806189613a98ce8d2a979265dabd3f7347',
                                        'width': 640
                                      },
                                      {
                                        'height': 298,
                                        'url': 'https://i.scdn.co/image/e531cef3541f3d9d7fef9dbede8f19223e2f1497',
                                        'width': 300
                                      },
                                      {
                                        'height': 64,
                                        'url': 'https://i.scdn.co/image/4be3ce9447365df0b8653f941058ab3fd7177b25',
                                        'width': 64
                                      }
                                    ],
                                    'name': 'The Best Of Me',
                                    'type': 'album',
                                    'uri': 'spotify:album:4kbE34G5bxaxwuCqz0NEw4'
                                  },
                                  'artists': [
                                    {
                                      'external_urls': {
                                        'spotify': 'https://open.spotify.com/artist/3Z02hBLubJxuFJfhacLSDc'
                                      },
                                      'href': 'https://api.spotify.com/v1/artists/3Z02hBLubJxuFJfhacLSDc',
                                      'id': '3Z02hBLubJxuFJfhacLSDc',
                                      'name': 'Bryan Adams',
                                      'type': 'artist',
                                      'uri': 'spotify:artist:3Z02hBLubJxuFJfhacLSDc'
                                    }
                                  ],
                                  'available_markets': [
                                    'AD',
                                    'AR',
                                    'AT',
                                    ...
                                    'TR',
                                    'TW',
                                    'UY'
                                  ],
                                  'disc_number': 1,
                                  'duration_ms': 265933,
                                  'explicit': false,
                                  'external_ids': {
                                    'isrc': 'USAM19774904'
                                  },
                                  'external_urls': {
                                    'spotify': 'https://open.spotify.com/track/1XjKmqLHqnzNLYqYSRBIZK'
                                  },
                                  'href': 'https://api.spotify.com/v1/tracks/1XjKmqLHqnzNLYqYSRBIZK',
                                  'id': '1XjKmqLHqnzNLYqYSRBIZK',
                                  'name': 'Back To You - MTV Unplugged Version',
                                  'popularity': 43,
                                  'preview_url': 'https://p.scdn.co/mp3-preview/abeb349e0ea95846b4e4e01b115fcdbd5e9a991a',
                                  'track_number': 11,
                                  'type': 'track',
                                  'uri': 'spotify:track:1XjKmqLHqnzNLYqYSRBIZK'
                                  ...
                                }
                              }
                            ],
                            'limit': 20,
                            'next': 'https://api.spotify.com/v1/me/tracks?offset=20&limit=20',
                            'offset': 0,
                            'previous': null,
                            'total': 53
                          }"
		}
	}
}
```

<a name="removeSavedTrack"/>
## SpotifyUserAPI.removeSavedTrack
Remove one or more tracks from the current user’s “Your Music” library.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| A comma-separated list of the Spotify IDs.

#### Request example
```json
{	"access_token": "...",
	"id": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"[empty]"
		}
	}
}
```

<a name="checkSavedTrack"/>
## SpotifyUserAPI.checkSavedTrack
Check if one track is already saved in the current Spotify user’s “Your Music” library.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| A comma-separated list of the Spotify IDs.

#### Request example
```json
{	"access_token": "...",
	"id": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"[true]"
		}
	}
}
```

<a name="saveAlbumForUser"/>
## SpotifyUserAPI.saveAlbumForUser
Save one album to the current user’s “Your Music” library.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| A comma-separated list of the Spotify IDs.

#### Request example
```json
{	"access_token": "...",
	"id": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"[empty]"
		}
	}
}
```

<a name="getUserSavedAlbums"/>
## SpotifyUserAPI.getUserSavedAlbums
Get a list of the albums saved in the current Spotify user’s “Your Music” library.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| market      | String| Optional: An ISO 3166-1 alpha-2 country code. Provide this parameter if you want to apply Track Relinking.

#### Request example
```json
{	"access_token": "...",
	"market": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
                            'href' : 'https://api.spotify.com/v1/me/albums?offset=0&limit=1',
                            'items' : [ {
                              'added_at' : '2015-11-26T19:13:31Z',
                              'album' : {
                                'album_type' : 'album',
                                'artists' : [ {
                                  'external_urls' : {
                                    'spotify' : 'https://open.spotify.com/artist/58RMTlPJKbmpmVk1AmRK3h'
                                  },
                                  'href' : 'https://api.spotify.com/v1/artists/58RMTlPJKbmpmVk1AmRK3h',
                                  'id' : '58RMTlPJKbmpmVk1AmRK3h',
                                  'name' : 'Abidaz',
                                  'type' : 'artist',
                                  'uri' : 'spotify:artist:58RMTlPJKbmpmVk1AmRK3h'
                                } ],
                                'available_markets' : [ 'AR', 'AT', 'AU', 'BE', 'BR', 'CL', 'CO', 'CY', 'CZ', 'DE' ],
                                'copyrights' : [ {
                                  'text' : '(C) 2013 Soblue Music Group AB, Under exclusive license to Universal Music AB',
                                  'type' : 'C'
                                }, {
                                  'text' : '(P) 2013 Soblue Music Group AB, Under exclusive license to Universal Music AB',
                                  'type' : 'P'
                                } ],
                                'external_ids' : {
                                  'upc' : '00602537623730'
                                },
                                'external_urls' : {
                                  'spotify' : 'https://open.spotify.com/album/5m4VYOPoIpkV0XgOiRKkWC'
                                },
                                'genres' : [ ],
                                'href' : 'https://api.spotify.com/v1/albums/5m4VYOPoIpkV0XgOiRKkWC',
                                'id' : '5m4VYOPoIpkV0XgOiRKkWC',
                                'images' : [ {
                                  'height' : 640,
                                  'url' : 'https://i.scdn.co/image/ccbb1e3bea2461e69783895e880965b171e29f4c',
                                  'width' : 640
                                }, {
                                  'height' : 300,
                                  'url' : 'https://i.scdn.co/image/2210b7d23f320a2cab2736bd3b3b948415dd21d8',
                                  'width' : 300
                                }, {
                                  'height' : 64,
                                  'url' : 'https://i.scdn.co/image/609153aca7f4760136d97fbaccdb4ec0757e4c9e',
                                  'width' : 64
                                } ],
                                'name' : 'In & ut',
                                'popularity' : 49,
                                'release_date' : '2013-01-01',
                                'release_date_precision' : 'day',
                                'tracks' : {
                                  'href' : 'https://api.spotify.com/v1/albums/5m4VYOPoIpkV0XgOiRKkWC/tracks?offset=0&limit=50',
                                  'items' : [ {
                                    'artists' : [ {
                                      'external_urls' : {
                                        'spotify' : 'https://open.spotify.com/artist/58RMTlPJKbmpmVk1AmRK3h'
                                      },
                                      'href' : 'https://api.spotify.com/v1/artists/58RMTlPJKbmpmVk1AmRK3h',
                                      'id' : '58RMTlPJKbmpmVk1AmRK3h',
                                      'name' : 'Abidaz',
                                      'type' : 'artist',
                                      'uri' : 'spotify:artist:58RMTlPJKbmpmVk1AmRK3h'
                                    }, {
                                      'external_urls' : {
                                        'spotify' : 'https://open.spotify.com/artist/1l63szZeUpN1m87MOD1u7K'
                                      },
                                      'href' : 'https://api.spotify.com/v1/artists/1l63szZeUpN1m87MOD1u7K',
                                      'id' : '1l63szZeUpN1m87MOD1u7K',
                                      'name' : 'Chapee',
                                      'type' : 'artist',
                                      'uri' : 'spotify:artist:1l63szZeUpN1m87MOD1u7K'
                                    }, {
                                      'external_urls' : {
                                        'spotify' : 'https://open.spotify.com/artist/1VLf7Ncxb5Jga6eyd3jh6K'
                                      },
                                      'href' : 'https://api.spotify.com/v1/artists/1VLf7Ncxb5Jga6eyd3jh6K',
                                      'id' : '1VLf7Ncxb5Jga6eyd3jh6K',
                                      'name' : 'C.U.P',
                                      'type' : 'artist',
                                      'uri' : 'spotify:artist:1VLf7Ncxb5Jga6eyd3jh6K'
                                    } ],
                                    'available_markets' : [ 'AR', 'AT', 'AU', 'BE', 'BR', 'CL', 'CO', 'CY', 'CZ', 'DE' ],
                                    'disc_number' : 1,
                                    'duration_ms' : 170920,
                                    'explicit' : false,
                                    'external_urls' : {
                                      'spotify' : 'https://open.spotify.com/track/3VNWq8rTnQG6fM1eldSpZ0'
                                    },
                                    'href' : 'https://api.spotify.com/v1/tracks/3VNWq8rTnQG6fM1eldSpZ0',
                                    'id' : '3VNWq8rTnQG6fM1eldSpZ0',
                                    'name' : 'E.C.',
                                    'preview_url' : 'https://p.scdn.co/mp3-preview/f95e0dba1a76b44fa2b52da2bc273d4f1c4126a5',
                                    'track_number' : 1,
                                    'type' : 'track',
                                    'uri' : 'spotify:track:3VNWq8rTnQG6fM1eldSpZ0'
                                  }, {
                                    ...
                                  }, {
                                    'artists' : [ {
                                      'external_urls' : {
                                        'spotify' : 'https://open.spotify.com/artist/58RMTlPJKbmpmVk1AmRK3h'
                                      },
                                      'href' : 'https://api.spotify.com/v1/artists/58RMTlPJKbmpmVk1AmRK3h',
                                      'id' : '58RMTlPJKbmpmVk1AmRK3h',
                                      'name' : 'Abidaz',
                                      'type' : 'artist',
                                      'uri' : 'spotify:artist:58RMTlPJKbmpmVk1AmRK3h'
                                    } ],
                                    'available_markets' : [ 'AR', 'AT', 'AU', 'BE', 'BR', 'CL', 'CO', 'CY', 'CZ', 'DE', 'DK', 'EE' ],
                                    'disc_number' : 1,
                                    'duration_ms' : 165946,
                                    'explicit' : false,
                                    'external_urls' : {
                                      'spotify' : 'https://open.spotify.com/track/6ZrVKylVlxkaXHj42O0q2r'
                                    },
                                    'href' : 'https://api.spotify.com/v1/tracks/6ZrVKylVlxkaXHj42O0q2r',
                                    'id' : '6ZrVKylVlxkaXHj42O0q2r',
                                    'name' : 'Råknas - Radio Edit',
                                    'preview_url' : 'https://p.scdn.co/mp3-preview/a7c9a4bfa9e346e3733e9d88076ad1ae409136fb',
                                    'track_number' : 13,
                                    'type' : 'track',
                                    'uri' : 'spotify:track:6ZrVKylVlxkaXHj42O0q2r'
                                  } ],
                                  'limit' : 50,
                                  'next' : null,
                                  'offset' : 0,
                                  'previous' : null,
                                  'total' : 13
                                },
                                'type' : 'album',
                                'uri' : 'spotify:album:5m4VYOPoIpkV0XgOiRKkWC'
                              }
                            } ],
                            'limit' : 1,
                            'next' : 'https://api.spotify.com/v1/me/albums?offset=1&limit=1',
                            'offset' : 0,
                            'previous' : null,
                            'total' : 19
                          }"
		}
	}
}
```

<a name="removeSavedAlbum"/>
## SpotifyUserAPI.removeSavedAlbum
Remove one album from the current user’s “Your Music” library.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| A comma-separated list of the Spotify IDs.

#### Request example
```json
{	"access_token": "...",
	"id": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"[empty]"
		}
	}
}
```

<a name="checkSavedAlbum"/>
## SpotifyUserAPI.checkSavedAlbum
Check if an album is already saved in the current Spotify user’s “Your Music” library.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| A comma-separated list of the Spotify IDs.

#### Request example
```json
{	"access_token": "...",
	"id": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"[true]"
		}
	}
}
```

<a name="getUserTopArtists"/>
## SpotifyUserAPI.getUserTopArtists
Get the current user’s top artists.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| time_range  | String| Optional: Over what time frame the affinities are computed. Valid values: long_term (calculated from several years of data and including all new data as it becomes available), medium_term (approximately last 6 months), short_term (approximately last 4 weeks). Default: medium_term.

#### Request example
```json
{	"access_token": "...",
	"time_range": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
                            'items' : [ {
                              'external_urls' : {
                                'spotify' : 'https://open.spotify.com/artist/0I2XqVXqHScXjHhk6AYYRe'
                              },
                              'followers' : {
                                'href' : null,
                                'total' : 7753
                              },
                              'genres' : [ 'swedish hip hop' ],
                              'href' : 'https://api.spotify.com/v1/artists/0I2XqVXqHScXjHhk6AYYRe',
                              'id' : '0I2XqVXqHScXjHhk6AYYRe',
                              'images' : [ {
                                'height' : 640,
                                'url' : 'https://i.scdn.co/image/2c8c0cea05bf3d3c070b7498d8d0b957c4cdec20',
                                'width' : 640
                              }, {
                                'height' : 300,
                                'url' : 'https://i.scdn.co/image/394302b42c4b894786943e028cdd46d7baaa29b7',
                                'width' : 300
                              }, {
                                'height' : 64,
                                'url' : 'https://i.scdn.co/image/ca9df7225ade6e5dfc62e7076709ca3409a7cbbf',
                                'width' : 64
                              } ],
                              'name' : 'Afasi & Filthy',
                              'popularity' : 54,
                              'type' : 'artist',
                              'uri' : 'spotify:artist:0I2XqVXqHScXjHhk6AYYRe'
                            },{
                             ...
                            }],
                            'next' : 'https://api.spotify.com/v1/me/top/artists?offset=20',
                            'previous : null',
                            'total' : 50,
                            'limit' : 20,
                            'href' : 'https://api.spotify.com/v1/me/top/artists'
                          }"
		}
	}
}
```

<a name="getUserTopTracks"/>
## SpotifyUserAPI.getUserTopTracks
Get the current user’s top tracks.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| time_range  | String| Optional: Over what time frame the affinities are computed. Valid values: long_term (calculated from several years of data and including all new data as it becomes available), medium_term (approximately last 6 months), short_term (approximately last 4 weeks). Default: medium_term.

#### Request example
```json
{	"access_token": "...",
	"time_range": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{ 
                            'items' : [ ], 
                            'total' : 0, 
                            'limit' : 20, 
                            'offset' : 0, 
                            'href' : 'https://api.spotify.com/v1/me/top/tracks', 
                            'previous' : null, 
                            'next' : null 
                        }"
		}
	}
}
```

<a name="getRecommendations"/>
## SpotifyUserAPI.getRecommendations
Create a playlist-style listening experience based on seed artists, tracks and genres.

| Field                  | Type  | Description
|------------------------|-------|----------
| access_token           | String| A valid access token from the getAccessToken method
| seed_artists           | String| A comma separated list of Spotify IDs for seed artists.
| seed_genres            | String| A comma separated list of any genres in the set of available genre seeds.
| seed_tracks            | String| A comma separated list of Spotify IDs for a seed track.
| market                 | String| Optional: An ISO 3166-1 alpha-2 country code. Provide this parameter if you want to apply Track Relinking.
| limit                  | String| Optional: The target size of the list of recommended tracks. For seeds with unusually small pools or when highly restrictive filtering is applied, it may be impossible to generate the requested number of recommended tracks. Debugging information for such cases is available in the response. Default: 20. Minimum: 1. Maximum: 100.
| acousticness_min       | String| Optional: A confidence measure from 0.0 to 1.0 of whether the track is acoustic. 1.0 represents high confidence the track is acoustic.
| acousticness_max       | String| Optional: A confidence measure from 0.0 to 1.0 of whether the track is acoustic. 1.0 represents high confidence the track is acoustic.
| acousticness_target    | String| Optional: A confidence measure from 0.0 to 1.0 of whether the track is acoustic. 1.0 represents high confidence the track is acoustic.
| danceability_min       | String| Optional: Danceability describes how suitable a track is for dancing based on a combination of musical elements including tempo, rhythm stability, beat strength, and overall regularity. A value of 0.0 is least danceable and 1.0 is most danceable.
| danceability_max       | String| Optional: Danceability describes how suitable a track is for dancing based on a combination of musical elements including tempo, rhythm stability, beat strength, and overall regularity. A value of 0.0 is least danceable and 1.0 is most danceable.
| danceability_target    | String| Optional: Danceability describes how suitable a track is for dancing based on a combination of musical elements including tempo, rhythm stability, beat strength, and overall regularity. A value of 0.0 is least danceable and 1.0 is most danceable.
| duration_ms_min        | String| Optional: The duration of the track in milliseconds.
| duration_ms_max        | String| Optional: The duration of the track in milliseconds.
| duration_ms_target     | String| Optional: The duration of the track in milliseconds.
| energy_min             | String| Optional: Energy is a measure from 0.0 to 1.0 and represents a perceptual measure of intensity and activity. Typically, energetic tracks feel fast, loud, and noisy.
| energy_max             | String| Optional: Energy is a measure from 0.0 to 1.0 and represents a perceptual measure of intensity and activity. Typically, energetic tracks feel fast, loud, and noisy.
| energy_target          | String| Optional: Energy is a measure from 0.0 to 1.0 and represents a perceptual measure of intensity and activity. Typically, energetic tracks feel fast, loud, and noisy.
| instrumentalness_min   | String| Optional: Predicts whether a track contains no vocals. 'Ooh' and 'aah' sounds are treated as instrumental in this context. Rap or spoken word tracks are clearly 'vocal'. The closer the instrumentalness value is to 1.0, the greater likelihood the track contains no vocal content. Values above 0.5 are intended to represent instrumental tracks, but confidence is higher as the value approaches 1.0.
| instrumentalness_max   | String| Optional: Predicts whether a track contains no vocals. 'Ooh' and 'aah' sounds are treated as instrumental in this context. Rap or spoken word tracks are clearly 'vocal'. The closer the instrumentalness value is to 1.0, the greater likelihood the track contains no vocal content. Values above 0.5 are intended to represent instrumental tracks, but confidence is higher as the value approaches 1.0.
| instrumentalness_target| String| Optional: Predicts whether a track contains no vocals. 'Ooh' and 'aah' sounds are treated as instrumental in this context. Rap or spoken word tracks are clearly 'vocal'. The closer the instrumentalness value is to 1.0, the greater likelihood the track contains no vocal content. Values above 0.5 are intended to represent instrumental tracks, but confidence is higher as the value approaches 1.0.
| key_min                | String| Optional: The key the track is in. Integers map to pitches using standard Pitch Class notation.
| key_max                | String| Optional: The key the track is in. Integers map to pitches using standard Pitch Class notation.
| key_target             | String| Optional: The key the track is in. Integers map to pitches using standard Pitch Class notation.
| liveness_min           | String| Optional: Detects the presence of an audience in the recording. Higher liveness values represent an increased probability that the track was performed live. A value above 0.8 provides strong likelihood that the track is live.
| liveness_max           | String| Optional: Detects the presence of an audience in the recording. Higher liveness values represent an increased probability that the track was performed live. A value above 0.8 provides strong likelihood that the track is live.
| liveness_target        | String| Optional: Detects the presence of an audience in the recording. Higher liveness values represent an increased probability that the track was performed live. A value above 0.8 provides strong likelihood that the track is live.
| loudness_min           | String| Optional: The overall loudness of a track in decibels (dB). Loudness values are averaged across the entire track and are useful for comparing relative loudness of tracks. Loudness is the quality of a sound that is the primary psychological correlate of physical strength (amplitude). Values typical range between -60 and 0 db.
| loudness_max           | String| Optional: The overall loudness of a track in decibels (dB). Loudness values are averaged across the entire track and are useful for comparing relative loudness of tracks. Loudness is the quality of a sound that is the primary psychological correlate of physical strength (amplitude). Values typical range between -60 and 0 db.
| loudness_target        | String| Optional: The overall loudness of a track in decibels (dB). Loudness values are averaged across the entire track and are useful for comparing relative loudness of tracks. Loudness is the quality of a sound that is the primary psychological correlate of physical strength (amplitude). Values typical range between -60 and 0 db.
| mode_min               | String| Optional: Mode indicates the modality (major or minor) of a track, the type of scale from which its melodic content is derived. Major is represented by 1 and minor is 0.
| mode_max               | String| Optional: Mode indicates the modality (major or minor) of a track, the type of scale from which its melodic content is derived. Major is represented by 1 and minor is 0.
| mode_target            | String| Optional: Mode indicates the modality (major or minor) of a track, the type of scale from which its melodic content is derived. Major is represented by 1 and minor is 0.
| popularity_min         | String| Optional: The popularity of the track. The value will be between 0 and 100, with 100 being the most popular.
| popularity_max         | String| Optional: The popularity of the track. The value will be between 0 and 100, with 100 being the most popular.
| popularity_target      | String| Optional: The popularity of the track. The value will be between 0 and 100, with 100 being the most popular.
| speechiness_min        | String| Optional: Speechiness detects the presence of spoken words in a track. The more exclusively speech-like the recording (e.g. talk show, audio book, poetry), the closer to 1.0 the attribute value.
| speechiness_max        | String| Optional: Speechiness detects the presence of spoken words in a track. The more exclusively speech-like the recording (e.g. talk show, audio book, poetry), the closer to 1.0 the attribute value.
| speechiness_target     | String| Optional: Speechiness detects the presence of spoken words in a track. The more exclusively speech-like the recording (e.g. talk show, audio book, poetry), the closer to 1.0 the attribute value.
| tempo_min              | String| Optional: The overall estimated tempo of a track in beats per minute (BPM).
| tempo_max              | String| Optional: The overall estimated tempo of a track in beats per minute (BPM).
| tempo_target           | String| Optional: The overall estimated tempo of a track in beats per minute (BPM).
| time_signature_min     | String| Optional: An estimated overall time signature of a track. The time signature (meter) is a notational convention to specify how many beats are in each bar (or measure).
| time_signature_max     | String| Optional: An estimated overall time signature of a track. The time signature (meter) is a notational convention to specify how many beats are in each bar (or measure).
| time_signature_target  | String| Optional: An estimated overall time signature of a track. The time signature (meter) is a notational convention to specify how many beats are in each bar (or measure).
| valence_min            | String| Optional: A measure from 0.0 to 1.0 describing the musical positiveness conveyed by a track.
| valence_max            | String| Optional: A measure from 0.0 to 1.0 describing the musical positiveness conveyed by a track.
| valence_target         | String| Optional: A measure from 0.0 to 1.0 describing the musical positiveness conveyed by a track.

#### Request example
```json
{	"access_token": "...",
	"seed_artists": "...",
	"seed_genres": "...",
	"seed_tracks": "...",
	"market": "...",
	"limit": "...",
	"acousticness_min": "...",
	"acousticness_max": "...",
	"acousticness_target": "...",
	"danceability_min": "...",
	"danceability_max": "...",
	"danceability_target": "...",
	"duration_ms_min": "...",
	"duration_ms_max": "...",
	"duration_ms_target": "...",
	"energy_min": "...",
	"energy_max": "...",
	"energy_target": "...",
	"instrumentalness_min": "...",
	"instrumentalness_max": "...",
	"instrumentalness_target": "...",
	"key_min": "...",
	"key_max": "...",
	"key_target": "...",
	"liveness_min": "...",
	"liveness_max": "...",
	"liveness_target": "...",
	"loudness_min": "...",
	"loudness_max": "...",
	"loudness_target": "...",
	"mode_min": "...",
	"mode_max": "...",
	"mode_target": "...",
	"popularity_min": "...",
	"popularity_max": "...",
	"popularity_target": "...",
	"speechiness_min": "...",
	"speechiness_max": "...",
	"speechiness_target": "...",
	"tempo_min": "...",
	"tempo_max": "...",
	"tempo_target": "...",
	"time_signature_min": "...",
	"time_signature_max": "...",
	"time_signature_target": "...",
	"valence_min": "...",
	"valence_max": "...",
	"valence_target": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
                            'tracks': [
                              {
                                'artists' : [ {
                                  'external_urls' : {
                                    'spotify' : 'https://open.spotify.com/artist/134GdR5tUtxJrf8cpsfpyY'
                                  },
                                    'href' : 'https://api.spotify.com/v1/artists/134GdR5tUtxJrf8cpsfpyY',
                                    'id' : '134GdR5tUtxJrf8cpsfpyY',
                                    'name' : 'Elliphant',
                                    'type' : 'artist',
                                    'uri' : 'spotify:artist:134GdR5tUtxJrf8cpsfpyY'
                                }, {
                                  'external_urls' : {
                                    'spotify' : 'https://open.spotify.com/artist/1D2oK3cJRq97OXDzu77BFR'
                                  },
                                    'href' : 'https://api.spotify.com/v1/artists/1D2oK3cJRq97OXDzu77BFR',
                                    'id' : '1D2oK3cJRq97OXDzu77BFR',
                                    'name' : 'Ras Fraser Jr.',
                                    'type' : 'artist',
                                    'uri' : 'spotify:artist:1D2oK3cJRq97OXDzu77BFR'
                                } ],
                                'disc_number' : 1,
                                'duration_ms' : 199133,
                                'explicit' : false,
                                'external_urls' : {
                                  'spotify' : 'https://open.spotify.com/track/1TKYPzH66GwsqyJFKFkBHQ'
                                },
                                'href' : 'https://api.spotify.com/v1/tracks/1TKYPzH66GwsqyJFKFkBHQ',
                                'id' : '1TKYPzH66GwsqyJFKFkBHQ',
                                'is_playable' : true,
                                'name' : 'Music Is Life',
                                'preview_url' : 'https://p.scdn.co/mp3-preview/546099103387186dfe16743a33edd77e52cec738',
                                'track_number' : 1,
                                'type' : 'track',
                                'uri' : 'spotify:track:1TKYPzH66GwsqyJFKFkBHQ'
                              }, {
                                'artists' : [ {
                                  'external_urls' : {
                                    'spotify' : 'https://open.spotify.com/artist/1VBflYyxBhnDc9uVib98rw'
                                  },
                                    'href' : 'https://api.spotify.com/v1/artists/1VBflYyxBhnDc9uVib98rw',
                                    'id' : '1VBflYyxBhnDc9uVib98rw',
                                    'name' : 'Icona Pop',
                                    'type' : 'artist',
                                    'uri' : 'spotify:artist:1VBflYyxBhnDc9uVib98rw'
                                } ],
                                  'disc_number' : 1,
                                  'duration_ms' : 187026,
                                  'explicit' : false,
                                  'external_urls' : {
                                    'spotify' : 'https://open.spotify.com/track/15iosIuxC3C53BgsM5Uggs'
                                  },
                                  'href' : 'https://api.spotify.com/v1/tracks/15iosIuxC3C53BgsM5Uggs',
                                  'id' : '15iosIuxC3C53BgsM5Uggs',
                                  'is_playable' : true,
                                  'name' : 'All Night',
                                  'preview_url' : 'https://p.scdn.co/mp3-preview/9ee589fa7fe4e96bad3483c20b3405fb59776424',
                                  'track_number' : 2,
                                  'type' : 'track',
                                  'uri' : 'spotify:track:15iosIuxC3C53BgsM5Uggs'
                              },
                              ...
                            ],
                            'seeds': [
                              {
                                'initialPoolSize': 500,
                                'afterFilteringSize': 380,
                                'afterRelinkingSize': 365,
                                'href': 'https://api.spotify.com/v1/artists/4NHQUGzhtTLFvgF5SZesLK',
                                'id': '4NHQUGzhtTLFvgF5SZesLK',
                                'type': 'artist'
                              }, {
                                'initialPoolSize': 250,
                                'afterFilteringSize': 172,
                                'afterRelinkingSize': 144,
                                'href': 'https://api.spotify.com/v1/tracks/0c6xIDDpzE81m2q797ordA',
                                'id': '0c6xIDDpzE81m2q797ordA',
                                'type': 'track'
                              }
                            ]
                          }"
		}
	}
}
```

