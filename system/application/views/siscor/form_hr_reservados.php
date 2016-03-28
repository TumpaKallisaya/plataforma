<?php $this->load->view('postal/doc_head'); ?>

<div class="main-wrapper">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="content-widgets gray">
                <div class="widget-container">
                    <h4> + <?echo $link_new_hr;?></h4>
                </div>
                <div class="widget-head bondi-blue">
                    <h3><?php echo $title; ?></h3>
                </div>
                <form method="post" id="chooseDateForm" action="<?php echo $action; ?>" enctype="multipart/form-data">
                    <div class="widget-container">
                        <?php echo $table; ?>
                    </div>
                </form>
            </div> 
        </div> 

    </div>        
</div>

<?php $this->load->view('postal/doc_foot'); ?>