**Examples:**

**Method:**
GET

**URL:**
http://localhost:8888/test1

**Response:**
`{
    "status": 0,
    "result": "test get request succeeded..."
}`

---

**Method:**
GET

**URL:**
http://localhost:8888/test2/param1/test/param2?param1=urlparam1&param2=urlparam2

**Response:**
`{
    "status": 0,
    "result": "test get request with parameter 1 \"param1\" and parameter 2 \"param2\" and url parameter 1 \"urlparam1\" and url parameter 2 \"urlparam2\" succeeded..."
}`

---

**Method:**
GET

**URL:**
http://localhost:8888/test3

**Response:**
`{
    "status": 2,
    "result": "Unauthorized!"
}`

---

**Method:**
POST

**URL:**
http://localhost:8888/test1

**Response:**
`{
"status": 0,
"result": "test post request succeeded..."
}`

---

**Method:**
POST

**URL:**
http://localhost:8888/test2/data1/param1

**Form-Data:**
param1 	formdata1
param2	formdata2

**Response:**
`{
    "status": 0,
    "result": "test post request with url parameter 1 \"param1\", form parameter 1 \"formdata1\" and form parameter 2 \"formdata2\" succeeded..."
}`

---

**Method:**
POST

**URL:**
http://localhost:8888/test2/data2/param1

**Body:**
`{ "param1": "body1", "param2": "body2" }`

**Response:**
`{
    "status": 0,
    "result": "test post request with url parameter 1 \"param1\", form parameter 1 \"body1\" and form parameter 2 \"body2\" succeeded..."
}`

---

**Method:**
POST

**URL:**
http://localhost:8888/test3

**Response:**
`{
    "status": 2,
    "result": "Unauthorized!"
}`

---

**Method:**
PUT

**URL:**
http://localhost:8888/test1

**Response:**
`{
    "status": 0,
    "result": "test put request succeeded..."
}`

---

**Method:**
PUT

**URL:**
http://localhost:8888/test2/param1

**Body:**
`{ "param1": "body1", "param2": "body2" }`

**Response:**
`{
    "status": 0,
    "result": "test put request with url parameter 1 \"param1\", form parameter 1 \"body1\" and form parameter 2 \"body2\" succeeded..."
}`

---

**Method:**
PUT

**URL:**
http://localhost:8888/test3

**Response:**
`{
    "status": 2,
    "result": "Unauthorized!"
}`

---

**Method:**
DELETE

**URL:**
http://localhost:8888/test1

**Response:**
`{
    "status": 0,
    "result": "test delete request succeeded..."
}`

---

**Method:**
DELETE

**URL:**
http://localhost:8888/test2/param1/test/param2

**Response:**
`{
    "status": 0,
    "result": "test delete request with parameter 1 \"param1\" and parameter 2 \"param2\" succeeded..."
}`

---

**Method:**
DELETE

**URL:**
http://localhost:8888/test3

**Response:**
`{
    "status": 2,
    "result": "Unauthorized!"
}`
