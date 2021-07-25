<?php require '../controllers/adminController.php' ?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

    <?php require "../template/admin/index.php" ?>


</head>

<body>

    <div id="main-wrapper" data-layout="vertical">

        <?php require "../template/admin/header.php" ?>

        <?php require "../template/admin/sidebar.php" ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <h4 class="page-title">User Ranking</h4>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12" style="display: -webkit-inline-box;">
                        <div class="col-sm-6">
                            <div class="white-box">
                                <div>
                                    <canvas id="userScoreChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="white-box">
                                <div>
                                    <canvas id="userTTQuesChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- footer -->

            <?php require "../template/admin/footer.php" ?>
            <!-- ============================================================== -->

            <!-- =======================================================================-->

            <div id="detail" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Content Answer</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">

                        </div>
                    </div>
                </div>
            </div>

            <!-- =======================================================================-->

        </div>
    </div>

    <?php require "../template/admin/mainscript.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const dataUserRank = JSON.parse('<?=json_encode($userRank)?>')
    function configChartBar(result, labelChart, labelItemName, dataItemName, backGroundColor, borderColor) {
        let labels = [];
        let datas = [];
        result.map(item => {
            labels.push(item[`${labelItemName}`])
            datas.push(item[`${dataItemName}`])
        })
        const data = {
            labels: labels,
            datasets: [{
                label: labelChart,
                data: datas,
                backgroundColor: backGroundColor,
                borderColor: borderColor,
                borderWidth: 1
            }]
        };
        return {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
    }

    const configUserScoreChart = configChartBar(dataUserRank,"Score","screen_name", "total", 'rgba(255, 159, 64, 0.2)','rgb(255, 159, 64)');
    const configUserTotalQues = configChartBar(dataUserRank,"Total Question","screen_name", "total_question", 'rgba(54, 162, 235, 0.2)','rgb(54, 162, 235)');

    var userScoreChart = new Chart(
        document.getElementById('userScoreChart'),
        configUserScoreChart
    );
    var userTTQuesChart = new Chart(
        document.getElementById('userTTQuesChart'),
        configUserTotalQues
    );
    </script>

    <script>
    $(".tab-manage-user-ranking").addClass('active');
    </script>
</body>

</html>