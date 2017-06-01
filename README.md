[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/SpotifyUserAPI/functions?utm_source=RapidAPIGitHub_SpotifyUserFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# SpotifyUserAPI Package
Get Spotify user-specific data and automate behaviors.
* Domain: spotify.com
* Credentials: client_id, client_key

## How to get credentials: 
0. Go to [Spotify DEvelopers section](https://developer.spotify.com/my-applications) 
1. Login or sigh up to create new applications and manage your Spotify credentials to authenticate your requests.
2. [Create new app](https://developer.spotify.com/my-applications/#!/applications/create)
3. When you register an application on your account, two credentials are created for you - **Client ID** and **Client Secret**. You can see the credentials on the application’s details page.

## Custom datatypes:
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]```
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```



## SpotifyUserAPI.getAccessToken
Exchange an authorization code received when the user signs into the app for an access token used for API calls.

| Field       | Type  | Description
|-------------|-------|----------
| client_id   | credentials| The Client ID obtained from Spotify.
| client_key  | credentials| The Client Secret obtained from Spotify.
| code        | String| An authorization code that can be exchanged for an access token.
| redirect_uri| String| The value of redirect_uri here must exactly match one of the values you entered when you registered your application, including upper/lowercase, terminating slashes, etc


## SpotifyUserAPI.refreshAccessToken
Access tokens are deliberately set to expire after a short time, after which new tokens may be granted by supplying the refresh token originally obtained during the authorization code exchange.

| Field        | Type  | Description
|--------------|-------|----------
| client_id    | credentials| The Client ID obtained from Spotify.
| client_key   | credentials| The Client Secret obtained from Spotify.
| refresh_token| String| The refresh token returned from the getAccessToken method.


## SpotifyUserAPI.getTrackAudioFeatures
Get audio feature information for a single track identified by its unique Spotify ID.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| The Spotify ID for the track


## SpotifyUserAPI.getFeaturedPlaylists
Get a list of Spotify featured playlists (shown, for example, on a Spotify player’s “Browse” tab).

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| locale      | String| Optional: The desired language, consisting of a lowercase ISO 639 language code and an uppercase ISO 3166-1 alpha-2 country code, joined by an underscore.
| country     | String| Optional: A country: an ISO 3166-1 alpha-2 country code. Provide this parameter if you want the list of returned items to be relevant to a particular country.
| timestamp   | DatePicker| Optional: A timestamp in ISO 8601 format: yyyy-MM-ddTHH:mm:ss. Use this parameter to specify the user's local time to get results tailored for that specific date and time in the day.


## SpotifyUserAPI.getNewReleases
Get a list of new album releases featured in Spotify (shown, for example, on a Spotify player’s “Browse” tab).

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| country     | String| Optional: A country: an ISO 3166-1 alpha-2 country code. Provide this parameter if you want the list of returned items to be relevant to a particular country.


## SpotifyUserAPI.getCategories
Get a list of categories used to tag items in Spotify (on, for example, the Spotify player’s “Browse” tab).

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| country     | String| Optional: A country: an ISO 3166-1 alpha-2 country code. Provide this parameter if you want the list of returned items to be relevant to a particular country.
| locale      | String| Optional: The desired language, consisting of a lowercase ISO 639 language code and an uppercase ISO 3166-1 alpha-2 country code, joined by an underscore.


## SpotifyUserAPI.getCategory
Get a single category used to tag items in Spotify (on, for example, the Spotify player’s “Browse” tab).

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| The Spotify category ID for the category.
| country     | String| Optional: A country: an ISO 3166-1 alpha-2 country code. Provide this parameter if you want the list of returned items to be relevant to a particular country.
| locale      | String| Optional: The desired language, consisting of a lowercase ISO 639 language code and an uppercase ISO 3166-1 alpha-2 country code, joined by an underscore.


## SpotifyUserAPI.getCategoryPlaylists
Get a list of Spotify playlists tagged with a particular category.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| The Spotify category ID for the category.
| country     | String| Optional: A country: an ISO 3166-1 alpha-2 country code. Provide this parameter if you want the list of returned items to be relevant to a particular country.


## SpotifyUserAPI.getCurrentUserProfile
Get detailed profile information about the current user.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method


## SpotifyUserAPI.getFollowedArtists
Get the current user’s followed artists.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method


## SpotifyUserAPI.followUser
Make current user follow another Spotify user.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| User Spotify ID.


## SpotifyUserAPI.followArtist
Make current user follow an artist.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| Artist Spotify ID.


## SpotifyUserAPI.unfollowUser
Remove user from current user's following list.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| User Spotify ID.


## SpotifyUserAPI.unfollowArtist
Remove artist from current user's following list.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| Artist Spotify ID.


## SpotifyUserAPI.checkFollowUser
Check if current user is following another user.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| User Spotify ID.


## SpotifyUserAPI.checkFollowArtist
Check if current user is following an artist.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| Artist Spotify ID.


## SpotifyUserAPI.followPlaylist
Add the current user as a follower of a playlist.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| owner_id    | String| The Spotify user ID of the person who owns the playlist.
| playlist_id | String| The Spotify ID of the playlist.
| public      | String| Optional: If true the playlist will be included in user's public playlists, if false it will remain private.


## SpotifyUserAPI.unfollowPlaylist
Remove the current user as a follower of a playlist.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| owner_id    | String| The Spotify user ID of the person who owns the playlist.
| playlist_id | String| The Spotify ID of the playlist.


## SpotifyUserAPI.saveTrack
Save one track to the current user’s “Your Music” library.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| A comma-separated list of the Spotify IDs.


## SpotifyUserAPI.getUserSavedTracks
Get a list of the songs saved in the current Spotify user’s “Your Music” library.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| market      | String| Optional: An ISO 3166-1 alpha-2 country code. Provide this parameter if you want to apply Track Relinking.


## SpotifyUserAPI.removeSavedTrack
Remove one or more tracks from the current user’s “Your Music” library.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| A comma-separated list of the Spotify IDs.


## SpotifyUserAPI.checkSavedTrack
Check if one track is already saved in the current Spotify user’s “Your Music” library.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| A comma-separated list of the Spotify IDs.


## SpotifyUserAPI.saveAlbumForUser
Save one album to the current user’s “Your Music” library.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| A comma-separated list of the Spotify IDs.


## SpotifyUserAPI.getUserSavedAlbums
Get a list of the albums saved in the current Spotify user’s “Your Music” library.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| market      | String| Optional: An ISO 3166-1 alpha-2 country code. Provide this parameter if you want to apply Track Relinking.


## SpotifyUserAPI.removeSavedAlbum
Remove one album from the current user’s “Your Music” library.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| A comma-separated list of the Spotify IDs.


## SpotifyUserAPI.checkSavedAlbum
Check if an album is already saved in the current Spotify user’s “Your Music” library.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| id          | String| A comma-separated list of the Spotify IDs.


## SpotifyUserAPI.getUserTopArtists
Get the current user’s top artists.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| time_range  | Select| Optional: Over what time frame the affinities are computed. Valid values: long_term (calculated from several years of data and including all new data as it becomes available), medium_term (approximately last 6 months), short_term (approximately last 4 weeks). Default: medium_term.


## SpotifyUserAPI.getUserTopTracks
Get the current user’s top tracks.

| Field       | Type  | Description
|-------------|-------|----------
| access_token| String| A valid access token from the getAccessToken method
| time_range  | Select| Optional: Over what time frame the affinities are computed. Valid values: long_term (calculated from several years of data and including all new data as it becomes available), medium_term (approximately last 6 months), short_term (approximately last 4 weeks). Default: medium_term.


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


