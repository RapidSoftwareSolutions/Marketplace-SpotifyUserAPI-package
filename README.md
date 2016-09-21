Google Places API Web Service package
===================


This package allows you get information about the places defined in this API: organizations, geographic locations or landmarks.

----------

How to get `api_key`
---------------

 1. Go to [Google Developers Console](https://console.developers.google.com/?authuser=1);
 2. Select a project, or create a new one.
 3. [Open the API Library](https://console.developers.google.com/apis/library?project=_&authuser=1) in the Google Developers Console. If prompted, select a project or create a new one. Select the **Enabled APIs** link in the API section to see a list of all your enabled APIs. Make sure that the API is on the list of enabled APIs. If you have not enabled it, select the API from the list of APIs, then select the **Enable API** button for the API.
 4. In the sidebar on the left, select **Credentials**.
 5. If your project has no API key for the server, create it now - **Add credentials > API key > Server key**;



**getNearbyPlaces**
-------

Search for places within a specified area. You can refine your search request by supplying keywords or specifying the type of place you are searching for. 

| Field                  | Type      | Description   |
| -------                | ----      | ---           |
| `api_key`              | string    |  The api key obtained from Google Developers Console.    |
| `latitude`             | string    |  The latitude of place.   |
| `longitude`            | string    |  The longitude of place. |
| `radius`               | string    |  Distance in meters over which the results must be found. The maximum allowable range is 50 000 meters. Note that the radius parameter should not be used if the value rank_by = distance |
| `rank_by (optional)`   | string    |  The order of the results. The possible values are: **prominence** (the default) - the results are sorted by popularity. Priority is given to the ranking of the more famous sites located in a given area. At a certain place affect the rating in the Google index, the overall popularity and other factors. **distance** - the results are sorted in order of proximity to the point specified in the parameter location. If you specify distance, you must also specify one or more parameters keyword, name, or type. |
| `keyword (optional)`   | string    |  The word on which the search is conducted in all contents are indexed by Google for a given place, including the name, type, address, user reviews and third-party content. |
| `language (optional)`  | string    |  The language code, which should be possible to return the results. See the [List of supported languages and their codes](https://developers.google.com/maps/faq?authuser=1#languagesupport). |
| `minimum_price (optional)`  | string    |  The price range, limiting the search results. Valid entries are from 0 (free) to 4 (most expensive). |
| `maximum_price (optional)`  | string    |  The price range, limiting the search results. Valid entries are from 0 (free) to 4 (most expensive). |
| `name (optional)`      | string    |  The space-separated words that are being sought in the names of places. |
| `open_now (optional)`  | string    |  Limit search results to only those organizations (establishments) that are open at the time of sending the request. |
| `type (optional)`      | string    |  Limit search results to only those places whose type corresponds to at least one of these. Types should be separated by a vertical bar (type1 \| type2 \| etc). See the [List of supported types](https://developers.google.com/places/supported_types?authuser=1) |


**Request example**

    {
        "api_key": "XXXXXXX",
        "latitude": "-33.8670522",
        "longitude": "151.19573622",
        "radius": "1",
    }

**Response example**

    {
      "callback": "success",
      "contextWrites": {
        "to": {
          "html_attributions": [],
          "results": [
            {
              "geometry": {
                "location": {
                  "lat": -33.8688197,
                  "lng": 151.2092955
                },
                "viewport": {
                  "northeast": {
                    "lat": -33.5782356,
                    "lng": 151.3430193
                  },
                  "southwest": {
                    "lat": -34.1183469,
                    "lng": 150.5209286
                  }
                }
              },
              "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/geocode-71.png",
              "id": "044785c67d3ee62545861361f8173af6c02f4fae",
              "name": "Sydney",
              "photos": [
                {
                  "height": 2988,
                  "html_attributions": [
                    "<a href=\"https://maps.google.com/maps/contrib/103288047097034730761/photos\">Septiceye sam</a>"
                  ],
                  "photo_reference": "CoQBdwAAAPL5EjgWclJ-84VCI7UjCZmRt9mV0Uof_YzABfOT66ZU8wJSHtrx_hAs7ABMpbL4OwKMu3xMll2004scOYJzxetClKouRkTWRB2dMYdAr79WKrVRGZKfiHR85T333tliIdOI2myHJqwdLmAenl3lhOmEYfCgfjken-eaFmHSx6eNEhBHBSa90F5IW5dfAxRmn00_GhQvLb_aegowyE-Jqpi7BBK39FHtOA",
                  "width": 5312
                }
              ],
              "place_id": "ChIJP3Sa8ziYEmsRUKgyFmh9AQM",
              "reference": "CoQBcgAAAJVhxgUqqft60Q3WfRd3OITmoJQMJsspu8mg8tNL3_l9ocFzQV05fNB5dTF6hx6w97nlaP9UYgN8wT40jDyPQSBChV9ffQM6cchxV61x4Vy2C2arO0vyN2xiulNrxhLSqS3y_G7FQBsmH60tWXxYPtMDfQhW_kQSnjfXK71JRpP_EhBKiD1gHb8XM1ejkxQ3Wa9MGhQXj0VIGy8F3FvPQhySed1fcjnGYw",
              "scope": "GOOGLE",
              "types": [
                "colloquial_area",
                "locality",
                "political"
              ],
              "vicinity": "Sydney"
            },
            {
              "geometry": {
                "location": {
                  "lat": -33.87497,
                  "lng": 151.19635
                },
                "viewport": {
                  "northeast": {
                    "lat": -33.8625218,
                    "lng": 151.1987729
                  },
                  "southwest": {
                    "lat": -33.8760938,
                    "lng": 151.1866249
                  }
                }
              },
              "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/geocode-71.png",
              "id": "40840d476baa531e0227a353b1bef70262f66e7e",
              "name": "Pyrmont",
              "photos": [
                {
                  "height": 640,
                  "html_attributions": [
                    "<a href=\"https://maps.google.com/maps/contrib/104842777778675742387/photos\">Silke Elzner</a>"
                  ],
                  "photo_reference": "CoQBcwAAAAFDN3Mo2HlCEqCBXbXZ4uTJmzApykCCGloBGBOCMmjpd9Omz29NvqE0aQ0vpETquUpm2Hy5Fm9PR4A5jJlXdt7XBZ3dYu5L6-9PiQlhSCPqkqERH0haNFRpb0NhJe5ujWyBqn1GEmXYlEZYAG8zhqRBYkKGVBzDYsKSvpQfp7v1EhCIjlDE_EYsvfRAo5MtNVclGhTCEpC4RRPNGPpdNCaCOCNp3DN3og",
                  "width": 960
                }
              ],
              "place_id": "ChIJAWLZAzSuEmsRkMcyFmh9AQU",
              "reference": "CoQBeAAAAENMD3m-wdBppfNkTsiDL6keG-oI-J0aIjvSOq2cttga6Y-FI6waey0oKdcAkQ_VXUBQMQEwHkzruBmZuc2gozkkKD4yEz1hEYe3ZqQ4NlfUFXR2TbCIv3Y72zvOeSqSFylbLTZw_EaVKVH7qzKgQocLSJRnVcn_L4H0fLe59EFbEhD3x_cTjZ2L96hPShWpsM5rGhRvdNU4LBmB1sGCah6BRB5M8EPJSA",
              "scope": "GOOGLE",
              "types": [
                "locality",
                "political"
              ],
              "vicinity": "Pyrmont"
            }
          ],
          "status": "OK"
        }
      }
    }


**searchPlacesByText**
-------

The service responds with a list of places matching the text string and any location bias that has been set.

| Field                  | Type      | Description   |
| -------                | ----      | ---           |
| `api_key`              | string    |  The api key obtained from Google Developers Console.    |
| `query`                | string    |  The phrase that is searched for, such as "restaurant".  |
| `latitude (optional)`  | string    |  The latitude of place.   |
| `longitude (optional)` | string    |  The longitude of place. |
| `radius (optional)`    | string    |  Distance in meters over which the results must be found. The maximum allowable range is 50 000 meters. Note that the radius parameter should not be used if the value rank_by = distance |
| `language (optional)`  | string    |  The language code, which should be possible to return the results. See the [List of supported languages and their codes](https://developers.google.com/maps/faq?authuser=1#languagesupport). |
| `minimum_price (optional)`  | string    |  The price range, limiting the search results. Valid entries are from 0 (free) to 4 (most expensive). |
| `maximum_price (optional)`  | string    |  The price range, limiting the search results. Valid entries are from 0 (free) to 4 (most expensive). |
| `open_now (optional)`  | string    |  Limit search results to only those organizations (establishments) that are open at the time of sending the request. |
| `type (optional)`      | string    |  Limit search results to only those places whose type corresponds to at least one of these. Types should be separated by a vertical bar (type1 \| type2 \| etc). See the [List of supported types](https://developers.google.com/places/supported_types?authuser=1) |


**Request example**

    {
        "api_key": "XXXXXXX",
        "query": "beer",
        "latitude": "-33.8670522",
        "longitude": "151.19573622",
        "radius": "100",
        "type": "bar"
    }

**Response example**

    {
      "callback": "success",
      "contextWrites": {
        "to": {
          "html_attributions": [],
          "results": [
            {
              "formatted_address": "80 Pyrmont St, Pyrmont NSW 2009, Australia",
              "geometry": {
                "location": {
                  "lat": -33.8677499,
                  "lng": 151.1956285
                },
                "viewport": {
                  "northeast": {
                    "lat": -33.8674622,
                    "lng": 151.19628415
                  },
                  "southwest": {
                    "lat": -33.868613,
                    "lng": 151.19366155
                  }
                }
              },
              "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/restaurant-71.png",
              "id": "882abf952e4d0e6dd96294459abe076c90c127dd",
              "name": "24/7 Sports Bar",
              "opening_hours": {
                "open_now": true,
                "weekday_text": []
              },
              "photos": [
                {
                  "height": 638,
                  "html_attributions": [
                    "<a href=\"https://maps.google.com/maps/contrib/110708522016398060959/photos\">24/7 Sports Bar</a>"
                  ],
                  "photo_reference": "CoQBcwAAAFSxut0-ilNLB-AOlHDguGG52h6m6oAcRF_qAR79_y4HoVTjFGC0nRK7uhpRsNH-2ArLJw27ACDIo87M5hF63FYe3g2fK2ARE3cc6B4VpPOeFF-OirxE_JysU6VjLXf-jh-H6EG-5V2D8IBdY244W17SGY8ehZCbi4jxnQTo6TyMEhD9dCtArWPLm9s2B9419x0ZGhSNlcMbpuEvlzfrlNJiP3uyJUrbWg",
                  "width": 960
                }
              ],
              "place_id": "ChIJ77Cd7TauEmsRBV42CMtSans",
              "rating": 3.9,
              "reference": "CnRiAAAAmHz43JWathwVXYxnUaoHt9Q7JgVHvC8eBLaoU4z5OaxHybv1mVKHqsByl1a4H3_fR_Eed6V19sBB875oUpdTtjGhODMnZ-HHYRHbMNTfcEcvjTdqaJi8pfjwmoidW2zlBkFohW9JqsxNuHIU9WT3lRIQBOdTbj3y5jsCFuMV1XsMHxoUKI3TqCKxB1ZuXjCu9ZJxFx9craI",
              "types": [
                "restaurant",
                "bar",
                "food",
                "point_of_interest",
                "establishment"
              ]
            },
            {
              "formatted_address": "The Star, 80 Pyrmont St, Pyrmont NSW 2009, Australia",
              "geometry": {
                "location": {
                  "lat": -33.8675674,
                  "lng": 151.1956091
                },
                "viewport": {
                  "northeast": {
                    "lat": -33.8674243,
                    "lng": 151.1960002
                  },
                  "southwest": {
                    "lat": -33.8676151,
                    "lng": 151.1954274
                  }
                }
              },
              "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/bar-71.png",
              "id": "ff51b76a7f07bc276c612d2d3d41efa0a82c2b64",
              "name": "Cherry",
              "opening_hours": {
                "open_now": false,
                "weekday_text": []
              },
              "photos": [
                {
                  "height": 270,
                  "html_attributions": [
                    "<a href=\"https://maps.google.com/maps/contrib/113210398723584203092/photos\">Cherry</a>"
                  ],
                  "photo_reference": "CoQBcwAAAAyQF_dhwocyfbIeAcuNQP8djhmStACRvKpHiklq8mgnE8Nm-4YGMWdqcnPUqhfSdOdqxHIy1ib1O8BDpvOcD7hCYt3doMpNCxI5ZdWUwv-i7htg5HFw0UmhHSx9WVIK7uUo1nxH9ZfEZaYUQ-3a49mrHzaXfSQ7z2tuQrL22T8ZEhCjo6blezlCbW9JtQcSacjRGhSzAqYWbcvZO8-eipIl2vbVUFUy1w",
                  "width": 270
                }
              ],
              "place_id": "ChIJ1-v38TauEmsR41TkSleEZ-U",
              "reference": "CmRaAAAA760gUjdIKZzqfStKtAG1sJFQjZ-qIyoWEGtMKMGuFZe2i2qsD9q1ppbF_ccpa7W3hblDf_uz8B5YfvDRadF7vNn_PAuridQs7secUeBu4vtI9a0PQiV74B7JR1rwvYiHEhBvR5PCqDbP5f8CsVcMlRNUGhQDcJtEifo21QyB_ylEEp2ljtpS7w",
              "types": [
                "night_club",
                "bar",
                "point_of_interest",
                "establishment"
              ]
            },
            {
              "formatted_address": "3, The Star, 80 Pyrmont St, Pyrmont NSW 2009, Australia",
              "geometry": {
                "location": {
                  "lat": -33.8673118,
                  "lng": 151.1954995
                },
                "viewport": {
                  "northeast": {
                    "lat": -33.867199,
                    "lng": 151.19583045
                  },
                  "southwest": {
                    "lat": -33.8673494,
                    "lng": 151.19534865
                  }
                }
              },
              "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/bar-71.png",
              "id": "67489e1e08330945823e67eb74e4f19aef475f9f",
              "name": "Sky Terrace",
              "opening_hours": {
                "open_now": false,
                "weekday_text": []
              },
              "photos": [
                {
                  "height": 500,
                  "html_attributions": [
                    "<a href=\"https://maps.google.com/maps/contrib/114730478199528353863/photos\">Sky Terrace</a>"
                  ],
                  "photo_reference": "CoQBcwAAAPGuEfZtDp8tKvHolms4bk_Ab2bDNQ-ufcXYqwJVmROw3z-dLtfPVPMxBjSPy6CRx3eFOtMeFJgHlGM7s2dIkKyZp09XVKvZVUCx2uE1iRm7AZOPyC5FILARCt7NptMXX5wCcI4euB1QZezhaIwEo5KEZKtefXRnWD9FsBc6_9PUEhCKq4bWd_ylMdMOx241VEozGhRiKmx68M0XB5ggHIf93d1uk-t0aQ",
                  "width": 800
                }
              ],
              "place_id": "ChIJe2m77TauEmsRBEbChAU9hAc",
              "rating": 3.7,
              "reference": "CmReAAAA6TQosSgJA0bbimar6ZSKzDJfkey-Ls1YW341nqEVNiswcdg1ENhQIKXy-7rvHLlk64fqOwI4yMdSwHv_LU9oh0qAClYamrMi8ryCox-3rThhnTwl4vbS-pu1LS7yCO5dEhB20vbKarkdYZhuThUPNnX5GhTa0ur3vnFFWGrzjKN7JKvWPuUusA",
              "types": [
                "bar",
                "point_of_interest",
                "establishment"
              ]
            }
          ],
          "status": "OK"
        }
      }
    }


**getNearbyPlacesRadar**
-------

Search for up to 200 places at once, but with less detail than is typically returned from a Text Search or Nearby Search request.

| Field                  | Type      | Description   |
| -------                | ----      | ---           |
| `api_key`              | string    |  The api key obtained from Google Developers Console.    |
| `latitude`             | string    |  The latitude of place.   |
| `longitude`            | string    |  The longitude of place. |
| `radius`               | string    |  Distance in meters over which the results must be found. The maximum allowable range is 50 000 meters. Note that the radius parameter should not be used if the value rank_by = distance |
| `keyword (optional)`   | string    |  The word on which the search is conducted in all contents are indexed by Google for a given place, including the name, type, address, user reviews and third-party content. |
| `name (optional)`      | string    |  The space-separated words that are being sought in the names of places. |
| `language (optional)`  | string    |  The language code, which should be possible to return the results. See the [List of supported languages and their codes](https://developers.google.com/maps/faq?authuser=1#languagesupport). || `minimum_price (optional)`  | string    |  The price range, limiting the search results. Valid entries are from 0 (free) to 4 (most expensive). |
| `maximum_price (optional)`  | string    |  The price range, limiting the search results. Valid entries are from 0 (free) to 4 (most expensive). |
| `minimum_price (optional)`  | string    |  The price range, limiting the search results. Valid entries are from 0 (free) to 4 (most expensive). |
| `open_now (optional)`  | string    |  Limit search results to only those organizations (establishments) that are open at the time of sending the request. |
| `type (optional)`      | string    |  Limit search results to only those places whose type corresponds to at least one of these. Types should be separated by a vertical bar (type1 \| type2 \| etc). See the [List of supported types](https://developers.google.com/places/supported_types?authuser=1) |


**Request example**

    {
        "api_key": "XXXXXXX",
        "latitude": "-33.8670522",
        "longitude": "151.19573622",
        "radius": "100",
        "type": "bar"
    }

**Response example**

    {
      "callback": "success",
      "contextWrites": {
        "to": {
          "html_attributions": [],
          "results": [
            {
              "geometry": {
                "location": {
                  "lat": -33.8674084,
                  "lng": 151.1954141
                }
              },
              "id": "2428201e8793d9c59b9431dc92c5d33fde3b9a1d",
              "place_id": "ChIJYdJUVDauEmsRp-7oNoEMhuQ",
              "reference": "CnRsAAAAI60vGnHQ_Kb8UGArgXBv5vCUHrMZW92GndquKxUupEvtb_ySkpq-YXQdmQJZI270QZsrfY7dQkipr1XfzDaH-aoMNRDu7mQND4BJaggYas73hiwggbmJtKphOpZuRQMwIRMwamXi6Bzda5cHKk8FbhIQY9inheKjiciYWhwKB2ezURoUftyo5Pg0GfYuV8rUv0j9u6tP0f4"
            },
            {
              "geometry": {
                "location": {
                  "lat": -33.8675674,
                  "lng": 151.1956091
                }
              },
              "id": "ff51b76a7f07bc276c612d2d3d41efa0a82c2b64",
              "place_id": "ChIJ1-v38TauEmsR41TkSleEZ-U",
              "reference": "CmRaAAAAiSTP-8QJK0GD6VK34uh6OsJpwLvF3MLVeBlx7sRYBzOA8olP5jSpEgANsBp5-z6dXOkJRSbbwPmSUNKCa5l6XPoAKWaBM18SZpEk-4W9rgJRJ7D7mEl9csDLkN4w-2NSEhB96gvMZheR8PlFZSx4Tf-UGhQRUDCLRmiZFCdG0VK3YSm8gzt8Gg"
            },
            {
              "geometry": {
                "location": {
                  "lat": -33.8677499,
                  "lng": 151.1956285
                }
              },
              "id": "e188acf29a29bc46f1cf844c0bf78f8b1464bd6f",
              "place_id": "ChIJ9ZCzFzGuEmsR_EwB_qra-W4",
              "reference": "CnRhAAAAj-gRJZzYwT-KQiN_uUYTlRAPKGzAm6nScoBdmno4yMcfu8sjRb1628ZsyKyrbVFqwTu_8IbwOwo5S8xulYgQx5EbHJqFRi_V3gM_b8ZtvjMtPUd54tQhsTjeEGv5SFOBy2nYLN3E7yqUCXI7aGZ51xIQnWFzKA8JYEkWIUGFJvw28BoUlQD_fMbRN11e-XhElLD8A4Kzi20"
            },
            {
              "geometry": {
                "location": {
                  "lat": -33.8677499,
                  "lng": 151.1956285
                }
              },
              "id": "882abf952e4d0e6dd96294459abe076c90c127dd",
              "place_id": "ChIJ77Cd7TauEmsRBV42CMtSans",
              "reference": "CnRiAAAABeR21xMcUwHRolCk8QCJ2tmaKfH7PwilXpaOc2YB0u96Or_LgsyrmAN9LDezLD8iDK9DKHqcX6XLUwM9Wu6EuPy80mhUy6yl6_nhtxUi31_IHp4GxoRuXbK1ACkETJfxWxucWfwwq5B2UcnhWv3XxhIQgn6ziAdTUDnkEMGLN5OUBhoUIlolCyXpfInYu_FgF74SOU_ifQg"
            },
            {
              "geometry": {
                "location": {
                  "lat": -33.8673118,
                  "lng": 151.1954995
                }
              },
              "id": "67489e1e08330945823e67eb74e4f19aef475f9f",
              "place_id": "ChIJe2m77TauEmsRBEbChAU9hAc",
              "reference": "CmReAAAARCcwNnHBd23Tp8dKj5qcvefjMhbk03knklf2t96Q7ZHrdc3uwn4TpmYTzgXIffgBzlZkB6SS-GZgtJpPJbGzYX-PgZhqwmlnddOSSrbjV_Qo3ixHocNK2WzaZY1ckWv7EhCJbC472mRqroxLYDkmn96xGhRP242Frf9VAvfZcXgg3qLwCgq8oA"
            },
            {
              "geometry": {
                "location": {
                  "lat": -33.8671532,
                  "lng": 151.1952836
                }
              },
              "id": "5b6eea29e2ac4f2b1fb8880758ad73525815c580",
              "place_id": "ChIJeXWDPTauEmsRMrWFQD1j6F0",
              "reference": "CmRcAAAAlTj4WR9zAGPa_JkjNFmdwzn9_2FhOZvlpwd1IYC0ldMu_oe3TidlrK2-IyAjyiNCUZkXHz22CZHjMK29XbkNxzfUqSFLpD02uhNnfOsIUIlSrf1eCLAAkxv03VtXB_NGEhCMwLVzxVZavWNcdPXelXbGGhTxkl9_D6Z7uJ0e6Cy0amtIJLOu0w"
            }
          ],
          "status": "OK"
        }
      }
    }


**getPlaceDetails**
-------

Request more details about a particular establishment or point of interest.

| Field                  | Type      | Description   |
| -------                | ----      | ---           |
| `api_key`              | string    |  The api key obtained from Google Developers Console.    |
| `place_id`             | string    |  The unique text identifier, returned by the **getNearbyPlaces** method.   |

**Request example**

    {
        "api_key": "XXXXXXX",
        "place_id": "ChIJAWLZAzSuEmsRkMcyFmh9AQU"
    }

**Response example**

    {
      "callback": "success",
      "contextWrites": {
        "to": {
          "html_attributions": [],
          "result": {
            "address_components": [
              {
                "long_name": "Pyrmont",
                "short_name": "Pyrmont",
                "types": [
                  "locality",
                  "political"
                ]
              },
              {
                "long_name": "Council of the City of Sydney",
                "short_name": "Sydney",
                "types": [
                  "administrative_area_level_2",
                  "political"
                ]
              },
              {
                "long_name": "New South Wales",
                "short_name": "NSW",
                "types": [
                  "administrative_area_level_1",
                  "political"
                ]
              },
              {
                "long_name": "Australia",
                "short_name": "AU",
                "types": [
                  "country",
                  "political"
                ]
              },
              {
                "long_name": "2009",
                "short_name": "2009",
                "types": [
                  "postal_code"
                ]
              }
            ],
            "adr_address": "<span class=\"locality\">Pyrmont</span> <span class=\"region\">NSW</span> <span class=\"postal-code\">2009</span>, <span class=\"country-name\">Australia</span>",
            "formatted_address": "Pyrmont NSW 2009, Australia",
            "geometry": {
              "location": {
                "lat": -33.87497,
                "lng": 151.19635
              },
              "viewport": {
                "northeast": {
                  "lat": -33.8625218,
                  "lng": 151.1987729
                },
                "southwest": {
                  "lat": -33.8760938,
                  "lng": 151.1866249
                }
              }
            },
            "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/geocode-71.png",
            "id": "40840d476baa531e0227a353b1bef70262f66e7e",
            "name": "Pyrmont",
            "photos": [
              {
                "height": 640,
                "html_attributions": [
                  "<a href=\"https://maps.google.com/maps/contrib/104842777778675742387/photos\">Silke Elzner</a>"
                ],
                "photo_reference": "CoQBcwAAAKlRFVHf3k_LiZe_8by9K4Yy1TT2nl3swJTPLuEWRdtEnXq6GHaVRzKoNK7rWygTizb6F0cLZgVQY61aeAMX3gUxC8WSaIVFafqQ1uGBZ3frfxQ1nB4ivhahTSlvmjH5pqWsZE8kJp1hnhHfT0aS8vEBqtSsgYuEtf_LEEBz5Q4EEhD5wJIhYJ3Yh65ngYo5LhUEGhSp2CRRWWNqh570KpTitZxmsOaofQ",
                "width": 960
              },
              {
                "height": 2448,
                "html_attributions": [
                  "<a href=\"https://maps.google.com/maps/contrib/103390666663866251344/photos\">AD AC</a>"
                ],
                "photo_reference": "CoQBdwAAAMI0mesGjb8QOUwu6JppTH9-JNioNvK-ZDazyqyL4b6EOz1V5mQn08KMl0apo9BNEpFaKnVZ-_h21GMMxAi3x7y6V0o4s1oqNOhJegzhw40wsJ0M_TWtFGPiTxHN2_P6yhJVBTyTnd7XdmR3XQWV7JcT_YJ-cNCuMIGs98PKzTOvEhDspZ1-Lm-PWpqaU9qFrWKwGhT6EQXggGKGKt29gu1ArKY8zClxDA",
                "width": 3264
              },
              {
                "height": 1536,
                "html_attributions": [
                  "<a href=\"https://maps.google.com/maps/contrib/116834444001829540421/photos\">Maurice van Creij</a>"
                ],
                "photo_reference": "CoQBcwAAAGdeAf6pbydtVZpB405QkndLbQxHRdRWKHTwJwDuOtksJZ9vm2RNpWWJzpWPxl8zsNPnzFxLebkY142uQbV8JDovPV968QlU6EsxtMO7YsgYTkOrFxN1NyQrF-ydW2bPUMG49OAIhDqru-3H16r7N4G7PUPV7zOJLzrHDY4dGRVlEhD8oir65TeuzgWX9K1Fmt92GhTF1rnePuXPs2gvTTK0ekG4_2PINA",
                "width": 2048
              },
              {
                "height": 1836,
                "html_attributions": [
                  "<a href=\"https://maps.google.com/maps/contrib/115159272044835371469/photos\">Simon R</a>"
                ],
                "photo_reference": "CoQBdwAAAOnT7Rsa_jyhcBVZ-F7Ynl1kKGhO4YPT7_Am50WoKan6YCOHNQ9mYpCY4FmAm6Cnj1y25yEcx7hYL3cG5Jz-eOOutxk6zzVrLUa9tGxxj9rQdOSXQI6QNYepITpIrlgzP5brMbQuxYd21_RWOW_h3sdqcIfHnAuAYVA4rQuIK3aYEhAAzhsDEQYM_YB0v_gjmF0BGhSvNsR3hSM_-6z2nMqQvdq8TANyBQ",
                "width": 3264
              },
              {
                "height": 1090,
                "html_attributions": [
                  "<a href=\"https://maps.google.com/maps/contrib/105932078588305868215/photos\">Maksym Kozlenko</a>"
                ],
                "photo_reference": "CoQBcwAAAMUIV9FltLVc4XrCGMxI5YRqwnbVJjMDG-_40pDqY9MS7iPHwoATz9n6HItxDYI8yhw3YlRgA1mVTEvAg_L1DOUf3sGo7Uj5OXa4WbK829usYsuZxSFTHYRnlMBUmqEzGwmOPcX3k5Xzi7EQNXGMOTnCQmSQ6YPMFTzXuTGke65KEhBHM9kv1N7RRUT0hecZXUeDGhQ9vxGGuD4gQ7rVxRJLz6yGr_f42g",
                "width": 2048
              },
              {
                "height": 1365,
                "html_attributions": [
                  "<a href=\"https://maps.google.com/maps/contrib/105932078588305868215/photos\">Maksym Kozlenko</a>"
                ],
                "photo_reference": "CoQBcwAAANN0R8snUpytodZwGjAQzOP59D4RovIC524vo-uS4JlLQaUMt7yGejBtoZrv-ZGJTPUzFd_0TL6ee6NCJ0vkxkn7ur9rKt7miH4jMRwsOj7B7Quoj5MFUTYlqxBghI2YePWN3wuMLkNYE-5oN4ILG_P7bPVhResxvTlTrRkb3L_EEhChSaMLZZziOgrvx1zr2MPxGhQJ0M9hMdKkd3ON1TEb3KiprtCwDg",
                "width": 2048
              },
              {
                "height": 1365,
                "html_attributions": [
                  "<a href=\"https://maps.google.com/maps/contrib/105932078588305868215/photos\">Maksym Kozlenko</a>"
                ],
                "photo_reference": "CoQBcwAAAMNvRBTrBcu1AJUx5681ugZ_hTEkQ1ZpjzzjKhEgVrwDYQ3OxqkEqoxdL9YstPXOjTWspE1RQIDH7TuAyPnM6s3MlzRxTZyvQD2ifCLJjd_3KPJj6leVxiPt0s8tRbDbv7Gol_1c1jHOfLLgF5kfZMCeTRFEcyMxiK4tUXv1QliTEhBrFvenOlnfbVAKPHmFiUHWGhScixjvlcQWTVFR-SIEznXANVck1g",
                "width": 2048
              },
              {
                "height": 1365,
                "html_attributions": [
                  "<a href=\"https://maps.google.com/maps/contrib/105932078588305868215/photos\">Maksym Kozlenko</a>"
                ],
                "photo_reference": "CoQBcwAAAA8RHI7TM9Mxu3WbOVZ5-sL_a_Yy86naNNTeRZ1RbgYHOqPEnJohqhmvpI2JgVsGZ-udRzeJO_ExIEKG8Sv37_lHgo5n7wHebkR9Gqebt_bphGpwBoRIe_w7LD30t4R_CNYzl5gH20eOaaQhsjjV4HiRCR5594f9vwb7MftviGXaEhBaUkkhz6kMBumZdhQL0h92GhQjIID2tFwtXraeIcOD-RAOQ3r6Gw",
                "width": 2048
              },
              {
                "height": 2322,
                "html_attributions": [
                  "<a href=\"https://maps.google.com/maps/contrib/112150647695252336912/photos\">John Jang</a>"
                ],
                "photo_reference": "CoQBcwAAAKjQvIwQDCYnXllzW-RYe3bTP5cvZG9kJr3BnMYO6IzptbRzznlQQ5NUJUGpUCxRsG-Tao7FmLz9-MAc04Y55HDnGic4SQ3p5KOh7-PzwKdFlnK_5m6C1q2HzJKjzWbbchmv_2TIAw0uWh_WVMzLxneaEmov9qa7MXyUVxyDld73EhABqxcBjZBtMk39ABKT6VVQGhQv_rTHx8Pp-TPZbCc_Ygt527bugA",
                "width": 4128
              },
              {
                "height": 1274,
                "html_attributions": [
                  "<a href=\"https://maps.google.com/maps/contrib/105932078588305868215/photos\">Maksym Kozlenko</a>"
                ],
                "photo_reference": "CoQBcwAAAE7_4v6L9lM68nZxTSHqC-iBFkAIdenLQ-SR5bnq-WXXQJbcSpLScJ7nDkFLFyyt2Zkp2ttjRt7fdDaM7EMC5anycd6ST7soKDAHYF8ToPD-UYMBrks7IjfO_py2Amh50CjsGziZw1larof_6-GBJDRJgFwBxOTuugKY6IEywwcaEhCvJ7_4Zep18l-vmhvxV83pGhSkB2PSHWkrl1plYIDBWkx-928Lhw",
                "width": 2048
              }
            ],
            "place_id": "ChIJAWLZAzSuEmsRkMcyFmh9AQU",
            "reference": "CoQBeAAAANLZoSBjOBu7wzCNnD1E0AKuQxGkbMPje1OteXM6gZs242GGjQws3T6V09P_gWvislsdsxWMMmi6Ugr7jY-WnQ5OLJxRlWvzArOxl1v76XY9N2WW7_Km4LbtYwEzc5cDdASREp_dzYbtcu3C4u2TA0OpnHn2Qp2v7MxyT7pjgH9cEhCLHC5O0Ai15f26Wen_JJiZGhSIRLd-bjIlcLcrIfUWaapMdfsTHQ",
            "scope": "GOOGLE",
            "types": [
              "locality",
              "political"
            ],
            "url": "https://maps.google.com/?q=Pyrmont+NSW+2009,+Australia&ftid=0x6b12ae3403d96201:0x5017d681632c790",
            "utc_offset": 600,
            "vicinity": "Pyrmont"
          },
          "status": "OK"
        }
      }
    }



**getImageURL**
-------

Get the image URL for an image of a place.

| Field                  | Type      | Description   |
| -------                | ----      | ---           |
| `api_key`              | string    |  The api key obtained from Google Developers Console.    |
| `image_id`             | string    |  The unique text identifier "photo_reference", returned by the **getNearbyPlaces** method.   |
| `max_width`            | string    |  Indicate the values in pixels for the maximum width of the returned image.   |
| `max_height`           | string    |  Indicate the values in pixels for the maximum height of the returned image.  |

**Request example**

    {
        "api_key": "XXXXXXX",
        "image_id": "CoQBdwAAAMI0mesGjb8QOUwu6JppTH9-JNioNvK-ZDazyqyL4b6EOz1V5mQn08KMl0apo9BNEpFaKnVZ-_h21GMMxAi3x7y6V0o4s1oqNOhJegzhw40wsJ0M_TWtFGPiTxHN2_P6yhJVBTyTnd7XdmR3XQWV7JcT_YJ-cNCuMIGs98PKzTOvEhDspZ1-Lm-PWpqaU9qFrWKwGhT6EQXggGKGKt29gu1ArKY8zClxDA"
    }

**Response example**

    {
      "callback": "success",
      "contextWrites": {
        "to": "https://lh5.googleusercontent.com/-7RxWxJhQ36Y/V1KqHONgEUI/AAAAAAAABeg/gj-Zx1HXWHsEaJgocHJp9TFz2ioOYZsGQCLIB/s1600-w120/"
      }
    }



**addPlace**
-------

Add a new place to Google Maps. The new place is available immediately in Nearby Searches initiated by your application. The new place also enters a moderation queue to be considered for Google Maps. A newly-added place does not appear in Text Search or Radar Search results, or to other applications, until it has been approved by the moderation process.

| Field                  | Type      | Description   |
| -------                | ----      | ---           |
| `api_key`              | string    |  The api key obtained from Google Developers Console.    |
| `accuracy`             | number    |  The accuracy of the location of the signal (in meters), which is based on the request. |
| `address (optional)`   | string    |  The address place to be added. |
| `language`             | string    |  The language in which the title is transferred to the place. See the [List of supported languages and their codes](https://developers.google.com/maps/faq#languagesupport). |
| `latitude`             | string    |  The latitude of place.   |
| `longitude`            | string    |  The longitude of place. |
| `name`                 | string    |  The full name of the place. No more than 255 characters. |
| `phoneNumber (optional)` | string    |  The phone number of the place. |
| `types`                | string    |  The category to which this place. See [supported types](https://developers.google.com/places/supported_types) |
| `website (optional)`   | string    |  The URL-address of the official web site of the place, such as home organization page. |

**Request example**

    {
        "api_key": "XXXXXXX",
        "accuracy": 50,
        "language": "en-Au",
        "latitude": "-33.8669710",
        "longitude": "151.1958750",
        "name": "Google Shoes!",
        "types": "shoe_store",
        "address": "48 Pirrama Road, Pyrmont, NSW 2009, Australia"
    }

**Response example**

    {
      "callback": "success",
      "contextWrites": {
        "to": {
          "id": "f33fcbf47b2312ca05c3bdf6abb9479f3e431302",
          "place_id": "qgYvCi0wMDAwMDA1ZDhiZTA0YzliOjZiMTJhZTM3YjQ3OjViMDg4OWI3NTQ2YWJjM2U",
          "reference": "CkQxAAAANf0u8JgdMuC8Bp25M3mt8xDkPi_z1pUaySXIedv-abu2IZx4XEf1idzcuHal_h-6NrHP6_eYJysqjXvPTd1YGxIQxyjLmfkBRUph7_qjr7HSIhoUyaFR3D1dLskBmRJ_mGhgLSV8z6k",
          "scope": "APP",
          "status": "OK"
        }
      }
    }