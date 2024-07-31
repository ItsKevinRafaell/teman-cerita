@extends("layouts.landing")

@section("landing-content")
    <!-- START::HERO -->
    <section class="container-fluid py-100 d-flex justify-content-center position-relative" style="background-image: url('{{ asset("/assets/images/podcast.jpg") }}'); background-size: cover; background-position: center;">
        <div class="overlay position-absolute w-100 h-100" style="background: rgba(0, 0, 0, 0.5); top: 0; left: 0;"></div>
        <div class="wrap text-center position-relative" style="max-width: 700px;">
            <h1 class="h1 text-white text-center">
                Artikel <span class="text-gradient-pink-2">Kesehatan</span>
            </h1>
        </div>
    </section>
    <!-- END::HERO -->


    <!-- START::CONTENT -->
    <section class="container bg-primary mt-48">
        <div class="row d-flex row-gap-5">

            <div class="col-12 col-lg-8 flex-nowrap order-last order-lg-first">
                <form action="#" class="input-group flex-nowrap mb-48">
                    <input type="text" class="form-control search text-white" placeholder="Cari Artikel" aria-label="Username" aria-describedby="addon-wrapping">
                    <button class="tertiary-button" type="button" id="button-addon2">Cari</button>
                </form>
                <div class="row">
                    <h3 class="h3 text-white mb-48"><span class="text-gradient-pink">12032</span> Artikel Kesehatan Ditemukan</h3>

                    <a href="/article-detail.html" class="card-article-page text-decoration-none">
                        <div class="d-flex align-items-center p-1">
                            <div class="card-image-article-page">
                              <img src="/assets/images/yoga-login.png" alt="article-img-" class="img-article-page" style="background-size: cover;">
                            </div>
                            <div class="card-content-article-page">
                                <div class="h6 text-white">
                                    <strong>Frederick Octo Ramadani</strong> <span class="text-gray">in</span> <span class="text-gradient-pink-2"><strong>Mental Health</strong></span>
                                </div>
                                <div class="h4 text-white title-article">
                                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, nobis voluptatibus doloribus distinctio exercitationem quia, nulla libero quasi debitis ex cupiditate soluta id placeat dolore facilis nemo est iste blanditiis.
                                </div>
                                <div class="h6 text-gray">22 January 2024</div>
                            </div>
                        </div>
                    </a>

                    <div class="divider-2"></div>

                    <a href="/article-detail.html" class="card-article-page text-decoration-none">
                        <div class="d-flex align-items-center p-1">
                            <div class="card-image-article-page mb-16 mr-48">
                              <img src="/assets/images/yoga-login.png" alt="article-img-" class="img-article-page" style="background-size: cover;">
                            </div>
                            <div class="card-content-article-page">
                                <div class="h6 text-white">
                                    <strong>Frederick Octo Ramadani</strong> <span class="text-gray">in</span> <span class="text-gradient-pink-2"><strong>Mental Health</strong></span>
                                </div>
                                <div class="h4 text-white title-article">
                                  Skandal terbaru!, ternyata ini tutorial cara cepat kaya versi anak orang kaya dan terbaru
                                </div>
                                <div class="h6 text-gray">22 January 2024</div>
                            </div>
                        </div>
                    </a>

                    <div class="divider-2"></div>

                    <a href="/article-detail.html" class="card-article-page text-decoration-none">
                        <div class="d-flex align-items-center p-1">
                            <div class="card-image-article-page mb-16 mr-48">
                              <img src="/assets/images/yoga-login.png" alt="article-img-" class="img-article-page" style="background-size: cover;">
                            </div>
                            <div class="card-content-article-page">
                                <div class="h6 text-white">
                                    <strong>Frederick Octo Ramadani</strong> <span class="text-gray">in</span> <span class="text-gradient-pink-2"><strong>Mental Health</strong></span>
                                </div>
                                <div class="h4 text-white title-article">
                                  Skandal terbaru!, ternyata ini tutorial cara cepat kaya versi anak orang kaya dan terbaru
                                </div>
                                <div class="h6 text-gray">22 January 2024</div>
                            </div>
                        </div>
                    </a>

                    <div class="divider-2"></div>

                    <a href="/article-detail.html" class="card-article-page text-decoration-none">
                        <div class="d-flex align-items-center p-1">
                            <div class="card-image-article-page mb-16 mr-48">
                              <img src="/assets/images/yoga-login.png" alt="article-img-" class="img-article-page" style="background-size: cover;">
                            </div>
                            <div class="card-content-article-page">
                                <div class="h6 text-white">
                                    <strong>Frederick Octo Ramadani</strong> <span class="text-gray">in</span> <span class="text-gradient-pink-2"><strong>Mental Health</strong></span>
                                </div>
                                <div class="h4 text-white title-article">
                                  Skandal terbaru!, ternyata ini tutorial cara cepat kaya versi anak orang kaya dan terbaru
                                </div>
                                <div class="h6 text-gray">22 January 2024</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-12 col-lg-3 offset-lg-1 order-first order-lg-last article-right-card sticky-lg-top">
                <div class="content">
                    <div class="title mb-3">
                        Kategori Artikel
                    </div>

                    <div class="flex-wrap">
                        <a href="/article-category.html" class="badge text-decoration-none h6 text-primary badge-category">
                            Mental Health (22)
                        </a>
                        <a href="/" class="badge text-decoration-none h6 text-primary badge-category">
                            Tips (4)
                        </a>
                        <a href="/" class="badge text-decoration-none h6 text-primary badge-category">
                            Healthy Food (18)
                        </a>

                    </div>

                    <hr class="divider-2">

                    <div class="title mt-1 mb-3">
                        Artikel Pilihan
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset("/assets/images/faq.png") }}" alt="faq" class="img-picked-article mr-8">

                        <a href="/article-detail.html" class=" title-article text-white">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos, nihil.
                        </a>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset("/assets/images/faq.png") }}" alt="faq" class="img-picked-article mr-8">

                        <a href="/article-detail.html" class=" title-article text-white">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos, nihil.
                        </a>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset("/assets/images/faq.png") }}" alt="faq" class="img-picked-article mr-8">

                        <a href="/article-detail.html" class=" title-article text-white">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos, nihil.
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END::CONTENT -->

    @push("push_js_after")
    <script>
        document.addEventListener("DOMContentLoaded", function() { 
            var dataJson = @json($dataJson);
 
            var articles = JSON.parse(dataJson);
 
            console.log(Array.isArray(articles));
            console.log(articles);

            // var articlesContainer = document.getElementById('articles');

            // articles.forEach(function(article) {
            //     var articleElement = document.createElement('div');
            //     articleElement.className = 'article';

            //     // Create article content
            //     var content = `
            //         <h2>${article.title}</h2>
            //         <img src="/storage/${article.thumbnail}" alt="${article.title}">
            //         <div>${article.content}</div>
            //     `;

            //     articleElement.innerHTML = content;
            //     articlesContainer.appendChild(articleElement);
            // });
        });
    </script>
    @endpush
@endsection
