<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ESPORT STUBA stats</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
    <link href="/assets/main.css" rel="stylesheet">
</head>
<body>


<?php foreach ($teams as $team) { ?>
    <div class="container my-5 team mx-auto">

        <div class="row">
            <div class="col-12">
                <h2><?= $team['name'] ?></h2>
                <small style="color: gray">updated: <?= date_format(date_create($team['last_update']), "H:i d.m.Y "); ?></small>
            </div>
        </div>

        <div class="row mt-4 ">
            <div class="col-12 d-flex align-items-stretch x-scroll">
                <?php foreach ($team['players'] as $player) { ?>
                    <div class="player text-center">

                        <div class="d-flex ">
                            <img class="me-2" src="https://ionicframework.com/docs/img/demos/avatar.svg"/>
                            <div>
                                <p>
                                    <a href="<?= $player['lolprosurl'] ?>"><?= $player['name']; ?></a>
                                </p>
                                <p>
                                    <small>updated: <?= date_format(date_create($team['last_update']), "H:i d.m.Y "); ?></small>
                                </p>
                            </div>

                        </div>

                        <hr>
                        <?php if(isset($player['accounts']) && isset($player['accounts']['accounts'])){?>
                        <?php foreach ($player['accounts']['accounts'] as $history){ ?>
                            <div class="player_accounts">
                                <a href="<?= $history['opgg'] ?>"><?= $history['account_name'] ?></a>
                                <p><span>flexq:</span> <?= $history['flexq'] ?></p>
                                <p><span>soloq:</span> <?= $history['soloq'] ?></p>
                            </div>
                        <?php } ?>
                        <?php } ?>

                        <hr>
                        <?php if(isset($player['accounts']) && isset($player['accounts']['history'])){?>
                        <?php foreach (array_slice($player['accounts']['history'], 0,10) as $history){ ?>
                            <div class="player_history d-flex">
                                <img src="<?= $history['icon'] ?>" alt="">

                                <div class="info">
                                    <p><span>played:</span> <?= $history['played'] ?></p>
                                    <p><span>win_rate:</span> <?= $history['win_rate'] ?>%</p>
                                </div>

                            </div>
                        <?php } ?>
                        <?php } ?>

                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="row mt-4">

            <div class="col-md-4 d-flex align-items-stretch">
                <div class="stats p-3 w-100">

                    <h2>Bans</h2>
                    <?php if(isset($team['stats']) && isset($team['stats']['bans'])){?>
                    <?php foreach (array_slice($team['stats']['bans'], 0,10) as $stat){ ?>
                        <div class="d-flex align-items-center mb-1">
                            <img src="<?= $stat['icon'] ?>" class="me-3" alt="<?= $stat['name'] ?>">
                            <div>
                                <p><?= $stat['name'] ?></p>
                                <p>count: <?= $stat['count'] ?? 0 ?></p>
                            </div>

                        </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="stats p-3 w-100">

                    <h2>Bans Against</h2>
                    <?php if(isset($team['stats']) && isset($team['stats']['bans_against'])){?>
                    <?php foreach (array_slice($team['stats']['bans_against'], 0,10) as $stat){ ?>
                        <div class="d-flex align-items-center mb-1">
                            <img src="<?= $stat['icon'] ?>" class="me-3" alt="<?= $stat['name'] ?>">
                            <div>
                                <p><?= $stat['name'] ?></p>
                                <p>count: <?= $stat['count'] ?? 0 ?></p>
                            </div>

                        </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4  d-flex align-items-stretch">
                <div class="stats w-100 p-3">

                    <h2>Picks</h2>
                    <?php if(isset($team['stats']) && isset($team['stats']['picks'])){?>
                    <?php foreach (array_slice($team['stats']['picks'], 0,10) as $stat){ ?>
                        <div class="d-flex align-items-center mb-1">
                            <img src="<?= $stat['icon'] ?>" class="me-3" alt="<?= $stat['name'] ?>">
                            <div>
                                <p><?= $stat['name'] ?></p>
                                <p>picks: <?= $stat['picks'] ?? 0 ?></p>
                            </div>

                        </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
<?php } ?>


</body>
</html>