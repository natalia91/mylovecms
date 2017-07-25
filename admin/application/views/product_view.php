<?php if($product->name) :?>
    <h1><?php echo $product->name ?></h1>
<?php else :?>
    <h1>Новый товар</h1>
<?php endif; ?>

<?php if($message == 'create' ) :?>
<div class="green_message">Товар добавлен</div>
<?php elseif ($message == 'update') :?>
<div class="green_message">Товар обновлен</div>
<?php endif;?>

<!--<div class="red_message"></div>-->

<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $product->id ?>">

    <div>
        <label>Имя товара</label>
        <input type="text" name="name" value="<?php echo $product->name ?>">
    </div>

    <div>
        <label>Ссылка</label>
        <input type="text" name="url" value="<?php echo $product->url ?>">
    </div>

    <div>
        <label>Активность</label>
        <input type="checkbox" name="visible" value="1" <?php if($product->visible):?> checked <?php endif;?> >
    </div>

    <div>
        <label>Описание товара</label>
        <textarea style="width: 500px;height: 150px;" name="description"><?php echo $product->description ?></textarea>
    </div>

    <div>
        <label>Цена</label>
        <input type="text" name="price" value="<?php echo $product->price ?>">
    </div>

    <div>
        <label>Количество</label>
        <input type="text" name="amount" value="<?php echo $product->amount ?>">
    </div>
    <input type="submit" name="save" value="Сохранить">

    <div style="float: left;width: 45%;padding: 10px;">
        <h3>Загрузка изображений</h3>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="uploadfile" value="Обзор">
    <input type="submit" value="ok">
    </form>
    </div>

</form>