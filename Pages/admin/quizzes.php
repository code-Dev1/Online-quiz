<h3 class="font-monospace mt-3">Quizzes</h3>
<a href="dashboard?page=addquestion" class="btn btn-info mt-3">Add Question</a>
<!-- write content between this div -->
<div class="border rounded-3 my-4">
    <div class="mx-md-5">

        <table class="table table-responsive my-4">
            <thead>
                <th>#NO</th>
                <th>Question</th>
                <th>Catagory</th>
                <th>Question Type</th>
                <th>Action</th>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>What's computer ?</td>
                    <td><span class="badge bg-primary fs-6">Computer</span></td>
                    <td><span class="badge bg-success fs-6">Ture / False</span></td>
                    <td>
                        <a href="dashboard?page=viewquestion&q_id=1" class="btn btn-success">View</a>
                        <a href="dashboard?page=updatequestion&q_id=1" class="btn btn-info">Update</a>
                        <button onclick="pop('dashboard?page=quizDelete&q_id=1','question')" popovertarget="my" id="showBtn" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>What's computer ?</td>
                    <td><span class="badge bg-primary fs-6">Computer</span></td>
                    <td><span class="badge bg-warning fs-6">Multichoose</span></td>
                    <td>
                        <a href="dashboard?page=viewquestion&q_id=2" class="btn btn-success">View</a>
                        <a href="dashboard?page=updatequestion&q_id=2" class="btn btn-info">Update</a>
                        <button onclick="pop('dashboard?page=quizDelete&q_id=2','question')" popovertarget="my" id="showBtn" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="d-flex justify-content-center w-100">
    <nav aria-label="..." class="">
        <ul class="pagination">
            <li class="page-item disabled">
                <a class="page-link"><i class="fa fa-angle-left"></i></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
            </li>
        </ul>
    </nav>
</div>