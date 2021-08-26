<main>
    <p class="title-name">Изменение товара</p>
    <section class="admin-container admin-create">
        <form method="post" enctype="multipart/form-data">
            <ul class="admin-create">
                <li>
                    <p>Id категории</p>
                    <input type="text" placeholder="Введите id" name="idCategory" class="input" value="<?=$idCategory?>">
                </li>
                <li>
                    <p>Модель</p>
                    <input type="text" placeholder="Введите модель" name="model" class="input" value="<?=$model?>">
                </li>
                <li>
                    <p>Страна</p>
                    <input type="text" placeholder="Введите страну" name="country" class="input" value="<?=$country?>">
                </li>
                <li>
                    <p>Бренд</p>
                    <input type="text" placeholder="Введите бренд" name="brend" class="input" value="<?=$brend?>">
                </li>
                <li>
                    <p>Количество</p>
                    <input type="text" placeholder="Введите количество" name="count" class="input" value="<?=$count?>">
                </li>
                <li>
                    <p>Цена</p>
                    <input type="text" placeholder="Введите цену" name="price" class="input" value="<?=$price?>">
                </li>
                <li>
                    <p>О товаре</p>
                    <textarea name="about"><?=$about?></textarea>
                </li>
                <li>
                    <p>Фото</p>
		                <img src="<?=$photo?>" alt="<?=$model?>" width="600">
                    <input type="file"  name="photo" class="input" >
                </li>
                <li>
                    <button name="submit">Изменить товар</button>
                </li>
            </ul>
        
        </form>
    </section>
</main>
