<h1>Товары</h1>

<a href="?module=product" >Добавить товар</a>

<?php if($products) :?>
    <table style="width: 100%">
        <th>Картинка</th>
        <th>Название</th>
        <th>Цена</th>
        <th>Количество</th>
        <th>Активность</th>
    <?php foreach ($products as $product) :?>
       <tr>
           <td>&nbsp;</td>
           <td><a href="?module=product&id=<?php echo $product->id ?>"><?php echo $product->name ?></a></td>
           <td><?php echo $product->price ?></td>
           <td><?php echo $product->amount ?></td>
           <td>
               <?php if($product->visible)
                    echo 'вкл';
                else
                    echo 'выкл'
               ?>
           </td>
       </tr>

    <?php endforeach; ?>
    </table>
<?php else: ?>
    <div>Нет товаров</div>
<?php endif;?>
