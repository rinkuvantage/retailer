# retailer

This is retailer webstire.

#Global settings of website

The includes/head.php file contain all global info about website, you can change it as per your requirement. eg:

Database table prefix.

$prefix="ret_";

Salt using for creating password and activation key.

$salt='R{2dX8fi7SD#J(1f[Sus&&Q9dcAUUo:k,k@5I8rIdUh/:@O =^N[Y}aOD;l;jE6';

Website Name use for title in head tag

$sitname='Sigmaways Retail Analytics';

Global email for recieving and sending emails.

$owner_email='info@sigmaways.com';

#Database information

To use this you have to just need to change database configuration in includes/db_connection.php eg:

Host is using for database, by default it is localhost, but some hosting is not supporting localhost, then you can use host 

provided by the hosting company. You can get this when you will create database on server.

$hostname='localhost';

Username of database

$dbuser='root';

Password of database

$dbpass='';

database name

$dbname='retailernew';

#Sample database

sql/sql.sql file is for sample database.

#Server info:

PHP Version: 5.4 or greater

Mysql: 5.0 or greater

#New Updates 14 Jan, 2016

In includes/head.php we have defined file extensions and timezone.

#Updates 18 Jan, 2016

For to show user upload time we have added one more table in database with name ret_zone you can download it from sql/timezone.sql

#Update 29 Jan, 2016

add new field 'filecolumns' in table ret_files

Update the upload files and view files.

#Update 30 Jan, 2016

For notification we have to add one more table with name ret_usermeta, you can get it from sql/usermeta.sql

#Update 5 Feb, 2016

Delete records from table ret_files before 29 Jan, 2016 to avoid unwanted pagination on view files page.
