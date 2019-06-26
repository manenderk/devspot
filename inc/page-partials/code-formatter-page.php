<div class="col-sm-12">
	<div class="row">
		<div class="col-sm-12">
            <p>Code formatter can format your HTML, CSS, JavaScript or JSON string.<br>
            You just need to paste your code in the given box, select your desired configuration and click on format.<br>
            In the next moment you'll get your code formatted.</p>
		</div>
    </div>
    <div class="row code-format-inputs">
        <div class="col-sm-12 ">
            <div class="form-group">
                <label for="code-format-input-code">Paste your code here... (HTML, CSS, JS OR JSON)</label>
                <textarea id="code-format-input-code" class="form-control" rows="15" spellcheck="false"></textarea>
            </div>
        </div>
        <div class="col-sm-12">
            <h5>
                Code Format
            </h5>
            <div class="custom-control custom-radio mb-3 inline-element">
                <input name="input-resource-type" class="custom-control-input" id="input-code-type-html" type="radio" value="html" checked="checked">
                <label class="custom-control-label" for="input-code-type-html">
                    <span>HTML</span>
                </label>
            </div>
            <div class="custom-control custom-radio mb-3 inline-element">
                <input name="input-resource-type" class="custom-control-input" id="input-code-type-css" type="radio" value="css">
                <label class="custom-control-label" for="input-code-type-css">
                    <span>CSS</span>
                </label>
            </div>
            <div class="custom-control custom-radio mb-3 inline-element">
                <input name="input-resource-type" class="custom-control-input" id="input-code-type-js" type="radio" value="babel">
                <label class="custom-control-label" for="input-code-type-js">
                    <span>JavaScript</span>
                </label>
            </div>
            <div class="custom-control custom-radio mb-3 inline-element">
                <input name="input-resource-type" class="custom-control-input" id="input-code-type-json" type="radio" value="json">
                <label class="custom-control-label" for="input-code-type-json">
                    <span>JSON</span>
                </label>                
            </div>
        </div>
        <div class="col-sm-12">
            <h5>
                Spacing & Tabs
            </h5>
            
            <div class="custom-control custom-radio mb-3 inline-element">
                <input name="code-format-spacing" class="custom-control-input" id="code-spacing-2" type="radio" value="2" checked="checked">
                <label class="custom-control-label" for="code-spacing-2">
                    <span>2</span>
                </label>
            </div>
            <div class="custom-control custom-radio mb-3 inline-element">
                <input name="code-format-spacing" class="custom-control-input" id="code-spacing-3" type="radio" value="3">
                <label class="custom-control-label" for="code-spacing-3">
                    <span>3</span>
                </label>
            </div>
            <div class="custom-control custom-radio mb-3 inline-element">
                <input name="code-format-spacing" class="custom-control-input" id="code-spacing-4" type="radio" value="4">
                <label class="custom-control-label" for="code-spacing-4">
                    <span>4</span>
                </label>
            </div>
            <div class="custom-control custom-radio mb-3 inline-element">
                <input name="code-format-spacing" class="custom-control-input" id="code-spacing-8" type="radio" value="8">
                <label class="custom-control-label" for="code-spacing-8">
                    <span>8</span>
                </label>
            </div>
            
            <div class="custom-control custom-checkbox mb-3 inline-element">
                <input name="code-format-use-tab" class="custom-control-input" id="code-format-use-tab" type="checkbox">
                <label class="custom-control-label" for="code-format-use-tab">
                    <span>Use tabs instead</span>
                </label>
            </div>   
        </div>
        <div class="col-sm-12 text-center">
            <button id="format-code" class="btn btn-primary inline-element" type="button">Format</button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div id="formatted-code-box" class="form-group">
                <label for="formatted-code">Your formatted code...</label>
                <textarea id="formatted-code" class="form-control" rows="15"></textarea>
            </div>
        </div>
        <div class="col-sm-12 alert alert-danger" id="error-message" style="display: none">

        </div>
        <div class="col-sm-12">
            <button id="copy-formatted-code" class="btn btn-primary" type="button">Copy</button>
        </div>
	</div>
    <div class="row mt-5">
        <div class="col-sm-12">
            <h4>Need Help?</h4>
            <p>Just follow the instructions below</p>
            <ol>
                <li>Paste your code in the first input box which says <b>Paste your code here... </b>.</li>
                <li>Select your code format. If its HTML than click on <b>HTML</b>, if its Javascript then Click on <b>JavaScript</b> and so on.</li>
                <li>Select your desired spacing level.</li>
                <li>If you want tabs instead of space, or not sure which one to choose, just click on <b>Use tabs Instead.</b></li>
                <li>Now you just have to click on <b>Format</b> button</li>
            </ol>
            <p><b>For your privacy, we never store your code. All the work done at your machine only.</b></p>
        </div>
    </div>
</div>
<script src="<?php echo get_template_directory_uri() . '/build/vendor/prettier/standalone.js' ?>" async></script>
<script src="<?php echo get_template_directory_uri() . '/build/vendor/prettier/parser-html.js' ?>" async></script>
<script src="<?php echo get_template_directory_uri() . '/build/vendor/prettier/parser-postcss.js' ?>" async></script>
<script src="<?php echo get_template_directory_uri() . '/build/vendor/prettier/parser-babylon.js' ?>" async></script>