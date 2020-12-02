<div class="modal fade" id="img<?php echo $bedno; ?>" >
    <div class="modal-dialog modal-lg">
        <!-- <div class="modal-dialog-full-width modal-dialog momodel modal-fluid"> -->

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title head-show-modal-bed" id="staticBackdropLabel">
                <?php echo  $bedno . " <span class='css-room'>(" . $ward_vip . ")</span>"; ?>
            </h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
            </div>
            <div class="modal-body">

                <div class="modal-body">
                    <center>
                        <img src="./img_room/<?php echo $img_room; ?>" width="800" height="600">
                    </center>
                </div>
                </div>
                <div class="modal-footer">

                    <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                    <button type="button" class="btn btn-secondary btn-block btn-cloce" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>