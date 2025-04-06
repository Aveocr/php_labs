<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Labs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #444;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin: 10px 0;
            padding: 10px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: background 0.3s ease;
        }
        li:hover {
            background: #e9e9e9;
        }
        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }

        /* Стили для модального окна */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 8px;
            width: 80%;
            max-width: 800px;
            position: relative;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover {
            color: #000;
        }
        pre {
            background: #f4f4f4;
            padding: 10px;
            border-radius: 4px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PHP Labs</h1>
        <ul>
            <?php
            // Функция для рекурсивного поиска PHP-файлов
            function getPhpFiles($dir) {
                $files = [];
                $items = scandir($dir);
                foreach ($items as $item) {
                    if ($item === '.' || $item === '..') continue;
                    $path = $dir . DIRECTORY_SEPARATOR . $item;
                    if (is_dir($path)) {
                        // Если это директория, рекурсивно ищем файлы
                        $files = array_merge($files, getPhpFiles($path));
                    } elseif (pathinfo($path, PATHINFO_EXTENSION) === 'php') {
                        // Если это PHP-файл, добавляем в список
                        $files[] = $path;
                    }
                }
                return $files;
            }

            // Указываем корневую директорию
            $rootDir = __DIR__; // Текущая директория (где находится index.php)
            $phpFiles = getPhpFiles($rootDir);

            // Выводим список файлов
            foreach ($phpFiles as $file) {
                $relativePath = str_replace($rootDir . DIRECTORY_SEPARATOR, '', $file);
                echo "<li><a href='#' class='file-link' data-file='$relativePath'>$relativePath</a></li>";
            }
            ?>
        </ul>
    </div>

    <!-- Модальное окно -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <pre><code id="file-content"></code></pre>
            <!-- <pre><code id="file_code"></code></pre> -->
        </div>
    </div>

    <script>
        // Открытие модального окна
        document.querySelectorAll('.file-link').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const filePath = this.getAttribute('data-file');

                // Загружаем содержимое файла через AJAX
                fetch(filePath)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('file-content').textContent = data;
                        // doceumt.getElementById('file_code').textContent
                        document.getElementById('modal').style.display = 'block';
                    })
                    .catch(error => console.error('Ошибка загрузки файла:', error));
            });
        });

        // Закрытие модального окна
        document.querySelector('.close').addEventListener('click', function () {
            document.getElementById('modal').style.display = 'none';
        });

        // Закрытие модального окна при клике вне его области
        window.addEventListener('click', function (event) {
            if (event.target === document.getElementById('modal')) {
                document.getElementById('modal').style.display = 'none';
            }
        });
    </script>
</body>
</html>