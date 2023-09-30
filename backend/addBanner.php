<?php

include "./backend_inc/header.php"

?>

<div class="container-fluid">

    <form action="../controller/store_banner.php" method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">Add Banner</div>
            <div class="card-body">

            <input name="title" type="text" class="form-control my-2" placeholder="Title">
            <textarea name="detail" class="form-control my-2" placeholder="Detail"></textarea>

            <div class="row">
                <input name="cta_title" type="text" class="form-control my-2 col-lg-4" placeholder="Cta Title">
                <input name="cta_link" type="text" class="form-control my-2 col-lg-4" placeholder="Cta Link">
                <input name="video_link" type="text" class="form-control my-2 col-lg-4" placeholder="Video Link">

            </div>
            <input name="banner_img" type="file" class="form-control my-2">

            <button class="btn btn-primary mt-4">Submit banner</button>
            </div>

        </div>
    </form>

</div>
<?php

include "./backend_inc/footer.php"

?>