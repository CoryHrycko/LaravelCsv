This magic Org Chart Parser is a variation on the classic Csv Parser that is used widely by the community. This particular parser has the following features:
1. Import from Csv
2. Allow to individual add into a separate chart.
3. Allow to edit individuals in that chart.


_________

Future soon Features.
1. Allow to click on each individual in the chart and go directly to their page from there you can click on their manager's Id and go directly to their page.
2. Put both manual and CSV entered into the same database.
3. 

___
How to Install:

    1. Install Xammp for Mysql and apache
    2. Run both of those services.
    3. copy the repo and place it into the file of your choice.
    4. make the environment (.env) with the database you have set up in MySql.
        4.a Go to PhpmyAdmin and hit new, then name your database accordingly. 
    5. Make the DB_CONNECTION=mysql
    6. Make the DB_HOST=127.0.0.1 and DB_PORT=3306
    7.DB_DATABASE=YourDatabaseName and DB_USERNAME=YourUserName and DB_PASSWORD=YourPass
    8.Run php artisan migrate
    9. Enjoy. 

 