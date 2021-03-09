<style type="text/css">
    table {
        width: 240px;
        border-collapse: collapse;
    }

    .tagcloud {
        margin: 0;
        padding: 30px;
        width: 300px;
        border: 1px solid #000;
        text-align: center;
        line-height:: 2.8dppx;
    }

    .tagcloud li {
        display: inline;
        margin-right: 10px;
    }

    .tagcloud a {
        padding: 0;
    }

    .tagcloud a.tag1 {
        font-size: 0.7em;
        font-weight: 100;
    }

    .tagcloud a.tag2 {
        font-size: 0.8em;
        font-weight: 200;
    }

    .tagcloud a.tag3 {
        font-size: 0.9em;
        font-weight: 300;
    }

    .tagcloud a.tag4 {
        font-size: 1em;
        font-weight: 400;
    }

    .tagcloud a.tag5 {
        font-size: 1.5em;
        font-weight: 500;
    }

    .tagcloud a.tag6 {
        font-size: 1.6em;
        font-weight: 600;
    }

    .tagcloud a.tag7 {
        font-size: 1.7em;
        font-weight: 700;
    }

    .tagcloud a.tag8 {
        font-size: 1.8em;
        font-weight: 800;
    }

    .tagcloud a.tag9 {
        font-size: 2.2em;
        font-weight: 900;
    }

    .tagcloud a.tag10 {
        font-size: 2.5em;
        font-weight: 900;
    }
</style>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="table-responsive">
                        <?php echo $data['tag_list']; ?>
                        <?php echo $data['tag_cloud']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
