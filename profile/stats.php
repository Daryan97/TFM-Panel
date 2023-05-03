<?php
require_once '../langs/lang_driver.php';
require_once '../header.php';
echo '<title>' . item("site", "siteName") . ' | ' . item("main", "stats") . '</title>';
require '../sidebar.php';
?>
<?php

echo '
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">' . item("main", "stats") . '</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">' . item("main", "home") . '</a></li>
              <li class="breadcrumb-item active">' . item("main", "profile") . '</li>
              <li class="breadcrumb-item active">' . item("main", "stats") . '</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h4>' . $shopCheeses . '</h4>

                <p>' . item("main", "cheeses") . '</p>
              </div>
              <div class="icon">
                <i class="fas fa-cheese"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h4>' . $shopFraises . '</h4>

                <p>' . item("main", "fraises") . '</p>
              </div>
              <div class="icon">
                <i class="fab fa-raspberry-pi"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-light">
              <div class="inner">
                <h4>' . gmdate("m/d/Y", $regDate) . '</h4>

                <p>' . item("main", "regDate") . '</p>
              </div>
              <div class="icon">
                <i class="fas fa-calendar"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h4>' . $shamanLevel . '</h4>

                <p>Shaman ' . item("main", "level") . '</p>
              </div>
              <div class="icon">
                <i class="fas fa-angle-double-up"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <section class="col-lg-7 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Shaman ' . item("main", "saves") . '
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas class="chart" id="shamanSaves"></canvas>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-line mr-1"></i>
                  ' . item("main", "player") . ' ' . item("main", "stats") . '
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>' . item("main", "task") . '</th>
                      <th>' . item("main", "amount") . '</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>' . item("main", "cheeses") . ' ' . item("main", "gathered") . '</td>
                      <td>
                        ' . $cheeseCount . '
                      </td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>' . item("main", "cheeses") . ' ' . item("main", "gathered") . ' ' . item("main", "first") . '</td>
                      <td>
                        ' . $firstCount . '
                      </td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Bootcamp</td>
                      <td>
                        ' . $bootcampCount . '
                      </td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Shaman ' . item("main", "cheeses") . '</td>
                      <td>
                        ' . $shamanCheese . '
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </section>
          
          <section class="col-lg-5 connectedSortable">

            <div class="card bg-gradient-dark">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-flag-checkered mr-1"></i>
                  Racing
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="row text-center">
                  <div class="col-3 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">' . $racingRounds . '</div>
                  </div>
                  <div class="col-3 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">' . $racingCompleted . '</div>
                  </div>
                  <div class="col-3 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">' . $racingPodiums . '</div>
                  </div>
                  <div class="col-3 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">' . $racingFirsts . '</div>
                  </div>
                </div>
              </div>
              <div class="card-footer bg-transparent">
                <div class="row text-center">
                  <div class="col-3 text-center">
                    <div id="sparkline-1"></div>
                    <i class="fas fa-play"></i>
                    <div class="text-white">' . item("main", "played") . '</div>
                  </div>
                  <div class="col-3 text-center">
                    <div id="sparkline-1"></div>
                    <i class="fas fa-check"></i>
                    <div class="text-white">' . item("main", "completed") . '</div>
                  </div>
                  <div class="col-3 text-center">
                    <div id="sparkline-2"></div>
                    <i class="fas fa-trophy"></i>
                    <div class="text-white">' . item("main", "podiums") . '</div>
                  </div>
                  <div class="col-3 text-center">
                    <div id="sparkline-3"></div>
                    <i class="fas fa-stopwatch"></i>
                    <div class="text-white">' . item("main", "firsts") . '</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card bg-gradient-teal">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-book-dead"></i>
                  Survivor
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="row text-center">
                  <div class="col-3 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">' . $survivorRounds . '</div>
                  </div>
                  <div class="col-3 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">' . $survivorShaman . '</div>
                  </div>
                  <div class="col-3 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">' . $survivorKills . '</div>
                  </div>
                  <div class="col-3 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">' . $SurvivedRounds . '</div>
                  </div>
                </div>
              </div>
              <div class="card-footer bg-transparent">
                <div class="row text-center">
                  <div class="col-3 text-center">
                    <div id="sparkline-1"></div>
                    <i class="fas fa-play"></i>
                    <div class="text-white">' . item("main", "played") . '</div>
                  </div>
                  <div class="col-3 text-center">
                    <div id="sparkline-1"></div>
                    <i class="fas fa-feather"></i>
                    <div class="text-white">Shaman</div>
                  </div>
                  <div class="col-3 text-center">
                    <div id="sparkline-2"></div>
                    <i class="fas fa-skull"></i>
                    <div class="text-white">' . item("main", "kills") . '</div>
                  </div>
                  <div class="col-3 text-center">
                    <div id="sparkline-3"></div>
                    <i class="fas fa-medal"></i>
                    <div class="text-white">' . item("main", "survived") . '</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card bg-gradient-lightblue">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-info-circle mr-1"></i>
                  ' . item("main", "details") . '
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="' . $image . '">
                  <h3 class="profile-username text-center">' . $fullname . '</h3>
                  ' . $privIcon . '
                </div>
              </div>
              <div class="card-footer bg-transparent">
                <div class="row text-center">
                  <div class="col-6 text-center">
                    <div id="sparkline-1"></div>
                    <a class="btn btn-outline-light" href="/profile/details.php"><i class="fas fa-edit"></i> ' . item("main", "details") . '</a>
                  </div>
                  <div class="col-6 text-center">
                    <div id="sparkline-1"></div>
                    <a class="btn btn-outline-light" href="/profile/avatar.php"><i class="fas fa-camera"></i> ' . item("main", "avatar") . '</a>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>
  </div>
';

?>

    <script>
        let shamanSaves = document.getElementById('shamanSaves').getContext('2d');
        let chart = new Chart(shamanSaves, {
            type: 'bar',
            data: {
                labels: ['<?php echo item("main", "normal"); ?>', '<?php echo item("main", "hard"); ?>', '<?php echo item("main", "divine"); ?>'],
                datasets: [{
                    label: 'Shaman <?php echo item("main", "saves"); ?>',
                    data: [<?php echo $easyMode; ?>,<?php echo $hardMode; ?>,<?php echo $divineMode; ?>],
                    backgroundColor: ['#28a745', '#ffc107', '#dc3545'],
                    barThickness: 80
                }]
            },
            options: {}
        });
    </script>

<?php
require '../footer.php';
?>