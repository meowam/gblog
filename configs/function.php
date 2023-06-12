<?php
function getCountOfTable($sql)
{
    global $conn;
    $result = mysqli_query($conn, $sql);
    $r = mysqli_fetch_row($result);
    return $r;
}
function isAuth()
{
    $is_session = isset($_SESSION['user_id']) && ($_SESSION["user_id"]) != null;
    $is_cookie = isset($_COOKIE['user_id']) && ($_COOKIE["user_id"]) != null;

    if ($is_session || $is_cookie) {
        return true;
    } else {
        return false;
    }
}

function getCurrentUser()
{
    global $conn;
    $is_session = isset($_SESSION['user_id']) && ($_SESSION["user_id"]) != null;
    $is_cookie = isset($_COOKIE['user_id']) && ($_COOKIE["user_id"]) != null;
    if ($is_session || $is_cookie) {
        $userID = $is_session ? $_SESSION['user_id'] : $_COOKIE['user_id'];
        $sql = "SELECT * FROM users WHERE id =" . $userID;
        $result = mysqli_query($conn, $sql);
        return $result->fetch_assoc();
    } else {
        return null;
    }
}
function getNameUser($user_id)
{
    global $conn;

    $sql = "SELECT * FROM users WHERE id =" . $user_id;
    $result = mysqli_query($conn, $sql);
    return $result->fetch_assoc();
}
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getAllNews()
{
    global $conn;

    $sql = "SELECT * FROM `news`";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getAllNewsDesc()
{
    global $conn;

    $sql = "SELECT * FROM `news` ORDER BY `date` DESC";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getNewsLiked($user_id, $news_id)
{
    global $conn;

    $sql = "SELECT * FROM `news_liked` WHERE `user_id` = $user_id and `news_id` = $news_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}
function getCurrentNews($id)
{
    global $conn;

    $sql = "SELECT * FROM `news` WHERE id=" . $id;
    $result = mysqli_query($conn, $sql);
    return $result->fetch_assoc();
}
function getLastNews($countNews)
{
    global $conn;

    $sql = "SELECT * FROM `news` ORDER BY `date` DESC LIMIT " . $countNews;
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getCurrentCategoryNews($id)
{
    global $conn;

    $sql = "SELECT * FROM `news_categories` WHERE id_category=" . $id;
    $result = mysqli_query($conn, $sql);
    return $result->fetch_assoc();
}
function getCurrentNewsWithCategory($id)
{
    global $conn;

    $sql = "SELECT * FROM `news` INNER JOIN news_categories on `news`.`category_id` = `news_categories`.`id_category` WHERE `news`.id=" . $id;
    $result = mysqli_query($conn, $sql);
    return $result->fetch_assoc();
}

function getNewsByCategoryLimit($category, $min, $max)
{
    global $conn;

    $sql = "SELECT * FROM `news` WHERE `category_id` LIKE '$category' ORDER BY `date` DESC LIMIT $min,$max";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getAllNewsLimit($min, $max)
{
    global $conn;

    $sql = "SELECT * FROM `news` ORDER BY `date` DESC LIMIT $min,$max";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getWeapons()
{
    global $conn;

    $sql = "SELECT * FROM `characters_weapon`";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getElements()
{
    global $conn;

    $sql = "SELECT * FROM `characters_element`";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getHeroes()
{
    global $conn;

    $sql = "SELECT * FROM characters INNER JOIN characters_weapon ON `characters`.`weapon_id` =  `characters_weapon`.`id_weapon` INNER JOIN characters_element ON `characters`.`element_id` =  `characters_element`.`id_element` INNER JOIN characters_region ON `characters`.`region_id` =  `characters_region`.`id_region`";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getCurrentHeroes($id)
{
    global $conn;

    $sql = "SELECT * FROM characters INNER JOIN characters_weapon ON `characters`.`weapon_id` = `characters_weapon`.`id_weapon` INNER JOIN characters_element ON `characters`.`element_id` = `characters_element`.`id_element` INNER JOIN characters_region ON `characters`.`region_id` = `characters_region`.`id_region` WHERE `id_heroes` =" . $id;
    $result = mysqli_query($conn, $sql);
    return $result->fetch_assoc();
}
function getListPost()
{
    global $conn;

    $sql = "SELECT * FROM `posts` INNER JOIN users ON `posts`.author_id = `users`.id";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getCountCommentsFromCurrentPost($id)
{
    global $conn;

    $sql = "SELECT COUNT(id_post) AS count_comment FROM `posts_comments` INNER JOIN posts ON `posts_comments`.post_id = `posts`.id_post WHERE `post_id`=" . $id;
    $result = mysqli_query($conn, $sql);
    return $result->fetch_assoc();
}
function getCategoryFromCurrentPost($id)
{
    global $conn;

    $sql = "SELECT DISTINCT `categories`.name_category FROM posts_categories INNER JOIN categories ON `posts_categories`.category_id = `categories`.id_category WHERE `posts_categories`.post_id =" . $id;
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getAllPostLimit($min, $max)
{
    global $conn;

    $sql = "SELECT * FROM `posts` INNER JOIN users ON `posts`.author_id = `users`.id ORDER BY `date_post` DESC LIMIT $min,$max";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getCategoryofListPost($category, $min, $max)
{
    global $conn;

    $sql = "SELECT * FROM posts_categories inner join posts on `posts_categories`.post_id=`posts`.id_post INNER JOIN users ON `posts`.author_id = `users`.id WHERE `posts_categories`.category_id = $category ORDER BY `posts`.`date_post` DESC limit $min,$max";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getListTable($table)
{
    global $conn;

    $sql = "SELECT * FROM $table";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getCategoryDiscussions($name)
{
    global $conn;

    $sql = "SELECT * FROM `discussions_categories` WHERE `name_category` LIKE '$name'";
    $result = mysqli_query($conn, $sql);
    return $result->fetch_assoc();
}
function getAllDiscussionsLimit($min, $max)
{
    global $conn;

    $sql = "SELECT * FROM `discussions` inner join discussions_categories on `discussions`.category_id=`discussions_categories`.id_category inner join users on `discussions`.author_id=`users`.id order by `created_discussions` desc limit $min,$max";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getCurrentDiscussions($id)
{
    global $conn;

    $sql = "SELECT * FROM `discussions`inner join discussions_categories on `discussions`.category_id=`discussions_categories`.id_category inner join users on `discussions`.author_id=`users`.id WHERE `id_discussions` =".$id;
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getListCommentsOfCurrentDiscussions($id)
{
    global $conn;

    $sql = "SELECT * FROM `discussions_comments` inner join users on `discussions_comments`.`user_id`=`users`.id inner join discussions on `discussions_comments`.`discussion_id`=`discussions`.`id_discussions` WHERE `discussion_id` = $id order by `created_comment` desc";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getLastCommentsOfCurrentDiscussions($id)
{
    global $conn;

    $sql = "SELECT * FROM `discussions_comments` inner join users on `discussions_comments`.`user_id`=`users`.id inner join discussions on `discussions_comments`.`discussion_id`=`discussions`.`id_discussions` WHERE `discussion_id` = $id order by `created_comment` desc limit 0,1";
    $result = mysqli_query($conn, $sql);
    return $result->fetch_assoc();
}

function getDateDiscussions($date){
    $now = time();
    $dateTimestamp = strtotime($date);
    if (date('Y-m-d', $dateTimestamp) == date('Y-m-d', $now)) {
       return "сьогодні о " . date('H:i', $dateTimestamp);
    } elseif (date('Y-m-d', $dateTimestamp) == date('Y-m-d', strtotime('-1 day', $now))) {
        return "вчора о " . date('H:i', $dateTimestamp);
    } else {
        return date('d.m.Y', $dateTimestamp) . " о " . date('H:i', $dateTimestamp);
    }
}
function getDateLastCommentDiscussions($date){
    $now = time();
    $dateTimestamp = strtotime($date);
    if (date('Y-m-d', $dateTimestamp) == date('Y-m-d', $now)) {
       return "остання відповідь  о " . date('H:i', $dateTimestamp);
    }  else {
        return "остання відповідь " . date('d.m.Y', $dateTimestamp);
    }
}
function getAllDiscussionsByLastComment($min, $max)
{
    global $conn;

    $sql = "SELECT discussions.id_discussions, MAX(discussions_comments.created_comment) AS last_comment_date, `title_discussions`,
    `text_discussions`,`created_discussions`,categories.name_category, users.username,users.avatar FROM discussions 
    INNER JOIN discussions_comments ON discussions.id_discussions = discussions_comments.discussion_id 
    inner join categories on discussions.category_id = categories.id_category 
    inner join users on discussions.author_id = users.id 
    GROUP BY discussions.id_discussions order by last_comment_date desc limit $min, $max";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getPostSaved($user_id, $post_id)
{
    global $conn;

    $sql = "SELECT * FROM `posts_saved` WHERE `user_id` = $user_id and `post_id` = $post_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}
function getCurrentPost($id)
{
    global $conn;

    $sql = "SELECT * FROM `posts` INNER JOIN users ON `posts`.author_id = `users`.id where id_post=".$id;
    $result = mysqli_query($conn, $sql);
    return $result->fetch_assoc();
}
function getListCommentsOfCurrentPost($id)
{
    global $conn;

    $sql = "SELECT * FROM `posts_comments` inner join users on `posts_comments`.`user_id`=`users`.id inner join posts on `posts_comments`.`post_id`=`posts`.`id_post` WHERE `post_id` = $id order by `posts_comments`.`created_comment` desc";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getPostByUser($id)
{
    global $conn;

    $sql = "SELECT * FROM `posts` WHERE `author_id` LIKE '$id'";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getReadMinutes($text)
{
    $char_count = strlen($text); 
    $char_count_in_thousands = round($char_count / 2000);

    return $char_count_in_thousands;
}