{% include 'header.php' %}
<div class="container">
    <div class="connection-view">


        <table id="w0" class="table table-striped table-bordered detail-view"><tbody>
                <tr><th>ID</th><td>{{factor.id}}</td></tr>
                <tr><th>userID</th><td>{{factor.user_id}}</td></tr>
                <tr><th>Address</th><td>{{factor.address}}</td></tr>
                <tr><th>Economical Number</th><td>{{factor.economical_number}}</td></tr>
                <tr><th>Registration Number</th><td>{{factor.registration_number}}</td></tr>
            </tbody>
        </table>
    </div>
</div>
{% include 'footer.php' %}
