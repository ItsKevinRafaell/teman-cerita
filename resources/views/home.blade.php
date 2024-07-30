<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <style>
        .article {
            border: 1px solid #ddd;
            padding: 16px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .article img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }

        .article h2 {
            margin-top: 0;
        }
    </style>
</head>

<body>
    <h1>Home Page</h1>
    <div id="articles">
        <!-- Artikel akan ditampilkan di sini -->
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Parse JSON data from PHP
            var articlesJson = @json($articlesJson);

            // Convert JSON string to JavaScript object
            var articles = JSON.parse(articlesJson);

            // Debug: Cek data articles di konsol
            console.log(Array.isArray(articles)); // Harus true jika articles adalah array
            console.log(articles);

            var articlesContainer = document.getElementById('articles');

            articles.forEach(function(article) {
                var articleElement = document.createElement('div');
                articleElement.className = 'article';

                // Create article content
                var content = `
                    <h2>${article.title}</h2>
                    <img src="/storage/${article.thumbnail}" alt="${article.title}">
                    <div>${article.content}</div>
                `;

                articleElement.innerHTML = content;
                articlesContainer.appendChild(articleElement);
            });
        });
        console.log(articlesJson);
        console.log(typeof articlesJson); 
    </script>

</body>

</html>
