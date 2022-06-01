<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo $base_url . $this->options->get('favicon'); ?>" />
    <title>Script Not Yet Installed - <?php echo PRODUCT_NAME ?></title>
</head>
<body>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
            font-family: "Arial", sans-serif;
        }

        body {
            background: #007ee4;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .main {
            background: white;
            border-radius: 4px;
            box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.16);
            padding: 15px 25px;
            margin-top: 20px;
        }

        .main a#install {
            background: #3AA365;
            color: white;
            border-radius: 3px;
            padding: 6px 10px;
            text-decoration: none;
        }

        .version {
            padding: 6px 8px;
            background: white;
            border-radius: 3px;
            color: black;
            font-weight: bold;
            font-size: 12px;
            position: relative;
            bottom: 7px;
            left: 10px;
        }

        .attribution {
            color: white;
            font-size: 12px;
            font-weight: bold;
            text-align: right;
        }

        .attribution a {
            color: white;
        }
    </style>

    <div>
        <img src="<?php echo $base_url ?>application/views/install/assets/img/script.png" /> <span class="version"><?php echo number_format(PRODUCT_VERSION, 1) ?></span>

        <div class="main">
            This script has currently not been installed. It must be installed before you can use the website.
            <br>
            <br>
            <a id="install" href="<?php $base_url ?>install">Install</a>
        </div>

        <p class="attribution">Developed & Maintained by <a target="_blank" href="<?php echo VENDOR_URL ?>"><?php echo VENDOR_NAME ?></a> &copy; <?php echo date('Y') ?>. All Rights Reserved.</p>
    </div>
</body>
</html>