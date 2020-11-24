<?php


class Cinema
{
    //Connection to database
    private $servername = "localhost";
    private $username = "cinema";
    private $password = "cinema";
    private $baseName = "cinema";

    /*
     * Adding a film to database
     */
    public function addMovie($name, $description, $rating)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['submit']) && $_POST['submit'] == "addMovie") {

                $conn = new mysqli($servername, $username, $password, $baseName);

                if ($conn->connect_error) {
                    die("Connection failed.Error: " . $conn->connect_error . "<br>");
                } else {
                    echo "Connection established.<br>";
                }

                $query = "INSERT INTO Movies (id, name, description, rating) VALUES (default, '" . $name . "', '" . $description . "', " . $rating . ");";

                $conn->query($query);

                if ($conn->error == false) {
                    print "Correct query.<br>Added to the database: $name, $description, $rating";
                } else {
                    print("Error: " . $conn->error . "<br>");
                }

                $conn->close();
                $conn = null;
            }
        }
    }

    /*
     * Finds a film by name
     */
    public function searchMovieByName($nameMovie)
    {
        $conn = new mysqli($servername, $username, $password, $baseName);

        if ($conn->connect_error) {
            die("Connection failed.Error: " . $conn->connect_error . "<br>");
        } else {
            echo "Connection established.<br>";
        }

        $query = "SELECT * FROM Movies WHERE name LIKE '%$nameMovie%';";

        $result = $conn->query($query5);

        if ($conn->error == false) {
            print "Correct query. Displaying movies now:<br><br>";
        } else {
            die("Query error: " . $conn->error . "<br>");
        }

        foreach ($result as $row) {
            print("id: " . $row["id"] . ", title: " . $row["name"] . ", description: " . $row["description"] . ", rating: " . $row["rating"] . "&nbsp&nbsp");
        }

        $conn->close();
        $conn = null;
    }

    /*
     * Finds a film by rating
     */
    public function searchMovieByRating($ratingToSearch)
    {
        $conn = new mysqli($servername, $username, $password, $baseName);

        if ($conn->connect_error) {
            die("Connection failed.Error: " . $conn->connect_error . "<br>");
        } else {
            echo "Connection established.<br>";
        }

        $query = "SELECT * FROM Movies WHERE rating >= $ratingToSearch;";

        $result = $conn->query($query6);

        if ($conn->error == false) {
            print "Correct query. Displaying movies now:<br><br>";
        } else {
            die("Query error: " . $conn->error . "<br>");
        }

        foreach ($result as $row) {
            print("id: " . $row["id"] . ", title: " . $row["name"] . ", description: " . $row["description"] . ", rating: " . $row["rating"] . "&nbsp&nbsp");
        }

        $conn->close();
        $conn = null;
    }
}
