$(document).on('click', '.category-link', function(){
    if (!$('#catalog-data').length) {
        return true;
    }
    var self = $(this);
    $.ajax({
        url: '/index.php?page=categories&action=index&id=' + self.attr('link') + '&asAjax=true',
        type: 'GET',
        dataType: 'json'
    }).done(function(data) {
        var categoryList = $('<ul>');
        var catalogData = $('#catalog-data');
        catalogData.empty();
        for (var item in data.subcategories) {
            var category = $('<a>');
            category.attr('href', "/categories/" + data.subcategories[item].id);
            category.attr('link', data.subcategories[item].id);
            category.addClass('category-link');
            category.html(data.subcategories[item].name);
            categoryList.append('<li>' + category[0].outerHTML + '</li>');
        }
        var goodsList = $('<ul>');
        for (var item in data.goods) {
            var good = $('<div class="good">');
            good.append('<h3>' + data.goods[item].name + '</h3>');
            good.append('<b>Цена: ' + data.goods[item].price + '</b>');
            good.append('<input type="button" rel="' + data.goods[item].id + '" class="add" value="В корзину">');
            goodsList.append('<li>' + good[0].outerHTML + '</li>');
        }
        
        catalogData.html(categoryList[0].outerHTML);
        catalogData.append(goodsList[0].outerHTML);
    });
    return false;
});

$(document).on('click', '.add', function() {
    var self = $(this); 
    $.ajax({
        url : '/index.php?page=order&action=add&id=' + self.attr('rel'),
        type : 'GET',
        dataType : 'json'
    }).done(function(data) {
        if (data.error) {
            alert(data.error);
        } else {
            alert('Товар добавлен');
        }
    });
});