# PHP &ndash; TDD - homework
> Complete the exercises in appropriate files.

>Additional exercise are for volunteers

**IMPORTANT - do not change the file structure or filenames and use the prepared variables**

**Remember about type declarations**

#### Exercise 1

Write tests that check if the class in the file `movie.php` works correctly.  
Database structure is in the `movies.sql` file.
Use fixtures in order not to use the "production" database.   

There are three methods to test for the occasion of:
* not having parameters
* passing incorrect parameter types
* **returning** appropriate messages

If you detect an error, **modify the code** until it passes the test and does not generate errors in any of the test cases.

#### Attention! Do not modify the test - only modify the code

After testing the class, refactor it so that it does not contain repeating code in accordance with the DRY principle
(Do not Repeat Yourself).

**Add appropriate types to the code**

#### Exercise 2 - additional.

Write a simple system for creating surveys (only the back-end - do not write front-end).
The system should be written using the fully object-oriented approach, according to the following guidelines.

Survey:
  1. Should have its own name, a unique link.
  2. Should implement the following methods:
     * method that returns a list of questions for a given survey,
     * method that returns the name,
     * method that changes the name,
     * method that saves the change in the database.
  3. Should implement the following static methods:
     * creating of a new survey,
     * loading a survey with a given **id** from the database,
     * deleting a survey with a given **id** from the database.

Question:
  1. Should have question text.
  2. Should implement the following methods:
     * method that returns all answers to a single question,
     * method that changes question text,
     * method that returns question text,
     * method that saves the question in the database.
  3. Should implement the following static methods:
     * creating of a new question (requires survey **id**),
     * loading a question with a given **id** from the database,
     * deleting a question with a given **id** from the database.

Answer:
  1. Should have answer text.
  2. Should implement the following methods:
     * method that changes answer text,
     * method that returns answer text,
     * method that saves the answer in the database.
  3. Should implement the following static methods:
     * creating of a new answer (requires question **id**),
     * loading an answer with a given **id** from the database,
     * deleting an answer with a given **id** from the database.

Tests for this exercise should be written with the use of loading of appropriate fixtures to the databases.
We create four test groups - one for each class, and one that tests everything.
