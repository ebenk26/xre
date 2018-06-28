<?php if(empty($roles) || $this->session->userdata('id') != $user_profile['overview']['id_users']){ ?>
    <div class="portlet py-30 px-20 md-grey-light ">
        <div class="portlet-body text-center">            
            <h5 class="text-center font-weight-500 font-grey-mint font-18 font-20-sm ">No Info!</h5>
            <p class="text-center  font-grey-cascade mt-10 font-weight-400 text-none mb-1 font-14">User haven't update profile info. </p>
        </div>
    </div>
<?php }?>
<?php if(!empty($roles) && $this->session->userdata('id') == $user_profile['overview']['id_users']){ ?>
    <div class="portlet py-30 px-20 md-grey-light">
        <div class="portlet-body text-center">            
            <h5 class="text-center font-weight-600 font-grey-mint text-none font-18 font-20-sm ">No Info!</h5>
            <p class="text-center  font-grey-cascade font-400 font-14 mt-10 mb-15 text-none">Edit your info in here to make your resume look great.</p>
            <a href="<?=base_url()?>student/profile" class="btn  btn-md-indigo letter-space-sm text-uppercase font-13 font-weight-600"> <i class="icon-pencil mr-5"></i> Edit my profile</a>
        </div>
    </div>
<?php }?>