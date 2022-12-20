@extends('admin.layouts.app')
<!-- Main Content -->
@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('admin.header')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Add Device</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            @if (Session::get('success'))
                                <div class="row">
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                </div>
                            @endif
                            @if (Session::get('fail'))
                                <div class="row">
                                    <div class="alert alert-danger">
                                        {{ Session::get('fail') }}
                                    </div>
                                </div>
                            @endif
                            <form action="add" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <div class="row">
                                    <label for="device_id">Device Id</label>
                                    <input id="device_id" type="text" class="form-control mb-3" name="device_id">
                                </div>
                                <div class="row">
                                    <label for="device_name">Device Name</label>
                                    <input id="device_name" type="text" class="form-control mb-3" name="device_name"
                                        required>
                                </div>
                                {{-- <div class="row">
                                    <div>
                                        <label for="location_image">Location Image</label>
                                    </div>
                                    <input id="location_image" type="file" class="form-control-file mb-3"
                                        name="location_image" required>
                                    <img id="location" src="#" alt="your image" style="display: none; position:relative" />
                                </div> --}}

                                {{-- <div class="row">
                                    <div>
                                        <img id="zoom-marker-img" class="zoom-marker-img" id="zoom-marker-img-alt"
                                            alt="zoom-marker-img-alt" name="zoom-marker-img-alt" draggable="false" />
                                    </div>
                                </div> --}}

                                {{-- <div class="row mb-3">
                                    <div class="zoom-marker-navigator mr-3">
                                        <button type="button" id="zoom-marker-btn-clean" class="btn btn-warning">clean
                                            marker</button>
                                    </div>
                                    <div class="zoom-marker-navigator">
                                        <button type="button" id="save_location_image" class="btn btn-success">Save
                                            Image</button>
                                    </div>
                                </div> --}}

                                {{-- <div class="row">
                                    <label for="device_image">Device Image</label>
                                    <input id="device_image" type="file" class="form-control-file mb-3" name="device_image"
                                        required>
                                </div> --}}
                                {{-- <div class="row">
                                    <div class="col pr-1 pl-0">
                                        <label for="device_type">Device Type</label>
                                        <select name="device_type" id="" class="form-control mb-3" required>
                                            @foreach ($device_types as $device_type)
                                                <option value="{{ $device_type->device_type }}">
                                                    {{ $device_type->device_type }}</option>
                                            @endforeach
                                        </select>
                                        <input id="device_type" type="text" class="form-control mb-3" name="device_type">
                                    </div>
                                    <div class="col p-0">
                                        <label for="device_uptime">Device Initial Uptime</label>
                                        <input id="device_uptime" type="text" class="form-control mb-3" name="device_uptime"
                                            required>
                                    </div>
                                </div> --}}
                                {{-- <div class="row">
                                    <div class="col pr-1 pl-0">
                                        <label for="device_subnet">Device Subnet</label>
                                        <input id="device_subnet" type="text" class="form-control mb-3" name="device_subnet"
                                            required>
                                    </div>
                                    <div class="col p-0">
                                        <label for="device_ip">Device IP</label>
                                        <input id="device_ip" type="text" class="form-control mb-3" name="device_ip"
                                            required>
                                    </div>
                                </div> --}}
                                {{-- <div class="row">
                                    <div class="col pr-1 pl-0">
                                        <label for="device_reading">Device Initial Reading</label>
                                        <input id="device_reading" type="text" class="form-control mb-3"
                                            name="device_reading" required>
                                    </div>
                                    <div class="col p-0">
                                        <label for="device_unit">Device Unit</label>
                                        <input id="device_unit" type="text" class="form-control mb-3" name="device_unit">
                                        <select name="device_unit" id="device_unit" class="form-control mb-3">
                                            @foreach ($device_units as $device_unit)
                                                <option value="{{ $device_unit->device_unit }}">
                                                    {{ $device_unit->device_unit }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                {{-- <div class="row">
                                    <div class="col pr-1 pl-0">
                                        <label for="device_status">Device Status</label>
                                        <input id="device_status" type="text" class="form-control mb-3" name="device_status"
                                            required>
                                    </div>
                                    <div class="col p-0">
                                        <label for="device_health">Device Health</label>
                                        <input id="device_health" type="text" class="form-control mb-3" name="device_health"
                                            required>
                                        <select name="device_health" id="device_health" class="form-control mb-3">
                                            @foreach ($device_healths as $device_health)
                                                <option value="{{ $device_health->health }}">
                                                    {{ $device_health->health }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <label for="device_location">Building name</label>
                                    <input id="device_location" type="text" class="form-control mb-3"
                                        name="device_location">
                                </div>
                                <div class="row">
                                    <div class="col pr-1 pl-0">
                                        <label for="floor_level">Floor level</label>
                                        <input id="floor_level" type="text" class="form-control mb-3" name="floor_level"
                                            required>
                                    </div>
                                    <div class="col pr-1 pl-0">
                                        <label for="window_id">Window Id</label>
                                        <input id="window_id" type="text" class="form-control mb-3" name="window_id"
                                            required>
                                    </div>
                                    <div class="col p-0">
                                        <label for="door_id">Door Id</label>
                                        <input id="door_id" type="text" class="form-control mb-3" name="door_id" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <button class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                crossorigin="anonymous"></script>
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#location').attr('src', e.target.result).width(150).height(200);
                    };

                    reader.readAsDataURL(input.files[0]);
                    // document.getElementById("location").style.display = "inline-block";
                    $('#location').show();
                }
            }

            $('#location').click(function(e) {
                $('#marker').css('left', e.pageX - 300).css('top', e.pageY - 150).show();
                // Position of the marker is now e.pageX, e.pageY
                // ... which corresponds to where the click was.
            });
        </script>
        {{-- <script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script> --}}
        <script src="{{ URL::asset('js/jquery.mousewheel.min.js') }}"></script>
        <script src="{{ URL::asset('js/hammer.min.js') }}"></script>
        <script src="{{ URL::asset('js/zoom-marker.min.js') }}"></script>
        <script src="{{ URL::asset('js/easy-loading.min.js') }}"></script>
        <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>

        <script>
            /******************** INIT ZoomMarker here *****************************/
            jQuery(document).ready(function($) {
                /******************* init navigator button, no need for users' initialization *********************/
                var picTag = 0;
                var tagNumber = 1;

                $('#zoom-marker-btn-clean').click(function(e) {
                    $('#zoom-marker-img').zoomMarker_CleanMarker();
                    $('#zoom-marker-img').zoomMarker_CanvasClean();
                });

                // this array stores the styles for EASY-LOADING
                var styleList = [
                    "BALL_PULSE",
                    "BALL_CLIP_ROTATE", "BALL_CLIP_ROTATE_PULSE", "SQURE_SPIN", "BALL_CLIP_ROTATE_MULTIPLE",
                    "BALL_PULSE_RISE", "BALL_ROTATE", "CUBE_TRANSITION", "BALL_ZIP_ZAG", "BALL_ZIP_ZAG_DEFLECT",
                    "BALL_TRIANGLE_PATH", "BALL_SCALE", "LINE_SCALE", "LINE_SCALE_PARTY", "BALL_SCALE_MULTIPLE",
                    "BALL_PULSE_SYNC", "BALL_BEAT", "LINE_SCALE_PULSE_OUT", "LINE_SCALE_PULSE_OUT_RAPID",
                    "BALL_SCALE_RIPPLE", "BALL_SCALE_RIPPLE_MULTIPLE", "BALL_SPIN_FADE_LOADER",
                    "LINK_SPIN_FADE_LOADER",
                    "TRIANGLE_SKEW_SPIN", "PACMAN", "SEMI_CIRCLE_SPIN"
                ];

                // init item
                var initImg = function(item) {

                    $('#zoom-marker-img').zoomMarker({
                        src: "http://icons.iconarchive.com/icons/iconsmind/outline/512/Cursor-Select-icon.png",
                        rate: 0.2,
                        width: 400,
                        max: 3000,
                        // markers: [{
                        //     src: "http://icons.iconarchive.com/icons/iconsmind/outline/512/Cursor-Select-icon.png",
                        //     x: 200,
                        //     y: 200,
                        //     draggable: false
                        // }],
                        enable_canvas: true,
                        move_limit: true
                    });

                    // handle "TAP" event and add marker to image
                    item.on("zoom_marker_mouse_click", function(event, position) {
                        console.log("Mouse click on: " + JSON.stringify(position));
                        const marker = item.zoomMarker_AddMarker({
                            src: "https://thumbs.dreamstime.com/b/red-maps-pin-location-map-icon-location-pin-pin-icon-vector-red-maps-pin-location-map-icon-location-pin-pin-icon-vector-vector-140200096.jpg",
                            x: position.x,
                            y: position.y,
                            size: 30,
                            dialog: {},
                            hint: {
                                value: tagNumber,
                                style: {
                                    color: "#ffffff",
                                    left: "10px"
                                }
                            }
                        });
                        // 手动配置dialog
                        marker.param.dialog = {
                            value: "<h4>content for dialog_" + tagNumber + "</h4>",
                            offsetX: 20,
                            style: {
                                "border-color": "#86df5f"
                            }
                        };
                        // 画线
                        const context = item.zoomMarker_Canvas();
                        if (context !== null) {
                            context.strokeStyle = 'red';
                            context.moveTo(position.x, position.y);
                            context.lineTo(100, 100);
                            context.stroke();
                        }
                        if (++tagNumber >= 10)
                            tagNumber = 1;
                    });

                    // listen to marker click event, print to console and delete the marker
                    item.on("zoom_marker_click", function(event, marker) {
                        console.log(JSON.stringify(marker));
                        $('#zoom-marker-img').zoomMarker_RemoveMarker(marker.id);
                    });

                    // message for the beginning of image loading process
                    item.on("zoom_marker_img_load", function(event, src) {
                        console.log("loading started for image : " + src);
                        EasyLoading.show({
                            text: $("<span>loading image</span>"),
                            button: $("<span>dismiss</span>"),
                            type: EasyLoading.TYPE.PACMAN
                        });
                    });

                    // message for image loaded
                    item.on("zoom_marker_img_loaded", function(event, size) {
                        console.log("image has been loaded with size: " + JSON.stringify(size));
                        // we have to set a timer in order to watching the loader in local environment, cause the loading speed is too fast
                        setTimeout(function() {
                            EasyLoading.hide();
                        }, 3000);
                        // item.zoomMarker_AddMarker({
                        //     src: "https://thumbs.dreamstime.com/b/red-maps-pin-location-map-icon-location-pin-pin-icon-vector-red-maps-pin-location-map-icon-location-pin-pin-icon-vector-vector-140200096.jpg",
                        //     x: 300,
                        //     y: 300,
                        //     size: 40,
                        //     dialog: {
                        //         value: "i was added on 'zoom_marker_img_loaded' event",
                        //         style: {
                        //             color: "red"
                        //         }
                        //     },
                        //     hint: {
                        //         value: 'M',
                        //         style: {
                        //             color: "#ffffff",
                        //             left: "12px"
                        //         }
                        //     }
                        // });
                    });

                    // message after at the end of Maker moving action
                    item.on("zoom_marker_move_end", function(event, position) {
                        console.log("Marker moving ended on :" + JSON.stringify(position));
                    })
                }

                initImg($('#zoom-marker-img'));

                $("#location_image").change(function(e) {
                    for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
                        var file = e.originalEvent.srcElement.files[i];
                        var img = document.getElementById("zoom-marker-img");
                        var reader = new FileReader();
                        reader.onloadend = function() {
                            img.src = reader.result;
                        }
                        reader.readAsDataURL(file);
                        // $("#location_image").after(img);
                    }
                });

                $("#save_location_image").click(function(e) {
                    html2canvas($("#zoom-marker-img")[0]).then((canvas) => {
                        console.log("done ... ");
                        theCanvas = canvas;
                        canvas.toBlob(function(blob) {
                            saveAs(blob, "location.png");
                        });
                    });

                    // html2canvas($("#zoom-marker-img"), {
                    //     onrendered: function(canvas) {
                    //         theCanvas = canvas;
                    //         canvas.toBlob(function(blob) {
                    //             saveAs(blob, "Dashboard.png");
                    //         });
                    //     }
                    // });
                });

            })
            /******************** INIT ZoomMarker here *****************************/
        </script>
    @endsection
