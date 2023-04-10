<div class="popup4services" x-show="show_request_service_form" style="display: none">
    <div class="popup-content4services">
        <div class="popup-child3">
        <form role="form">
                <div class="formG" style="display: flex; flex-direction: row; gap: 40px; justify-content: center">
                    <div style="width: 100%; max-width: 600px">
                    <h2 style="font-weight: bold">Request for service</h2>
                    <hr>
                    <span>
                        <h3 style="color: red" x-text="landing_page_msg_error"></h3>
                        <h3 style="color: green" x-text="landing_page_msg_success"></h3>
                    </span>
                    <div class="row" style="text-align: left; display: flex; justify-content: center">
                        <div class="column">
                        <div class="col-xs-12 col-sm-6 col-md-12" style="margin: 10px 0 10px;">
                            <label for="selectD" style="font-weight: bold">Services:</label>
                            <select class="selectD" style="width: 100%; height: auto; margin-bottom: 0; padding: 10px 0 10px 0; border-radius: 3px; max-width: 750px; font-size: 16px" x-ref="service_id">
                                <option disabled selected hidden>Choose services</option>
                                <template x-for="service in services">
                                    <option :value="service.service_id" x-ref="service_type">
                                        <span x-text="service.service_name"></span>
                                        <span x-text="service.is_available ? '' : ' - Unavailable'"></span>
                                    </option>
                                </template>
                            </select>
                        </div>
                        </div>
                        <div class="column">
                            <div class="col-xs-12 col-sm-6 col-md-12" style="margin: 10px 0 10px;">
                                <div class="form-group" >
                                    <label for="selectD" style="font-weight: bold">Purpose of Request:</label>
                                        <textarea name="selectD" id="selectD" cols="60" rows="5" style="display: block" x-ref="service_remarks"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                        <br>
                        <div class="column" style="text-align: center">
                            <button type="button" class="btn btn-success" style="width: 50%" id="submitBdec" x-ref="request_service_button" x-on:click="request_service">Submit</button>
                        </div>
                        <hr>
                    </div>
                </div>
            </form>
        </div>
        <div class="popup-child2">
            <button type="button" id="closeDecB" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="exit_services">X</button>
        </div>
    </div>
</div>