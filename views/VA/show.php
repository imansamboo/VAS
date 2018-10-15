{% include 'header.php' %}
<div class="container">
    <div class="connection-view">


        <table id="w0" class="table table-striped table-bordered detail-view"><tbody><tr><th>ID</th><td>2</td></tr>
                <tr><th>user ID</th><td>{{factor.user_id}}</td></tr>
                <tr><th>product Type</th><td>{{factor.product_type}}</td></tr>
                <tr><th>product ID</th><td>{{factor.product_id}}</td></tr>
                <tr><th>company ID</th><td>{{factor.company_id}}</td></tr>
                <tr><th>factor ID</th><td>{{factor.factor_id}}</td></tr>
            </tbody>
        </table>
    </div>
</div>
{% include 'footer.php' %}
