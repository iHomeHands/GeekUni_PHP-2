<footer>
    <div class="container">
        <div class="row">
            <p>Copyright © 2017</p>
        </div>
    </div>
</footer>
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>
</body>
</html>
