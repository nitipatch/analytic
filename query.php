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
    <div class="col-md-3">
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
                            <a data-toggle="collapse" data-parent="#page" href="#query">
                                Query Total</a></h4></div>
                    <div id="query" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul id="textQuery">
                                <li><a id="18335606,UA-18335606-1,36387213,sessions,31daysAgo,yesterday">session</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,users,31daysAgo,yesterday">user</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,pageviews,31daysAgo,yesterday">pageview</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,pageviewsPerSession,31daysAgo,yesterday">Pages / Session</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,avgSessionDuration,31daysAgo,yesterday">Avg. Session Duration</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,bounceRate,31daysAgo,yesterday">Bounce Rate</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,percentNewSessions,31daysAgo,yesterday">% New Sessions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#page" href="#dimension">dimension</a>
                        </h4>
                    </div>
                    <div id="dimension" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul id="textDimension"> 
                                <li><a id="18335606,UA-18335606-1,36387213,sessions,31daysAgo,yesterday,language">Language</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,sessions,31daysAgo,yesterday,country">Country</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,sessions,31daysAgo,yesterday,city">City</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,sessions,31daysAgo,yesterday,browser">Browser</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,sessions,31daysAgo,yesterday,operatingSystem">Operating System</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,sessions,31daysAgo,yesterday,networkLocation">Service Provider</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,pageviews,31daysAgo,yesterday,pagePath">Page Path</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,searchUniques,31daysAgo,yesterday,searchKeyword">Search Keyword</a></li>										
                            </ul>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#page" href="#filter">filter</a>
                        </h4>
                    </div>
                    <div id="filter" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul id="textFilter">
                                <li><a id="18335606,UA-18335606-1,36387213,sessions,31daysAgo,yesterday,medium,==organic">Session medium:Organic</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,users,31daysAgo,yesterday,userType,==New Visitor">User type:New Visitor</a></li>
                                <li><a id="18493028,UA-18493028-7,72369658,pageviews,31daysAgo,yesterday,pagePath,==/wongnai-beta/">Pageview:/wongnai-beta/</a></li>
                                <li><a id="18335606,UA-18335606-1,36387213,sessions,31daysAgo,yesterday,browser,==Chrome">Brower:Chrome</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#page" href="#operator">Operator</a>
                        </h4>
                    </div>
                    <div id="operator" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul id="textOperator"> 
                                <li><a  id="18493028,UA-18493028-7,72369658,pageviews,31daysAgo,yesterday,pagePath,==/wongnai-beta/">Equals</a></li>
                                <li><a  id="18493028,UA-18493028-7,72369658,pageviews,31daysAgo,yesterday,pagePath,!=/wongnai-beta/">Does not equal</a></li>
                                <li><a  id="18493028,UA-18493028-7,72369658,pageviews,31daysAgo,yesterday,pagePath,=@/wongnai-beta/">Contains substring</a></li>
                                <li><a  id="18493028,UA-18493028-7,72369658,pageviews,31daysAgo,yesterday,pagePath,!@/wongnai-beta/">Does not contain substring</a></li>
                                <li><a  id="18493028,UA-18493028-7,72369658,pageviews,31daysAgo,yesterday,pagePath,=~/wongnai-beta/">Contains a match for the regular expression</a></li>
                                <li><a  id="18493028,UA-18493028-7,72369658,pageviews,31daysAgo,yesterday,pagePath,!~/wongnai-beta/">Does not match regular expression</a></li>
                            </ul>
                        </div>
                    </div>
                </div>                        
            </div>
        </div>                        
    </div>

    <div class="row">
        <div class="col-md-6 pull-left">
            <h5>Syntex : AccountId,PropertyId,ProfileId,Metric,StartDate,EndDate(,Dimension,Filter)</h5>
            <p>Example : </p>
            <div id="Example">
                <p>18493028,UA-18493028-7,72369658,pageviews,31daysAgo,yesterday,pagePath,=~/wongnai-beta/</p><br/>
            </div>

            <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#load" aria-expanded="false" aria-controls="load">Upload</button>
            <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#save" aria-expanded="false" aria-controls="save">Save</button>
            <div class="collapse" id="load">
                <div class="well">
                    <form action="" method="post" enctype="multipart/form-data">
                    <input type="file" value="Browser Folder" onChange="readFile(event)" class="filestyle" data-buttonBefore="true" data-icon="false" name="file" id="file" multiple />        
                </div>
            </div>
            <div class="collapse" id="save">
                <div class="well">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input type="text" class="form-control" name="savedFileName" id="savedFileName" placeholder="Enter file name...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" id="buttonSave" onclick="saveFile()">Save</button>
                                    <input type="file" id="file_input" webkitdirectory directory />
                                </span>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
            <br/>

            <textarea name="textInput" autofocus type="text" id="textInput" value="" style="color: #3B9C9C; width:850px; height:200px; max-width:850px;" class="form-control"></textarea> 
            </form>
            <form onsubmit="submitFormQuery(); return false;" id="form1" name="form1" method="post" action="">
                <button class="btn btn-default" id="sendQuery" onclick="submitFormQuery()">Send</button>
            </form>
            <p>&nbsp;</p>
            <p id="result"></p>
        </div>
    </div>

    <footer><!--Footer-->
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
