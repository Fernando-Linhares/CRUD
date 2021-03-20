##Dependences:
    - php
    - php-mysql( PDO ,enable pdo-extension:mysql on php.ini)
    - mysql-server
    - php-xml for Phpunit
    - phpunit( run composer dump-autoload )


        #CRUD Application

     Crud is a symple server side app, here us work with
a create, update, delete and read. Therefore your must to
have installed php language programing, and server mysql.
     About passwords and usernames for server mysql you 
must to do a file ".env", to acess your database and the
model and classes. For this on folder "app/src" have a
entity called Dotenv to make all filter of data on file 
".env" and transport to th mysql class connection.
```
    For connection your must to do a file ".env"
        >app
        >public
        >resources
        >sh
        >test
        >vendor
        sh.env

        Write like this:
            ------------
            host:localhost
            user:root
            password:
            db:crud
            ------------
        
        Next you must to run code on your mysql:
            CREATE DATABASE crud;

            CREATE Table products(
                id PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(50) NOT NULL,
                price FLOAT(10) NOT NULL,
                cat VARCHAR(50) NOT NULL
                );
 ```

     To make tests the executable "test-all" will do
the job for test all classes with the Phpunit Framework
,the classes test can be used for documentation the for
classes crud, once a time that operations are implemented
on test classes through his methods.
    
    For Test:

        ./test-all
    or
        php test-all
    
    To get start the server the executable "server" will
do the job for up the server php.

    For up server:
        ./server
    or
        php server

    You can this server on your brawser.

    For see write on your brawser:

        http://localhost:8000/

    To start application with intens on your database the
executable "migrate" will do the this job for you, and will
insert the data on file "migration.txt" on the database.

    For up server:
        ./migrate
    or
        php migrate

    However if you want the application on your shell, the
executable "shell" will show this app on your shell and more,
you can create update and delete the itens too.


This app are developed by Fernando Linhares on standard github
software license.
