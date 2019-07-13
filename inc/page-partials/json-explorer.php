<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-12">
            <p>Explore your JSON here. JSON Explorer will help you to visualize structure of your json in an easy way. If you have a very long JSON and need help in exploring its objects, then JSON Explorer can help you.</p>
        </div>
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
                            <p>
                                To see the <b>details</b> of an <b>object</b>, just click on the <b>Key</b>.
                                <br>
                                To view the <b>path</b> of an <b>object</b> in your JSON, just click on the <b>Key</b>.
                            </p>
                            <div id="tree-chart">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h3>Need Help?</h3>
            <p>If your JSON is present online, and you know the URL to access this JSON file.</p>
            <ol>
                <li>Paste or type in the URL of the JSON file in the first input box which says "Paste your URL here...".</li>
                <li>You'll see the message when a valid JSON is fetched from the given URL.</li>
                <li>Click on the "Graphic Viewer" to explore your JSON graphically.</li>
            </ol>
            <p>If you have JSON String.</p>
            <ol>
                <li>Paste your JSON string in the second input box which says "Paste your Code here...".</li>
                <li>You'll see a message saying "Valid JSON received".</li>
                <li>Click on the "Graphic Viewer" to explore your JSON graphically.</li>
            </ol>
        </div>
    </div>
</div>