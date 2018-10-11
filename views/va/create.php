
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <h2>Enter <b>Company Specification</b></h2>
    <form action="http://localhost:2001?controller=CompanySpecification&action=store" method="post">
        <div class="row" style="padding: 1%">
            <div class="col-lg-6">
                <div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">username</button>
      </span>
                    <input required name="user_id""text" class="form-control" placeholder="Enter username">
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Registration Number</button>
      </span>
                    <input required name="registration_number" type="text" class="form-control" placeholder="Enter Registration Number">
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->


        </div><!-- /.row -->
        <div class="input-group"  style="padding: 1%">
            <span class="input-group-addon" id="basic-addon1">Address</span>
            <input required type="text" class="form-control" placeholder="Address" aria-describedby="basic-addon1" name="address"   >     </div>
        <div class="row" style="padding: 1%">
            <div class="col-lg-6">
                <div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Economical Number</button>
      </span>
                    <input required name="economical_number" type="text" class="form-control" placeholder="Enter Economical Number">
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <button class="btn btn-primary right" style="float: right; margin-right: 10%;">submit</button>
            </div>
        </div>
    </form>


</div>


<footer>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</footer>
</body>
</html>