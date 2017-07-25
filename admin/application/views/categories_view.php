<h1>Категории товаров</h1>

<a href="?module=category" >Добавить категорию</a>
<?php if($categories) :?>
    <table style="width: 100%">
        <th>Картинка</th>
        <th>Название</th>
        <th>Родительская категория</th>
        <th>Активность</th>
    <?php foreach ($categories as $category) :?>
       <tr>
           <td>&nbsp;</td>
           <td><a href="?module=category&id=<?php echo $category->id ?>"><?php echo $category->name ?></a></td>
           <td><?php echo $category->parent_id ?></td>
           <td>
               <?php if($category->visible)
                    echo 'вкл';
                else
                    echo 'выкл'
               ?>
           </td>
       </tr>

    <?php endforeach; ?>
    </table>
<?php else: ?>
    <div>Нет категорий</div>
<?php endif;?>
