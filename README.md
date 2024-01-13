### Documentation for Flight Management System API

#### Introduction
This documentation outlines the APIs for a Flight Management System that facilitates the storage and retrieval of flight information for users.

#### Technologies Used
- Flask: A lightweight web framework for API development.
- MySQL: A relational database for storing flight data.

#### API Endpoints

1. **Insert Flight Information**
    - **Endpoint:** `/insert_flight`
    - **Method:** POST
    - **Request Format:** `{"user_id": 123, "flights": [["SFO", "EWR"], ["ATL", "EWR"], ...]}`
    - **Response:** `{"status": "success", "message": "Flight information inserted successfully."}`

2. **Get Last Destination for a User**
    - **Endpoint:** `/get_last_destination/<user_id>`
    - **Method:** GET
    - **Response:** `{"status": "success", "last_destination": "EWR"}`

#### Database Schema

- **Table:** `flights`
  | Field              | Type          |
  | ------------------ | ------------- |
  | id (Primary Key)   | INT           |
  | user_id            | INT           |
  | source_city        | VARCHAR(255)  |
  | destination_city   | VARCHAR(255)  |
  | flight_date        | DATETIME      |

#### Examples

1. **Insert Flight Information**
    - **Request Example:** `POST /insert_flight { "user_id": 123, "flights": [["SFO", "EWR"], ["ATL", "EWR"], ["SFO", "ATL"]]}`
    - **Response Example:** `{"status": "success", "message": "Flight information inserted successfully."}`

2. **Get Last Destination for a User**
    - **Request Example:** `GET /get_last_destination/123`
    - **Response Example:** `{"status": "success", "last_destination": "ATL"}`

#### Notes
- Ensure proper authentication and authorization mechanisms are implemented in a production environment.
- Refer to the API documentation for specific details on input formats and error handling.
- Replace placeholders such as `username`, `password`, and `dbname` in the code with actual credentials.

This documentation serves as a guide for developers to interact with the Flight Management System APIs efficiently.
