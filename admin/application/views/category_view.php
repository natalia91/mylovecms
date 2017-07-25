<?php if($category->name) :?>
    <h1><?php echo $category->name ?></h1>
<?php else :?>
    <h1>Новая категория</h1>
<?php endif; ?>

<?php if($message == 'create' ) :?>
<div class="green_message">Категория добавлена</div>
<?php elseif ($message == 'update') :?>
<div class="green_message">Категория обновлена</div>
<?php endif;?>

<!--<div class="red_message"></div>-->

<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $category->id ?>">

    <div>
        <label>Название категории</label>
        <input type="text" name="name" value="<?php echo $category->name ?>">
    </div>

    <div>
        <label>Ссылка</label>
        <input type="text" name="url" value="<?php echo $category->url ?>">
    </div>

    <div>
        <label>Активность</label>
        <input type="checkbox" name="visible" value="1" <?php if($category->visible):?> checked <?php endif;?> >
    </div>

    <div>
        <label>Описание категории</label>
        <textarea style="width: 500px;height: 150px;" name="description"><?php echo $category->description ?></textarea>
    </div>

    <div>
        <label>Родительская категория</label>
        <select name="parent_id">
    <option value="0">Родительская категория</option>
    <?php foreach ($categories as $cat) :?>
    <option <?php if ($cat->id == $category->parent_id) :?> selected <?php endif ?> value="<?php echo $cat->id ?>"><?php echo $cat->name ?></option>
<?php endforeach ?>
</select>

    <input type="submit" name="save" value="Сохранить">

</form>