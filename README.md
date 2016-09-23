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
Method description

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
                            "access_token": "NgCXRK...MzYjw",
                            "token_type": "Bearer",
                            "scope": "user-read-private user-read-email",
                            "expires_in": 3600,
                            "refresh_token": "NgAagA...Um_SHo"
                         }
                 }
	}
}
```

<a name="refreshAccessToken"/>
## SpotifyUserAPI.refreshAccessToken
Method description

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
                            "access_token": "NgA6ZcYI...ixn8bUQ",
                            "token_type": "Bearer",
                            "scope": "user-read-private user-read-email",
                            "expires_in": 3600
                         }"
                 }
	}
}
```

<a name="getTrackAudioFeatures"/>
## SpotifyUserAPI.getTrackAudioFeatures
Method description

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
                            'loudness": -11.84,
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
Method description

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| locale      | String| Optional: The desired language, consisting of a lowercase ISO 639 language code and an uppercase ISO 3166-1 alpha-2 country code, joined by an underscore.
| country     | String| Optional: A country: an ISO 3166-1 alpha-2 country code. Provide this parameter if you want the list of returned items to be relevant to a particular country.
| timestamp   | String| Optional: A timestamp in ISO 8601 format: yyyy-MM-ddTHH:mm:ss. Use this parameter to specify the user's local time to get results tailored for that specific date and time in the day.

#### Request example
```json
{	"access_token": "...",
	"locale": "...",
	"country": "...",
	"timestamp": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"..."
		}
	}
}
```

<a name="getNewReleases"/>
## SpotifyUserAPI.getNewReleases
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getCategories"/>
## SpotifyUserAPI.getCategories
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getCategory"/>
## SpotifyUserAPI.getCategory
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getCategoryPlaylists"/>
## SpotifyUserAPI.getCategoryPlaylists
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getCurrentUserProfile"/>
## SpotifyUserAPI.getCurrentUserProfile
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getFollowedArtists"/>
## SpotifyUserAPI.getFollowedArtists
Method description

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
			"to":"..."
		}
	}
}
```

<a name="followUser"/>
## SpotifyUserAPI.followUser
Method description

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
			"to":"..."
		}
	}
}
```

<a name="followArtist"/>
## SpotifyUserAPI.followArtist
Method description

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
			"to":"..."
		}
	}
}
```

<a name="unfollowUser"/>
## SpotifyUserAPI.unfollowUser
Method description

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
			"to":"..."
		}
	}
}
```

<a name="unfollowArtist"/>
## SpotifyUserAPI.unfollowArtist
Method description

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
			"to":"..."
		}
	}
}
```

<a name="checkFollowUser"/>
## SpotifyUserAPI.checkFollowUser
Method description

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
			"to":"..."
		}
	}
}
```

<a name="checkFollowArtist"/>
## SpotifyUserAPI.checkFollowArtist
Method description

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
			"to":"..."
		}
	}
}
```

<a name="followPlaylist"/>
## SpotifyUserAPI.followPlaylist
Method description

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
			"to":"..."
		}
	}
}
```

<a name="unfollowPlaylist"/>
## SpotifyUserAPI.unfollowPlaylist
Method description

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
			"to":"..."
		}
	}
}
```

<a name="saveTrack"/>
## SpotifyUserAPI.saveTrack
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getUserSavedTracks"/>
## SpotifyUserAPI.getUserSavedTracks
Method description

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
			"to":"..."
		}
	}
}
```

<a name="removeSavedTrack"/>
## SpotifyUserAPI.removeSavedTrack
Method description

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
			"to":"..."
		}
	}
}
```

<a name="checkSavedTrack"/>
## SpotifyUserAPI.checkSavedTrack
Method description

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
			"to":"..."
		}
	}
}
```

<a name="saveAlbumForUser"/>
## SpotifyUserAPI.saveAlbumForUser
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getUserSavedAlbums"/>
## SpotifyUserAPI.getUserSavedAlbums
Method description

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
			"to":"..."
		}
	}
}
```

<a name="removeSavedAlbum"/>
## SpotifyUserAPI.removeSavedAlbum
Method description

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
			"to":"..."
		}
	}
}
```

<a name="checkSavedAlbum"/>
## SpotifyUserAPI.checkSavedAlbum
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getUserTopArtists"/>
## SpotifyUserAPI.getUserTopArtists
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getUserTopTracks"/>
## SpotifyUserAPI.getUserTopTracks
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getRecommendations"/>
## SpotifyUserAPI.getRecommendations
Method description

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
			"to":"..."
		}
	}
}
```

