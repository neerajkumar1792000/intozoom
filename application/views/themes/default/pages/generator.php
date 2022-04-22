<?php

$this->theme->view('includes/header');

$this->theme->view('components/tools'); 

?>

<section x-data="window.bitflan.components.generator_component()" x-init="init(<?php echo alpinify($js_errors) ?>)" @keyup.enter="submit()">
    <div class="searchSection mainPadding">
        <div class="searchInput">
            <input x-model="domain" type="text" placeholder="<?php echo lang('enter_keyword') ?>" x-bind:class="error && 'border border-danger'" class="inputFiled form-control">
            <div x-show="domain.length" x-on:click="domain = ''" x-cloak class="searchCross">
                <svg xmlns="http://www.w3.org/2000/svg" width="30.047" height="30.047" viewBox="0 0 30.047 30.047"><path d="M19.349,8.726H12.9a.379.379,0,0,1-.379-.379V1.9a1.9,1.9,0,0,0-3.794,0v6.45a.379.379,0,0,1-.379.379H1.9a1.9,1.9,0,0,0,0,3.794h6.45a.379.379,0,0,1,.379.379v6.45a1.9,1.9,0,0,0,3.794,0V12.9a.379.379,0,0,1,.379-.379h6.45a1.9,1.9,0,0,0,0-3.794Zm0,0" transform="translate(15.023) rotate(45)" fill="#b8b8b8"/></svg></div>
        </div>
        <button x-on:click="submit()" class="btn searchButton" type="submit" value="submit">
            <div class="blockGrad"></div>
            <span x-show="!sending"><?php echo lang('generate_domains') ?></span>
            <span x-cloak x-show="sending"><img src="<?php echo $this->theme->url('assets/images/search_loader.svg') ?>" /></span>
        </button>
    </div>

    <div class="domain-options mainPadding">
        <div class="domain-ckbx">
            <div class="custom-control custom-checkbox">
                <input x-model="selections" value="com" name="customTlds" type="checkbox" class="custom-control-input" id="customCheck1" checked>
                <label class="custom-control-label" for="customCheck1">.com</label>
            </div>
        </div>
        <div class="domain-ckbx">
            <div class="custom-control custom-checkbox">
                <input x-model="selections" value="net" name="customTlds" type="checkbox" class="custom-control-input" id="customCheck2" checked>
                <label class="custom-control-label" for="customCheck2">.net</label>
            </div>
        </div>
        <div class="domain-ckbx">
            <div class="custom-control custom-checkbox">
                <input x-model="selections" value="org" name="customTlds" type="checkbox" class="custom-control-input" id="customCheck3" checked>
                <label class="custom-control-label" for="customCheck3">.org</label>
            </div>
        </div>
        <div class="domain-ckbx">
            <div class="custom-control custom-checkbox">
                <input x-model="selections" value="info" name="customTlds" type="checkbox" class="custom-control-input" id="customCheck4" checked>
                <label class="custom-control-label" for="customCheck4">.info</label>
            </div>
        </div>
        <div class="domain-ckbx">
            <div class="custom-control custom-checkbox">
                <input x-model="selections" value="mobi" name="customTlds" type="checkbox" class="custom-control-input" id="customCheck5" checked>
                <label class="custom-control-label" for="customCheck5">.mobi</label>
            </div>
        </div>
        <div class="domain-ckbx">
            <div class="custom-control custom-checkbox">
                <input x-model="selections" value="biz" name="customTlds" type="checkbox" class="custom-control-input" id="customCheck6" checked>
                <label class="custom-control-label" for="customCheck6">.biz</label>
            </div>
        </div>
        <div class="domain-ckbx">
            <div class="custom-control custom-checkbox">
                <input x-model="selections" value="xyz" name="customTlds" type="checkbox" class="custom-control-input" id="customCheck7" checked>
                <label class="custom-control-label" for="customCheck7">.xyz</label>
            </div>
        </div>
    </div>

    <template x-if="error_message.length">
        <div class="mt-3 mainPadding" x-transition >
            <div class="alert alert-danger" x-text="error_message"></div>
        </div>
    </template>
    
	<?php $this->load->view('core/header_ad_spot'); ?>

    <template x-if="data" x-transition>
        <div class="result-content mainPadding" >
            <div class="row">
                <div class="col-lg-6">
                    <div class="result-content-inner">
						<div class="clearfix result-main-title">
							<div class="left-title-area plus"><span><svg xmlns="http://www.w3.org/2000/svg" width="17.812" height="17.812" viewBox="0 0 51.761 51.761"><g transform="translate(0)"><path d="M236.8,35.566A2.433,2.433,0,1,0,234.367,38,2.436,2.436,0,0,0,236.8,35.566Zm-3.349,0a.917.917,0,1,1,.917.917A.918.918,0,0,1,233.45,35.566Z" transform="translate(-208.486 -29.783)"></path><path d="M45.978,20.1a5.77,5.77,0,0,0-1.927.329.758.758,0,0,0,.505,1.43,4.268,4.268,0,1,1-2.086,1.6.758.758,0,1,0-1.246-.864,5.781,5.781,0,0,0-.492.86H38.124a12.412,12.412,0,0,0-1.869-4.5L38.1,17.1a5.783,5.783,0,1,0-3.441-3.441l-1.85,1.85a12.414,12.414,0,0,0-4.5-1.869v-2.61a5.783,5.783,0,1,0-4.866,0v2.61a12.414,12.414,0,0,0-4.5,1.869l-1.85-1.85a5.782,5.782,0,0,0-8.128-7.1.758.758,0,1,0,.708,1.341,4.266,4.266,0,1,1-1.823,1.86A.758.758,0,1,0,6.5,9.074,5.784,5.784,0,0,0,13.657,17.1l1.85,1.85a12.413,12.413,0,0,0-1.869,4.5h-2.61a5.783,5.783,0,1,0,0,4.866h2.61a12.414,12.414,0,0,0,1.869,4.5l-1.85,1.85A5.783,5.783,0,1,0,17.1,38.1l1.85-1.85a12.414,12.414,0,0,0,4.5,1.869v2.61a5.783,5.783,0,1,0,4.866,0v-2.61a12.414,12.414,0,0,0,4.5-1.869l1.85,1.85A5.783,5.783,0,1,0,38.1,34.663l-1.85-1.85a12.413,12.413,0,0,0,1.869-4.5h2.61A5.782,5.782,0,1,0,45.978,20.1Zm-16.3,16.071a11.619,11.619,0,0,0,1.6-2.981,14.511,14.511,0,0,1,2.061.721A10.984,10.984,0,0,1,29.676,36.169Zm-7.59-20.576a11.621,11.621,0,0,0-1.6,2.981,14.509,14.509,0,0,1-2.061-.721A10.985,10.985,0,0,1,22.085,15.592Zm10.4,9.53a21.765,21.765,0,0,0-.739-5.105,15.448,15.448,0,0,0,2.679-1,10.912,10.912,0,0,1,2.392,6.1H32.488ZM26.639,15.049a5.454,5.454,0,0,1,2.709,2.88c.156.312.3.641.435.983a21.466,21.466,0,0,1-3.144.334Zm-1.516,4.2a21.467,21.467,0,0,1-3.144-.334c.135-.342.279-.671.435-.983a5.454,5.454,0,0,1,2.709-2.88Zm0,1.518v4.358H20.791a20.19,20.19,0,0,1,.7-4.759,22.9,22.9,0,0,0,3.63.4Zm0,5.874V31a22.9,22.9,0,0,0-3.63.4,20.185,20.185,0,0,1-.7-4.759Zm0,5.876v4.2a5.454,5.454,0,0,1-2.709-2.88c-.156-.312-.3-.641-.435-.983A21.452,21.452,0,0,1,25.122,32.515Zm1.516,0a21.469,21.469,0,0,1,3.144.334c-.135.342-.279.671-.435.983a5.454,5.454,0,0,1-2.709,2.88Zm0-1.518V26.639H30.97a20.191,20.191,0,0,1-.7,4.759A22.887,22.887,0,0,0,26.639,31Zm0-5.874V20.764a22.9,22.9,0,0,0,3.63-.4,20.185,20.185,0,0,1,.7,4.759Zm6.7-7.27a14.509,14.509,0,0,1-2.061.721,11.617,11.617,0,0,0-1.6-2.981,10.983,10.983,0,0,1,3.666,2.26ZM17.333,19.019a15.437,15.437,0,0,0,2.679,1,21.76,21.76,0,0,0-.739,5.105H14.942A10.911,10.911,0,0,1,17.333,19.019Zm1.94,7.619a21.759,21.759,0,0,0,.739,5.105,15.447,15.447,0,0,0-2.679,1,10.912,10.912,0,0,1-2.392-6.1Zm-.854,7.27a14.514,14.514,0,0,1,2.061-.721,11.615,11.615,0,0,0,1.606,2.982,10.985,10.985,0,0,1-3.667-2.261Zm16.008-1.167a15.441,15.441,0,0,0-2.678-1,21.768,21.768,0,0,0,.738-5.106h4.331A10.912,10.912,0,0,1,34.428,32.742ZM37.075,8.653a4.266,4.266,0,1,1,0,6.033A4.253,4.253,0,0,1,37.075,8.653Zm-1.669,6.406a5.759,5.759,0,0,0,1.3,1.3L35.327,17.73a12.593,12.593,0,0,0-1.3-1.3ZM21.614,5.783a4.266,4.266,0,1,1,4.266,4.266,4.271,4.271,0,0,1-4.266-4.266Zm3.35,5.709a5.759,5.759,0,0,0,1.833,0v1.94q-.454-.033-.917-.034t-.917.034Zm-9.906,4.862a5.759,5.759,0,0,0,1.3-1.3l1.376,1.376a12.6,12.6,0,0,0-1.3,1.3ZM5.783,30.147a4.266,4.266,0,1,1,4.266-4.266,4.271,4.271,0,0,1-4.266,4.266Zm5.709-3.35a5.759,5.759,0,0,0,0-1.833h1.94q-.033.454-.034.917t.034.917Zm3.194,16.311a4.264,4.264,0,1,1,0-6.033A4.271,4.271,0,0,1,14.686,43.108ZM16.354,36.7a5.76,5.76,0,0,0-1.3-1.3l1.376-1.376a12.583,12.583,0,0,0,1.3,1.3Zm13.792,9.275a4.266,4.266,0,1,1-4.266-4.266A4.271,4.271,0,0,1,30.147,45.978ZM26.8,40.269a5.759,5.759,0,0,0-1.833,0v-1.94q.454.033.917.034t.917-.034Zm13.295-4.441a4.264,4.264,0,1,1-3.017,1.248A4.252,4.252,0,0,1,40.092,35.828ZM36.7,35.407a5.76,5.76,0,0,0-1.3,1.3l-1.376-1.376a12.6,12.6,0,0,0,1.3-1.3Zm1.626-8.61q.033-.454.034-.917t-.034-.917h1.94a5.783,5.783,0,0,0,0,1.833Z"></path><path d="M435.6,234.367a2.433,2.433,0,1,0-2.433,2.433A2.436,2.436,0,0,0,435.6,234.367Zm-3.35,0a.917.917,0,1,1,.917.917A.918.918,0,0,1,432.249,234.367Z" transform="translate(-387.188 -208.486)"></path><path d="M35.566,231.934A2.433,2.433,0,1,0,38,234.367,2.436,2.436,0,0,0,35.566,231.934Zm0,3.35a.917.917,0,1,1,.917-.917A.918.918,0,0,1,35.566,235.284Z" transform="translate(-29.783 -208.486)"></path><path d="M231.934,433.166a2.433,2.433,0,1,0,2.433-2.433A2.436,2.436,0,0,0,231.934,433.166Zm3.35,0a.917.917,0,1,1-.917-.917A.918.918,0,0,1,235.284,433.166Z" transform="translate(-208.486 -387.188)"></path><path d="M374.949,377.383a2.433,2.433,0,1,0-1.72-.713A2.417,2.417,0,0,0,374.949,377.383ZM374.3,374.3a.917.917,0,1,1,0,1.3A.913.913,0,0,1,374.3,374.3Z" transform="translate(-334.857 -334.858)"></path><path d="M95.514,95.514a2.436,2.436,0,1,0-1.72.711A2.436,2.436,0,0,0,95.514,95.514Zm-2.368-2.368a.917.917,0,1,1,0,1.3A.913.913,0,0,1,93.145,93.145Z" transform="translate(-82.124 -82.124)"></path><path d="M374.95,96.225a2.432,2.432,0,1,0-1.72-.711A2.426,2.426,0,0,0,374.95,96.225Zm-.648-3.08a.917.917,0,1,1,0,1.3A.914.914,0,0,1,374.3,93.145Z" transform="translate(-334.858 -82.124)"></path><path d="M92.073,373.229a2.433,2.433,0,1,0,3.441,0A2.418,2.418,0,0,0,92.073,373.229Zm2.369,2.368a.916.916,0,1,1,0-1.3A.917.917,0,0,1,94.441,375.6Z" transform="translate(-82.124 -334.858)"></path></g></svg></span>Great Alternatives</div>
						</div>
                        <div class="extension-area">
                            <ul id="tlds_result_column1">
                                <template x-for="domain in data[0]">
                                    <li>
                                        <a :href="domain.affiliate" target="_blank" class="right-by-wo-btn green-by-btn"><span><?php echo lang('buy_button') ?></span></a>
                                        <div id="price_com" class="right-price-offer" x-text="domain.price"></div>
                                        <div id="keyword_com" class="left-extension" x-text="domain.name"></div>
                                        <div class="clearfix"></div>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="result-content-inner">
                        <div class="extension-area">
                            <div class="clearfix result-main-title">
                                <div class="left-title-area plus"><span><svg xmlns="http://www.w3.org/2000/svg" width="17.812" height="17.812" viewBox="0 0 51.761 51.761"><g transform="translate(0)"><path d="M236.8,35.566A2.433,2.433,0,1,0,234.367,38,2.436,2.436,0,0,0,236.8,35.566Zm-3.349,0a.917.917,0,1,1,.917.917A.918.918,0,0,1,233.45,35.566Z" transform="translate(-208.486 -29.783)"></path><path d="M45.978,20.1a5.77,5.77,0,0,0-1.927.329.758.758,0,0,0,.505,1.43,4.268,4.268,0,1,1-2.086,1.6.758.758,0,1,0-1.246-.864,5.781,5.781,0,0,0-.492.86H38.124a12.412,12.412,0,0,0-1.869-4.5L38.1,17.1a5.783,5.783,0,1,0-3.441-3.441l-1.85,1.85a12.414,12.414,0,0,0-4.5-1.869v-2.61a5.783,5.783,0,1,0-4.866,0v2.61a12.414,12.414,0,0,0-4.5,1.869l-1.85-1.85a5.782,5.782,0,0,0-8.128-7.1.758.758,0,1,0,.708,1.341,4.266,4.266,0,1,1-1.823,1.86A.758.758,0,1,0,6.5,9.074,5.784,5.784,0,0,0,13.657,17.1l1.85,1.85a12.413,12.413,0,0,0-1.869,4.5h-2.61a5.783,5.783,0,1,0,0,4.866h2.61a12.414,12.414,0,0,0,1.869,4.5l-1.85,1.85A5.783,5.783,0,1,0,17.1,38.1l1.85-1.85a12.414,12.414,0,0,0,4.5,1.869v2.61a5.783,5.783,0,1,0,4.866,0v-2.61a12.414,12.414,0,0,0,4.5-1.869l1.85,1.85A5.783,5.783,0,1,0,38.1,34.663l-1.85-1.85a12.413,12.413,0,0,0,1.869-4.5h2.61A5.782,5.782,0,1,0,45.978,20.1Zm-16.3,16.071a11.619,11.619,0,0,0,1.6-2.981,14.511,14.511,0,0,1,2.061.721A10.984,10.984,0,0,1,29.676,36.169Zm-7.59-20.576a11.621,11.621,0,0,0-1.6,2.981,14.509,14.509,0,0,1-2.061-.721A10.985,10.985,0,0,1,22.085,15.592Zm10.4,9.53a21.765,21.765,0,0,0-.739-5.105,15.448,15.448,0,0,0,2.679-1,10.912,10.912,0,0,1,2.392,6.1H32.488ZM26.639,15.049a5.454,5.454,0,0,1,2.709,2.88c.156.312.3.641.435.983a21.466,21.466,0,0,1-3.144.334Zm-1.516,4.2a21.467,21.467,0,0,1-3.144-.334c.135-.342.279-.671.435-.983a5.454,5.454,0,0,1,2.709-2.88Zm0,1.518v4.358H20.791a20.19,20.19,0,0,1,.7-4.759,22.9,22.9,0,0,0,3.63.4Zm0,5.874V31a22.9,22.9,0,0,0-3.63.4,20.185,20.185,0,0,1-.7-4.759Zm0,5.876v4.2a5.454,5.454,0,0,1-2.709-2.88c-.156-.312-.3-.641-.435-.983A21.452,21.452,0,0,1,25.122,32.515Zm1.516,0a21.469,21.469,0,0,1,3.144.334c-.135.342-.279.671-.435.983a5.454,5.454,0,0,1-2.709,2.88Zm0-1.518V26.639H30.97a20.191,20.191,0,0,1-.7,4.759A22.887,22.887,0,0,0,26.639,31Zm0-5.874V20.764a22.9,22.9,0,0,0,3.63-.4,20.185,20.185,0,0,1,.7,4.759Zm6.7-7.27a14.509,14.509,0,0,1-2.061.721,11.617,11.617,0,0,0-1.6-2.981,10.983,10.983,0,0,1,3.666,2.26ZM17.333,19.019a15.437,15.437,0,0,0,2.679,1,21.76,21.76,0,0,0-.739,5.105H14.942A10.911,10.911,0,0,1,17.333,19.019Zm1.94,7.619a21.759,21.759,0,0,0,.739,5.105,15.447,15.447,0,0,0-2.679,1,10.912,10.912,0,0,1-2.392-6.1Zm-.854,7.27a14.514,14.514,0,0,1,2.061-.721,11.615,11.615,0,0,0,1.606,2.982,10.985,10.985,0,0,1-3.667-2.261Zm16.008-1.167a15.441,15.441,0,0,0-2.678-1,21.768,21.768,0,0,0,.738-5.106h4.331A10.912,10.912,0,0,1,34.428,32.742ZM37.075,8.653a4.266,4.266,0,1,1,0,6.033A4.253,4.253,0,0,1,37.075,8.653Zm-1.669,6.406a5.759,5.759,0,0,0,1.3,1.3L35.327,17.73a12.593,12.593,0,0,0-1.3-1.3ZM21.614,5.783a4.266,4.266,0,1,1,4.266,4.266,4.271,4.271,0,0,1-4.266-4.266Zm3.35,5.709a5.759,5.759,0,0,0,1.833,0v1.94q-.454-.033-.917-.034t-.917.034Zm-9.906,4.862a5.759,5.759,0,0,0,1.3-1.3l1.376,1.376a12.6,12.6,0,0,0-1.3,1.3ZM5.783,30.147a4.266,4.266,0,1,1,4.266-4.266,4.271,4.271,0,0,1-4.266,4.266Zm5.709-3.35a5.759,5.759,0,0,0,0-1.833h1.94q-.033.454-.034.917t.034.917Zm3.194,16.311a4.264,4.264,0,1,1,0-6.033A4.271,4.271,0,0,1,14.686,43.108ZM16.354,36.7a5.76,5.76,0,0,0-1.3-1.3l1.376-1.376a12.583,12.583,0,0,0,1.3,1.3Zm13.792,9.275a4.266,4.266,0,1,1-4.266-4.266A4.271,4.271,0,0,1,30.147,45.978ZM26.8,40.269a5.759,5.759,0,0,0-1.833,0v-1.94q.454.033.917.034t.917-.034Zm13.295-4.441a4.264,4.264,0,1,1-3.017,1.248A4.252,4.252,0,0,1,40.092,35.828ZM36.7,35.407a5.76,5.76,0,0,0-1.3,1.3l-1.376-1.376a12.6,12.6,0,0,0,1.3-1.3Zm1.626-8.61q.033-.454.034-.917t-.034-.917h1.94a5.783,5.783,0,0,0,0,1.833Z"></path><path d="M435.6,234.367a2.433,2.433,0,1,0-2.433,2.433A2.436,2.436,0,0,0,435.6,234.367Zm-3.35,0a.917.917,0,1,1,.917.917A.918.918,0,0,1,432.249,234.367Z" transform="translate(-387.188 -208.486)"></path><path d="M35.566,231.934A2.433,2.433,0,1,0,38,234.367,2.436,2.436,0,0,0,35.566,231.934Zm0,3.35a.917.917,0,1,1,.917-.917A.918.918,0,0,1,35.566,235.284Z" transform="translate(-29.783 -208.486)"></path><path d="M231.934,433.166a2.433,2.433,0,1,0,2.433-2.433A2.436,2.436,0,0,0,231.934,433.166Zm3.35,0a.917.917,0,1,1-.917-.917A.918.918,0,0,1,235.284,433.166Z" transform="translate(-208.486 -387.188)"></path><path d="M374.949,377.383a2.433,2.433,0,1,0-1.72-.713A2.417,2.417,0,0,0,374.949,377.383ZM374.3,374.3a.917.917,0,1,1,0,1.3A.913.913,0,0,1,374.3,374.3Z" transform="translate(-334.857 -334.858)"></path><path d="M95.514,95.514a2.436,2.436,0,1,0-1.72.711A2.436,2.436,0,0,0,95.514,95.514Zm-2.368-2.368a.917.917,0,1,1,0,1.3A.913.913,0,0,1,93.145,93.145Z" transform="translate(-82.124 -82.124)"></path><path d="M374.95,96.225a2.432,2.432,0,1,0-1.72-.711A2.426,2.426,0,0,0,374.95,96.225Zm-.648-3.08a.917.917,0,1,1,0,1.3A.914.914,0,0,1,374.3,93.145Z" transform="translate(-334.858 -82.124)"></path><path d="M92.073,373.229a2.433,2.433,0,1,0,3.441,0A2.418,2.418,0,0,0,92.073,373.229Zm2.369,2.368a.916.916,0,1,1,0-1.3A.917.917,0,0,1,94.441,375.6Z" transform="translate(-82.124 -334.858)"></path></g></svg></span>Great Alternatives</div>
                            </div>
                            <ul id="tlds_result_column1">
                                <template x-for="domain in data[1]">
                                    <li>
                                        <a :href="domain.affiliate" target="_blank" class="right-by-wo-btn green-by-btn"><span><?php echo lang('buy_button') ?></span></a>
                                        <div id="price_com" class="right-price-offer" x-text="domain.price"></div>
                                        <div id="keyword_com" class="left-extension" x-text="domain.name"></div>
                                        <div class="clearfix"></div>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
<section>

<?php 

$this->theme->view('components/features');
$this->load->view('core/middle_ad_spot');
$this->theme->view('components/faq');
$this->theme->view('includes/footer');