<html>
    <head>
        <title>Forum</title>
    </head>
    <body>
        <h1>Discusion Forum</h1>
        <?php
            require_once 'scripts.php';
            forum();
        ?>
        <form method="post" action="forums.php">
            <p>Do you have any comments or questions?  Please also include what department you are commenting on.<br>
                <input type="text" cols="40" rows="5" style="width:200px; height:50px;" name="com"><br>
                <select name="dept">
                    <option>American Studies</option>
                    <option>>Anthropology</option>>
                    <option>>Art</option>
                    <option>Asian Studies</option>
                    <option>Biochemistry</option>
                    <option>Biology</option>
                    <option>Chemistry</option>
                    <option>Classical Languages</option>
                    <option>Computer Science</option>
                    <option>Ecology and Biodiversity</option>
                    <option>Economics</option>
                    <option>English</option>
                    <option>Enviornmental Arts and Humanities</option>
                    <option>Enviornment and Sustainability</option>
                    <option>Forestry</option>
                    <option>French and French Studies</option>
                    <option>Geology</option>
                    <option>German</option>
                    <option>Greek</option>
                    <option>History</option>
                    <option>International and Global Studies</option>
                    <option>Latin</option>
                    <option>Mathematics</option>
                    <option>Medieval Studies</option>
                    <option>Music</option>
                    <option>Natural Resources and the Enviornment</option>
                    <option>Philosophy</option>
                    <option>Physics</option>
                    <option>Politics</option>
                    <option>Psycology</option>
                    <aoption>Religion</option>
                    <option>Russian</option>
                    <option>Spanish</option>
                    <option>Theatre</option>
                    <option>Women and Gender Studies</option>
                </select>
        </form>
    </body>
</html>
