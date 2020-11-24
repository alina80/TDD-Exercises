<img alt="Logo" src="http://coderslab.pl/svg/logo-coderslab.svg" width="400">

#  Testing databases

> Complete the exercises in appropriate files.

**IMPORTANT - do not change the file structure or filenames and use the prepared variables**

**Remember about type declarations**


> In the directory with exercise, you will find compressed code named `twitter_tests.zip`.
> This is a fully object-oriented implementation of Twitter.
> Unpack it and then use Composer to install dependencies.
> In`db.php`, enter access data and generate tables using the file `create_database.php`.
> **The code contains errors and your task is to locate them and fix them using tests**.
> The located errors should be saved in the `logError.txt` file as filename + line number.

**Each class has comments in methods that describe how the method should correctly work.**  

#### Exercise 1

**All methods should work and return data as described in the comment**  

We will begin testing the application with the `User` class because the other ones depend on this one.

In this case, the tests should check:
- correctness of user creation
- verification of password
- deleting
- displaying information about the user

#### Exercise 2

**All methods should work and return data as described in the comment**  

Tests for the `Tweet` class that will check:
- creation of a new Tweet
- deleting a Tweet
- loading Tweets of a given user

#### Exercise 3

**All methods should work and return data as described in the comment**  

Tests for the  `Comment` class that check the following functionalities:
- creating a comment
- deleting a comment
- loading all comments for a given Tweet id

#### Exercise 4

**All methods should work and return data as described in the comment**  

The last class to be tested is `Message`.  

We will check it for functions such as:
- creating messages for an existing user
- sending messages to a non-existing user
- deleting messages
- loading all messages sent by a user
- loading messages received by a user
