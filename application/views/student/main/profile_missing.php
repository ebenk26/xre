<?php if(empty($roles) || $this->session->userdata('id') != $user_profile['overview']['id_users']){ ?>
    <div class="portlet p-4 md-shadow-none bg-grey-cararra">
        <div class="portlet-body text-center">
            <i class="icon-puzzle font-grey-mint font-40-xs mb-4"></i>
            <h4 class="text-center font-weight-500 font-grey-mint">Found Nothing</h4>
            <h5 class="text-center  font-grey-cascade mt-1 text-none mb-1">The person have not updated their info yet. </h5>
        </div>
    </div>
<?php }?>
<?php if(!empty($roles) && $this->session->userdata('id') == $user_profile['overview']['id_users']){ ?>
    <div class="portlet p-4 md-shadow-none bg-grey-cararra">
        <div class="portlet-body text-center">
            <i class="icon-ghost font-grey-mint font-40-xs mb-4"></i>
            <h4 class="text-center font-weight-500 font-grey-mint">Something is missing...</h4>
            <h5 class="text-center  font-grey-cascade mt-1 text-none">Add your info here to make your resume look great.</h5>
            <a href="<?=base_url()?>student/profile" class="btn btn-outline-md-indigo px-6">My Profile</a>
        </div>
    </div>
<?php }?>