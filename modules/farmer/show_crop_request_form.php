<div class="popup3crops" x-show="show_request_crop_form" style="display: none">
    <div class="popup-content3crops">
        <div class="popup-child3">
            <form role="form">
                <div class="formG" style="display: flex; flex-direction: row; gap: 40px; justify-content: center">
                    <div style="width: 100%; max-width: 900px">
                    <h2 style="font-weight: bold">Request for crops</h2>
                    <hr>
                    <span>
                        <h3 style="color: red" x-text="landing_page_msg_error"></h3>
                        <h3 style="color: green" x-text="landing_page_msg_success"></h3>
                    </span>
                    <div class="row" style="text-align: left; display: flex; justify-content: center">
                        <div class="column">
                        <div class="col-xs-12 col-sm-6 col-md-12" style="margin: 10px 0 10px;">
                            <label for="cropSel" style="font-weight: bold">Crops: </label>
                            <select name="cropSel" style="width: 100%; height: auto; margin-bottom: 0; padding: 10px; border-radius: 3px; max-width: 750px; font-size: 16px" x-ref="r_crop_id" >
                                <option disabled selected hidden>Choose crop</option>
                                <template x-for="crop in crops">
                                    <option :value="crop.crop_id" x-ref="crop_type">
                                        <span x-text="crop.crop_name"></span>
                                        <span x-text="crop.is_available ? '' : ' - Unavailable'"></span>
                                    </option>
                                </template>
                            </select>
                        </div>
                        </div>
                        <div class="column">
                            <div class="col-xs-12 col-sm-6 col-md-12" style="margin: 10px 0 10px;">
                                <div class="form-group" >
                                    <label for="last_name" style="font-weight: bold">Kilo:</label>
                                        <input type="number" name="last_name" id="last_name" class="form-control input-lg" x-ref="r_crop_kilo" style="width: 100%;" placeholder="Kilo">
                                </div>
                            </div>
                        </div>
                    </div>
                        <br>
                        <div class="column" style="text-align: center">
                            <button type="button" class="btn btn-success" style="width: 50%" id="submitBdec" x-ref="request_crop_button" x-on:click="request_crop">Submit</button>
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