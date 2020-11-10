<!-- jQuery 3 -->
<script src="{{ asset('public/assets/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->

<script src="{{ asset('public/assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{ asset('public/assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('public/assets/admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/assets/admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/assets/admin/dist/js/demo.js')}}"></script>
{{--<script src="../../plugins/select2/select2.full.min.js"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
{{--<script src="https://code.highcharts.com/highcharts.js"></script>--}}
{{--<script src="https://code.highcharts.com/modules/exporting.js"></script>--}}
{{--<script src="https://code.highcharts.com/modules/export-data.js"></script>--}}
{{--<script src="https://code.highcharts.com/modules/data.js"></script>--}}
{{--<script src="https://code.highcharts.com/modules/exporting.js"></script>--}}
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree();
        $('.count-increase').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 3000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    })
</script>
