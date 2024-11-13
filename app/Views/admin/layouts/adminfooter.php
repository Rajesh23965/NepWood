</div>
<footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="https://ithome.pvt.ltd">IT HOME PVT.LTD</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.js"></script>
<script src="https://ilikenwf.github.io/jquery.mjs.nestedSortable.js"></script>
<script src="<?php echo base_url().'assets/admin/js/tinyMce.js'?>"
    referrerpolicy="origin"></script>
<script>
var changesMade = false;
tinymce.init({
    selector: 'textarea',
    plugins: 'image  fullscreen code anchor autolink charmap codesample link lists media searchreplace table visualblocks textblocks insertdatetime',
    toolbar: ' undo redo code | blocks fontfamily fontsize | bold italic underline | link media table | align lineheight | numlist bullist indent outdent |  charmap | removeformat',
    extended_valid_elements: 'img[src|alt|width|height|style]',
    cleanup: false,
    convert_urls: false,
    relative_urls: false,
    remove_script_host: false,
    image_dimensions: true,
    referrer_policy: 'origin',
});
// tinyMCE.activeEditor.ui.registry.getAll().menuItems
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('assets/admin/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url('assets/admin/js/config.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/js/adminlte.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/js/mediaupload.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/js/menu.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/js/custom.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/js/asidebar.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/js/nested.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/js/nepali_date.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/js/combobox.js') ?>"></script>

<script type="text/javascript">
window.onload = function() {
    $('.datepicker').nepaliDatePicker();
    $('.postdatepicker').nepaliDatePicker();

};
</script>

<script>
$(document).ready(function() {
    var changesMade = false;

    function handleFormSubmission() {
        if (changesMade) {
            var confirmDiscard = confirm("Changes have been made. Are you sure you want to save them?");
            if (!confirmDiscard) {
                return false;
            }
        }
        return true;
    }

    $(document).on('submit', 'form', function() {
        changesMade = false;
    });


    $(window).on('beforeunload', function() {
        if (changesMade) {

            return "Changes have been made. Are you sure you want to leave this page?";
        }
    });

    $('textarea').on('input', function() {
        changesMade = true;
    });

    $('input').on('input', function() {
        changesMade = true;
    });
});
</script>

</body>


</html>