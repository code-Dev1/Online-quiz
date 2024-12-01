<?php

$catagory = new Catagory;
if (isset($_POST['update']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $data = $_POST['form'];
    $file = $_FILES['file'];
    $catagory->up($data, $id, $file);
}

if (isset($_POST['sub']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_FILES['file'];
    $catagory->add($_POST['frm'], $file);
}


$rows = $catagory->index();
?>

<h3 class="font-monospace mt-3">Quiz Catagory</h3>
<button class="btn btn-info mt-3" popovertarget="inputPop" id="showBtnInput">Add Catagory</button>
<div id="inputPop" popover class="pop">
    <div class="pop-content">
        <div class="card">
            <div class="card-header d-flex justify-content-between">Add new quiz catagory.
                <button id="closeBtnInput" class="btn"><i class=" fa fa-close"></i></button>
            </div>
            <div class="card-body">
                <div class="row justify-content-around">
                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'] . '?page=quizcatagory') ?>" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text">Title</label>
                            <input name="frm[title]" type="text" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <textarea name="frm[description]" id="" class="form-control" placeholder="Description" rows="10"></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="file">
                        </div>
                        <input name="sub" type="submit" value="Add" class="btn btn-success w-100">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- write content between this div -->
<div class="border rounded-3 my-4">
    <div class="mx-md-5">
        <table class="table table-responsive my-4">
            <thead>
                <th>#NO</th>
                <th>Title</th>
                <th>Description</th>
                <th>image</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $x = 1;
                foreach ($rows as $row): ?>
                    <tr>
                        <td><?= $x++ ?></td>
                        <td><?= $row->title ?></td>
                        <td><?= $row->description ?></td>
                        <td>
                            <a href="<?= $row->image ?>" class="img-pop">
                                <img src="<?= $row->image ?>" alt="catagroy-img" style="width: 60px;">
                            </a>
                        </td>
                        <td>
                            <button onclick="catagoryUp(<?= $row->cId ?>)" class="btn btn-info" popovertarget="catagoryUp" id="showCatagoryUp">Update</button>
                            <!-- catagory update pop div start-->
                            <div id='catagoryUp' popover class='pop'>
                                <div class='pop-content'>
                                    <div class='card'>
                                        <div class='card-header d-flex justify-content-between'>update quiz catagory.
                                            <button id='closeCatagoryUp' class='btn'><i class=' fa fa-close'></i></button>
                                        </div>
                                        <div class='card-body'>
                                            <div class='row justify-content-around'>
                                                <form id="updateForm" action='<?= htmlspecialchars($_SERVER['PHP_SELF'] . '?page=quizcatagory') ?>' method="POST" enctype="multipart/form-data">
                                                    <div id="up"></div>
                                                    <input name="update" type='submit' value='update' id="submit" class='btn btn-success w-100'>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- catagory update pop div end-->
                            <button onclick='pop("dashboard?page=deleteCatagory&cid=<?= $row->cId ?>","catagory")' popovertarget="my" id="showBtn" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function catagoryUp(id) {
        $.ajax({
            type: 'POST',
            url: 'pages/admin/ajax/catagoryUp.php',
            data: {
                id: id,
            },
            success: function(response) {
                if (response == "STUDENT_RECORD_NOT_FOUND") {

                } else
                    // alert(response)
                    $('#up').html(response);
                // window.location.replace("files/dashboard.php");
            }
        });
    }
    // $(document).ready(function() {
    //     $(document).on('submit', '#updateForm', function(e) {
    //         e.preventDefault();
    //         // const da = $('#updateForm')[0]['f'];
    //         // console.log(da);
    //         $.ajax({
    //             type: "POST",
    //             url: "pages/admin/ajax/catagoryUp.php",
    //             data: new FormData(this),
    //             processData: false,
    //             contentType: false,
    //             success: (data) => {
    //                 alert(data);
    //             },
    //             error: (error) => {
    //                 console.log(error);
    //             }
    //         });
    //     });
    // });
</script>