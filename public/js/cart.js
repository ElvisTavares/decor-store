function cartRemoveProduct(idOrder, idProduct, item)
{
    $('#form-remove-product input[name="order_id"]').val(idOrder);
    $('#form-remove-product input[name="product_id"]').val(idProduct);
    $('#form-remove-product input[name="item"]').val(item);
    $('#form-remove-product').submit();

}

function cartAddProduct(idProduct) {
    $('#form-add-product input[name="id"]').val(idProduct);
    $('#form-add-product').submit();
}
