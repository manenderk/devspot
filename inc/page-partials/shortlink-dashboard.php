<div class="col-sm-12">
    <ul class="nav nav-tabs" id="list-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="shortlink-dashboard" data-toggle="tab" href="#shortlink-dashboard-container" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="shortlink-list" data-toggle="tab" href="#shortlink-list-container" role="tab" aria-controls="your shortlink" aria-selected="false">Your Shortlinks</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="shortlink-new" data-toggle="tab" href="#shortlink-new-container" role="tab" aria-controls="new shortlink" aria-selected="false">New Shortlink</a>
        </li>
    </ul>
    <div id="message-container"></div>
    <div class="tab-content mt-sm" id="list-tab-content">
        <div class="tab-pane fade show active" id="shortlink-dashboard-container" role="tabpanel" aria-labelledby="shortlink-dashboard">
            <h5>Overview</h5>                    
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Total Clicks - <span id="shortlink-stats-total-clicks-number" class="font-weight-bold"></span></h3>
                            <canvas id="shortlink-stats-total-clicks-chart"></canvas>
                        </div>
                        <div class="col-md-6">
                            <h3>Today Clicks - <span id="shortlink-stats-today-clicks-number" class="font-weight-bold"></span></h3>
                            <canvas id="shortlink-stats-today-clicks-chart"></canvas>
                        </div>
                    </div>
                </div>                
                <div class="col-md-12 mt-sm">
                    <h3>Distribution by Clicks</h3>
                </div>
                <div class="col-md-6">
                    <canvas id="shortlink-stats-by-clicks-chart"></canvas>
                </div>
                <div class="col-md-6">
                    <table id="shortlink-stats-by-clicks-table" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Shortlink</th>
                                <th scope="col">Clicks</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="col-md-12 mt-sm">
                    <h3>Distribution by Referrals</h3>
                </div>
                <div class="col-md-6">
                    <canvas id="shortlink-stats-by-referer-chart"></canvas>
                </div>
                <div class="col-md-6">
                    <table id="shortlink-stats-by-referer-table" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Referers</th>
                                <th scope="col">Clicks</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="col-md-12 mt-sm">
                    <h3>Distribution by Country</h3>
                </div>
                <div class="col-md-6">
                    <canvas id="shortlink-stats-by-country-chart"></canvas>
                </div>
                <div class="col-md-6">
                    <table id="shortlink-stats-by-country-table" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Referers</th>
                                <th scope="col">Clicks</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
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
<!-- <div class="col-md-6">
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
</div> -->