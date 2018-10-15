{% include 'header.php' %}
<div class="container">
    <div class="connection-view">


        <table id="w0" class="table table-striped table-bordered detail-view">
            <tbody>
                <tr><th>ID</th><td>{{factor.id}}</td></tr>
                <tr><th>Name</th><td>{{factor.name}}</td></tr>
                <tr><th>User ID</th><td>{{factor.user_id}}</td></tr>
                <tr><th>Company ID</th><td>{{factor.company_id}}</td></tr>
            </tbody>
        </table>
    </div>
</div>
{% include 'footer.php' %}
