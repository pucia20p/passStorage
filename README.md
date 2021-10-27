# passStorage
a script that can give you your stored passwords, without actually showing them to anyone else

#2 required:
XAMPP to launch the script

a sql database with two tables:
create table main(
    id int primary key auto_increment,
    platforma text,
    username text,
    pass text
);
create table log(
    hasla text
);

at least one record in log table

#2 how do i use it?
After you're done with mysql, drag all the files into your htdocs and launch apache and mysql from XAMPP
Next, type "localhost/login.php" in your web browser
You should see two inputs - "hasło" and "baza". In "hasło" you should type one of the passwords from your log table, and in "baza" you should type your databases name and click "submit"
You should be redirected to "hasela.php" file. In there, you can add new records to your main table, or add a new password to this database. 
If you have any records in main, you should be able to see two fields - 'platforma' and 'login'. The first column contains all of the platforms you inserted. If you click on it your password should copy to your clipboard. The second column should contain some black rectangles. If you click on any of them, it'll reveal the username coresponding to the platform you inserted to your database.
tbh it's pretty straight forward if you know Polish.
