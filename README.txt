eventGROUP14
======================

Róbert Grešo 201501002
Roman Behúl 201501006 
Tomasz Kaczmarek 201501370

06.12.2015 Porto

======================

Everyone is able to search for events (search is done by name or description) without login.
Passwords are encoded by md5 algorithm and all primary keys are strong randomly generated strings.
In our application logged in user is able to create events and perform read, update and delete operations.
Only logged in users are able to enroll and comment events.
It's not possible to register twice to the same event.

Our application has early '90s design because we are not artistic souls.

Our code can be found on github: https://github.com/qyqax/Events

event.sql file is sql code responsible for generating our database.