<?php require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = getCurrentUser();
    $text_comment = mysqli_real_escape_string($conn, $_POST['text_comment']);
    $id_post = mysqli_real_escape_string($conn, $_POST['id_post']);

    $currentDate = time();

    if ($user != null) {
        $sql = "INSERT INTO `posts_comments` (`text_comment`, `post_id`, `user_id`) VALUES ( '$text_comment', '$id_post', '{$user['id']}')";
        if (mysqli_query($conn, $sql)) {

            $html = '<div class="comment-user m-t-20 m-b-50">
        <div class="d-flex">
            <div class="d-flex"><img src="/assets/img/avatar/' . $user['avatar'] . '" width="40" alt="">
                <div class="m-l-22 m-r-40" style="width: 140px;">
                    <p class="m-b-4" style="overflow:hidden;max-height:20px;">' . $user['username'] . '</p>
                    <span>' . 'сьогодні о ' . date('H:i', $currentDate) . '</span>
                </div>
            </div>

        </div>
        <div class="m-l-62 m-t-20" style="padding:10px;background-color:#f2f2f2;border-bottom: 1px solid black;min-height: 50px;">
            <p>' . $text_comment . '</p>
        </div>
    </div>';
            echo $html;
        }
    } else {
        $html = "error";
        echo $html;
    }


    mysqli_close($conn);
}
