<div class="copyright">
        <p>
            &copy; 2016 ATT
        </p>
    </div>
    <div class="scroll-top">
        <a href="#" class="tip-top" title="Go Top"><i class="icon-double-angle-up"></i></a>
    </div>
</div>
        <!--============j avascript===========-->
         <script src="<?php echo base_url(); ?>theme/themeAplicaciones/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/jquery.mixitup.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/jquery.popup.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>theme/js.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/contact.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/script.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/themeChat/js/chat.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/themeChat/js/ajaxfileupload.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/themeChat/js/bootstrap-filestyle.js"></script>
   
    
    
        
        <!-- scripts js para el chat -->
       <!-- <script type="text/javascript" src="<?php echo base_url();?>theme/themeChat/js/chat.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>theme/themeChat/js/ajaxfileupload.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>theme/themeChat/js/bootstrap-filestyle.js"></script>-->
        
        <script type="text/javascript">
            var baseURL = "<?php echo base_url(); ?>";
        </script>
        <script type="text/javascript">
            /*$( function () {
             // Set the classes that TableTools uses to something suitable for Bootstrap
             $.extend( true, $.fn.DataTable.TableTools.classes, {
             "container": "btn-group",
             "buttons": {
             "normal": "btn",
             "disabled": "btn disabled"
             },
             "collection": {
             "container": "DTTT_dropdown dropdown-menu",
             "buttons": {
             "normal": "",
             "disabled": "disabled"
             }
             }
             } );
             // Have the collection use a bootstrap compatible dropdown
             $.extend( true, $.fn.DataTable.TableTools.DEFAULTS.oTags, {
             "collection": {
             "container": "ul",
             "button": "li",
             "liner": "a"
             }
             } );
             });
             */
            $(function () {
                $('#data-table').dataTable({
                    "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>", "paging": false, "ordering": false,
                    "info": false
                            /*"oTableTools": {
                             "aButtons": [
                             "copy",
                             "print",
                             {
                             "sExtends":    "collection",
                             "sButtonText": 'Save <span class="caret" />',
                             "aButtons":    [ "csv", "xls", "pdf" ]
                             }
                             ]
                             }*/
                });
            });
            $(function () {
                $('.tbl-simple').dataTable({
                    "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>"
                });
            });

            $(function () {
                $(".tbl-paper-theme").tablecloth({
                    theme: "paper"
                });
            });

            $(function () {
                $(".tbl-dark-theme").tablecloth({
                    theme: "dark"
                });
            });
            $(function () {
                $('.tbl-paper-theme,.tbl-dark-theme').dataTable({
                    "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>"
                });


            });
        </script>



</body>
</html>