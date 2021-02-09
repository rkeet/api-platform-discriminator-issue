### Steps to view issue with discriminator

- clone project
- composer install
  
- run `docker/start.sh` (starts a MySQL DB container)
- start a web server (e.g. `symfony server:start -d`)
- run `bin/reset.sh` (drops db, creates db, runs fixtures)
  
- in Postman (collection included in project dir) run `GET /forms` for expected output
- in Postman run `GET /workflows` to see output with missing properties
- in Postman run `GET /anothers` to see control group output (not discriminated entity)
