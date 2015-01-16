<!DOCTYPE html>
<html lang="en">
    <head>
|        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Administrador winbits - Home</title>
    
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="assets/Content/bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="assets/Content/bootstrap/css/bootstrap-responsive.min.css" />
             <!-- jQuery UI theme-->
            <link rel="stylesheet" href="assets/Content/lib/jquery-ui/css/Aristo/Aristo.css" />
        <!-- gebo blue theme-->
            <link rel="stylesheet" href="assets/Content/css/blue.css" id="link_theme" />
        <!-- tooltips-->
            <link rel="stylesheet" href="assets/Content/lib/qtip2/jquery.qtip.min.css" />

            <link rel="stylesheet" href="assets/Content/lib/datepicker/datepicker.css" />
        <!-- enhanced select -->
            <link rel="stylesheet" href="assets/Content/lib/chosen/chosen.css" />
        <!-- main styles -->
            <link rel="stylesheet" href="assets/Content/css/style.css" />
            
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
	
        <!-- Favicon -->
            <link rel="shortcut icon" href="favicon.ico" />
		
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/ie.css" />
            <script src="js/ie/html5.js"></script>
			<script src="js/ie/respond.min.js"></script>
			<script src="lib/flot/excanvas.min.js"></script>
        <![endif]-->
		
		<script>
			//* hide all elements & show preloader
			document.documentElement.className += 'js';
		</script>
        <style type="text/css">
            .center{
                text-align: center!important;
            }
        </style>
    </head>
    <body>
		<div id="loading_layer" style="display:none"><img src="assets/Content/img/ajax_loader.gif" alt="" /></div>
		<!--  -->
		
		<div id="maincontainer" class="clearfix">
			<!-- header -->
            <header>
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            {{--<a class="brand" href="home.html"><img src="assets/Content/img/logoWB_w.png"></a>--}}

                            <!-- Inicio Menú Dropdown -->
							
                        </div>
                    </div>
                </div>               
            </header>
            
            <!-- main content -->
            <div id="contentwrapper">
               @yield('body')
            </div>

            
            <script src="assets/Content/js/jquery.min.js"></script>
            <!-- smart resize event -->
            <script src="assets/Content/js/jquery.debouncedresize.min.js"></script>
            <!-- hidden elements width/height -->
            <script src="assets/Content/js/jquery.actual.min.js"></script>
            <!-- js cookie plugin -->
            <script src="assets/Content/js/jquery.cookie.min.js"></script>
            <!-- main bootstrap js -->
            <script src="assets/Content/bootstrap/js/bootstrap.min.js"></script>
            <!-- tooltips -->
            <script src="assets/Content/lib/qtip2/jquery.qtip.min.js"></script>
            <!-- fix for ios orientation change -->
            <script src="assets/Content/js/ios-orientationchange-fix.js"></script>
            <!-- scrollbar -->
            <script src="assets/Content/lib/antiscroll/antiscroll.js"></script>
            <script src="assets/Content/lib/antiscroll/jquery-mousewheel.js"></script>
            <!-- lightbox -->
            <script src="assets/Content/lib/colorbox/jquery.colorbox.min.js"></script>
            <!-- common functions -->
            <script src="assets/Content/js/gebo_common.js"></script>
            <!-- enhanced select -->
            <script src="assets/Content/lib/chosen/chosen.jquery.min.js"></script>
            <!-- bootstrap plugins -->
            <script src="assets/Content/js/bootstrap.plugins.min.js"></script>
            <!-- autosize textareas -->
            <script src="assets/Content/js/forms/jquery.autosize.min.js"></script>
            <!-- touch events for jquery ui-->
            <script src="assets/Content/js/forms/jquery.ui.touch-punch.min.js"></script>
            <!-- datatable -->
            <script src="assets/Content/lib/datatables/jquery.dataTables.min.js"></script>
            <!-- datepicker -->
            <script src="assets/Content/lib/datepicker/bootstrap-datepicker.min.js"></script>
            <!-- styled form elements -->
            <script src="assets/Content/lib/uniform/jquery.uniform.min.js"></script>
            <!-- script por archivo -->
            @section('scriptByPage')
            
            @show


    @section('script')
			<script>
				$(document).ready(function() {
					//* show all elements & remove preloader
					setTimeout('$("html").removeClass("js")',1000);
                    gebo_chosen.init();
                    gebo_datatbles.dt_d();
				});
                function laConsulta(leObject){
                   $(leObject).css('display', 'block');
                }
                gebo_chosen = {
                    init: function(){
                        $(".chzn_a").chosen({
                            allow_single_deselect: true
                        });
                        $(".chzn_b").chosen();
                    }
                };

                gebo_datatbles = {
                    dt_d: function() {
                        function fnShowHide( iCol ) {
                            /* Get the DataTables object again - this is not a recreation, just a get of the object */
                            var oTable = $('#dt_d').dataTable();
                             
                            var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
                            oTable.fnSetColumnVis( iCol, bVis ? false : true );
                        }
                        
                        var oTable = $('#dt_d').dataTable({
                            "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
                            "sPaginationType": "bootstrap"
                        });
                        
                        $('#dt_d_nav').on('click','li input',function(){
                            fnShowHide( $(this).val() );
                        });
                    }
                };
			</script>
        @show
		
		</div>
	</body>
</html>