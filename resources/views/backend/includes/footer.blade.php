
<!-- Core Scripts - Include with every page -->
<script src="{{ asset('backend/home') }}/js/jquery-1.10.2.js"></script>
<script src="{{ asset('backend/home') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('backend/home') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Page-Level Plugin Scripts - Tables -->
<script src="{{ asset('backend/home') }}/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="{{ asset('backend/home') }}/js/plugins/dataTables/dataTables.bootstrap.js"></script>

<!-- Page-Level Plugin Scripts - Dashboard -->
<script src="{{ asset('backend/home') }}/js/plugins/morris/raphael-2.1.0.min.js"></script>
<script src="{{ asset('backend/home') }}/js/plugins/morris/morris.js"></script>



<!-- SB Admin Scripts - Include with every page -->
<script src="{{ asset('backend/home') }}/js/sb-admin.js"></script>


<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
</script>
<script>
    initSample();
</script>

</body>

</html>
