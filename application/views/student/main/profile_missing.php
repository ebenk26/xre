<?php if(empty($roles) || $this->session->userdata('id') != $user_profile['overview']['id_users']){ ?>
    <div class="portlet p-50 md-grey-lighten-5">
        <div class="portlet-body text-center">
            <i class="icon-puzzle font-grey-mint font-40 mb-25"></i>
            <h5 class="text-center font-weight-500 font-grey-mint">Found Nothing</h5>
            <h6 class="text-center font-16 font-grey-cascade mt-10 font-weight-400 text-none mb-1">User haven't update profile info. </h6>
        </div>
    </div>
<?php }?>
<?php if(!empty($roles) && $this->session->userdata('id') == $user_profile['overview']['id_users']){ ?>
    <div class="portlet p-50 md-grey-lighten-5">
        <div class="portlet-body text-center">
            <i class="icon-ghost font-grey-mint font-40 mb-25"></i>
            <h5 class="text-center font-weight-500 font-grey-mint text-none">This section is empty</h5>
            <h6 class="text-center  font-grey-cascade font-16 mt-10 mb-15 text-none">Add info here to make your resume look great.</h6>
            <a href="<?=base_url()?>student/profile" class="btn btn-outline btn-md-indigo rounded-4"> Edit My Profile</a>
        </div>
    </div>
<?php }?>