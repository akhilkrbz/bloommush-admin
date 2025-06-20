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
                    <h4 class="card-title">List of beds</h4>
                    <!-- <p class="card-description"> Add class <code>.table-hover</code> -->
                    <p class="card-description">
                        <a href="<?php echo base_url(); ?>index.php/bed/create" class="btn btn-success">Add Bed</a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Sl.No.</th>
                                    <th>Date</th>
                                    <th>No.of Beds</th>
                                    <th>Description</th>
                                    <th>Created date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total_beds = 0; foreach($beds as $key => $bed) { $total_beds = $total_beds + $bed['no_of_beds']; ?>
                                <tr>
                                    <td><?php echo $key + 1; ?>.</td>
                                    <td><?php echo date('d-m-Y', strtotime($bed['date_of_bed'])); ?></td>
                                    <td><?php echo $bed['no_of_beds'] ?></td>
                                    <td><?php echo $bed['description'] ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($bed['created_at'])); ?></td>
                                    <td></td>
                                </tr>
                               <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Total Beds</th>
                                    <th><?php echo $total_beds; ?></th>
                                    <th></th>
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