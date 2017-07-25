<h1>Страницы</h1>

<a href="?module=page" >Добавить страницу</a>

<?php if($pages) :?>
    <table style="width: 100%">
        <th>Название</th>
        <th>Описание</th>
        <th>Активность</th>
    <?php foreach ($pages as $page) :?>
       <tr>
           <td><a href="?module=page&id=<?php echo $page->id ?>"><?php echo $page->name ?></a></td>
           <td><?php echo $page->description ?></td>
           <td>
               <?php if($page->visible)
                    echo 'вкл';
                else
                    echo 'выкл'
               ?>
           </td>
       </tr>

    <?php endforeach; ?>
    </table>
<?php else: ?>
    <div>Нет страниц</div>
<?php endif;?>
