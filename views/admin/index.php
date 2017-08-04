<?php include Config::get('path_views') . '/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <h4>Добрый день, администратор!</h4>

            <br/>

            <p>Вам доступны такие возможности:</p>

            <br/>

            <ul>
                <li><a href="/admin/product">Управление товарами</a></li>
                <li><a href="/admin/category">Управление категориями</a></li>
                <li><a href="/admin/order">Управление заказами</a></li>
                <li><a href="/admin/user">Управление пользователями</a></li>
            </ul>

        </div>
    </div>
</section>

<?php include Config::get('path_views') . '/layouts/footer.php'; ?>