1.Создать 3 миграции в базу данных с помощью Artisan:
- Таблица “Жанры” с полями:
- ID
- Название жанра
- Таблица Фильмы с полями :
- ID
- Название фильма
- Статус публикации 
- Ссылка на постер
- Таблица связи фильмы с жанрами

2.Создать seeds для тестового заполнения вышеуказанных таблиц

3.Создать модели, контроллеры, для создания, вывода, редактирования и удаления записей.

4.При создании записи в таблицу фильмы, должна происходить загрузка изображения с постером фильма ( если изображение отсутствует, к записи должно прикрепляться дефолтное изображение. Так же фильм не должен быть опубликован, публикация записи должна быть предусмотрена отдельным методом.

5.Создать контроллеры REST API для выборки и пагинации данных в формате json
- жанры ( выводит список всех жанров)
- жанры/id (выводит список всех фильмов в данном жанре с разбивкой на страницы
- фильмы - выводит все фильмы с разбивкой на страницы
- фильмы/id - выводит определенный фильм по ID

Фильм всегда в себе должен содержать жанры к которым относится и ссылку на изображение

В контроллерах должно быть минимальное количество логики. Все входящие по реквесту данные должны быть отвалидированы, особенно файлы.

