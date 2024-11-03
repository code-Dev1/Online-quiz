<h3 class="font-monospace mt-3">Message / Feedback</h3>
<div class="border rounded-3 my-4">
    <div class="mx-md-5">
        <table class="table table-responsive my-4">
            <thead>
                <th>#NO</th>
                <th>From</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Ali</td>
                    <td>Sender1@email.com</td>
                    <td><span class="badge bg-danger fs-6">New</span></td>
                    <td>
                        <a href="dashboard?page=viewmessage" class="btn btn-success">View</a>
                        <button onclick="pop('dashboard?page=catagroyDelete&c_id=1','message')" popovertarget="my" id="showBtn" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Ahamd</td>
                    <td>Sender2@email.com</td>
                    <td><span class="badge bg-success fs-6">Readed</span></td>
                    <td>
                        <a href="dashboard?page=viewmessage" class="btn btn-success">View</a>
                        <button onclick="pop('dashboard?page=catagroyDelete&c_id=2','message')" popovertarget="my" id="showBtn" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>