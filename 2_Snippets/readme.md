<img alt="Logo" src="http://coderslab.pl/svg/logo-coderslab.svg" width="400">

# TDD - Snippets
> Short pieces of code that solve various problems, illustrate dependencies, or show how to use some more complicated functions.

#### How to write a simple test in PHPUnit?

The class used for testing should have the same name as the filename, inherit from the `TestCase` framework class
and have public methods that start with `test`.
Remember that we need to add namespace `use PHPUnit\Framework\TestCase;`

```PHP
class sampleTest extends TestCase {
    public function testTrue()
    {
        $this->assertTrue(false);
    }
}
```


#### What types of assertions are most commonly used?

* assertions referring to arrays such as:

```php
    assertArrayHasKey(key, array)
    assertCount(expected, array)
    assertEmpty(array)
```

* assertions referring to variables:

```php
    assertEquals(expected, actual)
    assertFalse(value)
    assertNull(value)
    assertSame(value1, value2)
    assertTrue(value)
```

* assertions referring to string

```php
    assertStringEndsWith(suffix, string)

    assertStringStartsWith(prefix, string)
```
* assertions referring to numeric types

```php
    assertGreaterThan(expected, actual)
    assertGreaterThanOrEqual(expected, actual)
    assertLessThan(expected, actual)
    assertLessThanOrEqual(expected, actual)
```


#### How to group tests in scenarios?

The tests can be grouped into scenarios, the so-called test suites, by creating for this purpose a `phpunit.xml` file with appropriate tags. Each `testsuite` tag must contain a `name` attribute with the scenario name.


```XML
    <testsuites>
            <testsuite name="Products">
            <directory>/tests</directory>
            <file>/additional/test/MyTest.php</file>
            <exclude>/tests/quarantine</exclude>
            </testsuite>
    </testsuites>
```

#### How to run a test scenario?

All you need to do is enter its name in the console using the option `--testsuite`

```console
phpunit --testsuite "Products"
```


#### Testing databases using fixtures

Do not perform tests on a database available to the end user because it would be inconvenient and would not guarantee
repeatability of tests.
For this purpose, we use methods that allow us to pretend to be a real database.
The fixtures allow us to handle the entire process by preparing data before the test and resetting them after the test.
In PHPUnit, two methods with protected visibility scope are used for this purpose.

```php
    protected function setUp()
    {
        parent::setUp();
        $this->testUser = UserManager::createUser();
    }

    protected function tearDown()
    {
        $this->testUser = null;
        parent::tearDown();
    }

    public function testSetUpName(){
        $this->testUser->setName("Alan");
        $this->assertEquals($this->testUser->getName(), "Alan");
    }
```
