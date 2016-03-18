<?php
$title = 'Admin Page';
require 'includes/head.php';
require 'includes/nav.php';
require 'includes/utilities.php';
require 'includes/data_connection.php';

?>

<!-- ********** Admin ********** -->

<header>
    <h1>Admin Page</h1>
</header>
<main class="container">
    <div class="row">
        <div class="col-12">
            <table>
                <tr>
                    <td>Story ID</td>
                    <td>Headline</td>
                    <td>Byline</td>
                    <td>Text</td>
                    <td>Pub Date</td>
                    <td>View</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>

                <?php
                $sql = "SELECT * FROM stories";
                //echo $sql;
                $result = $db->query($sql);

                /*if($db_connect_error){
                    $data_error=$db->connect_error;
                }
                else{
                    echo "Data Retrieving";
                }*/

                while(list($story_id, $headline, $byline, $text, $pub_date)=$result->fetch_row()){
                    echo "<tr>";
                        echo "<td>$story_id</td>";
                        echo "<td><a href='news_detail.php?story_id=$story_id'>$headline</a></td>";
                        echo "<td>$byline</td>";
                        echo "<td>".(substr($text,0,76))."</td>";
                        echo "<td>$pub_date</td>";
                        echo "<td><a href='news_detail.php?story_id=$story_id'>View</a></td>";
                        echo "<td><a href='story_edit.php?story_id=$story_id'>Edit</a></td>";
                        echo "<td><a href='story_delete.php?story_id=$story_id'>Delete</a></td>";
                    echo"</tr>";
                }
                ?>

            </table>
            <br><br>
            <a href="story_new.php">Add New Story</a>
        </div>
    </div>
</main>