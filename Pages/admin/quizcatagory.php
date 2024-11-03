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
                    <form action="">
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="input-group mb-3">
                            <textarea name="" id="" class="form-control" placeholder="Description" rows="10"></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="title">
                        </div>
                        <input type="submit" value="Add" class="btn btn-success w-100">
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
                <tr>
                    <td>1</td>
                    <td>Islamic</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</td>
                    <td>
                        <a href="Assets/images/logo.png" class="img-pop">
                            <img src="Assets/images/logo.png" alt="catagroy-img" style="width: 80px;">
                        </a>
                    </td>
                    <td>
                        <button onclick="<?php $a = update('catagory', 1) ?>" class="btn btn-info" popovertarget="catagoryUp" id="showCatagoryUp">Update</button>
                        <button onclick="pop('dashboard?page=catagroyDelete&c_id=1','catagory')" popovertarget="my" id="showBtn" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>computer</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</td>
                    <td>
                        <a href="Assets/images/5.jpg" class="img-pop">
                            <img src="Assets/images/5.jpg" alt="catagroy-img" style="width: 80px;">
                        </a>
                    </td>
                    <td>
                        <button onclick="<?php $a = update('catagory', 1) ?>" class="btn btn-info" popovertarget="catagoryUp" id="showCatagoryUp">Update</button>
                        <button onclick="pop('dashboard?page=catagroyDelete&c_id=2','catagory')" popovertarget="my" id="showBtn" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>