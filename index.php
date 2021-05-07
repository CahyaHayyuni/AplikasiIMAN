<?php
session_start();

include "function.php";
include "email.php";

$koneksi = new mysqli("localhost", "root", "", "db_aplikasisdm");

if ($_SESSION['user']) {
?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Aplikasi SDM</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- GRID LESS -->
        <link rel="stylesheet" href="assets/css/grid.less">
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <!-- Shortcut Icon -->
        <link rel="shortcut icon" href="assets/img/pelindo-favicon.ico" />
        <!-- datatable -->
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
        <!-- css signature -->
        <style>
            #canvasDiv {
                position: right;
                border: 2px dashed grey;
                height: 300px;
            }
        </style>
        <!-- SELECT2 -->
        <link href="assets/css/select2.min.css" rel="stylesheet" />
    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html" style="background-color: #3295a8;">IMAN <br>
                        <span style="font-size: 16px;">(Inventory Management)</span>
                    </a>
                </div>
                <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">
                    <?php echo "User : " . $_SESSION['nama']; ?>&nbsp;&nbsp;&nbsp;
                    <?php echo "Tanggal : " . date('d-m-Y'); ?> &nbsp;
                    <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Aksi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="logout.php">Logout</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Tutorial</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li class="text-center">
                            <img src="assets/img/pelindo.png" class="user-image img-responsive" />
                        </li>

                        <li>
                            <a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>
                        <?php if ($_SESSION['user_login'] == 'admin') { ?>
                            <li>
                                <a href="?page=anggota"><i class="fa fa-users"></i> Data Anggota</a>
                            </li>
                        <?php } ?>
                        <li>
                            <a href="?page=ekspedisi"><i class="fa fa-users"></i> Data Ekpedisi</a>
                        </li>

                        <li>
                            <a href="?page=barangmasuk"><i class="fa fa-download"></i> Barang & Surat Masuk</a>
                        </li>

                        <li>
                            <a href="?page=barangkeluar"><i class="fa fa-upload"></i> Barang & Surat Keluar</a>
                        </li>

                        <li>
                            <a href="?page=historibarangmasuk"><i class="fa fa-history"></i> Histori Barang & Surat Masuk</a>
                        </li>

                        <li>
                            <a href="?page=historibarangkeluar"><i class="fa fa-history"></i> Histori Barang & Surat Keluar</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper">
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">

                            <?php
                            $page = isset($_GET['page']) ? $_GET['page'] : '';
                            $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';

                            if ($page == "barangmasuk") {
                                if ($aksi == "") {
                                    include "page/barangmasuk/barang.php";
                                } elseif ($aksi == "tambah") {
                                    include "page/barangmasuk/tambah.php";
                                } elseif ($aksi == "serahterima") {
                                    include "page/barangmasuk/serahterima.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/barangmasuk/hapus.php";
                                }
                            } elseif ($page == "historibarangmasuk") {
                                if ($aksi == "") {
                                    include "page/historibarangmasuk/histori.php";
                                } elseif ($aksi == "view") {
                                    include "page/historibarangmasuk/view.php";
                                }
                            } elseif ($page == "barangkeluar") {
                                if ($aksi == "") {
                                    include "page/barangkeluar/barang.php";
                                } elseif ($aksi == "tambah") {
                                    include "page/barangkeluar/tambah.php";
                                } elseif ($aksi == "serahterima") {
                                    include "page/barangkeluar/serahterima.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/barangkeluar/hapus.php";
                                }
                            } elseif ($page == "anggota") {
                                if ($aksi == "") {
                                    include "page/anggota/anggota.php";
                                } elseif ($aksi == "tambah") {
                                    include "page/anggota/tambah.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/anggota/ubah.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/anggota/hapus.php";
                                }
                            } elseif ($page == "ekspedisi") {
                                if ($aksi == "") {
                                    include "page/ekspedisi/ekspedisi.php";
                                } elseif ($aksi == "tambah") {
                                    include "page/ekspedisi/tambah.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/ekspedisi/ubah.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/ekspedisi/hapus.php";
                                }
                            } elseif ($page == "historibarangmasuk") {
                                if ($aksi == "") {
                                    include "page/historibarangmasuk/histori.php";
                                }
                            } elseif ($page == "historibarangkeluar") {
                                if ($aksi == "") {
                                    include "page/historibarangkeluar/histori.php";
                                } elseif ($aksi == "view") {
                                    include "page/historibarangkeluar/view.php";
                                }
                            } elseif ($page == "") {

                                include "home.php";
                            }
                            ?>
                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div><!-- selec2 -->
        <!-- /. WRAPPER  -->
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script src="assets/js/select2.min.js"></script>
        <script>
            $('.select2').select2();
        </script>
        <script>
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });
        </script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>

        <!-- SCRIPT SIGNATURE -->
        <script src="assets/js/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
        <script src="assets/js/html2canvas.min.js"></script>
        <script>
            $(document).ready(() => {
                var canvasDiv = document.getElementById('canvasDiv');
                var canvas = document.createElement('canvas');
                canvas.setAttribute('id', 'canvas');
                canvasDiv.appendChild(canvas);
                $("#canvas").attr('height', $("#canvasDiv").outerHeight());
                $("#canvas").attr('width', $("#canvasDiv").width());
                if (typeof G_vmlCanvasManager != 'undefined') {
                    canvas = G_vmlCanvasManager.initElement(canvas);
                }

                context = canvas.getContext("2d");
                $('#canvas').mousedown(function(e) {
                    var offset = $(this).offset()
                    var mouseX = e.pageX - this.offsetLeft;
                    var mouseY = e.pageY - this.offsetTop;

                    paint = true;
                    addClick(e.pageX - offset.left, e.pageY - offset.top);
                    redraw();
                });

                $('#canvas').mousemove(function(e) {
                    if (paint) {
                        var offset = $(this).offset()
                        //addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
                        addClick(e.pageX - offset.left, e.pageY - offset.top, true);
                        console.log(e.pageX, offset.left, e.pageY, offset.top);
                        redraw();
                    }
                });

                $('#canvas').mouseup(function(e) {
                    paint = false;
                });

                $('#canvas').mouseleave(function(e) {
                    paint = false;
                });

                var clickX = new Array();
                var clickY = new Array();
                var clickDrag = new Array();
                var paint;

                function addClick(x, y, dragging) {
                    clickX.push(x);
                    clickY.push(y);
                    clickDrag.push(dragging);
                }

                $("#reset-btn").click(function() {
                    context.clearRect(0, 0, window.innerWidth, window.innerWidth);
                    clickX = [];
                    clickY = [];
                    clickDrag = [];
                });

                $(document).on('click', '#btn-save', function() {
                    var mycanvas = document.getElementById('canvas');
                    var img = mycanvas.toDataURL("image/png");
                    anchor = $("#signature");
                    anchor.val(img);
                    $("#signatureform").submit();
                });

                var drawing = false;
                var mousePos = {
                    x: 0,
                    y: 0
                };
                var lastPos = mousePos;

                canvas.addEventListener("touchstart", function(e) {
                    mousePos = getTouchPos(canvas, e);
                    var touch = e.touches[0];
                    var mouseEvent = new MouseEvent("mousedown", {
                        clientX: touch.clientX,
                        clientY: touch.clientY
                    });
                    canvas.dispatchEvent(mouseEvent);
                }, false);


                canvas.addEventListener("touchend", function(e) {
                    var mouseEvent = new MouseEvent("mouseup", {});
                    canvas.dispatchEvent(mouseEvent);
                }, false);


                canvas.addEventListener("touchmove", function(e) {

                    var touch = e.touches[0];
                    var offset = $('#canvas').offset();
                    var mouseEvent = new MouseEvent("mousemove", {
                        clientX: touch.clientX,
                        clientY: touch.clientY
                    });
                    canvas.dispatchEvent(mouseEvent);
                }, false);



                // Get the position of a touch relative to the canvas
                function getTouchPos(canvasDiv, touchEvent) {
                    var rect = canvasDiv.getBoundingClientRect();
                    return {
                        x: touchEvent.touches[0].clientX - rect.left,
                        y: touchEvent.touches[0].clientY - rect.top
                    };
                }


                var elem = document.getElementById("canvas");

                var defaultPrevent = function(e) {
                    e.preventDefault();
                }
                elem.addEventListener("touchstart", defaultPrevent);
                elem.addEventListener("touchmove", defaultPrevent);


                function redraw() {
                    //
                    lastPos = mousePos;
                    for (var i = 0; i < clickX.length; i++) {
                        context.beginPath();
                        if (clickDrag[i] && i) {
                            context.moveTo(clickX[i - 1], clickY[i - 1]);
                        } else {
                            context.moveTo(clickX[i] - 1, clickY[i]);
                        }
                        context.lineTo(clickX[i], clickY[i]);
                        context.closePath();
                        context.stroke();
                    }
                }
            })
        </script>

    </body>

    </html>

<?php
} else {
    header("location:login.php");
}

?>