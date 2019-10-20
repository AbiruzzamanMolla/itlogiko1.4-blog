<?php
include "../db/conn.php";

if (isset($_POST['report'])) {
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $users = isset($_POST['users']) ? $_POST['users'] : '';
    $date = isset($_POST['date']) ? date_format(date_create($_POST['date']), "D, F d, Y") : '';
    $tags = isset($_POST['tags']) ? $_POST['tags'] : '';

    // query = "SELECT * FROM `tbl_posts` WHERE `post_category_id` = 1 OR `post_category_id` = 10 AND `post_author` = 'Abir' OR `post_author` = 'Admin' AND `post_date` LIKE '% Thu, October 10 %' AND `post_tags` LIKE '% php %' OR '%java%'";

    $query = "SELECT * FROM `tbl_posts` WHERE ";
    if ($category) {
        if (count($category, COUNT_NORMAL) == 1) {
            $query .= "`post_category_id` = $category[0]";
        } else {
            $delq = '';
            foreach ($category as $cat) {
                $delq .= " OR " . "`post_category_id` = $cat";
            }
            $delq = substr($delq, 4);
            $query .= $delq;
        }
        echo "<br><b>category</b><br>";
    }
    if ($users) {
        if ($category) {
            $query .= " AND ";
        }
        if (count($users, COUNT_NORMAL) == 1) {
            $query .= "`post_author` = '$users[0]'";
        } else {
            $delq = '';
            foreach ($users as $user) {
                $delq .= " OR " . "`post_author` = '$user'";
            }
            $delq = substr($delq, 4);
            $query .= $delq;
        }
        echo "<br><b>users</b><br>";
    }
    if ($date) {
        if ($category || $users) {
            $query .= " AND ";
        }
        $query .= "`post_date` LIKE '%{$date}%'";
        echo "<br><b>date</b><br>";
    }

    if ($tags) {
        if ($category || $users || $date) {
            $query .= " AND ";
        }
        if (count($tags, COUNT_NORMAL) == 1) {
            $query .= "`post_tags` LIKE '%{$tags[0]}%'";
        } else {
            $delq = '';
            foreach ($tags as $tag) {
                $delq .= " OR " . "`post_tags` LIKE '%{$tag}%'";
            }
            $delq = substr($delq, 4);
            $query .= $delq;
        }
        echo "<br><b>tags</b><br>";
    }

    echo $query;
    $result = $db->query($query)->fetch_all();
}


?>