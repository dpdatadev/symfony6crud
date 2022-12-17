# symfony6crud
symfony/doctrine sqlite3 crud

Just clone
run console commands to:
create database
run migrations
start server

database is sqlite3


ready to go template!

P.S. - when you register the user you want to be admin
you'll need to manually update the record and make it ["ROLE_ADMIN"]
the debug toolbar should show that user with multiple roles
you have to be ROLE_ADMIN to access admin backend

__TODO__
I want to add a symfony command to make a registered user admin

this way the entire site uses one integrated auth system
the same system and model (LoginUser) for public users as well as the admin users
you just have to manually hack the database record to make an admin for now
