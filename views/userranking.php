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
                <div class="row col-sm-12">
                    <div class="col-sm-6">
                        <h4 class="page-title">User Ranking</h4>
                    </div>
                    <div class="col-sm-6" style="text-align: end;">
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <button type="button" class="btn btn-light">Weekly</button>
                            <button type="button" class="btn btn-light">Monthly</button>
                            <button type="button" class="btn btn-light"><a href="?sort=ascending"><span
                                        class="material-icons">
                                        arrow_downward
                                    </span></a></button>
                            <button type="button" class="btn btn-light"><a href="?sort=deascending"><span
                                        class="material-icons">
                                        arrow_upward
                                    </span></a>
                            </button>

                        </div>
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
                    <div class="col-sm-9">
                        <div class="white-box" style="height: 45rem;">
                            <div>
                                <canvas id="userScoreChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="white-box">
                                <div>
                                    <canvas id="userTTVoteChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="white-box">
                                <div>
                                    <canvas id="userTTSpamChart"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12" style="display: -webkit-inline-box;">
                        <div class="col-sm-6">
                            <div class="white-box">
                                <div>
                                    <canvas id="userTTQuesChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="white-box">
                                <div>
                                    <canvas id="userTTAnsChart"></canvas>
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
    const dataTTVote = JSON.parse('<?=json_encode($userTTVote)?>')
    const dataTTSpam = JSON.parse('<?=json_encode($userTTSpam)?>')

    let isSort = "<?=$isSort?>";
    console.log(dataTTVote)

    function configChartBar(result, labelChart, labelItemName, dataItemName, backGroundColor, borderColor, chartStyle) {
        let labels = [];
        let datas = [];
        result.map(item => {
            labels.push(item[`${labelItemName}`])
            datas.push(item[`${dataItemName}`])
        })
        if (isSort == "deascending") {
            labels.reverse()
            datas.reverse()
        }
        const data = {
            labels: labels,
            datasets: [{
                label: labelChart,
                data: datas,
                backgroundColor: backGroundColor,
                borderColor: borderColor,
                borderWidth: 1,
                tension: 0.1
            }]
        };
        return {
            type: chartStyle,
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 10
                            }
                        }
                    }
                }
            }
        };
    }

    function loadChart() {
        const configUserScoreChart = configChartBar(dataUserRank, "Score", "screen_name", "total",
            'rgba(75, 192, 192, 0.2)', 'rgb(75, 192, 192)', 'bar');
        const configUserTotalQues = configChartBar(dataUserRank, "Total Question", "screen_name", "total_question",
            'rgba(54, 162, 235, 0.2)', 'rgb(54, 162, 235)', 'line');
        const configUserTotalAns = configChartBar(dataUserRank, "Total Answer", "screen_name", "total_answer",
            'rgba(201, 203, 207, 0.2)', 'rgb(201, 203, 207)', 'line');
        const configUserTotalVote = configChartBar(dataTTVote, "Vote Count", "screen_name", "total",
            [
                'rgba(201, 203, 207, 0.3)',
                'rgba(54, 162, 235, 0.3)',
                'rgba(153, 102, 255, 0.3)',
                'rgba(255, 99, 132, 0.3)',
                'rgba(255, 159, 64, 0.3)',
                'rgba(255, 205, 86, 0.3)',
                'rgba(75, 192, 192, 0.3)',
            ], [
                'grey',
            ], 'doughnut');

        const configUserTotalSpam = configChartBar(dataTTSpam, "Spam Count", "screen_name", "total",
            [
                'rgba(201, 203, 207, 0.3)',
                'rgba(54, 162, 235, 0.3)',
                'rgba(153, 102, 255, 0.3)',
                'rgba(255, 99, 132, 0.3)',
                'rgba(255, 159, 64, 0.3)',
                'rgba(255, 205, 86, 0.3)',
                'rgba(75, 192, 192, 0.3)',
            ], [
                'grey',
            ], 'doughnut');

        var userScoreChart = new Chart(
            document.getElementById('userScoreChart'),
            configUserScoreChart
        );
        var userTTQuesChart = new Chart(
            document.getElementById('userTTQuesChart'),
            configUserTotalQues
        );
        var userTTAnsChart = new Chart(
            document.getElementById('userTTAnsChart'),
            configUserTotalAns
        );
        var userTTSpamChart = new Chart(
            document.getElementById('userTTSpamChart'),
            configUserTotalSpam
        );
        var userTTVoteChart = new Chart(
            document.getElementById('userTTVoteChart'),
            configUserTotalVote
        );
    }

    loadChart()
    </script>

    <script>
    $(".tab-manage-user-ranking").addClass('active');
    </script>
</body>

</html>