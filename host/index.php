<?php
session_start();
if (!isset($_SESSION['host_id'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMART PPE</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('img/smartppebg.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            z-index: -1;
        }

        .ui-timepicker-container {
            z-index: 9999 !important;
            /* Ensure it's above Bootstrap modal (1050) */
        }
    </style>
</head>

<body>
    <div class="overlay"></div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-head d-flex justify-content-between align-items-center px-3 pt-3">
                        <h4>Workers List</h4>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateConfigModal">
                            Update Config
                        </button>
                        <?php include "modals/update_config.php"; ?>
                    </div>
                    <hr>
                    <div class="card-body">
                        <!-- Nav Tabs -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="workers-tab" data-bs-toggle="tab" data-bs-target="#workers" type="button" role="tab" aria-controls="workers" aria-selected="true">
                                    Workers List
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="logs-tab" data-bs-toggle="tab" data-bs-target="#logs" type="button" role="tab" aria-controls="logs" aria-selected="false">
                                    General Logs
                                </button>
                            </li>
                            <!-- <li class="nav-item" role="presentation">
                                <button class="nav-link" id="devices-tab" data-bs-toggle="tab" data-bs-target="#devices" type="button" role="tab" aria-controls="devices" aria-selected="false">
                                    Devices
                                </button>
                            </li> -->
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content mt-3" id="myTabContent">
                            <!-- Workers List Tab -->
                            <div class="tab-pane fade show active" id="workers" role="tabpanel" aria-labelledby="workers-tab">
                                <?php include "datatables/workersTable.php"; ?>
                            </div>
                            <!-- Logs Tab -->
                            <div class="tab-pane fade" id="logs" role="tabpanel" aria-labelledby="logs-tab">
                                <?php include "datatables/workersGeneralLogsTable.php"; ?>
                            </div>
                            <!-- Devices Tab -->
                            <!-- <div class="tab-pane fade" id="devices" role="tabpanel" aria-labelledby="devices-tab">
                                <p>Device information will be displayed here.</p>
                            </div> -->
                        </div>
                    </div> <!-- End Card Body -->
                </div> <!-- End Card -->
            </div> <!-- End Col -->
        </div> <!-- End Row -->
    </div> <!-- End Container -->


    <!-- jQuery First -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Timepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>


    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function() {
            $('#updateConfigModal').on('shown.bs.modal', function() {
                $('.timepicker').timepicker({
                    timeFormat: 'h:mm p',
                    interval: 60,
                    minTime: '10:00am',
                    maxTime: '6:00pm',
                    defaultTime: '11:00am',
                    startTime: '10:00am',
                    dynamic: false,
                    dropdown: true,
                    scrollbar: true,
                });
            });
        });
    </script>


</body>

</html>