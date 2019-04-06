<div class="col-sm-12">
    <div class="form-group">
        <label for="input-resource">Paste your unminified content here...</label>
        <textarea id="input-resource" class="form-control" rows="15"></textarea>
    </div>
    <div class="custom-control custom-radio mb-3 inline-element">
        <input name="input-resource-type" class="custom-control-input" id="input-resource-type-css" type="radio" value="css" checked>
        <label class="custom-control-label" for="input-resource-type-css">
            <span>CSS</span>
        </label>
    </div>
    <div class="custom-control custom-radio mb-3 inline-element">
        <input name="input-resource-type" class="custom-control-input" id="input-resource-type-js" type="radio" value="js">
        <label class="custom-control-label" for="input-resource-type-js">
            <span>JS</span>
        </label>
    </div>
    <button id="minify-resource" class="btn btn-primary inline-element" type="button">Minify</button>
    <div id="resource-output-box" class="form-group">
        <label for="output-resource">Your minfied content...</label>
        <textarea id="output-resource" class="form-control" rows="15"></textarea>
    </div>
    <button id="copy-minified-resource" class="btn btn-primary" type="button">Copy</button>
</div>