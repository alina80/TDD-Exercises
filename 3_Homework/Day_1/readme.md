# PHP &ndash; TDD - homework
> Complete the exercises in appropriate files.

>Additional exercise are for volunteers

**IMPORTANT - do not change the file structure or filenames and use the prepared variables**

**Remember about type declarations**

#### Exercise 1

The `Shape.php` file contains a class that handles creating shapes and calculating distance between them.  
It has private attributes`x` and `y` which are integers representing the center of the shape, as well as `color` property (string).  

Analyze how the code works before you begin to write tests.

The task is to write tests that will check the following cases:
* when **incorrect parameter types** are passed in the constructor - the script should work properly and assign the value `0` to the properties: `x` and `y`, and an empty string to the `color` property
* the `showInfo()` method should **return** an array containing current values of properties, where property name is the array key, and its value is the value
* when two instances of an object are created, the distance between them **will be calculated correctly**, the distance is the **difference** between appropriate properties of objects.

If you detect an error, **fix it** and describe its cause in the exercise file, **in the line where the error occured**.

**Remember not to add `vendor` directory to the repository**

#### Exercise 2

The `Wordwrap.php` file contains a function named `wordWrapper` that divides a string into parts with the given length and **returns** an array with the parts after the division.
The function should work in such a way that no word was **ever** cut in the middle.  

Using assertions, write tests for this function that will check the following test cases:
* the given division length lands in the place where space is (you do not have to divide a word)
* the length of the division of the text lands in the middle of a word.

Example of the function working properly:
```php
$str = 'TDD is great way for learn how my code works';

var_dump(wordWrapper($str, 3));
//array (size=10)
//  0 => string 'TDD' (length=3)
//  1 => string 'is' (length=2)
//  2 => string 'great' (length=5)
//  3 => string 'way' (length=3)
//  4 => string 'for' (length=3)
//  5 => string 'learn' (length=5)
//  6 => string 'how' (length=3)
//  7 => string 'my' (length=2)
//  8 => string 'code' (length=4)
//  9 => string 'works' (length=5)

var_dump(wordWrapper($str, 11));
//array (size=5)
//  0 => string 'TDD is' (length=6)
//  1 => string 'great way' (length=9)
//  2 => string 'for learn' (length=9)
//  3 => string 'how my code' (length=11)
//  4 => string 'works' (length=5)

var_dump(wordWrapper($str, 14));
//array (size=4)
//  0 => string 'TDD is great' (length=12)
//  1 => string 'way for learn' (length=13)
//  2 => string 'how my code' (length=11)
//  3 => string 'works' (length=5)

var_dump(wordWrapper($str, 50));
//array (size=1)
//  0 => string 'TDD is great way for learn how my code works' (length=44)
```

If you detect an error, **fix it** and describe its cause in the exercise file, **in the line where the error occured**.

**Remember not to add `vendor` directory to the repository**

#### Exercise 3

In`RentCost.php`, write a function named ```rentCost(int $days): int``` that will take the number of days as a parameter, and then calculate and **return** the cost of renting a room according to the pattern below:  
1. renting for 1 day, room cost `200` USD/day,
2. renting for 2-3 days, room cost `180` USD/day,
3. renting for 4-7 days, room cost `160` USD/day,
4. renting for 8 or more days, room cost `150` USD/day.  

Additionally, every full week entitles the customer to a discount of `50` USD.

    Example:
    ```
    input -> 8
    output -> 1150
    ```

Write a function in the TDD methodology by doing a **commit after you finish each step** which will confirm your ability to write code right after you have written the tests.
To remind you:
* writing a test that is not passed
* writing code that will pass the test
* correcting the code so that it was more legible and simple, but still passed the tests

#### Exercise 4 – additional

Write a class named ```tournamentGame``` that sums points of a soccer tournament.  
The class should contain an **array of```soccerTeam``` class objects** that represents a specific team and the collection of its match scores.  
Constructor of this object (`soccerTeam`) przyjmujetakes one variable which is the name of the team.

The ```soccerTeam``` class has **private** attributes:  
* `name` - string with team name (set by the constructor)
* `vsTeams` - array of team names
* `goalsScored` - integer representing the number of scored goals
* `goalsLoss` - integer representing the number of lost goals

The ```soccerTeam``` class has **public** methods:  
* `playMatch(string $soccerTeamName, int $goalScore, int $goalLoss)` - **adds** values to appropriate attributes (`vsTeams`, `goalsScored`, `goalsLoss`) or **returns** `false` when opponent's name is empty, the number of goals is negative or it is not an integer
* `goalsScored(): int` - **returns** the sum of all goals scored in the saved matches or `0` if there are no matches entered
* `goalsLoss(): int` - **returns** the sum of all goals lost in the saved matches or `0` if there are no matches entered
* `countMatches(): int` - **returns** the sum of all matches played.

The ```tournamentGame``` class has **private** attributes  
* `allTeams` that is an array of team object instances

The ```tournamentGame``` class has **public** methods:  
* `addTeam(soccerTeam $soccerTeam): bool` - adds an instance of the ```soccerTeam``` team object to the array and **returns** `true`, and in the case if the variable passed in the parameter could not be added (because of mismatched type) **returns** `false`
* `getChampion()` - **returns** the name of the team that scored the most points among teams stored in the `allTeams` array.  

In the case of an equal number of points, the highest number of goals scored is taken into account, followed by the lowest number of goals lost.
When one winner cannot be determined or in any other case, the function **returns** `false`.

Before you implement the class, write the following test cases:

#### ```soccerTeam``` class
* using `playMatch` method with empty opposite team name - should return `false`
* using `playMatch` method with negative number of goals scored or lost - should return `false`

#### ```tournamentGame``` class
* using `addTeam` method without passing an instance of the `soccerTeam` object as a parameter - should return `false`
* using `getChampion()` method when the `allTeams` array is empty – should return `false`

To finish the exercise, refactor the code modifying it in such a way that the tests will continue to pass fully and the code will become easier to understand and use.
For example, in the `playMatch ($ soccerTeamName, $ goalScore, $ goalLoss)`  method you can pass the ```soccerTeam``` object as the first argument instead of the team name.

Refactoring also means changing the names of variables and methods to more adequate ones.

**Remember not to add `vendor` directory to the repository**
