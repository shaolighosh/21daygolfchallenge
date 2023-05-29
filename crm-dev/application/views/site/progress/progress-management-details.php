
<div class="stap_top__wrapper">
  <form id="msform">
    <fieldset class="custom-field">
      <div class="card das_warp">
        <div class="card-body">
          
          <!-- <a href="<?php echo site_url();?>/progress-management" class="ar_row">
          <img src="<?php echo base_url();?>public/assets/img/arrow.jpg">
             
          </a> -->
          <h2 class="efri-text">Recent Uploaded video</h2>
          
         <div class="col-lg-6">
          <div class="vi_deo">
            <a href="#" data-bs-toggle="modal" data-bs-target="#basicModal">
            <video class="shareVideo" width="500" height="300" controls>
                  <source src="<?php echo base_url();?><?php echo $progress->video_url;?>" type="video/mp4">
                  
                  Your browser does not support the video tag.
              </video>
            
            </a>


          <div class="modal fade" id="basicModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
               
                <div class="modal-body">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>

                 <iframe src="https://www.youtube.com/embed/aj9oQSR-Xmg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
               
              </div>
            </div>
          </div><!-- End Basic Modal-->





       <div class="fro_m">
          <table>
            <!-- <tr>
              <th>Recent Tier Name :</th>
              <th><b>Birdie</b></th>
            </tr> -->
            <tr>
              <td>Recent Completed Masterclass : </td>
              <td><b>Step <?php echo $progress->step_id;?></b></td>
            </tr>

               </table>

               <a href="<?php echo site_url();?>/progress-management" class="btn btn-primary w-100 action-button" type="submit">Back</a>

          </div> </div>

        </div>
        </div>
      </div>
    </fieldset>
  </form>
</div>
