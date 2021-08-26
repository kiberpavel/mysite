<main>
    <p class="title-name">Добавление товара</p>
    <section class="admin-container admin-create">
            <form method="post" enctype="multipart/form-data">
		            <ul class="admin-create">
				            <li>
						            <p>Id категории</p>
						            <input type="text" placeholder="Введите id" name="idCategory" class="input" >
				            </li>
				            <li>
						            <p>Модель</p>
						            <input type="text" placeholder="Введите модель" name="model" class="input" >
				            </li>
				            <li>
						            <p>Страна</p>
						            <input type="text" placeholder="Введите страну" name="country" class="input" >
				            </li>
				            <li>
						            <p>Бренд</p>
						            <input type="text" placeholder="Введите бренд" name="brend" class="input" >
				            </li>
				            <li>
						            <p>Количество</p>
						            <input type="text" placeholder="Введите количество" name="count" class="input" >
				            </li>
				            <li>
						            <p>Цена</p>
						            <input type="text" placeholder="Введите цену" name="price" class="input" >
				            </li>
				            <li>
						            <p>О товаре</p>
						            <textarea name="about"></textarea>
				            </li>
				            <li>
						            <p>Фото</p>
						            <input type="file"  name="photo" class="input" >
				            </li>
				            <li>
						            <button name="submit">Добавить товар</button>
				            </li>
		            </ul>
		            
            </form>
    </section>
</main>
