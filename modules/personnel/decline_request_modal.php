<!-- Decline Farmer Service Request Prompt -->
<div class="popupDecline_request" x-show="show_decline_request_form" style="display: none">
    <div class="popup-contentDecline_request">
        <div class="popup-child1" style="margin-bottom: 5px; display: flex; flex-direction: column">
            <div>
                <h1 style="font-weight: bolder">Reason of Declination!</h1>
            </div>
            <hr>
            <div class="col-lg-12 col-md-12 col-sm-12 right">
                <div class="form-group">
                    <textarea class="form-control form-control-lg" x-ref="decline_message2" placeholder="Enter reason here..."></textarea>
                </div>
                <br>
                <!-- <input type="text" x-model="r_request_id"> -->
            </div>
        </div>
        <br>
        <button type="button" class="btn btn-success" style="width: 50%" x-ref="declinerequest_button" x-on:click="decline_request(r_request_id, r_user_id, r_request_type)">Confirm</button>
        <div class="popup-child2">
            <a id="errorClose" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="confirm_reset">X</a>
        </div>
    </div>
</div>