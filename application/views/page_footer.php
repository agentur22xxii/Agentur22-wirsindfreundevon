<footer>
    <?php
        if ($this->ion_auth->logged_in()) {
            echo "<div class='reveal' id='upload' data-reveal>
                <form method='post' class='uploadForm'>
                    <label for='url'>Image (Link)</label>
                    <input type='url' name='url' id='url'>
                    <label for='alt'>Alt (Beschreibung)</label>
                    <input type='text' name='alt' id='alt'>
                    <label for='quelle'>Quelle (Link)</label>
                    <input type='url' name='quelle' id='quelle'>
                    <button class='alert button' type='reset' name='reset'>Reset</button>
                    <button class='success button' type='submit' name='submit' id='uploadButton'>Upload</button>
                </form>
            </div>";

            echo "<div class='reveal' id='delete' data-reveal>
                <form method='post' class='deleteForm'>
                    <label for='id'>ID des Posts</label>
                    <input type='text' name='id' id='id'>
                    <button class='alert button' type='reset' name='reset'>Reset</button>
                    <button class='success button' type='submit' name='submit' id='deleteButton'>Delete</button>
                </form>
            </div>";
        }
    ?>

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.min.css" />
    <?php //<link rel="stylesheet/less" type="text/css" href="<?php echo base_url(); less/app.less"/> ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/app.css">

    <?php
    //echo "<script src='".base_url()."js/vendor/jquery.min.js'></script>";
    echo "<script src='".base_url()."js/vendor/foundation.min.js'></script>";
    //output.min.js = Merge aus newWaterfall+app via. https://www.filesmerge.com/de/merge-javascript-files
    echo "<script src='".base_url()."js/output.min.js'></script>";
    //echo "<script src='".base_url()."js/vendor/newWaterfall.min.js'></script>";
    //echo "<script src='".base_url()."js/app.min.js'></script>";

    /*
    <script src="https://use.fontawesome.com/77cd4f14f2.js"></script>
    <script>
      less = {
        env: "development",
        async: false,
        fileAsync: false,
        poll: 1000,
        functions: {},
        dumpLineNumbers: "comments",
        relativeUrls: false,
        rootpath: ""
      };
    </script>
    <script src="<?php echo base_url(); js/less.js"></script>
    */
    ?>

</footer>
</body>
</html>
