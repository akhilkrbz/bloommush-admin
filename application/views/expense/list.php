<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="<?php echo base_url(); ?>index.php/expense/save_expense">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New expense</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Type:</label>
                        <select class="form-control" id="type_id" name="type_id" required>
                            <option value="">Select Type</option>
                            <?php foreach ($types as $type) { ?>
                                <option value="<?php echo $type['id']; ?>"><?php echo $type['title']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Date:</label>
                        <input type="date" class="form-control" name="date" id="date" placeholder="Date of bed"
                            value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Amount:</label>
                        <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description:</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="content-wrapper">
    <!-- <div class="page-header">
        <h3 class="page-title"> Basic Tables </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
            </ol>
        </nav>
    </div> -->
    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List of expenses</h4>
                    <p class="card-description success_text"><?php echo $this->session->flashdata('success') ?></p>
                    <p class="card-description error_text"><?php echo $this->session->flashdata('error') ?></p>
                    <p class="card-description">
                        <a href="<?php echo base_url(); ?>index.php/expense/types" class="btn btn-primary">Expense
                            Types</a>
                        <a href="javascript:void()" class="btn btn-success" data-toggle="modal"
                            data-target="#exampleModal">Add Expense</a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Sl.No.</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total_exp = 0; foreach ($list as $key => $item) { $total_exp = $total_exp + $item['amount']; ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?>.</td>
                                        <td><?php echo $item['title']; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($item['date'])); ?></td>
                                        <td><?php echo $item['amount']; ?></td>
                                        <td><?php echo $item['description']; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($item['created_at'])); ?></td>
                                        <td></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Total Expense</th>
                                    <th><?php echo $total_exp; ?>/-</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>