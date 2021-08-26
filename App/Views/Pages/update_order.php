<main>
    <p class="title-name">Добавление товара</p>
    <section class="admin-container admin-create">
        <form method="post">
            <ul class="admin-create">
                <li>
                    <p>Id пользвателя</p>
                    <input type="text" placeholder="Введите id пользователя" name="idUser" class="input" value="<?=$idUser?>">
                </li>
                <li>
                    <p>Id товара</p>
                    <input type="text" placeholder="Введите id товара" name="idItem" class="input" value="<?=$idItem?>">
                </li>
                <li>
                    <p>Количество</p>
                    <input type="text" placeholder="Введите колчество" name="countItems" class="input" value="<?=$countItems?>">
                </li>
                <li>
                    <button name="submit">Изменить заказ</button>
                </li>
            </ul>
        
        </form>
    </section>
</main>
