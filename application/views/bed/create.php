<div class="content-wrapper">
    <!-- <div class="page-header">
        <h3 class="page-title"> Form elements </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form elements</li>
            </ol>
        </nav>
    </div> -->
    <div class="row">
        
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Bed</h4>
                    <p class="card-description success_text"><?php echo $this->session->flashdata('success') ?></p>
                    <p class="card-description error_text"><?php echo $this->session->flashdata('error') ?></p>
                    <form class="forms-sample" method="post" action="<?php echo base_url(); ?>index.php/bed/save_bed">
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="date_of_bed" id="date_of_bed"
                                    placeholder="Date of bed" value="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Number of beds</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="no_of_beds" id="no_of_beds" min="1" placeholder="Number of beds" value="2" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" id="description" placeholder="Any description (optional)"></textarea>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>