 <style>
.popupLoading{
    background: rgba(0, 0, 0, 0.6);
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    text-align: center;
    z-index: 120;
}
.popup-contentLoading{
    height: 150;
    width: 300px;
    background: white;
    display: flex;
    padding: 20px;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    text-align: center;
    border-radius: 5px;
    position: relative;
}
 </style>
 <!-- Deactivate Personnel/Farmer Service Request Prompt -->
 <div class="popupLoading" x-show="show_loading_form" style="display: none">
    <div class="popup-contentLoading">
        <div class="popup-child1">
            <div style="display: flex; justify-content: center; align-items: baseline; flex-direction: column">
                <!-- <h2 style="font-weight: bolder">SENDING MAIL...<span></span></h2> -->
                <img src="<?php echo IMAGES; ?>loading-send.gif" width="200" height="125" style="border-radius: 0.6em; padding: 0; margin: 0">
            </div>
        </div>
    </div>
</div>