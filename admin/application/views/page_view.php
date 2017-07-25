<?php if($page->name) :?>
    <h1><?php echo $page->name ?></h1>
<?php else :?>
    <h1>Новая страница</h1>
<?php endif; ?>

<?php if($message == 'create' ) :?>
<div class="green_message">Страница добавлена</div>
<?php elseif ($message == 'update') :?>
<div class="green_message">Страница обновлена</div>
<?php endif;?>

<!--<div class="red_message"></div>-->

<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $page->id ?>">

    <div>
        <label>Название страницы</label>
        <input type="text" name="name" value="<?php echo $page->name ?>">
    </div>

    <div>
        <label>Ссылка</label>
        <input type="text" name="url" value="<?php echo $page->url ?>">
    </div>

    <div>
        <label>Активность</label>
        <input type="checkbox" name="visible" value="1" <?php if($page->visible):?> checked <?php endif;?> >
    </div>

    <div>
        <label>Описание страницы</label>
        <textarea style="width: 500px;height: 150px;" name="description"><?php echo $page->description ?></textarea>
    </div>

    <input type="submit" name="save" value="Сохранить">

</form>