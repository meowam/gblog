<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');
if (isset($_POST['search'])) {
    $response = "<h3>Результатів немає!</h3>";

    $q = $conn->real_escape_string($_POST['q']);

    $sql = $conn->query("SELECT * FROM `discussions` inner join discussions_categories on `discussions`.category_id=`discussions_categories`.id_category inner join users on `discussions`.author_id=`users`.id  WHERE title_discussions LIKE '%$q%'");
    if ($sql->num_rows > 0) {
        $response = "";
        while ($data = $sql->fetch_array()) {
            $response .= '<a href="/partials/forum/help-details.php?id=' . $data['id_discussions'] . '">
                    <div class="m-b-30 d-flex forum-tema">
                        <div class="forum-figure"><div></div></div>
                        <div class="forum-text m-l-23 m-r-20">
                            <h5 class="p-t-18 m-b-30 forum-title-obg"><b>' . $data['title_discussions'] . '</b></h5>
                            <div class="d-flex justify-content-between forum-info-obg">
                                <div class="d-flex h-40">
                                    <div class="d-flex"><img src="/assets/img/avatar/' . $data['avatar'] . '" width="40" height="40" alt="">
                                        <div class="m-l-12 m-r-40" style="width: 140px;">
                                            <p class="m-b-4" style="overflow:hidden;max-height:20px;">' . $data['username'] . '></p>
                                            <span>' . getDateDiscussions($data['created_discussions']) . '</span>
                                        </div>
                                    </div>
                                    <div style="min-width: 160px;" class="forum-last-update-pc">
                                        <p class="m-b-4">&nbsp; </p>
                                        <span>';
            $lastcomment = getLastCommentsOfCurrentDiscussions($data['id_discussions']);
            if ($lastcomment != null) {
                $response .= getDateLastCommentDiscussions($lastcomment['created_comment']);
            }

            $response .= '</span></div></div><div class="m-t-4 forum-last-update-mb"><span>';
            if ($lastcomment != null) {
                $response .= getDateLastCommentDiscussions($lastcomment['created_comment']);
            }

            $response .= ' </span><button>' . $data['name_category'] . '</button></div></div></div></div></a>';
        }
    }  exit($response);
  
}
