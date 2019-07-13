<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-12" id="messages">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#json-code-tab">JSON Code</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#graphic-viewer-tab">Graphic Viewer</a>
                </li>
            </ul>
            <div class="json-explorer tab-content">
                <div class="tab-pane container active" id="json-code-tab">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="json-url">Load JSON from Url:</label>
                                <input type="text" class="form-control form-control-alternative" id="json-url" placeholder="Paste your URL here...">
                            </div>
                            <h4>Or</h4>
                            <div class="form-group">
                                <label for="json-code">JSON Code</label>
                                <textarea class="form-control form-control-alternative" id="json-code" rows="15" placeholder="Paste your code here..."></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 text-right">
                            
                                <button class="btn btn-primary" id="clear-fields">
                                    Clear Fields
                                </button>
                            
                        </div>
                    </div>
                </div>
                <div class="tab-pane container fade" id="graphic-viewer-tab">
                    <div class="row">
                        <div class="col-sm-12" id="node">
                            <h4>Path</h4>
                            <p id="json-tree-node-path"></p>
                            <hr>
                        </div>
                        <div class="col-sm-12" id="tree">
                            <h4>Tree</h4>
                            <div id="tree-chart">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>