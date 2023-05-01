<div class="p-3 py-5 contact-info vis-n" id="form-settings">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-center">Налаштування акаунту</h4>
    </div>
    <form action="#" method="POST" enctype="multipart/form-data" id="profile-form">
        <div class="row mt-2">
            <div class="col-md-12">
                <label class="labels">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter username" value="<?php echo $user["username"] ?>">
            </div>
            <div class="col-md-12 col-mt">
                <label class="labels">Current password</label>
                <input type="password" class="form-control" id="password_old" name="password_old" placeholder="Enter current password" value="">
            </div>
            <div class="col-md-12 col-mt">
                <label class="labels">New password</label>
                <input type="password" class="form-control" id="password_new" name="password_new" placeholder="Enter new password" value="">
            </div>

            <div class="col-md-12 col-mt d-flex flex-column">
                <label class="labels">Change avatar </label>
                <input class="form-control" name="image" id="file-avatar" type="file">
            </div>
        </div>

        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Зберегти профіль</button></div>
    </form>
</div>