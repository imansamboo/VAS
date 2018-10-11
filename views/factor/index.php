<!DOCTYPE html>
<html lang="en">
<head>
    <title>Company Specification</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-8"><h2>Table <b>Company Specification</b></h2></div>
            <div class="col-sm-4" style="padding-top: 0px;padding-left: 91%;">
                <a href="http://localhost:2001?controller=CompanySpecification&action=create"><button type="button" class="btn btn-info"><i></i> Add New</button></a>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>userID</th>
                <th>Address</th>
                <th>Economical Number</th>
                <th>Registration Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        {% for key,arg in args %}
            <tr>
                <td>{{key +1}}</td>
                <td>{{arg.user_id}}</td>
                <td>{{arg.address}}</td>
                <td>{{arg.economical_number}}</td>
                <td>{{arg.registration_number}}</td>
                <td>
                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id={{arg.id}}" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id={{arg.id}}" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id={{arg.id}}" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                </td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
</div>

</body>
</html>
