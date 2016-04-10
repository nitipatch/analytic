<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Google Analytic</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/webpageStyle.css" rel="stylesheet">
</head>
<body>
    <header>
        <img src="https://www.google.com/analytics/web/s/logo-ga.png" height="70"/>   
    </header>

    <div class="col-sm-3" height="450">
        <div class="left-sidebar">
            <div class="outer-page-div">
                <h2>Page</h2>
                <div class="inner-page-div">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="query.php"> <span class="pull-right">+</span>Query page</a></li>
                        <li><a href="searchTerm.php"> <span class="pull-right">+</span>Search term page</a></li>
                    </ul>
                </div>
            </div>
            <h2>example</h2>
            <div class="panel-group category-example" id="page">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#page" href="#search">Search term</a>
                        </h4>
                    </div>
                    <div id="search" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul id="textSearch"> 
                                <li><a id="18335606,UA-18335606-1,36387213,searchUniques,31daysAgo,yesterday,searchKeyword">
                                        Total Unique Searches</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,avgSearchResultViews,31daysAgo,yesterday,searchKeyword">
                                        Results Pageviews / Search</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,searchExitRate,31daysAgo,yesterday,searchKeyword">
                                        % Search Exits</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,percentSearchRefinements,31daysAgo,yesterday,searchKeyword">
                                        % Search Refinements</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,avgSearchDuration,31daysAgo,yesterday,searchKeyword">
                                        Average Time after Search</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,avgSearchDepth,31daysAgo,yesterday,searchKeyword">
                                        Average Search Depth</a></li>		
                            </ul>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#page" href="#allPage">All Page</a>
                        </h4>
                    </div>
                    <div id="allPage" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul id="textAllPage"> 
                                <li><a id="18335606,UA-18335606-1,36387213,pageviews,31daysAgo,yesterday,pagePath">
                                        Page views</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,uniquePageviews,31daysAgo,yesterday,pagePath">
                                        Unique Pageviews</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,avgTimeOnPage,31daysAgo,yesterday,pagePath">
                                        Avg. Time on Page</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,entrances,31daysAgo,yesterday,pagePath">
                                        Entrances</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,bounceRate,31daysAgo,yesterday,pagePath">
                                        Bounce Rate</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,pageValue,31daysAgo,yesterday,pagePath">
                                        Page Value</a></li>		
                            </ul>
                        </div>
                    </div>
                </div>                        
            </div>
        </div>                        
    </div>

    <div class="row">
        <div class="col-md-6 pull-left">
            <h5>Syntex : AccountId,PropertyId,ProfileId,Metric,StartDate,EndDate,Dimension</h5>
            <p>Example : </p>
            <div id="Example">
                <p>18335606,UA-18335606-1,36387213,searchUniques,31daysAgo,yesterday,searchKeyword</p><br/>
            </div>

            <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#load" aria-expanded="false" aria-controls="load">Upload</button>
            <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#save" aria-expanded="false" aria-controls="save">save</button>
            <div class="collapse" id="load">
                <div class="well">
                    <form action="" method="post" enctype="multipart/form-data">
                        <table width="100%" border="0">
                            <td width="52%" align = "left"><input  type="file" class="filestyle" data-buttonBefore="true" data-icon="false" name="file" id="file"></input></td>
                            <td width="40%" align = "left"><button name="submit" value="Submit" class="btn btn-default" >load</button></td>
                        </table>
                </div>
            </div>
            <div class="collapse" id="save">
                <div class="well">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input type="text" class="form-control" name="savedFileName" id="savedFileName" placeholder="Enter file name...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" onclick="saveFile()">Save</button>
                                </span>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
            <br/>
            </form>
            <form onsubmit="submitFormSearchTerm();
                    return false;" id="form1" name="form1" method="post" action="" >

                <p><input type="text" name="textInput" autofocus id="textInput" style="color: #3B9C9C" size = "100px" value="<?php Read(); ?>"></p>
                <button class="btn btn-default" id="sendSearchTerm" onclick="submitFormSearchTerm()">Send</button>
            </form>
            <p>&nbsp;</p>
            <p id="result"></p>
        </div>
    </div>
</form>

<footer style="margin-top: 180px;"><!--Footer-->
    <div class="footer-widget">
        <div class="container">
            <div class="col-sm-2">
                <div class="single-widget">
                    <h2>Google Analytic</h2>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="https://www.google.com/analytics">Google Analytic</a></li>
                        <li><a href="https://console.developers.google.com">Google developers console</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="single-widget">
                    <h2>Reference</h2>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="https://developers.google.com/analytics/devguides/reporting/core/v3/reference">
                                Google Analytic reference</a></li>
                        <li><a href="https://ga-dev-tools.appspot.com/query-explorer/">Query explorer reference</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="single-widget">
                    <h2>Explorer</h2>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="https://developers.google.com/analytics/devguides/reporting/core/dimsmets">
                                Dimensions & Metrics Explorer</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <p>&nbsp;</p>
    </div>
</footer><!--/Footer-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/html5shiv.js"></script>
<script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>
<script type="text/javascript" src="js/readSaveSubmit.js"></script>

</body>
</html>

<?php

function Read() {
    
    if (isset($_POST['submit'])) {
        echo file_get_contents($_FILES["file"]["name"]);
    }
}
?>