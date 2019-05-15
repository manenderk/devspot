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
                    <h5>Overview</h5>
                    <br>
                    <div id="shortlink-dashboard-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <h6>Total Clicks</h6>
                                <div class="row">
                                    <div class="col-md-6" style="height: 100%">
                                        <canvas id="shortlink-stats-total-clicks" class="shortlink-stats-chart"></canvas>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">First</th>
                                                <th scope="col">Last</th>
                                                <th scope="col">Handle</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                </tr>
                                                <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                                </tr>
                                                <tr>
                                                <th scope="row">3</th>
                                                <td colspan="2">Larry the Bird</td>
                                                <td>@twitter</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <h6>By Clicks</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <canvas id="shortlink-stats-by-clicks" class="shortlink-stats-chart"></canvas>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <h6>By Referrer</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <canvas id="shortlink-stats-by-referer" class="shortlink-stats-chart"></canvas>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <h6>By Country</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <canvas id="shortlink-stats-by-country" class="shortlink-stats-chart"></canvas>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev text-primary" href="#shortlink-dashboard-carousel" role="button" data-slide="prev">
                            <i class="fa fa-chevron-left fa-3x"></i>
                        </a>
                        <a class="carousel-control-next text-primary" href="#shortlink-dashboard-carousel" role="button" data-slide="next">
                            <i class="fa fa-chevron-right fa-3x"></i>
                        </a>
                    </div>
                </div>
                <div class="tab-pane fade" id="shortlink-list-container" role="tabpanel" aria-labelledby="shortlink-list">
                    <h5>Your Shortlinks</h5>
                    <div id="shortlink-list-view">
                    </div>
                </div>
                <div class="tab-pane fade" id="shortlink-new-container" role="tabpanel" aria-labelledby="shortlink-new">
                    <h5>New Shortlink</h5>
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
