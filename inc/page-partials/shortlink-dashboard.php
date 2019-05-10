<div class="col-sm-12">
    <div class="row">
        <div class="col-lg-3 col-md-4">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="shortlink-dashboard" data-toggle="list" href="#shortlink-dashboard-container" role="tab" aria-controls="overview">Overview</a>
                <a class="list-group-item list-group-item-action" id="shortlink-list" data-toggle="list" href="#shortlink-list-container" role="tab" aria-controls="your shortlink">Your Shortlinks</a>
                <a class="list-group-item list-group-item-action" id="shortlink-new" data-toggle="list" href="#shortlink-new-container" role="tab" aria-controls="new shortlink">New Shortlink</a>                                
            </div>       
            <br><br>     
        </div>
        <div class="col-lg-9 col-md-col-8">
            <div id="message-container"></div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="shortlink-dashboard-container" role="tabpanel" aria-labelledby="shortlink-dashboard">
                    <h2>Overview</h2>
                </div>
                <div class="tab-pane fade" id="shortlink-list-container" role="tabpanel" aria-labelledby="shortlink-list">
                    <h2>Your Shortlinks</h2>
                </div>
                <div class="tab-pane fade" id="shortlink-new-container" role="tabpanel" aria-labelledby="shortlink-new">
                    <h2>New Shortlink</h2>
                    <form id="add-shortlink-form">
                        <div class="form-group">
                            <input type="url" placeholder="Paste your link here..." class="form-control" name="redirectLink" required>
                        </div>
                        <div class="text-right">
                            <input type="submit" class="btn btn-primary" value="Create Shortlink">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
